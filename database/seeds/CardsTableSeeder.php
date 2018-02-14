<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CardsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $statement = "ALTER TABLE cards AUTO_INCREMENT = 1;";
        DB::unprepared($statement);

        $maxCards = 20;
        $colors = array("Blue", "Red", "Yellow", "Green"); // size 3
        $types = array("Attacker", "Defender", "King", "Medic"); // size 4

        for ($x = 0; $x <= $maxCards; $x++) {
            $currentType = $types[rand(0, 3)];
            $currentColor = $colors[rand(0, 3)];
            $currentDesc = str_random(5);
            $title = $currentType . " " . $currentDesc;

            $image_path= "/img/" . strtolower($currentType) . ".png";

            DB::table('cards')->insert(array(
                array('title' => $title, 'color' => $currentColor, 'value' => rand(1, 10),
                    'description' => $currentDesc, 'type' => $currentType, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
                    'image_path' => $image_path,),

            ));
        }

    }
}
