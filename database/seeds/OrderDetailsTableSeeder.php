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
            'user_id' => 'WGGBRZ0001',
            'registration_type' => '1',
            'job_status' => 'Wirausaha',
            'group_name' => 'Hura-hura',
            'ticket_type' => 'bronze',
            'ticket_amount' => 1,
            'transport_to_hotel' => 1,
            'created_at' => '2018-09-02 00:00:00',
            'updated_at' => '2018-09-02 00:00:00'
        );
        $order2 = array(
            'user_id' => 'WGGGLD0001',
            'registration_type' => '2',
            'job_status' => 'Pegawai',
            'group_name' => 'Senang sendiri',
            'ticket_type' => 'gold',
            'ticket_amount' => 2,
            'transport_to_hotel' => 0,
            'created_at' => '2018-09-02 00:00:00',
            'updated_at' => '2018-09-02 00:00:00'
        );
        DB::table('order_details')->insert([ $order1, $order2 ]);
    }
}
