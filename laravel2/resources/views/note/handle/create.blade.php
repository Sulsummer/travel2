@extends ('layout.indexLayout3')

@section ('content')
	<div class="row">
	<form method="post" action="{{ URL('note/handle') }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div>
			<label>Title:</label>
			<input type="text" class="form-control" name="noteTitle">
		</div>
		<div>
			<label>Content:</label>
			<textarea required="required" name="noteContent" rows="30" cols="100" ></textarea>
		</div>
		<button type="submit">Submit</button>
	</form>
	</div>

@endSection