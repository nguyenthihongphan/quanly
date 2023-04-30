<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocateController;
use App\Http\Controllers\ExcelCSVController;
use App\Models\User;

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
// Route::get('/confirm', [AuthController::class, 'confirm'])->name('confirm');
Route::get('/admin/login', [AuthController::class, 'login'])->name('login');
Route::post('/admin', [AuthController::class, 'checkLogin'])->name('checkLogin');
// Route::get('/admin/register', [AuthController::class, 'register'])->name('register');
// Route::post('/admin/register', [AuthController::class, 'account'])->name('account');
// Route::prefix('admin')->group(function () {
//     Route::get('/', [AuthController::class, 'index'])->name('admin');   

// });
Route::prefix('register')->group(function () {
    Route::get('/',[AuthController::class, 'register'])->name('register');
    Route::post('/',[AuthController::class, 'account'])->name('account');
    Route::post('/confirm' , [AuthController::class, 'confirm'])->name('confirm');
    Route::get('/confirm', [AuthController::class, 'confirmRegister'])->name('register.confirm');
    Route::get('/district', [AuthController::class, 'getDistrict'])->name('register.district');
}); 
 Route::get('/admin/{locate}', [LocateController::class, 'locate'])->name('locate');
    
// 
Route::group(['middleware' => 'auth'] , function(){
    Route::get('/', [AuthController::class, 'index'])->name('admin');
    Route::prefix('admin')->group(function () {
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::prefix('user')->group(function () 
{
    Route::get('/list', [UserController::class, 'index'])->name('list');   
    Route::get('/users/add', [UserController::class, 'add'])->name('addUser');   
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/users/edit/{id}', [UserController::class, 'editUser'])->name('editUser'); 
    Route::get('/users/show{id}', [UserController::class, 'show'])->name('show'); 
    Route::post('/users/update{id}', [UserController::class, 'update'])->name('update');
    Route::get('/users/delete{id}', [UserController::class, 'destroy'])->name('destroy');
    Route::get('/users/search', [UserController::class, 'search'])->name('search');
    Route::post('import-excel-csv-user', [ExcelCSVController::class, 'importUser'])->name('importUser');
// Route::post('import-view', [ExcelCSVController::class, 'importView'])->name('importView');
    Route::get('export-excel-csv-user', [ExcelCSVController::class, 'exportUser'])->name('exportUser');
// Route::get('/csv-user', [ExcelCSVController::class, 'exportUser'])->name('exportUser');
    Route::get('/export-pdf-user', [ExcelCSVController::class, 'exportPDF'])->name('exportPDF');
}); 
}); 
});


