<div class="sidebar-left-fixed <?php echo isset($_COOKIE['visible_menu']) && $_COOKIE['visible_menu'] == '0' ? 'hidden' : ''; ?>">
	<span class="fixed-menu-btn">
		<img src="<?=get_template_directory_uri()?>/images/fied-menu-icon.png">
	</span>
	<div class="sidebar-fixed-content">
		<h3>Продукция</h3>
		<?php if($rwe = get_field('rod')) : echo $rwe;?>img<?php endif; ?>
		<?php 	
			$yyy = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
			$ooasd = 0;
			$bip = 0;
			if(is_tax('product_category')){
				$ooo = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
				$times_o = get_field('jbi_gr', 'options');
				foreach ($times_o as $time_o) {
    					$links_o[]=$time_o['ssil'];
				};
				$times_t = get_field('jbi_im', 'options');
				foreach ($times_t as $time_t) {
    					$links_t[]=$time_t['ssil'];
				};
				$times_th = get_field('jbi_en', 'options');
				foreach ($times_th as $time_th) {
    					$links_th[]=$time_th['ssil'];
				};
				$times_f = get_field('jbi_dor', 'options');
				foreach ($times_f as $time_f) {
    					$links_f[]=$time_f['ssil'];
				};
				if (in_array($ooo, $links_o)) {
    					$ooasd = 0;
					$bip = 1;
				}elseif(in_array($ooo, $links_t)){
					$ooasd = 2;
					$bip = 1;
				}elseif(in_array($ooo, $links_th)){
					$ooasd = 1;
					$bip = 1;
				}elseif(in_array($ooo, $links_f)){
					$ooasd = 3;
					$bip = 1;
				};
			};
		?>
		
		<?php
		if($terms = get_field('categories_order', 'options')) :
			echo '<ul class="menu">';
			$counter = 0;
			foreach($terms as $term) :
			?>
				<li>
					<a href="<?php echo get_term_link($term, 'product_category'); ?>">
						<?=get_field('second_title', $term)?>
					</a>
					<?php if(is_tax('product_category') || is_singular('product')) : ?>
						<?php $showProducts = false; ?>
						<?php if(is_tax()) {
							global $wp_query;
							$currTerm =	$wp_query->queried_object;
							if($term->term_id == $currTerm->term_id){
								$showProducts = true;
							}
						}else{
							$productTerms = get_the_terms(get_the_id(), 'product_category');
							if($productTerms[0]->term_id == $term->term_id) {
								$showProducts = true;
							}
						} ?>
						
						<?php if($showProducts && $products = get_field('tovar_pov', $term)) : ?>
							<ul>
								<?php foreach($products as $product) :?>
									
									<?php if($yyy == $product['href']) : ?>
										<!--li><a href="<?php echo get_permalink($product->ID); ?>"><?=$product->post_title?></a></li-->
                              							<li class="decor"><a href="<?=$product['href']?>"><?=$product['title']?></a></li>
									<?php else: ?>
									<li><a href="<?=$product['href']?>"><?=$product['title']?></a></li>
									<?php endif; ?>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
						<?php if($showProducts && $products2 = get_field('tovar_dor', $term)) : ?>
							<div></div>
							<ul>
								<?php foreach($products2 as $product2) :?>
                              						<li><a href="<?=$product2['href']?>"><?=$product2['title']?></a></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					<?php endif; ?>
					<?php if($bip != 0 && $counter == $ooasd && $products = get_field('tovar_pov', $term)):?>
						<ul>
							<?php foreach($products as $product) :?>
								<?php if($yyy == $product['href']) : ?>
                              					<li class="decor"><a href="<?=$product['href']?>"><?=$product['title']?></a></li>
								<?php else: ?>
								<li><a href="<?=$product['href']?>"><?=$product['title']?></a></li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
						<?php if($products2 = get_field('tovar_dor', $term)) : ?>
							<div></div>
							<ul>
								<?php foreach($products2 as $product2) :?>
                              						<li><a href="<?=$product2['href']?>"><?=$product2['title']?></a></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					<?php endif; ?>
				</li>
				

			<?php $counter++;
			endforeach;
			echo '</ul>';
		endif;
		?>



		<div class="sidebar-fixed-application-block">
			<h4>Возникли вопросы?</h4>
			<p>Оставьте заявку, <br>наши специалисты проконсультируют вас!</p>
			<a href="#order-call-back-popup" class="popup-link">Оставить заявку</a>
		</div>
	</div>


</div>