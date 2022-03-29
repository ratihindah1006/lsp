<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\Apl01Controller;
use App\Http\Controllers\Apl02Controller;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SchemaController;
use App\Http\Controllers\AssessiController;
use App\Http\Controllers\ElementController;
use App\Http\Controllers\AssessorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataAssessiController;
use App\Http\Controllers\SchemaClassController;
use App\Http\Controllers\DataAssessorController;
use App\Http\Controllers\AdminController;

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
    Route::get('/edit_password_admin', [AdminController::class, 'edit_password'])->name('edit_password_admin');
    Route::put('/edit_password_admin', [AdminController::class, 'update_password']);
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
    Route::get('/KelasSkema/{class:id}', [SchemaClassController::class, 'detail']);
    Route::delete('/KelasSkema/{class:id}', [SchemaClassController::class, 'destroy']);
    Route::put('schema/{id}', [SchemaClassController::class, 'schema']);
    Route::delete('event/{id}', [SchemaClassController::class, 'event']);
    Route::get('/event/{event:event_code}/KelasSkema', [SchemaClassController::class, 'index']);

    Route::get('/dataAssessi', [DataAssessiController::class, 'index_data_assessi']);
    Route::get('/dataAssessi/create', [DataAssessiController::class, 'create_data_assessi']);
    Route::post('/dataAssessi', [DataAssessiController::class, 'store_data_assessi']);
    Route::delete('/dataAssessi/{data_assessi:id}', [DataAssessiController::class, 'destroy_data_assessi']);
    Route::get('/dataAssessi/{data_assessi:id}/edit', [DataAssessiController::class, 'edit_data_assessi']);
    Route::put('/dataAssessi/{data_assessi:id}', [DataAssessiController::class, 'update_data_assessi']);
    
    Route::get('schemaAssessi/{id}',[DataAssessiController::class, 'schemaAssessi'] );
    Route::get('assessorAssessi/{id}',[DataAssessiController::class, 'assessorAssessi'] );

    //Route::get('/dataAssessor', [DataAssessorController::class, 'data_assessor']);
    Route::get('/dataAssessor/create', [DataAssessorController::class, 'create_data_assessor']);
    Route::post('/dataAssessor', [DataAssessorController::class, 'store_data_assessor']);
    Route::get('/dataAssessor', [DataAssessorController::class, 'index_data_assessor']);
    Route::get('/dataAssessor/{data_assessor:id}/edit', [DataAssessorController::class, 'edit_data_assessor']);
    Route::put('/dataAssessor/{data_assessor:id}', [DataAssessorController::class, 'update_data_assessor']);
    Route::delete('/dataAssessor/{data_assessor:id}', [DataAssessorController::class, 'destroy_data_assessor']);

    Route::get('/KelasSkema/{class:id}/dataAsesor', [DataAssessorController::class, 'index']);
    //Route::get('/KelasSkema/{class:id}/dataAsesor/create', [DataAssessorController::class, 'create']);
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
    Route::get('/category/{category:id}/edit', [CategoryController::class, 'edit']);
    Route::put('/category/{category:id}', [CategoryController::class, 'update']);
    Route::delete('/category/{category:id}', [CategoryController::class, 'destroy']);

    Route::get('/category/{category:id}/schema', [SchemaController::class, 'index']);
    Route::get('/category/{category:id}/schema/create', [SchemaController::class, 'create']);
    Route::post('/category/{category:id}/schema/', [SchemaController::class, 'store']);
    Route::get('/category/{category:id}/schema/{schema:id}/edit', [SchemaController::class, 'edit']);
    Route::put('/category/{category:id}/schema/{schema:id}', [SchemaController::class, 'update']);
    Route::get('/category/{category:id}/schema/{schema:id}/show', [SchemaController::class, 'show']);
    Route::delete('/category/{category:id}/schema/{schema:id}', [SchemaController::class, 'destroy']);

    
    Route::get('/category/{category:id}/schema/{schema:id}/unit', [UnitController::class, 'index']);
    Route::get('/category/{category:id}/schema/{schema:id}/unit/create', [UnitController::class, 'create']);
    Route::post('/category/{category:id}/schema/{schema:id}/unit', [UnitController::class, 'store']);
    Route::get('/category/{category:id}/schema/{schema:id}/unit/{unit:id}/edit', [UnitController::class, 'edit']);
    Route::put('/category/{category:id}/schema/{schema:id}/unit/{unit:id}', [UnitController::class, 'update']);
    Route::delete('/category/{category:id}/schema/{schema:id}/unit/{unit:id}', [UnitController::class, 'destroy']);

    Route::get('/category/{category:id}/schema/{schema:id}/unit/{unit:id}/element', [ElementController::class, 'index']);
    Route::post('/category/{category:id}/schema/{schema:id}/unit/{unit:id}/element', [ElementController::class, 'store']);
    Route::get('/category/{category:id}/schema/{schema:id}/unit/{unit:id}/element/{element:id}/edit', [ElementController::class, 'edit']);
    Route::put('/category/{category:id}/schema/{schema:id}/unit/{unit:id}/element/{element:id}', [ElementController::class, 'update']);
    Route::delete('/category/{category:id}/schema/{schema:id}/unit/{unit:id}/element/{element:id}', [ElementController::class, 'destroy']);

    Route::get('/category/{category:id}/schema/{schema:id}/unit/{unit:id}/element/{element:id}/criteria', [CriteriaController::class, 'index']);
    Route::get('/category/{category:id}/schema/{schema:id}/unit/{unit:id}/element/{element:id}/criteria/create', [CriteriaController::class, 'create']);
    Route::post('/category/{category:id}/schema/{schema:id}/unit/{unit:id}/element/{element:id}/criteria', [CriteriaController::class, 'store']);
    Route::get('/category/{category:id}/schema/{schema:id}/unit/{unit:id}/element/{element:id}/criteria/{criteria:id}/edit', [CriteriaController::class, 'edit']);
    Route::put('/category/{category:id}/schema/{schema:id}/unit/{unit:id}/element/{element:id}/criteria/{criteria:id}', [CriteriaController::class, 'update']);
    Route::delete('/category/{category:id}/schema/{schema:id}/unit/{unit:id}/element/{element:id}/criteria/{criteria:id}', [CriteriaController::class, 'destroy']);    
    
    Route::get('/soal', [QuestionController::class, 'index']);
    Route::get('/soal/create', [QuestionController::class, 'create']);
    Route::post('/soal', [QuestionController::class, 'store']);
    Route::get('/soal/{element:id}/edit', [QuestionController::class, 'edit']);
    Route::put('/soal/{question}', [QuestionController::class, 'update']);
    Route::delete('/soal/{question}', [QuestionController::class, 'destroy']);
    Route::get('/getUnit',[QuestionController::class, 'getUnit'])->name('getUnit');
    Route::get('/getElement',[QuestionController::class, 'getElement'])->name('getElement');
});

