<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
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

    public function authAdmin(Request $req){
        $email = $req['email'];
        $password = $req['password'];
        if (Auth::attempt(['email' => $email, 'password' => $password, 'role' => 'admin'])) {
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
}
