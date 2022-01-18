<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home');
});
Route::get('/view',[App\Http\Controllers\EmployeeController::class,'view'])->name('view');
Route::Post('/store',[App\Http\Controllers\EmployeeController::class,'store'])->name('employee.store');
Route::get('getEmployeeInfo}',[App\Http\Controllers\EmployeeController::class,'getEmployeeInfo'])->name('getEmployeeInfo');
Route::post('update/employee/info}',[App\Http\Controllers\EmployeeController::class,'update_employee_info'])->name('update.employee.info');
Route::get('delete/{id}',[App\Http\Controllers\EmployeeController::class,'delete'])->name('delete');

