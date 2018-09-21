<?php

use Illuminate\Database\Seeder;

class OrderDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order1 = array(
            'user_id' => 'c75fb240-565e-459f-83f9-422f37e9c60d',
            'registration_type' => '1',
            'job_status' => 'Wirausaha',
            'group_name' => 'Hura-hura',
            'ticket_type' => '1',
            'ticket_amount' => 1,
            'transport_to_hotel' => 1,
            'created_at' => '2018-09-02 00:00:00',
            'updated_at' => '2018-09-02 00:00:00'
        );
        $order2 = array(
            'user_id' => '6ea51174-8db6-4e7d-909d-bc535010f5fb',
            'registration_type' => '2',
            'job_status' => 'Pegawai',
            'group_name' => 'Senang sendiri',
            'ticket_type' => '2',
            'ticket_amount' => 2,
            'transport_to_hotel' => 0,
            'created_at' => '2018-09-02 00:00:00',
            'updated_at' => '2018-09-02 00:00:00'
        );
        DB::table('order_details')->insert([ $order1, $order2 ]);
    }
}
