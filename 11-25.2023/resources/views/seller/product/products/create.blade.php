@extends('seller.layouts.app')

@section('panel_content')
    <div class="aiz-titlebar mt-2 mb-4">
        <div class="row align-items-center">
            <div class="col-md-12">
                <h1 class="h3 text-center">{{ translate('Select From Admin Catelogue') }}</h1>
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
                    <form action="{{route('seller.products.create')}}" method="GET">
                        <div class="input-group mb-3">
                          <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Product Name / SKU">
                          <button type="submit" class="btn btn-primary btn-sm">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table aiz-table mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th width="30%">{{ translate('Name')}}</th>
                        <th data-breakpoints="md">{{ translate('Category')}}</th>
                        <th data-breakpoints="md" class="text-right">{{ translate('Options')}}</th>
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
                            <td class="text-right">
                                <form action="{{route('seller.products.store')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}" />
                                    @if(in_array( $product->id, $seller_products_ids))
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Sure to remove this product?')"><i class="las la-trash"></i></button>
                                    @else
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#productModal{{$key}}" class="btn btn-primary btn-sm"><i class="las la-plus"></i></a>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="productModal{{$key}}" data-backdrop="static">
                                      <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Add Product</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
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

                                            <!-- Admin create product copy code -->
                                            <div class="card">

                                            <div class="card-header">

                                                <h5 class="mb-0 h6">{{translate('Product Variation')}}</h5>

                                            </div>

                                            <div class="card-body">

                                                <div class="form-group row gutters-5">

                                                    <div class="col-md-3">

                                                        <input type="text" class="form-control" value="{{translate('Colors')}}" >

                                                    </div>

                                                    <div class="col-md-8">

                                                        <select class="form-control aiz-selectpicker" data-live-search="true" data-selected-text-format="count" name="colors[]" id="colors" multiple disabled>

                                                            @foreach (\App\Models\Color::orderBy('name', 'asc')->get() as $key => $color)

                                                            <option  value="{{ $color->code }}" data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:{{ $color->code }}'></span><span>{{ $color->name }}</span></span>"></option>

                                                            @endforeach

                                                        </select>

                                                    </div>

                                                    <div class="col-md-1">

                                                        <label class="aiz-switch aiz-switch-success mb-0">

                                                            <input value="1" type="checkbox" name="colors_active">

                                                            <span></span>

                                                        </label>

                                                    </div>

                                                </div>



                                                <div class="form-group row gutters-5">

                                                    <div class="col-md-3">

                                                        <input type="text" class="form-control" value="{{translate('Attributes')}}" disabled>

                                                    </div>

                                                    <div class="col-md-8">

                                                        <select name="choice_attributes[]" id="choice_attributes" class="form-control aiz-selectpicker" data-selected-text-format="count" data-live-search="true" multiple data-placeholder="{{ translate('Choose Attributes') }}">

                                                            @foreach (\App\Models\Attribute::all() as $key => $attribute)

                                                            <option value="{{ $attribute->id }}">{{ $attribute->getTranslation('name') }}</option>

                                                            @endforeach

                                                        </select>

                                                    </div>

                                                </div>

                                                <div>

                                                    <p>{{ translate('Choose the attributes of this product and then input values of each attribute') }}</p>

                                                    <br>

                                                </div>



                                                <div class="customer_choice_options" id="customer_choice_options">



                                                </div>

                                            </div>

                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Add</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    @endif
                                </form>
                              </a>
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
