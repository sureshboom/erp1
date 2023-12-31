<?php

namespace App;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\SiteengineerController;
use App\Http\Controllers\User\TelecallerController;
use App\Http\Controllers\User\SalesmanagerController;
use App\Http\Controllers\User\ChiefengineerController;
use App\Http\Controllers\User\SalespersonController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\chiefengineer\MesthiriController;
use App\Http\Controllers\User\chiefengineer\SupplierAssignController;
use App\Http\Controllers\User\chiefengineer\MaterialstatusController;
use App\Http\Controllers\User\telecaller\CustomerController;
use App\Http\Controllers\User\telecaller\WorkController;
use App\Http\Controllers\User\telecaller\SitevisitController;
use App\Http\Controllers\User\telecaller\TeleReportController;
use App\Http\Controllers\User\salesperson\ScustomerController;
use App\Http\Controllers\User\siteengineer\WorkEnteryController;
use App\Http\Controllers\User\siteengineer\WorkerEntryController;
use App\Http\Controllers\User\siteengineer\TransforController;
use App\Http\Controllers\User\siteengineer\MaterialrequestController;
use App\Http\Controllers\User\account\SupplierController;
use App\Http\Controllers\User\account\MaterialPaymentController;
use App\Http\Controllers\User\account\LandCustomerController;
use App\Http\Controllers\User\account\ContractCustomerController;
use App\Http\Controllers\User\account\VillaCustomerController;
use App\Http\Controllers\User\account\AdvanceController;
use App\Http\Controllers\User\account\ExpenseController;
use App\Http\Controllers\User\account\LabourSupplierController;
use App\Http\Controllers\User\account\PaymentController;
use App\Http\Controllers\User\account\SupplierPaymentController;
use App\Http\Controllers\User\account\SalaryController;
use App\Http\Controllers\User\account\AccountReportController;

use Illuminate\Support\Facades\Route;

include(base_path('routes/admin.php'));

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });

// Auth::routes();

Route::controller(AccountController::class)->prefix('account')->middleware('account')->name('account.')->group(function () {

    Route::get('dashboard', 'dashboard')->name('dashboard');
    
    Route::resource('/material_payment', MaterialPaymentController::class);
    Route::resource('/landcustomer', LandCustomerController::class);
    Route::get('/landrequestPromotion/{id}', [LandCustomerController::class,'requestPromotion'])->name('promotion');
    Route::get('/landdownload/{id}', [LandCustomerController::class,'receiptview'])->name('downloadlrep');
    Route::get('/contractdownload/{id}', [ContractCustomerController::class,'receiptview'])->name('downloadcrep');
    Route::get('/villadownload/{id}', [VillaCustomerController::class,'receiptview'])->name('downloadvrep');
    Route::get('/contractrequestPromotion/{id}', [ContractCustomerController::class,'requestPromotion'])->name('cpromotion');
    Route::get('/villarequestPromotion/{id}', [VillaCustomerController::class,'requestPromotion'])->name('vpromotion');
    
    Route::resource('/contractcustomer', ContractCustomerController::class);
    Route::resource('/villacustomer', VillaCustomerController::class);
    Route::get('/villalist', [VillaCustomerController::class, 'villalist']);


    Route::get('/villaarea', [VillaCustomerController::class, 'villaarea']);
    Route::resource('/expense', ExpenseController::class);
    Route::resource('/supplier', SupplierController::class);
    Route::resource('/payment', PaymentController::class);
    Route::resource('/advance', AdvanceController::class);
    Route::resource('/labour_supplier', LabourSupplierController::class);
    Route::resource('/supplier_payments', SupplierPaymentController::class);
    Route::resource('/salary', SalaryController::class);
    Route::get('/advancelist', [SalaryController::class, 'advancelist']);
    Route::get('/projectview', [SupplierPaymentController::class, 'projectview']);
    Route::get('/rview/{id}', [SupplierPaymentController::class, 'receiptview'])->name('rview');
    Route::get('/rcview/{id}', [SupplierPaymentController::class, 'receiptdownload'])->name('rcview');
    Route::get('/projectvillalist', [SupplierPaymentController::class, 'projectvillalist']);
    Route::get('/amountdetails', [SupplierPaymentController::class, 'amountdetails']);
    Route::get('/receiptview/{id}',[PaymentController::class,'receiptview'])->name('receiptview');
    Route::get('/receiptdownload/{id}',[PaymentController::class,'receiptdownload'])->name('receiptdownload');
    Route::get('/expensepayment',[PaymentController::class,'expensepaymentshow'])->name('expensepayment');
    Route::get('/materialpayment',[PaymentController::class,'materialpaymentshow'])->name('materialpayment');
    Route::get('/landpayment',[PaymentController::class,'landpaymentshow'])->name('landpayment');
    Route::get('/contractpayment',[PaymentController::class,'contractpaymentshow'])->name('contractpayment');
    Route::get('/villapayment',[PaymentController::class,'villapaymentshow'])->name('villapayment');
    Route::get('/customersid',[PaymentController::class,'customersid']);
    
    Route::get('/customersdetails',[PaymentController::class,'customersdetails']);
    Route::get('/supplierdetails',[PaymentController::class,'supplierdetails']);
    Route::get('/pay/{orderid}',[MaterialPaymentController::class,'getorder']);
    Route::get('material_view', 'order')->name('materialstatus');
    Route::post('/material_amount/{id}', 'amountstore')->name('amountstore');
    Route::get('/material_show/{id}', 'show')->name('materialview');
    Route::get('/materialpaid/{id}', 'materialpaid')->name('materialpaid');
    Route::get('/materialscancel/{id}', 'materialcancel')->name('materialcancel');


    Route::get('/salaryreport', [AccountReportController::class, 'salaryreport'])->name('salaryreport');
    Route::get('/expensereport', [AccountReportController::class, 'expensereport'])->name('expensereport');
    Route::get('/landreport', [AccountReportController::class, 'landproject'])->name('landprojectreport');
    Route::get('/contractreport', [AccountReportController::class, 'contractproject'])->name('contractprojectreport');
    Route::get('/villareport', [AccountReportController::class, 'villaproject'])->name('villaprojectreport');
    Route::get('/incomereport', [AccountReportController::class, 'income'])->name('income');
    Route::get('/supplierreport', [AccountReportController::class, 'supplier'])->name('supplierreport');
    Route::get('/lsupplierreport', [AccountReportController::class, 'lsupplier'])->name('lsupplierreport');
});

