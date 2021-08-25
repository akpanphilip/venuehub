<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VenueHub | Edit Venue</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Edit Venue Type</h1>
                    </div>


                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <div class="formBox">
                            @if (session('venueTypeUpdated'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('venueTypeUpdated') }}
                                </div>
                            @endif
                            <form action="{{route('updateVenueType')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $venueType->id }}">
                                <div class="form-group">
                                    <label for="name">Venue Type</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $venueType->venue_type }}">
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Update" class="form-control">
                                </div>
                            </form>
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
