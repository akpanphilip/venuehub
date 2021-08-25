<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/vlogo.png')}}" type="image/x-icon">
    <title>Register | VenueHub NG</title>
    @include('layout.header')
</head>
<style>
    body{
        background-color: #fff !important;
    }
</style>
<body>
    @include('layout.navbar')
    <div class="container-fluid">
        <div class="row loginSection">
            <div class="col-sm-6 col-md-7">
                <div class="registerImg">
                    <img src="{{asset('img/register.png')}}" alt="">
                </div>
            </div>
            <div class="col-sm-6 col-md-5">
                <div class="formBox w-100">
                    <form action="{{route('register')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <p class="formHeading">Register</p>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="name" value="{{old('name')}}">
                            <label for="floatingInput">Username</label>
                            <span class="text-danger spanText">
                                @error('name'){{$message}}@enderror
                            </span>
                        </div>
                        <div class="row g-2">
                            <div class="col form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="firstname" value="{{old('firstname')}}">
                                <label for="floatingInput">First Name</label>
                                <span class="text-danger spanText">
                                    @error('firstname'){{$message}}@enderror
                                </span>
                            </div>
                            <div class="col form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="lastname" value="{{old('lastname')}}">
                                <label for="floatingInput">Last Name</label>
                                <span class="text-danger spanText">
                                    @error('lastname'){{$message}}@enderror
                                </span>
                            </div>
                        </div>
                        <div class="row g-2">
                        <div class="col form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" name="email" value="{{old('email')}}">
                            <label for="floatingInput">Email address</label>
                            <span class="text-danger spanText">
                                @error('email'){{$message}}@enderror
                            </span>
                        </div>
                        <div class="col form-floating mb-3">
                            <input type="tel" class="form-control" id="floatingInput" name="mobile" value="{{old('mobile')}}">
                            <label for="floatingInput">Phone number</label>
                            <span class="text-danger spanText">
                                @error('mobile'){{$message}}@enderror
                            </span>
                        </div>
                        </div>
                        <div class="row g-2">
                        <div class="col form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" name="password" value="{{old('password')}}">
                            <label for="floatingPassword">Password</label>
                            <span class="text-danger spanText">
                                @error('password'){{$message}}@enderror
                            </span>
                        </div>
                        <div class="col form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" name="password_confirmation">
                            <label for="floatingPassword">Confirm Password</label>
                            <span class="text-danger spanText">
                                @error('password_confirmation'){{$message}}@enderror
                            </span>
                        </div>
                    </div>
                        <div class="forgotpwd">
                            <a href="login">Already have an account?</a>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="form-control">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
@include('layout.foot')

</html>
