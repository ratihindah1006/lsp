<?php

use App\Models\UnitModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/units', function (Request $request) {
    
    $units = UnitModel::whereIn('category_id', $request->category_id)->get();
    return response()->json([
        'status' => 'success',
        'message' => 'berhasil get list unit',
        'data' => $units
    ]);
})->name("api.units");