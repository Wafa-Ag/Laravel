@extends('layouts.app') 
@section('title', __('lang.register_user'))
@section('content') 
    <main class="login-form"> 
        <div class="container"> 
            <div class="row justify-content-center"> 
                <div class="col-md-4 pt-4"> 
                    <div class="card"> 
                        <h3 class="card-header text-center">{{ __('lang.register_user') }}</h3> 
                        <div class="card-body"> 
                            @if(session('success')) 
                                <div class="alert alert-success"> 
                                    {{session('success')}}
                                </div>
                            @endif 
                            <form action="{{route('user.store')}}" method="post"> 
                                @csrf 
                                <div class="form-group mb-3"> 
                                    <input type="text" placeholder="{{ __('lang.name') }}" class="form-control" name="name" value="{{old('name')}}">
                                    @if ($errors->has('name')) 
                                        <div class="text-danger mt-2"> 
                                            {{$errors->first('name')}}
                                        </div> 
                                    @endif
                                </div> 
                                <div class="form-group mb-3"> 
                                    <input type="text" placeholder="{{ __('lang.address') }}" class="form-control" name="address" value="{{old('address')}}">
                                    @if ($errors->has('address')) 
                                        <div class="text-danger mt-2"> 
                                            {{$errors->first('address')}}
                                        </div> 
                                    @endif
                                </div> 
                                <div class="form-group mb-3"> 
                                    <input type="text" placeholder="{{ __('lang.phone') }}" class="form-control" name="phone" value="{{old('phone')}}">
                                    @if ($errors->has('phone')) 
                                        <div class="text-danger mt-2"> 
                                            {{$errors->first('phone')}}
                                        </div> 
                                    @endif
                                </div>
                                <div class="form-group mb-3"> 
                                    <input type="email" placeholder="{{ __('lang.email') }}" class="form-control" name="email" value="{{old('email')}}">
                                    @if ($errors->has('email')) 
                                        <div class="text-danger mt-2"> 
                                            {{$errors->first('email')}}
                                        </div> 
                                    @endif
                                </div>
                                <div class="form-group mb-3"> 
                                    <input type="date" class="form-control" name="date" value="{{old('date')}}">
                                    @if ($errors->has('date')) 
                                        <div class="text-danger mt-2"> 
                                            {{$errors->first('date')}}
                                        </div> 
                                    @endif
                                </div> 
                                <div class="form-group mb-3"> 
                                    <select class="form-control" name="ville" id="ville">
                                        <option disabled selected>{{ __('lang.select_city') }}</option>
                                        @foreach ($villes as $ville)
                                            <option value="{{ $ville->ville_id }}">{{ $ville->nom }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('ville')) 
                                        <div class="text-danger mt-2"> 
                                            {{$errors->first('ville')}}
                                        </div> 
                                    @endif
                                </div> 
                                <div class="form-group mb-3"> 
                                    <input type="password" placeholder="{{ __('lang.password') }}" class="form-control" name="password">
                                    @if ($errors->has('password')) 
                                        <div class="text-danger mt-2"> 
                                            {{$errors->first('password')}}
                                        </div>
                                    @endif
                                </div> 
                                <div class="d-grid mx-auto"> 
                                    <input type="submit" value="{{ __('lang.sign_up') }}" class= "btn btn-dark btn-block"> 
                                </div> 
                            </form> 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </main> 
@endsection