@extends('layout')

@section('title', 'Home Page')

@section('content')
<div class="container">
    <div>
        <h1 class="my-5 welcome-message">Sursa Ta de Încredere pentru Știri și Actualizări Oportune</h1>
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
            <div class="article">
                <h2>{{ $article->title }}</h2>
                @if (Auth::check())
                    <div class="article-content">
                        <p>{{ $article->title }}</p>
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    <div class="btn-container d-flex justify-content-center">
        @if (Auth::check())
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg btn-block glow-on-hover">Login</a>
        @endif
    </div>
</div>
@endsection

