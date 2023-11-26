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
                                <form action="{{ route('shops.store') }}" method="POST" id="signUpForm"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="fw-700 fs-20 fs-md-24 mb-5 text-center">
                                        {{ translate('Jawwal Selling  Hub Setup') }}</div>
                                    <!-- start step indicators -->
                                    <div class="form-header d-flex mb-5">
                                        <span class="stepIndicator">{{ translate('Account Information') }}</span>
                                        <span class="stepIndicator">{{ translate('Business Information') }} </span>
                                        <span class="stepIndicator"> {{ translate('Required Documents') }}</span>
                                    </div>
                                    <!-- end step indicators -->

                                    <!-- step one -->
                                    <div class="step">
                                        <h2 class="text-center mb-4"></h2>
                                        <div class="fw-700 fs-16 fs-md-24 mb-5 text-center">
                                            {{ translate('Account Information') }}
                                        </div>
                                        <p class="text-center mb-4">
                                            {{ translate('Account information like your name, email, password') }}
                                        </p>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name"
                                                        class="fs-12 fw-500 text-secondary">{{ translate('Your Name') }}</label>
                                                    <input type="text"
                                                        class="form-control rounded-0 {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                        placeholder="{{ translate('Enter Your Name') }}" name="name"
                                                        id="name" value="{{old('name')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"
                                                        class="fs-12 fw-500 text-secondary">{{ translate('Your Email') }}</label>
                                                    <input type="email"
                                                        class="form-control rounded-0 {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                        placeholder="{{ translate('Enter Email Address') }}" name="email"
                                                        id="email" value="{{old('email')}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password"
                                                        class="fs-12 fw-500 text-secondary">{{ translate('Password') }}</label>
                                                    <input type="password"
                                                        class="form-control rounded-0 {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                        placeholder="{{ translate('Enter Your Password') }}"
                                                        name="password" id="password">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password_confirmation"
                                                        class="fs-12 fw-500 text-secondary">{{ translate('Confirm Password') }}</label>
                                                    <input type="password"
                                                        class="form-control rounded-0 {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                                        placeholder="{{ translate('Confirm Your Password') }}"
                                                        name="password_confirmation" id="password_confirmation">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- step two -->
                                    <div class="step mt-5">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="text"
                                                        class="fs-12 fw-500 text-secondary">{{ translate('Company Name (EN)') }}</label>
                                                    <input type="text"
                                                        class="form-control rounded-0 {{ $errors->has('company_name') ? ' is-invalid' : '' }}"
                                                        placeholder="{{ translate('Enter Display Name') }}"
                                                        name="company_name" id="company_name" value="{{old('company_name')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="text"
                                                        class="fs-12 fw-500 text-secondary">{{ translate('Company Name (AR)') }}</label>
                                                    <input type="text"
                                                        class="form-control rounded-0 {{ $errors->has('company_name_ar') ? ' is-invalid' : '' }}"
                                                        placeholder="{{ translate('Enter Display Name') }}"
                                                        name="company_name_ar" id="company_name_ar" value="{{old('company_name_ar')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="text"
                                                        class="fs-12 fw-500 text-secondary">{{ translate('Phone Number') }}</label>
                                                    <input type="text"
                                                        class="form-control rounded-0 {{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                        placeholder="{{ translate('Enter Phone Number') }}" name="phone"
                                                        id="phone" value="{{old('phone')}}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="text"
                                                        class="fs-12 fw-500 text-secondary">{{ translate('Bank Account (IBAN)') }}</label>
                                                    <input type="text"
                                                        class="form-control rounded-0 {{ $errors->has('bank_account') ? ' is-invalid' : '' }}"
                                                        placeholder="{{ translate('Bank Account (IBAN)') }}"
                                                        name="bank_account" id="bank_account" value="{{old('bank_account')}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="text"
                                                        class="fs-12 fw-500 text-secondary">{{ translate('Tax Registration Number') }}</label>
                                                    <input type="text"
                                                        class="form-control rounded-0 {{ $errors->has('tax_registration') ? ' is-invalid' : '' }}"
                                                        placeholder="{{ translate('Enter Tax Registration Number') }}"
                                                        name="tax_registration" id="tax_registration" value="{{old('tax_registration')}}">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="text"
                                                        class="fs-12 fw-500 text-secondary">{{ translate('Business Details') }}</label>
                                                    <textarea class="form-control rounded-0 {{ $errors->has('business_details') ? ' is-invalid' : '' }}"
                                                        placeholder="{{ translate('Enter Business Registration Details') }}" name="business_details"
                                                        id="business_details" required>{{ old('tax_registration') }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- step three -->
                                    <div class="step">
                                        <div class="form_group mt-3">
                                            <label for="text"
                                                class="fs-12 fw-500 text-secondary">{{ translate('Upload Business Registration Certificate') }}</label>
                                            <div class="custom-file">
                                                <input type="file" name="business_certificate" class="custom-file-input" id="business_certificate"
                                                    required>
                                                <label class="custom-file-label"
                                                    for="business_certificate">{{ translate('Choose file...') }}</label>
                                                <div class="invalid-feedback">
                                                    {{ translate('Example invalid custom file feedback') }}</div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-3">
                                            <label for="text"
                                                class="fs-12 fw-500 text-secondary">{{ translate('Tax Registration Certificate') }}</label>
                                            <div class="custom-file">
                                                <input type="file" name="tax_certificate" class="custom-file-input" id="tax_certificate"
                                                    required>
                                                <label class="custom-file-label"
                                                    for="tax_certificate">{{ translate('Choose file...') }}</label>
                                                <div class="invalid-feedback">
                                                    {{ translate('Example invalid custom file feedback') }}</div>
                                            </div>
                                        </div>

                                        @if (get_setting('google_recaptcha') == 1)
                                            <div class="form-group mt-2 mx-auto row">
                                                <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_KEY') }}">
                                                </div>
                                            </div>
                                        @endif
                                    </div>



                                    <!-- start previous / next buttons -->
                                    <div class="form-footer d-flex">
                                        <button type="button" id="prevBtn"
                                            onclick="nextPrev(-1)">{{ translate('Previous') }}</button>
                                        <button type="button" id="nextBtn"
                                            onclick="nextPrev(1)">{{ translate('Next') }}</button>
                                    </div>
                                    <!-- end previous / next buttons -->
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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script type="text/javascript">
        // making the CAPTCHA  a required field for form submission
        $(document).ready(function() {
            $("#signUpForm").on("submit", function(evt) {
                var response = grecaptcha.getResponse();
                if (response.length == 0) {
                    //reCaptcha not verified
                    alert("please verify you are humann!");
                    evt.preventDefault();
                    return false;
                }
                //captcha verified
                //do the rest of your validations here
                $("#signUpForm").submit();
            });
        });
    </script>
    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("step");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("step");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("signUpForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, z, i, valid = true;
            x = document.getElementsByClassName("step");
            y = x[currentTab].getElementsByTagName("input");
            z = x[currentTab].getElementsByTagName("textarea");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " is-invalid";
                    // and set the current valid status to false
                    valid = false;
                } else {
                    y[i].classList.remove('is-invalid');
                }
            }
            // A loop that checks every texarea field in the current tab:
            for (i = 0; i < z.length; i++) {
                // If a field is empty...
                if (z[i].value == "") {
                    // add an "invalid" class to the field:
                    z[i].className += " is-invalid";
                    // and set the current valid status to false
                    valid = false;
                } else {
                    z[i].classList.remove('is-invalid');
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("stepIndicator")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("stepIndicator");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
        // $('#multiple-select-field').select2({
        //     theme: "bootstrap-5",
        //     width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        //     placeholder: $(this).data('placeholder'),
        //     closeOnSelect: false,
        // });
    </script>
    
     <script type="text/javascript">
    $(document).ready(function(){
        @foreach ($errors->all() as $error)
            AIZ.plugins.notify('danger', "{{$error}}");
        @endforeach
    });
</script>  
@endsection
