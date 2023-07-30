<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\SiteController;
use App\Http\Controllers\Admin\OwnerController;
use App\Http\Controllers\Admin\MeterialController;
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
			Route::resource('/site', SiteController::class);
			Route::resource('/owner', OwnerController::class);
			Route::resource('/meterial', MeterialController::class);
		});
	
	
	});
