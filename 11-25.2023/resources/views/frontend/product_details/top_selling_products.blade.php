<div class="bg-white border mt-4 mb-4">
    <div class="p-3 p-sm-4">
        <div class="fs-16 fw-700 mb-0">
          <span class="mr-4"> {{ translate('Top Selling Products') }}</span>
        </div>
    </div>
    <!--<div class="px-3 px-sm-4 pb-4">
        <ul class="list-group list-group-flush">
            @foreach (filter_products(\App\Models\Product::where('user_id', $detailedProduct->user_id)
                        ->orderBy('num_of_sale', 'desc'))->limit(6)->get() as $key => $top_product)
                <li class="py-3 px-0 list-group-item border-0">
                    <div class="row gutters-10 align-items-center hov-scale-img hov-shadow-md overflow-hidden has-transition">
                        <div class="col-xl-4 col-lg-6 col-4">
                          
                            <a href="{{ route('product', $top_product->slug) }}"
                                class="d-block text-reset">
                                <img class="img-fit lazyload h-80px h-md-150px h-lg-80px has-transition"
                                    src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                    data-src="{{ uploaded_asset($top_product->thumbnail_img) }}"
                                    alt="{{ $top_product->getTranslation('name') }}"
                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                            </a>
                        </div>
                        <div class="col text-left">
                           
                            <div class="d-lg-none d-xl-block mb-3">
                                <h4 class="fs-14 fw-400 text-truncate-2">
                                    <a href="{{ route('product', $top_product->slug) }}"
                                        class="d-block text-reset hov-text-primary">{{ $top_product->getTranslation('name') }}</a>
                                </h4>
                            </div>
                            <div class="">
                               
                                <span class="fs-14 fw-700 text-primary">{{ home_discounted_base_price($top_product) }}</span>
                                
                                @if(home_price($top_product) != home_discounted_price($top_product))
                                <del class="fs-14 fw-700 opacity-60 ml-1 ml-lg-0 ml-xl-1">
                                    {{ home_price($top_product) }}
                                </del>
                                @endif
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>-->
    <div class="px-4">
        <div class="aiz-carousel gutters-5 half-outside-arrow" data-items="5" data-xl-items="3"
            data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2"
            data-arrows='true' data-infinite='true'>
            @foreach (filter_products(\App\Models\Product::where('user_id', $detailedProduct->user_id)
                        ->orderBy('num_of_sale', 'desc'))->limit(10)->get() as $key => $top_product)
                <div class="carousel-box">
                    <div class="aiz-card-box hov-shadow-md my-2 has-transition hov-scale-img">
                        <div class="">
                            <a href="{{ route('product', $top_product->slug) }}"
                                class="d-block">
                                <img class="img-fit lazyload mx-auto h-140px h-md-190px has-transition"
                                    src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                    data-src="{{ uploaded_asset($top_product->thumbnail_img) }}"
                                    alt="{{ $top_product->getTranslation('name') }}"
                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                            </a>
                        </div>
                        <div class="p-md-3 p-2 text-center">
                            <h3 class="fw-400 fs-14 text-dark text-truncate-2 lh-1-4 mb-0 h-35px">
                                <a href="{{ route('product', $top_product->slug) }}"
                                    class="d-block text-reset hov-text-primary">{{ $top_product->getTranslation('name') }}</a>
                            </h3>
                            <div class="fs-14 mt-3">
                                <span class="fw-700 text-primary">{{ home_discounted_base_price($top_product) }}</span>
                                @if (home_base_price($top_product) != home_discounted_base_price($top_product))
                                    <del
                                        class="fw-700 opacity-60 ml-1">{{ home_base_price($top_product) }}</del>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>