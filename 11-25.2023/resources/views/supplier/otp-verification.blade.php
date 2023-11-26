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
                                <h1 class="fw-700 fs-20 fs-md-24 text-dark text-center mb-3 mt-5">
                                    {{ translate('Start selling on Jaawal today') }}</h1>
                                <form id="shop"action="{{ route('supplier.otp.verify') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="bg-white text-center border-0 mb-1">
                                        <div class="fs-20 fw-800 px-5 mt-4 mb-2">
                                            {{ translate('Verification Code') }}
                                        </div>
                                        <div class="fs-14 fw-500 px-5 mb-5 m ">
                                            <?php
                                            //  $phone  = $newUser->phone;
                                            $email = $newUser->email;
                                            ?>
                                            {{ translate('Enter the code we just sent you on ' . $email) }}
                                        </div>
                                        @if (session()->has('locale') && session('locale') == 'en')
                                            <div id="otp"
                                                class="inputs d-flex flex-row justify-content-center mt-5 px-5">
                                                <input class="m-2 text-center form-control rounded" name="otp[]"
                                                    type="text" id="first" maxlength="1" />
                                                <input class="m-2 text-center form-control rounded" name="otp[]"
                                                    type="text" id="second" maxlength="1" />
                                                <input class="m-2 text-center form-control rounded" name="otp[]"
                                                    type="text" id="third" maxlength="1" />
                                                <input class="m-2 text-center form-control rounded" name="otp[]"
                                                    type="text" id="fourth" maxlength="1" />
                                            </div>
                                        @else
                                        <div id="otp"
                                                class="inputs d-flex flex-row justify-content-center mt-5 px-5">
                                                <input class="m-2 text-center form-control rounded" name="otp[]"
                                                    type="text" id="first" maxlength="1" tabindex="4" />
                                                <input class="m-2 text-center form-control rounded" name="otp[]"
                                                    type="text" id="second" maxlength="1" tabindex="3" />
                                                <input class="m-2 text-center form-control rounded" name="otp[]"
                                                    type="text" id="third" maxlength="1" tabindex="2" />
                                                <input class="m-2 text-center form-control rounded" name="otp[]"
                                                    type="text" id="fourth" maxlength="1" tabindex="1" />
                                            </div>
                                        @endif

                                        <!--<div class="fs-14 fw-500 px-5 mb-5 pb-5 mt-5 text-center text-muted">-->
                                        <!--    {{ translate('verification code expires in 00.02.00') }}-->
                                        <!--</div>-->
                                    </div>
                                    <div class="mb-4 mt-4 mx-5 px-5">
                                        <button type="submit"
                                            class="btn btn-primary btn-block fw-700 fs-14 rounded-4">{{ translate('Verify') }}</button>
                                        <hr>
                                    </div>
                                </form>

                                <form action="{{ route('supplier.otp.resend') }}" method="POST">
                                    @csrf
                                    <div class="mb-4 mt-4 mx-5 px-5">
                                        <button type="submit"
                                            class="btn btn-soft-primary btn-block fw-700 fs-14 rounded-4">{{ translate('Resend Code') }}</button>
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
    <script type="text/javascript">
        $(document).ready(function() {
            @foreach ($errors->all() as $error)
                AIZ.plugins.notify('danger', "{{ $error }}");
            @endforeach
        });
    </script>
@endsection
