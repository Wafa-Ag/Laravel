@extends('layouts.app')
@section('title', 'Liste des etudiants')
@section('content')
<div class="container">
<hr>
<div class="row">
    <div class="col-12 pt-2">
        <a href="{{ route('etudiants.index')}}" class="btn btn-outline-primary btn-sm">Retourner</a>
        <h4 class="display-4 mt-5">
            {{ $etudiant->nom_etudiant }}
        </h4>
        <hr>
        <p><strong>Adress: </strong> {{ $etudiant->adress }}</p>
        <p><strong>Téléphone: </strong> {{ $etudiant->phone }}</p>
        <p><strong>Email: </strong> {{ $etudiant->email }}</p>
        <p><strong>Date de naissance: </strong> {{ $etudiant->date_de_naissance }}</p>
        <p><strong>Ville: </strong> {{ $etudiant->ville_id }}</p>
    </div>
</div>
<hr>
<div class="row mb-5">
    <div class="col-6">
        <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-primary">Mettre à jour</a>
    </div>
    <div class="col-6">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
            Effacer
        </button>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Effacer</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Voulez-vous vraiment effacer l'enregistrement? {{ $etudiant->nom_etudiant }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <form action="{{ route('etudiants.delete', $etudiant->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Effacer" class="btn btn-danger">
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
