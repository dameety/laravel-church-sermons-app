<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Church Sermons - @yield('title')</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="keywords" content="make your church messages available for downlaod for all" />

        <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap.min.css') }}" type="text/css" >
        <link rel="stylesheet" href="{{ URL::asset('/css/font-awesome.css') }}" >
        <link href="{{ URL::asset('/css/ionicons.min.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ URL::asset('/css/morris.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ URL::asset('/css/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ URL::asset('/css/datepicker3.css') }}" rel="stylesheet" type="text/css" >
        <link  href="{{ URL::asset('http://fonts.googleapis.com/css?family=Lato') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('/css/style.css') }}" rel="stylesheet" type="text/css" >

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
              <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
              <![endif]-->
    </head>

    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.html" class="logo">
                Church Sermons
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
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
                                <span>Jane Doe <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li class="dropdown-header text-center">Account</li>
                                <li>
                                    <a href="#">
                                    <i class="fa fa-clock-o fa-fw pull-right"></i>
                                        <span class="badge badge-success pull-right">10</span> Updates</a>
                                    <a href="#">
                                    <i class="fa fa-envelope-o fa-fw pull-right"></i>
                                        <span class="badge badge-danger pull-right">5</span> Messages</a>
                                    <a href="#"><i class="fa fa-magnet fa-fw pull-right"></i>
                                        <span class="badge badge-info pull-right">3</span> Subscriptions</a>
                                    <a href="#"><i class="fa fa-question fa-fw pull-right"></i> <span class=
                                        "badge pull-right">11</span> FAQ</a>
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
                                    <a href="#"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
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
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="img/26115.jpg" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, Jane</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="index.html">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="treeview">
                           <a href="index.html"><i class="fa fa-dashboard"></i>Sermons</a>
                               <ul class='treeview-menu'>
                                   <li><a href="basic_form.html">Level 1</a></li>
                               </ul>
                       </li>

                        <li>
                            <a href="general.html">
                                <i class="fa fa-gavel"></i> <span>General</span>
                            </a>
                        </li>

                        <li>
                            <a href="basic_form.html">
                                <i class="fa fa-globe"></i> <span>Basic Elements</span>
                            </a>
                        </li>

                        <li>
                            <a href="simple.html">
                                <i class="fa fa-glass"></i> <span>Simple tables</span>
                            </a>
                        </li>
                    </ul>
                </section>
            </aside> <!-- side navigation ends here -->

            <aside class="right-side">

                <section class="content">
                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-red"><i class="fa fa-check-square-o"></i></span>
                                <div class="sm-st-info">
                                    <span>3200</span>
                                    Total Tasks
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-violet"><i class="fa fa-envelope-o"></i></span>
                                <div class="sm-st-info">
                                    <span>2200</span>
                                    Total Messages
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-blue"><i class="fa fa-dollar"></i></span>
                                <div class="sm-st-info">
                                    <span>100,320</span>
                                    Total Profit
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-green"><i class="fa fa-paperclip"></i></span>
                                <div class="sm-st-info">
                                    <span>4567</span>
                                    Total Documents
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    Work Progress
                                </header>
                                <div class="panel-body table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Project</th>
                                                <th>Manager</th>
                                                <!-- <th>Client</th> -->
                                                <th>Deadline</th>
                                                <!-- <th>Price</th> -->
                                                <th>Status</th>
                                                <th>Progress</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Facebook</td>
                                                <td>Mark</td>
                                                <!-- <td>Steve</td> -->
                                                <td>10/10/2014</td>
                                                <!-- <td>$1500</td> -->
                                                <td><span class="label label-danger">in progress</span></td>
                                                <td><span class="badge badge-info">50%</span></td>
                                            </tr>
                                            <tr>
                                              <td>2</td>
                                              <td>Twitter</td>
                                              <td>Evan</td>
                                              <!-- <td>Darren</td> -->
                                              <td>10/8/2014</td>
                                              <!-- <td>$1500</td> -->
                                              <td><span class="label label-success">completed</span></td>
                                              <td><span class="badge badge-success">100%</span></td>
                                            </tr>
                                            <tr>
                                              <td>3</td>
                                              <td>Google</td>
                                              <td>Larry</td>
                                              <!-- <td>Nick</td> -->
                                              <td>10/12/2014</td>
                                              <!-- <td>$2000</td> -->
                                              <td><span class="label label-warning">in progress</span></td>
                                              <td><span class="badge badge-warning">75%</span></td>
                                           </tr>
                                           <tr>
                                              <td>4</td>
                                              <td>LinkedIn</td>
                                              <td>Allen</td>
                                              <!-- <td>Rock</td> -->
                                              <td>10/01/2015</td>
                                              <!-- <td>$2000</td> -->
                                              <td><span class="label label-info">in progress</span></td>
                                              <td><span class="badge badge-info">65%</span></td>
                                           </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                        </div>
                    </div>

                </div><!-- this div keeps footer fixed on the page bottom -->
                </section><!-- main content section ends here -->


                <div class="footer-main"> <!-- footer here -->
                    Copyright &copy Church Sermons | 2016
                </div>

            </aside> <!-- main content ends here -->

        </div>

        <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('js/Chart.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/imp/app.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/vue.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/vue-resource.js') }}" type="text/javascript"></script>
    
    </body>
</html>