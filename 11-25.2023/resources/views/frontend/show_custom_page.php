@extends('frontend.layouts.app')

@section('content')
            <!-- Banner half width -->
            <section class="container  mb-3 mt-3">
                <div class="row gutters-16">   
                    <div class="col-md-6 mb-3 mb-md-0">
                        <div class="w-100">
                            <img class="d-block lazyload h-100 img-fit" 
                                src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" 
                                data-src="{{ uploaded_asset($banner) }}" alt="{{ env('APP_NAME') }} offer">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3 mb-md-0">
                        <div class="w-100">
                            <img class="d-block lazyload h-100 img-fit" 
                                src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" 
                                data-src="{{ uploaded_asset($banner) }}" alt="{{ env('APP_NAME') }} offer">
                        </div>
                    </div>
                   
                </div>
            </section>
    

@endsection

