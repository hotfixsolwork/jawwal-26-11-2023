@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class=" align-items-center">
        <h1 class="h3">{{translate('Wallet Transaction Report')}}</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card">
            <form action="{{ route('wallet-history.index') }}" method="GET">
                <div class="card-header row gutters-5">
                    <!--<div class="col text-center text-md-left">-->
                        <!--<h5 class="mb-md-0 h6">{{ translate('Wallet Transaction') }}</h5>-->
                    <!--</div>-->
                    {{--@if(Auth::user()->user_type != 'seller')--}}
                    <div class="col-md-3 ml-auto">
                        <select id="demo-ease" class="form-control form-control-sm aiz-selectpicker mb-2 mb-md-0" name="user_id">
                            <option value="">{{ translate('Choose User') }}</option>
                            @foreach ($users_with_wallet as $key => $user)
                                <option value="{{ $user->id }}" @if($user->id == $user_id) selected @endif >
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                     {{--@endif--}}
                     
                     <div class="col-md-3 ml-auto">
                        <select class="form-control form-control-sm aiz-selectpicker mb-2 mb-md-0" name="wallet_status">
                            <option value="">All</option>
                            <option value="1" {{ $wallet_status == 1 ? 'selected' : ''}}>Approved</option>
                            <option value="0" {{ $wallet_status == 0 ? 'selected' : ''}}>Rejected</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-0">
                            <input type="text" class="form-control form-control-sm aiz-date-range" id="search" name="date_range"@isset($date_range) value="{{ $date_range }}" @endisset placeholder="{{ translate('Daterange') }}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-md btn-primary" type="submit">
                            {{ translate('Filter') }}
                        </button>
                    </div>
                </div>
            </form>
            <div class="card-body">

                <table class="table aiz-table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ translate('Customer')}}</th>
                            <th>{{  translate('Date') }}</th>
                            <th>{{ translate('Amount')}}</th>
                            <th data-breakpoints="lg" class="text-right">{{ translate('Bank Name')}}</th>
                            <th data-breakpoints="lg" class="text-right">{{ translate('Approval')}}</th>
                            <th data-breakpoints="lg" class="text-right">Deposit Slip</th>
                            <th data-breakpoints="lg" class="text-right">Approve</th>
                            <th data-breakpoints="lg" class="text-right">Reject</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wallets as $key => $wallet)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                @if ($wallet->user != null)
                                    <td>{{ $wallet->user->name }}</td>
                                @else
                                    <td>{{ translate('User Not found') }}</td>
                                @endif
                                <td>{{ date('d-m-Y', strtotime($wallet->created_at)) }}</td>
                                <td>{{ single_price($wallet->amount) }}</td>
                                <td>{{ ucfirst(str_replace('_', ' ', $wallet ->bank_name)) }}</td>
                                <td class="">
                                    @if ($wallet->status==0)
                                        <span class="badge badge-inline badge-info">{{translate('Pending')}}</span>
                                    @elseif($wallet->status==1)
                                        <span class="badge badge-inline badge-success">{{translate('Approved')}}</span>
                                    @elseif($wallet->status==2)
                                        <span class="badge badge-inline badge-danger">{{translate('Rejected')}}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{asset('public/uploads/deposit_slip/'.$wallet->deposit_slip)}}"  target="_blank">View Deposip Slip</a>
                                </td>
                                
                                @if($wallet->status == 0)
                                <td>
                                    <form action="{{route('wallet.request.approve')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="wallet_id" value="{{$wallet->id}}" />
                                        <button type="submit" onclick="return confirm('Sure to approve this depoist ?')" class="btn btn-success btn-sm">Approve</button>
                                    </form>
                                </td>
                                @else
                                    <td>---</td>
                                @endif
                                
                                
                                 @if($wallet->status == 0)
                                 <td>
                                    <form action="{{route('wallet.request.reject')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="wallet_id" value="{{$wallet->id}}" />
                                        <button type="submit" onclick="return confirm('Sure to reject this depoist ?')" class="btn btn-danger btn-sm">Reject</button>
                                    </form>
                                </td>
                                @else
                                 <td>---</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="aiz-pagination mt-4">
                    {{ $wallets->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection