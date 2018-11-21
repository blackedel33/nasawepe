<?php


/**
 * Template Name: Book Catalog
 * Template Post Type: book
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
            <?php// get_search_form();?>
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

<?php get_template_part('custom-search-form'); ?>

<!-- <div class="content-search">
  <form role="search" method="get" id="searchform" class="searchform" action="<?php //echo get_site_url(); ?>">
    <div>
      <label class="screen-reader-text" for="s">Search for:</label>
      <input type="text" value="<?php //the_search_query(); ?>" name="s" id="s" />
    -->
    
<!-- 
      <input type="submit" id="searchsubmit" value="Search" />
    </div>
  </form>
</div> -->


<?php

// $categories = get_categories('taxonomy=Genre');

// $select = "<select name='cat' id='cat' class='postform'>n";
// $select.= "<option value='-1'>Select category</option>n";

// foreach($categories as $category){
//   if($category->count > 0){
//       $select.= "<option value='".$category->slug."'>".$category->name."</option>";
//   }
// }

// $select.= "</select>";

// echo $select;
?>




<!-- <form method="POST" action="/book/depan/">

<?php

    //$terms = get_terms('Genre');

      //if(!empty($terms) && !is_wp_error($terms)):

      //var_dump($terms);
        //echo '<select name="Genre">';

          //    foreach($terms as $term):
           //       echo '<option value="'. $term->slug .'">'.$term->name.'</option>';

             // endforeach;

     //   echo '</select>';
      
      //endif;

      // $terms = get_terms('Author');

      // if(!empty($terms) && !is_wp_error($terms)):

      // //var_dump($terms);
      //   echo '<select name="Author">';

      //         foreach($terms as $term):
      //             echo '<option value="'. $term->slug .'">'.$term->name.'</option>';

      //         endforeach;
              
      //   echo '</select>';
      
      // endif;

?>


<input type="hidden" name="submitted" value="Y">
<input type="submit" value="Cari Buku">

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
                      <figure class="wp-caption">
                        <?php if ( has_post_thumbnail() ) : ?>
                          <a href="<?php the_permalink(); ?>"><img class="demo" src="<?php the_post_thumbnail( 'large' ); ?></a>
                          <figcaption class="wp-caption-text"><?php $test = get_post_meta($post->ID, "rating_book", true); 
                          echo  $test; ?></figcaption>
                        <?php endif; ?>
                      </figure>
                    </p>

<!-- backup

    <figure class="wp-caption">
<img class="demo" src="http://localhost:8070/wp-content/uploads/2018/11/Gambar-Kucing-Gemuk-Lucu.jpg" alt="Image" />
<figcaption class="wp-caption-text"><?php //$test = get_post_meta($post->ID, "rating_book", true); 
      //echo  $test; ?></figcaption>
    </figure> -->

    <?php 
    $publisher = get_post_meta($post->ID, "book_publisher_name", true); 
    $test = get_post_meta($post->ID, "rating_book", true); 
    $userwp = get_post_meta($post->ID, "user-wp", true); 


    echo "<table border='2'>";
    echo "<tr><td></td><td></td></tr>";

    echo "<tr><td>Publisher</td><td>{$publisher}</td><tr>";

    echo "<tr><td>Rating</td><td>{$test}</td><tr>";

    echo "<tr><td>Author</td><td>{$userwp}</td><tr>";

    echo "</table>";

    ?>

    
     <!--  <p align="left">Penerbit : <?php $test //= get_post_meta($post->ID, "book_publisher_name", true); 
      //echo  $test; ?></p>
      <p align="left">Rating : <?php $test //= get_post_meta($post->ID, "rating_book", true); 
      //echo  $test; ?></p>
      <p align="left">Author : <?php $test //= get_post_meta($post->ID, "user-wp", true); 
      //echo  $test; ?></p> -->
      <!-- <p align="left">Genre : <?php //$test = get_post_meta($post->ID, "genre", true);  -->
      //echo  $test; ?></p>


   
      <p>Posted on <?php //echo the_time('F jS, Y');?> by <?php //the_author_posts_link(); ?> </p> -->

      <?php //the_excerpt(); ?>

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



<!-- Progressmuuu -->



<?php
get_footer();?>




<?php 
$args = array(

  "order" => "asc",
  "order_by" => "title",
  "post_per_page" => 4,
  "post_type" => "book",
  "tax_query" => array(

    // "relation" => "AND",

    array(

      "taxonomy" => "Genre",
      "field" => "slug",
      "terms" => array('Fiksi','Sci-Fi','komedi')

    ),

    // array(
    //     "taxonomy" => "author",
    //     "field" => "slug",
    //     "terms" => 'asda',
    //     "operator" => "AND"


    // ),
  ),

);




























