<?php

namespace App\Http\Controllers;

use App\User;
use Paystack;
use Illuminate\Http\Request;
use App\Mail\RegVerificationMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        return Paystack::getAuthorizationUrl()->redirectNow();
    }
    
    /**
     * Obtain Paystack payment information
     * Register new user
     * @return void
     */
    public function handleGatewayCallback(Request $request)
    {
        $this->validateRequest($request);

        $token = (str_random(6));
        $user_id = mt_rand(100, 999);    
        $password = (str_random(6));
        $default_avater = 'https://res.cloudinary.com/iro/image/upload/v1552487696/Backtick/noimage.png';

        $paymentDetails = Paystack::getPaymentData();

        //start temporay transaction 
        DB::beginTransaction();

        try {
        
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'class' => $request->input('class'),
            
            'user_id' => $request->input('class') . $user_id,
            'password' => $password,
            'pob' => $request->input('pob'),
            'dob' => $request->input('dob'),
            'lga' => $request->input('lga'),
            'state' => $request->input('state'),
            
            'level' => $request->input('level'),
            'phone' => $request->input('phone'),
            'gender' => $request->input('gender'),
            'address' => $request->input('address'),
            'occupation' => $request->input('occupation'),
            'nationality' => $request->input('nationality'),

            'marital_status' => $request->input('marital_status'),
            'token' => $token,
            'avater' => $default_avater,
        ]);
        
			Mail::to($user->email)->send(
                new RegVerificationMail($user)
            );
 
            $res['success'] = true;
            $res['message'] = "Registration Successful! A Confirmation Mail has been Sent to $user->email";
            $res['data'] = $user;            
            $res['paymentDetails'] = $paymentDetails;            

            DB::commit();

            return response()->json($res, 201);

        }catch(\Exception $e) {
            //if any operation fails, Thanos snaps finger - user was not created
            DB::rollBack();

            $msg['error'] = "Oops! Something went wrong, Try Again!";

            return response()->json($msg, 422);   
        }
    }

    public function validateRequest(Request $request){
		$rules = [
        'name' => 'required|string',
        'email' => 'required|email',
        'class' => 'required|string',

        // 'user_id' => 'required|user_id',
        // 'password' => 'required|password',

		'dob' => 'date|required',
        'pob' => 'string|required',
        'lga' => 'string|required',

        'state' => 'string|required',
        'level' => 'string|required',        
        'phone' => 'required|phone:AUTO,US',

        'gender' => 'string|required',
        'address' => 'string|required',

        'occupation' => 'string|required',
        'nationality' => 'string|required',
        'marital_status' => 'string|required',
		];
		$messages = [
			'required' => ':attribute is required',
            'email' => 'wrong :attribute format',
            'phone' => 'The :attribute field contains an invalid number.',
	];
		$this->validate($request, $rules, $messages);
		}
}
