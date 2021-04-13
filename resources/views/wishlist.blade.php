<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/collection.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/collection.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/app/logo_icon_empty.png') }}" width="30" height="30"
                        class="d-inline-block align-top border border-white rounded" alt="logo"> My Things
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <main class="py-4">
            <div class="container col-12 col-lg-6 mb-2">
                <div class="row">
                    <div class="col-3 p-3 text-center">
                        <img src="{{ asset('img/avatars\/' . $avatar) }}"
                            class="avatar rounded-circle border border-dark" alt="avatar">
                    </div>
                    <div class="col-9 align-self-center p-3 text-center">
                        <h1 class="d-none d-lg-inline">{{ $name }}'s wishlist</h1>
                        <h2 class="d-lg-none">{{ $name }}'s wishlist</h2>
                    </div>
                </div>
            </div>
            <div class="container">
                @include('components.tabs')
                <!-- TABS CONTENT -->
                <div class="tab-content" id="myTabContent">
                    <!-- GAMES TAB -->
                    <div class="align-items-center tab-pane fade show active" id="games" role="tabpanel"
                        aria-labelledby="games-tab">
                        @include('components.message')
                        <!-- MAIN -->
                        <div class="container">
                            <div class="row">
                                <!-- GAME LIST -->
                                <div class="container col-12">
                                    <p class="text-right">Showing {{ $games->count() }} of {{ $games->total() }}
                                        results.</p>
                                    @if ($games->isEmpty())
                                        <div class="jumbotron jumbotron-fluid m-2">
                                            <div class="container">
                                                <h2 class="text-center">No results.</h2>
                                            </div>
                                        </div>
                                    @endif
                                    @foreach ($games as $game)
                                        @if ($loop->first || ($loop->iteration - 1) % 3 == 0)
                                            <div class="card-deck">
                                        @endif
                                        <div class="card col-12 col-lg-4 m-0 p-1">
                                            <div class="row no-gutters">
                                                <div class="col-3">
                                                    <img src="{{ asset('img/games/cover_small\/') . $game->cover . '.jpg' }}"
                                                        class="card-img m-1" alt="cover">
                                                </div>
                                                <div class="col-9">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $game->name }}</h5>
                                                        <a href="https://www.amazon.co.uk/s?i=videogames&k={{ $game->name }}"
                                                            target="_blank">
                                                            <img src="{{ asset('img/app/amazon.png') }}"
                                                                class="border border-dark rounded"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($loop->last || $loop->iteration % 3 == 0)
                                </div>
                                @endif
                                @endforeach
                                <div class="mt-2">
                                    @include('components.pagination')
                                </div>
                            </div>
                            <!-- END OF GAME LIST -->
                        </div>
                    </div>
                    <!-- END OF MAIN -->
                </div>
                <!-- END OF GAMES TAB -->
                <div class="tab-pane fade" id="books" role="tabpanel" aria-labelledby="books-tab">
                    <div class="jumbotron jumbotron-fluid m-2">
                        <div class="container">
                            <h1 class="text-center">Coming soon.</h1>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="films" role="tabpanel" aria-labelledby="films-tab">
                    <div class="jumbotron jumbotron-fluid m-2">
                        <div class="container">
                            <h1 class="text-center">Coming soon.</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END OF TABS -->
    </div>
    </main>
    </div>
</body>
