<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register-peso', function () {
    return view('register-peso');
});

Route::get('/directory',[EmployeeController::class, 'directory']);

Route::get('/import-form',[EmployeeController::class, 'importForm']);
Route::post('/import-form',[EmployeeController::class, 'saveImportFormFile'])->name('import-form');

Route::get('/scan-qrcode',[EmployeeController::class, 'scan'])->name('scan');
Route::post('/scan-qrcode',[EmployeeController::class, 'scanQrcode'])->name('scan-qrcode');
Route::post('/post',[EmployeeController::class, 'store'])->name('store');
Route::get('/employee/{id}',[EmployeeController::class, 'show'])->name('show');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/pending',[EmployeeController::class, 'pending'])->name('pending');
Route::get('/approved',[EmployeeController::class, 'approved'])->name('approved');
Route::get('/attended-day-1',[EmployeeController::class, 'attended'])->name('attended');
Route::get('/attended-day-2',[EmployeeController::class, 'attendedTwo'])->name('attended-two');
Route::get('/attended-day-3',[EmployeeController::class, 'attendedThree'])->name('attended-three');
Route::patch('/pending/{id}',[EmployeeController::class, 'update'])->name('update');
