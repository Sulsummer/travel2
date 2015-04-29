@extends('layout.default')

@section('content')

<div class="row">
	<div class="col-md-4">
	</div>	
	@if (Auth::user())
	<div class="col-md-4">
 		<div class="panel panel-default">
  			<div class="panel-body">
  				
  				<p>{{ $user->id }}</p>
  				<a href="{{ URL('auth/logout') }}">logout</a>

  			</div>
		</div>
 	</div>
 	@endIf

 	<div class="col-md-4">
 	</div>
</div>

<div class="row">
	<div class="col-md-3">
	</div>	
	
	<div class="col-md-3">
 		<div class="panel panel-default">
  			<div class="panel-body">
    			<a href="{{ URL('auth/login') }}">Login</a>
  			</div>
		</div>
 	</div>

 	<div class="col-md-3">
 		<div class="panel panel-default">
  			<div class="panel-body">
    			<a href="{{ URL('auth/register') }}">Register</a>
  			</div>
		</div>
 	</div>

 	<div class="col-md-3">
 	</div>
</div>

<hr>

<div class="row">
 	<div class="col-md-6">
 		<div class="panel panel-default">
  			<div class="panel-body">
    			<a href="{{ URL('note') }}">Travel Note</a>
  			</div>
		</div>
 	</div>
 	<div class="col-md-6">
 		<div class="panel panel-default">
  			<div class="panel-body">
    			Travel Group
  			</div>
		</div>
 	</div>
 </div>
@endSection