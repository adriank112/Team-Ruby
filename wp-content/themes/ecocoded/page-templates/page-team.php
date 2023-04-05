<?php
/*
Template Name: Team Page
*/
get_header();?>

<style>
.custom-card {
    display: flex;
    flex-direction: row;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-bottom: 20px;
}

.card-thumbnail {
    flex: 1;
}

.card-thumbnail img {
    width: 100%;
    height: auto;
    border-radius: 5px 0 0 5px;
}

.card-content {
    flex: 2;
    padding: 10px;
}

.card-title {
    margin: 0;
}

.card-excerpt {
    margin-bottom: 10px;
}

.card-link {
    display: inline-block;
    background-color: #007cba;
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
    text-decoration: none;
}

.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
}

.pagination a,
.pagination span {
    display: inline-block;
    padding: 5px 10px;
    margin-right: 5px;
    font-size: 14px;
    line-height: 1.5;
    color: #333;
    border: 1px solid #ccc;
    border-radius: 3px;
    transition: all 0.2s ease-in-out;
}

.pagination a:hover,
.pagination span.current {
    background-color: #333;
    color: #fff;
    border-color: #333;
    cursor: pointer;
}

    
</style>

<?php
$args = array(
    'post_type' => 'team',
    'posts_per_page' => 2,
    'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
);

$custom_query = new WP_Query($args);

if ($custom_query->have_posts()) :
    while ($custom_query->have_posts()) : $custom_query->the_post();
        if (has_post_thumbnail()) {
            // Get the thumbnail image URL
            $thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
        }
?>

<div class="custom-card">
    <?php if (has_post_thumbnail()) : ?>
    <div class="card-thumbnail">
        <img src="<?php echo $thumb_url; ?>" alt="<?php echo get_the_title(); ?>">
    </div>
    <?php endif; ?>
    <div class="card-content">
        <h2 class="card-title"><?php the_title(); ?></h2>
        <div class="card-excerpt"><?php the_excerpt(); ?></div>
        <a href="<?php the_permalink(); ?>" class="card-link">Read more</a>
    </div>
</div>

<?php
    endwhile;

    // Add pagination links
    $total_pages = $custom_query->max_num_pages;
    if ($total_pages > 1) {
        $current_page = max(1, get_query_var('paged'));
        echo '<div class="pagination">';
        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
        ));
        echo '</div>';
    }
endif;

wp_reset_postdata(); // Reset the global post data
?>

<?php get_footer(); ?>

