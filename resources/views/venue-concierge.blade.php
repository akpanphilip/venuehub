<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('img/vlogo.png') }}" type="image/x-icon">
    <title>Venue Concierge | VenueHub NG </title>
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    @include('layout.header')
</head>
<style>
    #success-text {
        display: none;
        color: var(--bgClr2);
    }

</style>

<body>
    {{-- include navbar --}}
    @include('layout.navbar')
    <div class="searchBanner"></div>
    <div class="text">
        <p class="firstParagraph">
            Need help choosing a suitable venue for your event? Let us know your event specifications and we'll get back
            to you with some expert suggestions. This service is 100% FREE!
        </p>
        <p class="secondParagraph">
        </p>
    </div>
    <div class="container">
        <div class="formConcierge">
            <p id="success-text">Successfully sent!</p>
            <form>
                @csrf
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" value="{{ old('firstname') }}" id="firstname" name="firstname"
                                class="form-control" id="floatingInput" placeholder="Enter First Name">
                            <label for="floatingInput">First Name</label>
                            <span class="text-danger error-text firstname_err" id="text-danger"></span>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" value="{{ old('lastname') }}" id="lastname" name="lastname"
                                class="form-control" id="floatingInput" placeholder="Enter Last Name">
                            <label for="floatingInput">Last Name</label>
                            <span class="text-danger error-text lastname_err" id="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                class="form-control" id="floatingInput" placeholder="Enter Email Address">
                            <label for="floatingInput">Email</label>
                            <span class="text-danger error-text email_err" id="text-danger"></span>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" id="mobile" name="mobile" value="{{ old('mobile') }}"
                                class="form-control" id="floatingInput" placeholder="Enter Mobile Number">
                            <label for="floatingInput">Phone Number</label>
                            <span class="text-danger error-text mobile_err" id="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" id="budget" name="budget" value="{{ old('budget') }}"
                                class="form-control" id="floatingInput" placeholder="Enter Budget">
                            <label for="floatingInput">Budget Per Head</label>
                            <span class="text-danger error-text budget_err" id="text-danger"></span>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" id="guests" name="guests" value="{{ old('guests') }}"
                                class="form-control" id="floatingInput" placeholder="Enter Guests">
                            <label for="floatingInput">Guests</label>
                            <span class="text-danger error-text guests_err" id="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="date" id="date" name="date" class="form-control" value="{{ old('date') }}"
                                id="floatingInput" placeholder="Enter Date">
                            <label for="floatingInput">Event Date</label>
                            <span class="text-danger error-text date_err" id="text-danger"></span>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="time" id="time" name="time" value="{{ old('time') }}" class="form-control"
                                id="floatingInput" placeholder="Enter Time">
                            <label for="floatingInput">Time</label>
                            <span class="text-danger error-text time_err" id="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" id="duration" name="duration" value="{{ old('duration') }}"
                                class="form-control" id="floatingInput" placeholder="Enter Duration">
                            <label for="floatingInput">Duration</label>
                            <span class="text-danger error-text duration_err" id="text-danger"></span>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" id="location" name="location" value="{{ old('location') }}"
                                class="form-control" id="floatingInput" placeholder="Location">
                            <label for="floatingInput">Preferred Location in Nigeria</label>
                            <span class="text-danger error-text location_err" id="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-floating">
                        <textarea class="form-control" id="requirement" value="{{ old('requirement') }}"
                            name="requirement" placeholder="Leave a comment here" id="floatingTextarea2"
                            style="height: 100px"></textarea>
                        <label for="floatingTextarea2" class="m-1">Special Requirements</label>
                        <span class="text-danger error-text requirement_err" id="text-danger"></span>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="form-control btn btn-teal btn-submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
    @include('layout.foot')
</body>

</html>
<script type="text/javascript">
    $(document).ready(function() {
        $(".btn-submit").click(function(e) {
            e.preventDefault();
            var _token = $("input[name='_token']").val();
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            var email = $("#email").val();
            var mobile = $("#mobile").val();
            var budget = $("#budget").val();
            var guests = $("#guests").val();
            var date = $("#date").val();
            var time = $("#time").val();
            var duration = $("#duration").val();
            var location = $("#location").val();
            var requirement = $("#requirement").val();

            var message = $("#message").val();
            var successText = document.getElementById('success-text');
            var spanBox = document.getElementById('text-danger');
            $.ajax({
                url: "{{ route('concierge-submit') }}",
                type: 'POST',
                data: {
                    _token: _token,
                    firstname: firstname,
                    lastname: lastname,
                    email: email,
                    mobile: mobile,
                    budget: budget,
                    guests: guests,
                    date: date,
                    time: time,
                    duration: duration,
                    location: location,
                    requirement: requirement
                },
                success: function(data) {
                    console.log(data.error)
                    if ($.isEmptyObject(data.error)) {
                        successText.style.display = 'block';
                        spanBox.style.display = 'none';
                    } else {
                        printErrorMsg(data.error);
                    }
                }
            });
        });

        function printErrorMsg(msg) {
            $.each(msg, function(key, value) {
                console.log(key);
                $('.' + key + '_err').text(value);
            });
        }
    });
</script>
