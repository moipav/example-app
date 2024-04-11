@extends('layout')

@section('content')
    <div class="container">
        <h1 class="text-center fw-bolder">Главная страница галереи</h1>
        <div class="row">
            <div class="col-md-3">
                <div>
                    <img src="/rand.jpg" class="img-thumbnail border-0" alt="pencil">
                </div>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="/show" type="button" class="btn btn-primary">Посмотреть</a>
                    <a href="/update" type="button" class="btn btn-primary">Изменить</a>
                    <a href="/delete" type="button" class="btn btn-primary">Удалить</a>
                </div>


            </div>
            <div class="col-md-3">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi commodi, cumque et fugiat, laborum neque nostrum perferendis perspiciatis placeat quisquam quos repudiandae rerum similique velit vitae voluptates voluptatum. Perferendis, quidem?
            </div>
            <div class="col-md-3">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi commodi, cumque et fugiat, laborum neque nostrum perferendis perspiciatis placeat quisquam quos repudiandae rerum similique velit vitae voluptates voluptatum. Perferendis, quidem?
            </div>
            <div class="col-md-3">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi commodi, cumque et fugiat, laborum neque nostrum perferendis perspiciatis placeat quisquam quos repudiandae rerum similique velit vitae voluptates voluptatum. Perferendis, quidem?
            </div>

        </div>
    </div>
@endsection
