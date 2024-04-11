@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h1>Add image</h1>
                <form action="/store" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="input-group">
                        <input type="file" name="image" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                        <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Button</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
