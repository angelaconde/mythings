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
                        @else
                            <a href="#">
                                {{ Auth::user()->name }}
                            </a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
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
