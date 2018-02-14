<?php

namespace App\Http\Controllers;

use App\Card;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class CardController extends Controller
{
    public function home()
    {
        $cards = Card::paginate(9);

        $notification = "";

        return view('card_collection', [
            'cards' => $cards,
            'notification' => $notification
        ]);
    }

    public function cardDeck()
    {
        $cards = DB::table('user_cards')
            ->join('cards', 'cards.id', '=', 'user_cards.card_id')
            ->select('cards.*', 'user_cards.id', 'cards.color')
            ->where('user_cards.user_id', 1)
            ->orderBy('user_cards.id', 'asc')
            ->paginate(9);

        $notification = "";

        return view('card_deck', [
            'cards' => $cards,
            'notification' => $notification
        ]);

    }

    public function addCard($card_id)
    {

        DB::table('user_cards')->insert(
            ['user_id' => 1,
                'card_id' => $card_id]
        );
        $cards = Card::paginate(9);
        $notification = "success_add";

        return view('card_collection', [
            'cards' => $cards,
            'notification' => $notification
        ]);
    }

    public function validateCreateCard(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:100',
            'color' => 'required|max:100',
            'value' => 'required|min:1|max:10',
            'description' => 'required|min:2|max:50',
            'type' => 'required|min:1',
        ], [
            'title.required' => ' The title field is required.',
            'title.min' => ' The first name must be at least 2 characters.',
            'title.max' => ' The first name may not be greater than 30 characters.',
            'color.required' => ' The last name field is required.',
            'value.max' => ' The value may not be greater than 10.',
            'value.min' => ' The value must be at least 1.',
            'description.max' => ' The description character amount must be greater than 2.',
            'description.min' => ' The description character amount must be less than 50.',
        ]);

        if ($validator->fails()) {
            return redirect('/card/add')
                ->withInput()
                ->withErrors($validator);
        }

        $card = new Card();
        $card->title = $request->title;
        $card->color = $request->color;
        $card->value = $request->value;
        $card->description = $request->description;
        $card->type = $request->type;
        $card->AssignImagePath($card);

        $card->save();

        return redirect('/card/collection');
    }

    public function deleteCardDeck($user_id, $user_card_id)
    {
        DB::table('user_cards')
            ->where('id', '=', $user_card_id)
            ->where('user_id', '=', $user_id)
            ->delete();

        $cards = DB::table('user_cards')
            ->join('cards', 'cards.id', '=', 'user_cards.card_id')
            ->select('cards.*', 'user_cards.id', 'cards.color')
            ->where('user_cards.user_id', 1)
            ->orderBy('cards.created_at', 'asc')
            ->paginate(9);


        $notification = "success_delete";

        return view('card_deck', [
            'cards' => $cards,
            'notification' => $notification
        ]);


    }
    public function displayAddCard () {
        return view('card_add');
    }
}
