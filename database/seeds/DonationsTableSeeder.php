<?php

use Illuminate\Database\Seeder;

class DonationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $donation1 = array(
            'name' => 'Test',
            'bank' => 'BCA',
            'amount' => 300000,
            'transfer_date' => '2018-09-30',
            'file' => '/img/test.jpg',
            'other' => 'nothing',
            'created_at' => '2018-09-02 00:00:00',
            'updated_at' => '2018-09-02 00:00:00'
        );
        $donation2 = array(
            'name' => 'Test',
            'bank' => 'BCA',
            'amount' => 300000,
            'transfer_date' => '2018-09-30',
            'file' => '/img/test.jpg',
            'other' => 'nothing',
            'created_at' => '2018-09-02 00:00:00',
            'updated_at' => '2018-09-02 00:00:00'
        );
        DB::table('donations')->insert([ $donation1, $donation2 ]);
    }
}
