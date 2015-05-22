@extends ('layout.default')

@section ('content')
@if ($person)
<div class="col-md-12">
 	<div class="panel panel-default">
 		<div class="panel-heading">
 			<p>to&nbsp;{{ $person->nickName }}&nbsp;:</p>
 		</div>
  		<div class="panel-body">
  			<form method="post" action="{{ URL('mailbox/send') }}">
  				<textarea rows="5" class="form-control" name="msgContent"></textarea>
  				<input type="hidden" name="_token" value="{{ csrf_token() }}">
        		<input type="hidden" name="personId" value="{{ $person->id }}">
        		<br>
        		<button type="submit" class="btn btn-success">Submit</button>
  			</form>
  		</div>
	</div>
</div>
@endIf


@endSection