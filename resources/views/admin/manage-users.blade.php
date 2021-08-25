<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VenueHub | Manage Users</title>

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


                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            @if (session('acitveUser'))
                            <div class="alert alert-success" role="alert">
                                {{ session('acitveUser') }}
                            </div>
                            @endif
                            @if (session('disabledUser'))
                            <div class="alert alert-success" role="alert">
                                {{ session('disabledUser') }}
                            </div>
                            @endif


                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Profile Picture</th>
                                                <th>Full name</th>
                                                <th>Email</th>
                                                <th>Package</th>
                                                <th>Account status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>SN</th>
                                                <th>Profile Picture</th>
                                                <th>Full name</th>
                                                <th>Email</th>
                                                <th>Package</th>
                                                <th>Account status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($users as $user)
                                            <tr>
                                                <td>{{$cnt}}</td>
                                                <td>
                                                    <img src="{{ asset('userImages')}}/{{$user->image}}" alt="user image" width="250" height="150">
                                                </td>
                                                <td>{{$user->lastname}} {{$user->firstname}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->package}}</td>
                                                <td></td>
                                                <td class="d-flex">
                                                    <a class="btn btn-primary m-1" href="/admin/manage-users/disable/{{$user->id}}">Disable</a>
                                                    <a class="btn btn-danger m-1" href="/admin/manage-users/delete/{{ $user->id }}">Delete</a>
                                                    <a class="btn btn-success m-1" href="/admin/manage-users/enable/{{ $user->id }}">Enable</a>
                                                    <a class="btn btn-info m-1" href="/admin/edit-user-profile/{{ $user->id }}">Edit</a>
                                                    <a class="btn btn-warning m-1" href="/admin/send-user-message/{{ $user->id }}">Message</a>

                                                    {{-- <a class="btn btn-primary m-1" href="/admin/manage-users/disable/{{$user->id}}"><i class="fas fa-user-lock"></i></a>
                                                    <a class="btn btn-danger m-1" href="/admin/manage-users/delete/{{ $user->id }}"><i class="fas fa-trash-alt"></i></a>
                                                    <a class="btn btn-success m-1" href="/admin/manage-users/enable/{{ $user->id }}"><i class="fas fa-user-check"></i></a> --}}
                                                </td>
                                            </tr>
                                            <?php $cnt++ ?>
                                            @endforeach
                                        </tbody>
                                    </table>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
