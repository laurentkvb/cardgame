<?php

use App\User_card;
use App\Card;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




// /**
//  * Display All Cards
//  */
Route::get('/card/collection', function () {
    $cards = Card::paginate(9);

    $notification = "";

    return view('card_collection', [
        'cards' => $cards,
        'notification' => $notification
    ]);
});

// /**
//  * Display All Cards
Route::post('/card/collection/{card_id}', function ($card_id) {

    DB::table('user_cards')->insert(
        ['user_id' => 1,
            'card_id' => $card_id]
    );
    $cards = Card::paginate(9);
    $notification = "success";

    return view('card_collection', [
        'cards' => $cards,
        'notification' => $notification
    ]);
});

//|--------------------------------------------------------------------------

// /**
//  * Display All cards
//  */
Route::get('/card/add', function () {
    return view('card_add');
});


Route::post('/card', function (Request $request) {
    $validator = Validator::make($request->all(), [
//    $this->validate($request,[
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
});
//|--------------------------------------------------------------------------




Route::get('/', function () {
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
});




Route::delete('/card/deck/{user_id}/{user_card_id}', function ($user_id, $user_card_id) {

    DB::table('user_cards')
        ->where('id', '=', $user_card_id)
        ->where('user_id', '=', $user_id)
        ->delete();

    $cards = DB::table('user_cards')
        ->join('cards', 'cards.id', '=', 'user_cards.card_id')
        ->select('cards.*', 'user_cards.id', 'cards.color')
        ->where('user_cards.user_id', 1)
        ->orderBy('cards.created_at', 'asc')
//        ->get();
        ->paginate(9);


    $notification = "success_delete";

        return view('card_deck', [
            'cards' => $cards,
            'notification' => $notification
        ]);


});

Route::get('/card/deck', function () {

    $cards = DB::table('user_cards')
        ->join('cards', 'cards.id', '=', 'user_cards.card_id')
        ->select('cards.*', 'user_cards.id', 'cards.color')
        ->where('user_cards.user_id', 1)
        ->orderBy('user_cards.id', 'asc')
        ->paginate(9);
//    ->get();

    $notification = "";

    return view('card_deck', [
        'cards' => $cards,
        'notification' => $notification
    ]);

});