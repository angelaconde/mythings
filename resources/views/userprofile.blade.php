@extends('layouts.app')
@section('content')
    <div class="container col-12 col-lg-5">
        <!-- MESSAGE -->
        @include('components.message')
        <!-- TITLE -->
        <div class="row">
            <div class="col-10">
                <h1>Your profile</h1>
            </div>
        </div>
        <!-- CONTENT -->
        <div class="row">
            <!-- AVATAR -->
            <div class="col-12 col-lg-3 p-3 text-center">
                <img src="{{ asset('img/avatars\/' . Auth::user()->avatar) }}"
                    class="avatar rounded-circle border border-dark" alt="avatar">
            </div>
            <div class="col-12 col-lg-9 p-3">
                <h5>Change avatar:</h5>
                <form action="{{ route('users.avatar') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-row">
                        <div class="form-group col-12">
                            <input type="file" name="image"
                                class="form-control-file p-2 border border-dark @error('image') is-invalid @enderror">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <button type="submit" class="btn btn-dark btn-sm mt-2">Upload new avatar</button>
                        </div>
                    </div>
                </form>
                <form action="{{ route('users.avatar.reset') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-row">
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-dark btn-sm">Reset to default avatar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <!-- NAME -->
            <div class="col-12 col-lg-3 p-3 text-center">
                <h4>Name: </h4>
            </div>
            <div class="col-12 col-lg-9 py-2 px-3">
                <h2>{{ $user->name }}</h2>
                <a href="#" data-id="{{ Auth::user()->id }}" class="btn btn-dark btn-sm changenamebutton"
                    data-toggle="modal" data-target="#edit-name-modal">Change name</a>
            </div>
        </div>
        <div class="row mt-2">
            <!-- WISHLIST -->
            <div class="col-12 col-lg-3 p-3 text-center">
                <h4>Wishlist: </h4>
            </div>
            <div class="col-12 col-lg-9 py-2 px-3">
                @if (Auth::user()->wishlist)
                    <h2>Your wishlist is currently public:</h2>
                    <a href="{{ url('wishlist/' . Auth::user()->id) }}">
                        <h3>{{ url('wishlist/' . Auth::user()->id) }}</h3>
                    </a>
                    <form action="{{ route('wishlist.private') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-row">
                            <div class="form-group col-12">
                                <button type="submit" class="btn btn-dark btn-sm">Make it private</button>
                            </div>
                        </div>
                    </form>
                @else
                    <h2>Your wishlist is currently private.</h2>
                    <a href="{{ url('wishlist/' . Auth::user()->id) }}">
                        <h3>{{ url('wishlist/' . Auth::user()->id) }}</h3>
                    </a>
                    <form action="{{ route('wishlist.public') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-row">
                            <div class="form-group col-12">
                                <button type="submit" class="btn btn-dark btn-sm">Make it public</button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
        <div class="row mt-2">
            <div class="col text-right">
                <a href="{{ route('users.confirmdelete', Auth::user()) }}" class="btn btn-danger btn-sm">Delete
                    account</a>
            </div>
        </div>
        <!-- NAME MODAL -->
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
                                <input name="id" value="{{ Auth::user()->id }}" hidden>
                                <div class="form-group">
                                    <label for="name">Name: </label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                        name="name" aria-describedby="name" placeholder="Enter new name" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
        @if ($errors->first('name'))
            <script>
                document.addEventListener("DOMContentLoaded", function(event) {
                    $('#edit-name-modal').modal('show');
                });

            </script>
        @endif
    </div>



@endsection
