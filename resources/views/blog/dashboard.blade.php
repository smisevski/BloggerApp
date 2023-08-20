@extends('layouts.app');

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category }}</td>
                        <td><a href="{{ route('post.edit', ['post' => $post->id]) }}">Edit</a></td>
                        <td>
                            <form method="POST" action="{{ route('post.destroy', ['post' => $post->id]) }}">
                                @csrf
                                @method('DELETE')
                                <div class="form-group">
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <a href="{{ route('post.create') }}" class="btn btn-success">Add Post</a>
        </div>
    </div>
@endsection
