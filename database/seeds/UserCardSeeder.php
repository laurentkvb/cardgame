<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserCardSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $statement = "ALTER TABLE user_cards AUTO_INCREMENT = 1;";
        DB::unprepared($statement);

        $defaultCardAmount = 5;

        for ($x = 0; $x <= $defaultCardAmount; $x++) {
            DB::table('user_cards')->insert(array(
                array('user_id' => 1, 'card_id' => $x + 1),
            ));

        }

    }
}