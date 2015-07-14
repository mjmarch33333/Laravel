<!DOCTYPE html>

<!--[if IEMobile 7]><html class="no-js iem7 oldie"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js ie7 oldie" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js ie8 oldie" lang="en"><![endif]-->
<!--[if (gt IE 8)|(gt IEMobile 7)]><!--><html class="no-js" lang="en"><!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>WNYAUTOMATION</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- http://davidbcalhoun.com/2010/viewport-metatag -->
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">

	<!-- http://www.kylejlarson.com/blog/2012/iphone-5-web-design/ -->
	<meta name="viewport" content="user-scalable=0, initial-scale=1.0">

	<!-- For all browsers -->
	<link rel="stylesheet" href="{{ URL::asset('css/reset.css?v=1') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/style.css?v=1') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/colors.css?v=1') }}">
	<link rel="stylesheet" media="print" href="{{ URL::asset('css/print.css?v=1') }}">
	<!-- For progressively larger displays -->
	<link rel="stylesheet" media="only all and (min-width: 480px)" href="{{ URL::asset('css/480.css?v=1') }}">
	<link rel="stylesheet" media="only all and (min-width: 768px)" href="{{ URL::asset('css/768.css?v=1') }}">
	<link rel="stylesheet" media="only all and (min-width: 992px)" href="{{ URL::asset('css/992.css?v=1') }}">
	<link rel="stylesheet" media="only all and (min-width: 1200px)" href="{{ URL::asset('css/1200.css?v=1') }}">
	<!-- For Retina displays -->
	<link rel="stylesheet" media="only all and (-webkit-min-device-pixel-ratio: 1.5), only screen and (-o-min-device-pixel-ratio: 3/2), only screen and (min-device-pixel-ratio: 1.5)" href="css/2x.css?v=1">

	<!-- Webfonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>

	<!-- Additional styles -->
	<link rel="stylesheet" href="{{ URL::asset('css/styles/agenda.css?v=1') }}">

	<!-- JavaScript at bottom except for Modernizr -->
	<script src="{{ URL::asset('js/libs/modernizr.custom.js') }}"></script>

	<!-- For Modern Browsers -->
	<link rel="shortcut icon" href="{{ URL::asset('img/favicons/favicon.png') }}">
	<!-- For everything else -->
	<link rel="shortcut icon" href="{{ URL::asset('img/favicons/favicon.ico') }}">

	<!-- iOS web-app metas -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">

	<!-- iPhone ICON -->
	<link rel="apple-touch-icon" href="{{ URL::asset('img/favicons/apple-touch-icon.png') }}" sizes="57x57">
	<!-- iPad ICON -->
	<link rel="apple-touch-icon" href="{{ URL::asset('img/favicons/apple-touch-icon-ipad.png') }}" sizes="72x72">
	<!-- iPhone (Retina) ICON -->
	<link rel="apple-touch-icon" href="{{ URL::asset('img/favicons/apple-touch-icon-retina.png') }}" sizes="114x114">
	<!-- iPad (Retina) ICON -->
	<link rel="apple-touch-icon" href="{{ URL::asset('img/favicons/apple-touch-icon-ipad-retina.png') }}" sizes="144x144">

	<!-- iPhone SPLASHSCREEN (320x460) -->
	<link rel="apple-touch-startup-image" href="{{ URL::asset('img/splash/iphone.png') }}" media="(device-width: 320px)">
	<!-- iPhone (Retina) SPLASHSCREEN (640x960) -->
	<link rel="apple-touch-startup-image" href="{{ URL::asset('img/splash/iphone-retina.png') }}" media="(device-width: 320px) and (-webkit-device-pixel-ratio: 2)">
	<!-- iPhone 5 SPLASHSCREEN (640Ã—1096) -->
	<link rel="apple-touch-startup-image" href="{{ URL::asset('img/splash/iphone5.png') }}" media="(device-height: 568px) and (-webkit-device-pixel-ratio: 2)">
	<!-- iPad (portrait) SPLASHSCREEN (748x1024) -->
	<link rel="apple-touch-startup-image" href="{{ URL::asset('img/splash/ipad-portrait.png') }}" media="(device-width: 768px) and (orientation: portrait)">
	<!-- iPad (landscape) SPLASHSCREEN (768x1004) -->
	<link rel="apple-touch-startup-image" href="{{ URL::asset('img/splash/ipad-landscape.png') }}" media="(device-width: 768px) and (orientation: landscape)">
	<!-- iPad (Retina, portrait) SPLASHSCREEN (2048x1496) -->
	<link rel="apple-touch-startup-image" href="{{ URL::asset('img/splash/ipad-portrait-retina.png') }}" media="(device-width: 1536px) and (orientation: portrait) and (-webkit-min-device-pixel-ratio: 2)">
	<!-- iPad (Retina, landscape) SPLASHSCREEN (1536x2008) -->
	<link rel="apple-touch-startup-image" href="{{ URL::asset('img/splash/ipad-landscape-retina.png') }}" media="(device-width: 1536px)  and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 2)">

	<!-- Microsoft clear type rendering -->
	<meta http-equiv="cleartype" content="on">

	<!-- IE9 Pinned Sites: http://msdn.microsoft.com/en-us/library/gg131029.aspx -->
	<meta name="application-name" content="Developr Admin Skin">
	<meta name="msapplication-tooltip" content="Cross-platform admin template.">
	<meta name="msapplication-starturl" content="http://www.display-inline.fr/demo/developr">
	<!-- These custom tasks are examples, you need to edit them to show actual pages -->
	<meta name="msapplication-task" content="name=Agenda;action-uri=http://www.display-inline.fr/demo/developr/agenda.html;icon-uri=http://www.display-inline.fr/demo/developr/img/favicons/favicon.ico">
	<meta name="msapplication-task" content="name=My profile;action-uri=http://www.display-inline.fr/demo/developr/profile.html;icon-uri=http://www.display-inline.fr/demo/developr/img/favicons/favicon.ico">
