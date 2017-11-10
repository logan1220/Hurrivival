@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('product.update', ['product_id' => $product->product_id]) }}">
            {{ method_field('PUT') }}
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    @if ($errors->any())
                        <div class="row">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    @if (session()->has('message'))
                        <div class="row">
                            <div class="alert alert-success">
                                <p>{{ session()->get('message') }}</p>
                            </div>
                        </div>
                    @endif
                    <div class="panel panel-default">
                        @if (Auth::guest())
                            <div class="panel-heading alert-danger">ACCESS DENIED</div>
                            <div class="panel-body alert-danger">USER ACCOUNT HAS INSUFFICIENT PERMISSIONS</div>
                        @else
                            <div class="panel-heading">Add new product</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="product_name" class="control-label">Product Name:</label>
                                    </div>
                                    <div class="col-md-6 {{ $errors->has('product_name') ? ' has-error' : '' }}">
                                        <input placeholder="Rigid 4000W Generator"
                                               name="product_name"
                                               class="form-control input-sm"
                                               value="{{ $product->product_name }}">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="category" class="control-label">Product Category:</label>
                                    </div>
                                    <div class="col-md-3 {{ $errors->has('category_id') ? ' has-error' : '' }}">
                                        <select name="category_id" class="form-control input-sm">
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
                                               value="{{ $product->product_total_quantity }}">
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
                                               value="{{ $product->product_sku }}">
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
                                               value="{{ $product->price }}">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="submit" class="btn btn-success" value="Update Product">
                                    </div>
                                </div>
                            </div>
                    </div>
                    @endif
                </div>
            </div>
        </form>
    </div>
@endsection
