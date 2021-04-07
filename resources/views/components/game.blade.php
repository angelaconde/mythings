<div class="row">
    <div class="card col-12 p-0 mb-3">
        <div class="row g-0">
            <div class="col-3 col-lg-2 align-self-lg-center justify-content-center">
                <img class="p-2" src="{{ asset('img/games/cover_small\/') . $game->cover . '.jpg' }}" alt="...">
            </div>
            <div class="col-9 col-lg-10">
                <div class="card-body">
                    <h5 class="card-title p-0">{{ $game->name }}
                        <a href="{{ route('details', $game->game_id) }}"
                            class="btn btn-sm btn-dark float-right d-none d-lg-block">View details</a>
                    </h5>
                    <div class="row">
                        @include('components.labels')
                        @include('components.labelsphone')
                        @include('components.gamebuttons')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
