<!-- @extends('_loginLayout')

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
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                            <input id="IDUser" type="text" class="form-control{{ $errors->has('IDUser') ? ' is-invalid' : '' }}" name="IDUser" value="{{ old('IDUser') }}" required autofocus>
                                @if ($errors->has('IDUser'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('IDUser') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
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
@endsection -->

@section('login_content')
<div class="m-login__signin">
    <div class="m-login__head">
        <h3 class="m-login__title">
            Welcome to SIMALUB
        </h3>
    </div>
    <form class="m-login__form m-form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group m-form__group">
            <input id="IDUser" class="form-control{{ $errors->has('IDUser') ? ' is-invalid' : '' }} m-input" type="text" placeholder="User ID" name="IDUser" value="{{ old('IDUser') }}" autocomplete="off" required autofocus>
            @if ($errors->has('IDUser'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('IDUser') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group m-form__group">
            <input id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} m-input m-login__form-input--last" type="password" name="password" placeholder="Password" required>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="m-login__form-action">
            <button id="btnSubmit" type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary" style="background-color:#3f50d8; border-color:#3f50d8">
                Sign In
            </button>
        </div>
    </form>
</div>
@endsection