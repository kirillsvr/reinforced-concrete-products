<a href="<?php the_permalink(); ?>" class="single-product-listing">
	<?php the_post_thumbnail( 'thumbnail' ); ?>
	<div class="cont">
		<h4><?php the_title(); ?></h4>
		<p><?php the_excerpt() ?></p>
	</div>
</a>