<?php

use Illuminate\Database\Seeder;

class ConfirmationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $confirmation1 = array(
            'user_id' => 'WGGBRZ0001',
            'name' => 'Test',
            'bank' => 'BCA',
            'amount' => 300000000,
            'transfer_date' => '2018-09-30',
            'file' => '/img/test.jpg',
            'other' => 'nothing',
            'created_at' => '2018-09-02 00:00:00',
            'updated_at' => '2018-09-02 00:00:00'
        );
        $confirmation2 = array(
            'user_id' => 'WGGGLD0001',
            'name' => 'Test',
            'bank' => 'BCA',
            'amount' => 200000000,
            'transfer_date' => '2018-09-30',
            'file' => '/img/test.jpg',
            'other' => 'nothing',
            'created_at' => '2018-09-02 00:00:00',
            'updated_at' => '2018-09-02 00:00:00'
        );
        DB::table('confirmations')->insert([ $confirmation1, $confirmation2 ]);
    }
}
