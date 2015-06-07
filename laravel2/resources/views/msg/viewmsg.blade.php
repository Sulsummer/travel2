@extends ('layout.indexLayout3')

@section ('content')

@if ($msgs)
	@foreach ($msgs as $msg)
		<div class="my-dialog">
			<p>{{$msg->date}}&nbsp;<a href="{{URL('user/viewuser/'.$msg->senderId)}}">{{$names[$msg->senderId]}}</a></p>
			<p>{{$msg->msgContent}}</p>
		</div>
	@endForeach
@endIf
<form method="post" action="{{ URL('mailbox/send') }}">
	<textarea rows="10" cols="200" class="form-control" name="msgContent"></textarea>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="personId" value="{{array_keys($names)[1]}}">
	<br>
	<button type="submit">Submit</button>
</form>


@endSection
