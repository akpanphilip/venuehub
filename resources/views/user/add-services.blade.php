<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Event service | VenueHub NG</title>

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
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="formVenue">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <div class="formBox">
            <form action="{{route('user.add-services')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col form-group">
                        <label for="event-type">Name</label>
                        <input type="text" class="form-control" name="name">
                        <span class="text-danger spanText">
                            @error('name'){{$message}}@enderror
                        </span>
                    </div>

                    <div class="col form-group">
                        <label class="control-label">State of Origin</label>
                        <select onchange="toggleLGA(this);" name="location" id="state"
                            class="form-control" required>
                            <option value="" selected="selected">- Select -</option>
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
                    <div class=" col form-group">
                        <label for="lga">L.G.A</label>
                        <select name="lga" id="lga" class="form-control select-lga">
                        </select>
                    </div>
                    <div class="col form-group">
                        <label for="event-type">Event Service</label>
                        <select name="eventservice" class="form-control" required>
                            <option value="">-Select Event Service-</option>
                            @foreach($eventServices as $eventService)
                            <option value="{{$eventService->event}}">{{$eventService->event}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="event-type">Budget</label>
                        <input type="text" class="form-control" name="budget">
                        <span class="text-danger spanText">
                            @error('budget'){{$message}}@enderror
                        </span>
                    </div>
                    <div class="col form-group">
                        <label for="event-type">Capacity</label>
                        <select name="capacity" class="form-control" required>
                            <option value="">-Select Capacity-</option>
                            <option value="0-10">0-10</option>
                            <option value="10-50">10-50</option>
                            <option value="50-100">50-100</option>
                            <option value="100-1000">100-1000</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="description">Description</label>
                        <textarea name="description" rows="5" class="form-control"></textarea>
                        <span class="text-danger spanText">
                            @error('description'){{$message}}@enderror
                        </span>
                    </div>
                    <div class="col form-group">
                        <label for="hightlights">Highlights</label>
                        <input type="text" name="highlight" class="form-control mb-2" placeholder="Highlight 1">
                        <span class="text-danger spanText">
                            @error('highlight'){{$message}}@enderror
                        </span>
                        <input type="text" name="hightlight2" class="form-control mb-2" placeholder="Highlight 2(Optional)">
                        <span class="text-danger spanText">
                            @error('highlight2'){{$message}}@enderror
                        </span>
                        <input type="text" name="hightlight3" class="form-control mb-2" placeholder="Hightlight 3(Optional)">
                        <span class="text-danger spanText">
                            @error('highlight3'){{$message}}@enderror
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="form-control" value="ADD VENUE">
                </div>
            </form>
        </div>
    </div>

</div>





                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            {{-- <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; VenueHub 2021</span>
                    </div>
                </div>
            </footer> --}}
            <!-- End of Footer -->

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
            <script src="{{asset('js/lga.min.js')}}"></script>
