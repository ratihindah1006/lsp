<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SchemaController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ElementController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\apl02Controller;
use App\Http\Controllers\AuthController;

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





Route::get('/login', 'App\Http\Controllers\AuthController@index')->name('login');
Route::post('proses_login', 'App\Http\Controllers\AuthController@proses_login')->name('proses_login');
Route::get('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');
Route::get('/apl02', 'App\Http\Controllers\apl02Controller@index')->name('apl02');
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:admin']], function () {
        Route::get('/apl02', [apl02Controller::class, 'index']);
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
});
