@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">FORMULAIRE ENTREPRISE</div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_entreprise"
                            data-whatever="@mdo">Entreprise
                    </button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_association"
                            data-whatever="@fat">Association
                    </button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_etudiant"
                            data-whatever="@getbootstrap">Etudiant
                    </button>

                    <div class="modal fade" id="form_entreprise" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">
                                        Entreprise</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {{-- formulaire entreprise --}}
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <input type="hidden" value="1" name="type">
                                        <div class="form-group row">
                                            <label for="NomEntreprise"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('NomEntreprise') }}</label>

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
                                            <label for="adresse"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('adresse') }}</label>

                                            <div class="col-md-6">
                                                <input id="adresse" type="text" class="form-control" name="adresse"
                                                       required autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="telephone"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('telephone') }}</label>

                                            <div class="col-md-6">
                                                <input id="telephone" type="number" class="form-control"
                                                       name="telephone" required
                                                       autofocus>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lien"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('lien') }}</label>

                                            <div class="col-md-6">
                                                <input id="lien" type="text" class="form-control" name="lien" required autofocus>
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
                                        <div class="form-group row">
                                            <label for="description"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('description') }}</label>

                                            <div class="col-md-6">
                                                <textarea id="description" name="description" type="text" class="form-control" required
                                                          autocomplete="name" autofocus></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="domaineActivites"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('domaineActivites') }}</label>

                                            <div class="col-md-6">
                                                <input id="domaineActivites" type="text"
                                                       class="form-control" name="domaineActivites" required
                                                       autocomplete="domaineActivites">

                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary btn-block">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    {{-- /entreprise --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Association --}}
                    <div class="modal fade" id="form_association" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">
                                        Association</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('register')}}">
                                        @csrf
                                        <input type="hidden" value="2" name="type">
                                        <div class="form-group row">
                                            <label for="NomAssociation"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('NomAssociation') }}</label>

                                            <div class="col-md-6">
                                                <input id="NomAssociation" type="text" class="form-control"
                                                       name="NomAssociation"
                                                       required autocomplete="NomAssociation" autofocus>
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
                                            <label for="adresse"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('adresse') }}</label>

                                            <div class="col-md-6">
                                                <input id="adresse" type="text" class="form-control" name="adresse" required autofocus>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="telephone"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('telephone') }}</label>

                                            <div class="col-md-6">
                                                <input id="telephone" type="number" class="form-control"
                                                       name="telephone" required
                                                       autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lien" class="col-md-4 col-form-label text-md-right">Lien
                                                site</label>

                                            <div class="col-md-6">
                                                <input id="lien" type="text" class="form-control" name="lien" required autofocus>
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
                                        <div class="form-group row">
                                            <label for="description"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('description') }}</label>

                                            <div class="col-md-6">
                                                <textarea id="description" type="text" class="form-control"
                                                          name="description" required
                                                          autocomplete="name" autofocus></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="domaineActivites"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('domaineActivites') }}</label>

                                            <div class="col-md-6">
                                                <input id="domaineActivites" type="text"
                                                       class="form-control" name="domaineActivites" required
                                                       autocomplete="domaineActivites">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary btn-block">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    {{-- /Association --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Etudiant --}}
                    <div class="modal fade" id="form_etudiant" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">
                                        Etudiant</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('register')}}">
                                        @csrf
                                        <input type="hidden" value="3" name="type">
                                        <div class="form-group row">
                                            <label for="nom"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                                            <div class="col-md-6">
                                                <input id="nom" type="text" class="form-control" name="nom" required autocomplete="name"
                                                       autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="prenom"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('Prenom') }}</label>

                                            <div class="col-md-6">
                                                <input id="prenom" type="text" class="form-control" name="prenom" required autofocus>
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
                                            <label for="telephone"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('telephone') }}</label>

                                            <div class="col-md-6">
                                                <input id="telephone" type="number" class="form-control" name="telephone" required autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="adresse"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('Adresse') }}</label>

                                            <div class="col-md-6">
                                                <input id="adresse" type="text" class="form-control" name="adresse" required autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="competences"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('competences') }}</label>

                                            <div class="col-md-6">
                                                <input id="competences" type="text" class="form-control"
                                                       name="competences" required
                                                       autofocus>
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
                                        <div class="form-group row">
                                            <label for="description"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('description') }}</label>

                                            <div class="col-md-6">
                                                <textarea id="description" type="text" class="form-control"
                                                          name="description" required
                                                          autocomplete="description" autofocus></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary btn-block">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    {{-- /entreprise --}}
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    <script type="text/javascript">--}}
{{--                        $('#exampleModal').on('show.bs.modal', function (event) {--}}
{{--                            var button = $(event.relatedTarget) // Button that triggered the modal--}}
{{--                            var recipient = button.data('whatever') // Extract info from data-* attributes--}}
{{--                            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).--}}
{{--                            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.--}}
{{--                            var modal = $(this)--}}
{{--                            modal.find('.modal-title').text('New message to ' + recipient)--}}
{{--                            modal.find('.modal-body input').val(recipient)--}}
{{--                        })--}}
{{--                    </script>--}}

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
