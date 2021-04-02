@extends('layouts.app')

@section('content')
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

    <ul>
        @foreach ($games as $game)
            <li>{{ $game->game_id }}</li>
            <li>{{ $game->name }}</li>
            <li>{{ $game->summary }}</li>
        @endforeach
        <ul>

            <!-- MESSAGE -->
            @if (Session::has('message'))
                {{ Session::get('message') }}
            @endif




            <!-- ADD GAME BUTTON -->
            <div class="container-fluid">
                <button class="btn btn-dark m-3" data-toggle="modal" data-target="#add-game-modal">Add Game</button>
            </div>

            <!-- ADD GAME MODAL -->
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
                                                    <label for="wanted" class="custom-control-label">Wanted</label>
                                                </div>
                                            </div>
                                            <div class="custom-controls-stacked">
                                                <div class="custom-control custom-checkbox">
                                                    <input name="owned" id="owned" type="checkbox"
                                                        class="custom-control-input" value="owned">
                                                    <label for="owned" class="custom-control-label">Owned</label>
                                                </div>
                                            </div>
                                            <!-- ONLY IF OWNED IS CHECKED -->
                                            <div class="custom-controls-stacked ml-4">
                                                <div class="custom-control custom-checkbox">
                                                    <input name="physical" id="physical" type="checkbox"
                                                        class="custom-control-input" value="physical" disabled>
                                                    <label for="physical" class="custom-control-label">Physical</label>
                                                </div>
                                            </div>
                                            <div class="custom-controls-stacked ml-4">
                                                <div class="custom-control custom-checkbox">
                                                    <input name="digital" id="digital" type="checkbox"
                                                        class="custom-control-input" value="digital" disabled>
                                                    <label for="digital" class="custom-control-label">Digital</label>
                                                </div>
                                            </div>
                                            <!-- ONLY IF DIGITAL IS CHECKED -->
                                            <div class="custom-controls-stacked ml-5">
                                                <div class="custom-control custom-checkbox">
                                                    <input name="plus" id="plus" type="checkbox"
                                                        class="custom-control-input" value="plus" disabled>
                                                    <label for="plus" class="custom-control-label">Plus</label>
                                                </div>
                                            </div>
                                            <div class="custom-controls-stacked ml-5">
                                                <div class="custom-control custom-checkbox">
                                                    <input name="now" id="now" type="checkbox" class="custom-control-input"
                                                        value="now" disabled>
                                                    <label for="now" class="custom-control-label">Now</label>
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
                                                    <label for="started" class="custom-control-label">Started</label>
                                                </div>
                                            </div>
                                            <!-- ONLY IF STARTED IS CHECKED -->
                                            <div class="custom-controls-stacked ml-4">
                                                <div class="custom-control custom-checkbox">
                                                    <input name="finished" id="finished" type="checkbox"
                                                        class="custom-control-input ml-5" value="finished" disabled>
                                                    <label for="finished" class="custom-control-label">Finished</label>
                                                </div>
                                            </div>
                                            <!-- ONLY IF FINISHED IS CHECKED -->
                                            <div class="custom-controls-stacked ml-5">
                                                <div class="custom-control custom-checkbox">
                                                    <input name="completed" id="completed" type="checkbox"
                                                        class="custom-control-input" value="completed" disabled>
                                                    <label for="completed" class="custom-control-label">Completed</label>
                                                </div>
                                            </div>
                                            <!-- ONLY IF STARTED IS CHECKED -->
                                            <div class="custom-controls-stacked ml-4">
                                                <div class="custom-control custom-checkbox">
                                                    <input name="abandoned" id="abandoned" type="checkbox"
                                                        class="custom-control-input" value="abandoned" disabled>
                                                    <label for="abandoned" class="custom-control-label">Abandoned</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button name="submit" type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endsection
