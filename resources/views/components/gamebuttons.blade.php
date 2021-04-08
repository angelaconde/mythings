    <div class="col-12 col-lg-2 text-right">
        <!-- EDIT BUTTON -->
        <a href="#" data-id="{{ $game->id }}" data-name="{{ $game->name }}" data-wanted="{{ $game->wanted }}"
            data-owned="{{ $game->owned }}" data-physical="{{ $game->physical }}"
            data-digital="{{ $game->digital }}" data-plus="{{ $game->plus }}" data-now="{{ $game->now }}"
            data-started="{{ $game->started }}" data-finished="{{ $game->finished }}"
            data-completed="{{ $game->completed }}" data-abandoned="{{ $game->abandoned }}"
            class="btn btn-primary btn-sm mt-3 editgamebutton" data-toggle="modal" data-target="#edit-game-modal"><i
                class="fas fa-edit"></i></a>
        <!-- DELETE BUTTON -->
        <a href="#" data-id="{{ $game->id }}" data-name="{{ $game->name }}"
            class="btn btn-danger btn-sm mt-3 ml-1 deletebutton" data-toggle="modal" data-target="#deleteModal"><i
                class="fas fa-trash-alt"></i></a>
    </div>
