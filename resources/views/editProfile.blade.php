@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('profile.update', ['user_id' => $user->user_id]) }}">
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
                            <div class="panel-heading">Add new product</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="name" class="control-label">Your Name:</label>
                                    </div>
                                    <div class="col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <input placeholder="John Doe"
                                               name="name"
                                               class="form-control input-sm"
                                               value="{{ $user->name }}">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="email" class="control-label">Email:</label>
                                    </div>
                                    <div class="col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input placeholder="JohnDoe@email.com"
                                               name="email"
                                               class="form-control input-sm"
                                               value="{{ $user->email }}">
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
                </div>
            </div>
        </form>
    </div>
@endsection
