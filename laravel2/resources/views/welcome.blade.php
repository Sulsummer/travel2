@extends('layout.default')

@section('content')
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