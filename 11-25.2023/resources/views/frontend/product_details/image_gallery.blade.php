<div class="sticky-top z-3 row gutters-10">
    @if($detailedProduct->photos != null)
        @php
            $photos = explode(',', $detailedProduct->photos);
        @endphp
        <!-- Gallery Images -->
        <div class="col-md-12 ">
            <div class="mt-5 px-3">
                <div class="row">
                    <div class="col-md-6 col-12 col-xs-12 col-lg-6 col-xl-6">
                        <h1 class="mb-4 fs-16 fw-700 text-dark">
                         {{ $detailedProduct->getTranslation('name') }}
                        </h1>
                        <!-- Brand Logo & Name -->
                        @if ($detailedProduct->brand != null)
                            <div class="d-flex flex-wrap align-items-center mb-3">
                                <span class="text-secondary fs-14 fw-400 mr-0 w-45px">{{ translate('Brand') }}:</span><br>
                                <a href="{{ route('shop.visit', $detailedProduct->brand->slug) }}"
                                        class="text-resettext-primary fs-14 fw-500">{{ $detailedProduct->brand->name }}</a>
                            </div>
                        @endif
                        <!-- Estimate Shipping Time -->
                        @if ($detailedProduct->est_shipping_days)
                            <div class="fs-14 mt-1">
                                <small class="mr-1 opacity-50 fs-14">{{ translate('Estimate Shipping Time') }}:</small>
                                <span class="fw-500">{{ $detailedProduct->est_shipping_days }} {{ translate('Days') }}</span>
                            </div>
                        @endif
                        

                    </div>
                    <div class="col-md-6 col-12 col-xs-12 col-lg-6 col-xl-6">
                        @if (home_price($detailedProduct) != home_discounted_price($detailedProduct))
                            <div class="row no-gutters mb-3">
                                <div class="col-sm-12">
                                    <div class="text-secondary fs-14 fw-400">{{ translate('Price') }}</div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="d-flex align-items-center">
                                        @if(empty(request()->query('seller')))
                                            <!-- Discount Price -->
                                            <strong class="fs-16 fw-700 text-primary">
                                                {{ home_discounted_price($detailedProduct) }}
                                            </strong>
                                            <!-- Home Price -->
                                            <del class="fs-14 opacity-60 ml-2">
                                                {{ home_price($detailedProduct) }}
                                            </del>
                                            <!-- Unit -->
                                            @if ($detailedProduct->unit != null)
                                                <!-- <span class="opacity-70 ml-1">/{{ $detailedProduct->getTranslation('unit') }}</span> -->
                                            @endif
                                            <!-- Discount percentage -->
                                            @if (discount_in_percentage($detailedProduct) > 0)
                                                <span class="bg-primary ml-2 fs-11 fw-700 text-white w-35px text-center p-1"
                                                    style="padding-top:2px;padding-bottom:2px;">-{{ discount_in_percentage($detailedProduct) }}%</span>
                                            @endif
                                        @else
                                        <strong class="fs-16 fw-700 text-primary">
                                                {{ home_price($detailedProduct, true,  request('seller')) }}
                                        </strong>
                                        @endif
                                        <!-- Club Point -->
                                        <!-- @if (addon_is_activated('club_point') && $detailedProduct->earn_point > 0)
                                            <div class="ml-2 bg-warning d-flex justify-content-center align-items-center px-3 py-1" style="width: fit-content;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                    <g id="Group_23922" data-name="Group 23922" transform="translate(-973 -633)">
                                                    <circle id="Ellipse_39" data-name="Ellipse 39" cx="6" cy="6" r="6" transform="translate(973 633)" fill="#fff"/>
                                                    <g id="Group_23920" data-name="Group 23920" transform="translate(973 633)">
                                                        <path id="Path_28698" data-name="Path 28698" d="M7.667,3H4.333L3,5,6,9,9,5Z" transform="translate(0 0)" fill="#f3af3d"/>
                                                        <path id="Path_28699" data-name="Path 28699" d="M5.33,3h-1L3,5,6,9,4.331,5Z" transform="translate(0 0)" fill="#f3af3d" opacity="0.5"/>
                                                        <path id="Path_28700" data-name="Path 28700" d="M12.666,3h1L15,5,12,9l1.664-4Z" transform="translate(-5.995 0)" fill="#f3af3d"/>
                                                    </g>
                                                    </g>
                                                </svg>
                                                <small class="fs-11 fw-500 text-white ml-2">{{ translate('Club Point') }}: {{ $detailedProduct->earn_point }}</small>
                                            </div>
                                        @endif-->
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row no-gutters mb-3">
                                <div class="col-sm-12">
                                    <div class="text-secondary fs-14 fw-400">{{ translate('Price') }}</div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="d-flex align-items-center">
                                        <!-- Discount Price -->
                                        <strong class="fs-16 fw-700 text-primary">
                                            @if(empty(request('seller')))
                                            {{ home_discounted_price($detailedProduct) }}
                                            @else 
                                            {{ home_price($detailedProduct, true,  request('seller')) }}
                                            @endif
                                        </strong>
                                        <!-- Unit -->
                                        @if(empty(request('seller')))
                                            @if ($detailedProduct->unit != null)
                                                <!-- <span class="opacity-70">/{{ $detailedProduct->getTranslation('unit') }}</span> -->
                                            @endif
                                        @endif
                                        <!-- Club Point -->
                                        <!--@if (addon_is_activated('club_point') && $detailedProduct->earn_point > 0)
                                            <div class="ml-2 bg-warning d-flex justify-content-center align-items-center px-3 py-1" style="width: fit-content;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                    <g id="Group_23922" data-name="Group 23922" transform="translate(-973 -633)">
                                                    <circle id="Ellipse_39" data-name="Ellipse 39" cx="6" cy="6" r="6" transform="translate(973 633)" fill="#fff"/>
                                                    <g id="Group_23920" data-name="Group 23920" transform="translate(973 633)">
                                                        <path id="Path_28698" data-name="Path 28698" d="M7.667,3H4.333L3,5,6,9,9,5Z" transform="translate(0 0)" fill="#f3af3d"/>
                                                        <path id="Path_28699" data-name="Path 28699" d="M5.33,3h-1L3,5,6,9,4.331,5Z" transform="translate(0 0)" fill="#f3af3d" opacity="0.5"/>
                                                        <path id="Path_28700" data-name="Path 28700" d="M12.666,3h1L15,5,12,9l1.664-4Z" transform="translate(-5.995 0)" fill="#f3af3d"/>
                                                    </g>
                                                    </g>
                                                </svg>
                                                <small class="fs-11 fw-500 text-white ml-2">{{ translate('Club Point') }}: {{ $detailedProduct->earn_point }}</small>
                                            </div>
                                        @endif-->
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!-- Review -->
                            @if ($detailedProduct->auction_product != 1)
                                <div class="col-12">
                                    @php
                                        $total = 0;
                                        $total += $detailedProduct->reviews->count();
                                    @endphp
                                    <span class="rating rating-mr-1">
                                        {{ renderStarRating($detailedProduct->rating) }}
                                    </span>
                                    <span class="ml-1 opacity-50 fs-14">({{ $total }}
                                        {{ translate('reviews') }})</span>
                                </div>
                            @endif
                    </div>
                    
                </div>
            </div>

        
        <hr/>
        </div>
        
        <div class="col-12">
            <div class="aiz-carousel product-gallery arrow-inactive-transparent arrow-lg-none" data-nav-for='.product-gallery-thumb' data-fade='true' data-auto-height='true'  data-arrows='true'>

                @foreach ($photos as $key => $photo)
                    <div class="carousel-box img-zoom rounded-0">
                        <img class="img-fluid h-auto lazyload mx-auto"
                            src="{{ static_asset('assets/img/placeholder.jpg') }}"
                            data-src="{{ uploaded_asset($photo) }}"
                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                    </div>
                @endforeach

                @if ($detailedProduct->digital == 0)
                    @foreach ($detailedProduct->stocks as $key => $stock)
                        @if ($stock->image != null)
                            <div class="carousel-box img-zoom rounded-0">
                                <img class="img-fluid h-auto lazyload mx-auto"
                                    src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                    data-src="{{ uploaded_asset($stock->image) }}"
                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                            </div>
                        @endif
                    @endforeach
                @endif

            </div>
        </div>
        <!-- Thumbnail Images -->
        <div class="col-12 mt-3 mb-3 d-none d-lg-block">
            <div class="aiz-carousel product-gallery-thumb" data-items='7' data-nav-for='.product-gallery' data-focus-select='true' data-arrows='true' data-vertical='false' data-auto-height='true'>

                @foreach ($photos as $key => $photo)
                    <div class="carousel-box c-pointer rounded-0">
                        <img class="lazyload mw-100 size-60px mx-auto border p-1"
                            src="{{ static_asset('assets/img/placeholder.jpg') }}"
                            data-src="{{ uploaded_asset($photo) }}"
                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                    </div>
                @endforeach

                @if ($detailedProduct->digital == 0)
                    @foreach ($detailedProduct->stocks as $key => $stock)
                        @if ($stock->image != null)
                            <div class="carousel-box c-pointer rounded-0"
                                data-variation="{{ $stock->variant }}">
                                <img class="lazyload mw-100 size-60px mx-auto border p-1"
                                    src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                    data-src="{{ uploaded_asset($stock->image) }}"
                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>

    @endif
</div>