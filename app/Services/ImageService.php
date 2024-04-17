<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class ImageService
{


    public function getAll(): array
    {
        $images = DB::table('images')->get();
        return $images->all();
    }

    public function getOne($id)
    {
        return DB::table('images')->where('id', '=', $id)->first();
    }

    public function update($id, $path): void
    {
        DB::table('images')
            ->where('id', $id)
            ->update(['image' => $path]);
    }

    public function delete($id): void
    {
        DB::table('images')
            ->where('id', $id)
            ->delete();
    }

    public function store($path): void
    {
        DB::table('images')->insert(
            ['image' => $path]
        );
    }
}
