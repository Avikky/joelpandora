<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <title>Admin Dashboard</title>


    <link href="{{ asset('admin_assets/fonts/font-awesome.min.css" rel="stylesheet') }}" media="all">
    <link href="{{ asset('admin_assets/css/font-face.css" rel="stylesheet') }}" media="all">
    <link href="{{ asset('admin_assets/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_assets/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_assets/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_assets/vendor/animation/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_assets/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_assets/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_assets/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link rel="stylesheet" href="{{ asset('select2/css/select2.min.css') }}">
    <link href="{{ asset('admin_assets/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_assets/vendor/vector-map/jqvmap.min.css') }}" rel="stylesheet" media="all">

    <link href="{{ asset('admin_assets/css/theme.css') }}" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <script>
        CKEDITOR.replaceClass( 'ckeditor' );
    </script>  

</head>

<body class="">
    <div class="page-wrapper">
        {{-- sidebar nav --}}
        @include('inc.sideNav')
        {{-- main body with main header starts here--}}
        <div class="page-container2">
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="images/icon/logo-white.png" alt="CoolAdmin" />
                                </a>
                            </div>
                            <div class="header-button2">
                                <div class="header-button-item js-item-menu">
                                    <i class="zmdi zmdi-search"></i>
                                <div class="search-dropdown js-dropdown">
                                    <form action="#">
                                        <input class="au-input au-input--full au-input--h65" type="text" placeholder="Search for datas &amp; reports..." />
                                        <span class="search-dropdown__icon">
                                            <i class="zmdi zmdi-search"></i>
                                        </span>
                                    </form>
                                </div>
                            </div>
                            <div class="header-button-item" >
                                <a class="btn btn-warning" href="{{ route('logout') }}"onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}</a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                            {{--Navbar  Notification section --}}
                            <div class="header-button-item has-noti js-item-menu">
                                <i class="zmdi zmdi-notifications"></i>
                                <div class="notifi-dropdown js-dropdown">
                                    <div class="notifi__title">
                                        <p>You have 2 Notifications</p>
                                    </div>
                                    <div class="notifi__item">
                                        <div class="bg-c1 img-cir img-40">
                                            <i class="zmdi zmdi-email-open"></i>
                                        </div>
                                        <div class="content">
                                            <p>You got a email notification</p>
                                            <span class="date">April 12, 2018 06:50</span>
                                        </div>
                                    </div>
                                    <div class="notifi__item">
                                        <div class="bg-c2 img-cir img-40">
                                            <i class="zmdi zmdi-account-box"></i>
                                        </div>
                                        <div class="content">
                                            <p>Your account has been blocked</p>
                                            <span class="date">April 12, 2018 06:50</span>
                                        </div>
                                    </div>
                
                                    <div class="notifi__footer">
                                        <a href="#">All notifications</a>
                                    </div>
                                </div>
                            </div>
                              {{-- Right sidebar for additional settings incase needed --}}
                            <div class="header-button-item mr-0 js-sidebar-btn">
                                <i class="zmdi zmdi-menu"></i>
                            </div>
                          
                            {{-- <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-account"></i>Account
                                        </a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-settings"></i>Setting</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </header>
            {{-- main header ends here --}}
            {{-- mobile sidebar navigation here-- --}}
                <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                    <div class="logo">
                         {{-- {{ Auth::user()->name }} --}}
                        <a href="#">
                        <img src="admin_assets/images/icon/logo.png" alt="Cool Admin">
                        </a>
                    </div>

                    <div class="menu-sidebar2__content js-scrollbar1">
                        <div class="account2">
                            <div class="image img-cir img-120">
                                    <a href="{{url('/admin/profile')}}">
                                        <img src="{{ asset('storage/profile_images/default-profile-img.png') }}"  />
                                    </a>
                                {{-- @if (Auth::user()->profile_image == '')
                                <a href="{{url('/admin/profile')}}">
                                    <img src="{{ asset('storage/profile_images/default-profile-img.png') }}" alt="{{ Auth::user()->name}}" />
                                </a> 
                                @else 
                                <a href="{{url('/admin/profile')}}">
                                    <img src="{{ asset('storage/profile_images')}}/{{Auth::user()->profile_image}}" alt="{{ Auth::user()->name}}" />
                                </a>
                                @endif    --}}
                            </div>
                            {{-- <h4 class="name"><a href="{{ url('/admin/profile') }}" class="text-black">{{ Auth::user()->name }} </a></h4> --}}
                            <a class="btn btn-warning" href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>

                        <nav class="navbar-sidebar2">
                            <ul class="list-unstyled navbar__list">
                                <li class="active has-sub">
                                    <a class="" href="{{ url('/admin/dashboard') }}">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard
                                    </a>
                                </li>
                                <li class="has-sub">
                                    <a  class="js-arrow" href="#">
                                        <i class="fas fa-shopping-basket"></i>Manage Portfolio
                                        <span class="arrow">
                                            <i class="fas fa-angle-down"></i>
                                        </span>
                                    </a>
                                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                                        <li>
                                            <a href="{{url('/admin/services')}}">
                                                <i class="fas fa-shopping-basket"></i>Add Projects
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-sub">
                                    <a class="js-arrow" href="#">
                                        <i class="fas fa-desktop"></i>Manage Blog
                                        <span class="arrow">
                                            <i class="fas fa-angle-down"></i>
                                        </span>
                                    </a>
                                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                                        <li>
                                            <a href="{{ url('admin/posts/create') }}">
                                                <i class="fab fa-flickr"></i>Add Post</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('admin/posts/') }}">
                                                <i class="fas fa-align-justify"></i>All Post
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('admin/posts/draft') }}">
                                                <i class="fas fa-align-justify"></i>Draft
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/admin/category') }}">
                                                <i class="far fa-window-maximize"></i>Category
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/admin/tags') }}">
                                                <i class="far fa-id-card"></i>Tags
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-sub">
                                    <a class="js-arrow" href="#">
                                    <i class="fas fa-user"></i>Profile settings
                                    <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                    </span>
                                    </a>
                                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                                        <li>
                                            <a href="{{ url('/admin/settings') }}">
                                                <i class="fas fa-cogs"></i> Personal Data
                                            </a>
                                        </li>
                                         <li>
                                            <a href="{{ url('/admin/settings') }}">
                                                <i class="fas fa-cogs"></i> Education
                                            </a>
                                        </li>
                                         <li>
                                            <a href="{{ url('/admin/settings') }}">
                                                <i class="fas fa-cogs"></i> Experience
                                            </a>
                                        </li>
                                         <li>
                                            <a href="{{ url('/admin/settings') }}">
                                                <i class="fas fa-cogs"></i> Skills
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                {{-- <li class="has-sub">
                                    <a class="js-arrow" href="#">
                                    <i class="fas fa-cog"></i>Settings
                                    <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                    </span>
                                    </a>
                                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                                        <a href="{{ url('/admin/settings') }}">
                                        <i class="fas fa-cogs"></i>Site Settings</a>
                                        </li>
                                    </ul>
                                </li> --}}
                                <li>
                                    <a href="{{ route('logout') }}"onclick="event.preventDefault();
                                    document.getElementById('logout-id').submit();">
                                        <i class="fas fa-user-times"></i>   {{ __('Logout') }}</a>
                                    <form id="logout-id" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
            
                            </ul>
                        </nav>
                    </div>
                </aside>
                <br><br><br>
                {{-- subheader navbar housing the breadcumb goes here if need be --}}
            </header>    
               {{-- everything about header ends here --}}
                @include('inc.messages')
                @yield('content')
        </div>
    </div>

    <script src="{{asset('js/jquery-3.2.1.min.js')}}" type="120f404187f5bead702a0e66-text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <script src="{{ asset('select2/js/select2.min.js') }}"></script> --}}
    <script>
        $(document).ready(function() {
          $('.select2-multi').select2();
        });
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
    <script src="{{ url('ckeditor/ckeditor.js')}}"></script>
    <script src="{{ asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.js') }}" type="120f404187f5bead702a0e66-text/javascript"></script>
    <script data-cfasync="false" src="{{ asset('admin_assets/scripts/email-decode.min.js') }}"></script>

    <script src="{{ asset('admin_assets/vendor/slick/slick.min.js') }}" type="120f404187f5bead702a0e66-text/javascript">
    </script>
    <script src="{{ asset('admin_assets/vendor/wow/wow.min.js') }}" type="120f404187f5bead702a0e66-text/javascript"></script>
    <script src="{{ asset('admin_assets/vendor/animation/animsition.min.js') }}" type="120f404187f5bead702a0e66-text/javascript"></script>
    <script src="{{ asset('admin_assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}" type="120f404187f5bead702a0e66-text/javascript">
    </script>
    <script src="{{ asset('admin_assets/vendor/counter-up/jquery.waypoints.min.js') }}" type="120f404187f5bead702a0e66-text/javascript"></script>
    <script src="{{ asset('admin_assets/vendor/counter-up/jquery.counterup.min.js') }}" type="120f404187f5bead702a0e66-text/javascript">
    </script>
    <script src="{{ asset('admin_assets/vendor/circle-progress/circle-progress.min.js') }}" type="120f404187f5bead702a0e66-text/javascript"></script>
    <script src="{{ asset('admin_assets/vendor/perfect-scrollbar/perfect-scrollbar.js') }}" type="120f404187f5bead702a0e66-text/javascript"></script>
    <script src="{{ asset('admin_assets/vendor/chartjs/Chart.bundle.min.js') }}" type="120f404187f5bead702a0e66-text/javascript"></script>

    <script src="{{ asset('admin_assets/vendor/vector-map/jquery.vmap.js') }}" type="120f404187f5bead702a0e66-text/javascript"></script>
    <script src="{{ asset('admin_assets/vendor/vector-map/jquery.vmap.min.js') }}" type="120f404187f5bead702a0e66-text/javascript"></script>
    <script src="{{ asset('admin_assets/vendor/vector-map/jquery.vmap.sampledata.js') }}" type="120f404187f5bead702a0e66-text/javascript"></script>
    <script src="{{ asset('admin_assets/vendor/vector-map/jquery.vmap.world.js') }}" type="120f404187f5bead702a0e66-text/javascript"></script>

    <script src="{{ asset('admin_assets/js/main.js') }}" type="120f404187f5bead702a0e66-text/javascript"></script>
    <script src="{{ asset('admin_assets/scripts/rocket-loader.min.js') }}" data-cf-settings="120f404187f5bead702a0e66-|49" defer=""></script>
 
</body>


</html>
