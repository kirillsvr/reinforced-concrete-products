<a href="<?php the_permalink(); ?>" class="single-post-listing">
	<span class="img-wrp <?php if(!has_post_thumbnail()) { echo 'without-img'; }; ?>" >
		<?php if( has_post_thumbnail() ) { the_post_thumbnail( 'thumbnail-post' ); } ?>
		<span class="date"><?php the_time('d F'); ?></span>
	</span>
	<div class="cont">
		<h4><?php the_title(); ?></h4>
		<?php the_excerpt(); ?>
	</div>
</a>