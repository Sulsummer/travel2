@extends ('layout.default')

@section ('content')
<div class="group">
	<h4>
    	<a href="{{ URL('group') }}">⬅️Before</a>
  	</h4>
  	
  	<h1 style="text-align: center; margin-top: 50px;">{{ $group->groupName }}</h1>
  		
  	<hr>
  	
  	<div id="date" style="text-align: right;">
    	{{ $group->date }}
  	</div>
  	<div id="userName" style="text-align: right;">
		@foreach ($setter as $s)
    		{{ var_dump($s) }}
    	@endForeach 
    	<a href="{{ URL('user/viewuser/'.$setter[0]->id) }}">{{ $setter[0]->nickName }}</a> 	
    </div>
  
  	<div id="content" style="padding: 50px;">
   		<p>Group Id: {{ $group->id }}</p>
   		<p>Group Name: {{ $group->groupName }}</p>
   		<p>Group Setter: {{ $group->setterId }}</p>
   		<p>Group Set Date: {{ $group->date }}</p>
   		<p>Group Start Date: {{ $group->startDate }}</p>
   		<p>Group End Date: {{ $group->endDate }}</p>
   		<p>Group Popularity: {{ $group->popularity }}</p>
   		<p>Group Destination: {{ $group->destination }}</p>
  	</div>

  	<hr>

  	<div class="captain">
  		<h3>Captain:</h3>

  	</div>

  	<div class="announcement">
  		<h3>Announcement:</h3>

  	@if ($announcements)
  		<ul>
  			@foreach ($announcements as $announcement)
  				<li>
  					<h4>
  						<a href="{{ URL('user/viewuser/'.$announcement->id) }}">
  							{{ $announcement->nickName }}
  						</a>
  					</h4>
  					<p>{{ $announcement->announcement }}</p>
  				</li>
  			@endForeach
  		</ul>
 	@endIf
  	</div>
  	<div class="groupMembers">
  		<h3>Group Members:</h3>
  		@if ($groupMembers)
  		<ul>
  			@foreach ($groupMembers as $groupMember)
  				<li>
  					<h4>
  					<a href="{{ URL('user/viewuser/'.$groupMember->id) }}">
  						{{ $groupMember->nickName }}
  					</a>
  					</h4>
  				</li>
  			@endForeach
  		</ul>
 		@endIf
  	</div>
 
</div>




<div class="modify">
	@if ($isSelf)
	<a href="{{ URL('group/handle/'.$group->id.'/edit') }}"><button class="btn btn-lg btn-success">Modify</button></a>
	<form action="{{ URL('group/handle/'.$group->id) }}" method="post" style="display:inline">
		<input type="hidden" name="_method" value="delete">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<button type="submit" class="btn btn-lg btn-danger">Delete</button>
	</form>
	@else 
	<a href="{{ URL('group/viewgroup/'.$group->id.'/join') }}"><button class="btn btn-lg btn-success">Join</button></a>
	<a href="{{ URL('group/viewgroup/'.$group->id.'/praise') }}"><button class="btn btn-lg btn-success">Praise</button></a>
	@endIf
	<a href="{{ URL('group/viewgroup/'.$group->id.'/announce') }}"><button class="btn btn-lg btn-success">Add a Announcement</button></a>
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
		
		<form method="post" id="newComment" action="{{ URL('group/groupcomment') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
        	<input type="hidden" name="groupId" value="{{ $group->id }}">

        	<div class="form-group">
        		<label>Comment:</label>
        		<textarea class="form-control" name="comment" rows="10" required="required"></textarea>
        	</div>
        	<button type="submit" class="btn btn-lg btn-success">Submit</button>
		</form>
	</div>

	<hr>

	<div class="oldComment">
		@foreach ($group->comment as $comment)
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

