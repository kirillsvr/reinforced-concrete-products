<?php get_header(); ?>
	<div class="wrapper">
		<h1 class="page-title"><?php echo single_cat_title(); ?></h1>
		<?php get_sidebar( 'left' ); ?>
		<div class="content-with-sidebar content-with-sidebar-left">
			<?php if(have_posts()) : ?>
				<?php while(have_posts()) : the_post(); ?>
					<?php get_template_part('content', 'post'); ?>
				<?php endwhile; ?>
			<?php endif; ?>

			<?php wplift_pagination(); ?>
		</div>

	</div>
<?php get_footer(); ?>