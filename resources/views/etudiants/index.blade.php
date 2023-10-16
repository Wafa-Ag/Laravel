@extends('layouts.app')
@section('title', 'Liste des articles')
@section('content')

<div class="container">
        <h1>Liste des Étudiants</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">adress</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date de Naissance</th>
                    <th scope="col">Ville</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($etudiants as $etudiant)
                    <tr>
                        <td>{{ $etudiant->nom_etudiant }}</td>
                        <td>{{ $etudiant->adress }}</td>
                        <td>{{ $etudiant->phone }}</td>
                        <td>{{ $etudiant->email }}</td>
                        <td>{{ $etudiant->date_de_naissance }}</td>
                        <td>{{ $etudiant->ville_id }}</td>
                        <td><a class="btn btn-primary" href="{{route('etudiants.show',$etudiant->id)}}">affichier</a></td>
                       
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection