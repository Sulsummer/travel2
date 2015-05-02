@extends ('layout.default')

@section ('content')
<div class="nav">
	<div class="col-md-4">
		<div class="panel panel-default">
  			<div class="panel-body">
    			<a href="#">Search</a>
  			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
  			<div class="panel-body">
    			<a href="#">Random</a>
  			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
  			<div class="panel-body">
    			<a href="{{ URL('group/handle/create')}}">Share</a>
  			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="content">
		<ul>
			@foreach ($groups as $group)
			<li>
				<div class="title">
					<a href="{{ URL('group/viewgroup/'.$group->id) }}">
						<h4>{{ $group->groupName }}</h4>
					</a>
				</div>
				<div class="body">
					<p>{{ $group->captainId }}</p>
					<p>{{ $group->destination }}</p>
				</div>
			</li>
			@endForeach
		</ul>
	</div>
</div>

@endSection