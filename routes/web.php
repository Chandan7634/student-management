<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PartyController;
use App\Http\Middleware\VerifyMiddleware;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AttendenceController;
use App\Http\Middleware\VerifyPartyMiddleware;
use App\Http\Controllers\AttendenceTableController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(VerifyMiddleware::class)->group(function(){ 

Route::resource('/students',StudentController::class);
Route::resource('/classes',ClassController::class);
Route::resource('/attendence',AttendenceController::class);
Route::resource('/revenue',RevenueController::class);
Route::get('/fetch',[AttendenceTableController::class,'fetch'])->name('fetchStudentData');
Route::get('/fetch_revenue',[AttendenceTableController::class,'fetch_revenue'])->name('fetch_revenue');
Route::get('/fetch_student',[AttendenceTableController::class,'fetch_student'])->name('fetch_student');
Route::get('/edit_revenue',[AttendenceTableController::class,'edit_revenue'])->name('edit_revenue');
});

Route::resource('/parties',PartyController::class)->middleware([VerifyPartyMiddleware::class,VerifyMiddleware::class]);

Route::post('/login',[LoginController::class,'login'])->name('login');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');