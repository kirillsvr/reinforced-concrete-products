<?php get_header(); ?>
	<div class="wrapper">
		<h1 class="page-title"><?php echo single_cat_title(); ?></h1>
		<?php
		global $wp_query;
		$term =	$wp_query->queried_object;
		?>
		<div class="entry-content">
			<?php $img = get_field('img', $term) ?>
			<?php if($img) : ?>
				<img src="<?=$img['sizes']['large']?>" class="product-category-thumbnail">
			<?php endif; ?>
			<?php the_field('cat_content', $term); ?>
		</div>

		<h4 class="our-products-title">Наша продукция:</h4>
		
      	<?php if($inca = get_field('tov_str', $term)) : ?>
      	<div class="products-listing">
          <?php foreach($inca as $in) : ?>
          <a href="<?=$in['ssil']?>" class="single-product-listing">
              <img width="150" height="150" src="<?=$in['img']?>" class="attachment-thumbnail size-thumbnail wp-post-image" alt="cat-icon22">
              <div class="cont">
                  <h4><?=$in['title']?></h4>
                  <p><?=$in['desc']?></p>
              </div>
          </a>
          <?php endforeach; ?>
      	</div>
      	<?php endif; ?>


		<?php if($delivers = get_field('whom_deliver', $term)) : ?>
			<div class="delivers-list">
				<h4><?php the_field('our_deliveries_title', $term); ?></h4>
				<div class="delivers-list-wrp">
					<?php foreach($delivers as $d) : ?>
						<a href="<?=$d['link']?>" class="block">
							<div class="img-wrp">
								<img src="<?=$d['logo']['url']?>">
							</div>
							<p class="company-name"><?=$d['company_name']?></p>
							<p class="desc"><?=$d['delivery_description']?></p>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>

	
	</div>
<?php get_footer(); ?>