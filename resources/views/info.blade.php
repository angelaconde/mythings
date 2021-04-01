@extends('layouts.landing')

@section('content')
    <div class="p-5">
        <div class="container info-container">
            <div class="row">
                <!-- LEFT SIDE -->
                <div class="col-12 col-md-5">
                    <!-- LOGO -->
                    @include('logo')
                    <!-- LOGO END -->
                    <!-- INFO TEXT -->
                    <div class="text-center p-3">
                        <h2>Manage your collections.</h2>
                        <h5>We currently support PS4 video games collections.</h5>
                        <p>Books and Films collections coming soon.</p>
                    </div>
                    <!-- INFO TEXT END -->
                    <!-- AUTH LINKS -->
                    <div class="text-center p-3">
                        @guest
                            <div class="row justify-content-center">
                                <div class="col-8 col-md-5 p-2">
                                    <a class="btn btn-light btn-lg btn-block border-dark" role="button"
                                        href="{{ route('login') }}">{{ __('Login') }}</a>
                                </div>
                                <div class="col-8 col-md-5 p-2">
                                    <a class="btn btn-light btn-lg btn-block border-dark" role="button"
                                        href="{{ route('register') }}">{{ __('Register') }}</a>
                                </div>
                            </div>
                            <div class="row justify-content-center mt-3">
                                <div class="col-8 col-md-10 p-2">
                                    <div class="btn-group col-12 m-0 p-0 border border-dark rounded">
                                        <a class='btn btn-danger disabled'><i class="fab fa-google"></i></a>
                                        <a href="{{ url('/login/google') }}"
                                            class="btn btn-danger btn-block">
                                            {{ __('Login with Google') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row justify-content-center">
                                <h3>You're already logged in as "{{ Auth::user()->name }}".</h3>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-8 p-2">
                                    <a class="btn btn-light btn-lg btn-block border-dark" role="button"
                                        href="{{ route('collection') }}">
                                        Go to my collection
                                    </a>
                                </div>
                            </div>
                            <div class="row justify-content-center mt-3">
                                <h3>Not you?</h3>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-8 p-2">
                                    <a class="btn btn-light btn-lg btn-block border-dark" 
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </div>
                    <!-- AUTH LINKS END -->
                </div>
                <!-- LEFT SIDE END -->
                <!-- RIGHT SIDE -->
                <div class="col-12 col-md-7 info-img">
                    <img class="d-block img-fluid w-100" src="http://via.placeholder.com/600x540" alt="info">
                </div>
                <!-- RIGHT SIDE END -->
            </div>
        </div>
    </div>

@endsection
