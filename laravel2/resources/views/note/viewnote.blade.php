@extends ('layout.default')

@section ('content')
<div class="note">
	<h4>
    	<a href="{{ URL('note') }}">⬅️Before</a>
  	</h4>
  	
  	<h1 style="text-align: center; margin-top: 50px;">{{ $note->noteTitle }}</h1>
  		
  	<hr>
  	
  	<div id="date" style="text-align: right;">
    	{{ $note->date }}
  	</div>
  
  	<div id="content" style="padding: 50px;">
   		<p>
      		{{ $note->noteContent }}
    	</p>
  	</div>
</div>
<div class="comment">

	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			
			<ul>
				@foreach ($errors as $error)
					<li>{{ $error }}</li>
				@endForeach
			</ul>

		</div>
	@endIf

	<div class="newComment">
		<h4>Your Comment:</h4>
		
		<form method="post" action="{{ URL('notecomment/store') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
        	<input type="hidden" name="noteId" value="{{ $note->id }}">
        	<div class="form-group">
        		<label>UserId:</label>
        		<input type="text" class="form-control" name="userId" style="width:300px">
        	</div>
        	<div class="form-group">
        		<label>Comment:</label>
        		<textarea class="form-control" name="comment" rows="10" required="required"></textarea>
        	</div>
        	<button type="submit" class="btn btn-lg btn-success">Submit</button>
		</form>
	</div>

	<hr>

	<div class="oldComment">
		@foreach ($note->comment as $comment)
			<div class="one" style="border-top: solid 20px #efefef; padding: 5px 20px;">
				<h3>{{ $comment->userId }}</h3>
				<h6>{{ $comment->created_at }}</h6>
			</div>
			<div class="content">
            	<p style="padding: 20px;">
              		{{ $comment->comment }}
            	</p>
          	</div> 
		@endForeach
	</div>
</div>
@endSection