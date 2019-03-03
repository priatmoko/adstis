@extends('layouts.app')
@section('content')
<section class="section">
    <div class="container mt-3">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <!-- logo -->
                <div class="login-brand">
                    <img src="{{asset('assets/img/stisla-fill.svg')}}" alt="logo" width="70" class="shadow-light rounded-circle">
                </div>
                @yield('form')
                <div class="simple-footer mt-1 mb-1">
                    <small>Copyright &copy; Stisla 2018</small>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
