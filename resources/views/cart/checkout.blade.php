@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ url('/cart/purchase') }}">
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
                            <div class="panel-heading">Checkout</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h4>Shipping Info</h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="name" class="control-label">Name:</label>
                                    </div>
                                    <div class="col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                                        {{ Auth::user()->name }}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="email" class="control-label">Email:</label>
                                    </div>
                                    <div class="col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                                        {{ Auth::user()->email }}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="address" class="control-label">Address:</label>
                                    </div>
                                    <div class="col-md-6 {{ $errors->has('address1') ? ' has-error' : '' }}">
                                        {{ Auth::user()->address1 }}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="address2" class="control-label">Address2:</label>
                                    </div>
                                    <div class="col-md-6 {{ $errors->has('address2') ? ' has-error' : '' }}">
                                         {{ Auth::user()->address2 }}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="city" class="control-label">City:</label>
                                    </div>
                                    <div class="col-md-6 {{ $errors->has('city') ? ' has-error' : '' }}">
                                        {{ Auth::user()->city }}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="state" class="control-label">State:</label>
                                    </div>
                                    <div class="col-md-6 {{ $errors->has('state') ? ' has-error' : '' }}">
                                        {{ Auth::user()->state }}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="zip" class="control-label">Zip:</label>
                                    </div>
                                    <div class="col-md-6 {{ $errors->has('zip') ? ' has-error' : '' }}">
                                        {{ Auth::user()->zip }}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h4>Credit Card Info</h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="ccn" class="control-label">Credit Card Number:</label>
                                    </div>
                                    <div class="col-md-6 {{ $errors->has('ccn') ? ' has-error' : '' }}">
                                        <input placeholder=""
                                               name="ccn"
                                               class="form-control input-sm"
                                               value="{{ old('ccn') }}">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="cvv" class="control-label">CVV:</label>
                                    </div>
                                    <div class="col-md-2 {{ $errors->has('cvv') ? ' has-error' : '' }}">
                                        <input placeholder=""
                                               name="cvv"
                                               class="form-control input-sm"
                                               value="{{ old('cvv') }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="subtotal" class="control-label">Subtotal:</label>
                                    </div>
                                    <div class="col-md-2">
                                        ${{ Cart::subtotal() }}
                                        <input type="hidden" name="subtotal" value="{{ Cart::subtotal() }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="tax" class="control-label">Tax:</label>

                                    </div>
                                    <div class="col-md-2">
                                        ${{ Cart::tax() }}
                                        <input type="hidden" name="tax" value="{{ Cart::tax() }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="total" class="control-label">Total:</label>
                                    </div>
                                    <div class="col-md-2">
                                        ${{ Cart::total() }}
                                        <input type="hidden" name="total" value="{{ Cart::total() }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <a onclick="donation()">
                                            <label for="redcross" class="control-label">Our 15% Donation to RedCross:</label>
                                        </a>
                                    </div>
                                    <div class="col-md-2">
                                        ${{ number_format((float)$redcross, 2, '.', '') }}
                                        <input type="hidden" name="redcross" value="{{ number_format((float)$redcross, 2, '.', '') }}">
                                    </div>
                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="submit" class="btn btn-success" value="Purchase">
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
