<?php
function team_post_type(){
    register_post_type('team',array(
    'capability_type' => 'team',
    'map_meta_cap'=> true,
    'supports' => array('title', 'editor','excerpt','thumbnail'),
    'rewrite'=> array('slug' => 'team' ),
    'has_archive' => true,
    'public' => true, 
    'labels' => array(
    'name' => "Team",
    'add_new_item' => 'Add New Team',
    'edit_item' => 'Edit Team',
    'all_items' => 'Teams',
    'singular_name' => "Team"
    ),
    'menu_icon' => 'dashicons-groups'
    ));
    
    register_post_type('member',array(
    'capability_type' => 'member',
    'map_meta_cap'=> true,
    'supports' => array('title', 'thumbnail'),
    'rewrite'=> array('slug' => 'member' ),
    'has_archive' => true,
    'public' => true, 
    'labels' => array(
    'name' => "Member",
    'add_new_item' => 'Add New Member',
    'edit_item' => 'Edit Member',
    'all_items' => 'Members',
    'singular_name' => "Member"
    ),
    'menu_icon' => 'dashicons-admin-users'
    ));
    
    }
    add_action('init', 'team_post_type')
?>