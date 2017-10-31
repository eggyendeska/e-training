<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App Favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App title -->
        <title>SIM Rumah Sakik</title>

        <!-- App CSS -->
        <link href="{{ asset('adminto/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('adminto/css/core.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('adminto/css/components.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('adminto/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('adminto/css/pages.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('adminto/css/menu.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('adminto/css/responsive.css') }}" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>
        
    </head>
    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class="text-center">
                <a href="index.html" class="logo"><span>Rumah<span>Sakik</span></span></a>
                <h5 class="text-muted m-t-0 font-600">Sistem Informasi Manajemen</h5>
            </div>
        	<div class="m-t-40 card-box">
                <div class="text-center">
                    <h4 class="text-uppercase font-bold m-b-0">Sign In</h4>
                </div>
                <div class="panel-body">
					<form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="email" required="" name="email" input id="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
								@if ($errors->has('email'))
                                    <p class="label label-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" required="" placeholder="Password" id="password" name="password" required>
								@if ($errors->has('password'))
                                    <p class="label label-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </p>
                                @endif
							</div>
                        </div>

                        <div class="form-group text-center m-t-30">
                            <div class="col-xs-12">
                                <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            
        </div>
        <!-- end wrapper page -->
        

        
    	<script>
            var resizefunc = [];
        </script>

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
	
	</body>
</html>