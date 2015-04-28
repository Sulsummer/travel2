@extends ('layout.default')

@section ('content')
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
@endSection