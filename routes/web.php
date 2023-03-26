<?php

use Illuminate\Support\Facades\Route;
use League\Flysystem\UrlGeneration\PrefixPublicUrlGenerator;

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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\TerapeutaController;            
            
// rotas padrões antigas
Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');

// rotas padrões para terapeutas
Route::prefix('/auth/terapeuta')->group( function() {
	Route::get('/register', [RegisterController::class, 'terapeutaCreate'])->middleware('guest')->name('auth.terapeuta.register');
	Route::post('/register', [RegisterController::class, 'terapeutaStore'])->middleware('guest')->name('auth.terapeuta.register.perform');
	Route::get('/login', [LoginController::class, 'terapeutaShow'])->middleware('guest')->name('auth.terapeuta.login');
	Route::post('/login', [LoginController::class, 'terapeutaLogin'])->middleware('guest')->name('auth.terapeuta.login.perform');
	Route::get('/dashboard', [HomeController::class, 'terapeutaDashboard'])->name('home')->middleware('auth:terapeuta')->name('terapeuta.dashboard');
});

// rotas padrões antigas para autenticados
Route::group(['middleware' => 'auth'], function () {
	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static'); 
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static'); 
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

// rotas padrões para terapeutas logados
// Route::group(c, function() {
// 	Route::get('/profile', [TerapeutaController::class, 'show'])->name('terapeuta-profile');
// 	Route::post('/profile', [TerapeutaController::class, 'update'])->name('profile.update');
// 	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static'); 
// 	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
// 	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static'); 
// 	Route::get('/{page}', [PageController::class, 'index'])->name('page');
// 	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
// });
