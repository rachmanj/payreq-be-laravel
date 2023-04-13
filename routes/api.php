<?php

use App\Http\Controllers\Api\AccountApiController;
use App\Http\Controllers\Api\AdvanceCategoryApiController;
use App\Http\Controllers\Api\ApprovedApiController;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\EmployeeApiController;
use App\Http\Controllers\Api\InvoiceApiController;
use App\Http\Controllers\Api\OutgoingApiController;
use App\Http\Controllers\Api\RabApiController;
use App\Http\Controllers\Api\PayreqApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthApiController::class, "register"]);
Route::post('/login', [AuthApiController::class, "login"]);

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/logout', [AuthApiController::class, "logout"]);
    Route::get('/isauth', [AuthApiController::class, "isauth"]);
});

Route::post('/invoices', [InvoiceApiController::class, 'store']);

// PAYREQS API
Route::prefix('payreqs')->group(function () {
    Route::get('/', [PayreqApiController::class, 'index']);
    Route::post('/check-unique', [PayreqApiController::class, 'check_unique']);
    Route::put('/{id}', [PayreqApiController::class, 'update']);
    Route::get('/{id}', [PayreqApiController::class, 'getById']);
});

//APPROVED API
Route::prefix('approved')->group(function () {
    Route::get('/', [ApprovedApiController::class, 'index']);
    Route::get('/{id}', [ApprovedApiController::class, 'show']);
    Route::post('/', [ApprovedApiController::class, 'store']);
    Route::put('/{id}', [ApprovedApiController::class, 'update']);
    Route::delete('/{id}', [ApprovedApiController::class, 'destroy']);
});

//OUTGOINGS API
Route::prefix('outgoings')->group(function () {
    Route::get('/', [OutgoingApiController::class, 'index']);
});

// ADVANCE CATEGORY API
Route::prefix('adv-category')->group(function () {
    Route::get('/', [AdvanceCategoryApiController::class, 'index']);
});

// RAB API
Route::prefix('rabs')->group(function () {
    Route::get('/', [RabApiController::class, 'index']);
});

// EMPLOYEE API
Route::prefix('employees')->group(function () {
    Route::get('/', [EmployeeApiController::class, 'index']);
});

// ACCOUNTS API
Route::prefix('accounts')->group(function () {
    Route::get('/', [AccountApiController::class, 'index']);
});
