<!DOCTYPE html>
<html>  
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="index-css/extra.css" />
    <link rel="stylesheet" href="index-css/flexinav.css" />
    <link rel="stylesheet" href="index-css/scrollbars.css" /> 
    <script src="index-js/scripts.js"></script>
    <script src="index-js/flexinav.js"></script>
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
                                <a href="note"><i class="fa fa-music"></i>Travel Note</a>
                            </li>
                            <li>
                                <a href="group"><i class="fa fa-music"></i>Travel Group</a>
                            </li>
                        </ul>                       
                    </div>
                </li>
                <li><span><i class="fa fa-arrows-v"></i>My Notify</span>
                    <div class="flexinav_ddown_scroll flexinav_ddown flexinav_ddown_320">
                        <div class="colrow">
                            <div class="col12">
                                @if (Auth::user())
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro, ipsa ab illum natus earum eum officia dolor ipsam sed vel adipisci sapiente voluptas placeat consequuntur reiciendis aut cupiditate id fuga.</p>
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
                                <img src="pic/head.png" class="head-img">
                                <ul class="flexinav_icons">
                                    <li><a href="mailbox"><i class="fa fa-gears"></i>MailBox</a></li>
                                    <li><a href="#"><i class="fa fa-heart"></i>Friend</a></li>
                                    <li><a href="#"><i class="fa fa-magic"></i>My Group</a></li>
                                    <li><a href="#"><i class="fa fa-video-camera"></i>My Note</a></li>
                                    <li><a href="#"><i class="fa fa-music"></i>Collection</a></li>
                                    <li><a href="auth/logout"><i class="fa fa-music"></i>Logout</a></li>
                                </ul>
                                                            
                            </div>                            
                        </div>
                    </div>
                </li>

                @else

                <li><span><i class="fa fa-columns"></i><a href="auth/register">Sign up</a></span>
                </li>
                <li><span><i class="fa fa-columns"></i><a href="auth/login">Sign in</a></span>
                </li>

                @endIf

            </ul><!-- Flexinav -->
        </div><!-- Flexinav Container -->
    </div><!-- END FLEXINAV -->
</div>

<div class="spotlight">
    <img src="pic/temp.jpg">
</div>

@yield ('content')

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