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
        {{-- @include('layout.user-sidebar') --}}
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
                        <p class="text-gray-800 pageTitle">Increase your listing visibility. <span>Subscribe Now!</span>
                        </p>
                    </div>


                    <!-- Content Row -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6 col-md-4 col-lg-2">
                                <div class="no-border">
                                    <p class="packageHead hide-features">Features</p>
                                    <p class="price free-price">Free</p>
                                    <p class="v-power">Visibility Power</p>
                                    <p class="no-listing">No. of Listing</p>
                                    <p class="promotion">Promotion for selected ads</p>
                                    <p class="ads-daily">Ads Daily Renewal</p>
                                    <p class="sms">SMS notification</p>
                                    <p class="social-media">Social Media promotion</p>
                                    <p class="website-link">Social Media link inclusion</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-2">
                                @foreach ($firstPackage as $first)

                                    <div class="package regular">
                                        <p class="packageHead bg-secondary">{{ $first->package_name }}</p>
                                        <p class="price">{{ $first->package_price }}</p>
                                        <p class="v-power">Limited ads view</p>
                                        <p class="no-listing">1 ad</p>
                                        <p class="promotion">-</p>
                                        <p class="ads-daily"><i class="fas fa-times"></i></p>
                                        <p class="sms"><i class="fas fa-times"></i></p>
                                        <p class="social-media"><i class="fas fa-times"></i></p>
                                        <p class="website-link"><i class="fas fa-times"></i></p>
                                        <button class="subscribeBtn bg-secondary">Free</button>
                                    </div>
                                @endforeach

                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-2">
                                @foreach ($secondPackage as $second)
                                    <div class="package">
                                        <p class="packageHead bg-success">{{ $second->package_name }}</p>
                                        <p class="price" id="p2">{{ $second->package_price }}</p>
                                        <p class="v-power">3x visibility</p>
                                        <p class="no-listing">5 ads</p>
                                        <p class="promotion">-</p>
                                        <p class="ads-daily">12 hours</p>
                                        <p class="sms"><i class="fas fa-times"></i></p>
                                        <p class="social-media"><i class="fas fa-times"></i></p>
                                        <p class="website-link"><i class="fas fa-times"></i></p>
                                        <button class="subscribeBtn bg-success" id="secondBtn"><a href="#subscribeBtn">Subscribe</a></button>
                                    </div>
                                @endforeach

                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-2">
                                @foreach ($thirdPackage as $third)
                                    <div class="package">
                                        <p class="packageHead bg-primary">{{ $third->package_name }}</p>
                                        <p class="price" id="p3">{{ $third->package_price }}</p>
                                        <p class="v-power">7x visibility</p>
                                        <p class="no-listing">20 ads</p>
                                        <p class="promotion">-</p>
                                        <p class="ads-daily">6 hours</p>
                                        <p class="sms"><i class="fas fa-check"></i></p>
                                        <p class="social-media"><i class="fas fa-times"></i></p>
                                        <p class="website-link"><i class="fas fa-times"></i></p>
                                        <button class="subscribeBtn bg-primary" id="thirdBtn"><a href="#subscribeBtn">Subscribe</a></button>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-2">
                                @foreach ($fourthPackage as $fourth)
                                    <div class="package">
                                        <p class="packageHead bg-dark">{{ $fourth->package_name }}</p>
                                        <p class="price" id="p4">{{ $fourth->package_price }}</p>
                                        <p class="v-power">15x visibility</p>
                                        <p class="no-listing">30 ads</p>
                                        <p class="promotion">-</p>
                                        <p class="ads-daily">3 hours</p>
                                        <p class="sms"><i class="fas fa-check"></i></p>
                                        <p class="social-media"><i class="fas fa-check"></i></p>
                                        <p class="website-link"><i class="fas fa-check"></i></p>
                                        <button class="subscribeBtn bg-dark" id="fourthBtn"><a href="#subscribeBtn">Subscribe</a></button>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-2">
                                @foreach ($fifthPackage as $fifth)
                                    <div class="package">
                                        <p class="packageHead bg-warning">{{ $fifth->package_name }}</p>
                                        <p class="price" id="p5">{{ $fifth->package_price }}</p>
                                        <p class="v-power">50x visibility</p>
                                        <p class="no-listing">50 ads</p>
                                        <p class="promotion">-</p>
                                        <p class="ads-daily">hourly</p>
                                        <p class="sms"><i class="fas fa-check"></i></p>
                                        <p class="social-media"><i class="fas fa-check"></i></p>
                                        <p class="website-link"><i class="fas fa-check"></i></p>
                                        <button class="subscribeBtn bg-warning" id="fifthBtn"><a href="#subscribeBtn">Subscribe</a></button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <form id="paymentForm">
                        <div class="form-group">
                            <input type="hidden" id="email-address" value="{{ auth()->user()->email }}" />
                        </div>
                        <div class="form-group">
                            <input type="hidden" id="amount" value="{{ $second->package_price }}" />
                        </div>
                        <div class="form-group">
                            <input type="hidden" id="first-name" value="{{ auth()->user()->firstname }}" />
                        </div>
                        <div class="form-group">
                            <input type="hidden" id="last-name" value="{{ auth()->user()->lastname }}" />
                        </div>
                        <div class="form-group">
                            <input type="hidden" id="phone" value="{{ auth()->user()->mobile }}" />
                        </div>
                        <div class="form-submit">
                            <button type="submit" onclick="payWithPaystack(event)" id="subscribeBtn">Pay
                                {{ $second->package_price }} Naira</button>
                        </div>
                    </form>
                    <script src="https://js.paystack.co/v1/inline.js"></script>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                    <script>
                        let paymentForm = document.getElementById('paymentForm');
                        paymentForm.addEventListener("submit", payWithPaystack, false);

                        function payWithPaystack(e) {
                            e.preventDefault();
                            let handler = PaystackPop.setup({
                                key: 'pk_test_926b3169b14cf3bde12f34916c55a652d13efc64', // Replace with your public key
                                first_name: document.getElementById("first-name").value,
                                last_name: document.getElementById("last-name").value,
                                phone: document.getElementById("phone").value,
                                email: document.getElementById("email-address").value,
                                amount: document.getElementById("amount").value * 100,
                                ref: '' + Math.floor((Math.random() * 1000000000) +
                                1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                                // label: "Optional string that replaces customer email"
                                onClose: function() {
                                    alert('Window closed.');
                                },
                                callback: function(response) {
                                    let reference = response.reference;
                                    // verify payment
                                    $.ajax({
                                        type: "GET",
                                        url: "{{URL::to('user/verify-payment')}}/"+reference,
                                        success: function (response){
                                            // console.log(response);
                                            if(response[0].status == true){
                                                $('form').prepend(`
                                                    <p class="respond">${response[0].message}</p>
                                                `);
                                            }else{
                                                $('form').prepend(`
                                                    <p class="respond">Failed to verify payment</p>
                                                `)
                                            }
                                        }
                                    });

                                }
                            });
                            handler.openIframe();
                        }
                    </script>

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
<script src="{{ asset('js/subscribe.js') }}"></script>
