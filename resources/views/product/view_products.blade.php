@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @if (session()->has('message'))
                    <div class="row">
                        <div class="alert alert-success">
                            <p>{{ session()->get('message') }}</p>
                        </div>
                    </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">Products:</div>
                    @if (Auth::guest())
                        <div class="panel-body">
                            Please log in to view products
                        </div>
                    @else
                        <div class="panel-body">
                            <div class="row form-group">
                                <label class="col-form-label col-md-1">Search:</label>
                                <div class="col-md-10">
                                    <input name="search" type="text" class="form-control" value="" onkeyup="filterProducts(this)">
                                </div>
                            </div>
                            @foreach ($products as $product)
                                <div class="product-row row" style="padding:0 15px 0 15px;" data-name="{{ $product->product_name }}">
                                    <div class="col-md-12">
                                        <div class="well row" style="height: 100%">
                                            <div class="col-md-3" style="padding-left: 0;">
                                                <img src="{{ $product->img_url }}" alt="product image" style="max-width: 200px;">
                                            </div>
                                            <div class="col-md-7">
                                                <h3>{{$product->product_name}}</h3>
                                                <ul>
                                                    <li>Price: ${{$product->price}}</li>
                                                    <li>Quantity Left Instock: {{$product->product_total_quantity}}</li>
                                                </ul>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="{{ route('product.show', [$product->product_id]) }}">
                                                    <button class="btn btn-info">More Info</button>
                                                </a>
                                                <br><br>
                                                @if($product->product_total_quantity <= 0)
                                                    <button class="btn btn-disabled" disabled="">Out of stock</button>
                                                @else
                                                    <a href="{{ url('/cart/add', [$product->product_id]) }}">
                                                        <button class="btn btn-success">Add to Cart</button>
                                                    </a>
                                                @endif
                                                @if(Auth::user()->permissions)
                                                    <br><br>
                                                    <a href="{{ route('product.edit', [$product->product_id]) }}">
                                                        <button class="btn btn-warning">Edit Product</button>
                                                    </a>
                                                    <br><br>
                                                    <form action="{{ route('product.destroy', [$product->product_id]) }}"
                                                          method="post">
                                                        <input type="submit" class="btn btn-danger" value="Delete Product">
                                                        {{ method_field('DELETE') }}
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        function filterProducts(input) {
            var search = input.value.toLowerCase();

            var productRows = $('.product-row');

            if (search === '') {
                return productRows.show();
            }

            productRows.each(function () {
                var productName = $(this).data('name').toLowerCase();

                if (productName.indexOf(search) === -1) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        }
    </script>
@endsection
