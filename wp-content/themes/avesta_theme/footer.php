

			</div><!-- .page-content -->
	</div><!-- .page-wrapper -->

	<?php if(!is_post_type_archive('product') && !is_front_page()) { get_sidebar('left-fixed'); } ?>

	<footer class="site-footer">
		<!-- begin .footer-top -->
		<div class="footer-top">
			<div class="wrapper">
				<div class="left">
					<h4>Оставьте заявку на сайте или свяжитесь с нами по телефону <strong>(342) 254-33-44!</strong></h4>
					<p>Мы рассчитаем точную стоимость и сроки поставки ЖБИ, а так же поможем подобрать необходимую продукцию!</p>
				</div>
				<a href="#order-call-back-popup" class="left-application popup-link">Оставить заявку</a>
			</div>
		</div>
		<!-- end .footer-top -->
		<!-- begin .footer-bottom -->
		<div class="footer-bottom">
			<div class="wrapper">
				<div class="footer-about">
					<h4 class="title">Авеста</h4>
					<?php the_field('footer_text', 'options'); ?>
				</div>

				<nav class="footer-catalog">
					<h4 class="title">Каталог</h4>
					<?php wp_nav_menu( array( 'theme_location' => 'footer_catalog_menu', 'container' => false) ); ?>
				</nav>

				<nav class="footer-menu">
					<?php wp_nav_menu( array( 'theme_location' => 'footer_menu', 'container' => false) ); ?>
				</nav>
		
				<div class="footer-right">
					<div class="tel"><?php the_field('opt_telephone', 'options'); ?></div>
					<a href="mailto:<?php the_field('opt_email', 'options'); ?>" class="footer-mail"><?php the_field('opt_email', 'options'); ?></a>
					<p class="location"><?php the_field('opt_address', 'options'); ?></p>
				</div>

			</div>
		</div>
		<!-- end .footer-bottom -->
	</footer>

	


	<div id="order-call-back-popup" class="zoom-anim-dialog mfp-hide popup">
		<div class="popup-content">
			<h4 class="popup-title">Обратный звонок</h4>
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
				<input type="hidden" name="action" value="order_call_back">
				<input type="hidden" name="u-theme" class="letter-theme" value="Обратный звонок">
			</form>
		</div>
	</div>




	<a href="#thanks-popup" class="thanks-popup-link" style="display: none;"></a>
	<div id="thanks-popup" class="zoom-anim-dialog mfp-hide popup">
			<div class="in">
					<h2 class="popup-title">спасибо за заявку</h2>
					<p class="popup-subtitle">Дождитесь нашего звонка, мы свяжемся с вами в ближайшее время</p>
			</div>
	</div>


<?php wp_footer(); ?>

</body>
</html>
