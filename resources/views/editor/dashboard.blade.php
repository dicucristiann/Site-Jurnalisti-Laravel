@extends('layout')

@section('content')
    <div class="container">
        <h1>Editor Dashboard</h1>
        <div class="list-group mt-4">
            @foreach ($articles as $article)
                <div class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $article->title }}</h5>
                        <small>{{ $article->created_at->format('d M Y') }}</small>
                    </div>
                    <p class="mb-1">{{ Str::limit($article->content, 100) }}</p>
                    <small>Status: {{ ucfirst($article->status) }}</small>
                    <a href="{{ route('articles.editStatus', $article->id) }}" class="btn btn-sm btn-info">Edit Status</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
