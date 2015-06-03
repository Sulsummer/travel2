@extends ('layout.default')

@section ('content')
	<div class="row">
	<form method="post" action="{{ URL('group/modify') }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="groupId" value="{{ $group->id }}">
		<div class="form-group">
			<label>Group Name:</label>
			<input type="text" class="form-control" name="groupName" value="{{ $group->groupName }}">
		</div>
		<div class="form-group">
			<label>Start Date:</label>
			<input type="date" class="form-control" name="startDate" value="{{ $group->startDate }}">
			<label>End Date:</label>
			<input type="date" class="form-control" name="endDate" value="{{ $group->endDate }}">
		</div>
		<div class="form-group">
			<label>Destination:</label>
			<textarea class="form-control" rows="5" required name="destination">{{ $group->destination }}</textarea>
		<button type="submit" class="btn btn-success">Modify</button>
	</form>
	</div>

@endSection