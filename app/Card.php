<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cards';

    function AssignImagePath($card)
    {
        if ($card->type == "Attacker") {
            $card->image_path = "/img/attacker.png";
        } else if ($card->type == "Defender") {
            $card->image_path = "/img/defender.png";
        } else if ($card->type == "Medic") {
            $card->image_path = "/img/medic.png";
        } else if ($card->type == "Leader") {
            $card->image_path = "/img/leader.png";
        }

        return $card;
    }
}
