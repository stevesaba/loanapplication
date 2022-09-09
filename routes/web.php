<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});
Route::get('/adminlogin', function () {
    return view('adminlogin');
});
Route::get('/customerlogin', function () {
    return view('customerlogin');
});
Route::get('/customerregistration', function () {
    return view('customerregistration');
});


Route::get('customerDashboard/','App\Http\Controllers\customercontroller@customerDashboard');
Route::get('customerLogout/','App\Http\Controllers\customercontroller@customerLogout');
Route::get('customerNewApplication/','App\Http\Controllers\customercontroller@customerNewApplication');
Route::post('customerNewApplicationAct/','App\Http\Controllers\customercontroller@customerNewApplicationAct');
Route::get('customerAppliedLoan/','App\Http\Controllers\customercontroller@customerAppliedLoan');



Route::post('adminloginvalidate/','App\Http\Controllers\admincontroller@adminloginvalidate');
Route::get('adminDashboard/','App\Http\Controllers\admincontroller@adminDashboard');
Route::get('adminLogout/','App\Http\Controllers\admincontroller@adminLogout');
Route::get('adminAppliedApplication/','App\Http\Controllers\admincontroller@adminAppliedApplication');
Route::get('adminApplicationApproval/{id}','App\Http\Controllers\admincontroller@adminApplicationApproval');
Route::get('adminApprovedApplication/','App\Http\Controllers\admincontroller@adminApprovedApplication');

