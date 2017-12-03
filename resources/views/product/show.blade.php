@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $product->product_name }} details:</div>
                    @if (Auth::guest())
                        <div class="panel-body">
                            Please log in to view product details
                        </div>
                    @else
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="product_name" class="control-label">Product Name:</label>
                                </div>
                                <div class="col-md-6 {{ $errors->has('product_name') ? ' has-error' : '' }}">
                                    <input placeholder="Rigid 4000W Generator"
                                           name="product_name"
                                           class="form-control input-sm"
                                           value="{{ $product->product_name }}"
                                           disabled>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="category" class="control-label">Product Category:</label>
                                </div>
                                <div class="col-md-3 {{ $errors->has('category_id') ? ' has-error' : '' }}">
                                    <select name="category_id" class="form-control input-sm" disabled>
                                        <option value="">-- Select One --</option>
                                        @foreach ($categories as $category)
                                            @if ($product->category_id == $category->category_id)
                                                <option value="{{$category->category_id}}" selected>
                                                    {{$category->category_name}}
                                                </option>
                                            @else
                                                <option value="{{$category->category_id}}">
                                                    {{$category->category_name}}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="product_total_quantity" class="control-label">Product Total Quantity:</label>
                                </div>
                                <div class="col-md-2 {{ $errors->has('product_total_quantity') ? ' has-error' : '' }}">
                                    <input placeholder="250"
                                           name="product_total_quantity"
                                           class="form-control input-sm"
                                           value="{{ $product->product_total_quantity }}"
                                           disabled>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="product_sku" class="control-label">Product SKU #:</label>
                                </div>
                                <div class="col-md-2 {{ $errors->has('product_sku') ? ' has-error' : '' }}">
                                    <input placeholder="1001-123-456"
                                           name="product_sku"
                                           class="form-control input-sm"
                                           value="{{ $product->product_sku }}"
                                           disabled>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="product_price" class="control-label">Product Price:</label>
                                </div>
                                <div class="col-md-2 {{ $errors->has('price') ? ' has-error' : '' }}">
                                    <input placeholder="$100.00"
                                           name="price"
                                           class="form-control input-sm"
                                           value="{{ $product->price }}"
                                           disabled>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="submit" class="btn btn-success" value="Add to Cart">
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
