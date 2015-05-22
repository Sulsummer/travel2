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
  					<a href="{{ URL('user/viewuser/'.$user->id.'/apply') }}"><button class="btn btn-success">Apply Add Friends</button></a>
            <a href="{{ URL('mailbox/talk/'.$user->id) }}"><button class="btn btn-success">Send a Message</button></a>
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

