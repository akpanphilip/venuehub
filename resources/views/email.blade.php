<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/vlogo.png')}}" type="image/x-icon">
    <title>Forgot password | VenueHub NG</title>
    @include('layout.header')
</head>
<style>
    body {
        background-color: #fff !important;
    }

</style>

<body>
    @include('layout.navbar')
    <div class="container-fluid">
        <div class="row loginSection">
            <div class="col-sm-6 col-md-7">
                <div class="imageBox">
                    <img src="{{ asset('img/house.png') }}" alt="">
                </div>
            </div>
            <div class="col-sm-6 col-md-5">
                <div class="formBox w-100">
                    <p class="text-center">Reset password</p>
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <form action="{{ route('forget.password.post') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="email" id="floatingInput" placeholder="email">
                            <label for="floatingInput">Email address</label>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Password Reset Link" class="form-control bg-teal">
                        </div>
                    </form>

                </div>

            </div>
        </div>
</body>
@include('layout.foot')

</html>
