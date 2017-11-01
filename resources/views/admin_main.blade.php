<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="{{ asset('adminto/images/favicon.ico ') }}">

        <title>{{ $title }}</title>

        <link href="{{ asset('adminto/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('adminto/css/core.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('adminto/css/components.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('adminto/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('adminto/css/pages.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('adminto/css/menu.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('adminto/css/responsive.css') }}" rel="stylesheet" type="text/css" />
		
		<!-- DataTables -->
        <link href="{{ asset('adminto/plugins/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('adminto/plugins/datatables/buttons.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('adminto/plugins/datatables/fixedHeader.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('adminto/plugins/datatables/responsive.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('adminto/plugins/datatables/scroller.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
		
		<!-- Sweet Alert css -->
        <link href="{{ asset('adminto/plugins/bootstrap-sweetalert/sweet-alert.css') }}" rel="stylesheet" type="text/css" />
		
		<!-- Select 2 -->
		<link href="{{ asset('adminto/plugins/select2/dist/css/select2.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('adminto/plugins/select2/dist/css/select2-bootstrap.css') }}" rel="stylesheet" type="text/css" />
		
		<!-- Tags -->
		<link href="{{ asset('adminto/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
		<style type="text/css">
			.popover{
				max-width:700px;
			}
			
			.videoWrapper {
				position: relative;
				padding-bottom: 35.25%; /* 16:9 */
				padding-top: 25px;
				height: 0;
			}
			.videoWrapper iframe {
				position: absolute;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
			}
		</style>
		<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="{{ asset('adminto/js/modernizr.min.js') }}"></script>


    </head>


    <body>

        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container">

                    <!-- LOGO -->
                    <div class="topbar-left">
                        <a href="index.html" class="logo"><span>e<span>Training</span></span></a>
                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras">

                        <ul class="nav navbar-nav navbar-right pull-right">
                            <li>
                                <form role="search" class="navbar-left app-search pull-left hidden-xs">
                                     <input type="text" placeholder="Search..." class="form-control">
                                     <a href=""><i class="fa fa-search"></i></a>
                                </form>
                            </li>
                            <li>
                                <!-- Notification -->
                                <div class="notification-box">
                                    <ul class="list-inline m-b-0">
                                        <li>
                                            <a href="javascript:void(0);" class="right-bar-toggle">
                                                <i class="zmdi zmdi-notifications-none"></i>
                                            </a>
                                            <div class="noti-dot">
                                                <span class="dot"></span>
                                                <span class="pulse"></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- End Notification bar -->
                            </li>

                            <li class="dropdown user-box">
                                <a href="" class="dropdown-toggle waves-effect waves-light profile " data-toggle="dropdown" aria-expanded="true">
                                    <img src="{{ asset('adminto/images/users/avatar-1.jpg') }}" alt="user-img" class="img-circle user-img">
                                    <div class="user-status away"><i class="zmdi zmdi-dot-circle"></i></div>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"><i class="ti-user m-r-5"></i> Profile</a></li>
                                    <li><a href="javascript:void(0)"><i class="ti-settings m-r-5"></i> Settings</a></li>
                                    <li><a href="javascript:void(0)"><i class="ti-lock m-r-5"></i> Lock screen</a></li>
									<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="ti-power-off m-r-5"></i> Logout</a></li>
									
									 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                </ul>
                            </li>
                        </ul>
                        <div class="menu-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </div>
                    </div>

                </div>
            </div>

            <div class="navbar-custom">
                <div class="container">
				
                    @include('admin_menu')
				
                </div>
            </div>
        </header>
        <!-- End Navigation Bar-->


        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
						@if ( session()->has('alert-danger') )
							<div class="btn-group pull-right m-t-10" id="alert">
								<div class="alert alert-danger alert-dismissable">
								  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								  <span><strong>{{ session()->get('alert-danger') }}</strong></span>
								</div>
							</div>
						@elseif ( session()->has('alert-success') )
							 <div class="btn-group pull-right m-t-10" id="alert">
								<div class="alert alert-success alert-dismissable">
								  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								  <span><strong>{{ session()->get('alert-success') }}</strong></span>
								</div>
							</div>
						@endif
                        <h4 class="page-title">{{ $title }}</h4>
                    </div>
                </div>
				<div class="row">
                    <div class="col-lg-12">
                        <?php
							$color = array('custom');//,'inverse','info','warning','pink','success','purple','primary','danger');
							$random_c = array_rand($color, 1);
							$selected_color = "panel-".$color[$random_c];
							
							$style = array('color');//,'border');
							$random_s = array_rand($style, 1);
							$selected_style = "panel-".$style[$random_s];
							
						?>
						<div class="panel {{ $selected_color }} {{ $selected_style }}"> 
                            @yield('content')
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->

                <!-- Footer -->
                <footer class="footer text-right">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-6">
                                2017 © Eggy Endeska.
                            </div>
                            <div class="col-xs-6">
                                <ul class="pull-right list-inline m-b-0">
                                    <li>
                                        <a target="_blank()" href="{{ url('https://facebook.com/egi.endeska') }}">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- End Footer -->

            </div>
            <!-- end container -->



            <!-- Right Sidebar -->
            <div class="side-bar right-bar">
                <a href="javascript:void(0);" class="right-bar-toggle">
                    <i class="zmdi zmdi-close-circle-o"></i>
                </a>
                <h4 class="">Notifications</h4>
                <div class="notification-list nicescroll">
                    <ul class="list-group list-no-border user-list">
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="avatar">
                                    <img src="{{ asset('adminto/images/users/avatar-2.jpg') }}" alt="">
                                </div>
                                <div class="user-desc">
                                    <span class="name">Michael Zenaty</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">2 hours ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="icon bg-info">
                                    <i class="zmdi zmdi-account"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">New Signup</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">5 hours ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="icon bg-pink">
                                    <i class="zmdi zmdi-comment"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">New Message received</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">1 day ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item active">
                            <a href="#" class="user-list-item">
                                <div class="avatar">
                                    <img src="{{ asset('adminto/images/users/avatar-3.jpg') }}" alt="">
                                </div>
                                <div class="user-desc">
                                    <span class="name">James Anderson</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">2 days ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item active">
                            <a href="#" class="user-list-item">
                                <div class="icon bg-warning">
                                    <i class="zmdi zmdi-settings"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">Settings</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">1 day ago</span>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- /Right-bar -->

        </div>



        <!-- jQuery  -->
        <script src="{{ asset('adminto/js/jquery.min.js') }}"></script>
        <script src="{{ asset('adminto/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('adminto/js/detect.js') }}"></script>
        <script src="{{ asset('adminto/js/fastclick.js') }}"></script>
        <script src="{{ asset('adminto/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('adminto/js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('adminto/js/waves.js') }}"></script>
        <script src="{{ asset('adminto/js/wow.min.js') }}"></script>
        <script src="{{ asset('adminto/js/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('adminto/js/jquery.scrollTo.min.js') }}"></script>


        <!-- App js -->
        <script src="{{ asset('adminto/js/jquery.core.js') }}"></script>
        <script src="{{ asset('adminto/js/jquery.app.js') }}"></script>
		
		<script>
			$('div.alert').delay(5000).slideUp(1000);
		</script>
		
		 <!-- Datatables-->
        <script src="{{ asset('adminto/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('adminto/plugins/datatables/dataTables.bootstrap.js') }}"></script>
        <script src="{{ asset('adminto/plugins/datatables/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('adminto/plugins/datatables/buttons.bootstrap.min.js') }}"></script>
        <script src="{{ asset('adminto/plugins/datatables/jszip.min.js') }}"></script>
        <script src="{{ asset('adminto/plugins/datatables/pdfmake.min.js') }}"></script>
        <script src="{{ asset('adminto/plugins/datatables/vfs_fonts.js') }}"></script>
        <script src="{{ asset('adminto/plugins/datatables/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('adminto/plugins/datatables/buttons.print.min.js') }}"></script>
        <script src="{{ asset('adminto/plugins/datatables/dataTables.fixedHeader.min.js') }}"></script>
        <script src="{{ asset('adminto/plugins/datatables/dataTables.keyTable.min.js') }}"></script>
        <script src="{{ asset('adminto/plugins/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('adminto/plugins/datatables/responsive.bootstrap.min.js') }}"></script>
        <script src="{{ asset('adminto/plugins/datatables/dataTables.scroller.min.js') }}"></script>

        <!-- Datatable init js -->
        <script src="{{ asset('adminto/pages/datatables.init.js') }}"></script>

		
		<script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable( { keys: true } );
                $('#datatable-responsive').DataTable();
                //$('#datatable-scroller').DataTable( { ajax: "assets/plugins/datatables/json/scroller-demo.json", deferRender: true, scrollY: 380, scrollCollapse: true, scroller: true } );
                var table = $('#datatable-fixed-header').DataTable( { fixedHeader: true } );
            } );
            TableManageButtons.init();

        </script>
		
		<!-- Sweet Alert js -->
		<script src="{{ asset('adminto/plugins/bootstrap-sweetalert/sweet-alert.min.js') }}"></script>
		
		<!-- Select2 js -->
		<script src="{{ asset('adminto/plugins/select2/dist/js/select2.min.js') }}" type="text/javascript"></script>
		<script type="text/javascript">
            $(".select2").select2();

            $(".select2-limiting").select2({
				 maximumSelectionLength: 2
			});
		</script>
		
		<!-- Tags -->
		<script src="{{ asset('adminto/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>

    </body>
</html>