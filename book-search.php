<?php 
$args = array(

  "order" => "asc",
  "order_by" => "title",
  "post_per_page" => 4,
  "post_type" => "book",
  "tax_query" => //array(

    //"relation" => "AND",

  array(

    "taxonomy" => "Genre",
    "field" => "slug",
    "terms" => $Genre
  ),

    // array(
    //     "taxonomy" => "author",
    //     "field" => "slug",
    //     "terms" => $author,
    //     "operator" => "AND"


    // ),
),

);

?>


<?php 
if(!empty($_POST['submitted']) == 'Y')):

$Genre = esc_html($_POST['Genre']);
      //$author = esc_html($_POST['author']);


endif;

?>


<?php


/**
 * Template Name: Halaman Untuk Search
 * Template Post Type: page
 * @package WordPress
 * 
 * 
 */
get_header();?>

<div id="content" class="site-content container">
  <ol class="breadcrumb" id="nasa_jsc_breadcrumbs"><li><a href="https://jscsos.com">Home</a> </li> <li><a href="https://jscsos.com/category/latest-news/">Latest News</a></li><li class="active">Cool Weather on the Way</li></ol>    <div class="row">
    <div class="col-md-8 jsc-status">
      <h2>BUKU - <div id="recentUpdatesBar"><p>JSC is Open</p></div></h2>
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

  <hr>
<!-- <form role="search-book" method="get" action="<?php //echo esc_url( home_url('book/') ); ?>">
    <input type="search-book" class="form-control" placeholder="search1" value="<?php //echo get_search_query() ?>" name="s" title="Search1" /><input type="hidden" name="taxonomy" value="taxonomy"><input type="hidden" name="term_name" value="term_name">
  </form> -->


     <!-- <form role="search" method="get" class="search-form" action="<?php //echo home_url( '/' ); ?>">

<input type="search" class="search-field" placeholder="<?php //echo esc_attr_x( 'Cari Buku', 'placeholder' ) ?>" value="<?php //echo get_query_var('genre'); ?>" name="s" title="<?php //echo esc_attr_x( 'Search for:', 'genre' ) ?>" />

    <?php //$location_args = array('taxonomy' => 'Genre', 'value_field' => 'slug', 'name' => 'Genre', 'show_option_none' => __( 'Pilih Genre' ),'option_none_value' => '0', 'order' => 'ASC', 'hide_empty' => 0); ?> 
    <?php //wp_dropdown_categories($location_args); ?>

<input type="hidden" name="post_type" value="book" />
<input type="submit" class="button" style="width: 100%;" value="<?php //esc_attr_e( 'Search...', 'custom' ); ?>" />

</form> -->


<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">

    
    <article id="post-1772" class="post-1772 post type-post status-publish format-standard hentry category-latest-news">
      <header class="page-header">
        <div class="entry-meta">
          <!-- <p>DATE: </p>   </div>.entry-meta -->
          <h1 class="entry-title"></h1>  </header><!-- .entry-header -->

          <div class="entry-content">



           <div class="entry">
            
            <div class="container">

              <?php query_posts( array( 'post_type' => 'book', 'paged' => $paged ) ); ?>

              <?php 
// Get total posts
              $total = $wp_query->post_count;

// Set indicator to 0;
              $i = 0;
              ?>

              <?php while( have_posts() ): the_post(); ?>

                <?php if ( $i == 0 ) echo '<div class="row">'; ?>

                <div class="col-sm-6" style="margin-bottom: 65px;">
                  
                  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>


                  <p>
                    <?php if ( has_post_thumbnail() ) : ?>
                      <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
                    <?php endif; ?>
                  </p>
                  
                  <p align="left">Penerbit : <?php $test = get_post_meta($post->ID, "book_publisher_name", true); 
                  echo  $test; ?></p>
                  <p align="left">Genre : <?php $test = get_post_meta($post->ID, "genre", true); 
                  echo  $test; ?></p>



                  
                  <!-- <p>Posted on <?php //echo the_time('F jS, Y');?> by <?php //the_author_posts_link(); ?> </p> -->

                  <?php the_excerpt(); ?>

                </div><!-- col -->

                <?php $i++; ?>

                <?php
    // if we're at the end close the row
                if ( $i == $total ) { 
                  echo '</div>';
                } else {
        /** 
         * Perform modulus calculation to check whether $i / 2 is whole number
         * if true close row and open a new one
         */
        if ( $i % 2 == 0 ) {
          echo '</div><div class="row">';
        }
      }
      ?>

    <?php endwhile; ?>

  </div><!-- container -->


  <p></p>
</div><!-- .entry-content -->


</article></main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();?>






