</head>

<body class="clearfix with-menu with-shortcuts">

	<!-- Prompt IE 6 users to install Chrome Frame -->
	<!--[if lt IE 7]><p class="message red-gradient simpler">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

	<!-- Title bar -->
	<header role="banner" id="title-bar">
		<h2>WNYAUTOMATION</h2>
	</header>

	<!-- Button to open/hide menu -->

	<!-- Button to open/hide shortcuts -->
	<a href="#" id="open-shortcuts"><span class="icon-thumbs"></span></a>

	<!-- Main content -->
	<section role="main" id="main">

		<!-- Visible only to browsers without javascript -->
		<noscript class="message black-gradient simpler">Your browser does not support JavaScript! Some features won't work as expected...</noscript>

		<!-- Main title -->
		<hgroup id="main-title" class="thin">
			<h1>@yield('title')</h1>
			<h2>Today is {{date("l")}} <strong>{{ date("F") }} {{ date("d") }}, {{ date("Y") }}</strong></h2>
		</hgroup>

		<!-- The padding wrapper may be omitted -->
		<div class="with-padding">

			<!-- Main content here -->

			@yield('content')
			<br>

		</div>

	</section>
	<!-- End main content -->

	<!-- Side tabs shortcuts -->
	<ul id="shortcuts" role="complementary" class="children-tooltip tooltip-right">
		<!-- Active shortcut -->
		<li class="current"><a href="./" class="shortcut-dashboard" title="Dashboard">Dashboard</a></li>
		<!-- Background shortcut -->
		<li><a href="#" class="shortcut-messages" title="Messages">Messages</a></li>
		<li><a href="notes" class="shortcut-notes" title="Notes2">Notes2</a></li>
		<!-- Disabled shortcut -->
		<li><span class="shortcut-notes" title="Notes">Notes</span></li>
	</ul>

	<!-- Sidebar/drop-down menu -->
	<section id="menu" role="complementary">

		<!-- This wrapper is used by several responsive layouts -->
		<div id="menu-content">

			<header>
				@if (\Auth::user()->admin_site_id > 0)
					Administrator
    			@else
    				Welcome
				@endif
			</header>

			<div id="profile">
				<img src="{{ URL::asset('img/user.png') }}" width="64" height="64" alt="User name" class="user-icon">
				Hello
				<span class="name">{{\Auth::user()->name}}</span>
			</div>

			<!-- By default, this section is made for 4 icons, see the doc to learn how to change this, in "basic markup explained" -->
			<ul id="access" class="children-tooltip">
				<!-- Icon with count -->
				<li><a href="#" title="Messageshaha">
					<span class="icon-inbox"></span>
					<span class="count">2</span>
				</a></li>
				<!-- Simple icon -->
				<li><a href="#" title="Calendar">
					<span class="icon-calendar"></span></a>
				</li>
				<li><a href="login.html" title="Profile">
					<span class="icon-user"></span></a>
				</li>
				<!-- Disabled icon -->
				<li class="disabled">
					<span class="icon-gear"></span>
				</li>
			</ul>

			<!-- Navigation menu goes here -->

		</div>
		<!-- End content wrapper -->

		<!-- This is optional -->
		<footer id="menu-footer">
			<!-- Any content -->
			<a href="/appointments/create">Create Appointment</a><br>
			<a href="/appointments/viewall">All Appointments</a><br>
			<a href="/appointments/showbydate/{{ date('Y-m-d') }}">Today's Appointments</a><br>
			<a href="/auth/logout" title="Logout">Logout</a>
		</footer>

	</section>
	<!-- End sidebar/drop-down menu -->

	<!-- JavaScript at the bottom for fast page loading -->

	<!-- Scripts -->
	<script src="{{ URL::asset('js/libs/jquery-1.9.1.min.js') }}"></script>
	<script src="{{ URL::asset('js/setup.js') }}"></script>
	<script src="{{ URL::asset('js/developr.agenda.js') }}"></script>

	<!-- Libs go here -->
</body>
</html>