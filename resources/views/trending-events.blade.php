<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Featured Event | VenueHub NG </title>
    <meta property="og:title" content="VenueHub | {{ $singleEvent->name }}" />
    <meta property="og:url" content="http://127.0.0.1:8000/event-services/10" />
    <meta property="og:image" content="{{ asset('eventServices') }}/{{ $singleEvent->image }}" />
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    @include('layout.header')
</head>
<style>
    body {
        background-color: var(--bgClr) !important;
    }
    .related-ads-box{
        margin-bottom: 50px;
    }
</style>

<body>
    {{-- include navbar --}}
    @include('layout.navbar')
    <div class="top-title">
        {{ $singleEvent->name }}
    </div>
    <div class="container">
        <div class="row trending-row mb-4">
            <div class="col-sm-6 col-md-8 col-lg-9">
                <div class="row g-3">
                    <div class="col-sm-6 col-md-12 col-lg-12">
                        <div class="imagebox">
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('eventServices') }}/{{ $singleEvent->image}}"
                                            class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('eventServices') }}/{{ $singleEvent->image }}"
                                            class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('eventServices') }}/{{ $singleEvent->image }}"
                                            class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('eventServices') }}/{{ $singleEvent->image }}"
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
                            <img src="{{ asset('eventServices') }}/{{ $singleEvent->image}}" alt="alt-image-1">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="image">
                            <img src="{{ asset('eventServices') }}/{{ $singleEvent->image}}" alt="alt-image-2">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="image">
                            <img src="{{ asset('eventServices') }}/{{ $singleEvent->image}}" alt="alt-image-3">
                        </div>
                    </div>
                </div>
                <div class="details">
                    <p class="venueType mt-2">Event service: <span>{{ $singleEvent->name }}</span></p>
                    <p class="venueType">Event service type: <span>{{ $singleEvent->type }}</span></p>
                    <p class="location">Location: {{ $singleEvent->location }}
                    </p>
                    <p class="maxCapacity">Capacity: <span>{{ $singleEvent->capacity }}</span></p>
                    <p class="description">Description: <span>{{ $singleEvent->description }}</span></p>
                    <p class="additionInfo">Highlights: </p>
                    <ul>
                        <li>{{$singleEvent->h1}}</li>
                        <li>{{$singleEvent->h2}}</li>
                        <li>{{$singleEvent->h3}}</li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="price">
                    <div class="top">
                        <img src="{{ asset('img/naira.png') }}">
                        <p>{{ $singleEvent->budget }}</p>
                    </div>
                    <div class="btm">
                        {{ $singleEvent->location }}
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
        <p class="related-ads-heading">Related Ads</p>
        <div class="container">
            <div class="row g-4">
                @foreach ($eventServiceLists as $eventServiceList )
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="eventServiceList">
                            <div class="eventServiceImg">
                                <a href="/event-services/{{ $eventServiceList->id }}">
                                    <img src="{{ asset('eventServices') }}/{{ $eventServiceList->image }}" alt="Event Service">
                                </a>
                            </div>
                            <hr class="line">
                            <div class="eventServiceName">
                                {{$eventServiceList->name}}
                            </div>
                            <hr class="line">
                            <div class="eventServiceLocation">
                                <p><i class="fas fa-map-marker-alt"></i> {{$eventServiceList->location}}</p>
                                <a href="https://api.whatsapp.com"><i class="fas fa-share-alt-square"></i></a>
                            </div>
                            <hr class="line">
                            <div class="eventServiceBudget">
                                <p>Budget From: <img src="{{asset('img/naira.png')}}"> {{$eventServiceList->budget}}</p>
                                <p>Capacity: {{$eventServiceList->capacity}}</p>
                            </div>
                            {{-- <hr class="line"> --}}
                            <div class="eventServiceShare">
                                seen by {{$eventServiceList->views}} people
                            </div>
                            <div class="serviceType">
                                {{$eventServiceList->eventservice}}
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
