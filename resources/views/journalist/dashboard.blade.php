{{-- resources/views/journalist_dashboard.blade.php --}}
@extends('layout') {{-- Extend your main layout --}}

@section('content')
    <div class="container">
        <h2>Journalist Dashboard</h2>
        <a href="{{ route('articles.create') }}" class="btn btn-primary">Create New Article</a>

        <h3 class="mt-4">My Articles</h3>
        @foreach ($articles as $article)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="card-text">{{ Str::limit($article->content, 100) }}</p>
                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-secondary">Edit</a>
                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
