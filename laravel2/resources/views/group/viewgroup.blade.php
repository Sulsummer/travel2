<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Travel!</title>
		<link rel="stylesheet" href="{{URL('check-group-css/default.css')}}" />
		<link rel="stylesheet" href="{{URL('check-group-css/climacons.css')}}" />
		<link rel="stylesheet" href="{{URL('check-group-css/component.css')}}" />
		<link rel="stylesheet" href="{{URL('check-group-css/extra.css')}}" />
		<script src="{{URL('check-group-js/modernizr.custom.js')}}"></script>
	</head>
	<body>
		<div class="my-back">
			<a href="{{URL('group')}}">⬅️back</a>
		</div>
		<div class="container">	
			<div class="main">

				<ul id="rb-grid" class="rb-grid clearfix">
					<li class="rb-span-4">
						<h3>Introduction of This Group</h3>
						<span class="rb-temp">
							Captain:
							@foreach ($groupMembers as $mem)
								@if ($mem->isCaptain)
									{{$mem->nickName}}
								@endIf
							@endForeach
						</span>
						<div class="rb-overlay">
							<span class="rb-close">close</span>
							<div class="rb-week">
								<div>
									<span>{{$group->groupName}}</span>
									<span class="span-content">
										Group introduction should be here.
									</span>
								</div>
								<div>
									<span>Hot Level</span>
									<span class="span-content">{{$group->popularity}}</span>
									<span>Date</span>
									<span class="span-content">
										start:
									</span>
									<span class="span-content">
										{{$group->startDate}}
									</span>
									<span class="span-content"></span>
									<span class="span-content">
										return:
									</span>
									<span class="span-content">
										{{$group->endDate}}
									</span>
								</div>
								<div>
									<span>Destination</span>
									<span class="span-content">
										{{$group->destination}}
									</span>
								</div>
							</div>
						</div>
					</li>
					<li class="rb-span-4">
						<h3>News and Announcements</h3>
						<span class="rb-temp">News should be here.</span>
						<div class="rb-overlay">
							<span class="rb-close">close</span>
							<div class="rb-week">
								<div>
									<span>
										What's new?
									</span>
									<span class="span-content">
										News should be here.
									</span>
								</div>
								<div>
									<span>
										@if($announcements)
											@foreach ($announcements as $announcement)
												<a href="{{ URL('user/viewuser/'.$announcement->id) }}">
												{{$announcement->nickName}}
												</a>
												:
												<br>
												{{$announcement->announcement}}
												<br>
												{{$announcement->date}}
											@endForeach
										@else
											No Announcement yet.
										@endIf
									</span>
								</div>
								<div>
									<span class="span-content">
									<textarea rows="40" cols="50" placeholder="add an announcement"></textarea>
									<a href="#">Submit</a>
									</span>
								</div>
							</div>
						</div>
					</li>
					<li class="rb-span-2">
						<h3>Members</h3>
						<span class="rb-temp">Come and Join</span>
						<div class="rb-overlay">
							<span class="rb-close">close</span>
							<div class="rb-week">
								<div>
									<span>Members:</span>
									@foreach ($groupMembers as $mem)
										<span class="span-content">
											<a href="#" onclick="f({{$mem->id}})">
												{{$mem->nickName}}
												<script type="text/javascript">
													function f(id) {
														window.location.href="{{URL('user/viewuser')}}/"+id; 
													}
												</script>
											</a>
										</span>
									@endForeach
								</div>
								<div>
									<span>Watcher:</span>
									<span class="span-content">
										Watcher should be here.
									</span>
								</div>
								<div>
									<span>
										Willing to join us?
									</span>
									<span class="span-content">
										Apply now!
									</span>
									<span class="span-content">
									<textarea rows="30" cols="50" placeholder="what do u want to say?"></textarea>
									<a href="#" onclick="apply()">Apply</a>
												<script type="text/javascript">
													function apply() {
														window.location.href="{{ URL('group/viewgroup/'.$group->id.'/join') }}"; 
													}
												</script>
									</span>
								</div>
							</div>
						</div>
					</li>
					<li class="rb-span-2">
						<h3>Question and Answer</h3>
						<span class="rb-temp">To be Clearly</span>
						<div class="rb-overlay">
							<span class="rb-close">close</span>
							<div class="rb-week">
								<div>
									<span>
										Q &#38; A will come soon.
									</span>
								</div>
								<div></div>
								<div></div>
							</div>
						</div>
					</li>
					<li class="rb-span-4">
						<h3>Comments</h3>
						<span class="rb-temp">Tell others Your Feelings</span>
						<div class="rb-overlay">
							<span class="rb-close">close</span>
							<div class="rb-week">
								<div>
									<span>Comments:</span>

									@if ($groupComment)
										@foreach ($groupComment as $comment)
											<span class="span-content">{{$comment->nickName}}</span>
											<span class="span-content">{{$comment->comment}}</span>
											<span class="span-content">{{$comment->date}}</span>
										@endForeach
									@else
										<span class="span-content">No Comment Yet.</span>
									@endIf
								</div>
								<div></div>
								<div>
									<span class="span-content">
									<textarea rows="30" cols="50" placeholder="what do u want to say?"></textarea>
									<a href="#">Submit</a>
									</span>
								</div>
							</div>
						</div>
					</li>
	
<!--					<li class="icon-clima-4 rb-span-4">
						<h3>Sydney</h3><span class="rb-temp">25°C</span>
						<div class="rb-overlay">
							<span class="rb-close">close</span>
							<div class="rb-week">
								<div><span class="rb-city">Sydney</span><span class="icon-clima-4"></span><span>28°C</span></div>
								<div><span>Mon</span><span class="icon-clima-4"></span><span>24°C</span></div>
								<div><span>Tue</span><span class="icon-clima-4"></span><span>26°C</span></div>
								<div><span>Wed</span><span class="icon-clima-2"></span><span>27°C</span></div>
								<div><span>Thu</span><span class="icon-clima-2"></span><span>30°C</span></div>
								<div><span>Fri</span><span class="icon-clima-8"></span><span>31°C</span></div>
								<div><span>Sat</span><span class="icon-clima-8"></span><span>29°C</span></div>
								<div><span>Sun</span><span class="icon-clima-8"></span><span>29°C</span></div>
							</div>
						</div>
				</li>
-->					</ul>


			@if ($isSelf)
				<div class="my-praise">
					<a href="{{ URL('group/handle/'.$group->id.'/edit') }}">edit</a>
						<form action="{{ URL('group/handle/'.$group->id) }}" method="post" style="display:inline">
							<input type="hidden" name="_method" value="delete">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<button type="submit">delete</button>
						</form>
				</div>
			@else
				<div class="my-praise">
					<a href="{{ URL('group/viewgroup/'.$group->id.'/praise') }}">praise</a>
					<a href="#">collection</a>
				</div>
			@endIf
			</div>
		</div><!-- /container -->
		<script src="{{URL('check-group-js/jquery-1.11.3.min.js')}}"></script>
		<script src="{{URL('check-group-js/jquery.fittext.js')}}"></script>
		<script src="{{URL('check-group-js/boxgrid.js')}}"></script>
		<script>
			$(function() {
				Boxgrid.init();		
			});
		</script>
	</body>
</html>