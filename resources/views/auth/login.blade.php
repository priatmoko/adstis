@extends('auth.layout')

@section('form')
<!-- start card component -->
<div class="card mb-4">
    <div class="card-header">
    <h4>{{__('Sign In')}}</h4>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
            @csrf
            <div class="form-group">
                <label for="email">{{__('Email / Username')}}</label>
                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus tabindex="1">
                <div class="invalid-feedback">
                    @if ($errors->has('email'))
                        {{ $errors->first('email') }}</strong>
                    @else
                        {{__('Please fill in your email / username')}}
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="d-block">
                    <label for="password" class="control-label">{{__('Password')}}</label>
                    <div class="float-right">
                        @if (Route::has('password.request'))
                            <a class="text-small" href="{{ route('password.request') }}">
                                {{ __('Forgot your password ?') }}
                            </a>
                        @endif
                    </div>
                </div>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"tabindex="2" name="password" required>
                <div class="invalid-feedback">
                    @if ($errors->has('password'))
                        {{ $errors->first('password') }}
                    @else
                        {{__('Please fill in your password')}}    
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" tabindex="3" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="remember">{{__('Remember Me')}}</label>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    {{ __('Login') }}
                </button>
            </div>
        </form>
        <div class="text-center mt-1 mb-1">
            <div class="text-job text-muted">
                Don't have an account? <a href="auth-register.html">Register</a>
            </div>
        </div>
    </div>
</div>
<!-- end card component -->
@endsection