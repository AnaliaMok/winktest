@extends('master')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <div class="container post">
        <div class="row">
            <article class="col-sm-12">
                <h1>{{ $post->title }}</h1>
                @php
                    $dt = new \Carbon\Carbon($post->publish_date);
                    $author_slug = strtolower(str_replace(' ', '-', $post->author->name));
                    $image_caption = strlen($post->featured_image_caption) > 0 ? $post->featured_image_caption : $post->title;
                @endphp
                <p class="post__date">Posted on {{ $dt->toFormattedDateString() }} | By <a href="/blog/author/{{ $author_slug }}">{{ $post->author->name }}</a></p>
                <div class="post__img-container">
                    <img src="{{ $post->featured_image }}" alt="{{ $image_caption }}">
                </div>
                <div class="post__content">
                    {!! $post->body !!}
                </div>
            </div>
        </div>
    </div>
@endsection