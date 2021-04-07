<div class="col-12 col-lg-2 d-flex align-items-center justify-content-between">
    <!-- DETAILS BUTTON -->
    <a href="{{ route('details', $game->game_id) }}" class="btn btn-dark mr-2 mt-2 d-lg-none">View
        details</a>
    <!-- EDIT BUTTON -->
    <div>
        <a href="#" data-id="{{ $game->id }}" data-name="{{ $game->name }}" data-wanted="{{ $game->wanted }}"
            data-owned="{{ $game->owned }}" data-physical="{{ $game->physical }}"
            data-digital="{{ $game->digital }}" data-plus="{{ $game->plus }}" data-now="{{ $game->now }}"
            data-started="{{ $game->started }}" data-finished="{{ $game->finished }}"
            data-completed="{{ $game->completed }}" data-abandoned="{{ $game->abandoned }}"
            class="btn btn-primary btn-sm editgamebutton" data-toggle="modal" data-target="#edit-game-modal"><i
                class="fas fa-edit"></i></a>
        <!-- DELETE BUTTON -->
        <a href="#" data-id="{{ $game->id }}" data-name="{{ $game->name }}"
            class="btn btn-danger btn-sm ml-1 deletebutton" data-toggle="modal" data-target="#deleteModal"><i
                class="fas fa-trash-alt"></i></a>
    </div>
</div>
