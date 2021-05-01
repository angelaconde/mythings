@extends('layouts.landing')

@section('content')
    <div class="p-5">
        <div class="container info-container">
            <div class="row">
                <div class="col-12">
                    <!-- LOGO -->
                    @include('logo')
                    <!-- LOGO END -->
                    <!-- CARD -->
                    <div class="container p-4">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card border-dark">
                                    <div class="card-header border-dark">{{ __('Verify Your Email Address') }}</div>

                                    <div class="card-body">
                                        @if (session('resent'))
                                            <div class="alert alert-success" role="alert">
                                                {{ __('A fresh verification link has been sent to your email address.') }}
                                            </div>
                                        @endif

                                        {{ __('Before proceeding, please check your email for a verification link.') }}
                                        {{ __('If you did not receive the email') }},
                                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                                        </form>
                                        <div class="mt-3">
                                            <span>I think I messed up, please </span>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                take me back to the start.
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- CARD END -->
                </div>
            </div>
        </div>
    </div>

@endsection
