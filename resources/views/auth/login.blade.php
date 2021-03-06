﻿<!DOCTYPE html>

<!--[if IEMobile 7]><html class="no-js iem7 oldie linen"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js ie7 oldie linen" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js ie8 oldie linen" lang="en"><![endif]-->
<!--[if (IE 9)&!(IEMobile)]><html class="no-js ie9 linen" lang="en"><![endif]-->
<!--[if (gt IE 9)|(gt IEMobile 7)]><!--><html class="no-js linen" lang="en"><!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Developr</title>
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

	<!-- Additional styles -->
	<link rel="stylesheet" href="{{ URL::asset('css/styles/form.css?v=1') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/styles/switches.css?v=1') }}">

	<!-- Login pages styles -->
	<link rel="stylesheet" media="screen" href="{{ URL::asset('css/login.css?v=1') }}">

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
	<!-- iPhone 5 SPLASHSCREEN (640×1096) -->
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
</head>

<body>

	<div id="container">

		<hgroup id="login-title" class="large-margin-bottom">
			<h1 class="login-title-image">WNYAUTOMATION</h1>
			<h5>&copy; WNYAUTOMATION</h5>
		</hgroup>

		<div id="form-wrapper">

			<div id="form-block" class="scratch-metal">
				<div id="form-viewport">

					<form method="post" action="/auth/login" class="input-wrapper blue-gradient glossy" title="Login">
						<ul class="inputs black-input large">
							{!! csrf_field() !!}
							<!-- The autocomplete="off" attributes is the only way to prevent webkit browsers from filling the inputs with yellow -->
							<li><span class="icon-user mid-margin-right"></span><input type="text" name="email" id="login" value="" class="input-unstyled" placeholder="Login" autocomplete="off"></li>
							<li><span class="icon-lock mid-margin-right"></span><input type="password" name="password" id="pass" value="" class="input-unstyled" placeholder="Password" autocomplete="off"></li>
						</ul>

						<p class="button-height">
							<button type="submit" class="button glossy float-right" id="login">Login</button>
							<input type="checkbox" name="remember" id="remind" value="1" checked="checked" class="switch tiny mid-margin-right with-tooltip" title="Enable auto-login">
							<label for="remind">Remember me</label>
						</p>
					</form>

					<form method="post" action="" id="form-password" class="input-wrapper orange-gradient glossy" title="Lost password?">

						<p class="message">
							If you can’t remember your password, fill the input below with your e-mail and we’ll send you a new one:
							<span class="block-arrow"><span></span></span>
						</p>

						<ul class="inputs black-input large">
							<li><span class="icon-mail mid-margin-right"></span><input type="email" name="mail" id="mail" value="" class="input-unstyled" placeholder="Your e-mail" autocomplete="off"></li>
						</ul>

						<button type="submit" class="button glossy full-width" id="send-password">Send new password</button>

					</form>

					<form method="post" action="" id="form-register" class="input-wrapper green-gradient glossy" title="Register">

						<p class="message">
							New user? Yay! Let us know a little bit about you before you start:
							<span class="block-arrow"><span></span></span>
						</p>

						<ul class="inputs black-input large">
							<li><span class="icon-card mid-margin-right"></span><input type="text" name="name" id="name-register" value="" class="input-unstyled" placeholder="Your name" autocomplete="off"></li>
							<li><span class="icon-mail mid-margin-right"></span><input type="email" name="mail" id="mail-register" value="" class="input-unstyled" placeholder="Your e-mail" autocomplete="off"></li>
						</ul>
						<ul class="inputs black-input large">
							<li><span class="icon-user mid-margin-right"></span><input type="text" name="login" id="login-register" value="" class="input-unstyled" placeholder="Login" autocomplete="off"></li>
							<li><span class="icon-lock mid-margin-right"></span><input type="password" name="pass" id="pass-register" value="" class="input-unstyled" placeholder="Password" autocomplete="off"></li>
						</ul>

						<button type="submit" class="button glossy full-width" id="send-register">Register</button>

					</form>

				</div>
			</div>

		</div>

	</div>

	<!-- JavaScript at the bottom for fast page loading -->

	<!-- Scripts -->
	<script src="{{ URL::asset('js/libs/jquery-1.10.2.min.js') }}"></script>
	<script src="{{ URL::asset('js/setup.js') }}"></script>

	<!-- Template functions -->
	<script src="{{ URL::asset('js/developr.input.js') }}"></script>
	<script src="{{ URL::asset('js/developr.message.js') }}"></script>
	<script src="{{ URL::asset('js/developr.notify.js') }}"></script>
	<script src="{{ URL::asset('js/developr.tooltip.js') }}"></script>

	<script>

		/*
		 * How do I hook my login script to these?
		 * --------------------------------------
		 *
		 * These scripts are meant to be non-obtrusive: if the user has disabled javascript or if an error occurs, the forms
		 * works fine without ajax.
		 *
		 * The only part you need to edit are the scripts between the EDIT THIS SECTION tags, which do inputs validation and
		 * send data to server. For instance, you may keep the validation and add an AJAX call to the server with the user
		 * input, then redirect to the dashboard or display an error depending on server return.
		 *
		 * Or if you don't trust AJAX calls, just remove the event.preventDefault() part and let the form be submitted.
		 */

		$(document).ready(function()
		{
			/*
			 * JS login effect
			 * This script will enable effects for the login page
			 */
				// Elements
			var doc = $('html').addClass('js-login'),
				container = $('#container'),
				formWrapper = $('#form-wrapper'),
				formBlock = $('#form-block'),
				formViewport = $('#form-viewport'),
				forms = formViewport.children('form'),

				// Doors
				topDoor = $('<div id="top-door" class="form-door"><div></div></div>').appendTo(formViewport),
				botDoor = $('<div id="bot-door" class="form-door"><div></div></div>').appendTo(formViewport),
				doors = topDoor.add(botDoor),

				// Switch
				formSwitch = $('<div id="form-switch"><span class="button-group"></span></div>').appendTo(formBlock).children(),

				// Current form
				hash = (document.location.hash.length > 1) ? document.location.hash.substring(1) : false,

				// If layout is centered
				centered,

				// Store current form
				currentForm,

				// Animation interval
				animInt,

				// Work vars
				maxHeight = false,
				blocHeight;

			/******* EDIT THIS SECTION *******/

			
			/*
			 * Password recovery
			 */
			$('#form-password').submit(function(event)
			{
				// Values
				var mail = $.trim($('#mail').val());

				// Stop normal behavior
				event.preventDefault();

				// Check inputs
				if (mail.length === 0)
				{
					// Display message
					displayError('Please fill in your email');
				}
				// Want more robust mail validation? see http://stackoverflow.com/a/2855946
				else if (!/^[a-z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/.test(mail))
				{
					// Remove empty email message if displayed
					formWrapper.clearMessages('Please fill in your email');

					// Display message
					displayError('Email is not valid');
					return false;
				}
				else
				{
					// Remove previous messages
					formWrapper.clearMessages();

					// Show progress
					displayLoading('Sending credentials...');

					/*
					 * This is where you may do your AJAX call
					 */

					// Simulate server-side check
					setTimeout(function() {
						document.location.href = './'
					}, 2000);
				}
			});

			/*
			 * Register
			 */
			$('#form-register').submit(function(event)
			{
				// Values
				var name = $.trim($('#name-register').val()),
					mail = $.trim($('#mail-register').val()),
					login = $.trim($('#login-register').val()),
					pass = $.trim($('#pass-register').val());

				// Remove previous messages
				formWrapper.clearMessages();

				// Stop normal behavior
				event.preventDefault();

				// Check inputs
				if (name.length === 0)
				{
					// Display message
					displayError('Please fill in your name');
					return false;
				}
				else if (mail.length === 0)
				{
					// Display message
					displayError('Please fill in your email');
					return false;
				}
				else if (!/^[a-z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/.test(mail))
				{
					// Display message
					displayError('Email is not valid');
					return false;
				}
				else if (login.length === 0)
				{
					// Display message
					displayError('Please fill in your login');
					return false;
				}
				else if (pass.length === 0)
				{
					// Display message
					displayError('Please fill in your password');
					return false;
				}
				else
				{
					// Show progress
					displayLoading('Registering...');

					/*
					 * This is where you may do your AJAX call
					 */

					// Simulate server-side check
					setTimeout(function() {
						document.location.href = './'
					}, 2000);
				}
			});

			/******* END OF EDIT SECTION *******/

			/*
			 * Animated login
			 */

			// Prepare forms
			forms.each(function(i)
			{
				var form = $(this),
					height = form.outerHeight(),
					active = (hash === false && i === 0) || (hash === this.id),
					color = this.className.match(/[a-z]+-gradient/) ? ' '+(/([a-z]+)-gradient/.exec(this.className)[1])+'-active' : '';

				// Store size
				form.data('height', height);

				// Min-height for mobile layout
				if (maxHeight === false || height > maxHeight)
				{
					maxHeight = height;
				}

				// Button in the switch
				form.data('button', $('<a href="#'+this.id+'" class="button anthracite-gradient'+color+(active ? ' active' : '')+'">'+this.title+'</a>')
									.appendTo(formSwitch)
									.data('form', form));

				// Remove title to prevent tooltip from showing - thanks efreed :)
				this.title = '';

				// If active
				if (active)
				{
					// Store
					currentForm = form;

					// Height of viewport
					formViewport.height(height);
				}
				else
				{
					// Hide for now
					form.hide();
				}
			});

			// Main bloc height (without form height)
			blocHeight = formBlock.height()-currentForm.data('height');

			// Handle resizing (mostly for debugging)
			function handleLoginResize()
			{
				// Detect mode
				centered = (container.css('position') === 'absolute');

				// Set min-height for mobile layout
				if (!centered)
				{
					formWrapper.css('min-height', (blocHeight+maxHeight+20)+'px');
					container.css('margin-top', '');
				}
				else
				{
					formWrapper.css('min-height', '');
					if (parseInt(container.css('margin-top'), 10) === 0)
					{
						centerForm(currentForm, false);
					}
				}
			};

			// Register and first call
			$(window).on('normalized-resize', handleLoginResize);
			handleLoginResize();

			// Switch behavior
			formSwitch.on('click', 'a', function(event)
			{
				var link = $(this),
					form = link.data('form'),
					previousForm = currentForm;

				event.preventDefault();
				if (link.hasClass('active'))
				{
					return;
				}

				// Refresh forms sizes
				forms.each(function(i)
				{
					var form = $(this),
						hidden = form.is(':hidden'),
						height = form.show().outerHeight();

					// Store size
					form.data('height', height);

					// If not active
					if (hidden)
					{
						// Hide for now
						form.hide();
					}
				});

				// Clear messages
				formWrapper.clearMessages();

				// If an animation is already running
				if (animInt)
				{
					clearTimeout(animInt);
				}
				formViewport.stop(true);

				// Update active button
				currentForm.data('button').removeClass('active');
				link.addClass('active');

				// Set as current
				currentForm = form;

				// if CSS transitions are available
				if (doc.hasClass('csstransitions'))
				{
					// Close doors - step 1
					doors.removeClass('door-closed').addClass('door-down');
					animInt = setTimeout(function()
					{
						// Close doors, step 2
						doors.addClass('door-closed');
						animInt = setTimeout(function()
						{
							// Hide previous form
							previousForm.hide();

							// Show target form
							form.show();

							// Center layout
							centerForm(form, true);

							// Height of viewport
							formViewport.animate({
								height: form.data('height')+'px'
							}, function()
							{
								// Open doors, step 1
								doors.removeClass('door-closed');
								animInt = setTimeout(function()
								{
									// Open doors - step 2
									doors.removeClass('door-down');
								}, 300);
							});
						}, 300);
					}, 300);
				}
				else
				{
					// Close doors
					topDoor.animate({ top: '0%' }, 300);
					botDoor.animate({ top: '50%' }, 300, function()
					{
						// Hide previous form
						previousForm.hide();

						// Show target form
						form.show();

						// Center layout
						centerForm(form, true);

						// Height of viewport
						formViewport.animate({
							height: form.data('height')+'px'
						}, {

							/* IE7 is a bit buggy, we must force redraw */
							step: function(now, fx)
							{
								topDoor.hide().show();
								botDoor.hide().show();
								formSwitch.hide().show();
							},

							complete: function()
							{
								// Open doors
								topDoor.animate({ top: '-50%' }, 300);
								botDoor.animate({ top: '105%' }, 300);
								formSwitch.hide().show();
							}
						});
					});
				}
			});

			// Initial vertical adjust
			centerForm(currentForm, false);

			/*
			 * Center function
			 * @param jQuery form the form element whose height will be used
			 * @param boolean animate whether or not to animate the position change
			 * @param string|element|array any jQuery selector, DOM element or set of DOM elements which should be ignored
			 * @return void
			 */
			function centerForm(form, animate, ignore)
			{
				// If layout is centered
				if (centered)
				{
					var siblings = formWrapper.siblings().not('.closing'),
						finalSize = blocHeight+form.data('height');

					// Ignored elements
					if (ignore)
					{
						siblings = siblings.not(ignore);
					}

					// Get other elements height
					siblings.each(function(i)
					{
						finalSize += $(this).outerHeight(true);
					});

					// Setup
					container[animate ? 'animate' : 'css']({ marginTop: -Math.round(finalSize/2)+'px' });
				}
			};

			/**
			 * Function to display error messages
			 * @param string message the error to display
			 */
			function displayError(message)
			{
				// Show message
				var message = formWrapper.message(message, {
					append: false,
					arrow: 'bottom',
					classes: ['red-gradient'],
					animate: false					// We'll do animation later, we need to know the message height first
				});

				// Vertical centering (where we need the message height)
				centerForm(currentForm, true, 'fast');

				// Watch for closing and show with effect
				message.on('endfade', function(event)
				{
					// This will be called once the message has faded away and is removed
					centerForm(currentForm, true, message.get(0));

				}).hide().slideDown('fast');
			};

			/**
			 * Function to display loading messages
			 * @param string message the message to display
			 */
			function displayLoading(message)
			{
				// Show message
				var message = formWrapper.message('<strong>'+message+'</strong>', {
					append: false,
					arrow: 'bottom',
					classes: ['blue-gradient', 'align-center'],
					stripes: true,
					darkStripes: false,
					closable: false,
					animate: false					// We'll do animation later, we need to know the message height first
				});

				// Vertical centering (where we need the message height)
				centerForm(currentForm, true, 'fast');

				// Watch for closing and show with effect
				message.on('endfade', function(event)
				{
					// This will be called once the message has faded away and is removed
					centerForm(currentForm, true, message.get(0));

				}).hide().slideDown('fast');
			};
		});

	</script>

</body>
</html>