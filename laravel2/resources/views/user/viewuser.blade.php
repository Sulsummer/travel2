@extends ('layout.default')

@section ('content')

	<div class="form-group">
		<div class="col-md-12">
 			<div class="panel panel-default">
 				<div class="panel-heading">
 					NickName:
 				</div>
  				<div class="panel-body">
  					{{ $user->nickName }}
  					<a href="{{ URL('user/viewuser/'.$user->id.'/praise') }}"><button class="btn btn-success">Praise</button></a>
  				</div>
			</div>
 		</div>
 		<div class="col-md-12">
 			<div class="panel panel-default">
 				<div class="panel-heading">
 					Email:
 				</div>
  				<div class="panel-body">
  					{{ $user->email }}
  				</div>
			</div>
 		</div>
 		<div class="col-md-12">
 			<div class="panel panel-default">
 				<div class="panel-heading">
 					Popularity:
 				</div>
  				<div class="panel-body">
  					{{ $user->popularity }}
  				</div>
			</div>
 		</div>
 		<div class="col-md-12">
 			<div class="panel panel-default">
 				<div class="panel-heading">
 					Friends List:
 				</div>
  				<div class="panel-body">
  					<ul>
  						@foreach ($friends as $friend)
  						<li>
  							<a href="{{ URL('user/viewuser/'.$friend->friendId)}}">
  								{{ $friend->nickName }}
  							</a>
  						</li>
  						@endForeach
  					</ul>
  				</div>
			</div>
 		</div>
 		<div class="col-md-12">
 			<div class="panel panel-default">
 				<div class="panel-heading">
 					Owned Groups List:
 				</div>
  				<div class="panel-body">
  					<ul>
  						@foreach ($ownedGroups as $ownedGroup)
  						<li>
  							<a href="{{ URL('group/viewgroup/'.$ownedGroup->id)}}">
  								{{ $ownedGroup->groupName }}
  							</a>
  						</li>
  						@endForeach
  					</ul>
  				</div>
			</div>
 		</div>
 		 <div class="col-md-12">
 			<div class="panel panel-default">
 				<div class="panel-heading">
 					Joined Groups List:
 				</div>
  				<div class="panel-body">
  					<ul>
  						@foreach ($joinedGroups as $joinedGroup)
  						<li>
  							<a href="{{ URL('group/viewgroup/'.$joinedGroup->id)}}">
  								{{ $joinedGroup->groupName }}
  							</a>
  						</li>
  						@endForeach
  					</ul>
  				</div>
			</div>
 		</div>
 		<div class="col-md-12">
 			<div class="panel panel-default">
 				<div class="panel-heading">
 					Notes List:
 				</div>
  				<div class="panel-body">
  					<ul>
  						@foreach ($notes as $note)
  						<li>
  							<a href="{{ URL('note/viewnote/'.$note->id)}}">
  								{{ $note->noteTitle }}
  							</a>
  						</li>
  						@endForeach
  					</ul>
  				</div>
			</div>
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
		
		<form method="post" id="newComment" action="{{ URL('user/usercomment') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
        	<input type="hidden" name="personId" value="{{ $user->id }}">

        	<div class="form-group">
        		<label>Comment:</label>
        		<textarea class="form-control" name="comment" rows="10" required="required"></textarea>
        	</div>
        	<button type="submit" class="btn btn-lg btn-success">Submit</button>
		</form>
	</div>

	<hr>

	<div class="oldComment">
		@foreach ($user->comment as $comment)
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

<script type="text/javascript">
function reply(id, userId){
	var replyDiv = document.getElementById("reply" + id);	
	document.getElementById("replyButton" + id).style.display = "none";
	var newDiv = document.createElement("div");
	var newForm = document.createElement("form");
	newForm.setAttribute("method","post");
	newForm.setAttribute("action","{{ URL('user/usercomment') }}");
	var hiddenInput1 = document.createElement("input");
	hiddenInput1.setAttribute("type","hidden");
	hiddenInput1.setAttribute("name","_token");
	hiddenInput1.setAttribute("value","{{ csrf_token() }}");
	var hiddenInput2 = document.createElement("input");
	hiddenInput2.setAttribute("type","hidden");
	hiddenInput2.setAttribute("name","personId");
	hiddenInput2.setAttribute("value","{{ $user->id }}");
	var hiddenInput3 = document.createElement("input");
	hiddenInput3.setAttribute("type","hidden");
	hiddenInput3.setAttribute("name","refId");
	hiddenInput3.setAttribute("value",id);
	
	
	var inputDiv1 = document.createElement("div");
	inputDiv1.setAttribute("class","form-group");

	var inputLabel1 = document.createElement("p");
	inputLabel1.innerHTML = "UserId:";
	
	var inputUserId = document.createElement("input");
	inputUserId.setAttribute("type","text");
	inputUserId.setAttribute("class","form-control");
	inputUserId.setAttribute("name","userId");
	inputUserId.setAttribute("style","width:300px");

	var inputDiv2 = document.createElement("div");	
	inputDiv2.setAttribute("class","form-group");
	
	var inputLabel2 = document.createElement("p");
	inputLabel2.innerHTML = "Comment:";
	
	var inputComment = document.createElement("textarea");
	inputComment.setAttribute("class","form-control");
	inputComment.setAttribute("name","comment");
	inputComment.setAttribute("rows","10");
	inputComment.setAttribute("required","required");
	inputComment.innerHTML = "@ " + userId + ": ";
	
	var button = document.createElement("button");
	button.setAttribute("type","submit");
	button.setAttribute("class","btn btn-lg btn-success");
	button.innerHTML = "Submit";
	
	inputDiv1.appendChild(inputLabel1);
	inputDiv1.appendChild(inputUserId);
	inputDiv2.appendChild(inputLabel2);
	inputDiv2.appendChild(inputComment);
	
	
	

	newForm.appendChild(hiddenInput1);
	newForm.appendChild(hiddenInput2);
	newForm.appendChild(hiddenInput3);
	newForm.appendChild(inputDiv1);
	newForm.appendChild(inputDiv2);
	newForm.appendChild(button);
	
	newDiv.appendChild(newForm);
	replyDiv.appendChild(newDiv);
}
</script>