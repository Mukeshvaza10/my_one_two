<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenerateTimeTableController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/', [GenerateTimeTableController::class, 'getFormToFillData']);

Route::post('/formData/store', [GenerateTimeTableController::class, 'storeFormData']);

Route::get('/subjectDetails/add/{id}', [GenerateTimeTableController::class, 'subjectDetailsAdd'])->name('addSubjectDettails');

Route::post('/subjectFormData/store', [GenerateTimeTableController::class, 'storeSubjectFormData']);

Route::get('/generatedTimeTable/view/{user_id}', [GenerateTimeTableController::class, 'getTimeTable'])->name('timetable_view');

Route::get('/generatedTimeTable/list', [GenerateTimeTableController::class, 'list']);

