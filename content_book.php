<?php the_title( sprintf('<h4 class="entry-title"> Pencarian Dengan kata  <a href="%s">', esc_url( get_permalink() ) ),'</a></h4>' ); ?>

<?php the_title( sprintf('<h4 class="entry-title">  <a href="%s">', esc_url( get_permalink() ) ),'</a></h4>' ); ?>
<?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?>, in <?php the_category(); ?>


<?php if( has_post_thumbnail() ): ?>

	
	<?php the_post_thumbnail('medium'); ?>
	
	<?php the_content(); ?>
	

	<?php else: ?>


		<?php the_content(); ?>


		<?php endif; ?>