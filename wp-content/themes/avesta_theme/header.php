<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>
		<?php bloginfo('name'); ?><?php wp_title(", ", true); ?>
	</title>
	<link rel="icon" href="<?php the_field('favicon', 'options'); ?>" type="image/x-icon">
	<link rel="shortcut icon" href="<?php the_field('favicon', 'options'); ?>" type="image/x-icon"> 
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--<meta name="viewport" content=" initial-scale=1, maximum-scale=1" />-->
	<meta name="viewport" content="width=device-width">

	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<script type="text/javascript">
        var ajax_url = '<?php echo admin_url("admin-ajax.php"); ?>';
    </script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> data-menu="<?php echo isset($_COOKIE['visible_menu']) && $_COOKIE['visible_menu'] == '0' ? 'hidden' : ''; ?>">
	<div class="page-wrapper">
		<header class="site-header">
			<div class="wrapper">
				<a href="<?php echo get_settings('home'); ?>" class="logo">
					<img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" />
					<span class="logo-text">
						<span class="title">Авеста</span>
						<span class="sub-title">Производство и продажа <br>железобетонных изделий</span>
					</span>
				</a>
				<div class="right">
					<div class="top">
						<div class="location">
							<?php the_field('opt_address', 'options'); ?>
						</div>
						<a href="mailto:<?php the_field('opt_email', 'options'); ?>" class="header-mail"><?php the_field('opt_email', 'options'); ?></a>
						<div class="header-top-right">
							<div class="tel"><?php the_field('opt_telephone', 'options'); ?></div>
							<a href="#order-call-back-popup" class="popup-link">Заказать звонок</a>
						</div>
					</div>
					<nav class="header-nav">
						<?php wp_nav_menu( array( 'theme_location' => 'header_menu1', 'container' => false) ); ?>
					</nav>
				</div>
			</div>
		</header>
		<!-- .site-header -->
		
		<div class="page-content">
			
			<?php if(!is_front_page()) : ?>
				<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
				 	<div class="wrapper">
					 		<?php if(function_exists('bcn_display'))
					    {
					      bcn_display();
					    }?>
				 	</div>
				</div>
			<?php endif; ?>
			
		