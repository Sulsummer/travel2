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
    			<a href="{{ URL('note/handle/create') }}">Share</a>
  			</div>
		</div>
	</div>
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