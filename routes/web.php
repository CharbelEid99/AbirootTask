<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CareerController ;
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
Route::get('/' , [CareerController::class , 'GetPositions'])->name('Home') ;

Route::post('AddCareerInfo',[CareerController::class , 'AddCareerInfo'])->name('AddCareerInfo') ;
