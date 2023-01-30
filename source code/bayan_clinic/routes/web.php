<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactUsFormController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\RoomlistingController;
use App\Http\Controllers\AppointmentController;



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

// home page 




Route::get('/', function () {
    return view('index');
});


/// page login and chechks email and password from database
Route::get('/login',[LoginController::class, 'showLogin'])->name('login');
Route::post('/processLogin',[LoginController::class, 'processLogin'])->name('processLogin');

/// page logout
Route::get('/processLogout',[LoginController::class, 'processLogout'])->name('processLogout');

/// page contact us and send data to database
Route::get('/register',[RegisterController::class,'showRegister'])->name('register');
Route::post('/processRegister',[RegisterController::class,'processRegister'])->name('processRegister');



Route::get('/contact', [ContactUsFormController::class, 'createForm']);
Route::post('/contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');


Auth::routes();


Route::group(['middleware' => ['auth']], function (){

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/home',[HomeController::class ,'update'])->name('update');

Route::get('/dashboard',[ContactUsFormController::class,'index'] )->name('dashboard');


Route::resource('blog', BlogController::class);


Route::resource('users', UserController::class);
Route::any('/users', [UserController::class, 'index'])->name('user');


Route::resource('services', ServiceController::class);

Route::post('store/', [RoomlistingController::class, 'store'])->name('store');



Route::resource('sessions',SessionController::class);


Route::resource('rooms_services', RoomController::class);

Route::get('changePassword', [ChangePasswordController::class,'index']);
Route::post('changePassword', [ChangePasswordController::class ,'store'])->name('change.password');


});






Route::get('blogs', [BlogController::class,'viewblog']);

Route::get('blog_detail/{blog}', [BlogController::class,'showdetail'])->name('blog_detail');
Route::get('blog_detail', [BlogController::class,'viewblogs']);


Route::get('service', [ServiceController::class,'show']);

Route::get('about', [HomeController::class,'show']);









Route::get('/rooms', [RoomlistingController::class,'index'] )->name('room');

Route::any('/rooms', [RoomlistingController::class, 'index'])->name('room');

Route::get('/show_room/{room}/', [RoomlistingController::class, 'show'])->name('show_room');






