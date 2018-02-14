<?php

use App\User_card;
use App\Card;


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

Route::get('/card/collection', 'CardController@home');
Route::get('/', 'CardController@home');
Route::get('/card/deck', 'CardController@cardDeck');

Route::get('/card/add', 'CardController@displayAddCard');

Route::post('/card/collection/{card_id}', 'CardController@addCard');

Route::post('/card', 'CardController@validateCreateCard');



Route::delete('/card/deck/{user_id}/{user_card_id}', 'CardController@deleteCardDeck');

