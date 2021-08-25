<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{asset('img/vlogo.png')}}" type="image/x-icon">
    <title>Venues | VenueHub NG</title>

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
                        <a type="button" href="{{route('user.add-listing')}}" class="d-none d-sm-inline-block btn btn-sm shadow-sm request-call-btn">
                            <i class="fas fa-th-list"></i>
                            ADD VENUE
                        </a>
                    </div>

                    <div class="container">
                        <!-- Begin Page Content -->
                        <div class="container-fluid">
                            <!-- Page Heading -->
                            {{-- <h1 class="h3 mb-2 text-gray-800">My listings</h1> --}}
                            @if (Session::has('venueDeleted'))
                                <div class="alert alert-danger" role="alert">
                                    {{ Session::get('venueDeleted') }}
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
                                                    <th>Type</th>
                                                    <th>People</th>
                                                    <th>State</th>
                                                    <th>L.G.A</th>
                                                    <th>Images</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>SN</th>
                                                    <th>Name of Venue</th>
                                                    <th>Type</th>
                                                    <th>People</th>
                                                    <th>State</th>
                                                    <th>L.G.A</th>
                                                    <th>Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @foreach ($listings as $listing)
                                                    <tr>
                                                        <td>{{ $cnt }}</td>
                                                        <td>{{ $listing->name }}</td>
                                                        <td>{{ $listing->type }}</td>
                                                        <td>
                                                            {{ $listing->people }}
                                                        </td>
                                                        <td>{{ $listing->state }}</td>
                                                        <td>{{ $listing->lga }}</td>
                                                        <td>
                                                            <img class="mb-3" src="{{ asset('listingImages') }}/{{ $listing->image }}"
                                                                alt="list image" width="250" height="150">
                                                                <img class="mb-3" src="{{ asset('listingImages') }}/{{ $listing->image2 }}"
                                                                alt="list image" width="250" height="150">
                                                                <img class="mb-3" src="{{ asset('listingImages') }}/{{ $listing->image3 }}"
                                                                alt="list image" width="250" height="150">
                                                                <img class="mb-3" src="{{ asset('listingImages') }}/{{ $listing->image4 }}"
                                                                alt="list image" width="250" height="150">
                                                        </td>
                                                        <td>
                                                            <div class="buttons d-flex m-2">
                                                                <a class="btn btn-primary m-1"
                                                                    href="/user/edit-venue/{{ $listing->id }}">Edit</a>
                                                                <a class="btn btn-danger m-1"
                                                                    href="/user/delete-venue/{{ $listing->id }}">Delete</a>
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
