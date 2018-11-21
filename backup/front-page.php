<?php
get_header();?>
<div id="content" class="site-content container">

<div class="row">
		  <div class="col-md-8 jsc-status">
		  		  			    <h2>November 6, 2018 - <div id="recentUpdatesBar"><p>JSC is Open</p></div></h2>
					  </div>
		  <div class="col-md-4 search-wrap">
		    
		      <div class="form-group">
		        <div class="col-md-10 col-sm-10 col-xs-10">
                <?php get_search_form();?>
		        </div>
		       
		      </div>
		    </form>
		  </div>
		</div>
                


<?php get_sidebar(); ?> 

        <div class="col-sm-4" >

            <div class="w3-container">


            </div>

            <div class="w3-content w3-display-container">

              <div class="w3-display-container mySlides">
                <img src="https://www.w3schools.com/w3css/img_snowtops.jpg" style="width:100%">
                <div class="w3-display-bottomleft w3-large w3-container w3-padding-16 w3-black">
                  French Alps
              </div>
          </div>

          <div class="w3-display-container mySlides">
            <img src="https://www.w3schools.com/w3css/img_snowtops.jpg" style="width:100%">
            <div class="w3-display-bottomright w3-large w3-container w3-padding-16 w3-black">
              Northern Lights
          </div>
      </div>

      <div class="w3-display-container mySlides">
        <img src="https://www.w3schools.com/w3css/img_snowtops.jpg" style="width:100%">
        <div class="w3-display-topleft w3-large w3-container w3-padding-16 w3-black">
          Beautiful Mountains
      </div>
  </div>

  <div class="w3-display-container mySlides">
    <img src="https://www.w3schools.com/w3css/img_snowtops.jpg" style="width:100%">
    <div class="w3-display-topright w3-large w3-container w3-padding-16 w3-black">
      The Rain Forest
  </div>
</div>

<div class="w3-display-container mySlides">
    <img src="https://www.w3schools.com/w3css/img_snowtops.jpg" style="width:100%">
    <div class="w3-display-middle w3-large w3-container w3-padding-16 w3-black">
      Mountains!
  </div>
</div>

<button class="w3-button w3-display-left w3-black" onclick="plusDivs(-1)">&#10094;</button>
<button class="w3-button w3-display-right w3-black" onclick="plusDivs(1)">&#10095;</button>

</div>

<div class="container latest-news">
    <h3>Latest News </h3>
</div>

<?php
        /**
         * Check Apakah Ada Postingan
         */
        if (have_posts()) {
            /**
             * menampilkan posting
             */
            while (have_posts()) {
                the_post(); ?>

                <div class="post-preview">
                <small class="doc-date clearfix"><?php the_date();?></small>
                    
                    
                        <h4 class="post-title">
                         <?php the_title();?>
                     </h4>
                     <p class="post-subtitle font-family: Cambria,Georgia,serif;">
                        <?php 
                            
                            the_excerpt();?>
                        </p>
                        <a href="<?php the_permalink();?>">More »
                    </a>
                    <!-- <p class="post-meta">Posted by 
                      <a href="<?php //echo get_author_posts_url(get_the_author_meta('ID'));?>"><?php //the_author();?></a>
                      on <?php //the_time();?> 
                  </p> -->
              </div>
              <hr>
              <?php
          }
          ?>

          <?php

      } else {
            // not found article ?>
            <div class="post-preview">
                <h2 class="post-title">Article Not Found!!!</h2>
            </div>
            <hr>
            <?php
        }
        ?>

        <button type="button" class="btn btn-primary">Read All Latest News »</button>
        

        

    </div>



    <div class="column">

    <?php do_action( 'before_sidebar' ); ?>
            
            <?php if ( !dynamic_sidebar( 'sidebar-1' ) ) : ?>

        

            
                

        <?php endif; // end sidebar widget area ?>
        
        <br>
        <img src="https://i.imgur.com/Uc3Ju59.png">
        <img src="https://i.imgur.com/Q0b2Svt.png">
    </div>









</div>
<hr>
<?php
get_footer();?>
<div class="col-sm-4" ></div>
</div>
</div>

