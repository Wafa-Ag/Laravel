@extends('layouts.app')
@section('title', __('lang.edit') . ': ' . $document->titre)
@section('content')

<div class="container mt-5"> <!-- Ajout de la classe mt-5 pour une marge en haut -->
    <a href="{{ route('repertoire.show', $document->id) }}" class="btn btn-outline-primary btn-sm">{{ __('lang.back') }}</a>
    <h1 class="text-center"> {{ __('lang.modify_document_title') }} </h1>

    <div class="row justify-content-center"> <!-- Centrer le contenu du formulaire -->
        <div class="col-md-6">
            <form method="POST" action="{{ route('repertoire.update', $document->id) }}">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <input type="text" placeholder="{{__('lang.title')}}" class="form-control" id="titre" name="titre" value="{{$document->titre}}">
                    @if ($errors->has('titre')) 
                        <div class="text-danger mt-2"> 
                            {{$errors->first('titre')}}
                        </div> 
                    @endif
                </div>
                
                <button type="submit" class="btn btn-primary">{{ __('lang.update') }}</button>
            </form>
        </div>
    </div>

</div>

@endsection
