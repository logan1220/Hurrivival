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
                            Products
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
