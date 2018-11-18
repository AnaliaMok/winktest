@extends('master')

@section('content')
<h2>Blog</h2>

<div>
    @foreach($posts as $post)
        <div>
            <div class="container">
                <div class="col-sm-12 col-md-6">
                    <h3>{{ $post->title }}</h3>
                    <p><strong>{{ $post->updated_at }}</strong></p>
                    <p>{{ $post->excerpt }}</p>
                </div>
                <div class="col-sm-12 col-md-6">
                    <img src="{{ $post->featured_image }}" alt="{{ $post->featured_image_caption }}">
                </div>
                <hr>
            </div>
        </div>
    @endforeach
</div>
@endsection