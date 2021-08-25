<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VenueHub NG | Ads</title>

    @include('layout.head')

</head>
<style>
    .box {
        position: relative;

    }

    .del-ads {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: black;
        padding: 10px;
        border-radius: 100%;
        height: 30px;
        width: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-decoration: none;
    }

    .del-ads i {
        font-size: 20px;
        color: white;
    }

</style>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layout.admin-sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                @include('layout.admintopnav')
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="formBox mb-4">
                                <form action="{{ route('upload_ads') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Upload Advert</label>
                                        <input type="file" name="image" class="form-control">
                                        <span class="text-danger spanText">
                                            @error('image'){{ $message }}@enderror
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Upload" class="form-control">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-8">
                                <p class="text-center">Ads Uploaded</p>
                                @if (session('adDeleted'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('adDeleted') }}
                                    </div>
                                @endif

                                <div class="row">
                                    @foreach ($ads as $ad)
                                        <div class="col-sm-6 col-md-4">
                                            <div class="box">
                                                <img class="mb-3 img-fluid"
                                                    src="{{ asset('adsImages') }}/{{ $ad->image }}">
                                                <a href="/admin/delete-ads/{{ $ad->id }}" class="del-ads"><i
                                                        class="fas fa-times"></i></a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
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
