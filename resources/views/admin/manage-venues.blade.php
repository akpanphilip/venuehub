<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VenueHub | Manage Venues</title>

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
                        {{-- <h1 class="h3 mb-0 text-gray-800">Manage Venue</h1> --}}
                    </div>
                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <div class="row">

                            <div class="col-sm-6 col-md-8">
                                @if (session('venueDeleted'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('venueDeleted') }}
                                    </div>
                                @endif
                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Venue Types</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%"
                                                cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>SN</th>
                                                        <th>Venue Type</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>SN</th>
                                                        <th>Venue Type</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    @foreach ($venueTypes as $venueType)

                                                        <tr>
                                                            <td>{{ $cnt }}</td>
                                                            <td>{{ $venueType->venue_type }}</td>
                                                            <td>
                                                                <a href="/admin/edit-venue-type/{{ $venueType->id }}"
                                                                    class="btn btn-primary">
                                                                    {{-- <i class="fas fa-edit-alt"></i> --}}Edit
                                                                </a>
                                                                <a href="/admin/delete-venue-type/{{ $venueType->id }}"
                                                                    class="btn btn-danger">
                                                                    {{-- <i class="fas fa-trash-alt"></i> --}}Delete
                                                                </a>
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
                                    <form action="{{ route('admin.manage-venues') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="event-type">Venue Type</label>
                                            <input type="text" class="form-control" name="venue"
                                                placeholder="Enter Type of Venue">
                                            <span class="text-danger spanText">
                                                @error('venue'){{ $message }}@enderror
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="form-control" value="ADD VENUE">
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


        @include('layout.footer')
    </body>

    </html>
