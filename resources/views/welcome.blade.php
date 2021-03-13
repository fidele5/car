<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cars</title>
        <!-- Fonts -->
		<link href="/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
		<link href="/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
		<!-- Custom CSS -->
		<link href="/dist/css/style.min.css" rel="stylesheet">
    </head>
    <body>
			<div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    	</div>
	    <!-- ============================================================== -->
	    <!-- Main wrapper - style you can find in pages.scss -->
	    <!-- ============================================================== -->
	    <div id="main-wrapper">
				<header class="topbar">
					<nav class="navbar top-navbar navbar-expand-md navbar-dark">
							<div class="navbar-header">
									<!-- This is for the sidebar toggle which is visible on mobile only -->
									<a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
									<!-- ============================================================== -->
									<!-- Logo -->
									<!-- ============================================================== -->
									<a class="navbar-brand" href="index.html">
											<!-- Logo icon -->
											<b class="logo-icon">
													<!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
													<!-- Dark Logo icon -->
													<img src="/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
													<!-- Light Logo icon -->
													<img src="/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
											</b>
											<!--End Logo icon -->
											<!-- Logo text -->
											<span class="logo-text">
													 <!-- dark Logo text -->
													 <img src="/assets/images/logo-text.png" alt="homepage" class="dark-logo" />
													 <!-- Light Logo text -->
													 <img src="/assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
											</span>
									</a>
									<!-- ============================================================== -->
									<!-- End Logo -->
									<!-- ============================================================== -->
									<!-- ============================================================== -->
									<!-- Toggle which is visible on mobile only -->
									<!-- ============================================================== -->
									<a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
							</div>
							<!-- ============================================================== -->
							<!-- End Logo -->
							<!-- ============================================================== -->
							<div class="navbar-collapse collapse" id="navbarSupportedContent">
									<!-- ============================================================== -->
									<!-- toggle and nav items -->
									<!-- ============================================================== -->
									<ul class="navbar-nav float-left mr-auto">
										<li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
										<!-- ============================================================== -->
										<!-- Search -->
										<!-- ============================================================== -->
										<li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
											<form class="app-search position-absolute">
												<input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
											</form>
										</li>
									</ul>
									<!-- ============================================================== -->
									<!-- Right side toggle and nav items -->
									<!-- ============================================================== -->
									<ul class="navbar-nav float-right">
										<!-- ============================================================== -->
										<!-- User profile and search -->
										<!-- ============================================================== -->
										<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../../assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
												<div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
													<span class="with-arrow"><span class="bg-primary"></span></span>
														<div class="d-flex no-block align-items-center p-15 bg-primary text-white mb-2">
															<div class=""><img src="../../assets/images/users/1.jpg" alt="user" class="img-circle" width="60"></div>
																<div class="ml-2">
																	<h4 class="mb-0">{{ Auth::user()->login }}</h4>
																	<p class=" mb-0"><a href="https://www.wrappixel.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d3a5b2a1a6bd93b4beb2babffdb0bcbe">[email&#160;protected]</a></p>
																</div>
														</div>
														<a class="dropdown-item" href="javascript:void(0)"><i class="ti-user mr-1 ml-1"></i> My Profile</a>
														<a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet mr-1 ml-1"></i> My Balance</a>
														<a class="dropdown-item" href="javascript:void(0)"><i class="ti-email mr-1 ml-1"></i> Inbox</a>
														<div class="dropdown-divider"></div>
														<a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings mr-1 ml-1"></i> Account Setting</a>
														<div class="dropdown-divider"></div>
														<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-power-off mr-1 ml-1"></i> Logout</a>
														<div class="dropdown-divider"></div>
														<div class="pl-4 p-10"><a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded">View Profile</a></div>
												</div>
										</li>
										<!-- ============================================================== -->
										<!-- User profile and search -->
										<!-- ============================================================== -->
									</ul>
							</div>
						</nav>
					</header>
					<!-- ============================================================== -->
					<!-- Left Sidebar - style you can find in sidebar.scss  -->
					<!-- ============================================================== -->
					<aside class="left-sidebar">
						<!-- Sidebar scroll-->
						<div class="scroll-sidebar">
							<!-- Sidebar navigation-->
							<nav class="sidebar-nav">
								<ul id="sidebarnav">
									<!-- User Profile-->
									<li>
										<!-- User Profile-->
										<div class="user-profile d-flex no-block dropdown mt-3">
											<div class="user-pic"><img src="../../assets/images/users/1.jpg" alt="users" class="rounded-circle" width="40" /></div>
											<div class="user-content hide-menu ml-2">
												<a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<h5 class="mb-0 user-name font-medium">{{ Auth::user()->login }} <i class="fa fa-angle-down"></i></h5>
													<span class="op-5 user-email"><span class="__cf_email__" data-cfemail="40362132352e00272d21292c6e232f2d">[email&#160;protected]</span></span>
												</a>
												<div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
													<a class="dropdown-item" href="javascript:void(0)"><i class="ti-user mr-1 ml-1"></i> My Profile</a>
													<a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet mr-1 ml-1"></i> My Balance</a>
													<a class="dropdown-item" href="javascript:void(0)"><i class="ti-email mr-1 ml-1"></i> Inbox</a>
													<div class="dropdown-divider"></div>
													<a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings mr-1 ml-1"></i> Account Setting</a>
													<div class="dropdown-divider"></div>
													<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-power-off mr-1 ml-1"></i> Logout</a>
												</div>
											</div>
										</div>
										<!-- End User Profile-->
									</li>
									<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i data-feather="mail" class="feather-icon"></i><span class="hide-menu">Inbox </span></a>
										<ul aria-expanded="false" class="collapse  first-level">
											<li class="sidebar-item"><a href="inbox-email.html" class="sidebar-link"><i class="mdi mdi-email"></i><span class="hide-menu"> Email </span></a></li>
											<li class="sidebar-item"><a href="inbox-email-detail.html" class="sidebar-link"><i class="mdi mdi-email-alert"></i><span class="hide-menu"> Email Detail </span></a></li>
											<li class="sidebar-item"><a href="inbox-email-compose.html" class="sidebar-link"><i class="mdi mdi-email-secure"></i><span class="hide-menu"> Email Compose </span></a></li>
										</ul>
									</li>
									<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i data-feather="bookmark" class="feather-icon"></i><span class="hide-menu">Ticket </span></a>
										<ul aria-expanded="false" class="collapse  first-level">
											<li class="sidebar-item"><a href="ticket-list.html" class="sidebar-link"><i class="mdi mdi-book-multiple"></i><span class="hide-menu"> Ticket List </span></a></li>
											<li class="sidebar-item"><a href="ticket-detail.html" class="sidebar-link"><i class="mdi mdi-book-plus"></i><span class="hide-menu"> Ticket Detail </span></a></li>
										</ul>
									</li>
									<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i data-feather="mail" class="feather-icon"></i><span class="hide-menu">Email Template</span></a>
									<ul aria-expanded="false" class="collapse first-level">
										<li class="sidebar-item"><a href="email-templete-alert.html" class="sidebar-link"><i class="mdi mdi-message-alert"></i> <span class="hide-menu"> Alert </span></a></li>
										<li class="sidebar-item"><a href="email-templete-basic.html" class="sidebar-link"><i class="mdi mdi-message-bulleted"></i><span class="hide-menu"> Basic</span></a></li>
										<li class="sidebar-item"><a href="email-templete-billing.html" class="sidebar-link"><i class="mdi mdi-message-draw"></i><span class="hide-menu"> Billing</span></a></li>
										<li class="sidebar-item"><a href="email-templete-password-reset.html" class="sidebar-link"><i class="mdi mdi-message-bulleted-off"></i><span class="hide-menu"> Password-Reset</span></a></li>
									</ul>
								</li>
								<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="authentication-login1.html" aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span class="hide-menu">Log Out</span></a></li>
							</ul>
						</nav>
						<!-- End Sidebar navigation -->
					</div>
				<!-- End Sidebar scroll-->
			</aside>
			<div class="page-wrapper">
				<div class="container-fluid">
					<div id="root"></div>
					<script src="{{mix('js/app.js')}}" ></script>
				</div>
			</div>
      </div>
    </body>
	<script src="/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="/dist/js/app.min.js"></script>
    <script src="/dist/js/app.init.dark.js"></script>
    <script src="/dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
   	<script src="/dist/js/feather.min.js"></script>
    <script src="/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
	<script src="/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="/assets/libs/block-ui/jquery.blockUI.js"></script>
    <script src="/assets/extra-libs/block-ui/block-ui.js"></script>
</html>
