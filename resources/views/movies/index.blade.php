@extends('movies.layout')
@section('content')
<div class="wrapperdiv">

@if($messge = Session::get('success'))
<div class="alert alert-success text-center">{{ $messge }}</div>
@endif

<table class="table">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Tag</th>
      <th scope="col">Credits</th>
      <th scope="col">photo avec produit</th>
      <th scope="col">photo avec humain</th>
      <th scope="col">Type d'image</th>
      <th scope="col">Format</th>
      <th scope="col">Catégorie</th>
      <th scope="col">Année d'ajout</th>
      <th scope="col"></th>
    </tr>
  </thead>
  @if($movies)
  <tbody>
      @foreach($movies as $movie)
    <tr>
      <td class="align-middle"><img src="{{ asset('uploads/'.$movie->poster ) }} " class="img-thumbnail" /></td>
      <td class="align-middle">#{{ $movie->title }}</td>
      <td class="align-middle">{{ $movie->credits }}</td>
      <td class="align-middle">{{ $movie->photo_produit}}</td>
      <td class="align-middle">{{ $movie->photo_humain}}</td>
      <td class="align-middle">{{ $movie->type }}</td>
      <td class="align-middle">{{ $movie->format }}</td>
      <td class="align-middle">{{ $movie->genre }}</td>
      <td class="align-middle">{{ $movie->release_year }}</td>
      <td class="align-middle">
        <form action="{{ route('movies.destroy', $movie->id) }}" method="post">
          <div class="btn-action-content">
            <a href="{{ route('movies.show', $movie->id)}} " class="btn btn-info" title="Visualiser">
              <i class="fas fa-eye"></i>
            </a>
            <a href="{{ route('movies.edit', $movie->id)}}" class="btn btn-primary" title="Modifier">
              <i class="far fa-edit"></i>
            </a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous supprimer?')" title="Supprimer">
              <i class="fas fa-trash-alt"></i>
            </button>
          </div>
        </form>
      </td>

    </tr>
    @endforeach
  </tbody>
  @endif
</table>
<div class="d-flex">
    <div class="mx-auto">
        {!! $movies->links() !!}
    </div>
</div>
</div>
<script src="https://kit.fontawesome.com/fbd77e317c.js" crossorigin="anonymous"></script>
@endsection
