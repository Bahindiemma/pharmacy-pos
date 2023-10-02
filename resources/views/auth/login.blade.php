@extends('layouts.app')

@section('content')


    <div id="main-wrapper" class="oxyy-login-register">
        <div class="hero-wrap min-vh-100">
            <div class="hero-mask opacity-4 bg-secondary"></div>
            <div class="hero-bg filter_bg hero-bg-scroll" style="background-image:url('{{ asset('assets/images/download.jpg') }}');">
            </div>
            <div class="hero-content d-flex min-vh-100">
                <div class="container my-auto">
                    <div class="row">
                        <div class="col-md-9 col-lg-7 col-xl-5 mx-auto">
                            <div class="hero-wrap rounded shadow-lg p-4 py-sm-5 px-sm-5 my-4">
                                <div class="hero-mask opacity-9 bg-dark"></div>
                                <div class="hero-content">
                                    <div class="logo mb-4">
                                        <a class="d-flex justify-content-center" href="#" title="">
                                            <h2 class="text-light">{{ __('Login') }}</h2>
                                        </a>
                                        @include('inc.flash')
                                    </div>
                                    <form id="loginForm" class="form-dark" action="{{ route('login') }}" method="post">
                                        @csrf
                                        <div class="form-group icon-group">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" placeholder="Email Address" required
                                                autocomplete="email" autofocus>
                                            <span class="icon-inside"><i class="fas fa-envelope"></i></span>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group icon-group">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                placeholder="Password" required autocomplete="current-password">
                                            <span class="icon-inside"><i class="fas fa-lock"></i></span>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <button class="btn btn-primary btn-block shadow-none mt-4 mb-3" type="submit">
                                            {{ __('Login') }}</button>
                                        <div class="row text-2 mt-4">
                                            <div class="col-sm">
                                                <div class="form-check custom-control custom-checkbox">
                                                    <input id="remember-me" name="remember" class="custom-control-input"
                                                        type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="custom-control-label text-light" for="remember-me">
                                                        {{ __('Remember Me') }}</label>
                                                </div>
                                            </div>
                                            <div class="col-sm text-right">
                                                @if (Route::has('password.request'))
                                                    <a class="btn-link text-light"
                                                        href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif

                                            </div>
                                        </div>
                                    </form>
                                    <p class="text-2 text-muted text-center mb-0"> <a class="btn-link text-light text-3"
                                            href="{{ route('register') }}">Sign up now</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
