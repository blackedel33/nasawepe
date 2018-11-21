
            <div class="entry">
              
              <div class="container">

              
                <?php if( has_post_thumbnail() ): ?>


                  <?php the_post_thumbnail('medium'); ?>

                  <?php the_content(); ?>


                  <?php else: ?>

                    <?php the_post_thumbnail('medium'); ?>

                    <?php the_content(); ?>

         


                  <?php endif; ?>

    </div><!-- col -->



  </div><!-- container -->




