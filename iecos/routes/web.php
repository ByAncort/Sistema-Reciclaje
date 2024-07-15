<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\SignUp;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Tables;
use App\Http\Livewire\StaticSignIn;
use App\Http\Livewire\SolicitudReciclaje;
use App\Http\Livewire\Valores;
use App\Http\Livewire\CanjeosRecompensas;
use App\Http\Livewire\AdministratorController;
use App\Http\Livewire\addUserController;
use App\Http\Livewire\LaravelExamples\UserProfile;
use App\Http\Livewire\LaravelExamples\UserManagement;
use App\Http\Livewire\Reciclable;

use App\Http\Livewire\StoreController;

use Illuminate\Http\Request;

use App\Http\Controllers\WelcomeController;

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

Route::get('/', function() {
    return redirect('/welcome');
});


    Route::get('/', [WelcomeController::class, 'render']);
    Route::get('/sign-up', SignUp::class)->name('sign-up');
    Route::get('/login', Login::class)->name('login');
    Route::get('/reset-password/{id}',ResetPassword::class)->name('reset-password')->middleware('signed');
    Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/tables', Tables::class)->name('tables');
    Route::get('/user-profile', UserProfile::class)->name('user-profile');
    
    //Owner
    Route::middleware('role:1,2')->group(function () {
        Route::post('/edit-reward/{id}', [StoreController::class, 'update'])->name('edit-reward');

        Route::get('/users', AdministratorController::class)->name('user');
        Route::post('/add', 'AddUserController@save')->name('add'); 
        Route::get('/Valores', Valores::class)->name('Valores');
        Route::get('/reciclable', Reciclable::class)->name('reciclable');
        Route::get('/canjeos-recompensas', CanjeosRecompensas::class)->name('canjeos recompensas');
        });
    Route::get('/solicitud', SolicitudReciclaje::class)->name('solicitud');
    Route::post('/add-rewards', StoreController::class . '@add')->name('add-rewards');
    Route::get('/store', StoreController::class)->name('store');
    
});