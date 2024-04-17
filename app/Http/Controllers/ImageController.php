<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
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

    public function __construct(
        readonly object $images = new ImageService()
    )
    {
    }

    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $images = $this->images->getAll();
        return view('main', ['images' => $images]);
    }

    public function store(Request $request): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $path = $request->file('image')->store('images');
        $this->images->store();
        return redirect('/');

    }

    public function show($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $image = $this->images->getOne($id);
        return view('show', ['image' => $image]);

    }

    public function updateView($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $image = $this->images->getOne($id);
        return view('update', ['image' => $image]);
    }

    public function update($id, Request $request): RedirectResponse
    {
        $image = $this->images->getOne($id);
        $path = $request->file('image')->store('images');
        Storage::delete($image->image);
        $this->images->update($id, $path);
        return back();
    }

    public function delete($id, Request $request): RedirectResponse
    {
        $image = $this->images->getOne($id);
        Storage::delete($image->image);
        $this->images->delete($id);
        return back();
    }
}
