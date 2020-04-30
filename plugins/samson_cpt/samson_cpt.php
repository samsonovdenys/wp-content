<?php
/*
Plugin Name: Samson_cpt
Plugin URI: 
Description: Плагин который инициализирует новый post type.
Version: 1.0
Author: Samsonov Denys
Author URI: http://websamsonov.it
*/

function samson_register_cpt_house() {

	/**
	 * Post Type: Объекты недвижимости 'cpt_house'.
	 */

	$labels = [
		"name" => __( "Объекты недвижимости", "wp-bootstrap-starter-child" ),
		"singular_name" => __( "Объект недвижимости", "wp-bootstrap-starter-child" ),
		"menu_name" => __( "Недвижимость", "wp-bootstrap-starter-child" ),
		"all_items" => __( "Объекты недвижимости", "wp-bootstrap-starter-child" ),
		"add_new" => __( "Добавить недвижимость", "wp-bootstrap-starter-child" ),
		"add_new_item" => __( "Добавить недвижимость", "wp-bootstrap-starter-child" ),
		"edit_item" => __( "Редактировать недвижимость", "wp-bootstrap-starter-child" ),
		"new_item" => __( "Новая недвижимость", "wp-bootstrap-starter-child" ),
		"view_item" => __( "Посмотреть недвижимость", "wp-bootstrap-starter-child" ),
		"view_items" => __( "Посмотреть всю недвижимость", "wp-bootstrap-starter-child" ),
		"search_items" => __( "Найти недвижимость", "wp-bootstrap-starter-child" ),
		"not_found" => __( "Недвижимость не найдена", "wp-bootstrap-starter-child" ),
		"archives" => __( "Архив недвижимости", "wp-bootstrap-starter-child" ),
	];

	$args = [
		"label" => __( "Объекты недвижимости", "wp-bootstrap-starter-child" ),
		"labels" => $labels,
		"description" => "Объекты недвижимости",
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
		"rewrite" => [ "slug" => "cpt_house", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "excerpt" , "thumbnail" , "custom-fields" ],
		"taxonomies" => [ "raion" ],
	];

	register_post_type( "cpt_house", $args );
}

add_action( 'init', 'samson_register_cpt_house' );


function samson_register_my_taxes_raion() {

	/**
	 * Taxonomy: Районы.
	 */

	$labels = [
		"name" => __( "Районы", "wp-bootstrap-starter-child" ),
		"singular_name" => __( "Район", "wp-bootstrap-starter-child" ),
	];

	$args = [
		"label" => __( "Районы", "wp-bootstrap-starter-child" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'raion', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "raion",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		];
	register_taxonomy( "raion", [ "cpt_house" ], $args );
}
add_action( 'init', 'samson_register_my_taxes_raion' );

?>