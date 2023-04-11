<?php
/*
Template Name: Events Page
*/
get_header();
?>
<style>
  .events-list {
    text-align: center;
  }
  
  .event-date {
    display: inline-block;
    padding: 5px 10px;
    background-color: purple;
    color: white;
    font-size: 14px;
    font-weight: bold;
    border-radius: 5px;
    margin-left: 10px;
  }

  .event-type {
    display: inline-block;
    padding: 5px 10px;
    background-color: green;
    color: white;
    font-size: 14px;
    font-weight: bold;
    border-radius: 5px;
    margin-left: 10px;
  }
  
  .event-title {
    background-color: #333333;
    font-size: 20px;
    padding: 5px;
    margin-bottom: 40px;
    margin-left: 25%;
    border-radius: 5px;
    width: 50%;
  }

  .event-title a {
    color: white;
    font-weight: bold;
  }

  .event-title a:hover {
    text-decoration: none;
    color:purple;
  }

</style>

<?php
$post_type = get_post_type_object( get_post_type() );
if ( $post_type->has_archive ) {
    $post_type_archive = get_post_type_archive_link( $post_type->name );
    ?>
    <div class="breadcrumbs">
        <a href="<?php echo esc_url( home_url() ); ?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a> /
        <a href="<?php echo esc_url( home_url( '/event-page/' ) ); ?>"><?php echo esc_html( 'Event' ); ?></a> /
        <span class="current"><?php the_title(); ?></span>
    </div>
    <?php
} else {
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
}
?>

<?php
$current_page_id = get_the_ID();

$event_date = '';

if ( $current_page_id == 57 ) {
  $event_type = 'tournament';
  $event_date = '>';
} elseif ( $current_page_id == 59 ) {
  $event_type = 'meetup';
  $event_date = '>';
} elseif ( $current_page_id == 133 ) {
  $event_type = 'meetup';
  $event_date = '<';
} elseif ( $current_page_id == 135 ) {
  $event_type = 'tournament';
  $event_date = '<';
} elseif ( $current_page_id == 55 ) {
    $event_type = array('tournament', 'meetup');
    $event_date = '<';
} elseif ( $current_page_id == 53 ) {
    $event_type = array('tournament', 'meetup');
    $event_date = '>';
} else {
  $event_type = '';
  $event_date = '';
}
?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">
    <?php
    $today = date('Ymd');
    $args = array(
      'post_type' => 'event',
      'posts_per_page' => -1,
      'meta_key' => 'event_date',
      'meta_query' => array(
        'relation' => 'AND',
        array(
          'key' => 'event_type',
          'value' => $event_type,
          'compare' => '=',
        ),
        array(
          'key' => 'event_date',
          'compare' => $event_date,
          'value' => $today,
          'type' => 'DATE'
        )
      ),
      'orderby' => 'meta_value',
      'order' => 'ASC',
    );
    if ( $current_page_id == 10 ) {
$args = array(
  'post_type' => 'event',
  'posts_per_page' => -1,
  'meta_key' => 'event_date',
  'orderby' => 'meta_value',
  'order' => 'DESC',
);
}
    $events_query = new WP_Query( $args );
    ?>

    <?php if ( $events_query->have_posts() ) : ?>
      <div class="events-list">
        <?php while ( $events_query->have_posts() ) : $events_query->the_post(); ?>
          <div class="event-title">
            <h2>
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              <span class="event-type"><?php echo esc_html( get_post_meta( get_the_ID(), 'event_type', true ) ); ?></span>
<span class="event-date"><?php echo esc_html( date_i18n( 'F j, Y h:i A', strtotime( get_post_meta( get_the_ID(), 'event_date', true ) ) ) ); ?></span>
            </h2>
          </div>
        <?php endwhile; ?>
      </div>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>
  </main>
</div>

<?php get_footer(); ?>

