<!DOCTYPE html>

@if(\App\Models\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()->rtl == 1)

<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@else

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@endif

<head>



    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="app-url" content="{{ getBaseURL() }}">

    <meta name="file-base-url" content="{{ getFileBaseURL() }}">



    <title>@yield('meta_title', get_setting('website_name').' | '.get_setting('site_motto'))</title>



    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="robots" content="index, follow">

    <meta name="description" content="@yield('meta_description', get_setting('meta_description') )" />

    <meta name="keywords" content="@yield('meta_keywords', get_setting('meta_keywords') )">



    @yield('meta')



    @if(!isset($detailedProduct) && !isset($customer_product) && !isset($shop) && !isset($page) && !isset($blog))

        <!-- Schema.org markup for Google+ -->

        <meta itemprop="name" content="{{ get_setting('meta_title') }}">

        <meta itemprop="description" content="{{ get_setting('meta_description') }}">

        <meta itemprop="image" content="{{ uploaded_asset(get_setting('meta_image')) }}">



        <!-- Twitter Card data -->

        <meta name="twitter:card" content="product">

        <meta name="twitter:site" content="@publisher_handle">

        <meta name="twitter:title" content="{{ get_setting('meta_title') }}">

        <meta name="twitter:description" content="{{ get_setting('meta_description') }}">

        <meta name="twitter:creator" content="@author_handle">

        <meta name="twitter:image" content="{{ uploaded_asset(get_setting('meta_image')) }}">



        <!-- Open Graph data -->

        <meta property="og:title" content="{{ get_setting('meta_title') }}" />

        <meta property="og:type" content="website" />

        <meta property="og:url" content="{{ route('home') }}" />

        <meta property="og:image" content="{{ uploaded_asset(get_setting('meta_image')) }}" />

        <meta property="og:description" content="{{ get_setting('meta_description') }}" />

        <meta property="og:site_name" content="{{ env('APP_NAME') }}" />

        <meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}">

    @endif



    <!-- Favicon -->

    <link rel="icon" href="{{ uploaded_asset(get_setting('site_icon')) }}">



    <!-- Google Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">



    <!-- CSS Files -->

    <link rel="stylesheet" href="{{ static_asset('assets/css/vendors.css') }}">

    @if(\App\Models\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()->rtl == 1)

    <link rel="stylesheet" href="{{ static_asset('assets/css/bootstrap-rtl.min.css') }}">

    @endif

    <link rel="stylesheet" href="{{ static_asset('assets/css/aiz-core.css') }}">

    <link rel="stylesheet" href="{{ static_asset('assets/css/custom-style.css') }}">





    <script>

        var AIZ = AIZ || {};

        AIZ.local = {

            nothing_selected: '{!! translate('Nothing selected', null, true) !!}',

            nothing_found: '{!! translate('Nothing found', null, true) !!}',

            choose_file: '{{ translate('Choose file') }}',

            file_selected: '{{ translate('File selected') }}',

            files_selected: '{{ translate('Files selected') }}',

            add_more_files: '{{ translate('Add more files') }}',

            adding_more_files: '{{ translate('Adding more files') }}',

            drop_files_here_paste_or: '{{ translate('Drop files here, paste or') }}',

            browse: '{{ translate('Browse') }}',

            upload_complete: '{{ translate('Upload complete') }}',

            upload_paused: '{{ translate('Upload paused') }}',

            resume_upload: '{{ translate('Resume upload') }}',

            pause_upload: '{{ translate('Pause upload') }}',

            retry_upload: '{{ translate('Retry upload') }}',

            cancel_upload: '{{ translate('Cancel upload') }}',

            uploading: '{{ translate('Uploading') }}',

            processing: '{{ translate('Processing') }}',

            complete: '{{ translate('Complete') }}',

            file: '{{ translate('File') }}',

            files: '{{ translate('Files') }}',

        }

    </script>



    <style>

        :root{

            --blue: #3490f3;

            --gray: #9d9da6;

            --gray-dark: #8d8d8d;

            --secondary: #919199;

            --soft-secondary: rgba(145, 145, 153, 0.15);

            --success: #85b567;

            --soft-success: rgba(133, 181, 103, 0.15);

            --warning: #f3af3d;

            --soft-warning: rgba(243, 175, 61, 0.15);

            --light: #f5f5f5;

            --soft-light: #dfdfe6;

            --soft-white: #b5b5bf;

            --dark: #292933;

            --soft-dark: #1b1b28;

            --primary: {{ get_setting('base_color', '#d43533') }};

            --hov-primary: {{ get_setting('base_hov_color', '#9d1b1a') }};

            --soft-primary: {{ hex2rgba(get_setting('base_color','#d43533'),.15) }};

        }

        body{

            font-family: 'Public Sans', sans-serif;

            font-weight: 400;

        }

        

        .pagination .page-link,

        .page-item.disabled .page-link {

            min-width: 32px;

            min-height: 32px;

            line-height: 32px;

            text-align: center;

            padding: 0;

            border: 1px solid var(--soft-light);

            font-size: 0.875rem;

            border-radius: 0 !important;

            color: var(--dark);

        }

        .pagination .page-item {

            margin: 0 5px;

        }



        .aiz-carousel.coupon-slider .slick-track{

            margin-left: 0;

        }



        .form-control:focus {

            border-width: 2px !important;

        }

        .iti__flag-container {

            padding: 2px;

        }

        .modal-content {

            border: 0 !important;

            border-radius: 0 !important;

        }



        #map{

            width: 100%;

            height: 250px;

        }

        #edit_map{

            width: 100%;

            height: 250px;

        }



        .pac-container { z-index: 100000; }

        @media screen and (max-width: 531px) {

    .container { display: flex; flex-flow: column; }

    

   

    .two { order: 1; }

    .one { order: 2 }

}

    </style>



