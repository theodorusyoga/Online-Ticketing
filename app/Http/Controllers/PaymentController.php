<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Veritrans\Veritrans;

class PaymentController extends Controller
{
    public $bronze = 650000;
    public $bronze_disc = 450000;
    public $silver = 1650000;
    public $silver_disc = 1600000;
    public $gold = 2150000;
    public $gold_disc = 2100000;

    public function __construct(){
        Veritrans::$serverKey = env('VERITRANS_SERVER_KEY', 'SB-Mid-server-EdKtRyYuXH0g9DUChettBAeI');
        Veritrans::$isProduction = false;
    }

    public function requestVeritransUrl(Request $req)
    {
        $ticket_amount = $req['ticket_amount'];
        $user_id = $req['user_id'];
        $ticket_type = $req['ticket_type'];
        $ticket_type = strtolower($ticket_type);
        $student_card = $req['student_card'];
        $name = $req['name'];
        $domicile = $req['domicile'];
        $domicile_city = $req['domicile_city'];
        $phone_number = $req['phone_number'];
        $email = $req['email'];

        $amount = 0;
        switch($ticket_type){
            case 'bronze':
                if($student_card !== '' && $student_card !== null) { // using student card
                    $amount = $ticket_amount * $this->bronze_disc;
                }
                else {
                    $amount = $ticket_amount * $this->bronze;
                }
                break;
            case 'silver':
                if($ticket_amount >= 10) { // using student card
                    $amount = $ticket_amount * $this->silver_disc;
                }
                else {
                    $amount = $ticket_amount * $this->silver;
                }
                break;
            case 'gold':
                if($ticket_amount >= 10) { // using student card
                    $amount = $ticket_amount * $this->gold_disc;
                }
                else {
                    $amount = $ticket_amount * $this->gold;
                }
                break;
            default:
                break;
        }

        $veritrans = new Veritrans;
        $transaction_details = array(
            'order_id'      => $user_id,
            'gross_amount'  => $amount
        );
        // Populate items
        $items = [
            array(
                'id'            => $ticket_type,
                'price'         => $amount,
                'quantity'  => 1,
                'name'          => $ticket_type
            )
        ];

        // Populate customer's billing address
        $billing_address = array(
            'first_name'        => $name,
            'last_name'         => "",
            'address'           => $domicile,
            'city'              => $domicile_city,
            'postal_code'       => "",
            'phone'             => $phone_number,
            'country_code'      => 'IDN'
            );
        // Populate customer's shipping address
        $shipping_address = array(
            'first_name'        => $name,
            'last_name'         => "",
            'address'           => $domicile,
            'city'              => $domicile_city,
            'postal_code'       => "",
            'phone'             => $phone_number,
            'country_code'      => 'IDN'
            );
        // Populate customer's Info
        $customer_details = array(
            'first_name'            => $name,
            'last_name'             => "",
            'email'                     => $email,
            'phone'                     => $phone_number,
            'billing_address' => $billing_address,
            'shipping_address'=> $shipping_address
            );
        // Data yang akan dikirim untuk request redirect_url.
        $transaction_data = array(
            'payment_type'          => 'vtweb',
            'vtweb'                         => array(
                //'enabled_payments'    => [],
                'credit_card_3d_secure' => true
            ),
            'transaction_details'=> $transaction_details,
            'item_details'       => $items,
            'customer_details'   => $customer_details
        );

        try
        {
            $url = $veritrans->vtweb_charge($transaction_data);
            return json_encode(array(
                'status' => 0,
                'url' => $url
            ));
        }
        catch (Exception $e)
        {
            return json_encode(array(
                'status' => 1,
                'url' => 'Error occured'
            ));
        }
    }
}
