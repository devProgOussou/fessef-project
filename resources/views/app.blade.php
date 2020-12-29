<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset(mix('/css/app.css')) }}" rel="stylesheet" />
    <script src="{{ asset(mix('/js/app.js')) }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="/images/logo.jpg">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!--Script FontAwesome free-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <title>FESSEF</title>
    <style>
        body {
            background-color: lightgrey;
            padding: 0;
            margin: 0;
        }

        .col-mb-3 {
            display: grid;
            justify-content: center;
            align-content: center;
            min-height: 100vh;
        }

        h3 {
            text-align: justify;
        }

        .shadow {
            display: flex;

        }

    </style>
</head>

<body>
    <div id="no-app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #3563a9;">
            <div class="container">
                <a {{ url('/home') }}>
                    <img src="/images/logo.jpg" alt="" height="40" width="40">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav justify-content-end">


                    </ul>
                    <!-- Vertically centered modal -->
                    <!-- Button trigger modal -->


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else

                            <li class="nav-item">
                                @php
                                $messages = App\Models\Message::where('receiver_id',
                                Auth::user()->id)->where('isRead',0)->count()
                                @endphp
                                <a class="nav-link text-white" href="/Messages">
                                    <i class="fas fa-envelope"></i>
                                    Message <span class="badge badge-primary">{{ $messages }}</span>
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="far fa-eye"></i>
                                    Annonce
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->isCompany == 1 || Auth::user()->isAssociation == 1)
                                        <a class="dropdown-item" href="/Annonce/Create">poster annonce</a>
                                        <a class="dropdown-item" href="/Annonce">mes annonces</a>
                                    @endif
                                    <a class="dropdown-item" href="/Annonces">Toutes les annonces</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-school"></i>
                                    Xamxam
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->isCompany == 1 || Auth::user()->isAssociation == 1)
                                        <a class="dropdown-item" href="/xamxam/create"> Poster xam xam</a>
                                        <a class="dropdown-item" href="/xamxam">mes xam xam</a>
                                    @endif
                                    <a class="dropdown-item" href="/xamxams">Tous les xam xams</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown text-white">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-plus"></i>
                                    Actualites
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/Feusseul/create"> Poster actualites</a>
                                    <a class="dropdown-item" href="/Feusseul">mes actualites</a>
                                    <a class="dropdown-item" href="/Feusseuls">Tous les actualites</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown text-white" class="nav-link dropdown-toggle text-white" href="#"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                    {{ Auth::user()->name }}

                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/home') }}">
                                        Profil
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                        Deconnexion
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div>
        @inertia
    </div>
</body>

</html>
