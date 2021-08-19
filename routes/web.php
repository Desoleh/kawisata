<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\KgbController;
use App\Http\Controllers\MemoInternal\MailboxController;
use App\Http\Controllers\OncycleController;
use App\Http\Controllers\OffcycleController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\SalarySlipController;
use App\Http\Controllers\StrukturController;
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

Route::get('/', function () {return view('welcome');});

// verifikasi email registrasi
Auth::routes(['verify' => true]);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::resource('employees', EmployeeController::class);
    Route::resource('oncycles', OncycleController::class);
    Route::resource('offcycles', OffcycleController::class);
    Route::resource('kgb', KgbController::class);
    Route::resource('jabatan', PositionController::class);
    Route::resource('accounts', AccountController::class);


    Route::get('export', [EmployeeController::class, 'export'])->name('employee.export');
    Route::post('import', [EmployeeController::class, 'import'])->name('employee.import');

    Route::get('oncycle/export', [OncycleController::class, 'export'])->name('oncycle.export');
    Route::post('oncycle/import', [OncycleController::class, 'import'])->name('oncycle.import');
    Route::delete('oncycle/{id}', [OncycleController::class, 'destroy'])->name('oncycle.destroy');
    Route::delete('oncycledeleteall', [OncycleController::class, 'deleteAll'])->name('oncycle.deleteAll');

    Route::get('offcycle/export', [OffcycleController::class, 'export'])->name('offcycle.export');
    Route::post('offcycle/import', [OffcycleController::class, 'import'])->name('offcycle.import');
    Route::get('offcycle/cetakoffcycle', [OffcycleController::class, 'cetakoffcycle'])->name('offcycle.cetakoffcycle');

    Route::post('kgb/import', [KgbController::class, 'import'])->name('kgb.import');

    Route::get('jabatan/export', [PositionController::class, 'export'])->name('jabatan.export');
    Route::post('jabatan/import', [PositionController::class, 'import'])->name('jabatan.import');

    Route::post('account/import', [AccountController::class, 'import'])->name('account.import');


});

Route::prefix('user')->middleware(['auth','verified'])->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.home');
    Route::get('profile', [UserController::class, 'show'])->name('user.profile');
    Route::post('profile/simpanphoto', [UserController::class, 'simpanphoto'])->name('simpanphoto');
    Route::get('salary', [SalaryController::class, 'index'])->name('user.salary');
    Route::get('struktur', [StrukturController::class, 'index'])->name('struktur');

    // salary
    Route::get('/search', [SalaryController::class, 'search'])->name('search');
    Route::get('/searchoffcycle', [SalaryController::class, 'searchoffcycle'])->name('searchoffcycle');
    Route::get('/cetakoncycle', [SalaryController::class, 'cetakoncycle'])->name('cetakoncycle');


    // memo internal
    Route::get('mailbox', [ MailboxController::class, 'index'])->name('mailbox.index');
    Route::get('compose', [ MailboxController::class, 'compose'])->name('mailbox.compose');
    Route::post('store', [ MailboxController::class, 'store'])->name('mailbox.store');
    Route::get('edit', [ MailboxController::class, 'edit'])->name('mailbox.edit');

    Route::get('/file-upload',  [DocumentController::class,'upload']);
    Route::post('/file-upload', [DocumentController::class,'proses_upload'])->name('upload.foto');

    Route::post('/upload-akte', [DocumentController::class,'akte'])->name('upload.akte');
    Route::post('/upload-ktp', [DocumentController::class,'ktp'])->name('upload.ktp');
    Route::post('/upload-kk', [DocumentController::class,'kk'])->name('upload.kk');

    Route::get('/akte/{uuid}/download', [DocumentController::class,'downloadakte'])->name('download.akte');
    Route::get('/ktp/{uuid}/download', [DocumentController::class,'downloadktp'])->name('download.ktp');
    Route::get('/kk/{uuid}/download', [DocumentController::class,'downloadkk'])->name('download.kk');
});

    // Route::get('salary/{uuid}/download', [SalarySlipController::class, 'download'])->name('salary.download');
    Route::get('oncycle/{uuid}/view', [SalarySlipController::class, 'viewoncycle'])->name('view.oncycle');
    Route::get('offcycle/{uuid}/view', [SalarySlipController::class, 'viewoffcycle'])->name('view.offcycle');


