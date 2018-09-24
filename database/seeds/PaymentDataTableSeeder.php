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
            'request_date' => Carbon::now('Asia/Jakarta'),
            'expired_date' => Carbon::now('Asia/Jakarta')->addDays(2),
            'ticket_price' => 200000,
            'booking_code' => '123ABCD',
            'total_price' => 200000,
            'created_at' => '2018-09-02 00:00:00',
            'updated_at' => '2018-09-02 00:00:00'
        );
        $payment2 = array(
            'user_id' => 'WGGGLD0001',
            'request_date' => Carbon::now('Asia/Jakarta'),
            'expired_date' => Carbon::now('Asia/Jakarta')->addDays(2),
            'ticket_price' => 300000,
            'booking_code' => '456DEF',
            'total_price' => 600000,
            'created_at' => '2018-09-02 00:00:00',
            'updated_at' => '2018-09-02 00:00:00'
        );
        DB::table('payment_data')->insert([ $payment1, $payment2 ]);
    }
}
