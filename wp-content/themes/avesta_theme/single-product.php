<?php get_header(); ?>
	<div class="wrapper">
		<h1 class="page-title"><?php the_title(); ?></h1>

		<div class="single-product-left">
			<div class="product-images">
				<?php if(has_post_thumbnail()) : ?>
					<a href="<?php the_post_thumbnail_url('full'); ?>" class="full-img" rel="lightbox['product-images']">
						<img src="<?php the_post_thumbnail_url('full'); ?>">
					</a>
					<?php //if($images = get_field('gallery')) : ?>
						<!--div class="small-images">
							<a href="<?php the_post_thumbnail_url('full'); ?>" class="small-img" rel="lightbox['product-images']">
								<img src="<?php the_post_thumbnail_url('thumbnail'); ?>">
							</a>
							<?php foreach($images as $img) : ?>
								<a href="<?=$img['url']?>" class="small-img" rel="lightbox['product-images']">
									<img src="<?=$img['sizes']['thumbnail']?>">
								</a>
							<?php endforeach; ?>
						</div-->
					<?php //endif; ?>
				<?php endif; ?>
			</div>

			<!-- begin .product-why-us -->
			<div class="product-why-us">
				<h3>Почему стоит заказать у нас?</h3>
				<div class="block">
					<img src="<?=get_template_directory_uri()?>/images/why-us-img1.png">
					<div class="right">
						<h4>Высокое качество</h4>
						<p>Высокое качество изделий, бетонных поверхностей, выпускаемых на ультрасовременном оборудовании заводов наших партнеров позволяют достичь уникальных показателей качества</p>
					</div>
				</div>
				<div class="block">
					<img src="<?=get_template_directory_uri()?>/images/why-us-img2.png">
					<div class="right">
						<h4>Товар на складе</h4>
						<p>Большая часть ассортимента всегда присутствует на складе. <br>Это позволяет произвести отгрузку продукции в день заказа</p>
					</div>
				</div>
				<div class="block">
					<img src="<?=get_template_directory_uri()?>/images/why-us-img3.png">
					<div class="right">
						<h4>Доставка</h4>
						<p>Собственный автопарк спецтехники позволяет произвести доставку железобетонных изделий в г. Перми и Пермском крае</p>
					</div>
				</div>
			</div>
			<!-- end .product-why-us -->
		</div>

		<div class="single-product-right">
			<?php if($gost = get_field('gost')) : ?>
				<div class="gost"><?=$gost?></div>
			<?php endif; ?>
			<p class="single-product-left-application-text">Оставьте заявку. Мы поможем Вам подобрать необходимый по параметрам товар</p>
			<a href="#order-product-popup" class="single-product-left-application-btn popup-link" data-id="<?=get_the_id()?>">Оставить заявку</a>
			<div class="entry-content">
				<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; endif; ?>
			</div>
		</div>
		<div class="clear"></div>

		<div class="product-table entry-content">
			<?php the_field('product_table'); ?>
		</div>
		
		<?php if($sertificats = get_field('sertificats')) : ?>
			<div class="sertificats-wrp product-sertificats">
				<h4 >Сертификаты на продукцию</h4>
				<div class="sertificats">
					<?php foreach($sertificats as $s) : ?>
						<a href="<?=$s['url']?>" rel="lightbox['sertificats']" class="sertificat">
							<img src="<?=$s['url']?>">
						</a>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>


		<?php if($products_ids = get_field('recent_products')) : ?>
			<div class="recent-products">
				<h4>Посмотрите также</h4>
				<?php 
				$args = array(
					'post_type' => 'product',
					'posts_per_page' => -1,
					'post__in' => $products_ids,
					'orderby' => 'post__in'
				);
				$query = new WP_Query($args); ?>
				<?php if($query->have_posts()) : ?>
					<div class="products-listing">
						<?php while($query->have_posts()) : $query->the_post(); ?>
							<?php get_template_part( 'content', 'product' ); ?>
						<?php endwhile; ?>
					</div>
				<?php endif; wp_reset_query(); ?>
			</div>
		<?php endif; ?>
		
		
	</div>

	<!-- product popup -->
	<div id="order-product-popup" class="zoom-anim-dialog mfp-hide popup">
		<div class="popup-content">
			<h4 class="popup-title"></h4>
			<p class="popup-subtitle">наш менеджер свяжется с вами в ближайшее время</p>
			<form action="#" class="ajax-form" method="post" data-send-text="">
				<div class="input-wrp">
					<input type="text" class="input input-name field-required "  name="u-name" placeholder="Имя">
					<!--<p class="error">Неккоректная инфомрация</p>-->
				</div>
				<div class="input-wrp">
					<input type="text" class="input input-telephone field-required "  name="u-telephone" placeholder="Телефона">
				</div>
				<input type="submit" class="btn " value="Перезвоните мне">
				<input type="hidden" name="action" value="order_product">
				<input type="hidden" name="u-theme" class="letter-theme" value="Заказ продукции">

				<input type="hidden" name="u-product-id" value="">
				<input type="hidden" name="u-product-detail" value="">
			</form>
		</div>
	</div>
	<!-- end product popup -->

<?php get_footer(); ?>