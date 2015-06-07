@extends ('layout.indexLayout2')


@section ('content')

<div class="row">
	<div class="content">
		<ul>
			@foreach ($notes as $note)
			<li>
				<div class="title">
					<a href="{{ URL('note/viewnote/'.$note->id) }}">
						<h4>{{ $note->noteTitle }}</h4>
					</a>
				</div>
				<div class="body">
					<p>{{ $note->noteContent }}</p>
				</div>
			</li>
			@endForeach
		</ul>
	</div>
</div>

@endSection

@section ('right-content')
	<div class="content">
		<a href="{{ URL('note/handle/create') }}">Create</a>
		<br>
		<a style="text-decoration:line-through;">Search</a>
		<br>
		<a style="text-decoration:line-through;">Random</a>
	</div>

@endSection
