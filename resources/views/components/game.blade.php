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
                        <div class="col-4 col-lg-3 pl-2 pl-lg-1 p-1">
                            <span
                                class="badge {{ $game->wanted ? 'bg-success' : 'bg-secondary' }} w-100">Wanted</span>
                            <span class="badge {{ $game->owned ? 'bg-success' : 'bg-secondary' }} w-100">Owned</span>
                        </div>
                        <div class="col-4 col-lg-3 p-1">
                            <span
                                class="badge {{ $game->started ? 'bg-success' : 'bg-secondary' }} w-100">Started</span>
                            <span
                                class="badge {{ $game->finished ? 'bg-success' : 'bg-secondary' }} w-100">Finished</span>
                        </div>
                        <div class="col-4 col-lg-3 p-1">
                            <span
                                class="badge {{ $game->completed ? 'bg-success' : 'bg-secondary' }} w-100">Completed</span>
                            <span
                                class="badge {{ $game->abandoned ? 'bg-success' : 'bg-secondary' }} w-100">Abandoned</span>
                        </div>
                        <div class="col-12 col-lg-3 text-right pt-2 pr-3">
                            <!-- DETAILS BUTTON -->
                            <a href="{{ route('details', $game->game_id) }}" class="btn btn-dark d-lg-none">View
                                details</a>
                            <!-- EDIT BUTTON -->
                            <a href="#" data-id="{{ $game->id }}" data-name="{{ $game->name }}"
                                data-wanted="{{ $game->wanted }}" data-owned="{{ $game->owned }}"
                                data-physical="{{ $game->physical }}" data-digital="{{ $game->digital }}"
                                data-plus="{{ $game->plus }}" data-now="{{ $game->now }}"
                                data-started="{{ $game->started }}" data-finished="{{ $game->finished }}"
                                data-completed="{{ $game->completed }}" data-abandoned="{{ $game->abandoned }}"
                                class="btn btn-primary editgamebutton" data-toggle="modal"
                                data-target="#edit-game-modal"><i class="fas fa-edit"></i></a>
                            <!-- DELETE BUTTON -->
                            <a href="#" data-id="{{ $game->id }}" data-name="{{ $game->name }}"
                                class="btn btn-danger deletebutton" data-toggle="modal" data-target="#deleteModal"><i
                                    class="fas fa-trash-alt"></i></a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
