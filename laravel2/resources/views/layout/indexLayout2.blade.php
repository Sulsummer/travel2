<!DOCTYPE html>
<html>  
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="{{URL('index-css/extra.css')}}" />
    <link rel="stylesheet" href="{{URL('index-css/flexinav.css')}}" />
    <link rel="stylesheet" href="{{URL('index-css/scrollbars.css')}}" />
    <link rel="stylesheet" href="{{URL('index-hover-css/app.css')}}">
    <link rel="stylesheet" href="{{URL('index-hover-css/index.css')}}">
    <link rel="stylesheet" href="{{URL('index-hover-css/fonts.css')}}"> 
    <script src="{{URL('index-js/scripts.js')}}"></script>
    <script src="{{URL('index-js/flexinav.js')}}"></script>
    <title>Travel!</title>
</head>
<body>

<div class="nav">
    <div id="flexinav1" class="flexinav flexinav_grey"><!-- BEGIN FLEXINAV -->
        <div class="flexinav_wrapper"><!-- Flexinav Container -->
            <ul class="flexinav_menu">
                <li class="flexinav_collapse"><span><i class="fa fa-bars"></i>Navigation</span></li>
                <li><a href="/"><h1 style="margin:0 auto;">Travel</h1></a></li>
            </ul>
            <ul class="flexinav_menu flexinav_menu_right">
                <li><span><i class="fa fa-plus"></i>Quick Access</span>
                    <div class="flexinav_ddown flexinav_ddown_fly_out flexinav_ddown_240">
                        <ul class="dropdown_flyout">
                            <li class="flyout_heading">Find</li>
                            <li>
                                <a href="{{URL('note')}}"><i class="fa fa-music"></i>Travel Note</a>
                            </li>
                            <li>
                                <a href="{{URL('group')}}"><i class="fa fa-music"></i>Travel Group</a>
                            </li>
                        </ul>                       
                    </div>
                </li>
                <li><span><i class="fa fa-arrows-v"></i>My Notify</span>
                    <div class="flexinav_ddown_scroll flexinav_ddown flexinav_ddown_320">
                        <div class="colrow">
                            <div class="col12">
                                @if (Auth::user())
                                <p>User Notifies will be here.</p>
                                @else
                                Please Login.
                                @endIf
                            </div>                            
                        </div>
                    </div>
                </li>


                @if (Auth::user())

                <li><span><i class="fa fa-columns"></i>About Me</span>
                    <div class="flexinav_ddown flexinav_ddown_640 flexinav_ddown_right">
                        <div class="colrow">
                            <div class="col8">
                                <h2>News on my friends</h2>
                                <p>Summer has did what.</p>
                                <p>Summer has did what.</p>
                                <p>Summer has did what.</p>
                                <p>Summer has did what.</p>
                                <p>Summer has did what.</p>
                                
                            </div>                            
                            <div class="col4">
                                <a href="{{URL('user')}}"><img src="{{URL('pic/head.png')}}" class="head-img"></a>
                                <ul class="flexinav_icons">
                                    <li><a href="{{URL('user')}}"><i class="fa fa-gears"></i>MailBox</a></li>
                                    <li><a href="{{URL('user')}}"><i class="fa fa-heart"></i>Friend</a></li>
                                    <li><a href="{{URL('user')}}"><i class="fa fa-magic"></i>My Group</a></li>
                                    <li><a href="{{URL('user')}}"><i class="fa fa-video-camera"></i>My Note</a></li>
                                    <li><a href="{{URL('user')}}"><i class="fa fa-music"></i>Collection</a></li>
                                    <li><a href="{{URL('auth/logout')}}"><i class="fa fa-music"></i>Logout</a></li>
                                </ul>                       
                            </div>                            
                        </div>
                    </div>
                </li>

                @else

                <li><span><i class="fa fa-columns"></i><a href="{{URL('auth/register')}}">Sign up</a></span>
                </li>
                <li><span><i class="fa fa-columns"></i><a href="{{URL('auth/login')}}">Sign in</a></span>
                </li>

                @endIf

            </ul><!-- Flexinav -->
        </div><!-- Flexinav Container -->
    </div><!-- END FLEXINAV -->
</div>



<div class="spotlight">
    <ul class="ul items">
        <li>
            <figure class="effect-jazz">
                <img src="pic/temp.jpg">
                    <figcaption>
                        <h2>
                            Name will be here.
                        <br>
                        <br>
                        <span>
                            Captain/Author will be here.
                        </span>
                        </h2>
                        <p>
                            Brief Introduction.
                        </p>
                        <a href="#">
                            a
                        </a>
                    </figcaption>
            </figure>
        </li>     
    </ul>
</div>

<div class="my-container">
    <div class="left-field">
        @yield ('content')
    </div>

    <div class="right-field">
        @yield ('right-content')
    </div>

</div>

<div class="my-container blank-bar">
</div>

<footer>
    <div class="center">
        <a href="#">about us</a>
        &nbsp;
        <a href="#">contact us</a>
    </div>
    <p class="center">@TRAVEL</p>
</footer>

</body>
</html>