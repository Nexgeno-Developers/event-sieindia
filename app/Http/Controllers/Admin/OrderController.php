<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller\AuthController;

class OrderController extends Controller
{
    //
	public function index()
	{
        $pageInfo = array(
            'name' => 'orders'
        );

		$status = isset($_GET['status']) ? $_GET['status'] : null;

		if($status)
		{
		   $orders = DB::table('orders')->where('payment_status', $status)->orderBy('id', 'desc')->get();
		}
		else
		{
           $orders = DB::table('orders')->orderBy('id', 'desc')->get();
		}

        return view('admin.orders.index')->with(compact('pageInfo', 'orders'));
	}

	public function logs()
	{
        $pageInfo = array(
            'name' => 'Logs'
        );
        $logs = DB::table('log')->orderBy('id', 'desc')->get();
        return view('admin.logs.index')->with(compact('pageInfo', 'logs'));
	}

	//
	public function seats()
	{
        $pageInfo = array(
            'name' => 'seats'
        );
        $orders = DB::table('slots')->orderBy('id', 'desc')->get();
        return view('admin.seats.index')->with(compact('pageInfo', 'orders'));
	}

	public function add_seats(Request $request){
		  $data = $request->all();

		  $USER = auth()->guard('admins')->user()->id;
		  $slots = DB::table('slots')->where('id', $data["id"])->first();

		  if($data["number_of_seats"] != 0){
			if($data["number_of_seats"] > 0){
				$des = $data["number_of_seats"] . ' Seats added in Workshop No: ' . $slots->workshop;
			} else {
				$des = $data["number_of_seats"] . 'Seats remove in Workshop No : ' . $slots->workshop;
			}
		  }

		  if($data["number_of_seats"] == 0){

			return redirect()->route('admin.seats')->with('danger', 'Please Enter a valid Number');

		  } elseif($data["number_of_seats"] < 0){

			$sub = $slots->slot_seats + $data["number_of_seats"] ;
			if($slots->slot_seats != 0 && $sub >= 0){
				$query = DB::table('slots')->where('id', $data["id"])->increment('slot_seats', $data["number_of_seats"]);

				$values = array('admin_id' => $USER ,'description' => $des, 'created_at' => date('Y-m-d H:i:s') );
				$log = DB::table('log')->insert($values);

				return redirect()->route('admin.seats')->with('success', 'Sests Update Successfully');
			} else {
				return redirect()->route('admin.seats')->with('danger', 'Insufficient Seats');
			}

		  } else {

			$query = DB::table('slots')->where('id', $data["id"])->increment('slot_seats', $data["number_of_seats"]);

			$values = array('admin_id' => $USER ,'description' => $des, 'created_at' => date('Y-m-d H:i:s') );
			$log = DB::table('log')->insert($values);

			return redirect()->route('admin.seats')->with('success', 'Sests Update Successfully');

		  }


	}

	public function list_coupon()
	{
        $pageInfo = array(
            'name' => 'List of Coupons'
        );
        $coupons = DB::table('coupons')->orderBy('id', 'desc')->get();
        return view('admin.coupon.index')->with(compact('pageInfo', 'coupons'));
	}

	public function add_coupon(Request $request){
		$data = $request->all();

		$code = strtoupper($data ["coupon_start"].$data ["coupon_code"]) ;

		$coupon = DB::table('coupons')->where('code', $code)->count();

		if($coupon == 0){
			// $values = array('code' => $code , 'created_at' => date('Y-m-d H:i:s') );

            // Prepare data to be inserted into the coupons table
            $values = array(
                'code' => $code,                  // The generated coupon code
                'type' => $data["coupon_type"],    // The selected coupon type (Advanced or Premium)
                'created_at' => now(),             // Current timestamp for coupon creation
            );

			$log = DB::table('coupons')->insert($values);
			return redirect()->route('admin.coupon')->with('success', 'Coupon Added Successfully');
		}else{
			return redirect()->route('admin.coupon')->with('danger', 'Coupon Already Exists');
		}

	}

	public function delete_coupon(Request $request, $id){
		$del = DB::table('coupons')->where('id', $id)->delete();

		return redirect()->route('admin.coupon')->with('success', 'Coupon Deleted Successfully');
	}

	public function business_settings(){
		$pageInfo = array(
            'name' => 'Business Settings'
        );
		$business_settings = DB::table('business_settings')->where('id', '1')->first();
        return view('admin.settings.index')->with(compact('pageInfo','business_settings'));
	}

	public function update_business_settings(Request $request){
		$data = $request->all();

		$business_settings = DB::table('business_settings')->where('id', '1')->update(array('checkbox' => $data["number_of_select_option"], 'number_of_order' => $data["number_of_order"]));

		if($business_settings){
			return redirect()->route('admin.business_settings')->with('success', 'Updated Successfully');
		}else{
			return redirect()->route('admin.business_settings')->with('danger', 'something went wrong please try again');
		}

	}

	public function customer_report()
	{
        $pageInfo = array(
            'name' => 'All Registerd Doctor'
        );
        $customer = DB::table('users')->orderBy('id', 'desc')->get();
        return view('admin.report.index')->with(compact('pageInfo', 'customer'));
	}


}
