<?php
/*
Template Name: Community Post Page
*/
get_header(); 

$blog_post = $_GET['blog_post'];

$query = array(
    'post_id' => $blog_post
);

$p = new WP_Query( $query );

?>

	<div id="primary" class="featured-content content-area">
		<main id="main" class="site-main">

		<?php
		if ( $p->have_posts() ) : $p->the_post();

			get_template_part( 'template-parts/content', 'single' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endif; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

   get_sidebar();
get_footer();

?>
