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
    //nationalties routes
    Route::get('/maritalStatus', [App\Http\Controllers\DashboradController::class, 'maritalStatus'])->name('maritalStatus');
    Route::get('/createMaritalStatus', [App\Http\Controllers\DashboradController::class, 'createMaritalStatus'])->name('createMaritalStatus');
    Route::post('/storeMaritalStatus', [App\Http\Controllers\DashboradController::class, 'storeMaritalStatus'])->name('storeMaritalStatus');
    Route::get('/editMaritalStatus/{id}', [App\Http\Controllers\DashboradController::class, 'editMaritalStatus'])->name('editMaritalStatus');
    Route::post('/updateMaritalStatus/{id}', [App\Http\Controllers\DashboradController::class, 'updateMaritalStatus'])->name('updateMaritalStatus');
    Route::get('/destroyMaritalStatus/{id}', [App\Http\Controllers\DashboradController::class, 'destroyMaritalStatus'])->name('destroyMaritalStatus');
    //jobs routes
    Route::get('/jobs', [App\Http\Controllers\DashboradController::class, 'jobs'])->name('jobs');
    Route::get('/createJob', [App\Http\Controllers\DashboradController::class, 'createJob'])->name('createJob');
    Route::post('/storeJob', [App\Http\Controllers\DashboradController::class, 'storeJob'])->name('storeJob');
    Route::get('/editJob/{id}', [App\Http\Controllers\DashboradController::class, 'editJob'])->name('editJob');
    Route::post('/updateJob/{id}', [App\Http\Controllers\DashboradController::class, 'updateJob'])->name('updateJob');
    Route::get('/destroyJob/{id}', [App\Http\Controllers\DashboradController::class, 'destroyJob'])->name('destroyJob');
    //Education routes
    Route::get('/educations', [App\Http\Controllers\DashboradController::class, 'educations'])->name('educations');
    Route::get('/createEducation', [App\Http\Controllers\DashboradController::class, 'createEducation'])->name('createEducation');
    Route::post('/storeEducation', [App\Http\Controllers\DashboradController::class, 'storeEducation'])->name('storeEducation');
    Route::get('/editEducation/{id}', [App\Http\Controllers\DashboradController::class, 'editEducation'])->name('editEducation');
    Route::post('/updateEducation/{id}', [App\Http\Controllers\DashboradController::class, 'updateEducation'])->name('updateEducation');
    Route::get('/destroyEducation/{id}', [App\Http\Controllers\DashboradController::class, 'destroyEducation'])->name('destroyEducation');
    //Countries routes
    Route::get('/countries', [App\Http\Controllers\DashboradController::class, 'countries'])->name('countries');
    Route::get('/createCountry', [App\Http\Controllers\DashboradController::class, 'createCountry'])->name('createCountry');
    Route::post('/storeCountry', [App\Http\Controllers\DashboradController::class, 'storeCountry'])->name('storeCountry');
    Route::get('/editCountry/{id}', [App\Http\Controllers\DashboradController::class, 'editCountry'])->name('editCountry');
    Route::post('/updateCountry/{id}', [App\Http\Controllers\DashboradController::class, 'updateCountry'])->name('updateCountry');
    Route::get('/destroyCountry/{id}', [App\Http\Controllers\DashboradController::class, 'destroyCountry'])->name('destroyCountry');
    //Governorates routes
    Route::get('/governorates', [App\Http\Controllers\DashboradController::class, 'governorates'])->name('governorates');
    Route::get('/createGovernorate', [App\Http\Controllers\DashboradController::class, 'createGovernorate'])->name('createGovernorate');
    Route::post('/storeGovernorate', [App\Http\Controllers\DashboradController::class, 'storeGovernorate'])->name('storeGovernorate');
    Route::get('/editGovernorate/{id}', [App\Http\Controllers\DashboradController::class, 'editGovernorate'])->name('editGovernorate');
    Route::post('/updateGovernorate/{id}', [App\Http\Controllers\DashboradController::class, 'updateGovernorate'])->name('updateGovernorate');
    Route::get('/destroyGovernorate/{id}', [App\Http\Controllers\DashboradController::class, 'destroyGovernorate'])->name('destroyGovernorate');
    //Cities routes
    Route::get('/cities', [App\Http\Controllers\DashboradController::class, 'cities'])->name('cities');
    Route::get('/createCity', [App\Http\Controllers\DashboradController::class, 'createCity'])->name('createCity');
    Route::post('/storeCity', [App\Http\Controllers\DashboradController::class, 'storeCity'])->name('storeCity');
    Route::get('/editCity/{id}', [App\Http\Controllers\DashboradController::class, 'editCity'])->name('editCity');
    Route::post('/updateCity/{id}', [App\Http\Controllers\DashboradController::class, 'updateCity'])->name('updateCity');
    Route::get('/destroyCity/{id}', [App\Http\Controllers\DashboradController::class, 'destroyCity'])->name('destroyCity');
    //Employee routes
    Route::get('/employees', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employees');
    Route::get('/createEmployee', [App\Http\Controllers\EmployeeController::class, 'create'])->name('createEmployee');
    Route::post('/storeEmployee', [App\Http\Controllers\EmployeeController::class, 'store'])->name('storeEmployee');
    Route::get('/editEmployee/{id}', [App\Http\Controllers\EmployeeController::class, 'edit'])->name('editEmployee');
    Route::post('/updateEmployee/{id}', [App\Http\Controllers\EmployeeController::class, 'update'])->name('updateEmployee');
    Route::get('/destroyEmployee/{id}', [App\Http\Controllers\EmployeeController::class, 'destroy'])->name('destroyEmployee');
    //Clients routes
    Route::get('/clients', [App\Http\Controllers\ClientController::class, 'index'])->name('clients');
    Route::get('/createClient', [App\Http\Controllers\ClientController::class, 'create'])->name('createClient');
    Route::post('/storeClient', [App\Http\Controllers\ClientController::class, 'store'])->name('storeClient');
    Route::get('/editClient/{id}', [App\Http\Controllers\ClientController::class, 'edit'])->name('editClient');
    Route::post('/updateClient/{id}', [App\Http\Controllers\ClientController::class, 'update'])->name('updateClient');
    Route::get('/destroyClient/{id}', [App\Http\Controllers\ClientController::class, 'destroy'])->name('destroyClient');
    //Categories routes
    Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
    Route::get('/createCategory', [App\Http\Controllers\CategoryController::class, 'create'])->name('createCategory');
    Route::post('/storeCategory', [App\Http\Controllers\CategoryController::class, 'store'])->name('storeCategory');
    Route::get('/editCategory/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('editCategory');
    Route::post('/updateCategory/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('updateCategory');
    Route::get('/destroyCategory/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('destroyCategory');

    //Sizes routes
    Route::get('/sizes', [App\Http\Controllers\SizeController::class, 'index'])->name('sizes');
    Route::get('/createSize', [App\Http\Controllers\SizeController::class, 'create'])->name('createSize');
    Route::post('/storeSize', [App\Http\Controllers\SizeController::class, 'store'])->name('storeSize');
    Route::get('/editSize/{id}', [App\Http\Controllers\SizeController::class, 'edit'])->name('editSize');
    Route::post('/updateSize/{id}', [App\Http\Controllers\SizeController::class, 'update'])->name('updateSize');
    Route::get('/destroySize/{id}', [App\Http\Controllers\SizeController::class, 'destroy'])->name('destroySize');

    //Items routes
    Route::get('/items', [App\Http\Controllers\ItemController::class, 'index'])->name('items');
    Route::get('/createItem', [App\Http\Controllers\ItemController::class, 'create'])->name('createItem');
    Route::post('/storeItem', [App\Http\Controllers\ItemController::class, 'store'])->name('storeItem');
    Route::get('/editItem/{id}', [App\Http\Controllers\ItemController::class, 'edit'])->name('editItem');
    Route::post('/updateItem/{id}', [App\Http\Controllers\ItemController::class, 'update'])->name('updateItem');
    Route::get('/destroyItem/{id}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('destroyItem');

    //ItemSizes routes
    Route::get('/itemSizes/{item}', [App\Http\Controllers\ItemSizesController::class, 'index'])->name('itemSizes');
    Route::get('/createItemSize/{item}', [App\Http\Controllers\ItemSizesController::class, 'create'])->name('createItemSize');
    Route::post('/storeItemSize', [App\Http\Controllers\ItemSizesController::class, 'store'])->name('storeItemSize');
    Route::get('/editItemSize/{id}', [App\Http\Controllers\ItemSizesController::class, 'edit'])->name('editItemSize');
    Route::post('/updateItemSize/{id}', [App\Http\Controllers\ItemSizesController::class, 'update'])->name('updateItemSize');
    Route::get('/destroyItemSize/{id}', [App\Http\Controllers\ItemSizesController::class, 'destroy'])->name('destroyItemSize');
    
    //ItemSizes routes
    Route::get('/pos', [App\Http\Controllers\PosController::class, 'index'])->name('pos');



       ////////////////////////////////////////////////////////////////////////////////////////////
    Auth::routes();

});