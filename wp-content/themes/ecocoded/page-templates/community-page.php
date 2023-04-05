<?php
/*
Template Name: Community Page
*/
get_header();

$current_page_id = get_the_ID();
?>

<div id="primary" class="featured-content content-area">
  <main id="main" class="site-main" role="main">
    <?php
      $news_query = array(
        'post_type' => 'community_blog',
        'posts_per_page' => 3,
        'category_name' => 'news-post',
        'orderby' => 'date',
        'order'   => 'DESC'
      );
      $news = new WP_Query( $news_query );

      $blog_query = array(
        'post_type' => 'community_blog',
        'posts_per_page' => 10,
        'category_name' => 'community-post',
        'orderby' => 'date',
        'order'   => 'DESC'
      );
      $blog = new WP_Query( $blog_query );
    ?>

    <div>
        <h2>
            <a style="text-decoration: none" href='<?php get_site_url() ?>/community-page/archive?cat=news-post'>
                News Posts >>
            </a>
        </h2>

      <?php if ( $news->have_posts() ) : ?>

        <div>
          <?php while ( $news->have_posts() ) : $news->the_post(); ?>
            <div>
                <?php get_template_part( 'template-parts/content', 'news' ); ?>
            </div>
          <?php endwhile; ?>
          
          <?php echo paginate_links() ?>
        </div>
        
        <?php wp_reset_postdata(); ?>
        
      <?php endif; ?>
    </div>

    <div>
        <h2>
            <a style="text-decoration: none" href='<?php get_site_url() ?>/community-page/archive?cat=community-post'>
                Community Posts >>
            </a>
        </h2>

      <?php if ( $blog->have_posts() ) : ?>

        <div>
          <?php while ( $blog->have_posts() ) : $blog->the_post(); ?>
            <div>
                <?php get_template_part( 'template-parts/content', get_post_format() ); ?>
            </div>
          <?php endwhile; ?>
          
          <?php echo paginate_links() ?>
        </div>
        
        <?php wp_reset_postdata(); ?>
        
      <?php endif; ?>
    </div>

  </main>
</div>

<?php 
    get_sidebar();
get_footer();
?>

