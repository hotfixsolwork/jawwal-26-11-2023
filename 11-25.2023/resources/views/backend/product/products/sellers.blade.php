@extends('backend.layouts.app')

@section('content')

@php
    CoreComponentRepository::instantiateShopRepository();
    CoreComponentRepository::initializeCache();
@endphp

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-auto">
            <h1 class="h3">{{translate('Product Sellers')}}</h1>
        </div>
    </div>
</div>
<br>

<div class="card">
    <form class="" id="sort_products" action="" method="GET">
        <div class="card-header row gutters-5">
            <div class="col">
                <h5 class="mb-md-0 h6">{{ translate('Product Seller') }}</h5>
            </div>
        </div>
    
        <div class="card-body">
            <table class="table aiz-table mb-0">
                <thead>
                  <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($sellers as $key => $seller)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$seller->name}}</td>
                        <td>{{$seller->email}}</td>
                        <td>{{$seller->phone ?? 'N/A'}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="aiz-pagination">
                {{$sellers->links()}}
            </div>
        </div>
    </form>
</div>

@endsection

