<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{asset('img/vlogo.png')}}" type="image/x-icon">
    <title>Edit Profile | VenueHub NG</title>
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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-end mb-4">
                        <a type="button" href="{{route('user.add-listing')}}" class="d-none d-sm-inline-block btn btn-sm shadow-sm request-call-btn">
                            <i class="fas fa-th-list"></i>
                            ADD VENUE
                        </a>
                    </div>

                    <div class="container">
                        <div class="row formBox">
                            <div class="col-sm-6 col-md-3">
                                <div class="avatar m-3">
                                    <img class="avatarImg" src="{{ asset('userImages')}}/{{auth()->user()->image}}" class="img-fluid" alt="User Image">
                                </div>
                                @if (session('image_updated'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('image_updated') }}
                                </div>
                                @endif
                                <form action="{{ route('edit-avatar') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input type="file" name="image" class="form-control">
                                        <span class="text-danger spanText">
                                            @error('image'){{$message}}@enderror
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Update Image" class="form-control">
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                                @endif
                                <form action="{{route('edit-profile')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" name="name" value="{{auth()->user()->name}}">
                                        <span class="text-danger spanText">
                                            @error('name'){{$message}}@enderror
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="firstname">First name</label>
                                        <input type="text" name="firstname" class="form-control" value="{{auth()->user()->firstname}}">
                                        <span class="text-danger spanText">
                                            @error('firstname'){{$message}}@enderror
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname">Last name</label>
                                        <input type="text" class="form-control" name="lastname" value="{{auth()->user()->lastname}}">
                                        <span class="text-danger spanText">
                                            @error('lastname'){{$message}}@enderror
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile">Mobile</label>
                                        <input type="tel" name="mobile" class="form-control" value="{{auth()->user()->mobile}}">
                                        <span class="text-danger spanText">
                                            @error('mobile'){{$message}}@enderror
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Update" class="form-control">
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                @if (session('status_email'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status_email') }}
                                </div>
                                @endif
                                <form action="{{route('edit-email')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="email" value="{{auth()->user()->email}}">
                                        <span class="text-danger spanText">
                                            @error('email'){{$message}}@enderror
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Update Email" class="form-control">
                                    </div>
                                </form>
                            </div>
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
