<!doctype html>
<html <?php language_attributes(); ?>>
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/bootstrap.css">

		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/navigation.css">
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/font.css">
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/accordian.css">
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/custome.css">
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/custome2.css">
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/responsive.css">
		<link href="<?php bloginfo('template_url'); ?>/css/owl.carousel.css" rel="stylesheet">
		<link href="<?php bloginfo('template_url'); ?>/css/owl.theme.css" rel="stylesheet">


		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/fontawesome-all.min.css">

		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />

		<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<?php wp_head() ?>
</head>
<?php
	$stlye = '';
	$bodyClass = '';

	if( !is_home() && is_front_page() ){
		$bodyClass =  'home-bg';
	
	}elseif(is_page_template( 'template/find_a_distributor.php' )){
		$bodyClass =  'distributor-bg';
	}elseif(is_page_template( 'template/contact.php' )){
		$bodyClass =  'contact_bg';
	}elseif(is_page_template( 'template/resources.php' )){
		$bodyClass =  'resource_bg';
	}elseif(is_page_template( 'template/about.php' )){
		$bodyClass =  'about_bg';

	}elseif(is_single('wall-mounted-type' )){
		$bodyClass =  'wall-mounted-bg';



	}elseif(is_tax( 'product_category','indoor' )){
		$bodyClass =  'indoor-bg';
	}elseif(has_term('indoor','product_category')){
		$bodyClass =  'ahu-kit-bg';

	}elseif(has_term('controllers','product_category')){
		$bodyClass =  'ahu-kit-bg';

	}elseif(is_tax( 'resource_category','indoor' )){
		$bodyClass =  'indoor-bg';
	}elseif(has_term('indoor','resource_category')){
		$bodyClass =  'indoor-bg';

	}elseif(is_tax( 'product_category','solar' )){
		$bodyClass =  'solar-bg';
	}elseif(has_term('solar','product_category')){
		$bodyClass =  'solar-bg';

	}elseif(is_tax( 'resource_category','solar' )){
		$bodyClass =  'solar-bg';
	}elseif(has_term('solar','resource_category')){
		$bodyClass =  'solar-bg';


	}elseif(is_tax( 'product_category','ultra-heat' )){
		$bodyClass =  'ultra-heat-bg';
	}elseif(has_term('ultra-heat','product_category')){
		$bodyClass =  'ultra-heat-bg';

	}elseif(is_tax( 'resource_category','ultra-heat' )){
		$bodyClass =  'ultra-heat-bg';
	}elseif(has_term('ultra-heat','resource_category')){
		$bodyClass =  'ultra-heat-bg';


	}elseif(has_term('heat-recovery','resource_category')){
		$bodyClass =  'heat-recovery-bg';
	}elseif(has_term('heat-pumps','resource_category')){
		$bodyClass =  'gmv5-bg';


	}elseif(has_term('heat-recovery','product_category')){
		$bodyClass =  'heat-recovery-bg';

	}elseif(is_tax( 'product_category','heat-pumps' )){
		$bodyClass =  'heatpump';
	}elseif(has_term('heat-pumps','product_category')){
		$bodyClass =  'gmv5-bg';


	}elseif(is_tax( 'product_category','control' )){
		$bodyClass =  'control-bg';
	}elseif(has_term('control','product_category')){
		$bodyClass =  'control-big-bg';
	}elseif(has_term('indoor-control','product_category')){
		$bodyClass =  'control-big-bg';
	}elseif(has_term('outdoor','product_category')){
		$bodyClass =  'control-big-bg';

	}elseif(has_term('system-management','product_category')){
		$bodyClass =  'control-big-bg';

	}elseif(is_tax( 'product_category')){
		$bodyClass =  'indoor-bg';
	}elseif(is_tax( 'resource_category')){
		$bodyClass =  'indoor-bg';


	}elseif(is_page_template( 'template/product.php') || is_singular( 'product' )){
		$bodyClass =  'product_bg';

	}else{
		$stlye = ' style="background:#F7FCFF;"';
	}
?>
<body <?php body_class(); ?>>
		<div class="page">
			<?php
				$pageHeadClass = ( !is_home() && ! is_front_page() ) ? ' top-bg-clr' : '';
			?>
		  <header class="page-head<?php echo $pageHeadClass; ?>">
		    <div class="rd-navbar-wrap" style="height: 107px;">
		      <nav class="rd-navbar rd-navbar-default rd-navbar--is-touch rd-navbar-original rd-navbar-static" data-body-class="rd-navbar-static-smooth" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static">
		        <div class="rd-navbar-inner">
		          <div class="rd-navbar-panel"> <a class="rd-navbar-brand brand top-logo" href="<?php echo get_settings('home'); ?>">
								<?php if( !is_home() && is_front_page() ){ ?>
									<img src="<?php echo get_field('header_logo','option'); ?>" alt=" <?php the_title(); ?>"/>
								<?php } else { ?>
									<img src="<?php echo get_field('header_inner_logo','option'); ?>" alt=" <?php the_title(); ?>"/>
								<?php } ?>
							</a>
		            <button class="rd-navbar-toggle" data-custom-toggle=".rd-navbar-nav-wrap" data-custom-toggle-disable-on-blur="true"><span></span></button>
		          </div>
		          <div class="rd-navbar-nav-wrap">
		            <div class="rd-navbar-nav-inner">
									<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class' => 'rd-navbar-nav' , 'container'=> '') ); ?>
		            </div>
		          </div>
		        </div>
		      </nav>
		    </div>
		  </header>
		  <!-- Material Parallax-->
		</div>
		<div class="clearfix"></div>
		<?php $productBackground = get_post() ? get_field('background') : ''; 
				// Get the body classes as array
				$classes = get_body_class();
				$isProductPage = 'not-product-page';
				// For exact maych try this
				if (in_array('single-product', $classes)) {
					$isProductPage = 'is-product-page';
				}
		?>
		<section class="main-div<?php if ($productBackground): ?> custom-background<?php endif ?> <?php echo $bodyClass; ?> <?php echo $isProductPage; ?>" <?php //echo $stlye; ?><?php if ($productBackground): ?> style="background-image: url(<?= esc_attr($productBackground) ?>)"<?php endif ?>>
