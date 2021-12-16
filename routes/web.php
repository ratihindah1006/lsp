<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SchemaController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ElementController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\Apl01Controller;
use App\Http\Controllers\Apl02Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AssessiController;

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
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/apl02', [apl02Controller::class, 'index']);

    Route::group(['middleware' => ['auth:admin,assessi,assessor']], function () {
        Route::get('/beranda', [AssessiController::class, 'index']);
        Route::get('apl01', [Apl01Controller::class, 'index']);
        Route::get('/apl02', [Apl02Controller::class, 'index']);
        Route::get('/category', [CategoryController::class, 'index']);
        Route::get('/category/create', [CategoryController::class, 'create']);
        Route::post('/category', [CategoryController::class, 'store']);
        Route::get('/category/{category_code}', [CategoryController::class, 'edit']);
        Route::put('/category/{category_code}', [CategoryController::class, 'update']);
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
  