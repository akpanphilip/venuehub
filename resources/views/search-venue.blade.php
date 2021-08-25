<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/vlogo.png')}}" type="image/x-icon">
    <title>Search Venue | VenueHub NG</title>
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    @include('layout.header')
</head>
<style>
    body {
        background-color: #fff !important;
    }

    .search-box {
        background-color: transparent;
        width: 100% !important;
    }

    .nameTitle{
        text-decoration: none;
        color: #000;
    }
    .nameTitle:hover{
        color: teal;
    }
    .search-top-title {
        text-align: center;
        padding: 15px;
        font-style: italic;
    }

    .save-more {
        margin-top: 14px;
        width: 100%;
        height: auto;
        margin-bottom: 15px;
    }
    .search-title {
        margin: 3px;
        color: #000;
    }

</style>

<body>
    {{-- include navbar --}}
    @include('layout.navbar')

    <div class="container-fluid">
        <div class="row mt-2 mb-4">
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="row">
                    <div class="col-sm-6 col-md-12">
                        <div class="search-box mt-4">
                            <p class="search-title">Filtered Search</p>
                            <form action="{{ route('search-venue') }}" method="post">
                                @csrf
                                <div class="form-group m-2">
                                    <select class="form-select" name="venueType">
                                        <option value="Select-venue-type">Select Venue Type</option>
                                        @foreach ($venueTypes as $venueType)
                                            <option value="{{ $venueType->venue_type }}">
                                                {{ $venueType->venue_type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group m-2">
                                    <select class="form-select" name="eventType">
                                        <option value="Select-event-type">Select Event Type</option>
                                        @foreach ($eventTypes as $eventType)
                                            <option value="">{{ $eventType->event_type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group m-2">
                                    <select onchange="toggleLGA(this);" name="state" id="state" class="form-select">
                                        <option value="Select-state" selected="selected">Select State</option>
                                        <option value="Abia">Abia</option>
                                        <option value="Adamawa">Adamawa</option>
                                        <option value="AkwaIbom">AkwaIbom</option>
                                        <option value="Anambra">Anambra</option>
                                        <option value="Bauchi">Bauchi</option>
                                        <option value="Bayelsa">Bayelsa</option>
                                        <option value="Benue">Benue</option>
                                        <option value="Borno">Borno</option>
                                        <option value="Cross River">Cross River</option>
                                        <option value="Delta">Delta</option>
                                        <option value="Ebonyi">Ebonyi</option>
                                        <option value="Edo">Edo</option>
                                        <option value="Ekiti">Ekiti</option>
                                        <option value="Enugu">Enugu</option>
                                        <option value="FCT">FCT</option>
                                        <option value="Gombe">Gombe</option>
                                        <option value="Imo">Imo</option>
                                        <option value="Jigawa">Jigawa</option>
                                        <option value="Kaduna">Kaduna</option>
                                        <option value="Kano">Kano</option>
                                        <option value="Katsina">Katsina</option>
                                        <option value="Kebbi">Kebbi</option>
                                        <option value="Kogi">Kogi</option>
                                        <option value="Kwara">Kwara</option>
                                        <option value="Lagos">Lagos</option>
                                        <option value="Nasarawa">Nasarawa</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Ogun">Ogun</option>
                                        <option value="Ondo">Ondo</option>
                                        <option value="Osun">Osun</option>
                                        <option value="Oyo">Oyo</option>
                                        <option value="Plateau">Plateau</option>
                                        <option value="Rivers">Rivers</option>
                                        <option value="Sokoto">Sokoto</option>
                                        <option value="Taraba">Taraba</option>
                                        <option value="Yobe">Yobe</option>
                                        <option value="Zamfara">Zamafara</option>
                                    </select>
                                </div>
                                <div class="form-group m-2">
                                    <select name="lga" id="lga" class="form-select select-lga" required>
                                        <option value="">Select LGA</option>
                                    </select>
                                </div>

                                <div class="form-group m-2">
                                    <input type="submit" value="Search" class="form-control">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-12">
                        <div class="save-more">
                            <img class="img-fluid" src="{{ asset('img/great-prices.jpg') }}" alt="Great prices">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-9 col-lg-9">
                <h3 class="search-top-title">{{ $total }} match(es) found in {{$lga}} {{$state}}.</h3>
                <div class="row ads g-3">
                    @foreach ($venueLists as $venueList)
                        <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="ad">
                                <div class="ad-image">
                                    <a href="/trending/{{ $venueList->id }}">
                                        <img src="{{ asset('listingImages') }}/{{ $venueList->image }}" alt="">
                                    </a>
                                </div>
                                <div class="name-share-section">
                                    <div class="name-share">
                                        <div>
                                            <a class="nameTitle" href="/trending/{{ $venueList->id }}">{{ $venueList->name }}</a>
                                        </div>
                                        <div><i class="fas fa-map-marker-alt"></i> {{ $venueList->state }}</div>
                                    </div>

                                </div>
                                <hr class="line">
                                <div class="capacity-budget">
                                    <div class="capacityPrice">
                                    <p class="capacity">Capacity: {{ $venueList->people }}</p>
                                    <p class="budget">Minimum price:{{ $venueList->minimum_price }}</p>
                                    </div>
                                    <div class="sharebtn">
                                        <ul class="shareLinks">
                                            <a href=""><i class="fab fa-facebook fbk"></i></a>
                                            <a href="https://web.whatsapp.com/send?text=https://www.venuehub.ng/trending/{{$venueList->id}}"><i class="fab fa-whatsapp whp"></i></a>
                                            <a href=""><i class="fab fa-instagram"></i></a>

                                            {{-- <a class="btn btn-teal text-white shareinit">Share</a> --}}
                                        </ul>
                                        {{-- <i class="fas fa-share-alt-square shareInit"></i> --}}
                                    </div>
                                </div>
                                <hr class="line">
                                <div class="viewers">
                                    <p class="viewby">
                                        seen by {{ $venueList->views }} users
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

    @include('layout.foot')
</body>

</html>
