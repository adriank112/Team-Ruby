<?php
function team_member_post_type(){
    register_post_type('team_member',array(
    'supports' => array('title', 'editor','excerpt'),
    'rewrite'=> array('slug' => 'team-members' ),
    'has_archive' => true,
    'public' => true, 
    'labels' => array(
    'name' => "Team Members",
    'add_new_item' => 'Add New Team Member',
    'edit_item' => 'Edit Team Member',
    'all_items' => 'Team Members',
    'singular_name' => "Team Member"
    ),
    'menu_icon' => 'dashicons-groups'
    ));
    
    }
    add_action('init', 'team_member_post_type')
?>