<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Travel!</title>
<link rel="stylesheet" type="text/css" href="/css/app.css">
<link rel="stylesheet" type="text/css" href="/css/self.css">
<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/css/home.css">
<script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui-1.10.3.min.js"></script>
</head>
<body>
<div class="container">
  <div class="top-title">
    <a href="/"><h1>Travel</h1></a>

    <section class="mod model-1">
      <a href="{{ URL('user') }}"><div class="spinner"></div></a>
    </section>
  </div>
  <div class="self">
    @if ($user = Auth::user())
      <a href="{{ URL('user') }}"><img src="/pic/head.png"></a>

      <p><a href="{{ URL('user') }}">{{ $user->nickName }}</a></p>
      <p>{{ $user->email }}</p>
      <p><a href="{{ URL('auth/logout') }}">logout</a></p>
      <p><a href="{{ URL('user/mailbox') }}">mailbox</a></p>

    @else
      <p>Offline!</p>
      <p><a href="{{ URL('auth/login') }}">login</a></p>
      <p><a href="{{ URL('auth/register') }}">register</a></p>

    @endIf
  </div>
  <hr>
  
  <div class="row">
  <div class="my-nav">
    <a href="{{ URL('note') }}">travel note</a>
    <a href="{{ URL('group') }}">travel group</a>
  </div>
  </div>
  
  <hr>

  @yield ('content')

  <hr>
  <div class="footer top-title">&nbsp;&nbsp;&nbsp;&nbsp;@Travel</div>

</div>


</body>
</html>
<script type="text/javascript">
  $(function(){
    
    $(".mod").mouseover(function(){
      $(".self").show();
    });
    $(".self").mouseover(function(){
      $(".self").show();
    });
    $(".self").mouseout(function(){
      $(".self").hide();
    });
    $(".mod").mouseout(function(){
      $(".self").mouseout(function(){
        $(".self").hide();
      });
    });
  })
</script>