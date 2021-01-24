@extends('layouts.swapdeallogin')

@section('content')
    <!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
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
-->

<main class="main">
    <div class="main__content">
        <div class="main__info">
            <div class="main__title">
                <h1>Fast Swap & Deal. In a couple of clicks</h1>
                <p>Welcome back! Please login to your account.</p>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form__item form__item--email">
                    <label>Email*</label>
                    <input id="email" type="email"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form__item form__item--pass">
                    <label>Password*</label>
                    <input id="password-input" type="password"  name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <a href="#" class="pass__img--show pass__img active "><img src="img/hide-pass.svg" alt=""></a>
                    <a href="#" class="pass__img--hide pass__img"><img src="img/show-pass.svg" alt=""></a>
                    <div class="form__item--passOther">
                        <label class="check_label">
                            <input class="checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span class="check_fake"></span>
                            <span class="check_text">Remember me?</span>
                        </label>
                    </div>
                </div>
                <div class="form__btn">
                    <button type="submit">Sign Up</button>
                </div>
            </form>
            <div class="main__footer">
                <div class="main__footer--links">
                    <p>Or agree & continua with</p>
                    <a href="#"><img src="img/google.svg" alt="google"></a>
                    <a href="#"><img src="img/facebook.svg" alt="facebook"></a>
                </div>
                <div class="main__footer--question">
                    <p>Do You Have Account?</p>
                    <a href="#">SIGN IN</a>
                </div>
            </div>
        </div>
        <div class="main__bg">
            <img src="img/main-logo.png" alt="logo">
        </div>
    </div>
</main>

@endsection
