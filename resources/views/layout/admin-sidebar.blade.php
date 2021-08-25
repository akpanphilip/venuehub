<style>
    .navbar-nav {
        background-color: #3db83a;
    }

    .sidebar-brand-logo {
        font-family: 'Fredoka One', cursive;
        text-shadow: 1px 1px 10px black;

    }
</style>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-logo mx-3">VENUEHUB.NG</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Admin Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.call-requests')}}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Call Requests</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-th-list"></i>
            <span>Manage Listings</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.manage-listings')}}">Venue</a>
            </div>
            {{-- <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.manage-listings-services')}}">Events</a>
            </div> --}}
        </div>
    </li>

    <!-- manage users -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.manage-users')}}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Manage Users</span>
        </a>
    </li>
    <!--manage package -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="{{route('admin.manage-packages')}}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Manage Packages</span>
        </a>
    </li> --}}
    <!-- manage venue type -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.manage-venues')}}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Manage Venue Type</span>
        </a>
    </li>
    <!-- event type -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="{{route('admin.manage-event')}}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Manage Event Type</span>
        </a>
    </li> --}}
    <!-- services -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="{{route('admin.manage-services')}}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Add Event Services</span>
        </a>
    </li> --}}
    {{-- messages
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.send-message')}}">
            <i class="fa fa-envelope"></i>
            <span>Send Message</span>
        </a>
    </li> --}}
    <li class="nav-item">
        <a class="nav-link" href="{{route('ads')}}">
            <i class="fa fa-th-list"></i>
            <span>Ads</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-user"></i>
            <span>Account</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('edit.profile')}}">Edit Profile</a>
            </div>
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.change-password')}}">Change Password</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item">
        <form action="{{route('logout.dashboard')}}" method="post">
            @csrf
            <input class="nav-link inputLogout" type="submit" value="Logout">
        </form>
    </li>


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
