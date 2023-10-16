@extends('layouts.app')
@section('title', __('lang.create_post'))
@section('content')

<div class="container mt-5"> <!-- Ajout de la classe mt-5 pour une marge en haut -->
    <a href="{{ route('forum.index')}}" class="btn btn-outline-primary btn-sm">{{ __('lang.back') }}</a>
    <h1 class="text-center"> {{ __('lang.add_post_title') }} </h1>

    <div class="row justify-content-center"> <!-- Centrer le contenu du formulaire -->
        <div class="col-md-6">
            <form method="POST" action="{{ route('forum.store') }}">
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
                    <textarea class="form-control" placeholder="body" cols="20" rows="10" id="body" name="body"></textarea>
                    @if ($errors->has('body')) 
                        <div class="text-danger mt-2"> 
                            {{$errors->first('body')}}
                        </div> 
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">{{ __('lang.add_post') }}</button>
            </form>
        </div>
    </div>

</div>

@endsection
