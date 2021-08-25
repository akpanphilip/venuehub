<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/vlogo.png')}}" type="image/x-icon">
    <title>About Us | VenueHub NG</title>
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    @include('layout.header')
</head>

<body>
    {{-- include navbar --}}
    @include('layout.navbar')
    <div class="aboutBanner"></div>
    <div class="text">
        <p class="firstParagraph">
            VenueHub NG is one of Nigeria's leading venue platform were users can find event centers across the country.
            The company has revolutionised how event spaces are sourced.
        </p>
        <p class="secondParagraph">

        </p>
    </div>

    @include('layout.foot')
</body>

</html>
