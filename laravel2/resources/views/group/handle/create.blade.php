@extends ('layout.indexLayout3')

@section ('content')
<br>
	<div class="row">
	<form method="post" action="{{ URL('group/handle') }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group">
			<label>Group Name:</label>
			<input type="text" class="form-control" name="groupName">
		</div>
		<br>
		<div class="form-group">
			<label>Start Date:</label>
			<input type="date" class="form-control" name="startDate">
		<br>
			<label>End Date:</label>
			<input type="date" class="form-control" name="endDate">
		</div>
		<br>
		<div class="form-group">
			<label>Destination:</label>
			<textarea rows="5" cols="82" required name="destination"></textarea>
		<br>
		<br>
		<button type="submit">Submit</button>
	</form>
	</div>
	</div>
	<br><br><br><br>

@endSection