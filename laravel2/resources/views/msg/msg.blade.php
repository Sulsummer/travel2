@extends ('layout.default')

@section ('content')
<ul>
@foreach ($persons as $person)
	<li>
		<a href="{{ URL('mailbox/viewmsg/'.$person->id) }}">{{ $person->nickName }}</a>
	</li>

@endForeach
</ul>
@endSection 