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
                    <div class="panel-heading">Your Cart:</div>
                    @if (Auth::guest())
                        <div class="panel-body">
                            Please log in to view your cart
                        </div>
                    @else
                        <div class="panel-body">
                            <a href="{{ url('/cart/checkout') }}">
                                <button class="btn btn-info">Checkout</button>
                            </a>
                            @foreach ($cart as $item)
                                <div class="row" style="padding:0 15px 0 15px;">
                                    <div class="col-md-12">
                                        <div class="well row" style="height: 100%">
                                            <div class="col-md-3" style="padding-left: 0;">
                                                <img src="{{ \App\Product::find($item->id)->img_url }}" alt="product image" style="max-width: 200px;">
                                            </div>
                                            <div class="col-md-7">
                                                <h3>{{$item->name}}</h3>
                                                <ul>
                                                    <li>Price: ${{$item->price}}</li>
                                                    <li>Your Quantity: {{$item->qty}}</li>
                                                </ul>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="{{ url('/cart/destroy', [$item->rowId]) }}">
                                                    <button class="btn btn-danger">Remove from Cart</button>
                                                </a>
                                                <br><br>
                                                <a href="{{ url('/cart/edit', [$item->rowId]) }}">
                                                    <button class="btn btn-warning">Edit Quantity</button>
                                                </a>
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
