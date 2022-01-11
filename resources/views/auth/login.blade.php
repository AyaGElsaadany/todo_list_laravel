<!DOCTYPE html>
<html lang="en">

    {!! NoCaptcha::renderJs() !!}

@include('auth.includes.header');

<body>

    <div id="login-button">
        <img src="https://dqcgrsy5v35b9.cloudfront.net/cruiseplanner/assets/img/icons/login-w-icon.png">
    </div>
    <div id="container">
        <h1>Log In</h1>
        <span class="close-btn">
            <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png">
        </span>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <input type="email" name="email" class="@error('email') is-invalid @enderror" placeholder="E-mail">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input type="password" name="password" class="@error('password') is-invalid @enderror" placeholder="Password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="{{$errors->has('g-recaptcha-response') ? 'has-error' : ''}}">
                {!! NoCaptcha::display(['data-theme' => 'dark']) !!}
                @if ($errors->has('g-recaptcha-response'))
                    <span class="help-block">
                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                    </span>
                @endif
            </div>

            <button id="sub-btn" type="submit">
                Log in
            </button>

            <div id="remember-container">
                <input type="checkbox" id="checkbox-2-1" class="checkbox" checked="checked"/>
                <span id="remember">Remember me</span>
                @if (Route::has('password.request'))
                    <span id='forgotten'>
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </span>
                @endif
                {{-- <span id="forgotten">Forgotten password</span> --}}
            </div>
        </form>
    </div>

    <!-- Forgotten Password Container -->
    <div id="forgotten-container">
        <h1>Forgotten</h1>
        <span class="close-btn">
            <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png">
        </span>

        <form>
            <input type="email" name="email" placeholder="E-mail">
            <a href="#" class="orange-btn">Get new password</a>
        </form>
    </div>

    @include('auth.includes.footer');
</body>
</html>








{{-- @extends('layouts.app')

@section('content')
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
@endsection --}}
