@extends('layouts.app')
@section('title', __('lang.doc_list'))
@section('content')

<div class="container">
        @if(session('success')) 
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('success')}} 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> 
            </div>
        @endif
        <div class="row justify-content-between">
            <h1 class="col-6">{{ __('lang.doc_list') }}</h1>
            <h1 class="col-1"><a class="btn btn-primary" href="{{route('repertoire.create')}}">{{__('lang.doc_add')}}</a></h1>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">{{ __('lang.title') }}</th>
                    <th scope="col">{{ __('lang.created_by') }}</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($documents as $document)
                    <tr>
                        <td>{{ $document->titre }}</td>
                        <td>{{ $document->user_name }}</td>
                        <td><a class="btn btn-primary" href="{{route('repertoire.show',$document->id)}}">{{ __('lang.show') }}</a></td>
                    </tr>
                    @empty
                         <p>{{ __('lang.zero_posts') }}</p>
                @endforelse
            </tbody>
        </table>
        {{-- $documents->links() --}}
    </div>
@endsection