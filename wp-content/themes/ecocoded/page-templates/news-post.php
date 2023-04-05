<?php
/*
Template Name: Community News Post Page
*/
get_header(); 

?>

	<div id="primary" class="featured-content content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

   get_sidebar();
get_footer();

?>
