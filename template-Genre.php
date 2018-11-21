<?php
/* genre */

$args = array(
    'post_type' => 'book',
    'post_status' => 'publish',
    'category_name' => 'Fiksi',
    'posts_per_page' => 5,
);
$arr_posts = new WP_Query( $args );

if ( $arr_posts->have_posts() ) :
   
    while ( $arr_posts->have_posts() ) :
        $arr_posts->the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>
        </article>
        <?php
    endwhile;
endif;

?>