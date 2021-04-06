@extends('layouts.app')
@section('content')
    <div class="container" id="detailscontainer">
        <div class="row">
            <div class="col-12">
                <h1>{{ $game->name }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-4 text-center">
                <img src="{{ asset('img/games/cover_big\/') . $game->cover . '.jpg' }}" alt="...">
                <h5 class="pt-2">Release date: {{ $game->first_release_date->format('j F Y') }}</h5>
                <a href="{{ url()->previous() }}" class="btn btn-lg btn-dark mt-lg-5"><i
                        class="fas fa-long-arrow-alt-left"></i> Go back</a>
            </div>
            <div class="col-12 col-lg-8">
                <div class="row mt-4 mt-lg-0">
                    <h5 class="col-11 col-lg-12">{{ $game->summary }}</h5>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-5">
                        <a href="#" class="launch-modal" data-modal-id="modal-image1">
                            <img class="p-2" src="{{ asset('img/games/thumbnail\/') . $game->screenshot_1 . '.jpg' }}"
                                alt="...">
                        </a>
                        <a href="#" class="launch-modal" data-modal-id="modal-image2">
                            <img class="p-2" src="{{ asset('img/games/thumbnail\/') . $game->screenshot_2 . '.jpg' }}"
                                alt="...">
                    </div>
                    <div class="col-11 col-lg-7 p-2 text-center">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe id="smallvideoframe" class="embed-responsive-item"
                                src="https://www.youtube.com/embed/{{ $game->video }}" webkitallowfullscreen
                                mozallowfullscreen allowfullscreen></iframe>
                        </div>
                        <div class="pt-2">
                            <a href="#" class="launch-modal btn btn-block btn-outline-dark" data-modal-id="modal-video">
                                <span class="h1"><i class="fas fa-play-circle"></i> View bigger</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- VIDEO MODAL -->
        <div class="modal fade" id="modal-video" tabindex="-1" role="dialog" aria-labelledby="modal-video-label">
            <div class="modal-dialog mw-100 fullscreen" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-video">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe id="videoframe" class="embed-responsive-item"
                                    src="https://www.youtube.com/embed/{{ $game->video }}" webkitallowfullscreen
                                    mozallowfullscreen allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- IMAGE 1 MODAL -->
        <div class="modal fade" id="modal-image1" tabindex="-1" role="dialog" aria-labelledby="modal-image-label">
            <div class="modal-dialog mw-100 fullscreen" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-image">
                            <img class="img-fluid p-2"
                                src="{{ asset('img/games/screenshot\/') . $game->screenshot_1 . '.jpg' }}" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- IMAGE 2 MODAL -->
        <div class="modal fade" id="modal-image2" tabindex="-1" role="dialog" aria-labelledby="modal-image-label">
            <div class="modal-dialog mw-100 fullscreen" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-image">
                            <img class="img-fluid p-2"
                                src="{{ asset('img/games/screenshot\/') . $game->screenshot_2 . '.jpg' }}" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
