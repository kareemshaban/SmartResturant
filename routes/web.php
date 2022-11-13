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
   //departments routes
    Route::get('/departments', [App\Http\Controllers\DashboradController::class, 'departments'])->name('departments');
    Route::get('/createDepartment', [App\Http\Controllers\DashboradController::class, 'createDepartment'])->name('createDepartment');
    Route::post('/storeDepartment', [App\Http\Controllers\DashboradController::class, 'storeDepartment'])->name('storeDepartment');
    Route::get('/editDepartment/{id}', [App\Http\Controllers\DashboradController::class, 'editDepartment'])->name('editDepartment');
    Route::post('/updateDepartment/{id}', [App\Http\Controllers\DashboradController::class, 'updateDepartment'])->name('updateDepartment');
    Route::get('/destroyDepartment/{id}', [App\Http\Controllers\DashboradController::class, 'destroyDepartment'])->name('destroyDepartment');
    //genders routes
    Route::get('/genders', [App\Http\Controllers\DashboradController::class, 'genders'])->name('genders');
    Route::get('/createGender', [App\Http\Controllers\DashboradController::class, 'createGender'])->name('createGender');
    Route::post('/storeGender', [App\Http\Controllers\DashboradController::class, 'storeGender'])->name('storeGender');
    Route::get('/editGender/{id}', [App\Http\Controllers\DashboradController::class, 'editGender'])->name('editGender');
    Route::post('/updateGender/{id}', [App\Http\Controllers\DashboradController::class, 'updateGender'])->name('updateGender');
    Route::get('/destroyGender/{id}', [App\Http\Controllers\DashboradController::class, 'destroyGender'])->name('destroyGender');
    //nationalties routes
    Route::get('/nationalties', [App\Http\Controllers\DashboradController::class, 'nationalties'])->name('nationalties');
    Route::get('/createNationality', [App\Http\Controllers\DashboradController::class, 'createNationality'])->name('createNationality');
    Route::post('/storeNationality', [App\Http\Controllers\DashboradController::class, 'storeNationality'])->name('storeNationality');
    Route::get('/editNationality/{id}', [App\Http\Controllers\DashboradController::class, 'editNationality'])->name('editNationality');
    Route::post('/updateNationality/{id}', [App\Http\Controllers\DashboradController::class, 'updateNationality'])->name('updateNationality');
    Route::get('/destroyNationality/{id}', [App\Http\Controllers\DashboradController::class, 'destroyNationality'])->name('destroyNationality');


       ////////////////////////////////////////////////////////////////////////////////////////////
    Auth::routes();

});