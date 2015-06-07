@extends ('layout.indexLayout3')

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
			<textarea required="required" rows="30" cols="100" name="noteContent">{{ $note->noteContent }}</textarea>
		</div>
		<button type="submit">Edit</button>
	</form>
	</div>
	

@endSection