<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ecocoded
 */

get_header(); ?>

  <div class="container container--narrow page-section">
<?php
    //get the parent id using the current id
    $theParent = wp_get_post_parent_ID(get_the_ID());
    if($theParent){ ?>
    <div class="metabox metabox--position-up metabox--with-home-link">
      <p>
        <a class="metabox__blog-home-link" href="#">
        <i class="fa fa-home" aria-hidden="true"></i> Back to 
        <?php echo get_the_title($theParent); ?>
        </a> 
        <span class="metabox__main"><?php echo the_title();?></span></p>
    </div>
    <?php 
    }// end if block ?>

<?php 
    // this returns the pages but doesn't output it. If the pages has a parent or 
    $testArray = get_pages(array(
    'child_of' => get_the_ID()
    ));
    if($theParent or $testArray){ ?>
    <div class="page-links">
    <!-- Permalink use to have dynamic link -->
      <h2 class="page-links__title"><a href="<?php echo get_permalink($theParent);?>"> 
      <?php echo get_the_title($theParent);?>
        </a></h2>
      <ul class="min-list">
        <?php 
            if($theParent){
                //if parent get list of children
                $findChildrenOf = $theParent;
            }
            else{
                //else use your own id
                $findChildrenOf = get_the_ID();
            }
            wp_list_pages(array(
                'title_li' => NULL,
                'child_of' => $findChildrenOf,
                //orders the list set in the dash
                'sort_column' => 'menu_order',
        ));
        ?>
      </ul>
    </div>
<?php } ?>

	<div id="primary" class="featured-content content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'single' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
//   get_sidebar();
get_footer();
