@extends('frontend.layouts.app')



@section('content')

    <section class="gry-bg py-6">

        <div class="profile">

            <div class="container">

                <div class="row">

                    <div class="col-xl-6 col-lg-10 mx-auto">

                        <div class="card shadow-none rounded-0 border">

                            <div class="row">

                                <!-- Left Side -->

                                <div class="col-lg-12 col-md-7 p-4 p-lg-5">

                                    <div class="text-center">

                                        <h1 class="fs-20 fs-md-24 fw-700 text-primary">{{ translate('Registration Status !')}}</h1>

                                    </div>

                                    <div class="pt-3 pt-lg-4">

                                        @if($user->status == 0)

                                        <div class="alert alert-primary"><strong>{{ translate ('We are currently reviewing your registration and it is pending approval. You will receive a notification about the status of your registration, and in the meantime, you can check the progress by visiting this link.') }}</strong></div>

                                        @elseif($user->status == 1)

                                        <div class="alert alert-success"><strong>{{ translate ('Your registration is approved') }}</strong></div>

                                        @elseif($user->status == 2)

                                        <div class="alert alert-danger"><strong>{ {translate ('Your registration is rejected.') }}</strong></div>

                                        @endif

                                    </div>

                                </div>

                                

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



    </script>

@endsection

