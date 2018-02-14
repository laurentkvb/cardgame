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

        $statement = "ALTER TABLE users AUTO_INCREMENT = 1;";
        DB::unprepared($statement);


        DB::table('users')->insert([
            'name' => "Laurent Kleering van Beerenbergh",
        ]);

    }
}