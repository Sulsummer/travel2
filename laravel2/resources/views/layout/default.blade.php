<!DOCTYPE html>  
<html lang="zh-CN">  
<head>  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Travel</title>

  <link href="/css/app.css" rel="stylesheet">
  

  <!-- Fonts -->
  <link href='http://fonts.useso.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
</head>  
<body>

  <div class="container" style="margin-top: 20px;">
    <div id="title" style="text-align: center;">
      <a href="http://travel2.cn"><h1>Travel</h1></a>
      <div style="padding: 5px; font-size: 16px;">Travl Test</div>
    </div>
 
    <hr>

    <div class="row">
      <div class="col-md-4">
      </div>  
      @if ($user = Auth::user())
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-body">
          
            <p>{{ $user->id }}</p>
            <p>{{ $user->nickName }}</p>
            <p>{{ $user->email }}</p>
            <a href="{{ URL('auth/logout') }}">logout</a>

          </div>
      </div>
    </div>
  @endIf

  <div class="col-md-4">
  </div>
</div>

    @yield('content')
    
    <div id="footer" style="text-align: center; border-top: dashed 3px #eeeeee; margin: 50px 0; padding: 20px;">
      ©2015 <a href="http://travel2.cn">Summer</a>
    </div>
  </div>


</body>  
</html>  