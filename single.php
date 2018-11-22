<?php
get_header();

if (have_posts()) {
  while (have_posts()) {
    the_post();
        /**
         * menggunakan featured image
         */
        // if (has_post_thumbnail()) {
        //     $thumbnail = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
        // } else {
        //     $thumbnail = get_template_directory_uri() . '/img/post-bg.jpg';
        // }
        ?>
        <div id="content" class="site-content container">
          <ol class="breadcrumb" id="nasa_jsc_breadcrumbs"><li><a href="https://jscsos.com">Home</a> </li> <li><a href="https://jscsos.com/category/latest-news/">Latest News</a></li><li class="active">Cool Weather on the Way</li></ol>    <div class="row">
            <div class="col-md-8 jsc-status">
              <h2>November 14, 2018 - <div id="recentUpdatesBar"><p>JSC is Open</p></div></h2>
            </div>
            <div class="col-md-4 search-wrap">
              <form class="form-horizontal" role="form" method="get" action="https://jscsos.com/">
                <div class="form-group">
                  <div class="col-md-10 col-sm-10 col-xs-10">
                    <?php get_search_form();?>
                  </div>
                  
                </div>
              </form>
            </div>
          </div>

          <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

              
              <article id="post-1772" class="post-1772 post type-post status-publish format-standard hentry category-latest-news">
                <header class="page-header">
                  <div class="entry-meta">
                    <p>DATE: <?php the_date();?> <?php the_time();?></p>   </div><!-- .entry-meta -->
                    <?php the_post_thumbnail('medium'); ?>
                    <h1 class="entry-title"><?php the_title();?></h1>  </header><!-- .entry-header -->
                    
                    <div class="entry-content">
                      
                     
                      <p><?php the_content();?></p>
                    </div><!-- .entry-content -->

                    <?php
                  }
                }
                ?>

              </article></main><!-- #main -->
            </div><!-- #primary -->

            
            

            <?php

            get_footer();?>




            
            

            




            

            

            


