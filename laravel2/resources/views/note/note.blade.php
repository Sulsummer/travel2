@extends ('layout.default')

@section ('content')
<div class="my-nav-2">
    <a href="#">search</a>
    <a href="#">random</a>
    <a href="{{ URL('note/handle/create') }}">share</a>
</div>

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