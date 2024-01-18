@extends('layout')

@section('title', 'Home Page')

@section('content')
<div class="container">
    <div>
        <h1 class="welcome-message">Sursa Ta de Încredere pentru Știri și Actualizări Oportune</h1>
        <p class="text-left">
            Bine ați venit la portalul nostru de știri,
            unde vă aducem cele mai recente și relevante știri
            din întreaga lume. Rămâneți informat cu gama noastră diversă
            de articole, acoperind totul de la știri de ultimă oră până
            la analize în profunzime. Echipa noastră de jurnaliști dedicați
            se străduiește să vă furnizeze informații precise și actualizate,
            asigurându-ne că sunteți mereu la curent.
        </p>
    </div>

    <div class="article-container">
        @foreach ($articles as $article)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    @if (Auth::check())
                        <p class="card-text">{{ $article->content }}</p>
                        <p class="card-text">
                            <small class="text-muted">Category: {{ $article->category }}</small>
                        </p>
                        <p class="card-text">
                            <small class="text-muted">Posted on: {{ $article->created_at->format('M d, Y') }}</small>
                        </p>
                        @if($article->status_message)
                            <p class="card-text">
                                <small class="text-muted">Status Message: {{ $article->status_message }}</small>
                            </p>
                        @endif
                    @else
                        <p class="card-text">Login to read the article.</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

