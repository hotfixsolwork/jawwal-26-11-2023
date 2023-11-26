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

                                <form action="{{ route('supplier.business-information.submit') }}" method="POST" id="signUpForm"

                                    enctype="multipart/form-data">

                                    @csrf

                                    <div class="fw-700 fs-20 fs-md-24 mb-5 text-center">

                                        {{ translate('Jawwal Selling  Hub Setup') }}</div>

                                    <!-- start step indicators -->

                                    <div class="form-header d-flex mb-5">

                                        <span  class="stepIndicatorr">{{ translate('Business Information') }}</span>

                                        <span class="stepIndicator">{{ translate('Legal Information') }} </span>

                                        <span class="stepIndicator"> {{ translate('Bank Account & Address') }}</span>

                                    </div>

                                    <!-- end step indicators -->



                                    <div class="">

                                        <h2 class="text-center mb-4"></h2>

                                        <div class="mt-5">

                                        <div class="row">

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label for="text"

                                                        class="fs-12 fw-500 text-secondary">{{ translate('Company Name (EN)') }}</label>

                                                    <input type="text"

                                                        class="form-control rounded-0 {{ $errors->has('company_name') ? ' is-invalid' : '' }}"

                                                        placeholder="{{ translate('Enter Display Name') }}"

                                                        name="company_name" id="company_name" value="{{ old('company_name') }}">

                                                </div>

                                                @error('company_name')

                                                    <p class="text-danger">{{$message}}</p>

                                                @enderror

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label for="text"

                                                        class="fs-12 fw-500 text-secondary">{{ translate('Company Name (AR)') }}</label>

                                                    <input type="text"

                                                        class="form-control rounded-0 {{ $errors->has('company_name') ? ' is-invalid' : '' }}"

                                                        placeholder="{{ translate('Enter Display Name') }}"

                                                        name="company_name_ar" id="company_name_ar" value="{{old('company_name_ar')}}">

                                                </div>

                                                @error('company_name_ar')

                                                    <p class="text-danger">{{$message}}</p>

                                                @enderror

                                            </div>

                                            <div class="col-md-12">

                                                <div class="form-group">

                                                    <label for="text"  class="fs-12 fw-500 text-secondary">{{ translate('Company Type') }}</label>

                                                    <select name="company_type" class="form-control">

                                                        <option value="distributer"  {{old('company_type') == 'distributer' ? 'selected' : ''}}>{{translate ('Distributer') }}</option>

                                                        <option value="manufacturer" {{old('company_type') == 'manufacturer' ? 'selected' : ''}}>{{translate ('Manufacturer')}}</option>

                                                        <option value="Wholesaler"   {{old('company_type') == 'Wholesaler' ? 'selected' : ''}}>{{translate ('Wholesaler') }}</option>

                                                    </select>    

                                                </div>

                                                @error('company_type')

                                                    <p class="text-danger">{{$message}}</p>

                                                @enderror

                                            </div>

                                            

                                            <div class="col-md-12">

                                                <div class="form-group">

                                                    <label for="text"  class="fs-12 fw-500 text-secondary">{{ translate('Country') }}</label>

                                                    <select name="country" class="form-control">

                                                        @foreach($countries as $country)

                                                            <option value="{{$country->id}}" class="{{$country->id}}" {{old('country') == $country->id ? 'selected' : ''}}>{{$country->name}}</option>

                                                        @endforeach

                                                    </select>    

                                                </div>

                                               @error('country')

                                                    <p class="text-danger">{{$message}}</p>

                                                @enderror

                                            </div>

                                            

                                            <div class="col-md-12">

                                                <div class="form-group">

                                                    <label for="text"  class="fs-12 fw-500 text-secondary">{{ translate('Headquarter City') }}</label>

                                                    <select name="headquarter_city" class="form-control">

                                                        @foreach($headquarterCities as $city)

                                                            <option value="{{$city->id}}" class="{{$city->id}}" {{old('headquarter_city') == $city->id ? 'selected' : ''}}>{{$city->name}}</option>

                                                        @endforeach

                                                    </select>    

                                                </div>

                                                

                                                 @error('headquarter_city')

                                                    <p class="text-danger">{{$message}}</p>

                                                @enderror

                                            </div>

                                            

                                             <div class="col-md-12">

                                                <div class="form-group">

                                                    <label for="text"  class="fs-12 fw-500 text-secondary">{{ translate('Branch Cities') }}</label>

                                                    <select name="branch_cities[]" class="form-control" multiple>

                                                        @foreach($branchCities as $city)

                                                            <option value="{{$city->id}}" class="{{$city->id}}" {{ in_array($city->id, old('branch_cities', [])) ? 'selected' : '' }}>{{$city->name}}</option>

                                                        @endforeach

                                                    </select>    

                                                </div>

                                                

                                                  @error('branch_cities')

                                                    <p class="text-danger">{{$message}}</p>

                                                @enderror

                                            </div>

                                            

                                            

                                        </div>

                                    </div>

                                    </div>

                                    

                                    <div class="mt-4">

                                        <button type="submit" class="btn btn-primary btn-block">{{ translate('Next') }}</button>

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

