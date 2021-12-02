<?php

use App\Http\Controllers\ClasController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\FeesController;
use App\Http\Controllers\FeesInvoiceController;
use App\Http\Controllers\Gard1Controller;
use App\Http\Controllers\GardutedStudentController;
use App\Http\Controllers\ReceptStudentController;
use App\Http\Controllers\Section1Controller;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\Student1Controller;
use App\Http\Controllers\Teacher1Controller;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UploadAndDownloadFile;
use App\Models\Student1;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use PhpParser\Node\Expr\New_;

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', function () {
            return view('empty');
        })->name('dashboard');


        Route::resource('grades', Gard1Controller::class);
        Route::prefix('classrooms')->group(function () {
            Route::resource('classrooms', ClasController::class);
            Route::post('delete_all/', [ClasController::class, 'delete_all'])
                ->name('delete_all');
            Route::post('gardsclass/', [ClasController::class, 'gardsClass'])
                ->name('gardsclass');
        });

        Route::prefix('sections')->group(function () {
            Route::resource('Sections', Section1Controller::class);
            Route::get('classes/{id}', [Section1Controller::class, 'classes']);
        });

        Route::prefix('parents')->group(function () {
            Route::view('addparent', 'livewire.show_counter')->name('add_parent');
        });

        Route::prefix('teachers')->group(function () {
            Route::resource('teachers', Teacher1Controller::class);
        });

        Route::prefix('student')->group(function () {
            Route::resource('student', Student1Controller::class);
            Route::get('get_class/{id}', [Student1Controller::class, 'get_class']);
            Route::get('get_sections/{id}', [Student1Controller::class, 'get_sections']);
            Route::get('promotions_form',  [Student1Controller::class, 'promotions_form'])->name('promotions_form');
            Route::post('promotions', [Student1Controller::class, 'promotions'])->name('promotions');
        });
        Route::prefix('student_fes')->group(function () {
            Route::resource('invoices', FeesInvoiceController::class);
            Route::get('create/{id}', [FeesInvoiceController::class, 'create_invocie'])->name('invoice.create');
            // Route::get('invoices/', [Student1Controller::class, 'InvoiceIndex'])->name('invoice.index');
            // Route::get('invoices/{id}', [Student1Controller::class, 'feeInvoice'])->name('insert_invoice');
            // Route::post('student_invoice', [Student1Controller::class, 'student_invoices'])->name('student_invoice');
        });

        Route::prefix('Recept')->group(function () {
            Route::resource('recept', ReceptStudentController::class);
        });
        Route::prefix('fees')->group(function () {
            Route::resource('fees', FeesController::class);
            Route::get('show/{class_id}/{type_id}', [FeesController::class, 'show']);
        });

        Route::prefix('promotions')->group(function () {
            Route::get('pormation/', [Student1Controller::class, 'promotionsTable'])->name('pormation.table');
            Route::get('pormation/reset', [Student1Controller::class, 'resetPromotions'])->name('pormation.reset');
            Route::get('pormation/RestPromotionsOne/{id}', [Student1Controller::class,  'RestPromotionsOne'])->name('RestPromotionsOne');
        });

        Route::prefix('garduted')->group(function () {
            Route::get('garduted/index', [GardutedStudentController::class, 'index'])->name('stgarduted.index');
            Route::get('garduted/create', [GardutedStudentController::class, 'create'])->name('stgarduted.create');
            Route::post('garduted/store', [GardutedStudentController::class, 'store'])->name('stgarduted.store');
            Route::get(
                'garduted/reset/{id}',
                [GardutedStudentController::class, 'reSet']
            )->name('stgarduted.reset');
            Route::get('garduted/destroy/{id}', [GardutedStudentController::class, 'destory'])->name('stgarduted.destroy');
        });

        Route::prefix('attachment')->group(function () {
            Route::post('attachment/as', [
                Student1Controller::class, 'attachment'
            ])->name('attchment.file');
            Route::post('attachment', [
                UploadAndDownloadFile::class, 'attachment'
            ])->name('attchment.file');
            Route::post('attachment', [
                UploadAndDownloadFile::class, 'attachmentStore'
            ])->name('attachment.store');

            Route::get('attachment/destroy/{id}/{type}', [
                UploadAndDownloadFile::class, 'DestroyFile'
            ])->name('attachment.destroy');

            Route::get('attachment/downlaod/{id}/{type}', [
                UploadAndDownloadFile::class, 'DownloadFile'
            ])->name('attachment.download');
        });


        Auth::routes();
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    }
);