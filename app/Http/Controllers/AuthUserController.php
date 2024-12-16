<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;



class AuthUserController extends Controller
{
    public function signin()
    {
        $meta = array(
            'name' => 'Signin'
        );
        return view('web.auth.signin')->with(compact('meta'));        
    }

    /*public function signup()
    {
        $meta = array(
            'name' => 'Signup'
        );
        return view('web.auth.signup')->with(compact('meta'));        
    } */

    /*public function otp_page()
    {
        $meta = array(
            'name' => 'verify_otp'
        );
        return view('web.auth.verify-otp')->with(compact('meta'));        
    } */
    
    
    public function verifyuser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|numeric|digits:10'
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('login')->with('danger', 'Phone Number should be 10 digits');
        }
        
        $phone = $request->input('phone'); // Use input() method to get the 'phone' value from the request
    
        $user = DB::table('users')->where('phone', $phone)->first();
            
        if (!$user) {
            // User does not exist, create a new user
            return redirect()->route('login')->with([
                'danger' => 'User does not exist. Please do the registration first and purchase your first slots',
                'link' => 'signin']);
            }
    
        // Log in the user
    
        $authenticated = Auth::guard('web')->attempt([
            'phone' => $request->input('phone'),
            'password' => '123123'
         // You can set a placeholder or any value here
        ]);
        
        if($authenticated)
        {
            return redirect()->route('index');
        }
        else
        {
            return redirect()->route('login')->with([
                'danger' => 'User does not exist. Please do the registration first and purchase your first slots',
                'link' => 'signin']);
        }
    }
    
    public function logout(){
        Auth::logout();
            return redirect()->route('login')->with([
                'success' => 'Logout successfully!',
                'link' => 'signin']);        
    }
    
    

/*
    public function sendOTP(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'phone' => 'required|numeric|digits:10'
        ]);

        if ($validator->fails()) {
             if($request->input('username')){
                return redirect()->route('signup')->with('danger', 'Phone Number should be 10 digits');
            } else {
                return redirect()->route('signin')->with('danger', 'Phone Number should be 10 digits');
            } 
            
             return redirect()->route('signin')->with('danger', 'Phone Number should be 10 digits');
            
        }

        $phone = $request->input('phone');
        //$otp = mt_rand(100000, 999999);
        $otp = '123123';

        $link = 'signin'; 

         if($request->input('username')){
            $username = $request->input('username');
            Session::put('username', $username);
            $link = 'signup';
        } 

        // Save the OTP and phone number in the session
        Session::put('otp', $otp);
        Session::put('phone', $phone);

        // Send the OTP to the user (you may implement your SMS gateway logic here)

        //return view('web.auth.verify-otp')->with(compact('meta'));
        //return redirect()->route('verify_page',['link'=> $link]);	
        
        return redirect()->route('verify_page');	
    }


    public function verifyOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp' => 'required|numeric|digits:6'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('danger', 'OTP should be 6 digits');
        }

        $otp = $request->input('otp');

        if (Session::get('otp') == $otp) {
            $phone = Session::get('phone');

            // Check if the user exists in the database
            $user = DB::table('users')->where('phone', $phone)->first();

            
             if($user){
                if(session()->has('username')){
                    return redirect()->route('signup')->with('danger', 'Phone No already exist. Please Use different');
                }
            } 

            if (!$user) {
                // User does not exist, create a new user

                if(session()->has('username')){
                    $username = Session::get('username');

                    $exist = DB::table('users')->where('username', $username)->first();

                    if($exist){
                        return redirect()->route('signup')->with('danger', 'Username already exist. Please Use different');
                    }

                    $values = ['phone' => $phone, 'username' => $username];
                    $user = DB::table('users')->insert($values);
                } else {
                    return redirect()->route('signup')->with('danger', 'User does not exist. Please sign up');
                } 
                
                return redirect()->route('signin')->with('danger', 'user does not exist. Please do the registration first and purchase your first slots',['link'=> 'index']);

            }

            // Log in the user
            Auth::guard('web');

            // Clear the OTP and phone number from the session
            Session::forget('otp');
            Session::forget('phone');

            return redirect()->route('index');
        }

        return redirect()->back()->with('danger', 'Invalid OTP');
    }
*/

}