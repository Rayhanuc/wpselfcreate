<?php

/**
 * Plugin Name: Projects-Helper
 * Plugin URI: https://github.com/Rayhanuc/projects
 * Description: Projects Helper plugin for Project help
 * Author: Md. Rayhan Uddin Chowdhury
 * Version: 1.0
 * Author URI: https://rayhanuddinchy.com/
 * Text Domain: projects_helper
 * Domain Path: /languages
 * License: GPL-2.0+
 * Requires at least: 5.9 
 * Requires PHP: 5.6
 * 
 */


// Custom Post project cpt start

function create_projects_post_type() {
 
  $labels = [
    "name" => esc_html__( "Projects", "projects" ),
    "singular_name" => esc_html__( "Project", "projects" ),
    "menu_name" => esc_html__( "Projects", "projects" ),
    "all_items" => esc_html__( "All Projects", "projects" ),
    "add_new" => esc_html__( "Add project", "projects" ),
    "add_new_item" => esc_html__( "Add New Project", "projects" ),
    "edit_item" => esc_html__( "Edit Project", "projects" ),
    "new_item" => esc_html__( "New Project", "projects" ),
    "view_item" => esc_html__( "View Project", "projects" ),
    "view_items" => esc_html__( "View Projects", "projects" ),
    "search_items" => esc_html__( "Search Projects", "projects" ),
    "featured_image" => esc_html__( "Project Image", "projects" ),
    "set_featured_image" => esc_html__( "Set Project Image", "projects" ),
    "remove_featured_image" => esc_html__( "Remove Project Image", "projects" ),
    "use_featured_image" => esc_html__( "Use Project Image", "projects" ),
    "archives" => esc_html__( "Projects Archives", "projects" ),
    "insert_into_item" => esc_html__( "Insert Into Project", "projects" ),
    "uploaded_to_this_item" => esc_html__( "Uploaded to this project", "projects" ),
    "filter_items_list" => esc_html__( "Filter Projects List", "projects" ),
    "items_list_navigation" => esc_html__( "Projects List Navigation", "projects" ),
    "items_list" => esc_html__( "Projects List", "projects" ),
    "name_admin_bar" => esc_html__( "New Project", "projects" ),
    "item_published" => esc_html__( "Project Published", "projects" ),
    "item_updated" => esc_html__( "Project Updated", "projects" ),
  ];



  $args = [
  "label" => esc_html__( "Projects", "projects" ),
  "labels" => $labels,
  "description" => "",
  "public" => true,
  "publicly_queryable" => true,
  "show_ui" => true,
  "show_in_rest" => true,
  "rest_base" => "",
  "rest_controller_class" => "WP_REST_Posts_Controller",
  "rest_namespace" => "wp/v2",
  "has_archive" => "projects",
  "show_in_menu" => true,
  "show_in_nav_menus" => true,
  "delete_with_user" => false,
  "exclude_from_search" => false,
  "capability_type" => "post",
  "map_meta_cap" => true,
  "hierarchical" => false,
  "can_export" => false,
  "rewrite" => [ "slug" => "project", "with_front" => false ],
  "query_var" => true,
  "menu_icon" => "dashicons-format-gallery",
  "supports" => [ "title", "editor", "thumbnail", "thumbnail", "excerpt", "custom-fields" ],
"taxonomies" => [ "ptag" ],
  "show_in_graphql" => false,
];

  register_post_type( 'projects', $args );
}
add_action( 'init', 'create_projects_post_type' );




function projects_register_my_taxes() {

	/**
	 * Taxonomy: Project Tags.
	 */

	$labels = [
		"name" => esc_html__( "Project Tags", "projects" ),
		"singular_name" => esc_html__( "Project Tag", "projects" ),
		"menu_name" => esc_html__( "Project Tags", "projects" ),
		"all_items" => esc_html__( "All Project Tags", "projects" ),
		"edit_item" => esc_html__( "Edit Project Tag", "projects" ),
		"view_item" => esc_html__( "View Project Tag", "projects" ),
		"update_item" => esc_html__( "Update Project Tag Name", "projects" ),
		"add_new_item" => esc_html__( "Add New Project Tag", "projects" ),
		"new_item_name" => esc_html__( "New Project Tag", "projects" ),
	];

	
	$args = [
		"label" => esc_html__( "Project Tags", "projects" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'ptag', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "ptag",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "ptag", [ "projects" ], $args );
}
add_action( 'init', 'projects_register_my_taxes' );


function add_projects_meta_boxes($post_type) {
  if ($post_type == 'projects') {
		add_meta_box(
      'project_url',
      'External URL',
      'render_project_url_meta_box',
      'projects',
      'normal',
      'default'
		);

    add_meta_box(
      'additional_featured_image',
      'Additional Featured Image',
      'render_additional_featured_image_meta_box',
      'projects',
      'normal',
      'default'
    );
	}
}
add_action( 'add_meta_boxes', 'add_projects_meta_boxes' );

function render_project_url_meta_box( $post ) {
  $project_url = get_post_meta( $post->ID, 'project_url', true );

  echo '<label for="project-url-field">';
  echo 'Enter the external URL for the project:';
  echo '</label><br />';
  echo '<input type="text" id="project-url-field" name="project_url" value="' . esc_attr( $project_url ) . '" style="width: 100%;" />';
}

function render_additional_featured_image_meta_box( $post ) {
  $additional_featured_image = get_post_meta( $post->ID, 'additional_featured_image', true );

  echo '<label for="project-preview-images-field">';
  echo 'Upload or enter the URLs for preview images:';
  echo '</label><br />';
  echo '<input type="text" id="project-preview-images-field" name="additional_featured_image" value="' . esc_attr( $additional_featured_image ) . '" style="width: 100%;" />';
}


function save_projects_meta( $post_id ) {
  if ( isset( $_POST['project_url'] ) ) {
      update_post_meta( $post_id, 'project_url', sanitize_text_field( $_POST['project_url'] ) );
  }

  if ( isset( $_POST['additional_featured_image'] ) ) {
      update_post_meta( $post_id, 'additional_featured_image', sanitize_text_field( $_POST['additional_featured_image'] ) );
  }
}
add_action( 'save_post_projects', 'save_projects_meta' );