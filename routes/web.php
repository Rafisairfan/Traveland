<?php
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RegisterController;
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
Route::get('/home-page', function () {
    return view('Main/homepage');
});
Route::get('/direction-page', function () {
    return view('Main/direction');
});
Route::get('/login-page', function () {
    return view('Main/login');
});
Route::get('/register-page', function () {
    return view('Main/register');
});
Route::get('/profile-page', function () {
    return view('Main/profile');
});
Route::get('/destinasi-page', function () {
    return view('Main/destinasi');
});

Route::get('/login',[LoginController::class,'login']);
Route::post('/login',[LoginController::class,'validation']);
Route::get('/register',[RegisterController::class,'register']);
Route::post('/register',[RegisterController::class,'store']);
Route::get('/store',[RegisterController::class,'store']);
Route::get('/',[MainController::class,'index']);
Route::get('/yschedule',[MainController::class,'yourschedule']);
Route::get('/recdest',[MainController::class,'recomdest']);


