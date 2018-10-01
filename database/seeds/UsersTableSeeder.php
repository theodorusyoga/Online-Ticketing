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
        $admin = array(
            'name' => 'Dashboard Admin',
            'email' => 'adminupr',
            'password' => bcrypt('Uprising2019'),
            'role' => 'admin',
            'created_at' => '2018-09-02 00:00:00',
            'updated_at' => '2018-09-02 00:00:00'
        );
        $user1 = array(
            'name' => 'Administrator',
            'email' => 'admin@wgg-globalupr.com',
            'password' => bcrypt('pass@word1'),
            'role' => 'user',
            'created_at' => '2018-09-02 00:00:00',
            'updated_at' => '2018-09-02 00:00:00'
        );
        $user2 = array(
            'name' => 'User',
            'email' => 'user@wgg-globalupr.com',
            'password' => bcrypt('pass@word1'),
            'role' => 'user',
            'created_at' => '2018-09-02 00:00:00',
            'updated_at' => '2018-09-02 00:00:00'
        );
        DB::table('users')->insert([ $admin, $user1, $user2 ]);
    }
}
