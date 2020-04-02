<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from coderthemes.com/abstack/layouts/green/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Jan 2020 20:38:39 GMT -->
<head>
    <meta charset="utf-8" />
    <title>{{$gn->site_name}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset($gn->site_icon)}}">

    <!-- App css -->
    <link href="{{asset('assets/dashboard/')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/dashboard/')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/dashboard/')}}/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

<!-- Begin page -->
<div id="wrapper">


    <!-- Topbar Start -->
    <div class="navbar-custom">
        <ul class="list-unstyled topnav-menu float-right mb-0">
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="ml-1">My Ref : {{Auth::user()->my_ref}} ||My Balance : {{number_format(Auth::user()->balance,2)}}</span>
                </a>
            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    @if(!empty(Auth::user()->image))
                    <img src="{{asset(Auth::user()->image)}}" alt="user-image" class="rounded-circle">
                    @else
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcR0SF5sKostY8H2aEocS6QaDEgGm2qISmCTeFvb3-mDix8QN-Pz" alt="user-image" class="rounded-circle">
                    @endif
                        <span class="ml-1">{{Auth::user()->name}} <i class="mdi mdi-chevron-down"></i> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <a href="{{route('user.profile')}}" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>Profile</span>
                    </a>

                    <!-- item-->
                    <a href="{{route('user.change.pass')}}" class="dropdown-item notify-item">
                        <i class="fe-lock"></i>
                        <span>Change Password</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>


        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="{{route('home')}}" class="logo text-center">
                        <span class="logo-lg">
                           <img src="{{asset($gn->site_logo)}}" alt="" style="height: 90px;width: 100px">
                            <!-- <span class="logo-lg-text-light">UBold</span> -->
                        </span>
                <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">U</span> -->
{{--                            <img src="{{asset('assets/dashboard/')}}/images/logo-sm.png" alt="" height="28">--}}
                        </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
            </li>



        </ul>
    </div>
    <!-- end Topbar -->

    <div class="modal fade" id="withcatipal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Withdraw</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('user.withdraw.capital')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            are you sure to withdraw Capiltal?
                            <input type="hidden" name="wid" value="" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Withdraw</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">

        <div class="slimscroll-menu">

            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul class="metismenu" id="side-menu">

                    <li class="menu-title">Main Menu</li>

                    <li>
                        <a href="{{route('home')}}">
                            <i class="fe-airplay"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('user.Deposit')}}">
                            <i class="fe-airplay"></i>
                            <span> Deposit </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('all.plan')}}">
                            <i class="fe-airplay"></i>
                            <span> Plan </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('my.plan')}}">
                            <i class="fe-airplay"></i>
                            <span> My Plan </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('withdraw.percentage')}}">
                            <i class="fe-airplay"></i>
                            <span> Withdraw Percentage </span>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#withcatipal">
                            <i class="fe-airplay"></i>
                            <span> Withdraw Capital</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('my.referral')}}">
                            <i class="fe-airplay"></i>
                            <span> My Referral User </span>
                        </a>
                    </li>







                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                @yield('user')

            </div> <!-- end container-fluid -->

        </div> <!-- end content -->



        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                            $time = \Carbon\Carbon::now()->format('Y');
                        ?>
                        {{$time}} &copy; {{$gn->site_name}}
                    </div>

                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->

<!-- Right Sidebar -->

<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script src="{{asset('assets/dashboard/')}}/js/vendor.min.js"></script>

<!-- Chart JS -->
<script src="{{asset('assets/dashboard/')}}/libs/chart-js/Chart.bundle.min.js"></script>

<!-- Init js -->
<script src="{{asset('assets/dashboard/')}}/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="{{asset('assets/dashboard/')}}/js/app.min.js"></script>
@yield('js')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('layouts.message')
</body>

<!-- Mirrored from coderthemes.com/abstack/layouts/green/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Jan 2020 20:39:58 GMT -->
</html>
