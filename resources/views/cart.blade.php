@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Your Cart:</div>
                    @if (Auth::guest())
                        <div class="panel-body">
                            Please log in to view your cart
                        </div>
                    @else
                        <div class="panel-body">
                            <div class="row form-group">
                                <label class="col-form-label col-md-1">Search:</label>
                                <div class="col-md-10">
                                    <input name="search" type="text" class="form-control" value="">
                                </div>
                            </div>
                            @foreach ($cart as $item)
                                <div class="row" style="padding:0 15px 0 15px;">
                                    <div class="col-md-12">
                                        <div class="well row" style="height: 100%">
                                            <div class="col-md-3" style="padding-left: 0;">
                                                <img src="http://via.placeholder.com/200x200">
                                            </div>
                                            <div class="col-md-7">
                                                <h3>{{$item->name}}</h3>
                                                <ul>
                                                    <li>Price: ${{$item->price}}</li>
                                                </ul>
                                            </div>
                                            <div class="col-md-2">

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
