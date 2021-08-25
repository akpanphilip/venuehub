<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/vlogo.png')}}" type="image/x-icon">
    <title>Find Perfect Venue in Nigeria | VenueHub NG</title>
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    @include('layout.header')
</head>

<body>
    {{-- include navbar --}}
    @include('layout.navbar')

    <section class="container-fluid banner">
        <div class="search-box">
            <p class="search-title">Filtered Search</p>
            <form action="{{ route('search-venue') }}" method="post">
                @csrf
                <div class="form-group m-2">
                    <select class="form-select" name="venueType">
                        <option value="">Select Venue Type</option>
                        @foreach ($venueTypes as $venueType)
                            <option value="{{ $venueType->venue_type }}">{{ $venueType->venue_type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group m-2">
                    <select class="form-select" name="eventType">
                        <option value="">Select Event Type</option>
                        @foreach ($eventTypes as $eventType)
                            <option value="{{ $eventType->event_type }}">{{ $eventType->event_type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group m-2">
                    <select onchange="toggleLGA(this);" name="state" id="state" class="form-select">
                        <option value="Select-state" selected="selected">Select State</option>
                        <option value="" id="all-Nigeria">All Nigeria</option>
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
                    <select name="lga" id="lga" class="form-select select-lga">
                        <option value="">Select LGA</option>
                    </select>
                </div>

                <div class="form-group m-2">
                    <input type="submit" value="Search" class="form-control">
                </div>
            </form>
        </div>
    </section>
    <main class="container-fluid entire-row">

        <div class="row main-row-events">
            <div class="col-sm-6 col-md-3 col-lg-3 catergories-section">
                <div class="ads-section">
                    {{-- categories --}}
                    <div class="categories">
                        <p class="category-heading">Categories</p>
                        <ul class="venueTypes">
                            @foreach ($venueTypes as $venueType)
                                <li>{{ $venueType->venue_type }}</li>
                                <span>{{ $venueType->listings_count }} ads</span>
                                <hr class="line">
                            @endforeach
                        </ul>
                    </div>
                    <div class="row">
                        @foreach ($ads as $ad )
                        <div class="col-sm-6 col-md-12 mb-3">
                            <img class="mb-3 img-fluid" src="{{ asset('adsImages') }}/{{ $ad->image }}">
                        </div>
                        @endforeach
                    </div>
                    {{-- dfsdf --}}
                </div>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-8 col-events">
                <p class="venueText" id="venueType">
                    Venue Hub helps you find and book your perfect venue for free.
                </p>
                <div class="row row-events g-4">
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="events">
                            <img class="img-fluid" src="{{ asset('img/wedding.webp') }}" alt="">
                            <div class="event-title">Weddings</div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="events">
                            <img class="img-fluid" src="{{ asset('img/corporate-meetings.jpg') }}" alt="">
                            <div class="event-title">Corporate Meetings</div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="events">
                            <img class="img-fluid" src="{{ asset('img/birthday.webp') }}" alt="">
                            <div class="event-title">Birthdays</div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="events">
                            <img class="img-fluid" src="{{ asset('img/conference.webp') }}" alt="">
                            <div class="event-title">Conferences</div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="events">
                            <img class="img-fluid" src="{{ asset('img/unique-spaces.jpg') }}" alt="">
                            <div class="event-title">Unique Spaces</div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="events">
                            <img class="img-fluid" src="{{ asset('img/parties.jpg') }}" alt="">
                            <div class="event-title">House Parties</div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="events">
                            <img class="img-fluid" src="{{ asset('img/religious-activities.jpg') }}" alt="">
                            <div class="event-title">Religious Meetings</div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="events">
                            <img class="img-fluid" src="{{ asset('img/business-meetings.png') }}" alt="">
                            <div class="event-title">Business Meetings</div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <p class="top-ads">FEATURED VENUES</p>
                    </div>
                </div>
                <div class="row ads g-3">
                    @foreach ($listings as $listing)
                        <div class="col-sm-6 col-md-6 col-lg-4">
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
                                            <a href="https://facebook.com/sharer.php?u=http://venuehub.ng/trending/{{ $listing->id }}/"
                                                target="_blank"><i class="fab fa-facebook fbk"></i></a>
                                            <a href="https://web.whatsapp.com/send?text=https://www.venuehub.ng/trending/{{ $listing->id }}"
                                                target="_blank"><i class="fab fa-whatsapp whp"></i></a>
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
                    {{-- pagination --}}
                    <div class="d-flex justify-content-center">
                        {{ $listings->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('layout.foot')
</body>

</html>
