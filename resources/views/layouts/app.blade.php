<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Artisan Gaming</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>

    @yield('scripts.header')

</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Artisan Gaming
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <!--<li><a href="{{ url('/about') }}">About</a></li>-->
                    <li><a href="{{ route('maps.game.index', ['game' => 'halo-5']) }}">Halo 5 Maps</a></li>
                    <!--<li><a href="{{ url('/minecraft/builds') }}">Minecraft Builds</a></li>-->
                    <li><a href="{{ route('articles.index') }}">Articles</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Player Tools <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Coming Soon!</a></li>
                        </ul>
                    </li>
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                    @else
                        @if (Auth::user()->isManager())
                        <li><a href="{{ url('/admin') }}">Admin</a></li>
                        @endif
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Tip Links -->
                        <li class="dropdown" style="background-color: #88cc88;">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-usd"></i>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">The Tip Wall</a></li>
                                <li><a href="{{ url('/articles/why-tips/1') }}">Why Tips?</a></li>
                                <li style="background-color: #88cc88;"><a href="https://streamtip.com/t/rogueartisan"><i class="fa fa-usd"></i> Tip Artisan</a></li>
                            </ul>
                        </li>
                    <!-- Social Links -->
                        <li><a href="http://twitter.com/ArtisanGaming"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="http://twitch.tv/RogueArtisan"><i class="fa fa-twitch"></i></a></li>
                        <li><a href="http://instagram.com/ArtisanGaming"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="http://youtube.com/ArtisanGG"><i class="fa fa-youtube-play"></i></a></li>
                        <li><a href="http://facebook.com/ArtisanGG"><i class="fa fa-facebook"></i></a></li>
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('users.show', ['user' => $user->name]) }}"><i class="fa fa-btn fa-user"></i>Profile</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>


    @yield('content')

    <br />
    <br />
    <br />
    <!--<div class="container-fluid" style="background-color: #000055; color: #ffffff;">
        <div class="row">
            @yield('footer')
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="center-block">Artisan Gaming &copy; 2016</div>
            </div>
        </div>
    </div>-->








<footer id="footerWrapper">
    <section id="mainFooter" style="background-color: #222244; color: #ababcc; font-size: 90%; padding: 25px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="footerBlock">
                        <img src="" alt="" id="footerLogo">
                        <p>I built this website out of my love for gaming and I hope it serves the community well. I've devoted countless hours to the development of my maps, writing articles, and programming the tools here. I hope to keep my website ad-free, so if you enjoy the content, you may <a href="http://streamtip.com/t/rogueartisan">leave a tip</a> to show your appreciation.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footerBlock">

                        <h3>Want to help out?</h3>
                            <p>
                                Let me know! My gamertag is Rogue Artisan
                            </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footerBlock">
                        <h3>Follow me on...</h3>
                        <div class="row">
                            <div class="col-md-2 col-md-offset-1"><a href="http://twitter.com/ArtisanGaming" style="color: #aaaacc;"><i class="fa fa-2x fa-twitter"></i></a></div>
                            <div class="col-md-2"><a href="http://twitch.tv/RogueArtisan" style="color: #aaaacc;"><i class="fa fa-2x fa-twitch"></i></a></div>
                            <div class="col-md-2"><a href="http://instagram.com/ArtisanGaming" style="color: #aaaacc;"><i class="fa fa-2x fa-instagram"></i></a></div>
                            <div class="col-md-2"><a href="http://youtube.com/ArtisanGG" style="color: #aaaacc;"><i class="fa fa-2x fa-youtube-play"></i></a></div>
                            <div class="col-md-2"><a href="http://facebook.com/ArtisanGG" style="color: #aaaacc;"><i class="fa fa-2x fa-facebook"></i></a></div>
                        </div>     
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="footerBase" style="background-color: #000022; color: #676788; font-size: 75%; padding: 15px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    Copyright © 2017 Artisan Gaming / All rights reserved.
                </div>
            </div>
        </div>
    </section>
</footer>









    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    @yield('scripts.footer')

</body>
</html>
