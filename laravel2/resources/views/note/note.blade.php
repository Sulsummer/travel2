@extends ('layout.default')

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