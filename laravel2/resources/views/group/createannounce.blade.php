@extends ('layout.default')

@section ('content')
	<div class="row">
	<form method="post" action="{{ URL('group/viewgroup/'.$id.'/pushAnnounce') }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group">
			<label>New Announcement:</label>
			<textarea class="form-control" required="required" rows="10" name="announcement"></textarea>
		</div>
		<button type="submit" class="btn btn-success">Submit</button>
	</form>
	</div>

@endSection