<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{asset('img/vlogo.png')}}" type="image/x-icon">
    <title>Messages | VenueHub NG</title>
    @include('layout.head')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layout.user-sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layout.topnav')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-end mb-4">
                        {{-- <h1 class="h3 mb-0 text-gray-800">Dashboard</h1> --}}
                        <a type="button" class="d-none d-sm-inline-block btn btn-sm shadow-sm request-call-btn"
                            data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <i class="fas fa-phone-alt"></i>
                            REQUEST A CALL
                        </a>
                    </div>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-end mb-4">
                        <a type="button" href="{{ route('user.add-listing') }}"
                            class="d-none d-sm-inline-block btn btn-sm shadow-sm request-call-btn">
                            <i class="fas fa-th-list"></i>
                            ADD VENUE
                        </a>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header d-flex justify-content-center align-items-center">
                                    <h5 class="modal-title" id="staticBackdropLabel">Request A Call on
                                        {{ auth()->user()->mobile }}</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="btnGrp">
                                        <form action="{{ route('user.call-request') }}" method="post">
                                            @csrf
                                            <input type="submit" class="btn btn-success mr-4" value="REQUEST">
                                            {{-- <a  href="{{route('user.call-request')}}" class="btn btn-success mr-4" data-bs-dismiss="modal">
                                                REQUEST
                                            </a> --}}
                                        </form>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">DECLINE
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content Row -->
                    <div class="container">
                        @foreach ($messages as $message)
                            <div class="messageBox mb-4">
                                <a class="dropdown-item d-flex align-items-center">
                                    <div class="dropdown-list-image mr-3">
                                        {{-- <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="..."> --}}
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="message">{{ $message->messages }}</div>
                                        <div class="small text-gray-500">Admin · {{ $message->created_at }}</div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>


                    {{-- body content --}}

                    {{-- end of body content --}}

                </div>
                <!-- /.container-fluid -->

            </div>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    @include('layout.footer');

</body>

</html>
