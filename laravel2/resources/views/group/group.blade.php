@extends ('layout.default')

@section ('content')
<div class="my-nav-2">
    <a href="#">search</a>
    <a href="#">random</a>
    <a href="{{ URL('group/handle/create')}}">share</a>
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