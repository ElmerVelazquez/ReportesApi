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

Route::get('/user',[UserController::class, 'index']);
Route::get('/user/{id}',[UserController::class,'show']);
Route::post('/user',[UserController::class,'store']);
Route::put('/user',[UserController::class,'update']);
Route::delete('/user',[UserController::class,'destroy']);

Route::get('/equipment',[EquipmentController::class,'index']);
Route::get('/equipment/{id}',[EquipmentController::class,'show']);
Route::post('/equipment',[EquipmentController::class,'store']);
Route::put('/equipment',[EquipmentController::class,'update']);
Route::delete('/equipment',[EquipmentController::class,'destroy']);

Route::get('/equipment-type',[EquipmentTypeController::class,'index']);
Route::get('/equipment-type/{id}',[EquipmentTypeController::class,'']);
Route::post('/equipment-type',[EquipmentTypeController::class,'store']);
Route::put('/equipment-type',[EquipmentTypeController::class,'update']);
Route::delete('/equipment-type',[EquipmentTypeController::class,'destroy']);

Route::get('/equipment-status',[EquipmentStatusController::class,'index']);
Route::get('/equipment-status/{id}',[EquipmentStatusController::class,'show']);
Route::post('/equipment-status',[EquipmentStatusController::class,'store']);
Route::put('/equipment-status',[EquipmentStatusController::class,'update']);
Route::delete('/equipment-status',[EquipmentStatusController::class,'destroy']);

Route::get('/equipment-attribute',[EquipmentAttributeController::class,'index']);
Route::get('/equipment-attribute/{id}',[EquipmentAttributeController::class,'show']);
Route::post('/equipment-attribute',[EquipmentAttributeController::class,'store']);
Route::put('/equipment-attribute',[EquipmentAttributeController::class,'update']);
Route::delete('/equipment-attribute',[EquipmentAttributeController::class,'destroy']);

Route::get('/company',[CompanyController::class,'index']);
Route::get('/company/{id}',[CompanyController::class,'show']);
Route::post('/company',[CompanyController::class,'store']);
Route::put('/company',[CompanyController::class,'update']);
Route::delete('/company',[CompanyController::class,'destroy']);

Route::get('/register',[RegisterController::class,'index']);
Route::get('/register/{id}',[RegisterController::class,'show']);
Route::post('/register',[RegisterController ::class, 'store']);
Route ::put ('/register', [RegisterController :: class, 'update']);