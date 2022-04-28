<div class="single-post-listing-3">
	<a href="<?php the_permalink(); ?>" class="img-wrp">
		<?php the_post_thumbnail('thumbnail-post'); ?>
		<span class="date"><?php the_time('d F'); ?></span>
	</a>
	<div class="cont">
		<h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		<div class="desc"><?php the_excerpt(); ?></div>
	</div>
</div>