<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ecocoded
 */

get_header(); ?>

<style>
.post-thumbnail {
    display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom: 20px;
  height: 800px; /* set a fixed height for the thumbnail */
  overflow: hidden;
}

.post-title {
    font-size: 30px;
    margin-bottom: 20px;
}

.post-content {
    font-size: 16px;
    line-height: 1.6;
}

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

.team-member {
    display: inline-block;
    width: 250px;
    margin-right: 20px;
    vertical-align: top;
}
    
.team-member img {
    height: 200px;
    width: 250px;
    object-fit: cover;
}

</style>

<?php
$post_type = get_post_type_object( get_post_type() );
if ( $post_type->has_archive ) {
    $post_type_archive = get_post_type_archive_link( $post_type->name );
    ?>
    <div class="breadcrumbs">
        <a href="<?php echo esc_url( home_url() ); ?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a> /
        <a href="<?php echo esc_url( home_url( '/team-page/' ) ); ?>"><?php echo esc_html( 'Team' ); ?></a> /
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
while (have_posts()) : the_post();

    // Check if the post type is your custom post type
    if (get_post_type() == 'team') {

        // Display the post thumbnail
        if (has_post_thumbnail()) {
            echo '<div class="post-thumbnail">';
            the_post_thumbnail('full');
            echo '</div>';
        }

        // Display the post title
        echo '<h1 class="post-title">';
        the_title();
        echo '</h1>';

        // Display the post content
        echo '<div class="post-content">';
        the_content();
        echo '</div>';

    } else {

        // Display regular post content
        get_template_part('template-parts/content', get_post_type());

    }

endwhile;
?>

<?php
// Get the IDs of the related team members
$related_members_ids = get_post_meta( get_the_ID(), 'team_members', true );

// If there are related members, display the list
if ( $related_members_ids ) {
    ?>
    <h2>Team Members:</h2>
    <div class="team-members">
        <?php
        // Loop through the related member IDs and display each one
        foreach ( $related_members_ids as $member_id ) {
            $member_thumbnail = get_the_post_thumbnail_url( $member_id, 'medium' );
            $member_title = get_the_title( $member_id );
            $member_content = get_post_meta( $member_id, 'team_member_content', true );
            ?>
            <div class="team-member">
                <img src="<?php echo esc_url( $member_thumbnail ); ?>" alt="<?php echo esc_attr( $member_title ); ?>">
                <div class="team-member-details">
                    <a href="<?php echo esc_url( get_permalink( $member_id ) ); ?>">
                        <h3><?php echo esc_html( get_the_title( $member_id ) ); ?></h3>
                    </a>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
}
?>

<div class="post-pagination">
    <?php wp_link_pages(); ?>
</div>


<?php
// Get the current post's ID
$current_post_id = get_the_ID();

// Query posts of the same custom post type, except for the current post
$args = array(
    'post_type' => 'team',
    'post__not_in' => array($current_post_id),
    'posts_per_page' => 3,
);

$custom_query = new WP_Query($args);

if ($custom_query->have_posts()) :
?>

<div class="recommended-posts">
    <h3>Recommended Posts</h3>
    <ul>
    <?php while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <?php endwhile; ?>
    </ul>
</div>

<?php
endif;

wp_reset_postdata(); // Reset the global post data
?>


<?php
get_footer();
