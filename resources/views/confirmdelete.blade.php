@extends('layouts.app')

@section('content')

    <div class="container col-12 col-lg-6 p-3">
        <div class="jumbotron text-center">
            <h1 class="text-danger">WARNING!</h1>
            <h3>You're about to delete your account.</h3>
            <p>You will lose access to My Things and all the items on your collection will be deleted.</p>
            <p>You will be able to register a new fresh account with this email address.</p>
            <h3>This operation <strong>CANNOT</strong> be undone!</h3>
            <div class="row text-center">
                <div class="col">
                    <a href="{{ url()->previous() }}" class="btn btn-dark mt-2"><i class="fas fa-long-arrow-alt-left"></i> No
                        please, go back</a>
                    <a href="{{ route('users.delete', Auth::user()) }}" class="btn btn-danger mt-2">Delete account FOREVER</a>
                </div>
            </div>
        </div>
    </div>

@endsection
