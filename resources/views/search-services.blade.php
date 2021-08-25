<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Event Services | VenueHub NG </title>
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    @include('layout.header')
</head>
<style>
    body {
        background-color: #fff !important;
    }
    .search-box {
        height: auto;
        background-color: transparent;
        width: 100% !important;
        color: #000;
    }

    .nameTitle {
        text-decoration: none;
        color: #000;
    }

    .nameTitle:hover {
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
    <div class="container-fluid m-4">
        <div class="row">
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="search-box mt-4">
                    <p class="search-title">Filtered Search</p>
                    <form action="{{route('searchEventServices')}}" method="post">
                        @csrf
                        <div class="form-group m-2">
                            <select name="event_service" class="form-select" required>
                                <option value="">Event Service</option>
                                @foreach ($eventServices as $eventService)
                                    <option value="{{ $eventService->event }}">{{ $eventService->event }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group m-2">
                            <select class="form-select" name="location" required>
                                <option value="Select-Location">Select Location</option>
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
                            <input type="submit" value="Search" class="form-control">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-8">
                <h3 class="search-top-title text-center p-3">{{ $total }} match(es) found</h3>
                <div class="row gy-4">
                    @foreach ($serviceLists as $eventServiceList)
                        <div class="col-sm-6 col-md-5 col-lg-5">
                            <div class="eventServiceList">
                                <div class="eventServiceImg">
                                    <a href="/event-services/{{ $eventServiceList->id }}">
                                        <img src="{{ asset('eventServices') }}/{{ $eventServiceList->image }}"
                                            alt="Event Service">
                                    </a>
                                </div>
                                <hr class="line">
                                <div class="eventServiceName">
                                    {{ $eventServiceList->name }}
                                </div>
                                <hr class="line">
                                <div class="eventServiceLocation">
                                    <p><i class="fas fa-map-marker-alt"></i> {{ $eventServiceList->location }}</p>
                                    <a href="https://api.whatsapp.com"><i class="fas fa-share-alt-square"></i></a>
                                </div>
                                <hr class="line">
                                <div class="eventServiceBudget">
                                    <p>Budget From: <img src="{{ asset('img/naira.png') }}">
                                        {{ $eventServiceList->budget }}</p>
                                    <p>Capacity: {{ $eventServiceList->capacity }}</p>
                                </div>
                                {{-- <hr class="line"> --}}
                                <div class="eventServiceShare">
                                    seen by {{ $eventServiceList->views }} people
                                </div>
                                <div class="serviceType">
                                    {{ $eventServiceList->eventservice }}
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
