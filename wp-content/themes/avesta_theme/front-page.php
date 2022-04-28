<?php get_header(); ?>
	
	<!-- begin .hp-slider -->
	<?php if($slides = get_field('hp_slides')) : ?>
		<div class="hp-slider-wrp">
			<div class="hp-slider">
				<?php foreach($slides as $slide) : ?>
					<div class="slide" style="background-image: url(<?=$slide['img']['url']?>)">
						<div class="wrapper">
							<div class="cont">
								<h3><?=$slide['title']?></h3>
								<p><?=$slide['subtitle']?></p>
								<?php if($slide['button_link']) : ?>
									<a href="<?=$slide['button_link']?>">
										<?php if($slide['button_img']) : ?>
											<img src="<?=$slide['button_img']['url']?>" >
										<?php endif; ?>
										<span><?=$slide['button_text']?></span>
									</a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	<?php endif; ?>
	<!-- end .hp-slider -->

	<!-- begin .hp-advantages -->
	<?php if($advantages = get_field('hp_advantages')) : ?>
		<div class="hp-advantages">
			<div class="wrapper">
				<ul>
					<?php foreach($advantages as $adv) : ?>
						<li>
							<span class="img-wrp">
								<img src="<?=$adv['img']['url']?>">
							</span>
							<span class="text"><?=$adv['text']?></span>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	<?php endif; ?>
	<!-- end .hp-advantages -->

	<!-- begin .hp-product-categories -->
	<div class="hp-product-categories wrapper">
		<h3 class="title"><?php the_field('hp_categories_titel'); ?></h3>
		<p class="sub-title"><?php the_field('hp_categories_subtitle'); ?></p>
		<div class="categories-list">
          
          	<?php if($catego = get_field('categ_home')) : ?>
          
          		<?php foreach($catego as $catr) : ?>
          
          			<a href="<?=$catr['ssil']?>" class="single-category-listing">
						<span class="img-link">
							<!--img src="<?=get_template_directory_uri()?>/images/cat-img.png"-->
                          	<img src="<?=$catr['img']?>">
						</span>
						<div class="cont">
							<h4 class="title"><?=$catr['title']?></h4>
							<div class="desc"><?=$catr['desc']?></div>
							<span class="more-link">Подробнее</span>
						</div>
					</a>
          
          		<?php endforeach; ?>
          
          	<?php endif; ?>

		</div>
	</div>
	<!-- end .hp-product-categories -->

	<!-- begin .hp-events -->
	<div class="hp-events">
		<div class="wrapper">
			<h3 class="title"><?php the_field('hp_events_title'); ?></h3> 
			<?php if($postIDs = get_field('hp_events')) : ?>
				<div class="three-post-wrp">
					<?php 
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => -1,
						'post__in' => $postIDs,
						'orderby' => 'post__in'
					); 
					$query = new WP_Query($args); ?>
					<?php if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); ?>
						<?php get_template_part('content', 'post-three'); ?>
					<?php endwhile; endif; wp_reset_query(); ?>
				</div>
			<?php endif; ?>
			<a href="<?php the_field('hp_events_button_link'); ?>" class="show-all-events"><?php the_field('hp_events_button_text'); ?></a>
		</div>
	</div>
	<!-- end .hp-events -->

	<?php get_template_part('inc/parts/part', 'about-company'); ?>

	<!-- begin .done-projects -->
	<div class="wrapper done-projects-wrp <?php echo get_field('show_done_works') ? '' : 'without-projects'; ?>">
		<?php if($done_works = get_field('hp_done_works')) : ?>
			<!--div class="done-projects-wrp-in">
				<h4 class="block-title">Выполненные проекты</h4>
				<nav class="done-projects-menu">
					<ul>
						<?php $i=0; foreach($done_works as $w) : ?>
							<li class="<?php echo $i==0 ? 'active' : ''; ?>"><a href="#" data-slide="<?=$i?>"><?=$w['title']?></a></li>
						<?php $i++; endforeach; ?>
					</ul>
				</nav>
				
				<div class="done-projects-slider">
					<?php foreach($done_works as $w) : ?>
						<div class="slide">
							<img src="<?=$w['img']['sizes']['large']?>">
							<div class="right">
								<h4><?=$w['title']?></h4>
								<div class="project-short-title"><?=$w['service_name']?></div>
								<div class="customer-title">Заказчик</div>
								<div class="customer-name"><?=$w['client']?></div>
							</div>
							<div class="clear"></div>

							<div class="project-desc">
								<p><?=$w['description']?></p>
							</div>
							<a href="<?=$w['link']?>" class="more-link">Подробнее</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div-->
		<?php endif; ?>
		<!-- end .done-projects-slider -->

		<!-- begin .hp-reviews -->
		<?php if($reviews = get_field('hp_reviews')) : ?>
			<!--div class="hp-reviews">
				<h4 class="block-title">Отзывы</h4>
				<div class="hp-reviews-slider-controls">
					<span class="prev"></span>
					<span class="next"></span>
				</div>
				<div class="hp-reviews-slider">
					<?php foreach($reviews as $review) : ?>
						<div class="slide">
							<img src="<?=$review['img']['sizes']['thumbnail']?>">
							<div class="right">
								<div class="customer-name"><?=$review['name']?></div>
								<div class="customer-company"><?=$review['position']?></div>
							</div>
							<div class="clear"></div>
							<div class="review-content"><?=$review['text']?></div>
							<a href="<?=$review['link']?>" class="more-link">Подробнее</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div-->
		<?php endif; ?>
		<!-- end .hp-reviews -->

		<div class="comp-part">
			<h4 class="block-title">Наши партнеры</h4>
			<div class="row">
				<div class="box">
					<div class="img">
						<img src="http://avesta.kbportfolio.ru/wp-content/uploads/2021/01/spk-png2-e1484649340681.png">
					</div>
					<p>ОАО «СтройПанельКомплект»</p>
				</div>
				<div class="box">
					<div class="img">
						<img src="http://avesta.kbportfolio.ru/wp-content/uploads/2021/01/logo-e1484649560733.png">
					</div>
					<p>АО "ЖБК-1"</p>
				</div>
				<div class="box">
					<div class="img">
						<img src="http://avesta.kbportfolio.ru/wp-content/uploads/2021/01/trest14-e1484649366540.png">
					</div>
					<p>ПАО «Трест № 14»</p>
				</div>
				<div class="box">
					<div class="img">
						<img src="http://avesta.kbportfolio.ru/wp-content/uploads/2021/01/stroidet-e1484649398958.png">
					</div>
					<p>ООО «Завод Стройдеталь № 6»</p>
				</div>
				<div class="box">
					<div class="img">
						<img src="http://avesta.kbportfolio.ru/wp-content/uploads/2021/01/s5_logo-e1484649414365.png">
					</div>
					<p>ООО «ЖБК-7»</p>
				</div>
				<div class="box">
					<div class="img">
						<img src="http://avesta.kbportfolio.ru/wp-content/uploads/2021/01/pzsp.png">
					</div>
					<p>АО «ПЗСП»</p>
				</div>
				<div class="box">
					<div class="img">
						<img src="http://avesta.kbportfolio.ru/wp-content/uploads/2021/01/betkam.png" style="width:150px;">
					</div>
					<p>ООО ТД «Бетокам»</p>
				</div>
				<div class="box">
					<div class="img">
						<img src="http://avesta.kbportfolio.ru/wp-content/uploads/2021/01/logousb-e1484649431790.png" style="width:200px;">
					</div>
					<p>ООО «Уралспецбетон»</p>
				</div>
			</div>


		</div>


	</div>
	<!-- end .done-projects -->

<?php get_footer(); ?>