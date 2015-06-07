<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<title>Travel!</title>
		<link rel="stylesheet" type="text/css" href="{{URL('read-note-css/jquery.jscrollpane.custom.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{URL('read-note-css/bookblock.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{URL('read-note-css/custom.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{URL('read-note-css/read-note-extra.css')}}" />
		<script src="{{URL('read-note-js/modernizr.custom.79639.js')}}"></script>
	</head>
	<body>
		<div class="my-back">
			<a href="{{URL('note')}}">⬅️back</a>
		</div>
		<div id="container" class="container">	
			<div class="bb-custom-wrapper">
				<div id="bb-bookblock" class="bb-bookblock">
					<div class="bb-item" id="item1">
						<div class="content">
							<div class="scroller">
								<h2>{{$note->noteTitle}}</h2>
								<p>{{$note->date}}</p>
								<p>{{$author->nickName}}</p>
								<p>{{$note->noteContent}}</p>
								@if ($isSelf)
									<div class="my-praise">
										<a href="{{ URL('note/handle/'.$note->id.'/edit') }}">edit</a>
										<form action="{{ URL('note/handle/'.$note->id) }}" method="post" style="display:inline">
											<input type="hidden" name="_method" value="delete">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<button type="submit">delete</button>
										</form>
									</div>
								@else
									<div class="my-praise">
										<a href="{{ URL('note/viewnote/'.$note->id.'/praise') }}">praise</a>
										<a href="#">collection</a>
									</div>
								@endIf
							</div>
						</div>
					</div>
				</div>
			</div>
				
		</div><!-- /container -->
		<script src="{{URL('read-note-js/jquery-1.11.3.min.js')}}"></script>
		<script src="{{URL('read-note-js/jquery.mousewheel.js')}}"></script>
		<script src="{{URL('read-note-js/jquery.jscrollpane.min.js')}}"></script>
		<script src="{{URL('read-note-js/jquerypp.custom.js')}}"></script>
		<script src="{{URL('read-note-js/jquery.bookblock.js')}}"></script>
		<script src="{{URL('read-note-js/page.js')}}"></script>
		<script>
			$(function() {

				Page.init();

			});
		</script>
	</body>
</html>
