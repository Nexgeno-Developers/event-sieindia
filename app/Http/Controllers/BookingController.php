<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Session;
use Mail;

class BookingController extends Controller
{

    const TEST_URL = 'https://test.payu.in';
    //const TEST_URL = 'https://sandboxsecure.payu.in';
    const PRODUCTION_URL = 'https://secure.payu.in';

    public function index()
    {
        $meta = array(
            'name' => 'Booking'
        );

        //unset coupon on page load
        Session::put('coupon_applied', 0);
        Session::put('coupon_code', null);

        //all available slots
        $slots = DB::table('slots')->orderBy('id')->get(); //->where('slot_seats', '>', 0)
        $dates = DB::table('slots')->select('slot_date')->groupBy('slot_date')->get();
        $classes = DB::table('slots')->select('slot_name')->groupBy('slot_name')->get();
        //$classes = DB::table('slots')->select('slot_name')->groupBy('slot_name')->orderByRaw("CAST(SUBSTRING_INDEX(slot_name, '-', -1) AS SIGNED) ASC")->get();
        $states = DB::table('states')->select('name')->orderBy('name', 'asc')->get();
        $cities = DB::table('cities')->select('name')->orderBy('name', 'asc')->get();

        $price = $this->slot_default_price(null);
        $premium_price = $this->slot_default_price('Premium');
        $advanced_price = $this->slot_default_price('Advanced');
        $plan  = $this->slot_plan();

        if(!empty(auth()->guard('web')->user()->id)){
            return redirect('additional_booking');
        }

        return view('web.bookingform')->with(compact('meta','slots','classes','dates', 'price', 'premium_price', 'advanced_price','plan', 'states', 'cities'));
    }

