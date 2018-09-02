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
        $donation = array(
            'fullname' => 'This is fullname',
            'phone' => '08080808',
            'email' => 'test@example.com',
            'usertypeid' => 1,
            'created_at' => '2018-09-02 00:00:00',
            'updated_at' => '2018-09-02 00:00:00'
        );
        DB::table('donations')->insert($donation);
    }
}
