<?php get_header(); ?>
	<div class="wrapper">
		<?php $page_for_posts = get_option( 'page_for_posts' ); ?>
		
		<h1 class="page-title">
			<?php if($title = get_field('custom_page_title', $page_for_posts)){
				echo $title;
				}else{
					single_post_title();
				}
				 ?>
		</h1>


		<?php 
		global $wp_query;
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
		<?php if($paged < 2 && get_field('seo_text_top', $page_for_posts)) : ?>
			<div class="entry-content seo-text-top"><?php the_field('seo_text_top', $page_for_posts); ?></div>
		<?php endif; ?>
	



		<?php if(have_posts()) : ?>
			<div class="posts-wrp">
				<?php while(have_posts()) : the_post(); ?>
					<?php get_template_part('content', 'post'); ?>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>


		<?php global $wp_query; ?>
		<?php if($wp_query->max_num_pages > 1) : ?>
			<div class="pagination">
				<?php wplift_pagination(); ?>
			</div>
		<?php endif; ?>

		<?php if($paged < 2 && get_field('seo_text_bottom', $page_for_posts)) : ?>
			<div class="entry-content seo-text-bottom seo-text-bottom-sidebar"><?php the_field('seo_text_bottom', $page_for_posts); ?></div>
		<?php endif; ?>

			
	</div>
<?php get_footer(); ?>