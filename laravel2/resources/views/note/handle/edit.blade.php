@extends ('layout.default')

@section ('content')
	<div class="row">
	<form method="post" action="{{ URL('note/handle/'.$note->id) }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="_method" value="put">
		<div class="form-group">
			<label>Title:</label>
			<input type="text" class="form-control" name="noteTitle" value="{{ $note->noteTitle}}">
		</div>
		<div class="form-group">
			<label>Content:</label>
			<textarea class="form-control" required="required" rows="40" name="noteContent">{{ $note->noteContent }}</textarea>
		</div>
		<button type="submit" class="btn btn-success">Modify</button>
	</form>
	</div>

@endSection