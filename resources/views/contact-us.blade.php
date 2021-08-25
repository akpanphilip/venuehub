<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/vlogo.png')}}" type="image/x-icon">
    <title>Contact Us | VenueHub NG</title>
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    @include('layout.header')
</head>
<style>
    #success-text{
        display: none;
        color: var(--bgClr2);
    }
</style>
<body>
    {{-- include navbar --}}
    @include('layout.navbar')
    <div class="container">
        <div class="row row-contact">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="left">
                    <p class="getIntouch">
                        Get In Touch With Us
                    </p>
                    <p class="shortText">
                        {{-- Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi accusamus quisquam cumque beatae --}}
                    </p>
                    <p class="sendMessageText">
                        Send Message
                    </p>
                    <div class="formContact">
                        <p id="success-text">Successfully sent!</p>
                        <form>
                            @csrf
                            <div class="row g-2">
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <input type="text" value="{{old('name')}}" id="name" name="name" class="form-control" id="floatingInput"
                                            placeholder="Enter Name">
                                        <label for="floatingInput">Name</label>
                                        <span class="text-danger error-text name_err" id="text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control" id="floatingInput"
                                            placeholder="email">
                                        <label for="floatingInput">Email</label>
                                        <span class="text-danger error-text email_err" id="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-floating">
                                    <textarea class="form-control" name="message" id="message" value="{{old('message')}}" placeholder="Leave a message here"
                                        id="floatingTextarea2" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2" class="m-1">Message</label>
                                    <span class="text-danger error-text message_err" id="text-danger"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-teal btn-submit" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="right">
                    {{-- <img src="{{asset('img/great-prices.jpg')}}" alt=""> --}}
                </div>
            </div>
        </div>
    </div>
    @include('layout.foot')
</body>
</html>
<script type="text/javascript">
    $(document).ready(function() {
        $(".btn-submit").click(function(e){
            e.preventDefault();
            var _token = $("input[name='_token']").val();
            var name = $("#name").val();
            var email = $("#email").val();
            var message = $("#message").val();
            var successText = document.getElementById('success-text');
            var spanBox = document.getElementById('text-danger');
            $.ajax({
                url: "{{ route('contact-us-submit') }}",
                type:'POST',
                data: {_token:_token, name:name, email:email, message:message},
                success: function(data) {
                  console.log(data.error)
                    if($.isEmptyObject(data.error)){
                        successText.style.display = 'block';
                        spanBox.style.display = 'none';
                    }else{
                        printErrorMsg(data.error);
                    }
                }
            });
        });
        function printErrorMsg (msg) {
            $.each( msg, function( key, value ) {
            console.log(key);
              $('.'+key+'_err').text(value);
            });
        }
    });
</script>
