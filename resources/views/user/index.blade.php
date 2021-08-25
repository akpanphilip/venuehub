<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{asset('img/vlogo.png')}}" type="image/x-icon">
    <title>Dashboard | VenueHub NG</title>
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
                        {{-- <h1 class="h3 mb-0 text-gray-800">Dashboard</h1> --}}
                        @if (session('callRequestSent'))
                        <div class="text-success m-4" role="alert">
                            {{ session('callRequestSent') }}
                        </div>
                        @endif
                        <a type="button" class="d-none d-sm-inline-block btn btn-sm shadow-sm request-call-btn"
                            data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <i class="fas fa-phone-alt"></i>
                            REQUEST A CALL
                        </a>
                    </div>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-end mb-4">
                        <a type="button" href="{{ route('user.add-listing') }}"
                            class="d-none d-sm-inline-block btn btn-sm shadow-sm request-call-btn">
                            <i class="fas fa-th-list"></i>
                            ADD VENUE
                        </a>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header d-flex justify-content-center align-items-center">
                                    <h5 class="modal-title" id="staticBackdropLabel">Request A Call on
                                        {{ auth()->user()->mobile }}</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="btnGrp">
                                        <form action="{{ route('user.call-request') }}" method="post">
                                            @csrf
                                            <input type="submit" class="btn btn-success mr-4" value="REQUEST">
                                        </form>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">DECLINE
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Listings</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">2</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-bars fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- inactive users -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Account status</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Active</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Messages -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Messages</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ $messageList->count() }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- total fund deposits -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Package</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ auth()->user()->package }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-archive fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    {{-- <div class="infoBox">
                        <p class="text-center">Increase your listing visibility by 20x</p>
                        <a href="{{ route('user.upgrade-package') }}" class="btn-upgrade">
                            UPGRADE PACKAGE
                        </a>
                    </div> --}}

                    <div class="container trendingAds">
                        <p class="top-ads-text">Trending Ads</p>
                        <div class="row ads g-3">
                            @foreach ($listings as $listing)
                                <div class="col-sm-6 col-md-6 col-lg-3">
                                    <div class="ad">
                                        <div class="ad-image">
                                            <a href="/trending/{{ $listing->id }}">
                                                <img src="{{ asset('listingImages') }}/{{ $listing->image }}"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="name-share-section">
                                            <div class="name-share">
                                                <div>{{ $listing->name }}</div>
                                                <div><i class="fas fa-map-marker-alt"></i> {{ $listing->state }}
                                                </div>
                                            </div>

                                        </div>
                                        <hr class="line">
                                        <div class="capacity-budget">
                                            <div class="capacityPrice">
                                                <p class="capacity">Capacity: {{ $listing->people }}</p>
                                                <p class="budget">Minimum price:{{ $listing->minimum_price }}</p>
                                            </div>
                                            <div class="sharebtn">
                                                <ul class="shareLinks">
                                                    <a href="https://facebook.com/sharer.php?u=http://venuehub.ng/trending/{{ $listing->id }}/"
                                                        target="_blank"><i class="fab fa-facebook fbk"></i></a>
                                                    <a href="https://web.whatsapp.com/send?text=https://www.venuehub.ng/trending/{{ $listing->id }}"
                                                        target="_blank"><i class="fab fa-whatsapp whp"></i></a>
                                                    <a href=""><i class="fab fa-instagram"></i></a>
                                                </ul>
                                            </div>
                                        </div>
                                        <hr class="line">
                                        <div class="viewers">
                                            <p class="viewby">
                                                seen by {{ $listing->views }} users
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>

                    {{-- body content --}}

                    {{-- end of body content --}}

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
