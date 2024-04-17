<?php


use App\Http\Controllers\ImageController;
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



//позволяет не создавать отдельный метод если нужно только вывести представление
Route::view('/create',  'create');

//группировка маршрутов по контроллеру
Route::controller(ImageController::class)->group(function () {
    Route::get('/','index');
    Route::post('/store', 'store');
    Route::get('/update/{id}', 'updateView')->whereNumber('id');
    Route::get('/show/{id}', 'show')->whereNumber('id');
    Route::post('/update/{id}','update')->whereNumber('id');
    Route::get('/delete/{id}', 'delete')->whereNumber('id');
});
