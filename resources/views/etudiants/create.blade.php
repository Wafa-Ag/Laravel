@extends('layouts.app')
@section('title', 'Ajouter un étudiant')
@section('content')

<div class="container mt-5"> <!-- Ajout de la classe mt-5 pour une marge en haut -->
    <h1 class="text-center">Formulaire pour saisir un nouvel étudiant</h1>

    <div class="row justify-content-center"> <!-- Centrer le contenu du formulaire -->
        <div class="col-md-6">
            <form method="POST" action="{{ route('etudiants.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="nom_etudiant" class="form-label">Nom de l'étudiant:</label>
                    <input type="text" class="form-control" id="nom_etudiant" name="nom_etudiant">
                </div>

                <div class="mb-3">
                    <label for="adress" class="form-label">adress:</label>
                    <input type="text" class="form-control" id="adress" name="adress">
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Téléphone:</label>
                    <input type="text" class="form-control" id="phone" name="phone">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>

                <div class="mb-3">
                    <label for="date_de_naissance" class="form-label">Date de naissance:</label>
                    <input type="date" class="form-control" id="date_de_naissance" name="date_de_naissance">
                </div>

                <div class="mb-3">
                    <label for="ville_id" class="form-label">Ville:</label>
                    <select class="form-control" name="ville" id="ville">
                    @foreach ($villes as $ville)
                        <option value="{{ $ville->ville_id }}">{{ $ville->nom }}</option>
                    @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Soumettre</button>
            </form>
        </div>
    </div>

</div>

@endsection
