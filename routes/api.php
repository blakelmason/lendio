<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Cat;
use App\Rating;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('cats', function() {
    return Cat::all();
});

Route::get('cats/random', function() {
    $data['cat'] = Cat::inRandomOrder()->limit(1)->get();
    $data['average'] = Rating::where('cat_id', $data['cat'][0]['id'])->avg('stars');
    return $data;
});

Route::post('ratings', function(Request $request) {
    return Rating::create(($request->all()));
});
