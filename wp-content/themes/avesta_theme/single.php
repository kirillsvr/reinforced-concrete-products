<?php get_header(); ?>
	<div class="wrapper">
		<h1 class="page-title"><?php the_title(); ?></h1>

		<?php get_sidebar( 'left' ); ?>
		
		<div class="content-with-sidebar content-with-sidebar-left">
			<div class="single-post-date"><?php the_time('d.m.Y'); ?></div>
			<?php if(have_posts()) : ?>
				<?php while(have_posts()) : the_post(); ?>
					<div class="entry-content"><?php the_content(); ?></div>
				<?php endwhile; ?>
			<?php endif; ?>
			<?php
			$cats = wp_get_post_categories(get_the_id(), array('fields' => 'all'));
			?>
			<?php if($cats[0] && get_field('text_link_for_all', $cats[0])) : ?>
				<a href="<?=get_category_link($cats[0]->term_id);?>" class="category-back-link">
					<img src="<?=get_template_directory_uri()?>/images/back-arrow.png">
					<span><?php the_field('text_link_for_all', $cats[0]); ?></span>
				</a>
			<?php endif; ?>
		</div>

		
	</div>
<?php get_footer(); ?>