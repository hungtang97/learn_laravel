<?php

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
    return view('welcome');
});
Route::get('/hello', function () {
    return view('hello');
});

Route::get( 'xin-chao/{ten?}/{namsinh?}' , function($ten='nguyễn thế Phúc',$namsinh='1994'){ 
return 'Chào bạn: ' . $ten.'<br>Có năm sinh là: '.$namsinh; 
});

// Route::get('/userslist', function () {
//     $users = DB::table('users')->get();
//     return view('userslist', ['users' => $users]);
// });

Route::get('/checkDB', function ()
{
    dd(DB::connection()->getDatabaseName());
});

Route::get('userslist', 'Controller@index');
Route::post('handle-form', 'HandleController@handleRequest');
