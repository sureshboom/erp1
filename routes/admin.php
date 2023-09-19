<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\StaffController;

use App\Http\Controllers\Admin\LandProjectController;
use App\Http\Controllers\Admin\ContractProjectController;
use App\Http\Controllers\Admin\VillaProjectController;
use App\Http\Controllers\Admin\VillaController;
use App\Http\Controllers\Admin\OwnerController;
use App\Http\Controllers\Admin\MeterialController;
use App\Http\Controllers\Admin\WorkerController;
use App\Http\Controllers\Admin\LandCustomerController;
use App\Http\Controllers\Admin\VillaCustomerController;
use App\Http\Controllers\Admin\ContractCustomerController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\AllReportController;
use App\Http\Controllers\Admin\Auth\LoginController;


Route::prefix('admin')->group(function () {

	Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.admin');
	Route::post('/login', [LoginController::class, 'login'])->name('admin.login');
	Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');
		Route::middleware(['auth:admin'])->group(function () {
			Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');	
			Route::get('/staff', [StaffController::class, 'index'])->name('admin.staff');
			Route::get('/createstaff', [StaffController::class, 'create'])->name('admin.staff.create');
			Route::post('/storestaff', [StaffController::class, 'store'])->name('admin.staff.store');
			Route::get('/editstaff/{id}', [StaffController::class, 'edit'])->name('admin.staff.edit');
			Route::post('/editstaff/{id}', [StaffController::class, 'update'])->name('admin.staff.update');
			Route::get('/viewstaff/{id}', [StaffController::class, 'show'])->name('admin.staff.show');
			Route::delete('/deletestaff/{id}', [StaffController::class, 'destroy'])->name('admin.staff.delete');
			
			Route::resource('/landproject', LandProjectController::class);
			Route::resource('/villaproject', VillaProjectController::class);
			Route::resource('/villa', VillaController::class);
			
			Route::get('/villalist', [VillaCustomerController::class, 'villalist']);
			Route::get('/villaarea', [VillaCustomerController::class, 'villaarea']);
			Route::resource('/contractproject', ContractProjectController::class);
			
			Route::resource('/meterial', MeterialController::class);
			Route::resource('/worker', WorkerController::class);
			Route::resource('/landcustomer', LandCustomerController::class);
			Route::resource('/contractcustomer', ContractCustomerController::class);
			Route::resource('/villacustomer', VillaCustomerController::class);
			Route::get('/landcustomerapprove/{id}', [LandCustomerController::class,'approvePromotion'])->name('approvepromotion');
			Route::get('/contractcustomerapprove/{id}', [ContractCustomerController::class,'approvePromotion'])->name('capprovepromotion');
			Route::get('/villacustomerapprove/{id}', [VillaCustomerController::class,'approvePromotion'])->name('vapprovepromotion');
			Route::resource('/supplier', SupplierController::class);
			Route::get('/supplierassignview', [SupplierController::class, 'supplierassignview'])->name('supplierassignview');
			// Route::get('/supplierassignshow/{id}', [SupplierController::class, 'supplierassignshow'])->name('supplierassignshow');
			
			Route::get('/supplierassigncancel/{id}', [SupplierController::class, 'supplierassigncancel'])->name('supplierassigncancel');

			Route::get('/supplierassignapprove/{id}', [SupplierController::class, 'supplierassignapprove'])->name('supplierassignapprove');

			Route::get('/salary_report', [AllReportController::class, 'salaryreport'])->name('salaryreport');
			Route::get('/expense_report', [AllReportController::class, 'expensereport'])->name('expensereport');
			Route::get('/land_report', [AllReportController::class, 'landproject'])->name('landprojectreport');
			Route::get('/contract_report', [AllReportController::class, 'contractproject'])->name('contractprojectreport');
			Route::get('/villa_report', [AllReportController::class, 'villaproject'])->name('villaprojectreport');
			Route::get('/income_report', [AllReportController::class, 'income'])->name('income');
			Route::get('/supplier_report', [AllReportController::class, 'supplier'])->name('supplierreport');
			Route::get('/lsupplier_report', [AllReportController::class, 'lsupplier'])->name('lsupplierreport');
			
		});
	
	
	});