Route::controller(TelecallerController::class)->prefix('telecaller')->middleware('telecaller')->name('telecaller.')->group(function () {

    Route::get('dashboard', 'dashboard')->name('dashboard');
    Route::resource('/customer', CustomerController::class);
    Route::resource('/todays_work', WorkController::class);
    Route::resource('/sitevisit', SitevisitController::class);
    Route::get('/teleworkreport', [TeleReportController::class, 'workreport'])->name('teleworkreport');



});
// Routes for Telecallers

Route::controller(SiteengineerController::class)->prefix('site_engineer')->middleware('siteengineer')->name('siteengineer.')->group(function () {

    Route::get('dashboard', 'dashboard')->name('dashboard');
    Route::get('landproject', 'landsite')->name('landsite');
    Route::get('contractproject', 'contractsite')->name('contractsite');
    Route::get('villaproject', 'villasite')->name('villasite');
    Route::get('contractprojectlist', 'contractprojectlist')->name('contractprojectlist');
    Route::get('villaprojectlist', 'villaprojectlist')->name('villaprojectlist');
    
    Route::get('/payments/{type}/{id}', [WorkerEntryController::class,'getsite']);
    Route::get('/transfor/{id}/{type}', [TransforController::class,'transforcreate'])->name('transforcreate');
    Route::get('material_contract_project',[TransforController::class,'contractprojectslist'])->name('material_contract');
    Route::get('material_villa_project',[TransforController::class,'villaprojectslist'])->name('material_villa');
    Route::resource('/workentry', WorkEnteryController::class);
    Route::resource('/workerentry', WorkerEntryController::class);
    Route::resource('/material_order', MaterialrequestController::class);
    Route::resource('/material_transfors', TransforController::class);
    Route::patch('/purchasehistory',[MaterialrequestController::class,'purchaseupdate'])->name('purchaseupdate');
    Route::get('/received',[MaterialrequestController::class,'received'])->name('received');
    Route::get('/verify/{id}',[MaterialrequestController::class,'verified'])->name('verified');
    Route::get('/note/{id}',[MaterialrequestController::class,'note'])->name('note');
    Route::post('/notestore/{id}',[MaterialrequestController::class,'notestore'])->name('notestore');
    Route::delete('/purchasedelete/{id}',[MaterialrequestController::class,'purchasedelete'])->name('purchasedelete');
    Route::get('/mesthiri', 'mesthiri')->name('mesthiri');
    
});


