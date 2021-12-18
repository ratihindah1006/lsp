<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataAssessiController;
use App\Http\Controllers\DataAssessorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SchemaController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ElementController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\Apl01Controller;
use App\Http\Controllers\Apl02Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AssessiController;
use App\Http\Controllers\AssessorController;

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





Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/postLogin', [AuthController::class, 'postLogin'])->name('postLogin');



Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/dataAssessi', [DataAssessiController::class, 'index']);
    Route::get('/dataAssessi/create', [DataAssessiController::class, 'create']);
    Route::post('/dataAssessi', [DataAssessiController::class, 'store']);
    Route::get('/dataAssessi/{assessi:id}/edit', [DataAssessiController::class, 'edit']);
    Route::put('/dataAssessi/{assessi:id}', [DataAssessiController::class, 'update']);
    Route::delete('/dataAssessi/{assessi:id}', [DataAssessiController::class, 'destroy']);

    Route::get('/dataAssessor', [DataAssessorController::class, 'index']);
    Route::get('/dataAssessor/create', [DataAssessorController::class, 'create']);
    Route::post('/dataAssessor', [DataAssessorController::class, 'store']);
    Route::get('/dataAssessor/{assessor:id}/edit', [DataAssessorController::class, 'edit']);
    Route::put('/dataAssessor/{assessor:id}', [DataAssessorController::class, 'update']);
    Route::delete('/dataAssessor/{assessor:id}', [DataAssessorController::class, 'destroy']);

    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/category/create', [CategoryController::class, 'create']);
    Route::post('/category', [CategoryController::class, 'store']);
    Route::get('/category/{category:category_code}/edit', [CategoryController::class, 'edit']);
    Route::put('/category/{category:category_code}', [CategoryController::class, 'update']);
    Route::put('/category/{category:category_code}', [CategoryController::class, 'destroy']);

    Route::get('/category/{category:category_code}/schema', [SchemaController::class, 'index']);
    Route::get('/category/{category:category_code}/schema/create', [SchemaController::class, 'create']);
    Route::post('/category/{category:category_code}/schema/', [SchemaController::class, 'store']);
    Route::get('/category/{category:category_code}/schema/{schema:schema_code}/edit', [SchemaController::class, 'edit']);
    Route::put('/category/{category:category_code}/schema/{schema:schema_code}', [SchemaController::class, 'update']);
    Route::get('/category/{category:category_code}/schema/{schema:schema_code}/show', [SchemaController::class, 'show']);
    Route::get('/category/{category:category_code}/schema/{schema:schema_code}/unit', [UnitController::class, 'index']);
    Route::get('/category/{category:category_code}/schema/{schema:schema_code//unit/create}', [UnitController::class, 'create']);

    Route::get('/category/{category:category_code}/schema/{schema:schema_code}/unit/{unit:unit_code}/element', [ElementController::class, 'index']);
    Route::get('/category/{category:category_code}/schema/{schema:schema_code}/unit/{unit:unit_code}/element/create', [ElementController::class, 'create']);
    Route::post('/category/{category:category_code}/schema/{schema:schema_code}/unit/{unit:unit_code}/element', [ElementController::class, 'store']);
    Route::get('/category/{category:category_code}/schema/{schema:schema_code}/unit/{unit:unit_code}/element/{element:element_code}/edit', [ElementController::class, 'edit']);
    Route::put('/category/{category:category_code}/schema/{schema:schema_code}/unit/{unit:unit_code}/element/{element:element_code}', [ElementController::class, 'update']);

    Route::get('/category/{category:category_code}/schema/{schema:schema_code}/unit/{unit:unit_code}/element/{element:element_code}/criteria', [CriteriaController::class, 'index']);
    Route::get('/category/{category:category_code}/schema/{schema:schema_code}/unit/{unit:unit_code}/element/{element:element_code}/criteria/create', [CriteriaController::class, 'create']);
    Route::post('/category/{category:category_code}/schema/{schema:schema_code}/unit/{unit:unit_code}/element/{element:element_code}/criteria', [CriteriaController::class, 'store']);
    Route::get('/category/{category:category_code}/schema/{schema:schema_code}/unit/{unit:unit_code}/element/{element:element_code}/criteria/{criteria:criteria_code}/edit', [CriteriaController::class, 'edit']);
    Route::put('/category/{category:category_code}/schema/{schema:schema_code}/unit/{unit:unit_code}/element/{element:element_code}/criteria/{criteria:criteria_code}', [CriteriaController::class, 'update']);
        
    });

Route::group(['middleware' => 'auth:assessi'], function () {
    Route::get('/beranda', [AssessiController::class, 'index']);
    Route::get('/apl01', [Apl01Controller::class, 'index']);
    Route::get('/apl02', [Apl02Controller::class, 'index']);
});

Route::group(['middleware' => 'auth:assessor'], function () {
    Route::get('/assessor', [AssessorController::class, 'index']);
   
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');