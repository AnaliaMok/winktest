@extends('master')

@section('title')
{{ $author_name }}
@endsection

@section('content')
<section class="container mb-2">
  <div class="row">
    <h2>Posts By {{ $author_name }}</h2>
  </div>
</section>
<blog-post-container container-type="author" container-arg="{!! $author_slug !!}"></blog-post-container>
@endsection