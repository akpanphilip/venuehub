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


                    <div class="container">
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
                            <div class="ImproveListings">
                                <p class="firstPara">Improve your listings with venueHub Premium services!</p>
                                <p class="secondPara">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis in
                                    saepe facilis quia! Laudantium magnam autem provident eos atque molestiae ipsam
                                    minima, sint eum earum quaerat! Rerum aperiam molestiae at?</p>
                                <p class="thirdPara">Choose the right category for your ads and start selling faster</p>

                            </div>
                            <div class="container-fluid ListingBox">
                                <div class="row">
                                    <div class="col-sm-6 col-md-4">
                                        <a href="#">
                                            <div class="sectionBox bg-warning">
                                                <p>Boost venue <span>listings</span></p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <a href="#">
                                            <div class="sectionBox bg-success">
                                                <p>Boost service <span>listing</span></p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <a href="$">
                                            <div class="sectionBox bg-primary"></div>
                                        </a>
                                    </div>
                                </div>
                                <div class="mt-5 row d-flex justify-content-center howItworksBtn">
                                    <div class="col-sm-6 col-md-4">
                                        <a href="how-it-works" class="btn btn-dark w-100">HOW DOES IT WORK?</a>
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
            {{-- <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; VenueHub 2021</span>
                    </div>
                </div>
            </footer> --}}
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
