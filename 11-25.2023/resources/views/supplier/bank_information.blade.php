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
                            <form id="signUpForm" action="{{route('supplier.bank-information.submit')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="fw-700 fs-20 fs-md-24 mb-5 text-center">{{ translate('Jawwal Selling  Hub Setup')}}</div>
                                    <div class="form-header d-flex mb-5">

                                        <span  class="stepIndicatorr">{{ translate('Business Information') }}</span>

                                        <span class="stepIndicatorr">{{ translate('Legal Information') }} </span>

                                        <span class="stepIndicatorr"> {{ translate('Bank Account & Address') }}</span>

                                    </div>
                               
                                <div>
                                    <h2 class="text-center mb-4"></h2>
                                    <div class="fw-700 fs-16 fs-md-24 mb-5 text-center">
                                         <!-- {{ translate('Bank Account & Address')}} -->
                                    </div>
                                   
                                    <div class="form_group mt-3">
                                        <label for="text" class="fs-12 fw-500 text-secondary">{{  translate('Select Bank') }}</label>
                                        <select name="bank_name" class="form-control form-control-sm aiz-selectpicker rounded-0">
                                            <option value="Saudi Investment Bank" {{old('bank_name') == 'Saudi Investment Bank' ? 'selected' : ''}}>{{ translate('Saudi Investment Bank')}}</option>
                                            <option value="Riyad Bank" {{old('bank_name') == 'Riyad Bank' ? 'selected' : ''}}>{{ translate('Riyad Bank')}}</option>
                                            <option value="Al Rajhi Bank" {{old('bank_name') == 'Al Rajhi Bank' ? 'selected' : ''}}>{{ translate('Al Rajhi Bank')}}</option>
                                            <option value="Al Rajhi Bank" {{old('bank_name') == 'Al Rajhi Bank' ? 'selected' : ''}}>{{ translate('Arab National Bank')}}</option>
                                            <option value="Bank AlBilad" {{old('bank_name') == 'Bank AlBilad' ? 'selected' : ''}}>{{ translate('Bank AlBilad')}}</option>
                                            <option value="Saudi National Bank" {{old('bank_name') == 'Saudi National Bank' ? 'selected' : ''}}>{{ translate('Saudi National Bank')}}</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form_group mt-3">
                                        <label for="text" class="fs-12 fw-500 text-secondary">{{  translate('Bank Account Name') }}</label>
                                        <input type="text" class="form-control" name="bank_acc_name" value="{{old('bank_acc_name')}}" />
                                        
                                        @error('bank_acc_name')
                                            <p class="mt-1 text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    
                                    <div class="form_group mt-3">
                                        <label for="text" class="fs-12 fw-500 text-secondary">{{  translate('Bank Account Number') }}</label>
                                        <input type="text" class="form-control" name="bank_acc_number" value="{{old('bank_acc_number')}}" />
                                          @error('bank_acc_number')
                                            <p class="mt-1 text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    
                                    <div class="form_group mt-3">
                                        <label for="text" class="fs-12 fw-500 text-secondary">{{  translate('Bank Ceritificate Pdf') }}</label>
                                        <input type="file" class="form-control-file" name="bank_certificate_pdf" />
                                          @error('bank_certificate_pdf')
                                            <p class="mt-1 text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    
                                        
                                </div>
                            
                                <div class="mt-3">
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

