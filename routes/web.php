<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
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


Route::prefix('crm')
    ->name('crm.')
    ->group(function () {
        Route::get('login', [AuthController::class, 'loginForm'])->name('login-form');
        Route::post('login', [AuthController::class, 'login'])->name('login');

        Route::middleware('auth')->group(function () {
            Route::resource('companies', CompanyController::class);
            Route::get('company-drop-down',[CompanyController::class,'dropDownList'])
                ->name('company-drop-down');
            Route::resource('clients', ClientController::class);
        });
    });