    public function create_booking(request $request)
    {
        Session::put('booking', [
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'dci_no'        => $request->dci_no,
            'city'          => $request->city,
            'zipcode'       => $request->zipcode,
            'state'         => $request->state,
            'slot_default'  => $request->slot_default,
            'slot_addition' => $request->slot_addition,
        ]);

        $validator = Validator::make($request->all(), [
            'first_name'   => 'required|max:50|min:3',
            'last_name'    => 'required|max:50|min:3',
            'email' => [
                'required',
                'max:50',
                'min:10',
                Rule::unique('orders')->where('payment_status', 'paid')
            ],
            'phone' => [
                'required',
                'max:10',
                'min:10',
                Rule::unique('orders')->where('payment_status', 'paid')
            ],
            'dci_no'       => 'required|max:50|min:3',
            'city'         => 'required|max:50|min:3',
            'zipcode'      => 'required|max:50|min:3',
            'state'        => 'required',
            'slot_default' => 'required'
        ])->validate();

        $first_form_slot_type = optional(DB::table('slots')->where('id', $request->slot_default)->first())->type;

        $not_available = $this->check_slot_availibility($request);

        if($not_available)
        {
            return redirect()->back()->withErrors(['slot_availibility' => $not_available]);
        }

        $grand_total = $this->slot_default_price($first_form_slot_type) + $this->slot_addition_price($request->slot_addition);

        $payment_method = ($grand_total == 0) ? 'none' : 'payu';

        //return $request;

        //insert in order
        $txnid = substr(hash('sha256', mt_rand().microtime()), 0, 20);
        $orderId = DB::table('orders')->insertGetId([
            'first_name'       => $request->first_name,
            'last_name'        => $request->last_name,
            'email'            => $request->email,
            'phone'            => $request->phone,
            'dci_no'           => $request->dci_no,
            'city'             => $request->city,
            'zipcode'          => $request->zipcode,
            'state'            => $request->state,
            'grand_total'      => $grand_total,
            'payment_method'   => $payment_method,
            'payment_status'   => 'created',
            'payment_id'       => $txnid,
            'coupon_code'      => $request->coupon_code,
            'payment_response' => json_encode(array()),
            'd1'               => $this->slot_plan(),
            'created_at'       => date('Y-m-d H:i:s'),
            'updated_at'       => date('Y-m-d H:i:s')
        ]);

        if($orderId)
        {
            //insert in order items
            //default slot
            $sl = DB::table('slots')->where('id', $request->slot_default)->first();
            $orderitemId = DB::table('order_items')->insertGetId([
                'order_id'   => $orderId,
                'slot_id'    => $sl->id,
                'slot_name'  => $sl->slot_name,
                'slot_time'  => $sl->slot_time,
                'slot_date'  => $sl->slot_date,
                'speaker'    => $sl->speaker,
				'workshop'  => $sl->workshop,
                'description'=> $sl->description,
                'amount'     => $this->slot_default_price($first_form_slot_type),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            //default additional
            if(!empty($request->slot_addition))
            {
                foreach(array_unique($request->slot_addition) as $id)
                {
                    $sl = DB::table('slots')->where('id', $id)->first();
                    $orderitemId = DB::table('order_items')->insertGetId([
                        'order_id'   => $orderId,
                        'slot_id'    => $sl->id,
                        'slot_name'  => $sl->slot_name,
                        'slot_time'  => $sl->slot_time,
                        'slot_date'  => $sl->slot_date,
                        'speaker'    => $sl->speaker,
                        'description'=> $sl->description,
						'workshop'  => $sl->workshop,
                        'amount'     => $sl->slot_price,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                }
            }
        }

        if($grand_total > 0)
        {
            return redirect(url('create_payumoney/'.$orderId));
        }
        else
        {
            return redirect(url('free-booking-success/'.$orderId));
        }


    }

    function free_booking_success($order_id)
    {
        //success
        //order info
        if(empty($order_id))
        {
            return redirect(url(''));
        }

        $order = DB::table('orders')->where('id', $order_id)->first();
        $order_items = DB::table('order_items')->where('order_id', $order->id)->get();

        //avoid update if payment is paid
        if($order->payment_status == 'paid')
        {
            return redirect(url(''));
        }

        //update order
        $updateOrder = DB::table('orders')
        ->where('id', $order_id)
        ->update([
			'resgistration_no' => $this->get_last_reg_no(),
            'payment_status' => 'paid',
            'payment_response' => json_encode(array()),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        //deduct seats
        foreach($order_items as $item)
        {
            $updateSlots = DB::table('slots')
            ->where('id', $item->slot_id)
            ->decrement('slot_seats', 1);
        }

        //masrk used coupon
        if(!empty($order->coupon_code))
        {
            $updateCoupon = DB::table('coupons')
            ->where('code', $order->coupon_code)
            ->update(['is_used' => 1]);
        }

        //fresh order info
        $order = DB::table('orders')->where('id', $order_id)->first();
        $order_items = DB::table('order_items')->where('order_id', $order->id)->get();

        //create user
        $this->create_user($order);

        $this->order_confirm_email($order, $order_items);

        $meta   = array('name' => 'Success');
        $txnid  = $order->payment_id;
        $amount = $order->grand_total;
        $input  = null;
        $status = 'success';

        Session::flush();

        return view('payumoney.success', compact('input','status','txnid','amount','order','order_items','meta'));
    }

    function create_payumoney(request $request, $order_id)
    {
        if($order_id)
        {
            $order = DB::table('orders')->where('id', $order_id)->where('payment_status', 'created')->first();
            if($order)
            {
                $data = $request->all();
                $MERCHANT_KEY = config('payu.merchant_key');
                $SALT = config('payu.salt_key');

                $PAYU_BASE_URL = config('payu.test_mode') ? self::TEST_URL : self::PRODUCTION_URL;
                $action = '';

                $posted = array();
                if (!empty($data)) {
                    foreach ($data as $key => $value) {
                        $posted[$key] = $value;
                    }
                }

                $formError = 0;

                $txnid = $order->payment_id;

                $hash = '';
        // Hash Sequence
                $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
                if (empty($posted['hash']) && sizeof($posted) > 0) {
                    if (
                        empty($posted['key'])
                        || empty($posted['txnid'])
                        || empty($posted['amount'])
                        || empty($posted['firstname'])
                        || empty($posted['email'])
                        || empty($posted['phone'])
                        || empty($posted['productinfo'])
                        || empty($posted['surl'])
                        || empty($posted['furl'])
                        || empty($posted['service_provider'])
                    ) {
                        $formError = 1;
                    } else {
                        $hashVarsSeq = explode('|', $hashSequence);
                        $hash_string = '';
                        foreach ($hashVarsSeq as $hash_var) {
                            $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
                            $hash_string .= '|';
                        }

                        $hash_string .= $SALT;


                        $hash = strtolower(hash('sha512', $hash_string));
                        $action = $PAYU_BASE_URL.'/_payment';

                    }
                } elseif (!empty($posted['hash'])) {
                    $hash = $posted['hash'];
                    $action = $PAYU_BASE_URL.'/_payment';

                }

                $updateOrder = DB::table('orders')->where('id', $order->id)->update([
                    'pum_hash' => $hash
                ]);

                return view('payumoney.pay', compact('hash', 'action', 'MERCHANT_KEY', 'formError', 'txnid', 'posted', 'SALT', 'order'));
            }
        }
    }

    function slot_default_price($type)
    {
        $price = 0;
        // Default price for the Premium type
        if ($type == 'Premium') {

            $price = 5000;

            // Set price for Premium type
            // if (strtotime(date('Y-m-d H:i:s')) >= strtotime('2024-12-19 00:00:00')) {
            //     $price = 3500;
            // } elseif (strtotime(date('Y-m-d H:i:s')) <= strtotime('2024-12-31 23:59:59')) {
            //     $price = 5000;
            // }
        }

        // Default price for the Advanced type
        elseif ($type == 'Advanced') {

            $price = 2000;

            // Set price for Advanced type
            // if (strtotime(date('Y-m-d H:i:s')) >= strtotime('2023-08-03 00:00:00')) {
            //     $price = 1500;
            // } elseif (strtotime(date('Y-m-d H:i:s')) <= strtotime('2023-08-02 23:59:59')) {
            //     $price = 2000;
            // }
        }

        // Apply discount if a coupon is applied
        if (Session::get('coupon_applied') == 1) {
            $price = 0;
        }

        return $price;
    }

    // function slot_default_price()
    // {
    //     if( strtotime(date('Y-m-d H:i:s')) >= strtotime('2023-08-03 00:00:00') )
    //     {
    //         $price = 16900;
    //     }
    //     /*elseif( date('2022-12-16') <= date('Y-m-d')  &&  date('2023-01-25') >= date('Y-m-d') )
    //     {
    //         $price = 15250;
    //     }*/
    //     elseif( strtotime(date('Y-m-d H:i:s')) <= strtotime('2023-08-02 23:59:59'))
    //     {
    //         $price = 15250;
    //     }

    //     //
    //     if(Session::get('coupon_applied') == 1)
    //     {
    //         $price = 0;
    //     }

    //     return $price;
    // }

    function slot_plan()
    {
        if( strtotime(date('Y-m-d H:i:s')) >= strtotime('2023-08-03 00:00:00') )
        {
            $type = 'Night Owl Offer';
        }
        /*elseif( date('2022-12-16') <= date('Y-m-d')  &&  date('2023-01-25') >= date('Y-m-d') )
        {
            $type = 'Regular Offer';
        }
        elseif( date('2022-12-15') >= date('Y-m-d'))
        {
            $type = 'Early Bird';
        }*/
        elseif( strtotime(date('Y-m-d H:i:s')) <= strtotime('2023-08-02 23:59:59'))
        {
            $type = 'Regular Offer';
        }


        return $type;
    }

    function slot_addition_price($ids)
    {
        if($ids)
        {
            $addition_price_total = DB::table('slots')->whereIn('id', $ids)->sum('slot_price');
        }
        else
        {
            $addition_price_total = 0;
        }

        return $addition_price_total;
    }

    public function check_slot_availibility($request)
    {
        $slot_merge = array();
        $slot_merge[] = $request->slot_default;
        if($request->slot_addition){
            foreach($request->slot_addition as $slot_additon)
            {
                $slot_merge[] = $slot_additon;
            }
        }

        $slots = DB::table('slots')->whereIn('id', $slot_merge)->get();

        //$availibility = array();
        $availibility = '';
        foreach($slots as $slot)
        {
            if($slot->slot_seats == 0)
            {
                //$availibility[] = ''.$slot->slot_date.' / '.$slot->slot_name.' / '.$slot->slot_time.' is booked.';
                $availibility = 'Looks like one or more selected Hand-on slots are full, kindly reselect the slots.';
            }
        }
        return $availibility ? $availibility : null;
    }


    function payment_success(Request $request)
    {
        $input = $request->all();

        if(!$input) //redirect if no post
        {
            return redirect(url(''));
        }

        $status = $input["status"];
        $firstname = $input["firstname"];
        $amount = $input["amount"];
        $txnid = $input["txnid"];
        $posted_hash = $input["hash"];
        $key = $input["key"];
        $productinfo = $input["productinfo"];
        $email = $input["email"];
        $salt = config('payu.salt_key');


        if (isset($input["additionalCharges"])) {
            $additionalCharges = $input["additionalCharges"];
            $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        } else {
            $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        }

        $hash = hash("sha512", $retHashSeq);

        if ($hash != $posted_hash) { //1 != 1
            //order info
            $order = DB::table('orders')->where('payment_id', $txnid)->first();
            $order_items = DB::table('order_items')->where('order_id', $order->id)->get();
            $errorMessage = "Hash not matched";
            $this->order_failure_email($order, $order_items, $errorMessage);
            return "Invalid Transaction. Please try again";
        } else {

            //success
            //order info
            $order = DB::table('orders')->where('payment_id', $txnid)->first();
            $order_items = DB::table('order_items')->where('order_id', $order->id)->get();

            //avoid update if payment is paid
            if($order->payment_status == 'paid')
            {
                return redirect(url(''));
            }

            //update order
            $updateOrder = DB::table('orders')
            ->where('payment_id', $txnid)
            ->update([
				'resgistration_no' => $this->get_last_reg_no(),
                'payment_status' => 'paid',
                'payment_response' => json_encode($input),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            //deduct seats
            foreach($order_items as $item)
            {
                $updateSlots = DB::table('slots')
                ->where('id', $item->slot_id)
                ->decrement('slot_seats', 1);
            }

            //masrk used coupon
            if(!empty($order->coupon_code))
            {
                $updateCoupon = DB::table('coupons')
                ->where('code', $order->coupon_code)
                ->update(['is_used' => 1]);
            }

            //fresh order info
            $order = DB::table('orders')->where('payment_id', $txnid)->first();
            $order_items = DB::table('order_items')->where('order_id', $order->id)->get();

            //create user
            $this->create_user($order);

            $this->order_confirm_email($order, $order_items);




            $meta = array(
                'name' => 'Success'
            );

            return view('payumoney.success', compact('input','status','txnid','amount','order','order_items','meta'));
        }
    }

    function get_last_reg_no() {
        $order = DB::table('orders')->where('payment_status', 'paid')->WhereNotNull('resgistration_no')->orderBy('id', 'desc')->first();
        $regNo = !empty($order->resgistration_no) ? $order->resgistration_no : 0;
        return $regNo + 1;
    }

    function payment_cancel(Request $request)
    {
        $data = $request->all();

        if(!$data) //redirect if no post
        {
            return redirect(url(''));
        }

        $validHash = true;//$this->checkHasValidHas($data);
		$txnid = $data["txnid"];


		//if( isset(auth()->guard('web')->user()->id) && !empty(auth()->guard('web')->user()->id) ){
		   $authenticated = Auth::guard('web')->attempt([
                'email' => $data["email"],
                'password' => '123123'
            ]);
		//}



        if (!$validHash) {
            echo "Invalid Transaction. Please try again";
        } else {
            //fail
            //update order
            $updateOrder = DB::table('orders')
            ->where('payment_id', $txnid)
            ->update([
                'payment_status' => 'unpaid',
                'payment_response' => json_encode($data),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
        $meta = array(
            'name' => 'Fail'
        );

        //fresh order info
        $errorMessage = $data['error_Message'];
        $order = DB::table('orders')->where('payment_id', $txnid)->first();
        $order_items = DB::table('order_items')->where('order_id', $order->id)->get();

        $this->order_failure_email($order, $order_items, $errorMessage);

        return view('payumoney.fail', compact('errorMessage','data','meta'));
    }

    public function checkHasValidHas($data)
    {
        $status = $data["status"];
        $firstname = $data["firstname"];
        $amount = $data["amount"];
        $txnid = $data["txnid"];
        $errorMessage = $data["error_Message"];

        $posted_hash = $data["hash"];
        $key = $data["key"];
        $productinfo = $data["productinfo"];
        $email = $data["email"];
        $salt = "";

        // Salt should be same Post Request

        if (isset($data["additionalCharges"])) {
            $additionalCharges = $data["additionalCharges"];
            $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        } else {
            $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        }

        $hash = hash("sha512", $retHashSeq);

        if ($hash != $posted_hash) {
            return  false;
        }

        return true;
    }

	public function order_confirm_email($order, $order_items)
    {

        $to = $order->email;
        $name = $order->first_name;
        $type = 'client';
        //send email customer
        Mail::send('mail.order_confirm', compact('order','order_items','type'), function($message) use($to, $name) {
            $message->to($to, $name)->subject
               ('Booking Confirmation');
            $message->from('no-reply@sieindia.in','sieindia');
        });

        //send email admin
        $type = 'admin';
        Mail::send('mail.order_confirm', compact('order','order_items','type'), function($message) use($to, $name) {
            $message->to('info@sieindia.in', 'sieindia')->subject
               ('Booking Confirmation of '. $name);
            $message->from('no-reply@sieindia.in','sieindia');
        });

	}

	public function order_failure_email($order, $order_items, $errorMessage = null)
    {

        $to = $order->email;
        $name = $order->first_name;
        $type = 'client';
        //send email customer
        Mail::send('mail.order_failure', compact('order','order_items','type', 'errorMessage'), function($message) use($to, $name) {
            $message->to($to, $name)->subject
               ('Booking Failure');
            $message->from('no-reply@sieindia.in','sieindia');
        });

        //send email admin
        $type = 'admin';
        Mail::send('mail.order_failure', compact('order','order_items','type', 'errorMessage'), function($message) use($to, $name) {
            $message->to('info@sieindia.in', 'sieindia')->subject
               ('Booking Failure of '. $name);
            $message->from('no-reply@sieindia.in','sieindia');
        });

	}

    function apply_coupon(request $req)
    {
        $code = $req->coupon_code;
        $coupon = DB::table('coupons')->where('is_used', 0)->where('code', $code)->first();
        if($coupon)
        {
            Session::put('coupon_applied', 1);
            Session::put('coupon_code', $code);
            Session::put('coupon_type', $coupon->type);

            // Return both coupon applied status and type
            return response()->json([
                'coupon_applied' => 1,
                'coupon_code' => $code,
                'coupon_type' => $coupon->type
            ]);

        }
        else
        {
            Session::put('coupon_applied', 0);
            Session::put('coupon_code', null);
            Session::put('coupon_type', null);

            // Return both coupon applied status and type
            return response()->json([
                'coupon_applied' => 0,
                'coupon_code' => null,
                'coupon_type' => null
            ]);
        }
    }

    // function apply_coupon(request $req)
    // {
    //     $code = $req->coupon_code;
    //     $coupon = DB::table('coupons')->where('is_used', 0)->where('code', $code)->first();
    //     if($coupon)
    //     {
    //         Session::put('coupon_applied', 1);
    //         Session::put('coupon_code', $code);
    //         Session::put('coupon_type', $coupon->type);
    //     }
    //     else
    //     {
    //         Session::put('coupon_applied', 0);
    //         Session::put('coupon_code', null);
    //         Session::put('coupon_type', null);
    //     }
    //     return Session::get('coupon_applied');
    // }

    public function getCities(Request $request) {
        $stateId = DB::table('states')->where('name', $request->state)->first()->id;
        $cities = DB::table('cities')->where('state_id', $stateId)->orderBy('id', 'asc')->get();
        $html = '<option value="">Select City</option>';

        foreach ($cities as $row) {
            $html .= '<option value="' . $row->name . '">' . $row->name . '</option>';
        }

        echo json_encode($html);
    }

    public function create_user($order) {

        $USER = DB::table('users')->where('phone', $order->phone)->first();
        if(!isset($USER->id)){
            $user_id = DB::table('users')->insertGetId([
                'first_name' => $order->first_name,
                'last_name'  => $order->last_name,
                'email'      => $order->email,
                'phone'      => $order->phone,
                'city'       => $order->city,
                'state'      => $order->state,
                'zipcode'    => $order->zipcode,
                'dci_no'     => $order->dci_no,
                'password' => bcrypt('123123'),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }

        $authenticated = Auth::guard('web')->attempt([
            'email' => $order->email,
            'password' => '123123'
        ]);

    }

    public function webhook_pum_success(Request $request) {

        $fileContent = [
            'headers' => $request->headers->all(),
            'postData' => $request->all(),
        ];

        $filePath = public_path(time().'-success.txt');

        // Create the file
        file_put_contents($filePath, json_encode($fileContent));

        // Read the JSON data from the file
        $jsonData = file_get_contents($filePath); //file_get_contents(public_path('1690456548-success.txt'));

        // Decode the JSON data into an array
        $fileContent = json_decode($jsonData, true);
        $postData = $fileContent['postData'];
        $txnid = $postData['merchantTransactionId'];

        //success
        //order info
        $order = DB::table('orders')->where('payment_id', $txnid)->first();

        //avoid update if payment is paid
        if($order->payment_status == 'unpaid')
        {
            $order_items = DB::table('order_items')->where('order_id', $order->id)->get();

            //update order
            $updateOrder = DB::table('orders')
            ->where('payment_id', $txnid)
            ->update([
    			'resgistration_no' => $this->get_last_reg_no(),
                'payment_status' => 'paid',
                'payment_response' => json_encode($postData),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            //deduct seats
            foreach($order_items as $item)
            {
                $updateSlots = DB::table('slots')
                ->where('id', $item->slot_id)
                ->decrement('slot_seats', 1);
            }

            //masrk used coupon
            if(!empty($order->coupon_code))
            {
                $updateCoupon = DB::table('coupons')
                ->where('code', $order->coupon_code)
                ->update(['is_used' => 1]);
            }

            //fresh order info
            $order = DB::table('orders')->where('payment_id', $txnid)->first();
            $order_items = DB::table('order_items')->where('order_id', $order->id)->get();

            //create user
            $this->create_user($order);

            $this->order_confirm_email($order, $order_items);

            // Create success
            file_put_contents(public_path($txnid.'-success.txt'), $txnid);
        }else{
            return 'false';
        }
    }

    public function webhook_pum_fail(Request $request){
        $fileContent = [
            'headers' => $request->headers->all(),
            'postData' => $request->all(),
        ];

        $filePath = public_path(time().'-fail.txt');

        // Create the file
        file_put_contents($filePath, json_encode($fileContent));
    }

    public function payment_check_pum($txn_id){

        // URL to which the POST request is being sent
        $url = "https://info.payu.in/merchant/postservice?form=2";

        // Data payload of the request
        $data = array(
            'key' => 'kDGn2p', // Replace with the actual merchant key
            'command' => 'verify_payment',
            'var1' => 'df06fd70ff5c1aaf7ebb',
            'hash' => '11e60df931820d4ba95733c621b239c28442db4669f739ea8d332a83b207366a5f934c40dc2e481a574c37ff91691521ff4cbc1a0e0c44f90d830bfba3bcafc3'
        );

        // Initialize cURL session
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'accept: application/json',
            'Content-Type: application/x-www-form-urlencoded'
        ));

        // Execute cURL request
        $response = curl_exec($ch);

        // Check for cURL errors
        if (curl_errno($ch)) {
            echo 'cURL error: ' . curl_error($ch);
        }

        // Close cURL session
        curl_close($ch);

        // Output the response
        echo $response;

    }


}
