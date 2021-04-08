@extends('layouts.app')
@section('content')
    <div class="container">
        @include('components.tabs')
        <!-- TABS CONTENT -->
        <div class="tab-content" id="myTabContent">
            <!-- GAMES TAB -->
            <div class="align-items-center tab-pane fade show active" id="games" role="tabpanel"
                aria-labelledby="games-tab">
                @include('components.stats')
                @include('components.message')
                <!-- MAIN -->
                <div class="container">
                    <div class="row">
                        <!-- SIDEBAR -->
                        <div class="container-fluid col-12 col-lg-2">
                            @include('components.addgame')
                            @include('components.filters')
                        </div>
                        <!-- END OF SIDEBAR -->
                        <!-- GAME LIST -->
                        <div class="container-fluid col-12 col-md-8">
                            <p class="text-right">Showing {{ $games->count() }} of {{ $games->total() }} results.</p>
                            @if ($games->isEmpty())
                                @include('components.nogames')
                            @endif
                            @foreach ($games as $game)
                                @include('components.game')
                            @endforeach
                            @include('components.pagination')
                        </div>
                        <!-- END OF GAME LIST -->
                    </div>
                </div>
                <!-- END OF MAIN -->
            </div>
            @include('components.deletemodal')
            @include('components.editgamemodal')
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
@endsection
