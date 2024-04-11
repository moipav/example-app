@extends('layout')

@section('content')
    <div class="container">
        <h1 class="text-center fw-bolder">Главная страница галереи</h1>
        <div class="row">
            @foreach($images as $image)
            <div class="col-md-3">
                <div>
                    <a href="/show/{{$image->id}}"><img src="{{$image->image}}" class="img-thumbnail border-0" alt="xyz" width="128px"></a>
                </div>
                <a href="/update/{{$image->id}}" class="btn btn-primary">Изменить</a>
                <a href="/delete/{{$image->id}}" class="btn btn-danger">Удалить</a>
            </div>
            @endforeach


        </div>
    </div>
@endsection
