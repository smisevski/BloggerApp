@extends('welcome')

@section('content')
    @foreach($posts as $post)
        <div class="m-4">
            <div class="card" style="width: 18rem;">
                <a href="{{ route('showPost', ['id' => $post->id]) }}" class="mb-4">

                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">{{ Str::words($post->body, 9, '...') }}</p>
                    </div>
                </a>

            </div>
        </div>
    @endforeach

@endsection
