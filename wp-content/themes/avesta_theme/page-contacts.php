<?php 
/*
Template Name: Contacts Page
 */
get_header(); ?>
	<div class="wrapper">
		<div class="page-title"><?php the_title(); ?></div>

		<div class="contacts-white-block">
			<?php if($blocks = get_field('contacts_blocks')) : ?>
				<div class="contacts-blocks">
					<?php foreach($blocks as $block) : ?>
						<div class="block">
							<h4 class="title"><?=$block['title']?></h4>
							<div class="text">
								<?=$block['text']?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<div class="contacts-help-block">
				<img src="<?=get_template_directory_uri()?>/images/contact-img.png">
				<a href="#order-call-back-popup" class="popup-link">Оставить заявку</a>
				<h4>Возникли вопросы?</h4>
				<p>Оставьте заявку,  наши специалисты проконсультируют вас!</p>
			</div>


		</div>



		<?php if($map = get_field('yandex_map')) : ?>
			<div id="contacts-map">
				<span class="bottom"></span><span class="top"></span>
				<?=$map?>
			</div>
		<?php endif; ?>


	</div>
<?php get_footer(); ?>