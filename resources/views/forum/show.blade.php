@extends('layouts.app')
@section('title', $forumPost->titre)
@section('content')
<div class="container">
    <div class="col-12 pt-2"> 
        <a href="{{ route('forum.index')}}" class="btn btn-outline-primary btn-sm">{{ __('lang.back') }}</a>
         <h4 class="display-4 mt-5">
            {{ $forumPost->titre }}
        </h4>
        <hr>
        <p> {{ $forumPost->body }}</p>
       <hr>
       <p>{{ __('lang.created_by') . ": " . $user->name}}</p>
       <hr>
    </div>
</div>

@if (Auth::user() == $user)
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-3">
                <a href="{{ route('forum.edit', $forumPost->id) }}" class="btn btn-primary">{{ __('lang.update') }}</a>
            </div>
            <div class="col-1">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    {{ __('lang.delete') }}
                </button>
            </div>
        </div>
    </div>
    
@endif
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('lang.delete') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ __('lang.confirm_delete') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('lang.close') }}</button>
                <form action="{{ route('forum.delete', $forumPost->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="{{ __('lang.delete') }}" class="btn btn-danger">
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
