<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VenueHub | Packages</title>

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
                        {{-- <h1 class="h3 mb-0 text-gray-800">Manage Packages</h1> --}}
                    </div>


                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-sm-6 col-md-8">
                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">

                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Venue Types</h6>
                                    </div>
                                    @if (session('deletedPackage'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('deletedPackage') }}
                                        </div>
                                    @endif
                                    @if (session('editedPackage'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('editedPackage') }}
                                        </div>
                                    @endif
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%"
                                                cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>SN</th>
                                                        <th>Package Name</th>
                                                        <th>Price</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>SN</th>
                                                        <th>Package Name</th>
                                                        <th>Price</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    @foreach ($packages as $package)
                                                        <tr>
                                                            <td>{{ $cnt }}</td>
                                                            <td>{{ $package->package_name }}</td>
                                                            <td>{{ $package->package_price }}</td>
                                                            <td>
                                                                <a class="btn btn-primary m-1"
                                                                    href="/admin/manage-packages/edit/{{ $package->id }}">Edit</a>
                                                                <a class="btn btn-danger m-1"
                                                                    href="/admin/manage-packages/delete/{{ $package->id }}">Delete</a>
                                                            </td>
                                                        </tr>
                                                        <?php $cnt++; ?>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="formVenue">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <h3>Add Package</h3>
                                    <form action="{{ route('admin.manage-packages') }}" method="post">
                                        @csrf

                                        <div class="form-group">
                                            <label for="event-type">Package Name </label>
                                            <input type="text" class="form-control" name="package"
                                                placeholder="Enter Type of Venue">
                                            <span class="text-danger spanText">
                                                @error('package'){{ $message }}@enderror
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="price">Price range</label>
                                                <input type="text" class="form-control" name="price">
                                                <span class="text-danger spanText">
                                                    @error('price'){{ $message }}@enderror
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="form-control" value="ADD PACKAGE">
                                                </div>
                                            </form>
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

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="login.html">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            @include('layout.footer')
        </body>

        </html>
