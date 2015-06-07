@extends ('layout.indexLayout3')

@section ('content')
<br>
	<div class="row">
	<form method="post" action="{{ URL('group/modify') }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="groupId" value="{{ $group->id }}">
		<div class="form-group">
			<label>Group Name:</label>
			<input type="text" class="form-control" name="groupName" value="{{ $group->groupName }}">
		</div>
		<br>
		<div class="form-group">
			<label>Start Date:</label>
			<input type="date" class="form-control" name="startDate" value="{{ $group->startDate }}">
			<label>End Date:</label>
			<input type="date" class="form-control" name="endDate" value="{{ $group->endDate }}">
		</div>
		<br>
		<div class="form-group">
			<label>Destination:</label>
			<textarea class="form-control" rows="5" required name="destination">{{ $group->destination }}</textarea>
		<br>
		<br>
		<button type="submit" class="btn btn-success">Modify</button>
	</form>
	</div>
</div>
<br><br><br><br>
@endSection