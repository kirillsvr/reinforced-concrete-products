<?php get_header(); ?>
	<div class="wrapper">
		<h1 class="page-title"><?php the_title(); ?></h1>
		

		<div class="entry-content">
			<?php if(have_posts()) : while(have_posts()) : the_post(); the_content(); endwhile; endif; ?>

			<?php if($gosts = get_field('gosts_snips')) : ?>
				<div class="entry-table-content">
					<table width="1028" class="visible">
						<thead>
				        	<tr>
				            	<td style="text-align: center;">ГОСТ</td>
				            	<td style="text-align: center;">Серия</td>
				            	<td style="text-align: center;" width="50%">Продукция</td>
				            	<td style="text-align: center;"></td>
				         	</tr>
				      	</thead>
				      	<tbody>
						<?php foreach($gosts as $gost) : ?>
							<tr>
					        	<td><?=$gost['gost_name']?></td>
					            <td><?=$gost['seria']?></td>
					            <td><?=$gost['prod']?></td>
					            <td>
					            	<?php if($gost['file']) : ?>
					            		<a href="<?=$gost['file']?>" target="_blank">
											Посмотреть ГОСТ
										</a>
									<?php endif; ?>
					            </td>
					        </tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			<?php endif; ?>
		</div>	


	</div>


<?php get_footer(); ?>