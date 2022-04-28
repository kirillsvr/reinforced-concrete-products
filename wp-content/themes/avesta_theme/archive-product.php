<?php get_header(); ?>
	<div class="wrapper">
		<h1 class="page-title">Каталог</h1>

		<?php $file = get_field('price_list', 'options'); ?>
		<p class="katalog-desc <?php echo $file ? '' : 'without-file'; ?>">
			<span class="text"><?php the_field('catalog_text', 'options'); ?></span>
			<?php if($file) : ?>
				<a href="<?=$file?>" class="price-list-link">
					<img src="<?=get_template_directory_uri()?>/images/price-list.png">
					<span>Прайс лист</span>
				</a>
			<?php endif; ?>
		</p>


		<?php
		if($terms = get_field('categories_order', 'options')) :
			echo '<div class="product-categories-list">';
			foreach($terms as $term) :
			?>
				<?php $img = get_field('catalog_page_icon', $term); ?>
				<div class="product-category-block" style="background-image: url(<?=$img['url']?>)">
					<h3>
						<a href="<?php echo get_term_link($term, 'product_category'); ?>">
							<?=get_field('second_title', $term)?>
						</a>
					</h3>

					<?php if($products = get_field('tovar_pov', $term)) : ?>
						<?php if(get_field('tovar_dor', $term)) : ?>
						<ul class="inb">
							<?php foreach($products as $product) :?>
								<li><a href="<?=$product['href']?>"><?=$product['title']?></a></li>
							<?php endforeach; ?>
						</ul>
						<?php else: ?>
						<ul>
							<?php foreach($products as $product) :?>
								<li><a href="<?=$product['href']?>"><?=$product['title']?></a></li>
							<?php endforeach; ?>
						</ul>
						<?php endif; ?>
					<?php endif; ?>
					<?php if($products2 = get_field('tovar_dor', $term)) : ?>
						<ul class="inb2">
							<?php foreach($products2 as $product2) :?>
								<li><a href="<?=$product2['href']?>"><?=$product2['title']?></a></li>
							<?php endforeach; ?>
						</ul>
						<div style="display:block;"></div>
					<?php endif; ?>


					<a href="<?php echo get_term_link($term, 'product_category'); ?>" class="go-to-category"><?=get_field('text_all_production', $term)?></a>
				</div>
			<?php 
			endforeach;
			echo '</div>';
		endif;
		?>
		
		
		<div class="useful-info">
			<h3>Полезная информация</h3>
			<div class="three-post-wrp">
				<?php 
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 3
				); 
				$query = new WP_Query($args); ?>
				<?php if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); ?>
					<?php get_template_part('content', 'post-three'); ?>
				<?php endwhile; endif; wp_reset_query(); ?>
			</div>
		</div>


	</div>
<?php get_footer(); ?>