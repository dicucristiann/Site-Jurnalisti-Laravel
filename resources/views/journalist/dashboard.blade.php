@extends('layout')

@section('title', 'Create Article')

@section('content')
<div >
    <div>
        <h1 class="my-5 welcome-message">Hello Journalist</h1>
       <a href="{{route("journalist.create")}}">Create article </a>
    </div>

    <div class="article-container">
        @foreach ($articles as $article)
            <div class="article">
                <h2>{{ $article->title }}</h2>
                    <div class="article-content">
                        <p>{{ $article->content }}</p>
                    </div>
            </div>
        @endforeach
    </div>

</div>
@endsection
