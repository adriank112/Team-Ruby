<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ecocoded
 */

get_header(); 

?>
<style>
    .breadcrumbs {
        font-size: 14px;
        margin-bottom: 20px;
    }
    .breadcrumbs a {
        color: #555;
        text-decoration: none;
    }
    .breadcrumbs a:hover {
        text-decoration: underline;
    }
    .breadcrumbs .current {
        color: #000;
        font-weight: bold;
    }
</style>

	<div id="primary" class="featured-content content-area">
		<main id="main" class="site-main">
    <?php
        $parent_id = wp_get_post_parent_id( get_the_ID() );
        if ( $parent_id ) {
            $parent_title = get_the_title( $parent_id );
            $parent_url = get_permalink( $parent_id );
            ?>
            <div class="breadcrumbs">
                <a href="<?php echo esc_url( home_url() ); ?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a> /
                <a href="<?php echo esc_url( $parent_url ); ?>"><?php echo esc_html( $parent_title ); ?></a> /
                <span class="current"><?php the_title(); ?></span>
            </div>
            <?php
        } else {
            ?>
            <div class="breadcrumbs">
                <span class="current"><?php the_title(); ?></span>
            </div>
            <?php
        }
    ?>

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );

			// If comments are open or we have at least one comment, load up the comment template.
			if (
			    ( comments_open() || get_comments_number() ) &&
			    ( !has_category('news-post') )
			    ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
   get_sidebar();
get_footer();
