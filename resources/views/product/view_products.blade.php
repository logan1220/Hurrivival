@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    @if (Auth::guest())
                        <div class="panel-body">
                            Please log in.
                        </div>
                    @else
                        <div class="panel-body">
                            All Products<br><br>
                            @foreach ($products as $product)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="well row" style="height: 100%">
                                            <div class="col-md-3">
                                                <img src="http://via.placeholder.com/200x200">
                                            </div>
                                            <div class="col-md-7">
                                                <h3>{{$product->product_name}}</h3>
                                                <ul>
                                                    <li>Price: ${{$product->price}}</li>
                                                </ul>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="{{ route('product.show', [$product->product_id]) }}">
                                                    <button class="btn btn-info">More Info</button>
                                                </a>
                                                <br><br>
                                                <a href="{{ route('product.edit', [$product->product_id]) }}">
                                                    <button class="btn btn-success">Add to Cart</button>
                                                </a>
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
@endsection
