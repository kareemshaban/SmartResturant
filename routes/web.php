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

Route::group(['prefix' => LaravelLocalization::setLocale(),
'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],

function()
{
    Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('index');
    Route::get('about', [App\Http\Controllers\FrontController::class, 'about'])->name('about');
    
   ////////////////////////////////////////////////////////////////////////////////////////////
   /* REGION CPANEL ROUTES*/
   Route::get('/home', [App\Http\Controllers\DashboradController::class, 'index'])->name('home');

    //religions routes
    Route::get('/religions', [App\Http\Controllers\DashboradController::class, 'religions'])->name('religions');
    Route::get('/createReligion', [App\Http\Controllers\DashboradController::class, 'createReligion'])->name('createReligion');
    Route::post('/storeReligion', [App\Http\Controllers\DashboradController::class, 'storeReligion'])->name('storeReligion');
    Route::get('/editReligion/{id}', [App\Http\Controllers\DashboradController::class, 'editReligion'])->name('editReligion');
    Route::post('/updateReligion/{id}', [App\Http\Controllers\DashboradController::class, 'updateReligion'])->name('updateReligion');
    Route::get('/destroyReligion/{id}', [App\Http\Controllers\DashboradController::class, 'destroyReligion'])->name('destroyReligion');

    
    
    


       ////////////////////////////////////////////////////////////////////////////////////////////
    Auth::routes();

});


