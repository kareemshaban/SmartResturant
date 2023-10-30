<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getCats/{id}', [App\Http\Controllers\Api\ItemController::class, 'getCats'])->name('getCats');

Route::get('/getSizes/{id}', [App\Http\Controllers\Api\ItemController::class, 'getSizes'])->name('getSizes');

Route::get('/items/{id}', [App\Http\Controllers\Api\ItemController::class, 'getItems'])->name('getItems');

Route::get('/itemSizes/{id}', [App\Http\Controllers\Api\ItemController::class, 'itemSizes'])->name('itemSizes');

Route::get('/itemMaterials/{id}', [App\Http\Controllers\Api\ItemController::class, 'itemMaterials'])->name('itemMaterials');

Route::get('/getLastItemIDS', [App\Http\Controllers\Api\ItemController::class, 'getLastItemIDS'])->name('getLastItemIDS');


Route::get('/getSales/{id}/{shift_id}/{table_id}', [App\Http\Controllers\Api\ItemController::class, 'getSales'])->name('getSales');
Route::get('/getPurchases/{id}', [App\Http\Controllers\Api\ItemController::class, 'getPurchases'])->name('getPurchases');
Route::get('/getDocs/{id}', [App\Http\Controllers\Api\ItemController::class, 'getDocs'])->name('getDocs');
Route::get('/getLastSalesIDS', [App\Http\Controllers\Api\ItemController::class, 'getLastSalesIDS'])->name('getLastSalesIDS');
Route::post('/storeSalesFromLocal', [App\Http\Controllers\Api\ItemController::class, 'storeSalesFromLocal'])->name('storeSalesFromLocal');

Route::get('/getPurchase/{id}/{shift_id}/{client_id}', [App\Http\Controllers\Api\ItemController::class, 'getPurchase'])->name('getPurchase');
Route::get('/getLastPurchaseIDS', [App\Http\Controllers\Api\ItemController::class, 'getLastPurchaseIDS'])->name('getLastPurchaseIDS');




Route::post('/storeCatsFromLocal', [App\Http\Controllers\Api\ItemController::class, 'storeCatsFromLocal'])->name('storeCatsFromLocal');
Route::post('/storeSizesFromLocal', [App\Http\Controllers\Api\ItemController::class, 'storeSizesFromLocal'])->name('storeSizesFromLocal');
Route::post('/storeItemsFromLocal', [App\Http\Controllers\Api\ItemController::class, 'storeItemsFromLocal'])->name('storeItemsFromLocal');
Route::post('/storeItemSizesFromLocal', [App\Http\Controllers\Api\ItemController::class, 'storeItemSizesFromLocal'])->name('storeItemSizesFromLocal');
Route::post('/storeItemMaterialsFromLocal', [App\Http\Controllers\Api\ItemController::class, 'storeItemMaterialsFromLocal'])->name('storeItemMaterialsFromLocal');


//use App\Models\Item;
