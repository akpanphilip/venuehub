<style>
    .navbar-nav i {
        color: #ffffff !important;
    }

    .navbar-nav {
        background-color: #3db83a;
    }

    .sidebar-brand-logo {
        font-family: 'Fredoka One', cursive;
        text-shadow: 1px 1px 10px black;
        font-size: 100%;

    }

</style>
<!-- Sidebar -->
<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('user.dashboard') }}">

        <div class="sidebar-brand-logo">
            {{-- <img src="{{ asset('img/white-logo.png') }}" alt="logo"> --}}
            VENUEHUB.NG
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('user.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-th-list"></i>
            <span>Listings</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('user.listing') }}">Venues Added</a>
            </div>
            {{-- <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('user.my-services') }}">My Services</a>
            </div> --}}
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('user.add-listing') }}">Add Venue</a>
            </div>
            {{-- <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('user.add-services') }}">Add Services</a>
            </div> --}}
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a href="{{ route('user.messages') }}" class="nav-link">
            <i class="fas fa-envelope"></i>
            <span>Messages</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-cog"></i>

            <span>Settings</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('user.edit-profile-view') }}">Edit Profile</a>
            </div>
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('user.change-password') }}">Change Password</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">

    {{-- <hr class="sidebar-divider">
    <li class="nav-item">
        <a href="{{ route('user.upgrade-package') }}" class="nav-link">
            <i class="fas fa-archive"></i>
            <span>Packages</span>
        </a>
    </li> --}}

    {{-- <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.premium-services') }}">
            <i class="fas fa-star"></i>
            <span>Premium services</span>
        </a>
    </li> --}}
    <!-- Divider -->
    {{-- <hr class="sidebar-divider"> --}}

    <li class="nav-item">
        <form action="{{ route('logout.dashboard') }}" method="post">
            @csrf
            <input class="nav-link inputLogout" type="submit" value="Logout">
        </form>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->
