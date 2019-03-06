<!-- Extending the template views/layout/app.blade.php-->
@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="container mt-2">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <!-- logo -->
                    <div class="login-brand">
                        <img src="{{asset('assets/img/stisla-fill.svg')}}" alt="logo" width="70" class="shadow-light rounded-circle">
                    </div>
                    <!-- End of logo -->
                </div>
            </div>
            <div class="row">
                @yield('form')
            </div>
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <!-- Copyright -->
                    <div class="simple-footer mt-0 mb-0">
                        <small>Copyright &copy; Stisla 2018</small>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
