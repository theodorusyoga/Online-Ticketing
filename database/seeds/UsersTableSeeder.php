<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = array(
            'name' => 'Administrator',
            'email' => 'admin@wgg-globalupr.com',
            'password' => bcrypt('pass@word1'),
            'created_at' => '2018-09-02 00:00:00',
            'updated_at' => '2018-09-02 00:00:00'
        );
        $user2 = array(
            'name' => 'User',
            'email' => 'user@wgg-globalupr.com',
            'password' => bcrypt('pass@word1'),
            'created_at' => '2018-09-02 00:00:00',
            'updated_at' => '2018-09-02 00:00:00'
        );
        DB::table('users')->insert([ $user1, $user2 ]);
    }
}
