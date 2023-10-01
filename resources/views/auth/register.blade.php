@extends('layouts.app')

@section('content')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="confirm_password" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="confirm_password" type="password" class="form-control" name="confirm_password" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

    <!-- Preloader -->
    {{-- <div class="preloader preloader-dark">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div> --}}
    <!-- Preloader End -->

    <div id="main-wrapper" class="oxyy-login-register">
        <div class="hero-wrap min-vh-100">
            <div class="hero-mask opacity-4 bg-secondary"></div>
            <div class="hero-bg hero-bg-scroll" style="background-image:url('{{ asset('assets/images/login-bg-5.jpg') }}');">
            </div>
            <div class="hero-content d-flex min-vh-100">
                <div class="container my-auto">
                    <div class="row">
                        <div class="col-md-9 col-lg-7 col-xl-5 mx-auto">
                            <div class="hero-wrap rounded shadow-lg p-4 py-sm-5 px-sm-5 my-4">
                                <div class="hero-mask opacity-9 bg-dark"></div>
                                <div class="hero-content">
                                    <div class="logo mb-4">
                                        <a class="d-flex justify-content-center" href="#" title="Oxyy">
                                            {{-- <img src="images/logo-lg-light.png" alt="Oxyy"> --}}
                                            <h2 class="text-light">{{ __('Register') }}</h2>
                                        </a>
                                    </div>
                                    <form id="registerForm" class="form-dark" method="post"
                                        action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group icon-group">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" placeholder="Full Name" required
                                                autocomplete="name" autofocus>
                                            <span class="icon-inside"><i class="fas fa-user"></i></span>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group icon-group">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" placeholder="Email Address" required
                                                autocomplete="email">
                                            <span class="icon-inside"><i class="fas fa-envelope"></i></span>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group icon-group">
                                            <input id="mobile" type="number"
                                                class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                                value="{{ old('mobile') }}" placeholder="Phone Number" required
                                                autocomplete="mobile">
                                            <span class="icon-inside"><i class="fas fa-phone"></i></span>
                                            @error('mobile')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group icon-group">
                                            <input id="address" type="text"
                                                class="form-control @error('address') is-invalid @enderror" name="address"
                                                value="{{ old('address') }}" placeholder="Address" autocomplete="address"
                                                required>
                                            <span class="icon-inside"><i class="fas fa-map"></i></span>
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group icon-group">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                placeholder="Password" required autocomplete="new-password">
                                            <span class="icon-inside"><i class="fas fa-lock"></i></span>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group icon-group">
                                            <input id="confirm_password" type="password"
                                                class="form-control @error('confirm_password') is-invalid @enderror"
                                                name="confirm_password" placeholder="Confirm Password" required
                                                autocomplete="new-password">
                                            <span class="icon-inside"><i class="fas fa-lock"></i></span>
                                            @error('confirm_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <button class="btn btn-primary btn-block mt-4 mb-3"
                                            type="submit">{{ __('Register') }}</button>
                                        <p class="text-center text-muted text-2 mt-2 mb-0">You agree to <a
                                                class="btn-link text-light" href="#">Terms</a> and <a
                                                class="btn-link text-light" href="#">Privacy</a></p>
                                    </form>
                                    <p class="text-2 text-muted text-center mb-0">Already a member <a
                                            class="btn-link text-light text-3" href="{{ route('login') }}">Login now</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