Route::group(['middleware' => 'auth:assessi'], function () {
    Route::get('/edit_password', [AssessiController::class, 'edit_password'])->name('edit_password');
    Route::put('/edit_password', [AssessiController::class, 'update_password']);
    Route::get('/beranda', [AssessiController::class, 'index']);
    Route::get('/apl01', [Apl01Controller::class, 'index']);
    Route::post('/beranda/{assessi:id}', [Apl01Controller::class, 'store']);
    Route::get('/apl01/{assessis:id}', [Apl01Controller::class, 'index']);
    Route::get('/apl02/{assessis:id}', [Apl02Controller::class, 'index']);
    Route::get('/exportapl02/{assessi:id}', [Apl02Controller::class, 'export']);
    Route::post('/apl02/store/{assessi:id}', [Apl02Controller::class, 'store']);
    Route::post('/assessi/muk06/store', [AssessiController::class, 'saveMUK06']);
    Route::get('/assessi/muk06/{assessi:id}', [AssessiController::class, 'muk06']);
    Route::get('/exportlaporan/{assessi:id}',  [Apl01Controller::class, 'export'] );
});

Route::group(['middleware' => 'auth:assessor'], function () {
    Route::get('/assessor', [AssessorController::class, 'index']);
    Route::get('/assessi/{assessor:id}', [AssessorController::class, 'assessi']);
    Route::get('/ubah_password', [AssessorController::class, 'edit_password'])->name('ubah_password');
    Route::put('/ubah_password', [AssessorController::class, 'update_password']);
    Route::get('/list', [AssessorController::class, 'list']);
    Route::get('/list/{assessi:id}', [AssessorController::class, 'apl01']);
    Route::get('/list02/{assessi:id}', [AssessorController::class, 'apl02']);
    Route::put('/list01/{assessi:id}', [AssessorController::class, 'status_apl01']);
    Route::put('/list/02/{assessi:id}', [AssessorController::class, 'status_apl02']);
    Route::get('/exportlaporanapl02/{assessi:id}',  [AssessorController::class, 'export'] );
    Route::get('/exportlaporan_apl01/{assessi:id}',  [AssessorController::class, 'export_apl01'] );
    Route::get('/assessor/ak01/{assessi:id}', [AssessorController::class, 'ak01']);
    Route::put('/assessor/ak01/edit/{assessi:id}', [AssessorController::class, 'updAK01']);
    Route::get('/assessor/muk01/{assessi:id}', [AssessorController::class, 'muk01']);
    Route::post('/assessor/muk01/update/{assessi:id}', [AssessorController::class, 'updMUK01']);
    Route::get('/assessor/muk06/{assessi:id}', [AssessorController::class, 'muk06']);
    Route::post('/assessor/muk06/update', [AssessorController::class, 'saveMUK06']);
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');