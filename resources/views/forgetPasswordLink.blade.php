<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/vlogo.png')}}" type="image/x-icon">
    <title>Reset password | VenueHub NG</title>
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
                    <form action="{{ route('reset.password.post') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="email" id="floatingInput" placeholder="email">
                            <label for="floatingInput">Email address</label>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        {{-- <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input type="password" id="password" class="form-control" name="password" required autofocus>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div> --}}

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password" id="floatingInput" placeholder="password">
                            <label for="floatingInput">Password</label>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password_confirmation" id="floatingInput" placeholder="confirm password">
                            <label for="floatingInput">Confirm Password</label>
                            @if ($errors->has('password_confirmation'))
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Reset Password" class="bg-teal form-control">

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</body>
@include('layout.foot')
</html>




