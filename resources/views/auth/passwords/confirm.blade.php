@extends('layouts.landing')

@section('content')
    <div class="p-2 p-lg-5">
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
                                    <div class="card-header border-dark">{{ __('Confirm Password') }}</div>

                                    <div class="card-body">
                                        {{ __('Please confirm your password before continuing.') }}

                                        <form method="POST" action="{{ route('password.confirm') }}">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="password"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" required autocomplete="current-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row mb-0">
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit"
                                                        class="btn btn-light btn-lg btn-block border-dark">
                                                        {{ __('Confirm Password') }}
                                                    </button>

                                                    @if (Route::has('password.request'))
                                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                                            {{ __('Forgot Your Password?') }}
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </form>
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
