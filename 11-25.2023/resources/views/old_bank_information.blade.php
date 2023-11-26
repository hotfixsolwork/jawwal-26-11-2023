@extends('backend.layouts.layout')

@section('content')
<section class="pt-4 mb-4">
    <div class="container text-center">
        <div class="row">
            <!--<div class="col-lg-6 text-center text-lg-left">
                {{-- <h1 class="fw-700 fs-24 text-dark">{{ translate('Register your shop')}}</h1> --}}
            </div>-->
            <!--<div class="col-lg-6">
                <ul class="breadcrumb bg-transparent p-0 justify-content-center justify-content-lg-end">
                    <li class="breadcrumb-item opacity-50">
                        <a class="text-reset" href="{{ route('home') }}">{{ translate('Home')}}</a>
                    </li>
                    <li class="text-dark fw-600 breadcrumb-item">
                        <a class="text-dark" href="{{ route('shops.create') }}">"{{ translate('Register your shop')}}"</a>
                    </li>
                </ul>
            </div>-->
        </div>
    </div>
</section>
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
                            <!-- <h1 class="fw-700 fs-20 fs-md-24 text-dark text-center mb-3 mt-5">{{ translate('Start selling on Jaawal today')}}</h1> -->
                            <form id="signUpForm" action="#!">
                                <div class="fw-700 fs-20 fs-md-24 mb-5 text-center">{{ translate('Jawwal Selling  Hub Setup')}}</div>
                                <!-- start step indicators -->
                                <div class="form-header d-flex mb-5">
                                    <!-- <span class="stepIndicator">{{ translate('Business Information')}} </span> -->
                                    <!-- <span class="stepIndicator"> {{ translate('Legal Information')}}</span> -->
                                    <span class="stepIndicator">{{ translate('Bank Account& Address')}}</span>
                                </div>
                                <!-- end step indicators -->
                               
                                
                                    
                                    
                               
                            
                                <!-- step three -->
                                <div class="step">
                                    <h2 class="text-center mb-4"></h2>
                                    <div class="fw-700 fs-16 fs-md-24 mb-5 text-center">
                                         {{ translate('Bank Account  & Address')}}
                                    </div>
                                    <p class="text-center mb-4"> {{ translate('Basic information like your name, email, region and coverage')}}</p>

                                   
                                    <div class="form_group mt-3">
                                        <label for="text" class="fs-12 fw-500 text-secondary">{{  translate('Select Bank') }}</label>
                                        <select class="form-control form-control-sm aiz-selectpicker rounded-0" data-placeholder=" Select Bank"  id="multiple-select-field" name="bank" multiple>
                                            <option value="">{{ translate('Saudi Investment Bank')}}</option>
                                            <option value="1" @isset($bank) @if ($bank == '1') selected @endif @endisset >{{ translate('Riyad Bank')}}</option>
                                            <option value="1" @isset($bank) @if ($bank == '2') selected @endif @endisset>{{ translate('Al Rajhi Bank')}}</option>
                                            <option value="1" @isset($bank) @if ($bank == '3') selected @endif @endisset>{{ translate('Arab National Bank')}}</option>
                                            <option value="1" @isset($bank) @if (bank == '4') selected @endif @endisset>{{ translate('Bank AlBilad')}}</option>
                                            <option value="1" @isset($bank) @if ($bank == '5') selected @endif @endisset>{{ translate('Saudi National Bank')}}</option>
                                            
                                            
                                        </select>
                                    
                                    </div>
                                        <!--<div class=" row">
                                            <div class="col-md-6">
                                                <div class="border">
                                                    <div class="form-check">
                                                        <div class="card border my-2 mx-2"style="min-height: 30px; width: 30px!important;">
                                                        <i class="las la-trash"></i>

                                                        </div>
                                                        <label class="aiz-checkbox">test</label>
                                                    </div>
                                                   
                                                    <div class="form-group">
                                                        <div class="aiz-checkbox-inline px-3 py-3">
                                                            <label class="aiz-checkbox">
                                                                <input type="checkbox" class="check-all">
                                                                <span class="aiz-square-check"></span>
                                                                Grains & Macaroni & condiments
                                                            </label><br>
                                                            <label class="aiz-checkbox mt-2">
                                                                <input type="checkbox" class="check-all">
                                                                <span class="aiz-square-check"></span>
                                                                Beverages
                                                            </label><br>
                                                            <label class="aiz-checkbox mt-2">
                                                                <input type="checkbox" class="check-all">
                                                                <span class="aiz-square-check"></span>
                                                                Dairy
                                                            </label><br>
                                                            <label class="aiz-checkbox mt-2">
                                                                <input type="checkbox" class="check-all">
                                                                <span class="aiz-square-check"></span>
                                                                Snacks
                                                            </label><br>
                                                            <label class="aiz-checkbox mt-2">
                                                                <input type="checkbox" class="check-all">
                                                                <span class="aiz-square-check"></span>
                                                                canned and Sauces
                                                            </label><br>
                                                            <label class="aiz-checkbox mt-2">
                                                                <input type="checkbox" class="check-all">
                                                                <span class="aiz-square-check"></span>
                                                                Water
                                                            </label><br>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>-->
                                        
                                </div>
                            
                                <!-- start previous / next buttons -->
                                <div class="form-footer d-flex">
                                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">{{ translate('Previous')}}</button>
                                    <button type="button" id="nextBtn" onclick="nextPrev(1)">{{ translate('Next')}}</button>
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
    $(document).ready(function(){
        $("#shop").on("submit", function(evt)
        {
            var response = grecaptcha.getResponse();
            if(response.length == 0)
            {
            //reCaptcha not verified
                alert("please verify you are humann!");
                evt.preventDefault();
                return false;
            }
            //captcha verified
            //do the rest of your validations here
            $("#reg-form").submit();
        });
    });
</script>
<script>var currentTab = 0; // Current tab is set to be the first tab (0)
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
          var x, y, i, valid = true;
          x = document.getElementsByClassName("step");
          y = x[currentTab].getElementsByTagName("input");
          // A loop that checks every input field in the current tab:
          for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
              // add an "invalid" class to the field:
              y[i].className += " invalid";
              // and set the current valid status to false
              valid = false;
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
         $( '#multiple-select-field' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
            closeOnSelect: false,
        } );
        </script>
        
@endsection
