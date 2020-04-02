<!DOCTYPE html>
<html lang="zxx">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{$gn->site_name}}</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{asset($gn->site_icon)}}" type="image/x-icon">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/bootstrap.min.css">
    <!-- fontawesome icon  -->
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/fontawesome.min.css">
    <!-- flaticon css -->
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/fonts/flaticon.css">
    <!-- animate.css -->
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/animate.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/owl.carousel.min.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/magnific-popup.css">
    <!-- stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/style.css">
    <!-- responsive -->
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/responsive.css">
</head>

<body>
<!-- preloader begin-->
<div class="sec">
    <div class="loader">
        <div class="circle item0"></div>
        <div class="circle item1"></div>
        <div class="circle item2"></div>
    </div>
</div>
<!-- preloader end -->

<!-- header begin-->
<div class="header">
    <div class="header-top">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-5 col-lg-5">
                    <div class="support-bar-left">
                        <ul>
                            <li><span><i class="fas fa-phone-square"></i></span>+{{$gn->site_phone}}</li>
                            <li><span><i class="fas fa-envelope"></i></span>{{$gn->site_email}}</li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-3 col-lg-3 d-xl-flex d-lg-flex d-block align-items-center">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-7 d-xl-block d-lg-block d-flex align-items-center">
                            <div class="logo-img">
                                <a href="{{route('front')}}"><img src="{{asset($gn->site_logo)}}" style="height: 190px;width: 225px;" alt=""></a>
                            </div>
                        </div>
                        <div class="d-xl-none d-lg-none d-block col-5">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-9 d-xl-flex d-lg-flex d-block align-items-center">
                    <div class="mainmenu">
                        <nav class="navbar navbar-expand-lg">

                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('front')}}">HOME</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('aboutus')}}">ABOUT US</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('plans')}}">PLANS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('faq')}}">FAQ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('contact')}}">CONTACT</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false">
                                            ACCOUNTS
                                        </a>
                                        @guest
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                            <a class="dropdown-item" href="{{route('login')}}">Login</a>
                                            <a class="dropdown-item" href="{{route('register')}}">Register</a>
                                        </div>
                                            @else
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                                <a class="dropdown-item" href="{{route('home')}}">Dashboard</a>
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        @endguest
                                    </li>

                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- header end -->
@yield('front')
<!-- footer begin-->
<div class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="about-area">
                        <img src="{{ asset('assets/frontend/img/logolight.jpg') }}" style="height: 210px;width:300px;" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-3">
                    <div class="useful-link">
                        <h3>Company Info</h3>
                        <ul>
                            <li><a href="{{ route('aboutus') }}"><span><i class="fas fa-chevron-right"></i></span>About Company</a></li>
                            <li><a href="{{ route('plans') }}"><span><i class="fas fa-chevron-right"></i></span>Investment Plans</a></li>
                            <li><a href="{{route('privacy')}}"><span><i class="fas fa-chevron-right"></i></span>Privacy Policy</a></li>

                        </ul>
                    </div>
                </div>

                {{-- <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="secure-area">
                        <h3>We Are Secure</h3>
                        <div class="logo">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-logo">
                                    <div class="single-logo">
                                        <img src="{{asset('assets/frontend/')}}/img/payment-1.png" alt="">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-logo">
                                    <div class="single-logo">
                                        <img src="{{asset('assets/frontend/')}}/img/payment-1.png" alt="">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 d-xl-flex d-lg-flex align-items-center">
                    <div class="copyright">
                        <?php
                            $time = \Carbon\Carbon::now()->format('Y');
                        ?>
                        <p>Copyright © {{$time}} {{$gn->site_name}}.</p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- footer end -->

<!-- jquery -->
<script src="{{asset('assets/frontend/')}}/js/jquery-3.3.1.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/jquery-migrate-3.0.1.js"></script>
<!-- bootstrap -->
<script src="{{asset('assets/frontend/')}}/js/bootstrap.min.js"></script>
<!-- owl carousel -->
<script src="{{asset('assets/frontend/')}}/js/owl.carousel.js"></script>
<!-- magnific popup -->
<script src="{{asset('assets/frontend/')}}/js/jquery.magnific-popup.js"></script>
<!-- counter up js -->
<script src="{{asset('assets/frontend/')}}/js/jquery.counterup.min.js"></script>
<!-- way poin js-->
<script src="{{asset('assets/frontend/')}}/js/waypoints.min.js"></script>
<!-- wow js-->
<script src="{{asset('assets/frontend/')}}/js/wow.min.js"></script>
<!-- main -->
<script src="{{asset('assets/frontend/')}}/js/main.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('layouts.message')



<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5e41c65e298c395d1ce73943/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

</body>


</html>
