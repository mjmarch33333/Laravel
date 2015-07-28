<!DOCTYPE html>

<!--[if IEMobile 7]><html class="no-js iem7 oldie"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js ie7 oldie" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js ie8 oldie" lang="en"><![endif]-->
<!--[if (IE 9)&!(IEMobile)]><html class="no-js ie9" lang="en"><![endif]-->
<!--[if (gt IE 9)|(gt IEMobile 7)]><!--><html class="no-js" lang="en"><!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>WNYAUTOMATION</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- http://davidbcalhoun.com/2010/viewport-metatag -->
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">

	<!-- http://www.kylejlarson.com/blog/2012/iphone-5-web-design/ and http://darkforge.blogspot.fr/2010/05/customize-android-browser-scaling-with.html -->
	<meta name="viewport" content="user-scalable=0, initial-scale=1.0, target-densitydpi=115">

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
	<link rel="stylesheet" media="only all and (-webkit-min-device-pixel-ratio: 1.5), only screen and (-o-min-device-pixel-ratio: 3/2), only screen and (min-device-pixel-ratio: 1.5)" href="{{ URL::asset('css/2x.css?v=1') }}">

	<!-- Webfonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>

	<!-- DataTables -->
	<link rel="stylesheet" href="{{ URL::asset('js/libs/DataTables/jquery.dataTables.css?v=1') }}">

	<!-- Additional styles -->
	<link rel="stylesheet" href="{{ URL::asset('css/styles/table.css?v=1') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/styles/agenda.css?v=1') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/styles/form.css?v=1') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/styles/switches.css?v=1') }}">

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
	<link rel="apple-touch-icon" href="img/favicons/apple-touch-icon.png" sizes="57x57">
	<!-- iPad ICON -->
	<link rel="apple-touch-icon" href="img/favicons/apple-touch-icon-ipad.png" sizes="72x72">
	<!-- iPhone (Retina) ICON -->
	<link rel="apple-touch-icon" href="img/favicons/apple-touch-icon-retina.png" sizes="114x114">
	<!-- iPad (Retina) ICON -->
	<link rel="apple-touch-icon" href="img/favicons/apple-touch-icon-ipad-retina.png" sizes="144x144">

	<!-- iPhone SPLASHSCREEN (320x460) -->
	<link rel="apple-touch-startup-image" href="img/splash/iphone.png" media="(device-width: 320px)">
	<!-- iPhone (Retina) SPLASHSCREEN (640x960) -->
	<link rel="apple-touch-startup-image" href="img/splash/iphone-retina.png" media="(device-width: 320px) and (-webkit-device-pixel-ratio: 2)">
	<!-- iPhone 5 SPLASHSCREEN (640×1096) -->
	<link rel="apple-touch-startup-image" href="img/splash/iphone5.png" media="(device-height: 568px) and (-webkit-device-pixel-ratio: 2)">
	<!-- iPad (portrait) SPLASHSCREEN (748x1024) -->
	<link rel="apple-touch-startup-image" href="img/splash/ipad-portrait.png" media="(device-width: 768px) and (orientation: portrait)">
	<!-- iPad (landscape) SPLASHSCREEN (768x1004) -->
	<link rel="apple-touch-startup-image" href="img/splash/ipad-landscape.png" media="(device-width: 768px) and (orientation: landscape)">
	<!-- iPad (Retina, portrait) SPLASHSCREEN (2048x1496) -->
	<link rel="apple-touch-startup-image" href="img/splash/ipad-portrait-retina.png" media="(device-width: 1536px) and (orientation: portrait) and (-webkit-min-device-pixel-ratio: 2)">
	<!-- iPad (Retina, landscape) SPLASHSCREEN (1536x2008) -->
	<link rel="apple-touch-startup-image" href="img/splash/ipad-landscape-retina.png" media="(device-width: 1536px)  and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 2)">

	<!-- Microsoft clear type rendering -->
	<meta http-equiv="cleartype" content="on">
</head>

