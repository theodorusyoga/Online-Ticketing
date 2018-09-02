<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Donation;
use App\UserType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use JWTAuth;

class AuthController extends Controller
{
    public function auth(Request $req){
        $email = $req['email'];
        $password = $req['password'];
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
           $user = User::where('email', $email)->first();
           $token = JWTAuth::fromUser($user);
           return json_encode(array(
               'token' => $token
           ));
        } else {
            $status = array(
                'status' => 1,
                'message' => 'Invalid Credentials'
            );
            return json_encode($status);
        }
    }

    public function getDonations(){
        return json_encode(Donation::all());
    }

    public function getUserTypes(){
        return json_encode(UserType::all());
    }

    public function confirmDonate(Request $req){
        $fullname = $req['fullname'];
        $phone = $req['phone'];
        $email = $req['email'];
        $usertypeid = $req['usertypeid'];
        $donation = new Donation;
        $donation->fullname = $fullname;
        $donation->phone = $phone;
        $donation->email = $email;
        $donation->usertypeid = $usertypeid;

        try{
            $donation->save();
            return json_encode(array(
                'status' => 0,
                'message' => 'Donation saved'
            ));
        }
        catch(QueryException $e){
            return json_encode(array(
                'status' => 1,
                'message' => 'User type does not exist'
            ));
        }


    }
}