Route::controller(ChiefengineerController::class)->prefix('chief_engineer')->middleware('chiefengineer')->name('chiefengineer.')->group(function () {

    
    Route::get('landproject', 'landsite')->name('landsite');
    Route::get('contractproject', 'contractsite')->name('contractsite');
    Route::get('villaproject', 'villasite')->name('villasite');
    Route::get('dashboard', 'dashboard')->name('dashboard');
    Route::get('workentry', 'workentry')->name('workentry');
    Route::get('workersentry', 'WorkerEntry')->name('workersentry');
    Route::get('/worker_salary/{id}', 'Workersalary')->name('workersalary');
    Route::post('/worker_salary_change/{id}', 'Workersalarychange')->name('workersalarychange');
    Route::get('/workverify/{id}', 'workverify')->name('workverify');
    Route::get('suppliers', 'suppliers')->name('suppliers');

    Route::get('material_received', 'received')->name('received');
    Route::get('materialamount/{id}', 'materialamount')->name('materialamount');
    Route::post('amountstore/{id}', 'amountstore')->name('amountstore');
    Route::get('/materials_show/{id}', 'show')->name('materialview');
    Route::get('/materialapprove/{id}', 'materialapprove')->name('materialapprove');
    Route::post('/materialcancel/{id}', 'materialcancel')->name('materialcancel');
    Route::get('/materialcancelview/{id}', 'materialcancelview')->name('materialcancelview');
    Route::get('/changereceived/{id}', 'changereceived')->name('changereceived');
    Route::resource('/material_status', MaterialstatusController::class);
    Route::resource('/mesthiri', MesthiriController::class);
    Route::resource('/laboursupplier', SupplierAssignController::class);
    Route::get('/labour_supplier_view', [SupplierAssignController::class,'supplierassignview'])->name('supplierassignview');
    Route::get('/villaprojectview', [SupplierAssignController::class,'villaprojectindex'])->name('villaprojectindex');

    
    Route::get('/villaviewlist', [SupplierAssignController::class, 'villaviewlist']);
    Route::get('/villaindex/{id}', [SupplierAssignController::class,'villaindex'])->name('villaindex');
    Route::get('/suppliercontract/{id}', [SupplierAssignController::class,'suppliercontract'])->name('suppliercontract');
    Route::get('/suppliervilla/{id}/{villa}', [SupplierAssignController::class,'suppliervilla'])->name('suppliervilla');
    Route::get('/contract_view', [MesthiriController::class,'mesthiricontract'])->name('mesthiricontract');
    Route::get('/contract_show/{id}', [MesthiriController::class,'assigncontract'])->name('assigncontract');
    Route::get('/villa_show/{id}', [MesthiriController::class,'assignvilla'])->name('assignvilla');
    
    Route::get('/villa_view', [MesthiriController::class,'mesthirivilla'])->name('mesthirivilla');
    Route::get('/mesthiri_assign', [MesthiriController::class,'assign'])->name('assign');
    Route::post('/mesthiri_assignstore', [MesthiriController::class,'assignstore'])->name('assignstore');

});

Route::controller(SalesmanagerController::class)->prefix('sales_manager')->middleware('salesmanager')->name('salesmanager.')->group(function () {

    Route::get('dashboard', 'dashboard')->name('dashboard');
    Route::get('allcustomers', 'allcustomers')->name('allcustomers');
    Route::get('teleworks', 'telework')->name('teleworks');
    Route::get('siteview', 'siteview')->name('siteview');
    Route::post('/siteviewchange/{id}', 'siteviewchange')->name('siteviewchange');
    Route::get('/viewsiteviewchange/{id}/{siteid}', 'viewsiteviewchange')->name('viewsiteviewchange');
    Route::get('/siteviewshow/{id}', 'siteviewshow')->name('siteviewshow');
    Route::get('/teleworkreports', [TeleReportController::class, 'alltelecallerwork'])->name('alltelecallerwork');
    
});

Route::controller(SalespersonController::class)->prefix('sales_person')->middleware('salesperson')->name('salesperson.')->group(function () {

    Route::get('dashboard', 'dashboard')->name('dashboard');
    Route::resource('/direct_customer', ScustomerController::class);
    Route::get('/sitevisit',[ScustomerController::class,'salespersonvisit'])->name('sitevisit');
    Route::post('/visitchange/{id}',[ScustomerController::class,'visitchange'])->name('visitchange');
    Route::get('/viewvisitchange/{id}/{siteid}',[ScustomerController::class,'viewvisitchange'])->name('viewvisitchange');
});
// Routes for Supervisors


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/user/dashboard', [HomeController::class, 'dashboard'])->name('user.dashboard');

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('user.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

