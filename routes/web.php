<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\KgbController;
use App\Http\Controllers\MailboxController;
use App\Http\Controllers\OncycleController;
use App\Http\Controllers\OffcycleController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\UserController;
use App\Models\Oncycle;

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
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth', 'verified']);
// Route::resource('employees', EmployeeController::class)->middleware(['auth', 'verified']);

// Route::prefix('admin')->group(function () {
//     Route::get('/', [Admin\Auth\LoginController::class, 'loginForm']);
//     Route::get('/login', [Admin\Auth\LoginController::class, 'loginForm'])->name('admin.login');
//     Route::post('/login', [Admin\Auth\LoginController::class, 'login'])->name('admin.login');
//     Route::get('/home', [Admin\HomeController::class, 'index'])->name('admin.home');
//     Route::get('/logout', [Admin\Auth\LoginController::class, 'logout'])->name('admin.logout');
// });
Route::prefix('admin')->middleware(['auth','admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::resource('employees', EmployeeController::class);
    Route::resource('oncycles', OncycleController::class);
    Route::resource('offcycles', OffcycleController::class);
    Route::resource('kgb', KgbController::class);
    Route::resource('jabatan', PositionController::class);


    Route::get('export', [EmployeeController::class, 'export'])->name('employee.export');
    Route::post('import', [EmployeeController::class, 'import'])->name('employee.import');

    Route::get('oncycle/export', [OncycleController::class, 'export'])->name('oncycle.export');
    Route::post('oncycle/import', [OncycleController::class, 'import'])->name('oncycle.import');

    Route::get('offcycle/export', [OffcycleController::class, 'export'])->name('offcycle.export');
    Route::post('offcycle/import', [OffcycleController::class, 'import'])->name('offcycle.import');

    Route::post('kgb/import', [KgbController::class, 'import'])->name('kgb.import');

    Route::get('jabatan/export', [PositionController::class, 'export'])->name('jabatan.export');
    Route::post('jabatan/import', [PositionController::class, 'import'])->name('jabatan.import');


});

Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('profile', [UserController::class, 'show']);
    Route::post('profile/simpanphoto', [UserController::class, 'simpanphoto'])->name('simpanphoto');
    Route::get('salary', [SalaryController::class, 'index']);

    // salary
    Route::get('/search', [SalaryController::class, 'search'])->name('search');
    Route::get('/searchoffcycle', [SalaryController::class, 'searchoffcycle'])->name('searchoffcycle');
    Route::get('/cetakoncycle', [SalaryController::class, 'cetakoncycle'])->name('cetakoncycle');


    // memo internal
    Route::get('mailbox', [ MailboxController::class, 'index'])->name('mailbox.index');
    Route::get('compose', [ MailboxController::class, 'compose'])->name('mailbox.compose');
    Route::post('store', [ MailboxController::class, 'store'])->name('mailbox.store');


});


Route::get('/file-upload',  [DocumentController::class,'upload']);
Route::post('/file-upload', [DocumentController::class,'proses_upload'])->name('upload');
