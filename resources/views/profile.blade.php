@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Profile:</div>
					<div class="panel-body">
						<h2>Welcome {{ Auth::user()->name }}, to your profile!</h2>
						<table class="table">
							<td>Your information:</td><td></td>
							<tr><td>Email: </td><td>{{ Auth::user()->email }}</td>
							<tr><td>Phone: </td><td>{{ Auth::user()->phone }}</td>
							<tr><td>Address: </td><td>{{ Auth::user()->address1 }}</td>
							<tr><td>City: </td><td>{{ Auth::user()->city }}</td>
							<tr><td>State: </td><td>{{ Auth::user()->state }}</td>
							<tr><td>Zip Code: </td><td>{{ Auth::user()->zip }}</td>
						</table>
						<?php
							$user = Auth::user()->id;
						?>
						<a href="{{ route('editProfile.edit', [$user]) }}">
							<button class="btn btn-success">Edit Profile Information</button>
						</a>
					</div>
			</div>
		</div>
	</div>

@endsection