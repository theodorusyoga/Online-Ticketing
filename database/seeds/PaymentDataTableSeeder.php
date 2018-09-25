<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PaymentDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payment1 = array(
            'user_id' => 'WGGBRZ0001',
            'transaction_date' => '2018-09-25 00:41:12',
            'status_code' => '200',
            'message' => 'notification',
            'signature_key' => 'ab6c0827ea84fff56dfd57f5f7b32513dd6da04e7cf52557f59c147fa6d6e033e32c2b8c419e837f6e204a23e82b2452ea9a48e207d1e470748ea06a2fe61a08',
            'payment_type' => 'credit_card',
            'masked_card'=> '481111-1114',
            'gross_amount' => 40000000.00,
            'channel_response_message' => 'Approved',
            'bank' => 'mandiri',
            'approval_code' => '1537810872811',
            'created_at' => '2018-09-02 00:00:00',
            'updated_at' => '2018-09-02 00:00:00'
        );
        $payment2 = array(
            'user_id' => 'WGGGLD0001',
            'transaction_date' => '2018-09-25 00:41:12',
            'status_code' => '200',
            'message' => 'notification',
            'signature_key' => 'ab6c0827ea84fff56dfd57f5f7b32513dd6da04e7cf52557f59c147fa6d6e033e32c2b8c419e837f6e204a23e82b2452ea9a48e207d1e470748ea06a2fe61a08',
            'payment_type' => 'credit_card',
            'masked_card'=> '481111-1114',
            'gross_amount' => 40000000.00,
            'channel_response_message' => 'Approved',
            'bank' => 'mandiri',
            'approval_code' => '1537810872811',
            'created_at' => '2018-09-02 00:00:00',
            'updated_at' => '2018-09-02 00:00:00'
        );
        DB::table('payment_data')->insert([ $payment1, $payment2 ]);
    }
}
