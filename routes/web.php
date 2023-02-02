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

    Auth::routes();

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
    Route::get('/clients/{type}', [App\Http\Controllers\ClientController::class, 'index'])->name('clients');
    Route::get('/createClient/{type}', [App\Http\Controllers\ClientController::class, 'create'])->name('createClient');
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
    Route::get('/getSize/{id}', [App\Http\Controllers\SizeController::class, 'getSize'])->name('getSize');


    //Items routes
    Route::get('/items', [App\Http\Controllers\ItemController::class, 'index'])->name('items');
    Route::get('/createItem', [App\Http\Controllers\ItemController::class, 'create'])->name('createItem');
    Route::post('/storeItem', [App\Http\Controllers\ItemController::class, 'store'])->name('storeItem');
    Route::get('/editItem/{id}', [App\Http\Controllers\ItemController::class, 'edit'])->name('editItem');
    Route::post('/updateItem/{id}', [App\Http\Controllers\ItemController::class, 'update'])->name('updateItem');
    Route::get('/destroyItem/{id}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('destroyItem');
    Route::get('/getItem/{id}', [App\Http\Controllers\ItemController::class, 'getItem'])->name('getItem');


    //ItemSizes routes
    Route::get('/itemSizes/{item}', [App\Http\Controllers\ItemSizesController::class, 'index'])->name('itemSizes');
    Route::get('/createItemSize/{item}', [App\Http\Controllers\ItemSizesController::class, 'create'])->name('createItemSize');
    Route::post('/storeItemSize', [App\Http\Controllers\ItemSizesController::class, 'store'])->name('storeItemSize');
    Route::get('/editItemSize/{id}', [App\Http\Controllers\ItemSizesController::class, 'edit'])->name('editItemSize');
    Route::post('/updateItemSize/{id}', [App\Http\Controllers\ItemSizesController::class, 'update'])->name('updateItemSize');
    Route::get('/destroyItemSize/{id}', [App\Http\Controllers\ItemSizesController::class, 'destroy'])->name('destroyItemSize');
    Route::get('/getItemSize/{id}', [App\Http\Controllers\ItemSizesController::class, 'getItemSize'])->name('getItemSize');


    //POS routes
    Route::get('/pos', [App\Http\Controllers\PosController::class, 'index'])->name('pos');
    Route::post('/storeBill', [App\Http\Controllers\PosController::class, 'store'])->name('storeBill');
    Route::post('/payBill', [App\Http\Controllers\PosController::class, 'payBill'])->name('payBill');
    Route::get('/cancelOrder/{id}', [App\Http\Controllers\PosController::class, 'destroy'])->name('cancelOrder');




    //shift routes
    Route::get('/myShift', [App\Http\Controllers\ShiftController::class, 'index'])->name('myShift');
    Route::post('/storeShift', [App\Http\Controllers\ShiftController::class, 'store'])->name('storeShift');
    Route::post('/endShift/{id}', [App\Http\Controllers\ShiftController::class, 'update'])->name('endShift');


    //halls routes
    Route::get('/halls', [App\Http\Controllers\HallController::class, 'index'])->name('halls');
        Route::get('/createHall', [App\Http\Controllers\HallController::class, 'create'])->name('createHall');
    Route::post('/storeHall', [App\Http\Controllers\HallController::class, 'store'])->name('storeHall');
    Route::get('/editHall/{id}', [App\Http\Controllers\HallController::class, 'edit'])->name('editHall');
    Route::post('/updateHall/{id}', [App\Http\Controllers\HallController::class, 'update'])->name('updateHall');
    Route::get('/destroyHall/{id}', [App\Http\Controllers\HallController::class, 'destroy'])->name('destroyHall');

    //tables routes
    Route::get('/tables', [App\Http\Controllers\TableController::class, 'index'])->name('tables');
    Route::get('/createTable', [App\Http\Controllers\TableController::class, 'create'])->name('createTable');
    Route::post('/storeTable', [App\Http\Controllers\TableController::class, 'store'])->name('storeTable');
    Route::get('/editTable/{id}', [App\Http\Controllers\TableController::class, 'edit'])->name('editTable');
    Route::post('/updateTable/{id}', [App\Http\Controllers\TableController::class, 'update'])->name('updateTable');
    Route::get('/destroyTable/{id}', [App\Http\Controllers\TableController::class, 'destroy'])->name('destroyTable');

   // printers routes

    //tables routes
    Route::get('/printers', [App\Http\Controllers\PrinterController::class, 'index'])->name('printers');
    Route::get('/createPrinter', [App\Http\Controllers\PrinterController::class, 'create'])->name('createPrinter');
    Route::post('/storePrinter', [App\Http\Controllers\PrinterController::class, 'store'])->name('storePrinter');
    Route::get('/editPrinter/{id}', [App\Http\Controllers\PrinterController::class, 'edit'])->name('editPrinter');
    Route::post('/updatePrinter/{id}', [App\Http\Controllers\PrinterController::class, 'update'])->name('updatePrinter');
    Route::get('/destroyPrinter/{id}', [App\Http\Controllers\PrinterController::class, 'destroy'])->name('destroyPrinter');

    //settings routes
    Route::get('/tax-settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('tax-settings');
    Route::post('/storeTaxSetting', [App\Http\Controllers\SettingsController::class, 'store'])->name('storeTaxSetting');
    Route::post('/updateTaxSetting/{id}', [App\Http\Controllers\SettingsController::class, 'update'])->name('updateTaxSetting');


    Route::get('/report-settings', [App\Http\Controllers\ReportSettingController::class, 'index'])->name('report-settings');
    Route::post('/storeReportSetting', [App\Http\Controllers\ReportSettingController::class, 'store'])->name('storeReportSetting');
    Route::post('/updateReportSetting/{id}', [App\Http\Controllers\ReportSettingController::class, 'update'])->name('updateReportSetting');

    Route::get('/company', [App\Http\Controllers\CompanyInfoController::class, 'index'])->name('company');
    Route::post('/storeCompany', [App\Http\Controllers\CompanyInfoController::class, 'store'])->name('storeCompany');
    Route::post('/updateCompany/{id}', [App\Http\Controllers\CompanyInfoController::class, 'update'])->name('updateCompany');


    Route::get('/expenses_type', [App\Http\Controllers\ExpensesTypeController::class, 'index'])->name('expenses_type');
    Route::get('/createExpenses_type', [App\Http\Controllers\ExpensesTypeController::class, 'create'])->name('createExpenses_type');
    Route::post('/storeExpenses_type', [App\Http\Controllers\ExpensesTypeController::class, 'store'])->name('storeExpenses_type');
    Route::get('/editExpenses_type/{id}', [App\Http\Controllers\ExpensesTypeController::class, 'edit'])->name('editExpenses_type');
    Route::post('/updateExpenses_type/{id}', [App\Http\Controllers\ExpensesTypeController::class, 'update'])->name('updateExpenses_type');
    Route::get('/destroyExpenses_type/{id}', [App\Http\Controllers\ExpensesTypeController::class, 'destroy'])->name('destroyExpenses_type');

    Route::get('/recipt', [App\Http\Controllers\ReciptController::class, 'index'])->name('recipt');
    Route::get('/createRecipt', [App\Http\Controllers\ReciptController::class, 'create'])->name('createRecipt');
    Route::post('/storeRecipt', [App\Http\Controllers\ReciptController::class, 'store'])->name('storeRecipt');
    Route::get('/editRecipt/{id}', [App\Http\Controllers\ReciptController::class, 'edit'])->name('editRecipt');
    Route::post('/updateRecipt/{id}', [App\Http\Controllers\ReciptController::class, 'update'])->name('updateRecipt');
    Route::get('/destroyRecipt/{id}', [App\Http\Controllers\ReciptController::class, 'destroy'])->name('destroyRecipt');

    //ajax
    Route::get('/getClient/{id}', [App\Http\Controllers\ClientController::class, 'getClient'])->name('getClient');
    Route::get('/getVats', [App\Http\Controllers\SettingsController::class, 'getVats'])->name('getVats');
    Route::get('/getBillNo', [App\Http\Controllers\PosController::class, 'getBillNo'])->name('getBillNo');
    Route::get('/getDriver/{id}', [App\Http\Controllers\EmployeeController::class, 'getDriver'])->name('getDriver');
    Route::get('/getTableBill/{id}', [App\Http\Controllers\BillController::class, 'getTableBill'])->name('getTableBill');
    Route::get('/getLastBill', [App\Http\Controllers\PosController::class, 'getLastBill'])->name('getLastBill');
    Route::get('/searchBill/{val}', [App\Http\Controllers\BillController::class, 'searchBill'])->name('searchBill');
    Route::get('/checkShift', [App\Http\Controllers\DashboradController::class, 'checkShift'])->name('checkShift');
    Route::get('/getRecipitBillNo', [App\Http\Controllers\ReciptController::class, 'getRecipitBillNo'])->name('getRecipitBillNo');
    Route::get('/getExpense/{id}', [App\Http\Controllers\ExpensesTypeController::class, 'getExpense'])->name('getExpense');
    Route::get('/gatHallTables/{id}', [App\Http\Controllers\HallController::class, 'gatHallTables'])->name('gatHallTables');

    Route::get('/printAction/{id}', [App\Http\Controllers\PosController::class, 'printAction'])->name('printAction');
    Route::get('/PrintActionKitchen/{id}', [App\Http\Controllers\PosController::class, 'PrintActionKitchen'])->name('PrintActionKitchen');

    Route::post('/storeMachine', [App\Http\Controllers\MachineController::class, 'store'])->name('storeMachine');
    Route::get('/getHall/{id}', [App\Http\Controllers\MachineController::class, 'getHall'])->name('getHall');
    Route::get('/getMachineNo', [App\Http\Controllers\MachineController::class, 'getMachineNo'])->name('getMachineNo');
    Route::get('/getMac', [App\Http\Controllers\MachineController::class, 'getMac'])->name('getMac');
    Route::get('/getMachines', [App\Http\Controllers\MachineController::class, 'index'])->name('getMachines');
    Route::get('/getUser', [App\Http\Controllers\HomeController::class, 'getUser'])->name('getUser');
    Route::get('/selectMachine', [App\Http\Controllers\MachineController::class, 'selectMachine'])->name('selectMachine');
    Route::get('/setUserMachine/{id}', [App\Http\Controllers\MachineController::class, 'setUserMachine'])->name('setUserMachine');


    //
    Route::get('/report_total', [App\Http\Controllers\ReportController::class, 'report_total'])->name('report_total');
    Route::post('/report_total', [App\Http\Controllers\ReportController::class, 'report_total_search'])->name('report_total');

    Route::get('/report_details', [App\Http\Controllers\ReportController::class, 'report_details'])->name('report_details');
    Route::post('/report_details', [App\Http\Controllers\ReportController::class, 'report_details_search'])->name('report_details');
    Route::get('/autocomplete-search', [App\Http\Controllers\ReportController::class, 'autocompleteSearch']);

    Route::get('/report_sales_type', [App\Http\Controllers\ReportController::class, 'report_sales_type'])->name('report_sales_type');
    Route::post('/report_sales_type', [App\Http\Controllers\ReportController::class, 'report_sales_type_search'])->name('report_sales_type');

    Route::get('/report_daily_sales', [App\Http\Controllers\ReportController::class, 'report_daily_sales'])->name('report_daily_sales');
    Route::post('/report_daily_sales', [App\Http\Controllers\ReportController::class, 'report_daily_sales_search'])->name('report_daily_sales');

    Route::get('/report_period_sales', [App\Http\Controllers\ReportController::class, 'report_period_sales'])->name('report_period_sales');
    Route::post('/report_period_sales', [App\Http\Controllers\ReportController::class, 'report_period_sales_search'])->name('report_period_sales');

    Route::get('/report_expenses', [App\Http\Controllers\ReportController::class, 'report_expenses'])->name('report_expenses');
    Route::post('/report_expenses', [App\Http\Controllers\ReportController::class, 'report_expenses_search'])->name('report_expenses');

    Route::get('/report_client_account', [App\Http\Controllers\ReportController::class, 'report_client_account'])->name('report_client_account');
    Route::post('/report_client_account', [App\Http\Controllers\ReportController::class, 'report_client_account_search'])->name('report_client_account');

    Route::get('/report_total_transactions', [App\Http\Controllers\ReportController::class, 'report_total_transactions'])->name('report_total_transactions');
    Route::post('/report_total_transactions', [App\Http\Controllers\ReportController::class, 'report_total_transactions_search'])->name('report_total_transactions');

    Route::get('/report_box_transactions', [App\Http\Controllers\ReportController::class, 'report_box_transactions'])->name('report_box_transactions');
    Route::post('/report_box_transactions', [App\Http\Controllers\ReportController::class, 'report_box_transactions_search'])->name('report_box_transactions');

    Route::get('/report_tax_declaration', [App\Http\Controllers\ReportController::class, 'report_tax_declaration'])->name('report_tax_declaration');
    Route::post('/report_tax_declaration', [App\Http\Controllers\ReportController::class, 'report_tax_declaration_search'])->name('report_tax_declaration');

    Route::get('/report_tax', [App\Http\Controllers\ReportController::class, 'report_tax'])->name('report_tax');
    Route::post('/report_tax', [App\Http\Controllers\ReportController::class, 'report_tax_search'])->name('report_tax');
       ////////////////////////////////////////////////////////////////////////////////////////////
    ///
    Route::get('clearSession/{key}', [App\Http\Controllers\HomeController::class, 'clearSession'])->name('clearSession');



    Route::get('getCategory/{id}', [App\Http\Controllers\CategoryController::class, 'getCategory'])->name('getCategory');




});
