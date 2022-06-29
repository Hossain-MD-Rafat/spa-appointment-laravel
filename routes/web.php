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

Route::post('/submit_appointment', "Home@handleAppointment")->name('submit_appointment');
Route::post('/submit_form', "Home@handleUser")->name('submit_form');
Route::get('/', function () {
    return view('appointment');
})->name('home');
Route::get('/test', "Home@testpdf")->name('test');



