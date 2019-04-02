@extends('layouts.master-admin')
@section('component')
    @component('layouts.elements.others.with-header', 
        ['title'=>'User Profile',
        'subtitle'=>'User Profile',
        'desc'=>'Page for displaying detail of user',
        'breadcrumb'=> (isset($breadcrumb)?$breadcrumb:'')])

        @component('layouts.elements.others.card',
            ['title'=>'User Detail'])
            
            <div class="text-center">
                <img alt="image" 
                    src="{{asset('assets/img/avatar/avatar-1.png')}}" 
                    class="rounded-circle author-box-picture" 
                    style="width:100px;">
                <div class="clearfix"></div>
                <h5>{{\Auth::user()->name}}</h5>
                {{'username : '.\Auth::user()->username.' email : '.\Auth::user()->email}}
            </div>
            <div class="mt-4 mb-4">
                <ul class="nav nav-tabs" id="myTab2" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="home-tab2" data-toggle="tab" href="#home2" role="tab" aria-controls="home" aria-selected="false">Access Log</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#profile2" role="tab" aria-controls="profile" aria-selected="false">Granted Modules</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active show" id="contact-tab2" data-toggle="tab" href="#contact2" role="tab" aria-controls="contact" aria-selected="true">Group Member</a>
                    </li>
                </ul>
                <div class="tab-content tab-bordered" id="myTab3Content">
                    <div class="tab-pane fade" id="home2" role="tabpanel" aria-labelledby="home-tab2">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </div>
                    <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile-tab2">
                    Sed sed metus vel lacus hendrerit tempus. Sed efficitur velit tortor, ac efficitur est lobortis quis. Nullam lacinia metus erat, sed fermentum justo rutrum ultrices. Proin quis iaculis tellus. Etiam ac vehicula eros, pharetra consectetur dui. Aliquam convallis neque eget tellus efficitur, eget maximus massa imperdiet. Morbi a mattis velit. Donec hendrerit venenatis justo, eget scelerisque tellus pharetra a.
                    </div>
                    <div class="tab-pane fade active show" id="contact2" role="tabpanel" aria-labelledby="contact-tab2">
                    Vestibulum imperdiet odio sed neque ultricies, ut dapibus mi maximus. Proin ligula massa, gravida in lacinia efficitur, hendrerit eget mauris. Pellentesque fermentum, sem interdum molestie finibus, nulla diam varius leo, nec varius lectus elit id dolor. Nam malesuada orci non ornare vulputate. Ut ut sollicitudin magna. Vestibulum eget ligula ut ipsum venenatis ultrices. Proin bibendum bibendum augue ut luctus.
                    </div>
                </div>
            </div>
        @endcomponent
    @endcomponent
@endsection