@if (get_setting('google_analytics') == 1)

    <!-- Global site tag (gtag.js) - Google Analytics -->

    <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('TRACKING_ID') }}"></script>



    <script>

        window.dataLayer = window.dataLayer || [];

        function gtag(){dataLayer.push(arguments);}

        gtag('js', new Date());

        gtag('config', '{{ env('TRACKING_ID') }}');

    </script>

@endif







@php

    echo get_setting('header_script');

@endphp



</head>

<body>

    <!-- aiz-main-wrapper -->

    <div class="aiz-main-wrapper d-flex flex-column bg-white">



        <!-- Header -->

        <header class="@if(get_setting('header_stikcy') == 'on') sticky-top @endif z-1020 bg-white">

            <!-- Search Bar -->

            <div class="position-relative logo-bar-area border-bottom border-md-nonea z-1025">

                <div class="container">

                    <div class="d-flex align-items-center">

                        <!-- top menu sidebar button -->

                        <button type="button" class="btn d-lg-none mr-3 mr-sm-4 p-0 active" data-toggle="class-toggle" data-target=".aiz-top-menu-sidebar">

                            <svg id="Component_43_1" data-name="Component 43 – 1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">

                                <rect id="Rectangle_19062" data-name="Rectangle 19062" width="16" height="2" transform="translate(0 7)" fill="#919199"/>

                                <rect id="Rectangle_19063" data-name="Rectangle 19063" width="16" height="2" fill="#919199"/>

                                <rect id="Rectangle_19064" data-name="Rectangle 19064" width="16" height="2" transform="translate(0 14)" fill="#919199"/>

                            </svg>

                            

                        </button>

                        

                    </div>

                </div>



            

            </div>



            <!-- Menu Bar -->

            <div class="d-none d-lg-block position-relative h-50px mt-2 mb-3">

                <div class="container h-100">

                    <div class="d-flex h-100">

                    

                        <div class="col-auto pl-0 pr-3 d-flex align-items-center">

                            <a href="{{ route('home') }}" class="d-block">
                                @if(get_setting('footer_logo') != null)
                                    <img class="lazyload" src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ uploaded_asset(get_setting('footer_logo')) }}" alt="{{ env('APP_NAME') }}" height="44">
                                @else
                                    <img class="lazyload" src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ static_asset('assets/img/logo.png') }}" alt="{{ env('APP_NAME') }}" height="44">
                                @endif
                            </a>

                        </div>

                        

                        <!-- Header Menus -->

                        <div class="ml-auto w-20 overflow-hidden">

                            <div class="d-flex align-items-center justify-content-center justify-content-xl-start h-100">

                                <ul class="list-inline mb-0 pl-0 hor-swipe c-scrollbar-light">

                                

                                    <li class="list-inline-item mr-0 animate-underline-white">

                                        <a href="{{route('home')}}" class="btn btn-primary buy-now fw-600 add-to-cart w-150px rounded-4">

                                        {{ translate('Vist Store') }}  

                                        </a>

                                    </li>

                                

                                </ul>

                            </div>
                            
                        </div>
                        <div class="ml-auto w-20 overflow-hidden">

                            <div class="d-flex align-items-center justify-content-center justify-content-xl-start h-100">

                            <ul class="list-inline mb-0 h-100 d-flex justify-content-end align-items-center">

                            @guest

                                @if (get_setting('vendor_system_activation') == 1)

       

                                    <li class="list-inline-item mr-0 pl-0 py-2">

                                        <a href="{{ route('supplier.registration') }}" class="text-secondary fs-12 pr-3 d-inline-block border-width-2 border-right">{{ translate('Become a Supplier !')}}</a>

                                    </li>

                                

                                    <li class="list-inline-item mr-0 pl-0 py-2">

                                        <a href="{{ route('user.login', ['type' => 'supplier']) }}" class="text-secondary fs-12 pl-3 d-inline-block">{{ translate('Login to Supplier')}}</a>

                                    </li>

                                @endif

                            @endguest

