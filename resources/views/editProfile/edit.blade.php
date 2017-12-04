@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('editProfile.update', ['user_id' => $user->id]) }}">
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
                            <div class="panel-heading">Edit your Profile</div>
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
                                    <div class="col-md-3">
                                        <label for="phone" class="control-label">Phone:</label>
                                    </div>
                                    <div class="col-md-6 {{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <input placeholder="1-800-111-1111"
                                               name="phone"
                                               class="form-control input-sm"
                                               value="{{ $user->phone }}">
                                    </div>
                                </div>
                                <br>
				<div class="row">
                                    <div class="col-md-3">
                                        <label for="address1" class="control-label">Address:</label>
                                    </div>
                                    <div class="col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input placeholder="1234 JohnDoe Street"
                                               name="address1"
                                               class="form-control input-sm"
                                               value="{{ $user->address1 }}">
                                    </div>
                                </div>
                                <br>
				<div class="row">
                                    <div class="col-md-3">
                                        <label for="city" class="control-label">City:</label>
                                    </div>
                                    <div class="col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input placeholder="Johnville"
                                               name="city"
                                               class="form-control input-sm"
                                               value="{{ $user->city }}">
                                    </div>
                                </div>
                                <br>
				<div class="row">
                                    <div class="col-md-3">
                                        <label for="state" class="control-label">State:</label>
                                    </div>
                                    <div class="col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input placeholder="JN"
                                               name="state"
                                               class="form-control input-sm"
                                               value="{{ $user->state }}">
                                    </div>
                                </div>
                                <br>
				<div class="row">
                                    <div class="col-md-3">
                                        <label for="zip" class="control-label">Zipcode:</label>
                                    </div>
                                    <div class="col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input placeholder="12345"
                                               name="zip"
                                               class="form-control input-sm"
                                               value="{{ $user->zip }}">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="submit" class="btn btn-success" value="Update Profile">
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
