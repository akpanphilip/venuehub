<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VenueHub | Change Password</title>

    @include('layout.head')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layout.admin-sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layout.admintopnav')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Profile</h1>
                    </div> --}}

                    <!-- Begin Page Content -->
                    <div class="container">
                        @if(Session::has('changed'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('changed')}}
                        </div>
                        @endif
                        <div class="row justify-content-center">

                            <div class="col-md-8">

                                <div class="card">

                                    <div class="card-body">

                                        <form method="POST" action="{{ route('admin.change.password') }}">

                                            @csrf



                                            @foreach ($errors->all() as $error)

                                                <p class="text-danger text-center">{{ $error }}</p>

                                            @endforeach



                                            <div class="form-group row">

                                                <label for="password" class="col-md-4 col-form-label text-md-right">Current
                                                    Password</label>



                                                <div class="col-md-6">

                                                    <input id="password" type="password" class="form-control"
                                                        name="current_password" autocomplete="current-password">

                                                </div>

                                            </div>



                                            <div class="form-group row">

                                                <label for="password" class="col-md-4 col-form-label text-md-right">New
                                                    Password</label>



                                                <div class="col-md-6">

                                                    <input id="new_password" type="password" class="form-control"
                                                        name="new_password" autocomplete="current-password">

                                                </div>

                                            </div>



                                            <div class="form-group row">

                                                <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm
                                                    Password</label>



                                                <div class="col-md-6">

                                                    <input id="new_confirm_password" type="password" class="form-control"
                                                        name="new_confirm_password" autocomplete="current-password">

                                                </div>

                                            </div>



                                            <div class="form-group row mb-0">

                                                <div class="col-md-8 offset-md-4">

                                                    <button type="submit" class="btn btn-dark">

                                                        Update Password

                                                    </button>

                                                </div>

                                            </div>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; VenueHub 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    @include('layout.footer')
</body>

</html>
