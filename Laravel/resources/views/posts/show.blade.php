@extends ('layout')

@section('content')
    <div class="col-md-8 blog-main">
        <h2 class="blog-post-title">
            {{ $post->title }}
        </h2>

        {{ $post->body  }}
    </div>
@endsection
