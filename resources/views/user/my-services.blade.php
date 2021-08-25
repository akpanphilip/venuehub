<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VenueHub User-Dashboard</title>

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
                        <a type="button" href="{{ route('user.add-listing') }}"
                            class="d-none d-sm-inline-block btn btn-sm shadow-sm request-call-btn">
                            <i class="fas fa-th-list"></i>
                            ADD VENUE
                        </a>
                    </div>

                    <div class="container">
                        <!-- Begin Page Content -->
                        <div class="container-fluid">
                            <!-- Page Heading -->
                            {{-- <h1 class="h3 mb-2 text-gray-800">My services</h1> --}}
                            @if (Session::has('venueDeleted'))
                                <div class="alert alert-danger" role="alert">
                                    {{ Session::get('venueDeleted') }}
                                </div>
                            @endif
                            @if (Session::has('eventDeleted'))
                                <div class="alert alert-danger" role="alert">
                                    {{ Session::get('eventDeleted') }}
                                </div>
                            @endif

                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>SN</th>
                                                    <th>Name of Venue</th>
                                                    <th>Location</th>
                                                    <th>L.G.A</th>
                                                    <th>Event service</th>
                                                    <th>Budget</th>
                                                    <th>Description</th>
                                                    <th>Highlight</th>
                                                    <th>Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>SN</th>
                                                    <th>Name of Venue</th>
                                                    <th>Location</th>
                                                    <th>L.G.A</th>
                                                    <th>Event service</th>
                                                    <th>Budget</th>
                                                    <th>Description</th>
                                                    <th>Highlight</th>
                                                    <th>Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @foreach ($services as $service)
                                                    <tr>
                                                        <td>{{ $cnt }}</td>
                                                        <td>{{ $service->name }}</td>
                                                        <td>{{ $service->location }}</td>
                                                        <td>
                                                            {{ $service->lga }}
                                                        </td>
                                                        <td>{{ $service->eventservice }}</td>
                                                        <td>{{ $service->budget }}</td>
                                                        <td>{{ $service->description }}</td>
                                                        <td class="table-list d-block">
                                                            <li>{{ $service->h1 }}</li>
                                                            <hr>
                                                            <li>{{ $service->h2 }}</li>
                                                            <hr>
                                                            <li>{{ $service->h3 }}</li>
                                                        </td>
                                                        <td>
                                                            <img src="{{ asset('eventServices') }}/{{ $service->image }}"
                                                                alt="list image" width="250" height="150">
                                                        </td>
                                                        <td>
                                                            <div class="buttons d-flex m-2">
                                                                <a class="btn btn-primary m-1"
                                                                    href="/user/edit-service/{{ $service->id }}">Edit</a>
                                                                <a class="btn btn-danger m-1"
                                                                    href="/user/delete-service/{{ $service->id }}">Delete</a>
                                                            </div>
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

    @include('layout.footer');

</body>

</html>
