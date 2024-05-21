<?php

use App\Http\Controllers\CurdController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route:: get('/display/cars',[CurdController::class,'showAllCars']);

Route:: get('/add/cars',[CurdController::class, 'addCar'])->name('addCar');

Route:: get('/edit/cars',[CurdController::class,'editCar'])->name('editCar');

Route:: get('/delete/cars/{id}',[CurdController::class,'deleteCar'])->name('deleteCar');
