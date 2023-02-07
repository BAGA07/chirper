@extends('layout.master')
@section('contenu')

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-3">Ajouter un nouvel étudiant</h3>
        @if (session()->has("success"))
            <div class="alert alert-succes">
                <h3>{{session()->get('success') }}</h3>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{ route('etudiant.create')}}">

        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Nom de l'etudiant</label>
            <input type="text" class="form-control" id="exampleInputPassword1"  name="nom">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Prénom</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="prenom">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Classe</label>
            <select class="form-control" name="classe_id">
                    <option value="">Choisir une classe</option>
                @foreach ($classes as  $classe)
                    <option value="{{ $classe->id }}"> {{ $classe->libelle }} </option>
                @endforeach
            </select>
    </div>

    <button type="submit" class="btn btn-primary">Enregistrer</button>
    <a href="{{ route('etudiant') }}" class="btn btn-danger">Annuler</a>
    </form>
    </div>

@endsection
