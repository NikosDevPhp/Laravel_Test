@extends('layout')

@section('content')
    <div class="col-md-8 blog-main">
        <h1>Publish a Post</h1>

        <hr>

        <form method="POST" action="/posts">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Body</label>
                <textarea class="form-control" id="body" name="body" required></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Publish</button>
            </div>

            @include('layouts.errorsAlert')

        </form>

    </div>
@endsection
