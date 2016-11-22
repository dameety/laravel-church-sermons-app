<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Church Sermons - @yield('title')</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="keywords" content="make your church messages available for downlaod for all"/>
        

        <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::asset('/css/sweetalert2.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap-datepicker3.min.css') }}" type="text/css">
        <link  rel="stylesheet" href="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css') }}">
        <link href="{{ URL::asset('/css/ionicons.min.css') }}" rel="stylesheet" type="text/css">
        <link  href="{{ URL::asset('http://fonts.googleapis.com/css?family=Lato') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('/css/style.css') }}" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
              <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
              <![endif]-->

        <script>
            window.ChurchSermons = {
                csrfToken: '{{ csrf_token() }}'
            };
        </script>
    </head>

    <body class="skin-black fixed">
        <header class="header">
            <a href="index.html" class="logo">
                Church Sermons
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <span>{{ Auth::guard('admin')->user()->name }} <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li class="dropdown-header text-center">Account</li>
                                <li>
                                    <a href="#">
                                    <i class="fa fa-envelope-o fa-fw pull-right"></i>
                                        <span class="badge badge-danger pull-right">5</span> Messages</a>
                                    <a href="#"><i class="fa fa-magnet fa-fw pull-right"></i>
                                        <span class="badge badge-info pull-right">3</span> Subscriptions</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user fa-fw pull-right"></i>Profile
                                    </a>
                                    <a data-toggle="modal" href="#modal-user-settings">
                                        <i class="fa fa-cog fa-fw pull-right"></i>Settings
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{{ url('/admin/logout') }}"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header> <!-- header ends here -->

        <div class="wrapper row-offcanvas row-offcanvas-left">

            <aside class="left-side sidebar-offcanvas">
                <section class="sidebar">
                    <div class="user-panel">
                        {{-- give a particular img size --}}
                        <img src="{{ URL::asset('/img/logo.jpg') }}"/>
                            
                    </div>
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>

                    <ul class="sidebar-menu">
                        <li  class="{{ Ekko::isActiveRoute('dashboard_path') }}">
                            <a href="{{ route('dashboard_path') }}">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>                                                
                        <li class="{{ Ekko::isActiveRoute('servicepage_path') }}">
                            <a href="{{ route('servicepage_path') }}">
                                <i class="fa fa-gavel"></i> <span>Services</span>
                            </a>
                        </li>
                        <li class="{{ Ekko::areActiveRoutes(['allsermons_path', 'sermoncreate_path']) }} treeview">
                           <a href="#"><i class="fa fa-dashboard"></i>Sermons</a>
                               <ul class='treeview-menu'>
                                   <li><a href="{{ route('allsermons_path') }}">All Sermnons</a></li>
                                   <li><a href="{{ route('sermoncreate_path') }}">New Sermnons</a></li>
                               </ul>
                        </li>
                        <li class="{{ Ekko::isActiveRoute('categoriespage_path') }}">
                            <a href="{{ route('categoriespage_path') }}">
                                <i class="fa fa-gavel"></i> <span>Categories</span>
                            </a>
                        </li>
                        <li class="{{ Ekko::isActiveRoute('allsermonrequests_path') }}">
                            <a href="{{ route('allsermonrequests_path') }}">
                                <i class="fa fa-gavel"></i> <span>Requests</span>
                            </a>
                        </li>
                        <li class="{{ Ekko::isActiveRoute('allusers_path') }}">
                            <a href="{{ route('allusers_path') }}">
                                <i class="fa fa-globe"></i> <span>Users</span>
                            </a>
                        </li>
                        <li class="{{ Ekko::isActiveRoute('adminsPage_path') }}">
                            <a href="{{ route('adminsPage_path') }}">
                                <i class="fa fa-globe"></i> <span>Admins</span>
                            </a>
                        </li>                        
                    </ul>
                </section>
            </aside> <!-- side navigation ends here -->

            <aside class="right-side">
                <section id="vue-app" class="content">
                    
                    @yield('content')

                </div><!-- this div keeps footer fixed on the page bottom not sure of other options -->
                </section><!-- yielded content ends here -->

                <div class="footer-main"> <!-- footer here -->
                    Copyright &copy Church Sermons | 2016
                </div>
            </aside> <!-- main content ends here -->

        </div>

        <script src="{{ URL::asset('js/main.js') }}"></script> {{--vuejs and resource --}}
        <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ URL::asset('js/imp/app.js') }}"></script>
        <script src="{{ URL::asset('js/validator.js') }}"></script>
        <script src="{{ URL::asset('node_modules/sweetalert2/dist/sweetalert2.min.js') }}"></script>

    </body>
</html>