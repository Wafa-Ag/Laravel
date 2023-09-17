@extends('layouts.app')
@section('title', 'home')
@section('content')
   
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <h1 class="masthead-heading text-uppercase mb-0">
                    Espaces 
                <!-- Masthead Avatar Image-->
                <a href="compte.html"> 
                <img class="masthead-avatar mb-5" src="assets/img/avataaars.svg" alt="..." />
            </a>
            Etudiants
        </h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Explorez notre plateforme de gestion des étudiants de Collège Maisonneuve</p>
            </div>
        </header>
        
        @endsection       