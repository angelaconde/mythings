@extends('layouts.app')
@section('content')
    <div class="container">
        <!-- MESSAGE -->
        @include('components.message')
        <!-- TITLE -->
        <div class="row">
            <div class="col-12">
                <h1>Your profile</h1>
            </div>
        </div>
        <!-- CONTENT -->
        <div class="row">
            <div class="col-12 col-lg-2 p-3 text-center">
                <img src="{{ asset('img/avatars\/' . Auth::user()->avatar) }}"
                    class="avatar rounded-circle border border-dark" alt="...">
            </div>
            <div class="col-12 col-lg-10 p-3">
                <h4>Name: </h4>
                <h2>{{ $user->name }}</h2>
                <a href="#" data-id="{{ Auth::user()->id }}" class="btn btn-primary btn-sm changenamebutton"
                    data-toggle="modal" data-target="#edit-name-modal">Change name</a>
            </div>
        </div>
        <!-- MODALS -->
        <div id="edit-name-modal" class="modal text-left" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Change name</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form method="POST" id="name-form" action="{{ route('users.updatename') }}">
                                @csrf
                                @method('PATCH')
                                <input id="edit-user-id" name="id" hidden>
                                <div class="form-group">
                                    <label for="name">Name: </label>
                                    <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                                        placeholder="Enter new name">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button name="submit" type="submit" class="btn btn-primary">Change name</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
