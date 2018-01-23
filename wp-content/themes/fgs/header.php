<?php
/**
 * Header
 */
?>
<!DOCTYPE html>
<!--[if !(IE)]><!-->
<html <?php language_attributes(); ?>> <!--<![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9 ie8" lang="en"><![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<!--[if gte IE 9]>
<style type="text/css">
	.gradient {
		filter: none;
	}
</style>
<![endif]-->

<head>
	<!-- Set up Meta -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta charset="<?php bloginfo('charset'); ?>">

	<!-- Set the viewport width to device width for mobile -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

	<!-- Add Google Fonts -->
<!-- 	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600,700,800' rel='stylesheet' type='text/css'> -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700,700i,800,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Arimo" rel="stylesheet">



	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- <div class="preloader">
	<div class="preloader__icon"></div>
</div> -->

<!-- BEGIN of header -->
<header class="header">
	<div class="row medium-uncollapse small-collapse">
		<div class="medium-3 small-12 columns">
			<div class="logo text-left">
				<?php show_custom_logo(); ?>
			</div>
		</div>
		<div class="medium-9 small-12 columns text-right">
			<div class="row">
				<div class="small-12 columns">
					<?php if ($phone = get_field('phone', 'options')) : ?>
						<a class="phone" href="tel:<?php echo preparePhone($phone); ?>"><i class="fa fa-mobile" aria-hidden="true"></i><?php echo $phone; ?></a>
					<?php endif; ?>
					<div class="search-form">
						<button class="search-buttom" id="search-btn" ><i class="fa fa-search" aria-hidden="true"></i></button>
							<?php get_search_form(); ?>
					</div>
				</div>
				<div class="small-12 columns">
					<nav class="top-bar" id="main-menu">
						<?php ubermenu( 'headermenu' , array( 'theme_location' => 'header-menu' ) ); ?>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>
<!-- END of header -->
