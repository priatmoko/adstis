@extends('layouts.app')
@section('content')
<section class="section">
    <div class="container mt-3">
        <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                <!-- Start of logo -->
                <div class="login-brand">
                    <img src="{{asset('assets/img/stisla-fill.svg')}}" alt="logo" width="70" class="shadow-light rounded-circle">
                </div>
                <!-- End of Logo -->
                <!-- Start of card -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>{{__('Register')}}</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}"  class="needs-validation" novalidate="">
                            @csrf
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="name">{{__('Full Name')}}</label>
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus />
                                    <div class="invalid-feedback">
                                        @if ($errors->has('name'))
                                            {{ $errors->first('name') }}
                                        @else
                                            {{__('Full name is required!')}}
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="username">{{__('Username')}}</label>
                                    <input id="username" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="username" value="{{ old('name') }}" required autofocus />
                                    <div class="invalid-feedback">
                                        @if ($errors->has('username'))
                                            {{ $errors->first('username') }}
                                        @else
                                            {{__('Username is required')}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">{{ __('E-Mail Address')}}</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus />
                                <div class="invalid-feedback">
                                    @if ($errors->has('email'))
                                        {{ $errors->first('email') }}
                                    @else
                                        {{__('E-mail Address is required')}}
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="password">{{__('Password')}}</label>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required autofocus>
                                    <div class="invalid-feedback">
                                        @if ($errors->has('password'))
                                            {{ $errors->first('password') }}
                                        @else
                                            {{__('Password is required!')}}
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="password-confirm">{{__('Password Confirm')}}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required />
                                    <div class="invalid-feedback">
                                        {{__('Password Confirm is required')}}
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Register
                                </button>
                            </div>
                        </form>
                        <div class="text-center mt-1 mb-1">
                            <div class="text-job text-muted">
                                Back to login page? <a href="{{route('login')}}">back</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of card -->
                <div class="simple-footer mt-1 mb-1">
                    <small>Copyright &copy; Stisla 2018</small>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<!-- @ extends('layouts.app')

@ section('content')
<div class="container">
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
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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
</div>
@ endsection -->
