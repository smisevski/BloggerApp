@extends('showLayout');

@section('content')
    <div class="container">
            <h3>{{ $post->title }}</h3>
            <span>Author: {{ $post->user->name }} - Category: {{ $post->category }} Posted At: {{ $post->created_at }}</span>
            <p>{{ $post->body }}</p>
        </div>
        <a href="{{ route('home') }}" class="btn btn-primary">Back</a>
@endsection
