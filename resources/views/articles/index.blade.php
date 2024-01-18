{{-- resources/views/articles/index.blade.php --}}
@extends('layout')

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
        <h1>Articles</h1>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="categoryTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All</a>
            </li>
            @foreach(['artistic', 'technic', 'science', 'moda'] as $category)
                <li class="nav-item">
                    <a class="nav-link" id="{{ $category }}-tab" data-toggle="tab" href="#{{ $category }}" role="tab" aria-controls="{{ $category }}" aria-selected="false">{{ ucfirst($category) }}</a>
                </li>
            @endforeach
        </ul>

        <!-- Tab content -->
        <div class="tab-content" id="categoryTabsContent">
            <div class="tab-pane show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                @foreach ($articles as $article)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ Str::limit($article->content, 100) }}</p>
                            <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                @endforeach
                @if($articles->count() == 0)
                    <p>No articles available.</p>
                @endif
            </div>
            @foreach(['artistic', 'technic', 'science', 'moda'] as $category)
                <div class="tab-pane" id="{{ $category }}" role="tabpanel" aria-labelledby="{{ $category }}-tab">
                    @foreach ($articles->where('category', $category) as $article)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $article->title }}</h5>
                                <p class="card-text">{{ Str::limit($article->content, 100) }}</p>
                                <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    @endforeach
                    @if($articles->where('category', $category)->count() == 0)
                        <p>No articles in this category.</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
