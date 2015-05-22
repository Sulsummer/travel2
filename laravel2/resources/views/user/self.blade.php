@extends ('layout.default')

@section ('content')

	<div class="form-group">
		<div class="col-md-12">
 			<div class="panel panel-default">
 				<div class="panel-heading">
 					Apply to handle:
 				</div>
  				<div class="panel-body">
            @if ($applyToHandles)
  					<ul>
  					@foreach ($applyToHandles as $applyToHandle)
  						<li>
  							<p>
  								<a href="{{ URL('user/viewuser/'.$applyToHandle->userId) }}">{{ $applyToHandle->nickName }}</a>
  								wants to be your friend!
  							
  							<form method="post" action="{{ URL('user/ok') }}" style="float:left">
  								<input type="hidden" name="applyId" value="{{$applyToHandle->id}}">
  								<input type="hidden" name="userId" value="{{$applyToHandle->userId}}">
  								<input type="hidden" name="_token" value="{{ csrf_token() }}">
  								<button type="submit" class="btn btn-success">Ok</button>
  							</form>
  							<form style="float:left">
  								<button type="submit" class="btn btn-danger">Deny</button>
  							</form>
  							</p>
  						</li>
  					@endForeach
  					</ul>
            @endIf
  				</div>
			</div>
 		</div>
 		<div class="col-md-12">
 			<div class="panel panel-default">
 				<div class="panel-heading">
 					Apply handled:
 				</div>
  				<div class="panel-body">
            @if ($applyHasHandles)
  					<ul>
  					@foreach ($applyHasHandles as $applyHasHandle)
  						<li>
  							<p>
  								<a href="{{ URL('user/viewuser/'.$applyHasHandle->userId) }}">{{ $applyHasHandle->nickName }}</a>
  								wants to be your friend!
  							  <form>
  								  <button type="submit" class="btn btn-danger">Delete</button>
  							  </form>
  							</p>
  						</li>
  					@endForeach
  					</ul>
            @endIf
  				</div>
			</div>
 		</div>
		<div class="col-md-12">
 			<div class="panel panel-default">
 				<div class="panel-heading">
 					NickName:
 				</div>
  				<div class="panel-body">
    				{{ $self->nickName }}balabala
  				</div>
			</div>
 		</div>
 		<div class="col-md-12">
 			<div class="panel panel-default">
 				<div class="panel-heading">
 					Email:
 				</div>
  				<div class="panel-body">
    				{{ $self->email }}
  				</div>
			</div>
 		</div>
 		<div class="col-md-12">
 			<div class="panel panel-default">
 				<div class="panel-heading">
 					Popularity:
 				</div>
  				<div class="panel-body">
    				{{ $self->popularity }}
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

 		<div class="comment">
	 		<div class="oldComment">
			@foreach ($self->comment as $comment)
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

	</div>

@endSection	