<body class="clearfix with-menu with-shortcuts">

	<!-- Prompt IE 6 users to install Chrome Frame -->
	<!--[if lt IE 7]><p class="message red-gradient simpler">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

	<!-- Title bar -->
	<header role="banner" id="title-bar">
		<h2>WNYAUTOMATION</h2>
	</header>

	<!-- Button to open/hide menu -->
	<a href="#" id="open-menu"><span>Menu</span></a>

	<!-- Button to open/hide shortcuts -->
	<a href="#" id="open-shortcuts"><span class="icon-thumbs"></span></a>

	<!-- Main content -->
	<section role="main" id="main">

		<noscript class="message black-gradient simpler">Your browser does not support JavaScript! Some features won't work as expected...</noscript>

		<hgroup id="main-title" class="thin">
			<h1>@yield('title')</h1>
			<h2>{{date("h:i:sa")}} Today is {{date("l")}} <strong>{{ date("F") }} {{ date("d") }}, {{ date("Y") }}</strong></h2>
		</hgroup>

		<div class="with-padding">

			<!-- Main content here -->

			@yield('content')
			<br>

		</div>

	</section>
	<!-- End main content -->

	<!-- Side tabs shortcuts -->
	<ul id="shortcuts" role="complementary" class="children-tooltip tooltip-right">
		@if (Request::is('home'))
			<li class="current">
		@else
			<li>
		@endif
		<a href="/home" class="shortcut-dashboard" title="Dashboard">Dashboard</a></li>
		<li><a href="inbox.html" class="shortcut-messages" title="Messages">Messages</a></li>
		@if (Request::is('appointments/*'))
			<li class="current">
		@else
			<li>
		@endif
		<a href="/appointments/viewall" class="shortcut-agenda" title="Appointments">Appointments</a></li>
		<li><a href="tables.html" class="shortcut-contacts" title="Contacts">Contacts</a></li>
		<li><a href="explorer.html" class="shortcut-medias" title="Medias">Medias</a></li>
		<li><a href="sliders.html" class="shortcut-stats" title="Stats">Stats</a></li>
		<li><a href="form.html" class="shortcut-settings" title="Settings">Settings</a></li>
		@if (Request::is('admin/*'))
			<li class="current">
		@else
			<li>
		@endif
		<a href="/admin/viewallusers" class="shortcut-notes" title="Notes">Administration</a></li>

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
				<li><a href="inbox.html" title="Messages"><span class="icon-inbox"></span><span class="count">2</span></a></li>
				<li><a href="calendars.html" title="Calendar"><span class="icon-calendar"></span></a></li>
				<li><a href="/admin/viewuser/{{\Auth::user()->id}}" title="Profile"><span class="icon-user"></span></a></li>
				<li class="disabled"><span class="icon-gear"></span></li>
			</ul>
		</div>
		<!-- End content wrapper -->

		<!-- This is optional -->
		<ul class="big-menu">
			@if (\Auth::user()->admin_site_id > 0)
				<li><a href="/appointments/create">Create Appointment</a></li>
				<li><a href="/admin/createnewuser">Create New User</a></li>
				<li><a href="/appointments/viewall">All Appointments</a></li>
				<li><a href="/admin/viewallusers">All Users</a></li>
				<li><a href="/appointments/showbydate/{{ date('Y-m-d') }}">Today's Appointments</a></li>
				<li><a href="/admin/sendsimplesms">Send SMS</a></li>
			@else
				<li><a href="/appointments/showbyuser/{{\Auth::user()->id}}">My Appointments</a></li>
			@endif
			<li><a href="/auth/logout" title="Logout">Logout</a></li>
		</ul>


		<footer id="menu-footer">
		</footer>

	</section>
	<!-- End sidebar/drop-down menu -->

	<!-- JavaScript at the bottom for fast page loading -->

	<!-- Scripts -->
	<script src="{{ URL::asset('js/libs/jquery-1.10.2.min.js') }}"></script>
	<script src="{{ URL::asset('js/setup.js') }}"></script>

	<!-- Template functions -->
	<script src="{{ URL::asset('js/developr.table.js') }}"></script>
	<script src="{{ URL::asset('js/developr.input.js') }}"></script>
	<script src="{{ URL::asset('js/developr.navigable.js') }}"></script>
	<script src="{{ URL::asset('js/developr.notify.js') }}"></script>
	<script src="{{ URL::asset('js/developr.scroll.js') }}"></script>
	<script src="{{ URL::asset('js/developr.tooltip.js') }}"></script>
	<script src="{{ URL::asset('js/developr.agenda.js') }}"></script>

	<!-- Plugins -->
	<script src="{{ URL::asset('js/libs/jquery.tablesorter.min.js') }}"></script>
	<script src="{{ URL::asset('js/libs/DataTables/jquery.dataTables.min.js') }}"></script>

	<script>
		// Call template init (optional, but faster if called manually)
		$.template.init();

				// Table sort - DataTables
		var table = $('#sorting-advanced');
		table.dataTable({
			'aoColumnDefs': [
				{ 'bSortable': false, 'aTargets': [ 4, 5, 6 ] }
			],
			'sPaginationType': 'full_numbers',
			'sDom': '<"dataTables_header"lfr>t<"dataTables_footer"ip>',
			'fnInitComplete': function( oSettings )
			{
				// Style length select
				table.closest('.dataTables_wrapper').find('.dataTables_length select').addClass('select blue-gradient glossy').styleSelect();
				tableStyled = true;
			}
		});

		// Table sort - styled
		$('#sorting-example1').tablesorter({
			headers: {
				4: { sorter: false },
				5: { sorter: false },
				6: { sorter: false }
			}
		}).on('click', 'tbody td', function(event)
		{
			// Do not process if something else has been clicked
			if (event.target !== this)
			{
				return;
			}

			var tr = $(this).parent(),
				row = tr.next('.row-drop'),
				rows;

			// If click on a special row
			if (tr.hasClass('row-drop'))
			{
				return;
			}

			// If there is already a special row
			if (row.length > 0)
			{
				// Un-style row
				tr.children().removeClass('anthracite-gradient glossy');

				// Remove row
				row.remove();

				return;
			}

			// Remove existing special rows
			rows = tr.siblings('.row-drop');
			if (rows.length > 0)
			{
				// Un-style previous rows
				rows.prev().children().removeClass('anthracite-gradient glossy');

				// Remove rows
				rows.remove();
			}

			// Style row
			tr.children().addClass('anthracite-gradient glossy');


		}).on('sortStart', function()
		{
			var rows = $(this).find('.row-drop');
			if (rows.length > 0)
			{
				// Un-style previous rows
				rows.prev().children().removeClass('anthracite-gradient glossy');

				// Remove rows
				rows.remove();
			}
		});

		// Table sort - simple
	    $('#sorting-example2').tablesorter({
			headers: {
				4: { sorter: false },
				5: { sorter: false },
				6: { sorter: false }
			}
		});

	</script>
</body>
</html>