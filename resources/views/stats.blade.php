@extends('layouts.app')
@section('content')
    <div class="container">
        @include('components.tabs')
        <!-- TABS CONTENT -->
        <div class="tab-content" id="myTabContent">
            <!-- GAMES TAB -->
            <div class="align-items-center tab-pane fade show active" id="games" role="tabpanel"
                aria-labelledby="games-tab">
                <!-- STATS -->
                <div class="container">
                    <div class="row g-0 mx-3">
                        <div class="col-12 col-lg-2 p-3 text-center">
                            <img src="{{ asset('img/avatars\/' . Auth::user()->avatar) }}"
                                class="avatar rounded-circle border border-dark" alt="...">
                        </div>
                        <div class="col-12 col-lg-8">
                            <div class="card-body">
                                <h5 class="card-title text-center text-lg-start">Your Game Collection Stats</h5>
                                <div class="row justify-content-center">
                                    <div class="col-6 col-lg-2 white-bg h-100 p-2 border-grey">
                                        <div class="text-center">
                                            <span class="font-weight-bold">Wanted:</span>
                                            <h3 class="font-weight-bold">
                                                {{ $stats->wanted }}</h3>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-2 white-bg h-100 p-2 border-grey">
                                        <div class="text-center">
                                            <span class="font-weight-bold">Owned:</span>
                                            <h3 class="font-weight-bold">
                                                {{ $stats->owned }}</h3>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-2 white-bg h-100 p-2 border-grey">
                                        <div class="text-center">
                                            <span class="font-weight-bold">Started:</span>
                                            <h3 class="font-weight-bold">
                                                {{ $stats->started }}</h3>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-2 white-bg h-100 p-2 border-grey">
                                        <div class="text-center">
                                            <span class="font-weight-bold">Finished:</span>
                                            <h3 class="font-weight-bold">
                                                {{ $stats->finished }}</h3>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-2 white-bg h-100 p-2 border-grey">
                                        <div class="text-center">
                                            <span class="font-weight-bold">Completed:</span>
                                            <h3 class="font-weight-bold">
                                                {{ $stats->completed }}</h3>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-2 white-bg h-100 p-2 border-grey">
                                        <div class="text-center">
                                            <span class="font-weight-bold">Abandoned:</span>
                                            <h3 class="font-weight-bold">
                                                {{ $stats->abandoned }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2 white-bg p-2 my-4 text-center">
                            <h2 class="font-weight-bold">Total:</h2>
                            <h1 class="font-weight-bold">{{ $stats->total }}</h1>
                        </div>
                    </div>
                </div>
                <!-- END OF STATS -->
                <!-- DATA SCRIPT -->
                <script>
                    var stats = @json($stats)

                </script>
                <!-- END OF DATA SCRIPT -->
                <!-- CHARTS -->
                <div class="container">
                    <div class="row g-0 mx-2">
                        <div class="col-12 col-lg-6 mb-4">
                            <div class="card border-0 shadow-sm rounded">
                                <div class="card-body p-4">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6">
                                            <h3 class="fw-bold">Completion</h3>
                                            <p class="small text-muted mb-0">This chart shows how many games have you either
                                                finished, fully completed or just abandoned.</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <canvas id="chart-completion"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mb-4">
                            <div class="card border-0 shadow-sm rounded">
                                <div class="card-body p-4">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6">
                                            <h3 class="fw-bold">Backlog</h3>
                                            <p class="small text-muted mb-0">This chart shows how many owned games have you
                                                started playing and how many are waiting in your backlog.</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <canvas id="chart-backlog"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END OF CHARTS -->
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
@endsection

<!-- STATS SCRIPTS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script src="{{ asset('js/stats.js') }}" defer></script>
