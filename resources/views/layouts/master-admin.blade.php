@extends('layouts.app')
@section('content')
    <div class="main-wrapper main-wrapper-1">
        <!-- Top navbar -->
        @include('layouts.elements.navbar')
        <!-- Side navbar -->
        @include('layouts.elements.main-sidebar')
        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                @yield('component')
            </section>
        </div>
        @include('layouts.elements.footer')
    </div>
@endsection