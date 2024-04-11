@extends('layout')
@section('content')

    <div class="container">
        <h1 class="text-center fw-bolder">Главная страница галереи</h1>
        <div class="row">

            <div class="col-md-8 offset-md-2">
                <div>
                    <img src="/{{$image->image}}" class="img-thumbnail border-0" alt="{{$image->image}}">
                </div>
                <div class="btn-group" role="group" aria-label="Basic example offset-md-2">
                    <a href="/update/{{$image->id}}" type="button" class="btn btn-primary">Изменить</a>
                    <a href="/delete/{{$image->id}}" type="button" class="btn btn-primary">Удалить</a>
                </div>
            </div>

        </div>
    </div>
@endsection
