<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

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

Route::get('/', ['as' => 'main', 'uses' => 'MainController@main']);
Route::post('/create_url', ['as' => 'create_url', 'uses' => 'UrlController@createShortLink']);

Route::get('/stats', function() {
    return redirect()->route('main');
});

Route::get('/{code}', ['as' => 'short', 'uses' => 'UrlController@redirectUser']);
Route::get('/stats/{code}', ['as' => 'stats', 'uses' => 'StatisticController@get']);
