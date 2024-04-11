@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h1>Update image</h1>
                <form action="/update/{{$image->id}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <img src="/{{$image->image}}"  class="img-thumbnail border-0" alt="pic" width="128">
                    <input type="file" name="image" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Button</button>
                </form>
            </div>
        </div>
    </div>
@endsection
