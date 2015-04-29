@extends ('layout.default')

@section ('content')
	<div class="row">
	<form method="post" action="{{ URL('note/handle') }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group">
			<label>Title:</label>
			<input type="text" class="form-control" name="noteTitle">
		</div>
		<div class="form-group">
			<label>UserId:</label>
			<input type="text" class="form-control" name="authorId">
		</div>
		<div class="form-group">
			<label>Content:</label>
			<textarea class="form-control" required="required" rows="40" name="noteContent"></textarea>
		</div>
		<button type="submit" class="btn btn-success">Submit</button>
	</form>
	</div>

@endSection