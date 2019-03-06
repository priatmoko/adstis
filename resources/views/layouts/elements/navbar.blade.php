<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto" action="" method="GET">
        <!-- Button event sidebar and searching button on mobile view -->
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
        <!-- Searching Component -->
        <div class="search-element">
            @include('layouts.elements.topbar.searching')
        </div>
        <!-- End of Searching Component -->
    </form>
    <ul class="navbar-nav navbar-right">
        <!-- @ include('layouts.elements.topbar.messages')
        @ include('layouts.elements.topbar.notification') -->
        @include('layouts.elements.topbar.usernav')
    </ul>
</nav>