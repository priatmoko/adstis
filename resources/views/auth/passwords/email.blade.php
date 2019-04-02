<!-- Extending template views/auth/layout.blade.php-->
@extends('auth.layout')
<!-- Include component into form section -->
@section('form')
<!-- start card component -->
<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
    <div class="card mb-3">
        <div class="card-header">
            <h4>{{__('Reset Password')}}</h4>
        </div>
        <div class="card-body">
            <!-- Start of Displaying alert on condition -->
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <!-- Start of Form reset password -->
            <form method="POST" action="{{ route('password.email') }}" class="needs-validation" novalidate="">
                @csrf
                <div class="form-group">
                    <label for="email">{{__('Email Address')}}</label>
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
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="2">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </form>
            <!-- End of Form reset password -->
            <div class="text-center mt-1 mb-1">
                <div class="text-job text-muted">
                    Back to login page? <a href="{{route('login')}}">back</a>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection