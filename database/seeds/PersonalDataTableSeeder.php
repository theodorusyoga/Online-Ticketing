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
            'user_id' => 'WGGBRZ0001',
            'identity_card' => '0123456789101112',
            'identity_card_photo' => '/img/andy.png',
            'student_card_photo' => '/img/andy.png',
            'fullname' => 'Andy',
            'email' => 'andy@test.com',
            'phone_number' => '0811111111',
            'domicile' => 'Jakarta',
            'domicile_city' => 'Jakarta Selatan',
            'age' => 40,
            'created_at' => '2018-09-02 00:00:00',
            'updated_at' => '2018-09-02 00:00:00'
        );
        $data2 = array(
            'user_id' => 'WGGGLD0001',
            'identity_card' => '2233445566778899',
            'identity_card_photo' => '/img/jerome.png',
            'student_card_photo' => '/img/jerome.png',
            'fullname' => 'Jerome',
            'email' => 'jerome@test.com',
            'phone_number' => '08222222222',
            'domicile' => 'Jakarta',
            'domicile_city' => 'Jakarta Utara',
            'age' => 20,
            'created_at' => '2018-09-02 00:00:00',
            'updated_at' => '2018-09-02 00:00:00'
        );
        DB::table('personal_data')->insert([ $data1, $data2 ]);
    }
}
