<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Account CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/account.css') }}">
</head>

<body>
<div id="account">
    <div class="account-bg"></div>
    <div class="account-bg2"></div>
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center w-100 vh-100">
            <h1 class="text-white mb-3 font-weight-bolder">{{ config('app.name', 'Laravel') }}</h1>
            <div class="account-box bg-white px-3 py-5 px-md-4 rounded-lg shadow d-flex flex-column">

                <small class="text-muted text-center mb-3">{{ __('Login') }} with Email</small>
                <small class="text-danger text-center mb-3 d-none">Invalid login or password. Please try again.</small>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white" id="signinEmail"><i class="material-icons-outlined">mail</i></span>
                            </div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email"  autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend" id="signinPass">
                                <span class="input-group-text bg-white"><i class="material-icons-outlined">lock</i></span>
                            </div>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" name="remember" id="signinRemember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="custom-control-label" for="signinRemember">Remember Me</label>
                    </div>
                    <div class="d-flex">
                        <button type="submit" class="btn btn-primary px-4 mt-3 mx-auto">
                            {{ __('Login') }}
                        </button>
{{--                        @if (Route::has('password.request'))--}}
{{--                            <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                {{ __('Forgot Your Password?') }}--}}
{{--                            </a>--}}
{{--                        @endif--}}
                    </div>
                    <!-- <a href="login.html" class="text-primary py-2 px-0 text-decoration-none">Log In</a> -->
                </form>
            </div>
            <div class="account-links d-flex justify-content-between mt-3">

                @if (Route::has('password.request'))
                    <a class="text-decoration-none" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
{{--                <a href="signup.html" class="text-decoration-none">Create new account</a>--}}
            </div>
        </div>
    </div>
</div>

</body>

</html>
