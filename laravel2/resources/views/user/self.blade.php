<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Travel!</title>

<link rel="stylesheet" type="text/css" href="{{URL('user-page-css/reset.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('user-page-css/stylesheet.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('user-page-css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('user-page-css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('user-page-css/color.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('user-page-css/extra.css')}}">

<script type="text/javascript" src="{{URL('user-page-js/jquery-1.9.1.js')}}"></script>
<script type="text/javascript" src="{{URL('user-page-js/tabs.js')}}"></script>

</head>

<body>
    <div class="my-back">
      <a href="{{URL('/')}}">back</a>
    </div>

<!-- Start Tabs -->
<div class="tabs">

<!-- Start Container tab1 -->
  <div id="tab1" class="container">
  
    <div class="label" id="l1">
      <h5><a href="#tab1" id="a1">Info</a></h5>
    </div>
    
    <div class="content left" id="content1">
      <h4>Personal Infomation</h4>
      <p>NickName:
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        {{$self->nickName}}
      </p>
      <p>Hot Level:
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        {{$self->popularity}}
      </p>
      <p>Email:
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        {{$self->email}}
      </p>
      <p>Date:
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        {{$self->date}}
      </p>
      <p>Self Intro:
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Self introduction should be here.
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;
        Will come soon.
      </p>

      
      
       
    </div>
    
  </div>
<!-- End Container tab1 -->

<!-- Start Container tab2 -->
  <div id="tab2" class="container">
  
    <div class="label" id="l2">
      <h5><a href="#tab2" id="a2">Mailbox</a></h5>
    </div>
    
    <div class="content" id="content2">
      <h4>Mail Box</h4>
      @if ($persons)
        @foreach ($persons as $person)
          <p><a href="{{URL('mailbox/viewmsg/'.$person->id)}}">{{$person->nickName}}</a></p>
        @endForeach
      @else
        <h4>No mail yet!</h4>
      @endIf
    </div>
    
  </div>
<!-- End Container tab2 --> 

<!-- Start Container tab3 --> 
  <div id="tab3" class="container">
  
    <div class="label" id="l3">
      <h5><a href="#tab3">Application</a></h5>
    </div>
    
    <div class="content" id="content3">
      <h4>Application</h4>
      
      <h5>Apply to handle</h5>
      @if ($applyToHandles)
        @foreach ($applyToHandles as $applyToHandle)
                <p>
                  <a href="{{ URL('user/viewuser/'.$applyToHandle->userId) }}">{{ $applyToHandle->nickName }}</a>
                  wants to be your friend!
                
                <form method="post" action="{{ URL('user/ok') }}" style="float:left">
                  <input type="hidden" name="applyId" value="{{$applyToHandle->id}}">
                  <input type="hidden" name="userId" value="{{$applyToHandle->userId}}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit">Ok</button>
                </form>
                <form style="float:left">
                  <button type="submit">Deny</button>
                </form>
                </p>
        @endForeach
      @endIf

      <h5>Apply has handled</h5>
      @if ($applyHasHandles)
            @foreach ($applyHasHandles as $applyHasHandle)
                <p>
                  <a href="{{ URL('user/viewuser/'.$applyHasHandle->userId) }}">{{ $applyHasHandle->nickName }}</a>
                  wants to be your friend!
                  <form method="post" action="user/delete">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="applyId" value="{{ $applyHasHandle->id}}">
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </p>
            @endForeach
      @endIf

    </div>
    
  </div>
<!-- End Container tab2 -->

<!-- Start Container tab4 -->  
  <div id="tab4" class="container">
  
    <div class="label" id="l4">
      <h5><a href="#tab4">My Group</a></h5>
    </div>
    
    <div class="content" id="content4">
      <h4>My Group</h4>
      
      <h5>Owned:</h5>
      @if ($ownedGroups)
        @foreach ($ownedGroups as $ownedGroup)
          <p><a href="{{URL('group/viewgroup/'.$ownedGroup->id)}}">{{$ownedGroup->groupName}}</a></p>
        @endForeach
      @else
        <h4>What a pity!You've owned 0 group yet!Why not have a try?</h4>
      @endIf

      <h5>Joined:</h5>

      @if ($joinedGroups)
        @foreach ($joinedGroups as $joinedGroup)
          <p><a href="{{URL('group/viewgroup/'.$joinedGroup->id)}}">{{$joinedGroup->groupName}}</a></p>
        @endForeach
      @else
        <h4>What a pity!You've joined 0 group yet!Why not have a try?</h4>
      @endIf

    </div>
    
  </div>
<!-- End Container tab4 -->

<!-- Start Container tab5 -->  
  <div id="tab5" class="container">
  
    <div class="label" id="l5">
      <h5><a href="#tab5">My Note</a></h5>
    </div>
    
    <div class="content" id="content5">
      <h4>My Note</h4>

      @if ($notes)
        @foreach ($notes as $note)
          <p><a href="{{URL('note/viewnote/'.$note->id)}}">{{$note->noteTitle}}</a></p>
        @endForeach
      @else
        <h4>What a pity!You've shared 0 note yet!Why not have a try?</h4>
      @endIf
      
    </div>
    
  </div>
<!-- End Container tab5 -->

<!-- Start Container tab6 -->  
  <div id="tab5" class="container">
  
    <div class="label" id="l6">
      <h5><a href="#tab6">My Friend</a></h5>
    </div>
    
    <div class="content" id="content6">
      <h4>My Friend</h4>
      
      @if ($friends)
        @foreach ($friends as $friend)
          <p><a href="{{URL('user/viewuser/'.$friend->id)}}">{{$friend->nickName}}</a></p>
        @endForeach
      @else
        <h4>What a pity!You've got 0 friend yet!Why not have a try?</h4>
      @endIf

    </div>
    
  </div>
<!-- End Container tab6 -->

</div>
<!-- End Tabs -->

</body>
</html>
