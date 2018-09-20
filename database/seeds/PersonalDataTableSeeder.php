<?php

use Illuminate\Database\Seeder;

class PersonalDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data1 = array(
            'user_id' => 'c75fb240-565e-459f-83f9-422f37e9c60d',
            'identity_card' => '0123456789101112',
            'identity_card_photo' => '/img/andy.png',
            'fullname' => 'Andy',
            'email' => 'andy@test.com',
            'phone_number' => '0811111111',
            'domicile' => 'Jakarta',
            'domicile_city' => 'Jakarta Selatan',
            'age' => 40,
            'booking_code' => '123ABCD',
            'total_price' => 4000000,
            'created_at' => '2018-09-02 00:00:00',
            'updated_at' => '2018-09-02 00:00:00'
        );
        $data2 = array(
            'user_id' => '6ea51174-8db6-4e7d-909d-bc535010f5fb',
            'identity_card' => '2233445566778899',
            'identity_card_photo' => '/img/jerome.png',
            'fullname' => 'Jerome',
            'email' => 'jerome@test.com',
            'phone_number' => '08222222222',
            'domicile' => 'Jakarta',
            'domicile_city' => 'Jakarta Utara',
            'age' => 20,
            'booking_code' => '678DEFG',
            'total_price' => 2000000,
            'created_at' => '2018-09-02 00:00:00',
            'updated_at' => '2018-09-02 00:00:00'
        );
        DB::table('personal_data')->insert([ $data1, $data2 ]);
    }
}
