<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/vlogo.png')}}" type="image/x-icon">
    <title>Featured Venue | VenueHub NG</title>
    {{-- og:url, og:type, og:title, og:image, og:description, fb:app_id --}}
    <meta property="og:title" content="VenueHub | {{ $trendingAds->name }}" />
    <meta property="og:url" content="http://127.0.0.1:8000/trending/10" />
    <meta property="og:image" content="{{ asset('listingImages') }}/{{ $trendingAds->image }}" />
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    @include('layout.header')
</head>
<body>
    {{-- include navbar --}}
    @include('layout.navbar')
    <div class="top-title">
        {{ $trendingAds->name }}
    </div>
    <div class="container">
        <div class="row trending-row">
            <div class="col-sm-6 col-md-8 col-lg-9">
                <div class="row">
                    <div class="col-sm-6 col-md-12 col-lg-12">
                        <div class="imagebox">
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('listingImages') }}/{{ $trendingAds->image }}"
                                            class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('listingImages') }}/{{ $trendingAds->image2 }}"
                                            class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('listingImages') }}/{{ $trendingAds->image3 }}"
                                            class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('listingImages') }}/{{ $trendingAds->image4 }}"
                                            class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-2 mt-1">
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="image">
                            <img src="{{ asset('listingImages') }}/{{ $trendingAds->image2 }}" alt="alt-image-1">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="image">
                            <img src="{{ asset('listingImages') }}/{{ $trendingAds->image3 }}" alt="alt-image-2">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="image">
                            <img src="{{ asset('listingImages') }}/{{ $trendingAds->image4 }}" alt="alt-image-3">
                        </div>
                    </div>
                </div>
                <div class="details">
                    <p class="venueType mt-2">Venue Name: <span>{{ $trendingAds->name }}</span></p>
                    <p class="venueType">Venue Type: <span>{{ $trendingAds->event }}</span></p>
                    <p class="location">Location: <span>{{ $trendingAds->state }}, {{ $trendingAds->lga }}</span>
                    </p>
                    <p class="maxCapacity">Capacity: <span>{{ $trendingAds->people }}</span></p>
                    <p class="description">Description: <span>{{ $trendingAds->description }}</span></p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="price">
                    <div class="top">
                        <img src="{{ asset('img/naira.png') }}">
                        <p>{{ $trendingAds->minimum_price }}</p>
                    </div>
                    <div class="btm">
                        {{ $trendingAds->state }}, {{ $trendingAds->lga }}
                    </div>
                </div>
                @foreach ($usersInfo as $userInfo)
                    <div class="user-info">
                        <div class="top-info">
                            <div class="userImgbox">
                                <img class="img-fluid" src="{{ asset('userImages') }}/{{ $userInfo->image }}"
                                    alt="user-image">
                            </div>
                            <p class="user-names">{{ $userInfo->firstname }} {{ $userInfo->lastname }}</p>
                        </div>
                        <div class="bottom-info">
                            <p class="mobile-title">Phone Number</p>
                            <p class="mobile">{{ $userInfo->mobile }}</p>
                            <a href="https://wa.me/{{ $userInfo->mobile }}" class="sendMsg">Send Message</a>
                        </div>
                @endforeach
            </div>
        </div>
    </div>

    </div>
    <div class="container-fluid related-ads-box">
        <p class="related-ads-heading">Trending Ads</p>
        <div class="container">
            <div class="row ads g-3">
                @foreach ($listings as $listing)
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="ad">
                            <div class="ad-image">
                                <a href="/trending/{{ $listing->id }}">
                                    <img src="{{ asset('listingImages') }}/{{ $listing->image }}" alt="">
                                </a>
                            </div>
                            <div class="name-share-section">
                                <div class="name-share">
                                    <div>{{ $listing->name }}</div>
                                    <div><i class="fas fa-map-marker-alt"></i> {{ $listing->state }}</div>
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
                                        <a href="https://facebook.com/sharer.php?u=http://venuehub.ng/trending/{{ $listing->id }}/" target="_blank"><i class="fab fa-facebook fbk"></i></a>
                                        <a
                                            href="https://web.whatsapp.com/send?text=https://www.venuehub.ng/trending/{{ $listing->id }}"><i
                                                class="fab fa-whatsapp whp"></i></a>
                                        <a href=""><i class="fab fa-instagram"></i></a>

                                        {{-- <a class="btn btn-teal text-white shareinit">Share</a> --}}
                                    </ul>
                                    {{-- <i class="fas fa-share-alt-square shareInit"></i> --}}
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
    </div>
</body>
@include('layout.foot')
</html>
