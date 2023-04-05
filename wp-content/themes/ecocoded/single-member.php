<?php
/**
 * Template Name: Member Page
 */

get_header(); ?>

<style>
    .card {
        max-width: 600px;
        margin: 0 auto;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        border-radius: 5px;
        overflow: hidden;
    }

    .card-img-top {
        max-height: 300px;
        overflow: hidden;
    }

    .card-img-top img {
        max-width: 100%;
        height: auto;
    }

    .card-body {
        padding: 20px;
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

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <div class="card">
                    <?php
                        // Display the thumbnail image
                        if ( has_post_thumbnail() ) {
                            echo '<div class="card-img-top">';
                            the_post_thumbnail( 'medium' );
                            echo '</div>';
                        }
                    ?>

                    <div class="card-body">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

                        <?php the_content(); ?>

                        <?php
                            // Get the custom field values
                            $in_game_name = get_post_meta( get_the_ID(), 'in_game_name', true );
                            $kda = get_post_meta( get_the_ID(), 'kda', true );
                            $role = get_post_meta( get_the_ID(), 'role', true );
                        ?>

                        <p><strong>In-game name:</strong> <?php echo esc_html( $in_game_name ); ?></p>
                        <p><strong>KDA:</strong> <?php echo esc_html( $kda ); ?></p>
                        <p><strong>Role:</strong> <?php echo esc_html( $role ); ?></p>
                    </div><!-- .card-body -->
                </div><!-- .card -->

            </article><!-- #post-## -->

        <?php endwhile; ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
