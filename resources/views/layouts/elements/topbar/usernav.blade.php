<li class="dropdown">
    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">
            Hi, 
            @if(isset(\Auth::user()->name) && \Auth::user()->name != "")
                {{\Auth::user()->name}}
            @endif
        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-title">
            Hi, 
            @if(isset(\Auth::user()->name) && \Auth::user()->name != "")
                {{\Auth::user()->name}}
            @endif
        </div>
        <a href="@if (Route::has('profile')) {{route('profile')}} @endif" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile
        </a>
        <a href="features-settings.html" class="dropdown-item has-icon">
            <i class="fas fa-cog"></i> Settings
        </a>
        <a href="features-activities.html" class="dropdown-item has-icon">
            <i class="fas fa-key"></i> Change Password
        </a>
        <div class="dropdown-divider"></div>

        <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</li>