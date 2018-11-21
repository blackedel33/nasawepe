<?php
get_header();?> 

<div id="content" class="site-content container">
	<ol class="breadcrumb" id="nasa_jsc_breadcrumbs"><li><a href="https://jscsos.com">Home</a> </li> <li><a href="https://jscsos.com/category/latest-news/">Latest News</a></li><li class="active">Cool Weather on the Way</li></ol>    <div class="row">
		<div class="col-md-8 jsc-status">
			<h2>BUKU - <div id="recentUpdatesBar"><p>JSC is Open</p></div></h2>
		</div>
		<center><? the_title( sprintf('<h4 class="entry-title"> Pencarian Dengan kata  <a href="%s">', esc_url( get_permalink() ) ),'</a></h4>' ); ?></center>

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<article id="post-1772" class="post-1772 post type-post status-publish format-standard hentry category-latest-news">
					<header class="page-header">
						<div class="entry-meta">
							<!-- <p>DATE: </p>   </div>.entry-meta -->
							<h1 class="entry-title"><center>Fiksi</center></h1>  </header><!-- .entry-header -->

							<div class="entry-content">

								<?php 

								$args = array(
									'category' => array(9,10,11),
									'post_type' => 'book',
									'posts_per_page' => 4,
									'paged' => $paged
								);
								$wp_query = new WP_Query($args);

								if( have_posts() ):
								//endif;

									while( have_posts() ): the_post(); ?>

										<?php 

										get_template_part('content'); ?>

									<?php endwhile; ?>

									
									<?
								else:

									_e( '<center>Maaf ga ada !.</center>', 'nasa2' ); 
									

								endif;

								?>

								<?php
								get_footer();
								?>