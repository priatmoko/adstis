@component('layouts.elements.others.card',
    ['title'=>'Jump To'])
    <div class="text-center">
        <img alt="image" 
            id ="avatar-image"
            src="{{\Auth::user()->avatar!="" && file_exists(public_path('files/admin/users/').\Auth::user()->avatar)?asset('files/admin/users/thumb-'.\Auth::user()->avatar):asset('assets/img/avatar/avatar-1.png')}}" 
            class="rounded-circle author-box-picture" 
            style="width:100px;">
        <div class="clearfix"></div>
        <h5>{{\Auth::user()->name}}</h5>
        {{'username : '.\Auth::user()->username.' email : '.\Auth::user()->email}}
    </div>
    <div class="mt-3">
        <ul class="nav nav-pills flex-column">
            <li class="nav-item"><a href="{{route('profile')}}" class="nav-link">Profile</a></li>
            <li class="nav-item">
                <!-- <a href="{{route('profile-setting')}}" class="nav-link active">Setting</a> -->
                <a id="setting-user-tab" 
                    data-toggle="tab" 
                    href="#setting-user" 
                    role="tab" 
                    aria-controls="Setting User Profile" 
                    aria-selected="true"
                    class="nav-link active">Setting</a>
            </li>
            <li class="nav-item">
                <a id="setting-password-tab" 
                    href="#setting-password"
                    data-toggle="tab" 
                    role="tab" 
                    aria-controls="Setting User Password"
                    class="nav-link">Password</a>
            </li>
            <li class="nav-item"><a href="#" class="nav-link">Theme</a></li>
        </ul>
    </div>
@endcomponent