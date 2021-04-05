@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- TABS -->
        <div class="container p-0" id="tabs">
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="games-tab" data-toggle="tab" href="#games" type="button" role="tab"
                        aria-controls="games" aria-selected="true">Games</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="books-tab" data-toggle="tab" href="#books" type="button" role="tab"
                        aria-controls="books" aria-selected="false">Books</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="films-tab" data-toggle="tab" href="#films" type="button" role="tab"
                        aria-controls="films" aria-selected="false">Films</a>
                </li>
            </ul>
        </div>
        <div class="tab-content" id="myTabContent">
            <!-- GAMES TAB -->
            <div class="align-items-center tab-pane fade show active" id="games" role="tabpanel"
                aria-labelledby="games-tab">
                <!-- STATS -->
                <div class="container col-12">
                    <div class="row">
                        <div class="col-12 card my-2 p-0 border border-dark rounded-3 grey-bg">
                            <!-- COLLAPSE -->
                            <h5 class="card-header bg-dark text-white">
                                <a class="text-white" data-toggle="collapse" href="#collapse-stats" aria-expanded="true"
                                    aria-controls="collapse-stats" id="heading-stats">
                                    <i class="fa fa-chevron-down float-right text-white"></i>
                                </a>
                            </h5>
                            <!-- COLLAPSE END -->
                            <div class="row g-0 collapse show mx-3" id="collapse-stats" aria-labelledby="heading-stats">
                                <div class="col-12 col-md-2 p-3 text-center">
                                    <img src="{{ asset('img/avatars\/' . Auth::user()->avatar) }}"
                                        class="avatar rounded-circle border border-dark" alt="...">
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title text-center text-md-start">Your Game Collection Stats</h5>
                                        <div class="row justify-content-center">
                                            <div class="col-6 col-md-2 white-bg h-100 p-2 border-grey">
                                                <div class="text-center">
                                                    <span class="font-weight-bold">Wanted:</span>
                                                    <h3 class="font-weight-bold">
                                                        {{ $stats->wanted }}</h3>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-2 white-bg h-100 p-2 border-grey">
                                                <div class="text-center">
                                                    <span class="font-weight-bold">Owned:</span>
                                                    <h3 class="font-weight-bold">
                                                        {{ $stats->owned }}</h3>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-2 white-bg h-100 p-2 border-grey">
                                                <div class="text-center">
                                                    <span class="font-weight-bold">Started:</span>
                                                    <h3 class="font-weight-bold">
                                                        {{ $stats->started }}</h3>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-2 white-bg h-100 p-2 border-grey">
                                                <div class="text-center">
                                                    <span class="font-weight-bold">Finished:</span>
                                                    <h3 class="font-weight-bold">
                                                        {{ $stats->finished }}</h3>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-2 white-bg h-100 p-2 border-grey">
                                                <div class="text-center">
                                                    <span class="font-weight-bold">Completed:</span>
                                                    <h3 class="font-weight-bold">
                                                        {{ $stats->completed }}</h3>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-2 white-bg h-100 p-2 border-grey">
                                                <div class="text-center">
                                                    <span class="font-weight-bold">Abandoned:</span>
                                                    <h3 class="font-weight-bold">
                                                        {{ $stats->abandoned }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2 white-bg p-2 my-4 text-center">
                                    <h2 class="font-weight-bold">Total:</h2>
                                    <h1 class="font-weight-bold">{{ $stats->total }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- STATS END -->
                <!-- MESSAGE -->
                @if (Session::has('message'))
                    <div class="col-12 alert alert-dark alert-dismissible fade show" role="alert">
                        {{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <!-- MESSAGE END -->
                <!-- BODY -->
                <div class="container">
                    <div class="row border border-warning">
                        <!-- SIDEBAR -->
                        <div class="container-fluid col-12 col-md-2 border border-danger">
                            <!-- ADD GAME BUTTON AND MODAL -->
                            <div class="container-fluid">
                                <button class="btn btn-dark btn-block my-2" data-toggle="modal"
                                    data-target="#add-game-modal">Add Game</button>
                            </div>
                            <div id="add-game-modal" class="modal" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add Game</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <form method="POST" id="add-form" action="{{ route('add') }}">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label for="title" class="col-3 col-form-label">Title</label>
                                                        <div class="col-9">
                                                            <input id="title" name="title" placeholder="Title" type="text"
                                                                required="required" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3">Ownership</label>
                                                        <div class="col-9">
                                                            <div class="custom-controls-stacked">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input name="wanted" id="wanted" type="checkbox"
                                                                        class="custom-control-input" value="wanted">
                                                                    <label for="wanted"
                                                                        class="custom-control-label">Wanted</label>
                                                                </div>
                                                            </div>
                                                            <div class="custom-controls-stacked">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input name="owned" id="owned" type="checkbox"
                                                                        class="custom-control-input" value="owned">
                                                                    <label for="owned"
                                                                        class="custom-control-label">Owned</label>
                                                                </div>
                                                            </div>
                                                            <!-- ONLY IF OWNED IS CHECKED -->
                                                            <div class="custom-controls-stacked ml-4">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input name="physical" id="physical" type="checkbox"
                                                                        class="custom-control-input" value="physical"
                                                                        disabled>
                                                                    <label for="physical"
                                                                        class="custom-control-label">Physical</label>
                                                                </div>
                                                            </div>
                                                            <div class="custom-controls-stacked ml-4">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input name="digital" id="digital" type="checkbox"
                                                                        class="custom-control-input" value="digital"
                                                                        disabled>
                                                                    <label for="digital"
                                                                        class="custom-control-label">Digital</label>
                                                                </div>
                                                            </div>
                                                            <!-- ONLY IF DIGITAL IS CHECKED -->
                                                            <div class="custom-controls-stacked ml-5">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input name="plus" id="plus" type="checkbox"
                                                                        class="custom-control-input" value="plus" disabled>
                                                                    <label for="plus"
                                                                        class="custom-control-label">Plus</label>
                                                                </div>
                                                            </div>
                                                            <div class="custom-controls-stacked ml-5">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input name="now" id="now" type="checkbox"
                                                                        class="custom-control-input" value="now" disabled>
                                                                    <label for="now"
                                                                        class="custom-control-label">Now</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3">Play Info</label>
                                                        <div class="col-9">
                                                            <div class="custom-controls-stacked">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input name="started" id="started" type="checkbox"
                                                                        class="custom-control-input" value="started">
                                                                    <label for="started"
                                                                        class="custom-control-label">Started</label>
                                                                </div>
                                                            </div>
                                                            <!-- ONLY IF STARTED IS CHECKED -->
                                                            <div class="custom-controls-stacked ml-4">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input name="finished" id="finished" type="checkbox"
                                                                        class="custom-control-input ml-5" value="finished"
                                                                        disabled>
                                                                    <label for="finished"
                                                                        class="custom-control-label">Finished</label>
                                                                </div>
                                                            </div>
                                                            <!-- ONLY IF FINISHED IS CHECKED -->
                                                            <div class="custom-controls-stacked ml-5">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input name="completed" id="completed" type="checkbox"
                                                                        class="custom-control-input" value="completed"
                                                                        disabled>
                                                                    <label for="completed"
                                                                        class="custom-control-label">Completed</label>
                                                                </div>
                                                            </div>
                                                            <!-- ONLY IF STARTED IS CHECKED -->
                                                            <div class="custom-controls-stacked ml-4">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input name="abandoned" id="abandoned" type="checkbox"
                                                                        class="custom-control-input" value="abandoned"
                                                                        disabled>
                                                                    <label for="abandoned"
                                                                        class="custom-control-label">Abandoned</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button name="submit" type="submit"
                                                            class="btn btn-primary">Add</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ADD GAME END -->
                            <!-- FILTERS -->
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                                    First checkbox
                                </li>
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                                    Second checkbox
                                </li>
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                                    Third checkbox
                                </li>
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                                    Fourth checkbox
                                </li>
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                                    Fifth checkbox
                                </li>
                            </ul>
                            <!-- FILTERS END -->
                        </div>
                        <!-- SIDEBAR END -->
                        <!-- GAME LIST -->
                        <div class="container-fluid col-12 col-md-8 border border-danger">
                            @if ($games->isEmpty())
                                <div class="jumbotron jumbotron-fluid m-2">
                                    <div class="container">
                                        <h2 class="text-center">You don't have any game yet.</h2>
                                    </div>
                                </div>
                            @endif
                            @foreach ($games as $game)
                                <!-- GAME -->
                                <div class="row align-items-md-end">
                                    <div class="card mb-3">
                                        <div class="row g-0">
                                            <div class="col-md-2 align-self-md-center justify-content-center">
                                                <img src="{{ asset('img/games/cover_small\/') . $game->cover . '.jpg' }}"
                                                    alt="...">
                                            </div>
                                            <div class="col-md-10">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $game->name }}</h5>
                                                    <p class="card-text">{{ $game->summary }} </p>
                                                    <div class="row">
                                                        <div class="col">
                                                            <span
                                                                class="badge {{ $game->wanted ? 'bg-success' : 'bg-secondary' }} w-100">Wanted</span>
                                                            <span
                                                                class="badge {{ $game->owned ? 'bg-success' : 'bg-secondary' }} w-100">Owned</span>
                                                        </div>
                                                        <div class="col">
                                                            <span
                                                                class="badge {{ $game->started ? 'bg-success' : 'bg-secondary' }} w-100">Started</span>
                                                            <span
                                                                class="badge {{ $game->finished ? 'bg-success' : 'bg-secondary' }} w-100">Finished</span>
                                                        </div>
                                                        <div class="col">
                                                            <span
                                                                class="badge {{ $game->completed ? 'bg-success' : 'bg-secondary' }} w-100">Completed</span>
                                                            <span
                                                                class="badge {{ $game->abandoned ? 'bg-success' : 'bg-secondary' }} w-100">Abandoned</span>
                                                        </div>
                                                        <div class="col-12 col-md-auto text-end p-2">
                                                            <button type="button" class="btn btn-primary">Edit</button>
                                                            <a href="#" data-id={{ $game->id }}
                                                                data-name="{{ $game->name }}"
                                                                class="btn btn-danger deletebutton" data-toggle="modal"
                                                                data-target="#deleteModal">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- GAME END -->
                            @endforeach
                            <!-- PAGINATION -->
                            <div class="d-flex">
                                <div class="mx-auto">
                                    {{ $games->links() }}
                                </div>
                            </div>
                            <!-- PAGINATION END -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- DELETE CONFIRMATION MODAL -->
            <div class="modal modal-danger fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="Delete"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Remove game from your collection</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('deleteusergame') }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input id="id" name="id" hidden>
                                <input id="name" name="name" hidden>
                                <h4 class="text-center">You're removing this game from your collection:</h4>
                                <h1 class="text-center" id="nametext"></h1>
                                <h4 class="text-center">Are you sure?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Yes, remove the game</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- DELETE CONFIRMATION MODAL -->
            <!-- END OF GAMES TAB -->
            <div class="tab-pane fade" id="books" role="tabpanel" aria-labelledby="books-tab">
                <div class="jumbotron jumbotron-fluid m-2">
                    <div class="container">
                        <h1 class="display-4 text-center">Coming soon.</h1>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="films" role="tabpanel" aria-labelledby="films-tab">
                <div class="jumbotron jumbotron-fluid m-2">
                    <div class="container">
                        <h1 class="display-4 text-center">Coming soon.</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- END OF TABS -->









    </div>
@endsection
