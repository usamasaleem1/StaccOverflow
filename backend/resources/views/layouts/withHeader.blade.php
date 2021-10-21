<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{asset("fonts/icomoon/style.css")}}">

    <link rel="stylesheet" href="{{asset("css/owl.carousel.min.css")}}">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/fontawesome.min.css"
          integrity="sha512-Rcr1oG0XvqZI1yv1HIg9LgZVDEhf2AHjv+9AuD1JXWGLzlkoKDVvE925qySLcEywpMAYA/rkg296MkvqBF07Yw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/regular.min.css"
          integrity="sha512-lQP1BiSutAy+g9L+bDr1v9758SFLCJ1fK+6tXzu5M22G7/pigzb+01L31Cu1TUlWYr3lnQ4XQVmQfnpTZVW1Og=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/solid.min.css"
          integrity="sha512-WTx8wN/JUnDrE4DodmdFBCsy3fTGbjs8aYW9VDbW8Irldl56eMj8qUvI3qoZZs9o3o8qFxfGcyQocUY0LYZqzQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">

    <!-- Style -->
    <link rel="stylesheet" href="{{asset("css/style.css")}}">

    <title>@yield("title")</title>

    @yield("styles")
</head>
<body>
<div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<header class="site-navbar" role="banner">

    <div class="container">
        <div class="row align-items-center">

            <div class="col-11 col-xl-2">
                <h1 class="mb-0 site-logo"><a href="home" class="text-white mb-0">Stacc Overflow</a></h1>
            </div>
            <div class="col-12 col-md-10 d-none d-xl-block">
                <nav class="site-navigation position-relative text-right" role="navigation">

                    <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                        <li class="active"><a href="{{ url("")  }}"><span>Welcome</span></a></li>
                        <li class="has-children">
                            <a href="/"><span>View Questions</span></a>
                            <ul class="dropdown arrow-top">
                                <li><a href="#">Latest</a></li>
                                <li><a href="#">Most Popular</a></li>
                                <li><a href="#">Most Controversial</a></li>
                                </li>
                            </ul>
                        </li>
                        <li><a href="{{ route("post")  }}"><span>Post a Question</span></a></li>
                        <li>
                            @auth
                                <a href="settings"><span>Account Settings</span></a>
                            @endauth
                        </li>
                        <li>
                            @auth
                                <a style="cursor: pointer"
                                   onclick="document.getElementById('logout_form').submit()"><span>Logout</span></a>
                            @else
                                <a href="{{route("login")}}"><span>Login</span></a>
                            @endauth

                            {{--  This form is userd for logout --}}
                            <form id="logout_form" class="d-none" method="POST" action="{{ route("logout")  }}">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>


            <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;">
                <a href="#" class="site-menu-toggle js-menu-toggle text-white">
                    <span class="icon-menu h3"></span>
                </a>
            </div>
        </div>
    </div>

</header>

<div class="container">
    @yield("content")
</div>

<script src="{{asset("js/jquery-3.3.1.min.js")}}"></script>
<script src="{{asset("js/popper.min.js")}}"></script>
<script src="{{asset("js/bootstrap.min.js")}}"></script>
<script src="{{asset("js/jquery.sticky.js")}}"></script>
<script src="{{asset("js/main.js")}}"></script>
</body>
<br>
<br>
</html>
