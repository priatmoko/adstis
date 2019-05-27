<!-- Extending template views/auth/layout.blade.php-->
@extends('auth.layout')
<!-- Include component into form section -->
@section('form')
    <!-- start card component -->
    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <!-- Start of card -->
        <div class="card mb-3">
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
                            <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus />
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
    </div>
@endsection