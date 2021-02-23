@extends('movies.layout') @section('content')
<div class="wrapperdiv">
    <div class="formcontainer">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Ajouter nouvelle image</h2>
                </div>
            </div>
        </div>
        @if($errors->any())
        <div class="alert alert-danger">
            <strong>Une erreur est sur venue essayez encore.</strong>
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data" name="formulaire">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-control">Tag</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" id="title" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="credits" class="col-sm-2 col-form-control">Credits </label>
                        <div class="col-sm-10" data-children-count="1">
                            <input type="text" name="credits" id="credits" class="form-control">
                        </div>
                    </div>
                    <div class="input check">
                        <p>Photo avec Produit:</p>
                        <div>
                            <input type="radio" id="Oui" name="photo_produit" value="Oui" checked="">
                            <label for="Oui">Oui</label>
                        </div>

                        <div>
                            <input type="radio" id="Non" name="photo_produit" value="Non">
                            <label for="Non">Non</label>
                        </div>
                    </div>
                    <div class="input check">
                        <p>Photo avec Humain:</p>
                        <div>
                            <input type="radio" id="O-humain" name="photo_humain" value="Oui" checked="">
                            <label for="O-humain">Oui</label>
                        </div>

                        <div>
                            <input type="radio" id="N-humain" name="photo_humain" value="Non">
                            <label for="N-humain">Non</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="type" class="col-sm-2 col-form-control">Type d'image</label>
                        <div class="col-sm-10" data-children-count="1">
                            <select name="type" id="type" class="form-control">
                                <option value="">Choisir le type d'image</option>
                                <option value="logo">logo</option>
                                <option value="passionfroid">Photo Passion Froid</option>
                                <option value="fournisseur">Photo Fournisseur</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="format" class="col-sm-2 col-form-control">Format d'image</label>
                        <div class="col-sm-10" data-children-count="1">
                            <select name="format" id="format" class="form-control">
                                <option value="">Choisir le format d'image</option>
                                <option value="horizontale">Horizontale</option>
                                <option value="verticale">Verticale</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="genre" class="col-sm-2 col-form-control">Catégorie</label>
                        <div class="col-sm-10">
                            <select name="genre" id="genre" class="form-control">
                                <option value="">Choisir la Catégorie</option>
                                @if($genres)
                                @foreach($genres as $genre)
                                <option value="{{ $genre }}">{{ $genre }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="release_year" class="col-sm-2 col-form-control">Année d'ajout</label>
                        <div class="col-sm-10">
                            <input type="text" name="release_year" id="release_year" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="poster" class="col-sm-2 col-form-control">Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="poster" id="poster" class="form-control-file" multiple />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2"></div>

                        <div class="col-sm-10">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary">
                                Ajouter
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection