<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderDetails;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }
    public function registerStep1(Request $req){
        $user_id = $this->gen_uuid();
        $registration_type = $req['registration_type'];
        $job_status = $req['job_status'];
        $group_name = $req['group_name'];
        $ticket_type = $req['ticket_type'];
        $ticket_amount = $req['ticket_amount'];
        $transport_to_hotel = $req['transport_to_hotel'];
        $orderdetails = new OrderDetails;
        $orderdetails->user_id = $user_id;
        $orderdetails->registration_type = $registration_type;
        $orderdetails->job_status = $job_status;
        $orderdetails->group_name = $group_name;
        $orderdetails->ticket_type = $ticket_type;
        $orderdetails->ticket_amount = $ticket_amount;
        $orderdetails->transport_to_hotel = $transport_to_hotel;

        try{
            $orderdetails->save();
            return json_encode(array(
                'status' => 0,
                'message' => 'Register step 1 saved'
            ));
        }
        catch(QueryException $e){
            return json_encode(array(
                'status' => 1,
                'message' => 'Unknown error while saving'
            ));
        }
    }

    // taken from https://stackoverflow.com/questions/2040240/php-function-to-generate-v4-uuid

    private function gen_uuid() {
        return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

            // 16 bits for "time_mid"
            mt_rand( 0, 0xffff ),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand( 0, 0x0fff ) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand( 0, 0x3fff ) | 0x8000,

            // 48 bits for "node"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        );
    }
}
