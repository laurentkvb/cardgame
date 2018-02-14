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
    $cards = DB::table('cards')
        ->select('cards.*')
        ->orderBy('id', 'desc')
        ->get();

    return view('card_collection', [
        'cards' => $cards
    ]);
});

// /**
//  * Display All cards
//  */
Route::get('/card/add', function () {
    return view('add_card');
});


Route::post('/card', function (Request $request) {
    $validator = Validator::make($request->all(), [
//    $this->validate($request,[
        'title' => 'required|max:100' ,
        'color' => 'required|max:100',
        'value' => 'required|min:1|max:10',
        'description' => 'required|min:2|max:50',
        'type' => 'required|min:1',
    ],[
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

Route::get('/', function () {
    $cards = DB::table('user_cards')
        ->join('cards', 'cards.id', '=', 'user_cards.id')
        ->select('cards.*', 'user_cards.id', 'cards.color')
        ->where('user_cards.user_id', 1)
        ->get();

    return view('my_cards', [
        'cards' => $cards
    ]);
});

Route::get('/card/deck', function () {

    $cards = DB::table('user_cards')
        ->join('cards', 'cards.id', '=', 'user_cards.id')
        ->select('cards.*', 'user_cards.id', 'cards.color')
        ->where('user_cards.user_id', 1)
        ->get();

    return view('my_cards', [
        'cards' => $cards
    ]);
});

Route::delete('/card/{user_id}/{card_id}', function ($id, $card_id) {
//    User_card::findOrFail($id)->delete();
    DB::table('user_cards')->where('user_id', '=', $id)
        ->where('card_id', '=', $card_id)
        ->delete();

    return redirect('/');
});