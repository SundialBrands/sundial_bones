<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f6ebb3">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
            <meta name="theme-color" content="#121212">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>
		<script src="https://use.typekit.net/aiy5nih.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>

	</head>

	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

		<div id="container">

			<header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">

				<div id="inner-header" class="wrap cf">
				
<!-- 
					<div class="to-nav">
						<a id="show-menu" class="btn" href="#menu-main"><i class="fa fa-bars fa-lg"></i></a>
					</div>
 -->
					
					<div id="logo" class="h1" itemscope itemtype="http://schema.org/Organization">
						<a href="http://www.sheamoisture.com" rel="nofollow"><img src="/wp-content/themes/sundial_bones/library/images/logo.png" alt="SheaMoisture. Established 1912." />
						</a>
					</div>
					
					<nav role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
						<?php 
							// wp_nav_menu( array(
// 								 'container' => true,                           // remove nav container
// 								 'container_class' => 'menu cf',                 // class of container (should you choose to use it)
// 								 'menu' => __( 'Top Main Menu', 'bonestheme' ),  // nav name
// 								 'menu_class' => 'nav top-nav cf',               // adding custom nav class
// 								 'theme_location' => 'main-nav',                 // where it's located in the theme
// 								 'before' => '',                                 // before the menu
// 								   'after' => '',                                  // after the menu
// 								   'link_before' => '',                            // before each link
// 								   'link_after' => '',                             // after each link
// 								   'depth' => 0,                                   // limit the depth of the nav
// 								 'fallback_cb' => ''                             // fallback function (if there is one)
// 							) ); 

							echo apply_filters('bones_before_dropdown', '<h1 class="bones-dropdown-sentence">Find a solution for ') . '<div class="dropdown-items" select-text="select:">';
							wp_nav_menu( array(
								'container' => false,                           // remove nav container
								'container_class' => 'menu cf',                 // class of container (should you choose to use it)
								'menu' => __( 'Top Main Menu', 'bonestheme' ),  // nav name
								'menu_class' => 'nav top-dropdown cf',               // adding custom nav class
								'menu_id'	=> 'menu-dropdown',
								'theme_location' => 'top-dropdown',                 // where it's located in the theme
								'before' => '',                                 // before the menu item
								'after' => '',                                  // after the menu item
								'link_before' => '',                            // before each link
								'link_after' => '',                             // after each link
								'depth' => 1,                                   // limit the depth of the nav
								'fallback_cb' => ''                             // fallback function (if there is one)
							) ); 
							echo '<i class="fa fa-chevron-down "></i></div>' . apply_filters('bones_after_dropdown', '.</h1>');
						?>

					</nav>

					
				</div>

			</header>
