@extends ('layout.default')

@section ('content')

	<div class="form-group">
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
 					Groups List:
 				</div>
  				<div class="panel-body">
  					<ul>
  						@foreach ($groups as $group)
  						<li>
  							<a href="{{ URL('group/viewgroup/'.$group->id)}}">
  								{{ $group->groupName }}
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
@endSection	