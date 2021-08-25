<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VenueHub | Edit Users</title>

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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        {{-- <h1 class="h3 mb-0 text-gray-800">Manage Listings</h1> --}}
                    </div>


                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <div class="row formBox">
                            <div class="col-sm-6 col-md-6">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                @if (session('status_mobile'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status_mobile') }}
                                    </div>
                                @endif
                                <form action="{{ route('admin.edit-user-mobile') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $userInfo->id }}">

                                    <div class="form-group">

                                        <label for="mobile">Mobile</label>
                                        <input type="tel" name="mobile" class="form-control"
                                            value="{{ $userInfo->mobile }}">
                                        <span class="text-danger spanText">
                                            @error('mobile'){{ $message }}@enderror
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Update Mobile" class="form-control">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    @if (session('status_email'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status_email') }}
                                        </div>
                                    @endif
                                    <form action="{{ route('admin.edit-user-email') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="{{ $userInfo->id }}">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" name="email"
                                                value="{{ $userInfo->email }}">
                                            <span class="text-danger spanText">
                                                @error('email'){{ $message }}@enderror
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" value="Update Email" class="form-control">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        @if (session('status_package'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status_package') }}
                                            </div>
                                        @endif
                                        <form action="{{ route('admin.edit-user-package') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <input type="hidden" name="id" value="{{ $userInfo->id }}">
                                                <label for="package">Package</label>
                                                <input type="text" class="form-control" name="package"
                                                    value="{{ $userInfo->package }}">
                                                <span class="text-danger spanText">
                                                    @error('package'){{ $message }}@enderror
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" value="Update Package" class="form-control">
                                                </div>
                                            </form>
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
