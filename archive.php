<?php
/*
bagian archive
*/
get_header(); ?>

<div id="content" class="site-content container">
	<ol class="breadcrumb" id="nasa_jsc_breadcrumbs"><li><a href="">Home</a> </li> <li class="active">Latest News</li></ol>		<div class="row">
		<div class="col-md-8 jsc-status">
			<h4>November 6, 2018 - <div id="recentUpdatesBar"><p>JSC is Open</p></div></h4>
		</div>
		<div class="col-md-4 search-wrap">
			
			<div class="form-group">
				<div class="col-md-10 col-sm-10 col-xs-10">
					<?php get_search_form();?>
				</div>
				
			</div>
			
		</div>
	</div>

	<?php
/**
 * Template Name: Page Categories
 *
 */

//get_header(); ?>




<?php 
    // Standard loop for page content

    // Get the category assigned to this page and list the posts in this category.
    // This code works when multiple categories have been assigned to the page.
$page_categories = get_the_terms( get_the_ID(), 'category' );
if ( $page_categories && ! is_wp_error( $page_categories ) ) {

	foreach ( $page_categories as $page_category ) {

		$posts_query = new WP_Query( [
			'post_type' => 'post',
			'cat' => $page_category->term_id,
		] );

		

		if ( $posts_query->have_posts() ) {
			echo '<h2> Menampilkan <em>' . esc_html( $page_category->name ) . '</em> category:</h2>';

			$categories = get_categories(array('type' => 'post', 'include' => 6, 'orderby' => 'name', 'order' => 'ASC'));

			foreach ($categories as $category) {
				echo '<p> Showing ' . $category->count . ' Article</p>';
			}


			while ( $posts_query->have_posts() ) {
				$posts_query->the_post();
				the_date();
				the_title( '<h3>', '</h3>' );
				
				
										//the_content();
				echo('<hr/>');
			}
			get_footer();
			
			
		}
	}
}

?>












