<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Home Care</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('user_side_assets/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('user_side_assets/css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('user_side_assets/css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('user_side_assets/images/fevicon.png') }}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('user_side_assets') }}/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="{{ asset('user_side_assets') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('user_side_assets') }}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
</head>

<body>
    <!-- header section start -->
    <div class="header_section">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="logo"><a href="{{ route('home') }}">

                </a></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto" style="
            margin-left: 200px;
        ">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('patient.appointment') }}">Appointment</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('appointment.fee')}}">Account Book</a>
                            </li>
                        @else
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ url('/') }}">Home</a>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('patient.appointment')}}">Contact Us</a>
                            </li>
                        @endauth
                    @endif

                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
        <!-- header section end -->
        <!-- banner section start -->
        <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="banner_section">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <h1 class="banner_taital">Health <br><span style="color: #151515;">Care</span></h1>
                                    <p class="banner_text">There are many variations of passages of Lorem Ipsum</p>
                                    <div class="btn_main">
                                        <div class="more_bt"><a href="{{route('patient.appointment')}}">Contact Now</a></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="image_1"><img src="{{ asset('user_side_assets') }}/images/greenbanner1.png" style="height: 500px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="banner_section">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <h1 class="banner_taital">Health <br><span style="color: #151515;">Care</span>
                                    </h1>
                                    <p class="banner_text">There are many variations of passages of Lorem Ipsum</p>

                                </div>
                                <div class="col-md-6">
                                    <div class="image_1"><img src="{{ asset('user_side_assets') }}/images/greenbanner2.png" style="height: 500px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="banner_section">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <h1 class="banner_taital">Health <br><span style="color: #151515;">Care</span>
                                    </h1>
                                    <p class="banner_text">There are many variations of passages of Lorem Ipsum</p>

                                </div>
                                <div class="col-md-6">
                                    <div class="image_1"><img src="{{ asset('user_side_assets') }}/images/img-1.png" style="height: 500px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                <i class="fa fa-long-arrow-left" style="font-size:24px; padding-top: 4px;"></i>
            </a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                <i class="fa fa-long-arrow-right" style="font-size:24px; padding-top: 4px;"></i>
            </a>
        </div>
    </div>
    <!-- banner section end -->
    <!-- health section start -->
    <div class="health_section layout_padding">
        <div class="container">
            <h1 class="health_taital">Best Of Health care for you</h1>
            <p class="health_text">Time and health are two precious assets that we don't recognize and appreciate until they have been depleted</p>
            <div class="health_section layout_padding">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="image_main">
                            <div class="main">
                                <img src="{{ asset('user_side_assets') }}/images/img-2.png" alt="Avatar"
                                    class="image" style="width:100%">
                            </div>
                            <div class="middle">
                                <div class="text"><img src="{{ asset('user_side_assets') }}/images/icon-1.png"
                                        style="width: 40px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="image_main_1">
                            <div class="main">
                                <img src="{{ asset('user_side_assets') }}/images/img-3.png" alt="Avatar"
                                    class="image" style="width:100%">
                            </div>
                            <div class="middle">
                                <div class="text"><img src="{{ asset('user_side_assets') }}/images/icon-1.png"
                                        style="width: 40px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- health section end -->
    <!-- knowledge section end -->
    <div class="knowledge_section layout_padding">
        <div class="container">
            <div class="knowledge_main">
                <div class="left_main">
                    <h1 class="knowledge_taital">Knowledge of center</h1>
                    <p class="knowledge_text">???The chapter you are learning today is going to save someone???s life tomorrow. Pay attention.???</p>
                </div>
                <div class="right_main">
                    <div class="play_icon"><a href="#"><img
                                src="{{ asset('user_side_assets') }}/images/play-icon.png"></a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- knowledge section end -->
    <!-- news section start -->
    <div class="news_section layout_padding">
        <div class="container">
            <h1 class="health_taital">Why choose 24hr home care</h1>
            <p class="health_text">labore et dolore magna aliqua. Ut enim ad minim veniam</p>
            <div class="news_section_2 layout_padding">
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="box_main">
                            <div class="icon_1"><img src="{{ asset('user_side_assets') }}/images/icon-2.png"></div>
                            <h4 class="daily_text">Daily care experts</h4>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="box_main active">
                            <div class="icon_1"><img src="{{ asset('user_side_assets') }}/images/icon-3.png"></div>
                            <h4 class="daily_text_1">Available 24/7</h4>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="box_main">
                            <div class="icon_1"><img src="{{ asset('user_side_assets') }}/images/icon-4.png"></div>
                            <h4 class="daily_text_1">Balanced care</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- news section end -->
    @yield('content')
    <!-- client section start -->
    <div class="client_section layout_padding">
        <div id="my_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <h1 class="client_taital">What People Say</h1>
                        <p class="client_text">It is a long established fact that a reader will be distracted </p>
                        <div class="client_section_2">
                            <div class="client_left">
                                <div><img src="{{ asset('user_side_assets') }}/images/client-2.png"
                                        class="client_img"></div>
                            </div>
                            <div class="client_right">
                                <h3 class="distracted_text">Distracted by</h3>
                                <p class="lorem_text">It is a long established fact that a reader will be distracted by
                                    the readable content of a page when looking at its layout. The point of using Lorem
                                    Ipsum is that it has a more-or-less normal distribution of letters</p>
                                <div class="quote_icon"><img
                                        src="{{ asset('user_side_assets') }}/images/quote-icon.png"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <h1 class="client_taital">What People Say</h1>
                        <p class="client_text">It is a long established fact that a reader will be distracted </p>
                        <div class="client_section_2">
                            <div class="client_left">
                                <div><img src="{{ asset('user_side_assets') }}/images/client-3.png"
                                        class="client_img"></div>
                            </div>
                            <div class="client_right">
                                <h3 class="distracted_text">Distracted by</h3>
                                <p class="lorem_text">It is a long established fact that a reader will be distracted by
                                    the readable content of a page when looking at its layout. The point of using Lorem
                                    Ipsum is that it has a more-or-less normal distribution of letters</p>
                                <div class="quote_icon"><img
                                        src="{{ asset('user_side_assets') }}/images/quote-icon.png"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <h1 class="client_taital">What People Say</h1>
                        <p class="client_text">It is a long established fact that a reader will be distracted </p>
                        <div class="client_section_2">
                            <div class="client_left">
                                <div><img src="{{ asset('user_side_assets') }}/images/client-img.png"
                                        class="client_img"></div>
                            </div>
                            <div class="client_right">
                                <h3 class="distracted_text">Distracted by</h3>
                                <p class="lorem_text">It is a long established fact that a reader will be distracted by
                                    the readable content of a page when looking at its layout. The point of using Lorem
                                    Ipsum is that it has a more-or-less normal distribution of letters</p>
                                <div class="quote_icon"><img
                                        src="{{ asset('user_side_assets') }}/images/quote-icon.png"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                <i class="fa fa-long-arrow-left" style="font-size:24px; padding-top: 4px;"></i>
            </a>
            <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                <i class="fa fa-long-arrow-right" style="font-size:24px; padding-top: 4px;"></i>
            </a>
        </div>
    </div>
    <!-- client section end -->
    <!-- footer section start -->
    <div class="footer_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6">

                    <h1 class="adderss_text">Contact Us</h1>
                    <div class="map_icon"><img src="{{ asset('user_side_assets') }}/images/map-icon.png"><span
                            class="paddlin_left_0">Bagbanpura Lahore cantt</span></div>
                    <div class="map_icon"><img src="{{ asset('user_side_assets') }}/images/call-icon.png"><span
                            class="paddlin_left_0">+922343242</span></div>
                    <div class="map_icon"><img src="{{ asset('user_side_assets') }}/images/mail-icon.png"><span class="paddlin_left_0">opd@gmail.com</span></div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <h1 class="adderss_text">Doctors</h1>
                    <div class="hiphop_text_1">There are many variations of passages of  available, but the
                        majority have suffered alteration in some form, by injected humour,</div>
                </div>

            </div>
        </div>
    </div>
    <!-- footer section end -->
    <!-- copyright section start -->
    <div class="copyright_section">
        <div class="container">
            <p class="copyright_text">2022 All Rights Reserved</p>
        </div>
    </div>
    <!-- copyright section end -->
    <!-- Javascript files-->
    <script src="{{ asset('user_side_assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('user_side_assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('user_side_assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('user_side_assets/js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('user_side_assets/js/plugin.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('user_side_assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('user_side_assets/js/custom.js') }}"></script>
    <!-- javascript -->
    <script src="{{ asset('user_side_assets/js/owl.carousel.js') }}"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>

</html>
