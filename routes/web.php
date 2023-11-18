<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BasicinfoController;
use App\Http\Controllers\ContactinfoController;
use App\Http\Controllers\ExpensecategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomecategoryController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SocialmediaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', [AdminController::class, 'index']);


// UserController Routes
Route::get('dashboard/all/user', [UserController::class, 'index']);
Route::get('dashboard/add/user', [UserController::class, 'add']);
Route::post('dashboard/store/user', [UserController::class, 'store']);
Route::get('dashboard/edit/user', [UserController::class, 'edit']);
Route::post('dashboard/update/user', [UserController::class, 'update']);
Route::get('dashboard/delete/user', [UserController::class, 'delete']);




// IncomeCategory Routes
Route::get('all/income/category', [IncomecategoryController::class,'index']);
Route::get('add/income/category', [IncomecategoryController::class,'add']);
Route::post('store/income/category', [IncomecategoryController::class,'store']);
Route::get('view/income/category/{slug}', [IncomecategoryController::class,'view']);
Route::get('edit/income/category/{slug}', [IncomecategoryController::class,'edit']);
Route::post('update/income/category', [IncomecategoryController::class,'update']);
Route::get('soft/delete/income/category/{id}', [IncomecategoryController::class,'softDelete']);
Route::get('restore/income/category/{id}', [IncomecategoryController::class,'restoreCategory']);
Route::get('delete/income/category/{id}', [IncomecategoryController::class,'delete']);

//Income Routes
Route::get('all/income', [IncomeController::class,'index']);
Route::get('add/income', [IncomeController::class,'add']);
Route::post('store/income', [IncomeController::class,'store']);
Route::get('edit/income/{slug}', [IncomeController::class,'edit']);
Route::get('view/income/{slug}', [IncomeController::class,'view']);
Route::post('update/income', [IncomeController::class,'update']);
Route::get('soft/delete/income/{id}', [IncomeController::class,'softDelete']);
Route::get('restore/income/{id}', [IncomeController::class,'restore']);
Route::get('delete/income/{id}', [IncomeController::class,'delete']);
Route::get('/income/pdf', [IncomeController::class,'pdf']);
Route::get('/income/excel', [IncomeController::class,'excel']);


// Expense Category Routes
Route::get('all/expense/category', [ExpensecategoryController::class,'index']);
Route::get('add/expense/category', [ExpensecategoryController::class,'add']);
Route::post('store/expense/category', [ExpensecategoryController::class,'store']);
Route::get('view/expense/category/{slug}', [ExpensecategoryController::class,'view']);
Route::get('edit/expense/category/{slug}', [ExpensecategoryController::class,'edit']);
Route::post('update/expense/category', [ExpensecategoryController::class,'update']);
Route::get('soft/delete/expense/category/{id}', [ExpensecategoryController::class,'softDelete']);
// Route::get('restore/expense/category/{id}', [ExpensecategoryController::class,'restoreCategory']);
Route::get('delete/expense/category/{id}', [ExpensecategoryController::class,'delete']);


//Expense Routes
Route::get('all/expense', [ExpenseController::class,'index']);
Route::get('add/expense', [ExpenseController::class,'add']);
Route::post('store/expense', [ExpenseController::class,'store']);
Route::get('edit/expense/{slug}', [ExpenseController::class,'edit']);
Route::get('view/expense/{slug}', [ExpenseController::class,'view']);
Route::post('update/expense', [ExpenseController::class,'update']);
Route::get('soft/delete/expense/{id}', [ExpenseController::class,'softDelete']);
Route::get('restore/expense/{id}', [ExpenseController::class,'restore']);
Route::get('delete/expense/{id}', [ExpenseController::class,'delete']);
Route::get('/expense/pdf', [ExpenseController::class,'pdf']);

//Report
Route::get('dashboard/report', [ReportController::class,'report']);


// Social Media
Route::get('dashboard/social', [SocialmediaController::class,'social']);
Route::post('dashboard/social/update', [SocialmediaController::class,'socialUpdate']);

//Basic Information
Route::get('dashboard/basic/info', [BasicinfoController::class,'basicInfo']);
Route::post('dashboard/basic/info/update', [BasicinfoController::class,'basicInfoUpdate']);

//Contact Information
Route::get('dashboard/contact/info', [ContactinfoController::class,'contactInfo']);
Route::post('dashboard/contact/info/update', [ContactinfoController::class,'contactInfoUpdate']);


//recyle bin
Route::get('recyle/bin', [IncomecategoryController::class,'recyleBin']);

require __DIR__.'/auth.php';
