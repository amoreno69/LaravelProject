<?php


use App\Models\Subasta;

use App\Http\Controllers\CotxeController;
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

Route::get('/', function () {
    $subastes = Subasta::all();
    $user = Auth::user();
    return view('auth/login', compact('subastes','user'));
})->name('home');

Route::post('/', 'App\Http\Controllers\HomeController@afegir')->name('saldo');

Auth::routes();

Route::get('/myObjects/newObject', 'App\Http\Controllers\CotxeController@verCrearCotxe')->name('verCrearCotxe');
Route::post('/myObjects/newObject', 'App\Http\Controllers\CotxeController@crearCotxe')->name('crearCotxe');

Route::get('/myObjects', 'App\Http\Controllers\CotxeController@allCotxes')->name('allCotxes');

Route::get('/auctions', 'App\Http\Controllers\SubastaController@allMySubastas')->name('allMySubastas');
Route::get('/bids', 'App\Http\Controllers\IlitacioController@allIlitacions')->name('allIlitacions');

Route::get('/bid/{id}', 'App\Http\Controllers\IlitacioController@crearLicitacio_Subasta')->name('crearIlitacio');
Route::get('/bid/lowerPrice/{id}', 'App\Http\Controllers\SubastaController@baixarPreu')->name('baixarPreu');

Route::get('/auction', 'App\Http\Controllers\SubastaController@createSubasta')->name('createSubasta');
Route::post('/auction', 'App\Http\Controllers\SubastaController@crearSubasta')->name('crearSubasta');

Route::get('/check', 'App\Http\Controllers\SubastaController@check')->name('check');