<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/vlogo.png')}}" type="image/x-icon">
    <title>Login | VenueHub NG</title>
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
                <div class="imageBox">
                    <img src="{{asset('img/house.png')}}" alt="">
                </div>
            </div>
            <div class="col-sm-6 col-md-5">
                <div class="formBox w-100">
                    @if (session('registeredSuccessfully'))
                    <div class="alert alert-success" role="alert">
                        {{ session('registeredSuccessfully') }}
                    </div>
                    @endif
                    @if (session('unverified'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('unverified') }}
                    </div>
                    @endif
                    @if (session('status'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action="{{route('login')}}" method="post">
                        @csrf
                        <p class="formHeading">Login</p>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" name="email" value="{{old('email')}}">
                            <label for="floatingInput">Email address</label>
                            <span class="text-danger spanText">
                                @error('email'){{$message}}@enderror
                            </span>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" name="password">
                            <label for="floatingPassword">Password</label>
                            <span class="text-danger spanText">
                                @error('password'){{$message}}@enderror
                            </span>
                        </div>
                        <div class="forgotpwd">

                            <a href="{{route('forget.password.get')}}">Forgot password?</a>
                            <a href="register">Dont have an account?</a>
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
