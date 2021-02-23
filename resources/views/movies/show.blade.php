@extends('movies.layout')
@section('content')
<div class="wrapperdiv">
    @if($movie)
    <div class="row pb-5">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="card" style="width: 20rem;">
                <img src="{{ asset('uploads/'.$movie->poster ) }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">#{{ $movie->title }}</h5>
                    <p class="card-text"> Genre : {{ $movie->genre }}</p>
                    <p class="card-text">Année d'ajout : {{ $movie->release_year }}</p>
                    <p class="card-text">Credits : {{ $movie->credits }}</p>
                    <p class="card-text">Photo avec produit : {{ $movie->photo_produit }}</p>
                    <p class="card-text">Format : {{ $movie->format }}</p>
                    <p class="card-text">Photo avec humain : {{ $movie->photo_humain }}</p>
                    <p class="card-text">Type : {{ $movie->type }}</p>
                </div>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
    @endif
</div>
@endsection