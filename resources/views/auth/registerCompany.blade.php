@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row ">
            <div class="col-md-3 mt-4"></div>

            <div class="col-md-6 mt-4">
                <div class="card mt">
                    <img src="{{asset('images/logo.jpg')}}" class="card-img-top" alt="..." width="1000"
                         height="300">
                    <div class="card-body">


                        <!-- section du formulaire -->
                        <form method="POST" action="{{ route('register')}}">
                            @csrf
                            <input type="hidden" value="1" name="type">
                            <div class="form-group row">
                                <label for="NomEntreprise"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Nom de l\'entreprise') }}</label>

                                <div class="col-md-6">
                                    <input id="NomEntreprise" type="text" class="form-control"
                                           name="NomEntreprise" required
                                           autocomplete="NomEntreprise" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control"
                                           name="password" required
                                           autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="confirmed-password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirmation mot de passe') }}</label>

                                <div class="col-md-6">
                                    <input id="confirmed-password" type="password" class="form-control"
                                           name="confirmed-password" required
                                           autofocus>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Inscription') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body  text-center">
                        Vous avez déjà un compte ? <a href="page.html">Se connecter</a>
                    </div>
                </div>

            </div>

            <div class="col-md-3 mt-4"></div>
        </div>
    </div>
@endsection
