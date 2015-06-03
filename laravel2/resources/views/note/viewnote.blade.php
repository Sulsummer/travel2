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
  	<div id="userName" style="text-align: right;">
    	@foreach ($author as $a)
    		{{ var_dump($a) }}
    	@endForeach
    	<a href="{{ URL('user/viewuser/'.$author[0]->id) }}">{{ $author[0]->nickName }}</a> 	
  	</div>
  
  	<div id="content" style="padding: 50px;">
   		<p>
      		{{ var_dump($note) }}
    	</p>
  	</div>
</div>

<div class="modify">
	@if ($isSelf)
	<a href="{{ URL('note/handle/'.$note->id.'/edit') }}"><button class="btn btn-lg btn-success">Modify</button></a>
	<form action="{{ URL('note/handle/'.$note->id) }}" method="post" style="display:inline">
		<input type="hidden" name="_method" value="delete">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<button type="submit" class="btn btn-lg btn-danger">Delete</button>
	</form>
	@else

	<a href="{{ URL('note/viewnote/'.$note->id.'/praise') }}"><button class="btn btn-lg btn-success">Praise</button></a>
	@endIf
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
		
		<form method="post" id="newComment" action="{{ URL('note/notecomment') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
        	<input type="hidden" name="noteId" value="{{ $note->id }}">

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
		<div class="oneComment">
			<div class="one" style="border-top: solid 3px #efefef; padding: 5px 20px;">
				<h3>{{ $comment->userId }}</h3>
				<h3>{{ $comment->id }}</h3>
				<h3>{{ $comment->refId }}</h3>
				<h6>{{ $comment->created_at }}</h6>
			</div>
			<div class="content">
            	<p style="padding: 20px;">
              		{{ $comment->comment }}
            	</p>
          	</div>
          	<div id="reply{{ $comment->id }}">
          		<button class="btn btn-lg btn-success" onclick="reply({{ $comment->id }},{{ $comment->userId }})" id="replyButton{{ $comment->id }}">Reply</button>
          	</div> 
        </div>
		@endForeach
	</div>
</div>
@endSection

