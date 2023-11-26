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
                                <div class="form-header d-flex mb-5">
                                    <span class="stepIndicator">{{ translate('Bank Account & Address')}}</span>
                                </div>
                               
                                <div>
                                    <h2 class="text-center mb-4"></h2>
                                    <div class="fw-700 fs-16 fs-md-24 mb-5 text-center">
                                         {{ translate('Bank Account & Address')}}
                                    </div>
                                   
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
                                        
                                </div>
                            
                                <div class="form-footer d-flex">
                                    <button type="submit" class="btn btn-primary btn-block">{{ translate('Submit')}}</button>
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

@endsection
