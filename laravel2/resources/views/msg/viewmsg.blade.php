@extends ('layout.default')

@section ('content')

@if ($msgs)
	<ul>
	@foreach ($msgs as $msg)
		<li>
			<p>{{$msg->date}}&nbsp;<a href="{{URL('user/viewuser/'.$msg->senderId)}}">{{$names[$msg->senderId]}}</a></p>
			<p>{{$msg->msgContent}}</p>
		</li>
	@endForeach
	</ul>
@endIf
<form method="post" action="{{ URL('mailbox/send') }}">
	<textarea rows="5" class="form-control" name="msgContent"></textarea>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="personId" value="{{array_keys($names)[1]}}">
	<br>
	<button type="submit" class="btn btn-success">Submit</button>
</form>


@endSection