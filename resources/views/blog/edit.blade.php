@extends('layouts.app');

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Post #') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('post.update', ['post' => $post->id]) }}">
                            @method('PUT')
                            @csrf
                            <label for="title">Title</label>
                            <input class="form-control mb-2" type="text" id="title" name="title"
                                   placeholder="Write post title" value="{{ $post->title }}">
                            <label for="body">Body</label>
                            <textarea class="form-control mb-2" type="text" id="body" name="body"
                                      placeholder="Write post body">{{ $post->body }}</textarea>
                            <label for="category">Category</label>
                            <input class="form-control mb-2" type="text" id="category" name="category"
                                   placeholder="Write post category" value="{{ $post->category }}">
                            <input class="form-control mb-2" type="hidden" id="user_id" name="user_id"
                                   value="{{ Auth::user()->id }}">
                            <input class="btn btn-primary mb-2" type="submit" value="Save">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
