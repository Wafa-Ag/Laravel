@extends('layouts.app')
@section('title',  __('lang.doc_create'))
@section('content')

<div class="container mt-5"> <!-- Ajout de la classe mt-5 pour une marge en haut -->
    <a href="{{ route('repertoire.index')}}" class="btn btn-outline-primary btn-sm">{{ __('lang.back') }}</a>
    <h1 class="text-center"> {{ __('lang.add_document_title') }} </h1>

    <div class="row justify-content-center"> <!-- Centrer le contenu du formulaire -->
        <div class="col-md-6">
            <form method="POST" action="{{ route('repertoire.store') }}" enctype='multipart/form-data'>
                @csrf

                <div class="mb-3">
                    <input type="text" placeholder="{{__('lang.title')}}" class="form-control" id="titre" name="titre">
                    @if ($errors->has('titre')) 
                        <div class="text-danger mt-2"> 
                            {{$errors->first('titre')}}
                        </div> 
                    @endif
                </div>

                <div class="mb-3">
                    <input type="file" class="form-control" id="file" name="file" accept=".zip,.doc,.pdf">
                    @if ($errors->has('file')) 
                        <div class="text-danger mt-2"> 
                            {{$errors->first('file')}}
                        </div> 
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">{{ __('lang.add_post') }}</button>
            </form>
        </div>
    </div>

</div>

@endsection
