@extends('master')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <div class="container post">
        <div class="row">
            <article class="col-sm-12">
                {{-- Breadcrumb --}}
                <div class="post__breadcrumb">
                    <span><a href="{{ $breadcrumb['blog'] }}">Blog</a></span> |
                    @if(isset($breadcrumb['category']))
                    <span><a href="{{ $breadcrumb['category']['link'] }}">{{ $breadcrumb['category']['name'] }}</a></span> |
                    @endif
                    <span><a href="/blog/{{ $post->slug }}">{{ $post->title }}</a></span>
                </div>
                <h1>{{ $post->title }}</h1>
                <p class="post__date">Posted on {{ $publish_date }} | By <a href="/blog/author/{{ $author_slug }}">{{ $post->author->name }}</a></p>
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