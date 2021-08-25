<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>All Venue | VenueHub NG</title>
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    @include('layout.header')
</head>

<body>
    {{-- include navbar --}}
    @include('layout.navbar')

    <section class="container-fluid banner-all-venue">
    </section>
    <div class="container serviceList-container">
        <p class="eventServiceText">
            ALL VENUES
        </p>
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
                                    <a href=""><i class="fab fa-facebook fbk"></i></a>
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
    @include('layout.foot')
</body>

</html>


{{-- <script>
    function shareNow() {
        const shareBtn = document.getElementById('shareinit');
        const box = document.querySelector('.wide');
        // box.style.display = "block";
        window.scrollTo(0, 0);
        box.classList.add('wideCome');

    }

    function closeWide() {
        const box = document.querySelector('.wide');
        box.classList.remove('wideCome');

    }
</script> --}}
