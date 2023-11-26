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
                           
                            <form id="signUpForm" action="{{route('seller.legal-information.submit')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="fw-700 fs-20 fs-md-24 mb-5 text-center">{{ translate('Jawwal Selling  Hub Setup')}}</div>
                            
                                    <div class="form-header d-flex mb-5">

                                        <span  class="stepIndicatorr">{{ translate('Business Information') }}</span>

                                        <span class="stepIndicatorr">{{ translate('Legal Information') }} </span>

                                        <span class="stepIndicator"> {{ translate('Bank Account & Address') }}</span>

                                    </div>
                                
                                <div>
                                    <div class="form-group mt-3">
                                        <label for="" class="fs-12 fw-500 text-secondary">{{  translate('Licence Number') }}</label>
                                        <input type="text" name="licence_number" required value="{{old('licence_number')}}" class="form-control rounded-0 {{ $errors->has('licence_number') ? ' is-invalid' : '' }}" placeholder="{{ translate('Enter Licence Number')}}" name="tax_registration_number" id="tax_registration_number">
                                    </div>
                                    @error('licence_number')
                                        <p class="text-danger mt-1">{{$message}}</p>
                                    @enderror
                                    <div class="row">
                                        <!-- <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="text" class="fs-12 fw-500 text-secondary">{{  translate('Commerciel Licence issue Date') }}</label>
                                                <input type="date" name="licence_issue_date" required value="{{old('licence_issue_date')}}" class="form-control rounded-0 {{ $errors->has('company_name') ? ' is-invalid' : '' }}" placeholder="{{ translate('')}}" name="company_name" id="company_name">
                                            </div>
                                            @error('licence_issue_date')
                                                <p class="text-danger mt-1">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="text" class="fs-12 fw-500 text-secondary">{{  translate('Commerciel Licence Expiry Date') }}</label>
                                                <input type="date" name="licence_expiry_date" required value="{{old('licence_expiry_date')}}" class="form-control rounded-0 {{ $errors->has('company_name') ? ' is-invalid' : '' }}" placeholder="{{ translate('')}}" name="company_name" id="company_name">
                                            </div>
                                             @error('licence_expiry_date')
                                                <p class="text-danger mt-1">{{$message}}</p>
                                            @enderror
                                        </div> -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="text" class="fs-12 fw-500 text-secondary">{{ translate('Commerciel Licence issue Date') }}</label>
                                                <input type="date" name="licence_issue_date" required value="{{ old('licence_issue_date') }}" class="form-control rounded-0 {{ $errors->has('licence_issue_date') ? ' is-invalid' : '' }}" placeholder="{{ translate('') }}" id="licence_issue_date" min="{{ date('Y-m-d') }}">
                                            </div>
                                            @error('licence_issue_date')
                                                <p class="text-danger mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="text" class="fs-12 fw-500 text-secondary">{{ translate('Commerciel Licence Expiry Date') }}</label>
                                                <input type="date" name="licence_expiry_date" required value="{{ old('licence_expiry_date') }}" class="form-control rounded-0 {{ $errors->has('licence_expiry_date') ? ' is-invalid' : '' }}" placeholder="{{ translate('') }}" id="licence_expiry_date" min="{{ date('Y-m-d') }}">
                                            </div>
                                            @error('licence_expiry_date')
                                                <p class="text-danger mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>
                                    
                                    <div class="form-group mt-3">
                                        <label for="text" class="fs-12 fw-500 text-secondary">{{  translate('Tax Registration Number') }}</label>
                                        <input type="text" name="registration_number" required value="{{old('registration_number')}}" class="form-control rounded-0 {{ $errors->has('tax_registration_number') ? ' is-invalid' : '' }}" placeholder="{{ translate('Enter tax Registration Number')}}" name="tax_registration_number" id="tax_registration_number">
                                        @error('registration_number')
                                            <p class="text-danger mt-1">{{$message}}</p>
                                        @enderror
                                    </div>
                                    
                                    <div class="form_group mt-3">
                                        <label for="text" class="fs-12 fw-500 text-secondary">{{  translate('Upload Trade Licence Scan') }}</label>
                                        <div class="custom-file">
                                            <input type="file" name="licence_scan_img" class="form-control p-2" id="validatedCustomFile" required>
                                            <label class="" for="validatedCustomFile">{{ translate('Choose file...')}}</label>
                                            <div class="invalid-feedback">{{ translate('Example invalid custom file feedback')}}</div>
                                        </div>
                                           @error('licence_scan_img')
                                            <p class="text-danger mt-1">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form_group mt-3">
                                        <label for="text" neme="vat_proof_document" class="fs-12 fw-500 text-secondary">{{  translate('Upload Your VAT proof Document') }}</label>
                                        <div class="custom-file">
                                            <input type="file" name="vat_proof" class="form-control p-2" id="validatedCustomFile" required>
                                            <label class="" for="validatedCustomFile">{{  translate('Choose file...') }}</label>
                                            <div class="invalid-feedback">{{  translate('Example invalid custom file feedback') }}</div>
                                        </div> 
                                         @error('vat_proof')
                                            <p class="text-danger mt-1">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary d-block w-100 mt-3">{{ translate ('Submit') }}</button>
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
