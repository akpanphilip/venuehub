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
                    <div class="d-sm-flex align-items-center justify-content-center mb-4">
                        <h1 class="h3 mb-0 text-gray-800">How do Premium services work?</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 col-md-3 offset-md-2">
                                <div class="imgPremium">
                                    <img src="{{ asset('img') }}/premium2.png" alt="">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-5">
                                <div class="textBox">
                                    <p class="text1">Premium services are the promotion tools for the sellers which help
                                        to advertise
                                        the items as much as possible in the particular category, to sell all the goods
                                        faster and get in several times more clients.
                                    </p>
                                    <p class="text2">
                                        Step up your sales with Premium Services and make money easier!
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-6 col-md-6">
                                <div class="adsBox bg-warning">
                                    <p class="headingText">TOP ADS PROMO</p>
                                    <p class="detailText">
                                        TOP package is the best choice if you want to push certain ads to the top of
                                        page and get 15x clients.
                                    </p>
                                    <p class="bottomText">
                                        Recommended for sellers with up to 5 adverts.
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="adsBox bg-teal">
                                    <p class="headingText">BOOST PLANS</p>
                                    <p class="detailText">
                                        Boost Plan is a great solution to promote all your ads for more than a month
                                    </p>
                                    <p class="bottomText">
                                        Recommended for sellers with more than 5 adverts.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row benefits">
                            <div class="col-sm-6 col-md-4"></div>
                            <div class="col-sm-6 col-md-8">
                                <div class="circleBox d-flex justify-content-center align-items-center flex-column">
                                    <p>
                                        TOP+/VIP TOP+ keeps the ads on the highest positions in the search results to
                                        provide the maximum ads visibility. Each Boost package has a certain number of
                                        TOP+/VIP TOP+ depending on the plan you choose.
                                    </p>
                                    <p>-----------------------------------------------------------------</p>
                                    <p>
                                        Promotion in search results and categories.
                                    </p>
                                    <p>-----------------------------------------------------------------</p>
                                    <p>
                                        Placing your boosted ads on the first pages.
                                    </p>
                                    <p>---------------------------------------------------</p>

                                    <p>
                                        Boosted ads get up to 50 times more clients for all your ads in the particular
                                        category.
                                    </p>
                                    <p>-----------------------------------------------------------------</p>
                                    <p>
                                        Opportunity to post more ads in the chosen category.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="whatIsTop">
                        <p class="headingText text-center">What is TOP+ and VIP TOP+</p>
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <p class="p-3">
                                    What is TOP+ and VIP TOP+?
                                    TOP+/VIP TOP+ is a tool for the sellers that makes your ads a priority showing them
                                    above all other ads.
                                </p>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <p class="p-3">
                                    Each package has a certain number of TOP+/VIP TOP+ depending on the Boost package
                                    you choose.
                                </p>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <p class="p-3">
                                    TOP+/VIP TOP+ is applied to one of your ads immediately after the purchase. You can
                                    move TOP+/VIP TOP+ to any ad as many times as you want till the end of your main
                                    Boost package.
                                </p>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <p class="p-3">
                                    If the number of TOP+/VIP TOP+ in packages exceeds the number of your ads, then some
                                    TOP+/VIP TOP+ will be applied to the same ads.
                                </p>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <p class="p-3">
                                    TOP+/VIP TOP+ never remain unused, they constantly work for making high promotion.
                                </p>
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

    @include('layout.footer');

</body>

</html>
