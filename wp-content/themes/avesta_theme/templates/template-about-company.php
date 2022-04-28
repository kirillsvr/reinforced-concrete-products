<?php 
/*
Template Name: About Company Template
 */
get_header(); ?>
	<div class="wrapper">
		<h1 class="page-title"><?php the_title(); ?></h1>

		<?php get_sidebar( 'left' ); ?>
		
		<div class="content-with-sidebar content-with-sidebar-left">
			<?php if(have_posts()) : ?>
				<div class="entry-content">
					<?php while(have_posts()) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>

			<?php get_template_part('inc/parts/part', 'about-company'); ?>

			<?php if($sertificats = get_field('sertificats')) : ?>
				<div class="sertificats-wrp">
					<h4 class="title-center">Сертификаты качества</h4>
					<div class="sertificats">
						<?php foreach($sertificats as $s) : ?>
							<a href="<?=$s['url']?>" rel="lightbox['sertificats']" class="sertificat">
								<img src="<?=$s['url']?>">
							</a>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endif; ?>

			<?php if($text= get_field('txt')) : ?>
				<?php echo $text; ?>
			<?php endif; ?>
		</div>

	</div>
<?php get_footer(); ?>