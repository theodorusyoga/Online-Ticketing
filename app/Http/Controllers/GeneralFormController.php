<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use App\Volunteer;
use App\Donation;
use App\UserType;

class GeneralFormController extends Controller
{
    public function getDonations(){
        return json_encode(Donation::all());
    }

    public function getUserTypes(){
        return json_encode(UserType::all());
    }

    public function joinVolunteer(Request $req){
        $fullname = $req['fullname'];
        $phone = $req['phone'];
        $email = $req['email'];
        $usertypeid = $req['usertypeid'];
        $volunteer = new Volunteer;
        $volunteer->fullname = $fullname;
        $volunteer->phone = $phone;
        $volunteer->email = $email;
        $volunteer->usertypeid = $usertypeid;

        try{
            $volunteer->save();
            return json_encode(array(
                'status' => 0,
                'message' => 'Join as volunteer saved'
            ));
        }
        catch(QueryException $e){
            return json_encode(array(
                'status' => 1,
                'message' => 'User type does not exist'
            ));
        }
    }

    public function confirmDonate(Request $req){
        $name = $req['name'];
        $bank = $req['bank'];
        $amount = $req['amount'];
        $transfer_date = $req['transfer_date'];

        $other = $req['other'];
        $donation = new Donation;
        $donation->name = $name;
        $donation->bank = $bank;
        $donation->amount = $amount;
        $donation->transfer_date = $transfer_date;

        $donation->other = $other;

        if($req->file('file') != null){
            $file = $req->file('file');
            $path = $file->store('public/files');
            $file = Storage::url($path);
            $donation->file = $file;
        }

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
                'message' => $e
            ));
        }
    }
}
