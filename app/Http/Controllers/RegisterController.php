<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\OrderDetails;
use App\PersonalData;
use App\PaymentData;

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
                'message' => 'Register step 1 saved',
                'user_id' => $user_id
            ));
        }
        catch(QueryException $e){
            return json_encode(array(
                'status' => 1,
                'message' => 'Unknown error while saving'
            ));
        }
    }
    public function registerStep2(Request $req){
        $user_id = $req['user_id'];
        $identity_card = $req['identity_card'];
        $fullname = $req['fullname'];
        $email = $req['email'];
        $phone_number = $req['phone_number'];
        $domicile = $req['domicile'];
        $domicile_city = $req['domicile_city'];
        $age = $req['age'];
        $booking_code = $req['booking_code'];
        $total_price = $req['total_price'];

        $personaldata = new PersonalData();
        $personaldata->user_id = $user_id;
        $personaldata->identity_card = $identity_card;
        $personaldata->fullname = $fullname;
        $personaldata->email = $email;
        $personaldata->phone_number = $phone_number;
        $personaldata->domicile = $domicile;
        $personaldata->domicile_city = $domicile_city;
        $personaldata->age = $age;

        if($req->file('identity_card_photo') != null){
            $file = $req->file('identity_card_photo');
            $path = $file->store('public/registerfiles');
            $file = Storage::url($path);
            $personaldata->identity_card_photo = $file;
        }

        try{
            $personaldata->save();
            return json_encode(array(
                'status' => 0,
                'message' => 'Register step 2 saved'
            ));
        }
        catch(QueryException $e){
            return json_encode(array(
                'status' => 1,
                'message' => 'Unknown error while saving'
            ));
        }
    }

    public function registerStep3(Request $req){
        $user_id = $req['user_id'];
        $request_date = $req['request_date'];
        $expired_date = $req['expired_date'];
        $ticket_price = $req['ticket_price'];
        $booking_code = $req['booking_code'];
        $total_price = $req['total_price'];

        $paymentdata = new PaymentData();
        $paymentdata->user_id = $user_id;
        $paymentdata->request_date = $request_date;
        $paymentdata->expired_date = $expired_date;
        $paymentdata->ticket_price = $ticket_price;
        $paymentdata->booking_code = $booking_code;
        $paymentdata->total_price = $total_price;

        try{
            $paymentdata->save();
            return json_encode(array(
                'status' => 0,
                'message' => 'Register step 3 saved'
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
