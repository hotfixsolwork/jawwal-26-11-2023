@extends('seller.layouts.app')

@section('panel_content')
    <div class="aiz-titlebar mt-2 mb-4">
        <div class="row align-items-center">
            <div class="col-md-12">
                <h1 class="h3 text-center">{{ translate('Your Selected Products') }}</h1>
            </div>
        </div>
    </div>

    <!-- Error Meassages -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-end">
                <div class="col-md-4">
                    <form action="{{route('seller.products')}}" method="GET">
                        <div class="input-group mb-3">
                          <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Product Name">
                          <button type="submit" class="btn btn-primary btn-sm">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table aiz-table mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th data-breakpoints="md">{{ translate('Name')}}</th>
                        <th data-breakpoints="md">{{ translate('Category')}}</th>
                        <th data-breakpoints="md">{{ translate('Price')}}</th>
                        <th>Action</th>
                    </tr>
                </thead>
    
                <tbody>
                    @foreach ($products as $key => $product)
                        <?php 
                            $supplier_product = \DB::table('seller_products')->where('seller_id', auth()->id())->where('product_id', $product->id)->first();
                        ?>
                        <tr>
                            <td>{{ ($key+1) + ($products->currentPage() - 1)*$products->perPage() }}</td>
                            <td>
                                <a href="{{ route('product', $product->slug) }}" target="_blank" class="text-reset">
                                    {{ $product->getTranslation('name') }}
                                </a>
                            </td>
                            <td>
                                @if ($product->category != null)
                                    {{ $product->category->getTranslation('name') }}
                                @endif
                            </td>
                            <td>{{ $supplier_product->price ?? $ $supplier_product->unit_price}}</td>
                            <td>
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#productModal{{$key}}" class="btn btn-primary btn-sm"><i class="las la-edit"></i></a>
                                    <!-- Modal -->
                                <div class="modal fade" id="productModal{{$key}}" data-backdrop="static">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Edit Product</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                            <form action="{{route('seller.products.seller.udpate')}}" id="update-seller-product-form" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{$product->id}}" />
                                                <div class="form-group text-left">
                                                    <label>Price</label>
                                                    <input type="text" name="price" class="form-control" value="{{@$supplier_product->price}}" />
                                                </div>
                                                <div class="form-group text-left">
                                                    <label>Warrenty</label>
                                                    <input type="text" name="warrenty" class="form-control"  value="{{@$supplier_product->warrenty}}" />
                                                </div>
                                                <div class="form-group text-left">
                                                    <label>Version</label>
                                                    <input type="text" name="version" class="form-control" value="{{@$supplier_product->version}}" />
                                                </div>
                                            </form>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" form="update-seller-product-form" class="btn btn-primary">Update</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="aiz-pagination">
                {{ $products->links() }}
          	</div>
        </div>
    </div>
@endsection
