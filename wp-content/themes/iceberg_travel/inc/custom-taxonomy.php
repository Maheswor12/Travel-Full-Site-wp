<?php


	function register_taxonomy_custom() {

        $labels = array(
            'name'                  => _x( 'Locations', 'Taxonomy Locations', 'iceberg_travel' ),
            'singular_name'         => _x( 'Location', 'Taxonomy Location', 'iceberg_travel' ),
            'search_items'          => __( 'Search Locations', 'iceberg_travel' ),
            'popular_items'         => __( 'Popular Locations', 'iceberg_travel' ),
            'all_items'             => __( 'All Locations', 'iceberg_travel' ),
            'parent_item'           => __( 'Parent Location', 'iceberg_travel' ),
            'parent_item_colon'     => __( 'Parent Location', 'iceberg_travel' ),
            'edit_item'             => __( 'Edit Location', 'iceberg_travel' ),
            'update_item'           => __( 'Update Location', 'iceberg_travel' ),
            'add_new_item'          => __( 'Add New Location', 'iceberg_travel' ),
            'new_item_name'         => __( 'New Location Name', 'iceberg_travel' ),
            'add_or_remove_items'   => __( 'Add or remove Locations', 'iceberg_travel' ),
            'choose_from_most_used' => __( 'Choose from most used Plural Name', 'iceberg_travel' ),
            'menu_name'             => __( 'Location', 'iceberg_travel' ),
        );

        $args = array(
            'labels'            => $labels,
            'public'            => true,
            'show_in_nav_menus' => true,
            'show_admin_column' => false,
            'meta_box_cb'       => false,
            'hierarchical'      => false,
            'show_tagcloud'     => true,
            'show_ui'           => true,
            'query_var'         => true,
            'rewrite'           => true,
            'query_var'         => true,
            'capabilities'      => array(),
        );

        register_taxonomy( 'location', array( 'tour', 'trekking' ), $args );

        $labels = array(
            'name'                  => _x( 'Activity Tours', 'Taxonomy Activity Tours', 'iceberg_travel' ),
            'singular_name'         => _x( 'Activity Tour', 'Taxonomy Activity Tour', 'iceberg_travel' ),
            'search_items'          => __( 'Search Activity Tours', 'iceberg_travel' ),
            'popular_items'         => __( 'Popular Activity Tours', 'iceberg_travel' ),
            'all_items'             => __( 'All Activity Tours', 'iceberg_travel' ),
            'parent_item'           => __( 'Parent Activity Tour', 'iceberg_travel' ),
            'parent_item_colon'     => __( 'Parent Activity Tour', 'iceberg_travel' ),
            'edit_item'             => __( 'Edit Activity Tour', 'iceberg_travel' ),
            'update_item'           => __( 'Update Activity Tour', 'iceberg_travel' ),
            'add_new_item'          => __( 'Add New Activity Tour', 'iceberg_travel' ),
            'new_item_name'         => __( 'New Activity Tour Name', 'iceberg_travel' ),
            'add_or_remove_items'   => __( 'Add or remove Activity Tours', 'iceberg_travel' ),
            'choose_from_most_used' => __( 'Choose from most used Plural Name', 'iceberg_travel' ),
            'menu_name'             => __( 'Activity Tour', 'iceberg_travel' ),
        );

        $args = array(
            'labels'            => $labels,
            'public'            => true,
            'show_in_nav_menus' => true,
            'show_admin_column' => false,
            'hierarchical'      => true,
            'show_tagcloud'     => true,
            'show_ui'           => true,
            'query_var'         => true,
            'rewrite'           => true,
            'query_var'         => true,
            'capabilities'      => array(),
        );

        register_taxonomy( 'activity_tour', array( 'tour' ), $args );

        $labels = array(
            'name'                  => _x( 'Activity Trekkings', 'Taxonomy Activity Trekkings', 'iceberg_travel' ),
            'singular_name'         => _x( 'Activity Trekking', 'Taxonomy Activity Trekking', 'iceberg_travel' ),
            'search_items'          => __( 'Search Activity Trekkings', 'iceberg_travel' ),
            'popular_items'         => __( 'Popular Activity Trekkings', 'iceberg_travel' ),
            'all_items'             => __( 'All Activity Trekkings', 'iceberg_travel' ),
            'parent_item'           => __( 'Parent Activity Trekking', 'iceberg_travel' ),
            'parent_item_colon'     => __( 'Parent Activity Trekking', 'iceberg_travel' ),
            'edit_item'             => __( 'Edit Activity Trekking', 'iceberg_travel' ),
            'update_item'           => __( 'Update Activity Trekking', 'iceberg_travel' ),
            'add_new_item'          => __( 'Add New Activity Trekking', 'iceberg_travel' ),
            'new_item_name'         => __( 'New Activity Trekking Name', 'iceberg_travel' ),
            'add_or_remove_items'   => __( 'Add or remove Activity Trekkings', 'iceberg_travel' ),
            'choose_from_most_used' => __( 'Choose from most used Plural Name', 'iceberg_travel' ),
            'menu_name'             => __( 'Activity Trekking', 'iceberg_travel' ),
        );

        $args = array(
            'labels'            => $labels,
            'public'            => true,
            'show_in_nav_menus' => true,
            'show_admin_column' => false,
            'hierarchical'      => true,
            'show_tagcloud'     => true,
            'show_ui'           => true,
            'query_var'         => true,
            'rewrite'           => true,
            'query_var'         => true,
            'capabilities'      => array(),
        );

        register_taxonomy( 'activity_trekking', array( 'trekking' ), $args );


        $labels = array(
            'name'                  => _x( 'Quick Form Types', 'Taxonomy Activity Trekkings', 'iceberg_travel' ),
            'singular_name'         => _x( 'Quick Form Type', 'Taxonomy Activity Trekking', 'iceberg_travel' ),
            'search_items'          => __( 'Search Quick Form Types', 'iceberg_travel' ),
            'popular_items'         => __( 'Popular Quick Form Types', 'iceberg_travel' ),
            'all_items'             => __( 'All Quick Form Types', 'iceberg_travel' ),
            'parent_item'           => __( 'Parent Quick Form Types', 'iceberg_travel' ),
            'parent_item_colon'     => __( 'Parent Quick Form Types', 'iceberg_travel' ),
            'edit_item'             => __( 'Edit Quick Form Types', 'iceberg_travel' ),
            'update_item'           => __( 'Update Quick Form Types', 'iceberg_travel' ),
            'add_new_item'          => __( 'Add New Quick Form Types', 'iceberg_travel' ),
            'new_item_name'         => __( 'New Quick Form Types', 'iceberg_travel' ),
            'add_or_remove_items'   => __( 'Add or remove Quick Form Types', 'iceberg_travel' ),
            'choose_from_most_used' => __( 'Choose from most used Plural Name', 'iceberg_travel' ),
            'menu_name'             => __( 'Quick Form Types', 'iceberg_travel' ),
        );

        $args = array(
            'labels'            => $labels,
            'public'            => true,
            'show_in_nav_menus' => false,
            'show_admin_column' => false,
            'hierarchical'      => false,
            'show_tagcloud'     => true,
            'show_ui'           => true,
            'meta_box_cb'       =>false,
            'query_var'         => true,
            'rewrite'           => true,
            'query_var'         => true,
            'capabilities'      => array(),
        );

        register_taxonomy( 'quick-form-type', array( 'quick-form' ), $args );
    }

	add_action( 'init', 'register_taxonomy_custom' );