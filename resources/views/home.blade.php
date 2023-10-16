@extends('layouts.app')
@section('title', __('lang.home'))
@section('content')
   
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <h1 class="masthead-heading text-uppercase mb-0">
                    <p>{{__('lang.my')}} </p>
                    <!-- Masthead Avatar Image-->
                    <a href="compte.html"> 
                        <img class="masthead-avatar mb-5" src="assets/img/avataaars.svg" alt="..." />
                    </a>
                    <p>Blog</p>
                </h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">{{__('lang.home_description')}} </p>
            </div>
        </header>
        
        @endsection       