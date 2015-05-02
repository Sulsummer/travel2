@extends ('layout.default')

@section ('content')
	<div class="row">
	<form method="post" action="{{ URL('group/handle') }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group">
			<label>Group Name:</label>
			<input type="text" class="form-control" name="groupName">
		</div>
		<div class="form-group">
			<label>Start Date:</label>
			<input type="date" class="form-control" name="startDate">
			<label>End Date:</label>
			<input type="date" class="form-control" name="endDate">
		</div>
		<div class="form-group">
			<label>Destination:</label>
			<textarea class="form-control" rows="5" required name="destination"></textarea>
		<button type="submit" class="btn btn-success">Submit</button>
	</form>
	</div>

@endSection