<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ecocoded
 */

get_header(); 

$news_query = array(
    'post_type' => 'community_blog',
    'posts_per_page' => 3,
    'category_name' => 'news-post',
    'orderby' => 'date',
    'order'   => 'DESC'
);
$news = new WP_Query( $news_query );

?>

<div id="primary" class="featured-content content-area">
	<main id="main" class="site-main">
			<?php
			if ( $news->have_posts() ) :

				if ( is_home() && ! is_front_page() ) : ?>

					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?>gen</h1>
					</header>

					<?php
				endif;

				/* Start the Loop */
				while ( $news->have_posts() ) : $news->the_post();
				
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;
			echo '<div class="text-center">';
			ecocoded_numeric_posts_nav();
			echo '</div>';
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
