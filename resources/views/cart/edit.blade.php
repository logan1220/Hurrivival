@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ url('/cart/update', $item->rowId) }}">
            {{ method_field('POST') }}
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
                    <div class="panel panel-default">
                        @if (Auth::guest())
                            <div class="panel-heading alert-danger">ACCESS DENIED</div>
                            <div class="panel-body alert-danger">USER ACCOUNT HAS INSUFFICIENT PERMISSIONS</div>
                        @else
                            <div class="panel-heading">Edit Quantity</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <b>Available Quantity:</b>
                                    </div>
                                    <div class="col-sm-1">
                                        {{ $product->product_total_quantity }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <b>Current Quantity:</b>
                                    </div>
                                    <div class="col-sm-1">
                                        <select name="quantity" class="form-control input-sm">
                                            @for ($x=0;$x<=$product->product_total_quantity;$x++)
                                                @if ($item->qty == $x)
                                                    <option value="{{ $x }}" selected>{{ $x }}</option>
                                                @else
                                                    <option value="{{ $x }}">{{ $x }}</option>
                                                @endif
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="submit" class="btn btn-success" value="Update Quantity">
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
