<?php
/**
 * @package artesian-partners-cpt
 * @version 1.0
 */
/*
Plugin Name: Artesian Partners CPT
Plugin URI: http://wpwebdevelopment.com
Description: Establishes custom post types for different level of partners to display their information as well as setting up a post type linked to custom woocommerce product combinations
Author: Matthew Payne
Version: 1.0
Author URI: http://wpwebdevelopment.com
*/
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function register_partners_cpt() {

/**
 * Creates custom post types and custom fields for partners pages, as well as woocommerce custom product builder
 * Post Type: Partners
 */

$labels = [
    "name" => __( "partners", "hello-elementor-child" ),
    "singular_name" => __( "partner", "hello-elementor-child" ),
    "menu_name" => __( "Partners", "hello-elementor-child" ),
    "all_items" => __( "All partners", "hello-elementor-child" ),
    "add_new" => __( "Add new", "hello-elementor-child" ),
    "add_new_item" => __( "Add new partner", "hello-elementor-child" ),
    "edit_item" => __( "Edit partner", "hello-elementor-child" ),
    "new_item" => __( "New partner", "hello-elementor-child" ),
    "view_item" => __( "View partner", "hello-elementor-child" ),
    "view_items" => __( "View partners", "hello-elementor-child" ),
    "search_items" => __( "Search partner", "hello-elementor-child" ),
    "not_found" => __( "No partners found", "hello-elementor-child" ),
    "not_found_in_trash" => __( "No partners found in trash", "hello-elementor-child" ),
    "parent" => __( "Parent partner:", "hello-elementor-child" ),
    "featured_image" => __( "Featured image for this partner", "hello-elementor-child" ),
    "set_featured_image" => __( "Set featured image for this partner", "hello-elementor-child" ),
    "remove_featured_image" => __( "Remove featured image for this partner", "hello-elementor-child" ),
    "use_featured_image" => __( "Use as featured image for this partner", "hello-elementor-child" ),
    "archives" => __( "Partner archives", "hello-elementor-child" ),
    "insert_into_item" => __( "Insert into partner", "hello-elementor-child" ),
    "uploaded_to_this_item" => __( "Upload to this partner", "hello-elementor-child" ),
    "filter_items_list" => __( "Filter partners list", "hello-elementor-child" ),
    "items_list_navigation" => __( "Partners list navigation", "hello-elementor-child" ),
    "items_list" => __( "Partners list", "hello-elementor-child" ),
    "attributes" => __( "Partners attributes", "hello-elementor-child" ),
    "name_admin_bar" => __( "Partner", "hello-elementor-child" ),
    "item_published" => __( "Partner published", "hello-elementor-child" ),
    "item_published_privately" => __( "Partner published privately.", "hello-elementor-child" ),
    "item_reverted_to_draft" => __( "Partner reverted to draft.", "hello-elementor-child" ),
    "item_scheduled" => __( "Partner scheduled", "hello-elementor-child" ),
    "item_updated" => __( "Partner updated.", "hello-elementor-child" ),
    "parent_item_colon" => __( "Parent partner:", "hello-elementor-child" ),
];

$args = [
    "label" => __( "partners", "hello-elementor-child" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "partners", "with_front" => true ],
    "query_var" => true,
    "supports" => [ "title", "editor", "thumbnail" ],
    "show_in_graphql" => false,
];

register_post_type( "partners", $args );

function register_partner_fields() {
    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
            'key' => 'group_61312f09f2325',
            'title' => 'Partners',
            'fields' => array(
                array(
                    'key' => 'field_61312f174f565',
                    'label' => 'Name',
                    'name' => 'name',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_61312f615142f',
                    'label' => 'Bio',
                    'name' => 'bio',
                    'type' => 'textarea',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'maxlength' => '',
                    'rows' => '',
                    'new_lines' => '',
                ),
                array(
                    'key' => 'field_6131307a5143b',
                    'label' => 'Featured',
                    'name' => 'featured',
                    'type' => 'true_false',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'message' => 'Is partner a "featured" partner',
                    'default_value' => 0,
                    'ui' => 0,
                    'ui_on_text' => '',
                    'ui_off_text' => '',
                ),
                array(
                    'key' => 'field_613130615143a',
                    'label' => 'Custom Link',
                    'name' => 'link',
                    'type' => 'link',
                    'instructions' => 'Use this field if you want to link to a totally custom page (think OTK)',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'return_format' => 'url',
                ),
                array(
                    'key' => 'field_61312f6f51430',
                    'label' => 'Banner Image',
                    'name' => 'banner_image',
                    'type' => 'image',
                    'instructions' => 'Image to use on the partner landing page.	Leaving blank will use a default image',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'return_format' => 'url',
                    'preview_size' => 'medium',
                    'library' => 'all',
                    'min_width' => '',
                    'min_height' => '',
                    'min_size' => '',
                    'max_width' => '',
                    'max_height' => '',
                    'max_size' => '',
                    'mime_types' => '',
                ),
                array(
                    'key' => 'field_61312f9051431',
                    'label' => 'Facebook Link',
                    'name' => 'facebook_link',
                    'type' => 'text',
                    'instructions' => 'Link to the partner\'s Facebook, leave blank if no such link exists',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_61312fb251432',
                    'label' => 'Twitter Link',
                    'name' => 'twitter_link',
                    'type' => 'text',
                    'instructions' => 'Link to the partner\'s Twitter, leave blank if no such link exists',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_61312fc551433',
                    'label' => 'Instagram Link',
                    'name' => 'instagram_link',
                    'type' => 'text',
                    'instructions' => 'Link to the partner\'s Instagram, leave blank if no such link exists',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_61312fd451434',
                    'label' => 'Youtube Link',
                    'name' => 'youtube_link',
                    'type' => 'text',
                    'instructions' => 'Link to the partner\'s Youtube, leave blank if no such link exists',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_61312fe751435',
                    'label' => 'Twitch Name',
                    'name' => 'twitch_name',
                    'type' => 'text',
                    'instructions' => 'Twitch name (used to produce the twitch video on their page)',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_6131300751436',
                    'label' => 'PC Image',
                    'name' => 'pc_image',
                    'type' => 'image',
                    'instructions' => 'Image of the partner\'s PC if we have one',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'return_format' => 'url',
                    'preview_size' => 'medium',
                    'library' => 'all',
                    'min_width' => '',
                    'min_height' => '',
                    'min_size' => '',
                    'max_width' => '',
                    'max_height' => '',
                    'max_size' => '',
                    'mime_types' => '',
                ),
                array(
                    'key' => 'field_6131301c51437',
                    'label' => 'Partner Build Link',
                    'name' => 'partner_build_link',
                    'type' => 'text',
                    'instructions' => 'Url for the partner build (leave blank if doesn\'t exist)',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_61b3d57c48ac8',
                    'label' => 'New Partner Build Link',
                    'name' => 'new_partner_build_link',
                    'type' => 'text',
                    'instructions' => 'Url for the partner build (leave blank if doesn\'t exist)',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_6131302951438',
                    'label' => 'Inspired Build Link',
                    'name' => 'inspired_build_link',
                    'type' => 'text',
                    'instructions' => 'Url for the inspired build (leave blank if doesn\'t exist)',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_61b3d59848ac9',
                    'label' => 'New Inspired Build Link',
                    'name' => 'new_inspired_build_link',
                    'type' => 'text',
                    'instructions' => 'Url for the inspired build (leave blank if doesn\'t exist)',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_6131304e51439',
                    'label' => 'Merch Link',
                    'name' => 'merch_link',
                    'type' => 'text',
                    'instructions' => 'Url for the relevant merch (leave blank if doesn\'t exist)',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'partners',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
            'show_in_rest' => 0,
        ));
        
        endif;		
}

// Run functions on plugin init to register post types and fields
add_action( 'init', 'register_partners_cpt' );
add_action( 'init', 'register_partner_fields' );