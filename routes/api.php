<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:api'])->group(function () {

    // Route::get('/companies', [CompanyController::class, 'read']);
    // Route::get('/companies/{id}', [CompanyController::class, 'show']);
    // Route::post('/companies', [CompanyController::class, 'create']);
    // Route::put('/companies/{id}', [CompanyController::class, 'update']);
    // Route::delete('/companies/{id}', [CompanyController::class, 'delete']);


    // Route::get('/employees', [EmployeeController::class, 'read']);
    // Route::get('/employees/{id}', [EmployeeController::class, 'show']);
    // Route::post('/employees', [EmployeeController::class, 'create']);
    // Route::put('/employees/{id}', [EmployeeController::class, 'update']);
    // Route::delete('/employees/{id}', [EmployeeController::class, 'delete']);
});
Route::get('/companies', [CompanyController::class, 'read']);
Route::get('/companies/{id}', [CompanyController::class, 'show']);
Route::post('/companies', [CompanyController::class, 'create']);
Route::put('/companies/{id}', [CompanyController::class, 'update']);
Route::delete('/companies/{id}', [CompanyController::class, 'delete']);


Route::get('/employees', [EmployeeController::class, 'read']);
Route::get('/employees/{id}', [EmployeeController::class, 'show']);
Route::post('/employees', [EmployeeController::class, 'create']);
Route::put('/employees/{id}', [EmployeeController::class, 'update']);
Route::delete('/employees/{id}', [EmployeeController::class, 'delete']);



Route::post('/login', [LoginController::class, 'login']);



