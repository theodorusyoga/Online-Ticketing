<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(UserTypesTableSeeder::class);
        $this->call(DonationsTableSeeder::class);
        $this->call(VolunteersTableSeeder::class);
        $this->call(OrderDetailsTableSeeder::class);
        $this->call(PersonalDataTableSeeder::class);
        $this->call(PaymentDataTableSeeder::class);
        $this->call(ConfirmationsTableSeeder::class);
    }
}