<!--@if (get_setting('helpline_number'))

   

    <li class="list-inline-item ml-3 pl-3 mr-0 pr-0">

        <a href="tel:{{ get_setting('helpline_number') }}" class="text-secondary fs-12 d-inline-block py-2">

            <span>{{ translate('Helpline')}}</span>  

            <span>{{ get_setting('helpline_number') }}</span>    

        </a>

    </li>

@endif-->

</ul>

                            </div>
                            
                        </div>

                    </div>

                </div>

            

            </div>

        </header>



        <!-- Top Menu Sidebar -->

        <div class="aiz-top-menu-sidebar collapse-sidebar-wrap sidebar-xl sidebar-left d-lg-none z-1035">

            <div class="overlay overlay-fixed dark c-pointer" data-toggle="class-toggle" data-target=".aiz-top-menu-sidebar" data-same=".hide-top-menu-bar"></div>

            <div class="collapse-sidebar c-scrollbar-light text-left">

                <button type="button" class="btn btn-sm p-4 hide-top-menu-bar" data-toggle="class-toggle" data-target=".aiz-top-menu-sidebar" >

                    <i class="las la-times la-2x text-primary"></i>

                </button>

                

                

                <ul class="mb-0 pl-3 pb-3 h-100">

                    

                    <li class="list-inline-item mr-0 animate-underline-white">

                            <a href="{{ get_setting('home') }}">

                                <button type="button" class="btn btn-primary buy-now fw-600 add-to-cart w-150px rounded-4">

                                  {{ translate('Vist Store') }} &nbsp &nbsp &nbsp <i class="la la-arrow-right"></i> 

                                </button>

                            </a>

                    </li>

                

                        

                        

                

                </ul>

                <br>

                <br>

            </div>

        </div>



        <!-- Header End -->

        <section class="container  mb-3 mt-5">

            <div class="row gutters-16">

               

                                 <div class="col-md-6 mb-3 mb-md-0 mt-5 pt-5 one">

                    <div class="w-100">

                        <h1 class="fs-60 fw-700" style="line-height: 50px; font-size: 2rem;">  {{ translate('The smartest way to growing trade wholesale')}}</h1>

                        <h5 style="line-height: 50px;  font-size: 1rem;"> {{ translate('jawwal is a B2B marketplace that connects small businesses with wholesalers and brands in one place to enabling a seamless, insightful and bold way of doing businesses')}}</h5>

                    </div>

                    <div class="d-flex mt-3 py-3">

                        <div class="">

                            <!--a href="{<{ get_setting('play_store_link') }}" target="_blank" class="mr-5 mb-3 overflow-hidden hov-scale-img">

                                <img class="lazyload has-transition" src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ static_asset('assets/img/play.png') }}" alt="{{ env('APP_NAME') }}" height="44">

                            </a>-->

                             <a href="{{ route('home') }}">

                                <button type="button" class="btn btn-primary buy-now fw-600 add-to-cart w-150px rounded-4">

                                  {{ translate('Vist Store') }} 

                                </button>

                            </a>

                        </div>

                        &nbsp &nbsp &nbsp <div class="">

                            <!--<a href="{{ get_setting('app_store_link') }}" target="_blank" class="overflow-hidden hov-scale-img">

                                <img class="lazyload has-transition" src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ static_asset('assets/img/app.png') }}" alt="{{ env('APP_NAME') }}" height="44">

                            </a>-->

                            <a href="{{ route('supplier.registration') }}">

                                <button type="button" class="btn btn-outline-primary buy-now fw-600 add-to-cart w-150px rounded-4">

                                  {{ translate('Sell on Jawwal') }}

                                </button>

                            </a>

                        </div>

                    </div>

                     <div class="d-flex mt-5 py-5">

                        <div class="">

                            <a href="{<{ get_setting('play_store_link') }}" target="_blank" class="mr-5 mb-3 overflow-hidden hov-scale-img">

                                <img class="lazyload has-transition" src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ static_asset('assets/img/play.png') }}" alt="{{ env('APP_NAME') }}" height="44">

                            </a>

                            

                        </div>

                        <div class="">

                            <a href="{{ get_setting('app_store_link') }}" target="_blank" class="overflow-hidden hov-scale-img">

                                <img class="lazyload has-transition" src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ static_asset('assets/img/app.png') }}" alt="{{ env('APP_NAME') }}" height="44">

                            </a>

                            

                        </div>

                    </div>

                </div>

                <div class="col-md-6 mb-3 mb-md-0 two">

                    <div class="w-100">

                        <img class="d-block lazyload h-100 img-fit" 

                            src="{{ static_asset('assets/img/home-2.png') }}" style="width: 80%">

                    </div>

                </div>





            </div>

            <div class="row gutters-16 mt-5">

               

                <div class="col-md-6 mb-3 mb-md-0 order-2 pt-5 mt-5">

                    <div class="w-100">

                        <h1 class="fs-60 fw-700" style="line-height: 50px; font-size: 2rem;"> {{ translate('The smartest way to growing trade wholesale')}}</h1>

                        

                        <h5 style="line-height: 50px; font-size: 1rem;"> {{ translate('jawwal is a B2B marketplace that connects small businesses with wholesalers and brands in one place to enabling a seamless, insightful and bold way of doing businesses')}}</h5>

                    </div>

                    

                </div>

                <div class="col-md-6 mb-3 mb-md-0">

                    <div class="w-100">

                        <img class="d-block lazyload h-100 img-fit" 

                            src="{{ static_asset('assets/img/home-2.png') }}" style="width: 80%">

                    </div>

                </div>

            </div>

            <div class="row gutters-16 mt-5">

               

                <div class="col-md-8 mb-3 mb-md-0 mt-5 mx-auto">

                    <div class="w-100">

                        <h1 class="fs-60 fw-700 text-center" style="line-height: 50px; font-size: 2rem;"> {{ translate('Trusted by leading brands')}}</h1>

                        

                        <h5 class="text-center" style="line-height: 50px; font-size: 1rem;"> {{ translate('choose from 30,000+ unique SKUs')}}</h5>

                    </div>

                    

                </div>

                <div class="col-md-8 mb-3 mb-md-0 mx-auto">

                    <div class="w-100">

                        <img class="d-block lazyload h-100 img-fit" 

                            src="{{ static_asset('assets/img/bb.jpg') }}" style="width: 100%">

                    </div>

                </div>

            </div>

        </section>



       



    </div>



    <!-- SCRIPTS -->

    <script src="{{ static_asset('assets/js/vendors.js') }}"></script>

    <script src="{{ static_asset('assets/js/aiz-core.js') }}"></script>

    <script>

        $(document).ready(function() {

            $('.category-nav-element').each(function(i, el) {

                $(el).on('mouseover', function(){

                    if(!$(el).find('.sub-cat-menu').hasClass('loaded')){

                        $.post('{{ route('category.elements') }}', {_token: AIZ.data.csrf, id:$(el).data('id')}, function(data){

                            $(el).find('.sub-cat-menu').addClass('loaded').html(data);

                        });

                    }

                });

            });



            if ($('#lang-change').length > 0) {

                $('#lang-change .dropdown-menu a').each(function() {

                    $(this).on('click', function(e){

                        e.preventDefault();

                        var $this = $(this);

                        var locale = $this.data('flag');

                        $.post('{{ route('language.change') }}',{_token: AIZ.data.csrf, locale:locale}, function(data){

                            location.reload();

                        });



                    });

                });

            }



           

        });



       





        $(".aiz-user-top-menu").on("mouseover", function (event) {

            $(".hover-user-top-menu").addClass('active');

        })

        .on("mouseout", function (event) {

            $(".hover-user-top-menu").removeClass('active');

        });



        $(document).on("click", function(event){

            var $trigger = $("#category-menu-bar");

            if($trigger !== event.target && !$trigger.has(event.target).length){

                $("#click-category-menu").slideUp("fast");;

                $("#category-menu-bar-icon").removeClass('show');

            }   

        });



       



    

       



   



</body>

</html>

