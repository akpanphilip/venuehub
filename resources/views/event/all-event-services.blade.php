<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VenueHub</title>
    @include('layout.header')
</head>

<body>
    {{-- include navbar --}}
    @include('layout.navbar')
    <div class="all-services">
        <p class="headingText">
            Event Services
        </p>
        <p class="bodyText">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto illo atque cupiditate, nemo excepturi
            molestiae cum voluptatem optio, reiciendis exercitationem aliquam cumque repellendus. Deleniti, itaque? Eius
            natus aperiam aspernatur necessitatibus?
        </p>
    </div>
</body>
</html>
<script>
    AOS.init();
</script>
