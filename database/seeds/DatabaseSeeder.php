<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_cards')->delete();
        DB::table('cards')->delete();
        DB::table('users')->delete();

        $this->call(CardsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(UserCardSeeder::class);

    }
}