<div class="row">
    <div class="card col-12 p-0 mb-2">
        <div class="row g-0">
            <div class="col-3 col-lg-2 align-self-center justify-content-center">
                <a href="{{ route('details', $game->game_id) }}">
                    <img class="p-2" src="{{ asset('img/games/cover_small\/') . $game->cover . '.jpg' }}" alt="...">
                </a>
            </div>
            <div class="col-9 col-lg-10">
                <div class="card-body">
                    <a href="{{ route('details', $game->game_id) }}">
                        <h5 class="card-title text-dark p-0 d-inline-block">{{ $game->name }}</h5>
                    </a>
                    <div class="row">
                        @include('components.hltb')
                    </div>
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
