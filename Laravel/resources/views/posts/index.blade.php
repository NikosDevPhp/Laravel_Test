@extends ('layout')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-4 mb-4 font-italic border-bottom">
            From the Firehose
        </h3>

        @foreach($posts as $post)
            @include('posts.post')
        @endforeach
        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
        </nav>

    </div><!-- /.blog-main -->
@endsection

@section('featured')
    @include('layouts.featured')
@endsection
