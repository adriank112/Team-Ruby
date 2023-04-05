<?php
/*
Template Name: Community Archive Page
*/
get_header();

$author = $_GET['author'];
$cat = $_GET['cat'];
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
  <main id="main" class="site-main" role="main">
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
      if ($author) {
        $query = array(
          'post_type' => 'community_blog',
          'posts_per_page' => -1,
          'author' => $author,
          'orderby' => 'date',
          'order'   => 'DESC'
        );
        
        $term = get_user_by('id', $author);
      }

      if ($cat) {
        $query = array(
          'post_type' => 'community_blog',
          'posts_per_page' => -1,
          'category_name' => $cat,
          'orderby' => 'date',
          'order'   => 'DESC'
        );
        
        $term = get_term_by('slug', $cat, 'category');
      }

      $posts = new WP_Query($query);
    ?>

    <div>
      <h1>
        <?php
          if ($author) {
              echo $term->display_name;?>'s Posts<?php 
          }
        ?>
        
        <?php
          if ($cat) {
            ?>
            Category: <?php echo $term->name;
          }
        ?>
      </h1>

      <?php if ( $posts->have_posts() ) : ?>

        <div>
          <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
            <div>
                <?php get_template_part( 'template-parts/content', get_post_format() ); ?>
            </div>
          <?php endwhile; ?>
        </div>

        <?php wp_reset_postdata(); ?>
        
      <?php endif; ?>
    </div>

  </main>
</div>

<?php 
get_sideBar();
get_footer(); ?>

