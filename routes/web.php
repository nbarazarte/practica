<?php

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
    //return view('welcome');


    //$users = App\User::all();
    //return view('index', compact('users'));

    return view('index');

});
/*
Route::get('api/users', function () {

	return Datatables::eloquent(App\User::query())->make(true);

});

*/
Route::get('api/users', [
		'uses' => 'TablaController@tabla',
		'as' =>'tabla'
]);

Route::post('/subir', [
		'uses' => 'ImportController@import',
		'as' =>'subir'
]);
