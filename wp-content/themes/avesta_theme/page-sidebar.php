<?php 
/*
Template Name: Page Sidebar
 */
get_header(); ?>
	<div class="wrapper">
		<h1 class="page-title"><?php the_title(); ?></h1>
      
      	<?php get_sidebar( 'left' ); ?>
		
		<div class="content-with-sidebar content-with-sidebar-left">
			<div class="entry-content">
				<?php if(have_posts()) : while(have_posts()) : the_post(); the_content(); endwhile; endif; ?>
			</div>
        </div>
		


	</div>


<?php get_footer(); ?>