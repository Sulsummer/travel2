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

<script type="text/javascript" src="{{URL('user-page-js/jquery-1.9.1.js')}}"></script>
<script type="text/javascript" src="{{URL('user-page-js/tabs.js')}}"></script>

</head>

<body>
   
<br>
<!-- Start Tabs -->
<div class="tabs">

<!-- Start Container tab1 -->
  <div id="tab1" class="container">
  
    <div class="label" id="l1">
      <h5><a href="#tab1" id="a1">Info</a></h5>
    </div>
    
    <div class="content left" id="content1">
      <h4>Personal Infomation</h4>
      @if ($isFriend)
        <h5><a href="{{ URL('user/viewuser/'.$user->id.'/apply') }}">Add Friends!</a></h5>
      @endIf
      <p>NickName:
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        {{$user->nickName}}
      </p>
      <p>Hot Level:
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        {{$user->popularity}}
      </p>
      <p>Email:
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        {{$user->email}}
      </p>
      <p>Date:
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        {{$user->date}}
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

<!-- Start Container tab4 -->  
  <div id="tab4" class="container">
  
    <div class="label" id="l4">
      <h5><a href="#tab4">His/Her Group</a></h5>
    </div>
    
    <div class="content" id="content4">
      <h4>His/Her Group</h4>
      
      <h5>Owned:</h5>
      @if ($ownedGroups)
        @foreach ($ownedGroups as $ownedGroup)
          <p><a href="{{URL('group/viewgroup/'.$ownedGroup->id)}}">{{$ownedGroup->groupName}}</a></p>
        @endForeach
      @else
        <h4>What a pity!He/She's owned 0 group yet!Why not have a try?</h4>
      @endIf

      <h5>Joined:</h5>

      @if ($joinedGroups)
        @foreach ($joinedGroups as $joinedGroup)
          <p><a href="{{URL('group/viewgroup/'.$joinedGroup->id)}}">{{$joinedGroup->groupName}}</a></p>
        @endForeach
      @else
        <h4>What a pity!He/She's joined 0 group yet!Why not have a try?</h4>
      @endIf

    </div>
    
  </div>
<!-- End Container tab4 -->

<!-- Start Container tab5 -->  
  <div id="tab5" class="container">
  
    <div class="label" id="l5">
      <h5><a href="#tab5">His/Her Note</a></h5>
    </div>
    
    <div class="content" id="content5">
      <h4>His/Her Note</h4>

      @if ($notes)
        @foreach ($notes as $note)
          <p><a href="{{URL('note/viewnote/'.$note->id)}}">{{$note->noteTitle}}</a></p>
        @endForeach
      @else
        <h4>What a pity!He/She's shared 0 note yet!Why not have a try?</h4>
      @endIf
      
    </div>
    
  </div>
<!-- End Container tab5 -->

<!-- Start Container tab6 -->  
  <div id="tab5" class="container">
  
    <div class="label" id="l6">
      <h5><a href="#tab6">His/Her Friend</a></h5>
    </div>
    
    <div class="content" id="content6">
      <h4>His/Her Friend</h4>
      
      @if ($friends)
        @foreach ($friends as $friend)
          <p><a href="{{URL('user/viewuser/'.$friend->id)}}">{{$friend->nickName}}</a></p>
        @endForeach
      @else
        <h4>What a pity!He/She's got 0 friend yet!Why not have a try?</h4>
      @endIf

    </div>
    
  </div>
<!-- End Container tab6 -->

</div>
<!-- End Tabs -->

</body>
</html>
