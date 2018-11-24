@extends('master')

@section('title')
{{ $category }}
@endsection

@section('content')
<section class="container mb-2">
  <div class="row">
    <h2>Posts In {{ $category }}</h2>
  </div>
</section>
<blog-post-container container-type="category" container-arg="{!! $category !!}"></blog-post-container>
@endsection