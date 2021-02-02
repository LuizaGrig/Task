<?php


use Illuminate\Support\Facades\Auth;
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
;

//
Route::get('/rel', [\App\Http\Controllers\RelationsController::class, 'index']);


Route::get('/{any}', function (){
    return view('spa');
})->where('any', '.*');













//Auth::routes();
//Route::get('/', 'HomeController@index')->name('home');








//Route::get('/admin', 'Admin\DashboardController@index');
//
//Route::get('/user', 'User\DashboardController@index');

//Route::group(['middleware' => ['auth', 'user']], function () {
//    Route::get('/', 'HomeController@index')->name('user.dashboard');
//});
//
//// admin routes
//Route::group(['middleware' => ['auth', 'admin']], function () {
//    Route::get('/', 'HomeController@index')->name('admin.dashboard');
//});




//Route::get('/t', function () {
//    return view('spa');
//});








