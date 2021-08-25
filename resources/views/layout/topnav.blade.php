<style>
    #envelope {
        color: black !important;
    }

</style>
<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>


    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-envelope" id="envelope"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">{{ $messageList->count() }}</span>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    Message Center
                </h6>
                @foreach ($messages as $message)
                    <a class="dropdown-item d-flex align-items-center" href="{{ route('user.messages') }}">
                        <div>
                            <div class="text-truncate">{{$message->messages}}</div>
                            <div class="small text-gray-500">Admin · {{$message->created_at}}</div>
                        </div>
                    </a>
                @endforeach
                <a class="dropdown-item text-center small text-gray-500" href="{{ route('user.messages') }}">Read More Messages</a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
                {{-- <img class="img-profile rounded-circle" src="img/undraw_profile.svg"> --}}
                <img class="avatarImg2" src="{{ asset('userImages') }}/{{ auth()->user()->image }}"
                    class="img-fluid" alt="User Image">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('user.edit-profile-view') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <div class="dropdown-divider"></div>
                <form action="{{ route('logout.dashboard') }}" method="post">
                    @csrf
                    <input class="nav-link inputLogoutNav" type="submit" value="            Logout">
                </form>
            </div>
        </li>

    </ul>

</nav>
