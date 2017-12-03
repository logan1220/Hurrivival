@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Welcome {{ Auth::user()->name }}, to your profile!</h2>
	<table class="table">
		<td>Your information:</td><td></td>
		<tr><td>Email: </td><td>{{ Auth::user()->email }}</td>
		<tr><td>Phone: </td><td>{{ Auth::user()->email }}</td>
		<tr><td>Address: </td><td>{{ Auth::user()->email }}</td>
		<tr><td>City: </td><td>{{ Auth::user()->email }}</td>
		<tr><td>State: </td><td>{{ Auth::user()->email }}</td>
		<tr><td>Zip Code: </td><td>{{ Auth::user()->id }}</td>
	</table>
	<a href="{{ route('editProfile', Auth::user()->id) ">
        	<button class="btn btn-success">Edit Profile Information</button>
        </a>
    </div>

@endsection