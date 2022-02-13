<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/images/shortcuts.png">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<title><?php wp_title( "",true, 'right' ); ?></title>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head();
     $path = bloginfo('template_directory');
	?>
</head>

<body <?php body_class(); ?>>
  <img src="<?php bloginfo('template_directory'); ?>/images/background.jpg" id="bg"/>
  <div class="w3-container">
    <div id="logo">
    <img src="<?php bloginfo('template_directory'); ?>/images/logo.png"/><span><?php bloginfo( 'name' ) ?></span>
    </div>


    <ul class="w3-navbar">
		<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="material-icons">home</i></a></li>
		<?php wp_nav_menu();?>
   </ul>
