@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-6" style="background-color: white;">
                <img src="{{asset('images/logo.jpg')}}" width="500" height="200" style="margin-left: 70px">
                <br>
                <div style="margin-left: 70px;">
                    <a class="btn btn-primary btn-social mx-2" href="www.google.com" style="width: 90px;background: #3563a9;"><i class="fab fa-google fa-2x"></i></a>
                    <a class="btn btn-primary btn-social mx-2" href="www.twitter.com" style="width: 90px;background: #3563a9;"><i class="fab fa-twitter fa-2x"></i></a>
                    <a class="btn btn-primary btn-social mx-2" href="www.facebook.com" style="width: 90px;background: #3563a9;"><i class="fab fa-facebook-f fa-2x"></i></a>
                    <a class="btn btn-primary btn-social mx-2" href="www.linkedin.com" style="width: 90px;background: #3563a9;"><i class="fab fa-linkedin-in fa-2x"></i></a>
                </div>
                <p style="text-align: center;font-size: 22px;margin-top:15px;font-weight: bold;">Ou</p><br>
                <form method="POST" action="{{ route('login') }}" style="margin-left: 70px;">
                    @csrf

                    <div class="form-group row">
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email" style="width:500px" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="mot de passe" name="password" style="width:500px"  required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-check" style="margin-left: 0;">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}" >
                                    {{ __('Mot de passe oublié?') }}
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-10">
                            <button type="submit" class="btn btn-primary" style="width: 500px;background: #3563a9;">
                                {{ __('Login') }}
                            </button>
                            <p  style="text-align: center;">vous n'avez pas de compte?<a href="{{route('register')}}">s'inscrire</a></p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-9 col-md-6">
                <img src="{{asset('images/fessef2.jpg')}}" width="550" height="590">
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

@endsection
