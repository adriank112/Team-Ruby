<?php
/**
 * Template part for displaying news posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ecocoded
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('posts-entry fbox blogposts-list'); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="featured-img-box">
			<a href="<?php the_permalink() ?>" class="featured-thumbnail" rel="bookmark">
				<?php if ( get_theme_mod( 'toggle_low_res' ) == '' ) : ?>
					<div class="featured-thumbnail-small">
						<?php the_post_thumbnail('full'); ?>
						<?php else : ?>
							<div class="featured-thumbnail-small">
								<?php the_post_thumbnail( 'medium_large' ); ?>
							<?php endif; ?>
						</div>
					</a>
					<?php else : ?>
						<div class="no-featured-img-box">
						<?php endif; ?>
						<div class="content-wrapper">
							<header class="entry-header">
								<?php
								if ( is_singular() ) : ?>
								    <a style="text-decoration: none" href="<?php the_permalink() ?>">
									    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
									</a>
							    <?php
								else :
									the_title( '<h2 class="entry-title"><a style="text-decoration: none" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
								endif;

								if ( 'post' === get_post_type() || 'community_blog' === get_post_type() ) :
									    ?>
									<div class="entry-meta">
										<?php esc_html_e( 'Posted on ', 'ecocoded' ); ?>
										    <?php echo get_the_date(); ?>
									</div>
								<?php endif; ?>
							</header><!-- .entry-header -->
                            
							<div class="entry-content">
								<?php
								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ecocoded' ),
									'after'  => '</div>',
								) );
								?>
							</div><!-- .entry-content -->

						</div>
					</div>
				</article><!-- #post-<?php the_ID(); ?> -->
