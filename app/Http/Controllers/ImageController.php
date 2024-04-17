<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $images = DB::table('images')->get();
        $images = $images->all();
        return view('main', ['images' => $images]);
    }

    public function store(Request $request): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $path = $request->file('image')->store('images');
        DB::table('images')->insert(
            ['image' => $path]
        );
        return redirect('/');

    }

    public function show($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $image = DB::table('images')->where('id', '=', $id)->first();
        return view('show', ['image' => $image]);

    }

    public function updateView($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $image = DB::table('images')->where('id', '=', $id)->first();
        return view('update', ['image' => $image]);
    }

    public function update($id, Request $request): RedirectResponse
    {
        $image = DB::table('images')->where('id', '=', $id)->first();

        $path = $request->file('image')->store('images');
        Storage::delete($image->image);
        DB::table('images')
            ->where('id', $id)
            ->update(['image' => $path]);
        return back();
    }

    public function delete($id, Request $request): RedirectResponse
    {
        $image = DB::table('images')->where('id', '=', $id);
        Storage::delete($image->first()->image);
        $image->delete();
        return back();
    }
}
