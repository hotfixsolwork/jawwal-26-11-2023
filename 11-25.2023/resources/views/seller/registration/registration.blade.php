@extends('backend.layouts.layout')



@section('style')

<link href="{{asset('public/vendor/intlTelInput/intlTelInput.css')}}" rel="stylesheet">

@endsection





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

                                <form action="{{ route('seller.register') }}" method="POST" id="signUpForm"

                                    enctype="multipart/form-data">

                                    @csrf

                                    <div class="fw-700 fs-20 fs-md-24 mb-5 text-center">

                                        {{ translate('Start Selling On Jawwal') }}</div>



                                    <div class="container-fluid">

                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="form-group">

                                                    <label for="name"

                                                        class="fs-12 fw-500 text-secondary">{{ translate('Fullname') }}</label>

                                                    <input type="text"

                                                        class="form-control rounded-0 {{ $errors->has('name') ? ' is-invalid' : '' }}"

                                                        placeholder="{{ translate('Enter Your Name') }}" name="name"

                                                        id="name" value="{{ old('name') }}">

                                                </div>

                                            </div>

                                            <div class="col-md-12">

                                                <div class="form-group">

                                                    <label for="email"

                                                        class="fs-12 fw-500 text-secondary">{{ translate('Email') }}</label>

                                                    <input type="email"

                                                        class="form-control rounded-0 {{ $errors->has('email') ? ' is-invalid' : '' }}"

                                                        placeholder="{{ translate('Enter Email Address') }}" name="email"

                                                        id="email" value="{{ old('email') }}">

                                                </div>

                                            </div>

                                            <div class="col-md-12">

                                                <input type="hidden" name="code" id="code" value="966" />

                                                <div class="form-group">

                                                    <label for="mobile"

                                                        class="fs-12 fw-500 text-secondary">{{ translate('Mobile Number') }}</label>

                                                        <input type="tel"  class="form-control rounded-0" name="mobile" id="mobile">

                                                </div>

                                            </div>

                                            

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="password" class="fs-12 fw-500 text-secondary">{{ translate('Password') }}</label>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control rounded-0" name="password" id="password" aria-describedby="passwordToggle">
                                                        <div class="input-group-append">
                                                            <button style="z-index:0;" class="btn btn-outline-secondary" type="button" id="passwordToggle">
                                                                <i class="las la-eye"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="password_confirmation" class="fs-12 fw-500 text-secondary">{{ translate('Confirm Password') }}</label>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control rounded-0" name="password_confirmation" id="password_confirmation" aria-describedby="passwordConfirmationToggle">
                                                        <div class="input-group-append">
                                                            <button style="z-index:0;" class="btn btn-outline-secondary" type="button" id="passwordConfirmationToggle">
                                                                <i class="las la-eye"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            

                                             

                                            
                                            

                                            <div class="col-md-12">

                                                <div class="form-group">

                                                    <button type="submit" class="btn btn-primary btn-block">{{translate('Create New Account') }}</button>

                                                </div>

                                            </div>

                                            

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



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="{{asset('public/vendor/intlTelInput/intlTelInput.js')}}"></script>



    <script type="text/javascript">

        $(document).ready(function() {

            @foreach ($errors->all() as $error)

                AIZ.plugins.notify('danger', "{{ $error }}");

            @endforeach

            

              var input = document.querySelector("#mobile");

              var iti = window.intlTelInput(input, {

                initialCountry: "sa",

                separateDialCode: true,

                utilsScript: "{{asset('public/vendor/intlTelInput/utils.js')}}"

              });

              

            input.addEventListener("countrychange", function() {

                  // do something with iti.getSelectedCountryData()

                var SelectedCountry = iti.getSelectedCountryData()

                var dialCode = SelectedCountry.dislCode;

                $("#code").val(dialCode);

            });

        });

    </script>
    <script>
        function togglePasswordVisibility(inputId, buttonId) {
            var passwordInput = document.getElementById(inputId);
            var passwordToggle = document.getElementById(buttonId);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordToggle.innerHTML = '<i class="las la-eye-slash"></i>';
            } else {
                passwordInput.type = 'password';
                passwordToggle.innerHTML = '<i class="las la-eye"></i>';
            }
        }

        document.getElementById('passwordToggle').addEventListener('click', function () {
            togglePasswordVisibility('password', 'passwordToggle');
        });

        document.getElementById('passwordConfirmationToggle').addEventListener('click', function () {
            togglePasswordVisibility('password_confirmation', 'passwordConfirmationToggle');
        });
    </script>   

@endsection

