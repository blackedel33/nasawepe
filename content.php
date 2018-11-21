
<div class="entry">
  
  <div class="container">

    
    <?php if( has_post_thumbnail() ): ?>

      <h4 class="entry-title"><?php the_title(); ?></h4>  </header>
      <?php the_post_thumbnail('medium'); ?>


      <?php the_content(); ?>


      <?php else: ?>

        <?php the_post_thumbnail('medium'); ?>

        <?php the_content(); ?>

        


      <?php endif; ?>

    </div><!-- col -->



  </div><!-- container -->




