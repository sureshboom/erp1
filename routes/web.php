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
use App\Http\Controllers\User\telecaller\CustomerController;
use App\Http\Controllers\User\telecaller\WorkController;
use App\Http\Controllers\User\telecaller\SitevisitController;
use App\Http\Controllers\User\salesperson\ScustomerController;
use App\Http\Controllers\User\siteengineer\SupplierController;
use App\Http\Controllers\User\siteengineer\MaterialrequestController;
use App\Http\Controllers\User\account\SitepaymentController;
use App\Http\Controllers\User\account\MaterialPaymentController;
use App\Http\Controllers\User\account\LandCustomerController;
use App\Http\Controllers\User\account\LandPaymentController;
use App\Http\Controllers\User\account\ExpenseController;

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
    Route::resource('/site_payment', SitepaymentController::class);
    Route::resource('/material_payment', MaterialPaymentController::class);
    Route::resource('/landcustomer', LandCustomerController::class);
    Route::resource('/land_payment', LandPaymentController::class);
    Route::resource('/expense', ExpenseController::class);
    Route::get('/payments/{siteid}',[SitepaymentController::class,'getsite']);
    Route::get('/pay/{orderid}',[MaterialPaymentController::class,'getorder']);
    Route::get('/landpay/{orderid}',[LandPaymentController::class,'getland']);
});

Route::controller(TelecallerController::class)->prefix('telecaller')->middleware('telecaller')->name('telecaller.')->group(function () {

    Route::get('dashboard', 'dashboard')->name('dashboard');
    Route::resource('/customer', CustomerController::class);
    Route::resource('/todays_work', WorkController::class);
    Route::resource('/sitevisit', SitevisitController::class);



});
// Routes for Telecallers

Route::controller(SiteengineerController::class)->prefix('site_engineer')->middleware('siteengineer')->name('siteengineer.')->group(function () {

    Route::get('dashboard', 'dashboard')->name('dashboard');
    Route::get('siteengineer_site', 'assignedsite')->name('assignedsite');
    Route::resource('/supplier', SupplierController::class);
    Route::resource('/material_order', MaterialrequestController::class);
    Route::patch('/purchasehistory',[MaterialrequestController::class,'purchaseupdate'])->name('purchaseupdate');
    Route::delete('/purchasedelete/{id}',[MaterialrequestController::class,'purchasedelete'])->name('purchasedelete');


});


Route::controller(ChiefengineerController::class)->prefix('chief_engineer')->middleware('chiefengineer')->name('chiefengineer.')->group(function () {

    Route::get('chiefengineer_site', 'assignedsite')->name('assignedsite');
    Route::get('dashboard', 'dashboard')->name('dashboard');
    Route::get('suppliers', 'suppliers')->name('suppliers');
    Route::get('material_status', 'order')->name('orderstatus');
    Route::get('/materials_show/{id}', 'show')->name('materialview');
    Route::get('/materialapprove/{id}', 'materialapprove')->name('materialapprove');
    Route::get('/materialcancel/{id}', 'materialcancel')->name('materialcancel');

});

Route::controller(SalesmanagerController::class)->prefix('sales_manager')->middleware('salesmanager')->name('salesmanager.')->group(function () {

    Route::get('dashboard', 'dashboard')->name('dashboard');
    Route::get('allcustomers', 'allcustomers')->name('allcustomers');
    Route::get('teleworks', 'telework')->name('teleworks');
    Route::get('siteview', 'siteview')->name('siteview');
    Route::get('/siteviewchange/{id}', 'siteviewchange')->name('siteviewchange');
    Route::get('/siteviewshow/{id}', 'siteviewshow')->name('siteviewshow');
    
});

Route::controller(SalespersonController::class)->prefix('sales_person')->middleware('salesperson')->name('salesperson.')->group(function () {

    Route::get('dashboard', 'dashboard')->name('dashboard');
    Route::resource('/direct_customer', ScustomerController::class);
    Route::get('/sitevisit',[ScustomerController::class,'salespersonvisit'])->name('sitevisit');
    Route::get('/visitchange/{id}',[ScustomerController::class,'visitchange'])->name('visitchange');

});
// Routes for Supervisors


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/user/dashboard', [HomeController::class, 'dashboard'])->name('user.dashboard');

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('user.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

