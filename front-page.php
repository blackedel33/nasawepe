<?php
get_header();

$mytext = get_post_meta($post->ID, 'mytext', true);
//$repeatable_fields = get_post_meta($post->ID, 'repeatable_fields', true);

$repeatable_fields = get_post_meta($post->ID, 'repeatable_fields', true);


var_dump($repeatable_fields);
?>
<div id="content" class="site-content container">
  <div class="row">
    <div class="col-md-8 jsc-status">
      <h2>November 7, 2018 - <div id="recentUpdatesCoy"><p>JSC is <?php echo get_theme_mod('text_farid'); ?> </p></div></h2>
    </div>
    <div class="col-md-4 search-wrap">

      <div class="form-group">
        <div class="col-md-10 col-sm-10 col-xs-10">
          <?php get_template_part('custom-search-form'); ?>

        </div>
        
      </div>
    </form>
  </div>
</div>

<div id="primary" class="content-area">
  <main id="main" class="site-main row" role="main">

    <!-- Column 1 -->
    <div class="col-md-3 col-sm-3 hidden-xs">
      <div class="hide-date quick-btns">
        <h3>Additional Information</h3><div class="menu-additional-information-container"><ul id="menu-additional-information" class="a-info nav navbar-nav">

          <li id="menu-item-1246" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1246"><a href="https://jscsos.com/hurricane/">Hurricane</a></li>
          <li id="menu-item-1247" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1247"><a href="https://jscsos.com/security/">Security</a></li>
        </ul></div>       </div>
        
                    <!-- <div class="weather-widget">
                        <div id="weather"><p>Could not retrieve weather due to an invalid location.</p></div>
                    </div>
                  -->
                  
                  <div id="weather" class="primary-sidebar widget-area" role="complementary">

                    <p><a href="https://www.accuweather.com/en/id/malang/208996/weather-forecast/208996" class="aw-widget-legal">
<!--
By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which can be found at https://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in English) which can be found at https://www.accuweather.com/en/privacy.
-->
</a><div id="awcc1541566410139" class="aw-widget-current"  data-locationkey="208996" data-unit="c" data-language="en-us" data-useip="false" data-uid="awcc1541566410139"></div><script type="text/javascript" src="https://oap.accuweather.com/launch.js"></script></p>


</div><!-- #primary-sidebar -->




<div class="hide-date related-links">
</div>
</div>
<!-- End Column 1 -->

<!-- Column 2 -->
<div class="col-md-5 col-sm-5">
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

  <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  <?
// $args = array( 'post_type' => 'readlevel', 'order' => 'ASC' ,  'posts_per_page' => 10 );
// $loop = new WP_Query( $args );
// while ( $loop->have_posts() ) : $loop->the_post();
//   the_title();
//   echo '<div class="entry-content">';
//   the_content();
//   echo '</div>';
// endwhile;

// $args = array( 
//   'numberposts'   => 1, // -1 is for all
//   'post_type'   => 'readlevel', // or 'post', 'page'
//   'orderby'     => 'title', // or 'date', 'rand'
//   'order'     => 'ASC', // or 'DESC'
//   //'category'    => $category_id,
//   //'exclude'   => get_the_ID()
//   // ...
//   // http://codex.wordpress.org/Template_Tags/get_posts#Usage
// );

// // Get the posts
// $myposts = get_posts($args);

// echo '<pre>';
// var_dump ($myposts);
// echo '</pre>';


    // $posts = get_posts(array(  //Get the FAQ Custom Post Type
    //     'numberposts' => 10,
    //     'orderby' => 'menu_order',
    //     'order' => 'ASC',
    //     'post_type' => 'readlevel',
    // ));

    // echo $posts;

// var_dump($mytext);
  if(isset($repeatable_fields) && is_array($repeatable_fields)){
    echo '<div id="jrlw-accordian">';
    $i = 1;
   foreach($repeatable_fields as $field){
   	 echo '<input id="prod-' . $i . '" type="hidden" ">';
     echo '<h4 class="accordion-toggle" id="hmm1" style="background-color: green">'.$field['title'].'<i class="fa fa-info-circle" aria-hidden="true"></i></h4>';
     echo '<div class="accordion-content" style="display: none;">'.$field['desc'].'</div>';
   }
   //echo '<div class="accordion-content" style="display: none;">';
   
   // echo '</div>';
   echo '</div>';
 }


 ?>

<!--  <script type="text/javascript">
  $(document).ready(function() {
      $( "#myaccordion" ).accordion();
  });
</script> -->



<!--  <div id="jrlw-accordian">
  <h4 class="accordion-toggle" id="hmm1" style="background-color: <?php echo get_theme_mod('hmm1'); ?>;">1- Full Activation<i class="fa fa-info-circle" aria-hidden="true"></i></h4>
  <div class="accordion-content " style="display: none;">
    <h3>test</h3>
    <p>level1</p>
  </div>
  <h4 class="accordion-toggle " style="background-color: <?php echo get_theme_mod('hmm2'); ?>;">2- Limited Activation<i class="fa fa-info-circle" aria-hidden="true"></i></h4>
  <div class="accordion-content " style="display: block;">
    <h3>Level 2 - Limited Activation</h3>
    <p>level2</p>
  </div>
  <h4 class="accordion-toggle" style="background-color: <?php echo get_theme_mod('hmm3'); ?>;">3 - Normal Operations<i class="fa fa-info-circle" aria-hidden="true"></i></h4>
  <div class="accordion-content " style="display: none;">
    <h3>Level 3 - Normal Operations</h3>
    <p>level 3</p>
  </div>
  <h4 class="accordion-toggle jrlw-active" style="background-color: <?php echo get_theme_mod('hmm3'); ?>;">4 - Normal Operations<i class="fa fa-info-circle" aria-hidden="true"></i></h4>
  <div class="accordion-content " style="display: none;">
    <h3>Level 4 - Normal Operations</h3>
    <p>level 3</p>
  </div>

</div>
 -->

<script type="text/javascript" src="http://gcoem.org/content/plugins/jetty-readiness-level-widget/assets/js/jrlw-frontend.js?ver=4.9.6"></script>





<div class="container latest-news">
  <h3>Latest News</h3>
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
                          </div>
                          <div class="container latest-news">

                            <small class="doc-date clearfix"><?php the_date();?></small>
                            <h4><?php the_title();?></h4>
                            <p>
                              <?php 
                              
                              the_excerpt();?>                <a href="<?php the_permalink();?>">More »</a>
                            </p>

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
              
              <a href=""><button type="button" class="btn btn-primary">Read All Latest News »</button></a>
            </div>
          </div>
          <!-- End Column 2 -->
          
          <!-- Column 3 -->
          <div class="col-md-4 col-sm-4">

            <aside id="secondary" class="widget-area" role="complementary">

              <?php do_action( 'before_sidebar' ); ?>
              
              <?php if ( !dynamic_sidebar( 'sidebar-1' ) ) : ?>






              <?php endif; // end sidebar widget area ?>
              
              <div class="social-links">
                <a target="_blank" href="">
                  <img alt="facebook" src="https://jscsos.com/content/themes/nasa_jsc/img/FacebookIcon.png" height="64" width="64">
                </a>
                <a target="_blank" href="">
                  <img alt="twitter" src="https://jscsos.com/content/themes/nasa_jsc/img/TwitterIcon.png" height="64" width="64">
                </a>
              </div>
            </div>
            <!-- End Column 3 -->
            
          </main><!-- #main -->
        </div><!-- #primary -->

        

        <?php
        get_footer();?>


