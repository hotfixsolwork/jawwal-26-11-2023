@extends('backend.layouts.layout')



@section('content')

    <section class="pt-4 mb-4">

        <div class="container">

            <div class="row">

                <div class="col-xl-10 col-lg-10 mx-auto">

                    <div class="card shadow-none rounded-3 border">

                        <div class="row">

                            <div class="col-lg-6 col-md-5 py-md-0">

                                <img src="{{ static_asset('assets/img/main.png') }}" alt="" class="img-fit h-100">

                            </div>

                            <div class="col-lg-6 col-md-5 py-md-0">

                                <h1 class="fw-700 fs-20 fs-md-24 text-dark text-center mb-3 mt-5">

                                    {{ translate('Start selling on Jaawal today') }}</h1>

                                <form id="shop"action="{{ route('seller.otp.verify') }}" method="POST"

                                    enctype="multipart/form-data">

                                    @csrf

                                    <div class="bg-white text-center border-0 mb-1">

                                        <div class="fs-20 fw-800 px-5 mt-4 mb-2">

                                            {{ translate('Verification Code') }}

                                        </div>

                                        <div class="fs-14 fw-500 px-5 mb-5 m ">

                                            <?php

                                            //  $phone  = $newUser->phone;

                                            $email = $newUser->email;

                                            ?>

                                            {{ translate('Enter the code we just sent you on ' . $email) }}

                                        </div>



                                        @if (session()->has('locale') && session('locale') == 'en')

                                            <div id="otp"

                                                class="inputs d-flex flex-row justify-content-center mt-5 px-5">

                                                <input class="m-2 text-center form-control rounded" name="otp[]"

                                                    type="text" id="first" maxlength="1" />

                                                <input class="m-2 text-center form-control rounded" name="otp[]"

                                                    type="text" id="second" maxlength="1" />

                                                <input class="m-2 text-center form-control rounded" name="otp[]"

                                                    type="text" id="third" maxlength="1" />

                                                <input class="m-2 text-center form-control rounded" name="otp[]"

                                                    type="text" id="fourth" maxlength="1" />

                                            </div>

                                        @else

                                            <div id="otp"

                                                class="inputs d-flex flex-row justify-content-center mt-5 px-5">

                                                <input class="m-2 text-center form-control rounded" name="otp[]"

                                                    type="text" id="first" maxlength="1" tabindex="4" />

                                                <input class="m-2 text-center form-control rounded" name="otp[]"

                                                    type="text" id="second" maxlength="1" tabindex="3" />

                                                <input class="m-2 text-center form-control rounded" name="otp[]"

                                                    type="text" id="third" maxlength="1" tabindex="2" />

                                                <input class="m-2 text-center form-control rounded" name="otp[]"

                                                    type="text" id="fourth" maxlength="1" tabindex="1" />

                                            </div>

                                        @endif



                                        <!--<div class="fs-14 fw-500 px-5 mb-5 pb-5 mt-5 text-center text-muted">-->

                                        <!--    {{ translate('verification code expires in 00.02.00') }}-->

                                        <!--</div>-->

                                    </div>

                                    <div class="mb-4 mt-4 mx-5 px-5">

                                        <button type="submit"

                                            class="btn btn-primary btn-block fw-700 fs-14 rounded-4">{{ translate('Verify') }}</button>

                                        <hr>

                                    </div>

                                </form>



                                <form action="{{ route('seller.otp.resend') }}" method="POST">

                                    @csrf

                                    <div class="mb-4 mt-4 mx-5 px-5"></div>

                                        <!-- <button type="submit"

                                            class="btn btn-soft-primary btn-block fw-700 fs-14 rounded-4">{{ translate('Resend Code') }}
                                        </button> -->
                                        <div id="resend-section" class="mb-4 mt-4 mx-5 px-5">
                                            <button id="resend-button" type="submit"
                                                class="btn btn-soft-primary btn-block fw-700 fs-14 rounded-4">{{ translate('Resend Code') }}</button>
                                            <span id="resend-timer" class="text-muted" style="display: none;"></span>   
                                        </div>              

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>



                </div>

            </div>

        </div>

    </section>

