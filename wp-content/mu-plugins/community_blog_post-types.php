<?php 
function community_blog_post_types(){ 
    register_post_type(
        'community_blog', 
        array( 
            'capability_type' => 'blog post',
            'map_meta_cap'=> true,
            'public'=> true,
            'has_archive' => true,
            'rewrite'=> array(
                'slug' => 'community'
            ),
            'labels' => array(
                'name' => 'Community Blog Posts',
                'add_new_item' => 'Add New Post',
                'edit_item' => 'Edit Post',
                'all_items' => 'All Posts',
                'singular_name' => "Community Post"
            ),
            'supports' => array(
                'title', 
                'editor',
                'excerpt',
                'comments'
            ),
            'taxonomies' => array(
                'category'
            ),
            'menu_icon' => 'dashicons-games'
        )
    );
    }
    add_action('init', 'community_blog_post_types');
?>