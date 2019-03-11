@extends('layouts.master-admin')
@section('component')
    <div class="section-header">
        <h1>User Profile</h1>
        @include('layouts.elements.others.breadcrumb')
    </div>
    <div class="section-body">
        <h2 class="section-title">User Profile</h2>
        <p class="section-lead">Components relating to users, lists of users and so on.</p>
        <div class="row">
            <div class="col-md-12">
            <div class="card profile-widget">
                <div class="profile-widget-header">                     
                    <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                </div>
                <div class="profile-widget-description pb-0">
                    <div class="profile-widget-name">Hasan Basri 
                        <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Web Developer</div>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.
                        </p>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection