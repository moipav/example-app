<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
    $images = DB::table('images')->get();
    $images = $images->all();
    return view('main', ['images' => $images]);
});

Route::get('/create', function () {
    return view('create');
});

Route::post('/store', function (Request $request) {
    $path = $request->file('image')->store('images');
    DB::table('images')->insert(
        ['image' => $path]
    );
    return redirect('/');

});
Route::get('/show/{id}', function ($id) {
    $image = DB::table('images')->where('id', '=', $id)->first();
    return view('show', ['image' => $image]);
});


Route::get('/update/{id}', function ($id) {
    $image = DB::table('images')->where('id', '=', $id)->first();
    return view('update', ['image' => $image]);
});

Route::post('/update/{id}', function ($id, Request $request) {
    $image = DB::table('images')->where('id', '=', $id)->first();

    $path = $request->file('image')->store('images');
    Storage::delete($image->image);
    DB::table('images')
        ->where('id', $id)
        ->update(['image' => $path]);
    return back();
});

Route::get('/delete/{id}', function ($id, Request $request) {
    $image = DB::table('images')->where('id', '=', $id);
    Storage::delete($image->first()->image);
    $image->delete();
    return back();
});
