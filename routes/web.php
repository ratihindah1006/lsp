<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
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
use App\Http\Controllers\SchemaClassController;

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
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/postLogin', [AuthController::class, 'postLogin'])->name('postLogin');



Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/dashboard/create', [DashboardController::class, 'create']);
    Route::post('/dashboard', [DashboardController::class, 'store']);
    Route::get('/dashboard/{dashboard:id}/edit', [DashboardController::class, 'edit']);
    Route::put('/dashboard/{dashboard:id}', [DashboardController::class, 'update']);
    Route::delete('/dashboard/{dashboard:id}', [DashboardController::class, 'destroy']);

    Route::get('/event', [EventController::class, 'index']);
    Route::get('/event/create', [EventController::class, 'create']);
    Route::post('/event', [EventController::class, 'store']);
    Route::get('/event/{event:id}/edit', [EventController::class, 'edit']);
    Route::put('/event/{event:id}', [EventController::class, 'update']);
    Route::delete('/event/{event:id}', [EventController::class, 'destroy']);

    Route::get('/KelasSkema', [SchemaClassController::class, 'index']);
    Route::get('/KelasSkema/create', [SchemaClassController::class, 'create']);
    Route::post('/KelasSkema', [SchemaClassController::class, 'store']);
    Route::get('/KelasSkema/{class:id}/edit', [SchemaClassController::class, 'edit']);
    Route::put('/KelasSkema/{class:id}', [SchemaClassController::class, 'update']);
    Route::delete('/KelasSkema/{class:id}', [SchemaClassController::class, 'destroy']);
    Route::put('schema/{id}', [SchemaClassController::class, 'schema']);
    Route::delete('event/{id}', [SchemaClassController::class, 'event']);
    Route::get('/event/{event:event_code}/KelasSkema', [SchemaClassController::class, 'index']);

    Route::get('/dataAssessi', [DataAssessiController::class, 'index']);
    Route::get('/dataAssessi/add', [DataAssessiController::class, 'add']);
    Route::post('/dataAssessi', [DataAssessiController::class, 'storee']);
    Route::get('/dataAssessi/create', [DataAssessiController::class, 'create']);
    // Route::post('/dataAssessi', [DataAssessiController::class, 'store']);
    Route::get('/dataAssessi/{assessi:id}/edit', [DataAssessiController::class, 'edit']);
    Route::put('/dataAssessi/{assessi:id}', [DataAssessiController::class, 'update']);
    Route::delete('/dataAssessi/{assessi:id}', [DataAssessiController::class, 'destroy']);
    Route::get('schemaAssessi/{id}',[DataAssessiController::class, 'schemaAssessi'] );
    Route::get('assessorAssessi/{id}',[DataAssessiController::class, 'assessorAssessi'] );

    Route::get('/KelasSkema/{class:id}/dataAsesor', [DataAssessorController::class, 'index']);
    Route::get('/KelasSkema/{class:id}/dataAsesor/create', [DataAssessorController::class, 'create']);
    Route::post('/KelasSkema/{class:id}/dataAsesor', [DataAssessorController::class, 'store']);
    Route::get('/KelasSkema/{class:id}/dataAsesor/{assessor:id}/edit', [DataAssessorController::class, 'edit']);
    Route::put('/KelasSkema/{class:id}/dataAsesor/{assessor:id}', [DataAssessorController::class, 'update']);
    Route::delete('/KelasSkema/{class:id}/dataAsesor/{assessor:id}', [DataAssessorController::class, 'destroy']);
    
    Route::get('/KelasSkema/{class:id}/dataAsesi', [DataAssessiController::class, 'index']);
    Route::get('/KelasSkema/{class:id}/dataAsesi/create', [DataAssessiController::class, 'create']);
    Route::post('/KelasSkema/{class:id}/dataAsesi', [DataAssessiController::class, 'store']);
    Route::get('/KelasSkema/{class:id}/dataAsesi/{assessi:id}/edit', [DataAssessiController::class, 'edit']);
    Route::put('/KelasSkema/{class:id}/dataAsesi/{assessi:id}', [DataAssessiController::class, 'update']);
    Route::delete('/KelasSkema/{class:id}/dataAsesi/{assessi:id}', [DataAssessiController::class, 'destroy']);

    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/category/create', [CategoryController::class, 'create']);
    Route::post('/category', [CategoryController::class, 'store']);
    Route::get('/category/{category:category_code}/edit', [CategoryController::class, 'edit']);
    Route::put('/category/{category:category_code}', [CategoryController::class, 'update']);
    Route::delete('/category/{category:category_code}', [CategoryController::class, 'destroy']);

    Route::get('/category/{category:category_code}/schema', [SchemaController::class, 'index']);
    Route::get('/category/{category:category_code}/schema/create', [SchemaController::class, 'create']);
    Route::post('/category/{category:category_code}/schema/', [SchemaController::class, 'store']);
    Route::get('/category/{category:category_code}/schema/{schema:schema_code}/edit', [SchemaController::class, 'edit']);
    Route::put('/category/{category:category_code}/schema/{schema:schema_code}', [SchemaController::class, 'update']);
    Route::get('/category/{category:category_code}/schema/{schema:schema_code}/show', [SchemaController::class, 'show']);
    Route::delete('/category/{category:category_code}/schema/{schema:schema_code}', [SchemaController::class, 'destroy']);

    
    Route::get('/category/{category:category_code}/schema/{schema:schema_code}/unit', [UnitController::class, 'index']);
    Route::get('/category/{category:category_code}/schema/{schema:schema_code}/unit/create', [UnitController::class, 'create']);
    Route::post('/category/{category:category_code}/schema/{schema:schema_code}/unit', [UnitController::class, 'store']);
    Route::get('/category/{category:category_code}/schema/{schema:schema_code}/unit/{unit:unit_code}/edit', [UnitController::class, 'edit']);
    Route::put('/category/{category:category_code}/schema/{schema:schema_code}/unit/{unit:unit_code}', [UnitController::class, 'update']);
    Route::delete('/category/{category:category_code}/schema/{schema:schema_code}/unit/{unit:unit_code}', [UnitController::class, 'destroy']);

    Route::get('/category/{category:category_code}/schema/{schema:schema_code}/unit/{unit:unit_code}/element', [ElementController::class, 'index']);
    Route::get('/category/{category:category_code}/schema/{schema:schema_code}/unit/{unit:unit_code}/element/create', [ElementController::class, 'create']);
    Route::post('/category/{category:category_code}/schema/{schema:schema_code}/unit/{unit:unit_code}/element', [ElementController::class, 'store']);
    Route::get('/category/{category:category_code}/schema/{schema:schema_code}/unit/{unit:unit_code}/element/{element:element_code}/edit', [ElementController::class, 'edit']);
    Route::put('/category/{category:category_code}/schema/{schema:schema_code}/unit/{unit:unit_code}/element/{element:element_code}', [ElementController::class, 'update']);
    Route::delete('/category/{category:category_code}/schema/{schema:schema_code}/unit/{unit:unit_code}/element/{element:element_code}', [ElementController::class, 'destroy']);

    Route::get('/category/{category:category_code}/schema/{schema:schema_code}/unit/{unit:unit_code}/element/{element:element_code}/criteria', [CriteriaController::class, 'index']);
    Route::get('/category/{category:category_code}/schema/{schema:schema_code}/unit/{unit:unit_code}/element/{element:element_code}/criteria/create', [CriteriaController::class, 'create']);
    Route::post('/category/{category:category_code}/schema/{schema:schema_code}/unit/{unit:unit_code}/element/{element:element_code}/criteria', [CriteriaController::class, 'store']);
    Route::get('/category/{category:category_code}/schema/{schema:schema_code}/unit/{unit:unit_code}/element/{element:element_code}/criteria/{criteria:criteria_code}/edit', [CriteriaController::class, 'edit']);
    Route::put('/category/{category:category_code}/schema/{schema:schema_code}/unit/{unit:unit_code}/element/{element:element_code}/criteria/{criteria:criteria_code}', [CriteriaController::class, 'update']);
    Route::delete('/category/{category:category_code}/schema/{schema:schema_code}/unit/{unit:unit_code}/element/{element:element_code}/criteria/{criteria:criteria_code}', [CriteriaController::class, 'destroy']);    
    });

Route::group(['middleware' => 'auth:assessi'], function () {
    Route::get('/beranda', [AssessiController::class, 'index']);
    Route::get('/apl01', [Apl01Controller::class, 'index']);
    Route::post('/beranda', [Apl01Controller::class, 'store']);
    Route::get('/apl01/{id}', [Apl01Controller::class, 'edit']);
    Route::get('/apl02', [Apl02Controller::class, 'index']);
    Route::post('/apl02/store', [Apl02Controller::class, 'store']);
});

Route::group(['middleware' => 'auth:assessor'], function () {
    Route::get('/assessor', [AssessorController::class, 'index']);
    Route::get('/list', [AssessorController::class, 'list']);
    Route::get('/list/{assessi:id}', [AssessorController::class, 'apl01']);
    Route::get('/list02/{assessi:id}', [AssessorController::class, 'apl02']);
    Route::put('/list', [AssessorController::class, 'status']);
    Route::put('/list/02/{assessi:id}', [AssessorController::class, 'asesmen']);
   
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');