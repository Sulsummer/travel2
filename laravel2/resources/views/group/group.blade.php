@extends ('layout.indexLayout2')	

@section ('content')

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

@endSection

@section ('right-content')
	<div class="content">
		<a href="{{ URL('group/handle/create') }}">Create</a>
		<br>
		<a style="text-decoration:line-through;">Search</a>
		<br>
		<a style="text-decoration:line-through;">Random</a>
	</div>
@endSection