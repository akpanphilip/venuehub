<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{asset('img/vlogo.png')}}" type="image/x-icon">
    <title>Add Venue | VenueHub NG</title>
    @include('layout.head')

</head>
<style>
    .formBox{
        border: none;
    }
</style>
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
                    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 ml-4 ">Add new venue</h1>
                    </div> --}}
                    <div class="container">
                        <div class="formBox">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form action="{{ route('user.add-listing') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="package" class="form-control" value="{{auth()->user()->package}}">
                                {{-- <input type="hidden" name="venueTypeId" class="form-control"> --}}
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name"
                                                value="{{ old('name') }}" placeholder="Name of Venue">
                                            <span class="text-danger spanText">
                                                @error('name'){{ $message }}@enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <select name="type" class="form-control" value="{{old('type')}}" required >
                                                    <option value="">Select Venue Type</option>
                                                    @foreach ($venueTypes as $venueType)
                                                        <option value="{{ $venueType->venue_type }}">
                                                            {{ $venueType->venue_type }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <select name="people" class="form-control" required>
                                                    <option value="">No. of People</option>
                                                    <option value="0-10">0-10</option>
                                                    <option value="10-50">10-50</option>
                                                    <option value="50-100">50-100</option>
                                                    <option value="100-1000">100-1000</option>
                                                    <option value="1000+">1000+</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <select name="event" class="form-control" required>
                                                    <option value="">Select Event</option>
                                                    @foreach ($eventTypes as $eventType)
                                                        <option value="{{ $eventType->event_type }}">
                                                            {{ $eventType->event_type }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="price" placeholder="Minimum Price">
                                                <span class="text-danger spanText">
                                                    @error('price'){{ $message }}@enderror
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <select onchange="toggleLGA(this);" name="state" id="state"
                                                    class="form-control">
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
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <select name="lga" id="lga" class="form-control select-lga" required>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <div class="col">
                                                    <label for="Image">Image(s)</label>
                                                    <input type="file" name="image" class="form-control mb-3">
                                                    <span class="text-danger spanText">
                                                        @error('image'){{ $message }}@enderror
                                                        </span>
                                                    </div>
                                                    <div class="col">
                                                        <input type="file" name="alt_image_2" class="form-control mb-3">
                                                        <span class="text-danger spanText">
                                                            @error('alt_image_2'){{ $message }}@enderror
                                                            </span>
                                                        </div>
                                                        <div class="col">
                                                            <input type="file" name="alt_image_3" class="form-control mb-3">
                                                            <span class="text-danger spanText">
                                                                @error('alt_image_3'){{ $message }}@enderror
                                                                </span>
                                                            </div>
                                                            <div class="col">
                                                                <input type="file" name="alt_image_4" class="form-control mb-3">
                                                                <span class="text-danger spanText">
                                                                    @error('alt_image_4'){{ $message }}@enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="desc">Description</label>
                                                                <textarea value="{{old('description')}}" name="description" rows="8" class="form-control"></textarea>
                                                                <span class="text-danger spanText">
                                                                    @error('description'){{ $message }}@enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" value="ADD VENUE" class="form-control">
                                                </div>
                                                </form>
                                            </div>
                                        </div>

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
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
                        <script src="{{ asset('js/lga.min.js') }}"></script>