@endsection



@section('script')

    <script type="text/javascript">

        $(document).ready(function() {

            @foreach ($errors->all() as $error)

                AIZ.plugins.notify('danger', "{{ $error }}");

            @endforeach

        });

    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/3.0.1/js.cookie.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Add the CSRF token meta tag if not already present -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
  $(document).ready(function () {
    var countdown = parseInt(Cookies.get('countdown')) || 0;
    var clickCount = parseInt(Cookies.get('clickCount')) || 0;

    function startCountdown(seconds) {
      countdown = seconds;
      $('#resend-button').hide();
      $('#resend-timer').text('{{ translate('Resend in') }} ' + formatTime(countdown));
      $('#resend-timer').show();

      var interval = setInterval(function () {
        countdown--;

        // Limit countdown to a maximum of 24 hours
        if (countdown <= 0) {
          clearInterval(interval);
          $('#resend-timer').hide();
          $('#resend-button').show();
          // Reset clickCount and clear cookies
          clickCount = 0;
          Cookies.remove('countdown');
          Cookies.remove('clickCount');
        } else {
          $('#resend-timer').text('{{ translate('Resend in') }} ' + formatTime(countdown));
        }
      }, 1000);
    }

    function formatTime(seconds) {
      var hours = Math.floor(seconds / 3600);
      var minutes = Math.floor((seconds % 3600) / 60);
      var remainingSeconds = seconds % 60;

      return (hours > 0 ? hours + 'h ' : '') + (minutes > 0 ? minutes + 'm ' : '') + remainingSeconds + 's';
    }

    // Function to handle OTP resend using AJAX.
    function resendOTP() {
      $.ajax({
        url: '{{ route('supplier.otp.resend') }}',
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
          // Check the response for success
          if (response.success) {
            // Handle the success response
            $('#resend-success-message').text('OTP resend successful!').show();
            // Optionally, you can clear the success message after a few seconds
            setTimeout(function () {
              $('#resend-success-message').hide().text('');
            }, 5000);
          } else {
            // Handle any other response conditions
            $('#resend-error-message').text('OTP resend failed.').show();
            // Optionally, you can clear the error message after a few seconds
            setTimeout(function () {
              $('#resend-error-message').hide().text('');
            }, 5000);
          }
        },
        error: function () {
          // Handle errors, if any
          $('#resend-error-message').text('Error occurred during OTP resend.').show();
          // Optionally, you can clear the error message after a few seconds
          setTimeout(function () {
            $('#resend-error-message').hide().text('');
          }, 5000);
        }
      });
    }

    $('#resend-button').click(function () {
      clickCount++; // Increment the click count

      if (clickCount === 1) {
        // First click: Hide for 180 seconds.
        startCountdown(180);
        // Handle the resend functionality here using AJAX.
        resendOTP();
      } else if (clickCount === 2) {
        // Second click: Hide for 24 hours.
        startCountdown(60 * 60 * 24);
        // Handle the resend functionality here using AJAX.
        resendOTP();
      }

      // Store the countdown and clickCount in both sessionStorage and cookies
      Cookies.set('countdown', countdown);
      Cookies.set('clickCount', clickCount);
      sessionStorage.setItem('countdown', countdown);
      sessionStorage.setItem('clickCount', clickCount);
    });

    // Retrieve the countdown value from sessionStorage (if set)
    var storedCountdown = parseInt(sessionStorage.getItem('countdown')) || 0;
    var storedClickCount = parseInt(sessionStorage.getItem('clickCount')) || 0;

    if (storedCountdown > 0 && storedClickCount > 0) {
      // Limit countdown to a maximum of 24 hours
      storedCountdown = Math.min(60 * 60 * 24, storedCountdown);
      startCountdown(storedCountdown);
    } else {
      // Start with the initial countdown (60 seconds).
      startCountdown(60);
    }
  });
</script>










@endsection

