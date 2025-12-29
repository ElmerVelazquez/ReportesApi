<?php
namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/',[TestController::class, 'index']);
Route::get('/login',[TestController::class, 'login']);

Route::resource('/user',UserController::class)->except(['create', 'edit']);

Route::resource('/equipment',EquipmentController::class)->except(['create', 'edit']);

Route::resource('/equipment-type',EquipmentTypeController::class)->except(['create', 'edit']);

Route::resource('/equipment-status',EquipmentStatusController::class)->except(['create', 'edit']);

Route::resource('/equipment-attribute',EquipmentAttributeController::class)->except(['create', 'edit']);

Route::resource('/company',CompanyController::class)->except(['create', 'edit']);

Route::resource('/register',RegisterController::class)->except(['create', 'edit']);

