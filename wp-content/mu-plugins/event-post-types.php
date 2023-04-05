<?php 
function event_post_types(){ 
    register_post_type('event', array( 
    'supports' => array('title', 'thumbnail', 'excerpt', 'editor'),
    'rewrite'=> array('slug' => 'event' ),
    'public'=> true,
    'has_archive' => true,
    'labels' => array(
    'name' => "Events",
    'add_new_item' => 'Add New Event',
    'edit_item' => 'Edit Event',
    'all_items' => 'All Events',
    'singular_name' => "Event"
    ),
    'menu_icon' => 'dashicons-calendar'
    ));
        register_post_type('mode', array(
        'supports' => array('title', 'thumbnail', 'excerpt', 'editor'),
        'rewrite'=> array('slug' => 'mode' ),
        'has_archive' => true,
        'public' => true, 
        'labels' => array(
            'name' => "Event Modes",
            'add_new_item' => 'Add New Mode',
            'edit_item' => 'Edit Mode',
            'all_items' => 'All Modes',
            'singular_name' => "Mode"
        ),
        'menu_icon' => 'dashicons-tickets'
    ));
    }
    add_action('init', 'event_post_types');
?>