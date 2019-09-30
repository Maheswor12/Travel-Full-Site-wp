<?php
/**
 * Register tour,trekking, travelguide and booking
 */
function register_post_type_custom(){

        $labels = array(
            'name'               => __( 'Tours', 'iceberg_travel' ),
            'singular_name'      => __( 'Tour', 'iceberg_travel' ),
            'add_new'            => _x( 'Add New Tour', 'iceberg_travel' ),
            'add_new_item'       => __( 'Add New Tour', 'iceberg_travel' ),
            'edit_item'          => __( 'Edit Tour', 'iceberg_travel' ),
            'new_item'           => __( 'New Tour', 'iceberg_travel' ),
            'view_item'          => __( 'View Tour', 'iceberg_travel' ),
            'search_items'       => __( 'Search Tours', 'iceberg_travel' ),
            'not_found'          => __( 'No Tours found', 'iceberg_travel' ),
            'not_found_in_trash' => __( 'No Tours found in Trash', 'iceberg_travel' ),
            'parent_item_colon'  => __( 'Parent Tour:', 'iceberg_travel' ),
            'menu_name'          => __( 'Tours', 'iceberg_travel' ),

        );

        $args = array(
            'labels'              => $labels,
            'hierarchical'        => false,
            'description'         => 'description',
            'taxonomies'          => array(),
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => null,
            'menu_icon'           => 'https://travelbird.com.np/wp-content/uploads/2018/01/Travel-by-Plane-Icon-e1516793560658.png',
            'show_in_nav_menus'   => true,
            'publicly_queryable'  => true,
            'exclude_from_search' => false,
            'has_archive'         => true,
            'query_var'           => true,
            'can_export'          => true,
            'rewrite'             => true,
            'capability_type'     => 'post',
            'supports'            => array(
                'title',
                'editor',
                'author',
                'thumbnail',
                'excerpt',
                'comments',
                'revisions',
                'page-attributes',
                'post-formats',
            ),
        );

        register_post_type( 'tour', $args );


        $labels = array(
            'name'               => __( 'Trekkings', 'iceberg_travel' ),
            'singular_name'      => __( 'Trekking', 'iceberg_travel' ),
            'add_new'            => _x( 'Add New Trekking', 'iceberg_travel' ),
            'add_new_item'       => __( 'Add New Trekking', 'iceberg_travel' ),
            'edit_item'          => __( 'Edit Trekking', 'iceberg_travel' ),
            'new_item'           => __( 'New Trekking', 'iceberg_travel' ),
            'view_item'          => __( 'View Trekking', 'iceberg_travel' ),
            'search_items'       => __( 'Search Trekkings', 'iceberg_travel' ),
            'not_found'          => __( 'No Trekkings found', 'iceberg_travel' ),
            'not_found_in_trash' => __( 'No Trekkings found in Trash', 'iceberg_travel' ),
            'parent_item_colon'  => __( 'Parent Trekking:', 'iceberg_travel' ),
            'menu_name'          => __( 'Trekkings', 'iceberg_travel' ),
        );

        $args = array(
            'labels'              => $labels,
            'hierarchical'        => false,
            'description'         => 'description',
            'taxonomies'          => array(),
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => null,
            'menu_icon'           => 'https://travelbird.com.np/wp-content/uploads/2018/01/icon-trekking-e1516792388814.png',
            'show_in_nav_menus'   => true,
            'publicly_queryable'  => true,
            'exclude_from_search' => false,
            'has_archive'         => true,
            'query_var'           => true,
            'can_export'          => true,
            'rewrite'             => true,
            'capability_type'     => 'post',
            'supports'            => array(
                'title',
                'editor',
                'author',
                'thumbnail',
                'excerpt',
                'comments',
                'revisions',
                'page-attributes',
                'post-formats',
            ),
        );

        register_post_type( 'trekking', $args );

        $labels = array(
            'name'               => __( 'Travel Guides', 'iceberg_travel' ),
            'singular_name'      => __( 'Travel Guide', 'iceberg_travel' ),
            'add_new'            => _x( 'Add New Travel Guide', 'iceberg_travel' ),
            'add_new_item'       => __( 'Add New Travel Guide', 'iceberg_travel' ),
            'edit_item'          => __( 'Edit Travel Guide', 'iceberg_travel' ),
            'new_item'           => __( 'New Travel Guide', 'iceberg_travel' ),
            'view_item'          => __( 'View Travel Guide', 'iceberg_travel' ),
            'search_items'       => __( 'Search Travel Guides', 'iceberg_travel' ),
            'not_found'          => __( 'No Travel Guides found', 'iceberg_travel' ),
            'not_found_in_trash' => __( 'No Travel Guides found in Trash', 'iceberg_travel' ),
            'parent_item_colon'  => __( 'Parent Travel Guide:', 'iceberg_travel' ),
            'menu_name'          => __( 'Travel Guides', 'iceberg_travel' ),
        );

        $args = array(
            'labels'              => $labels,
            'hierarchical'        => false,
            'description'         => 'description',
            'taxonomies'          => array(),
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => null,
            'menu_icon'           => 'dashicons-businessman',
            'show_in_nav_menus'   => true,
            'publicly_queryable'  => true,
            'exclude_from_search' => false,
            'has_archive'         => true,
            'query_var'           => true,
            'can_export'          => true,
            'rewrite'             => true,
            'capability_type'     => 'post',
            'supports'            => array(
                'title',
                'editor',
                'author',
                'thumbnail',
                'excerpt',
                'comments',
                'revisions',
                'page-attributes',
                'post-formats',
            ),
        );

        register_post_type( 'travel-guide', $args );


        $labels = array(
            'name'               => __( 'Booking Lists', 'iceberg_travel' ),
            'singular_name'      => __( 'Booking List', 'iceberg_travel' ),
            'add_new'            => _x( 'Add New Booking List', 'iceberg_travel' ),
            'add_new_item'       => __( 'Add New Booking List', 'iceberg_travel' ),
            'edit_item'          => __( 'Edit Booking List', 'iceberg_travel' ),
            'new_item'           => __( 'New Booking List', 'iceberg_travel' ),
            'view_item'          => __( 'View Booking List', 'iceberg_travel' ),
            'search_items'       => __( 'Search Booking Lists', 'iceberg_travel' ),
            'not_found'          => __( 'No Booking Lists found', 'iceberg_travel' ),
            'not_found_in_trash' => __( 'No Booking Lists found in Trash', 'iceberg_travel' ),
            'parent_item_colon'  => __( 'Parent Booking List:', 'iceberg_travel' ),
            'menu_name'          => __( 'Booking Lists', 'iceberg_travel' ),
        );

        $args = array(
            'labels'              => $labels,
            'hierarchical'        => false,
            'description'         => 'description',
            'taxonomies'          => array(),
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => null,
            'menu_icon'           => 'dashicons-calendar',
            'show_in_nav_menus'   => true,
            'publicly_queryable'  => true,
            'exclude_from_search' => false,
            'has_archive'         => true,
            'query_var'           => true,
            'can_export'          => true,
            'rewrite'             => true,
            'capability_type'     => 'post',
            'capabilities' => array(
                'create_posts' => 'do_not_allow', // false < WP 4.5, credit @Ewout
            ),
            'map_meta_cap' => true,
            'supports'            => array(
                'title',
                'author',
            ),
        );

        register_post_type( 'booking-list', $args );


    $labels = array(
        'name'               => __( 'Before Bookings', 'iceberg_travel' ),
        'singular_name'      => __( 'Before Booking', 'iceberg_travel' ),
        'add_new'            => _x( 'Add New Before Booking', 'iceberg_travel' ),
        'add_new_item'       => __( 'Add New Before Booking', 'iceberg_travel' ),
        'edit_item'          => __( 'Edit Before Booking', 'iceberg_travel' ),
        'new_item'           => __( 'New Before Booking', 'iceberg_travel' ),
        'view_item'          => __( 'View Before Booking', 'iceberg_travel' ),
        'search_items'       => __( 'Search Before Booking', 'iceberg_travel' ),
        'not_found'          => __( 'No Before Booking found', 'iceberg_travel' ),
        'not_found_in_trash' => __( 'No Before Booking found in Trash', 'iceberg_travel' ),
        'parent_item_colon'  => __( 'Parent Before Booking:', 'iceberg_travel' ),
        'menu_name'          => __( 'Before Booking', 'iceberg_travel' ),
    );

    $args = array(
        'labels'              => $labels,
        'hierarchical'        => false,
        'description'         => 'description',
        'taxonomies'          => array(),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => null,
        'menu_icon'           => 'dashicons-list-view',
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'has_archive'         => true,
        'query_var'           => true,
        'can_export'          => true,
        'rewrite'             => true,
        'capability_type'     => 'post',
        'supports'            => array(
            'title',
            'editor',
            'author',
            'thumbnail',
        ),
    );

        register_post_type('before-booking-trip',$args);

    $labels = array(
        'name'               => __( 'Quick Forms', 'iceberg_travel' ),
        'singular_name'      => __( 'Quick Form', 'iceberg_travel' ),
        'edit_item'          => __( 'Edit Form', 'iceberg_travel' ),
        'new_item'           => __( 'New Form', 'iceberg_travel' ),
        'view_item'          => __( 'View Form', 'iceberg_travel' ),
        'search_items'       => __( 'Search Form', 'iceberg_travel' ),
        'not_found'          => __( 'No Form found', 'iceberg_travel' ),
        'not_found_in_trash' => __( 'No Form found in Trash', 'iceberg_travel' ),
        'parent_item_colon'  => __( 'Parent Tour:', 'iceberg_travel' ),
        'menu_name'          => __( 'Quick Form', 'iceberg_travel' ),

    );

    $args = array(
        'labels'              => $labels,
        'hierarchical'        => true,
        'description'         => 'description',
        'taxonomies'          => array(),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => null,
        'menu_icon'           => 'dashicons-format-aside',
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'has_archive'         => true,
        'query_var'           => true,
        'can_export'          => true,
        'rewrite'             => true,
        'capability_type' => 'post',
        'capabilities' => array(
            'create_posts' => 'do_not_allow', // false < WP 4.5, credit @Ewout
        ),
        'map_meta_cap' => true,

        'supports'            => array(
            'title',
            'editor',
            'post-formats',
        ),
    );

    register_post_type( 'quick-form', $args );

    $labels = array(
        'name'               => __( 'Contacts', 'iceberg_travel' ),
        'singular_name'      => __( 'Contact', 'iceberg_travel' ),
        'add_new'            => _x( 'Add New Contact', 'iceberg_travel' ),
        'add_new_item'       => __( 'Add New Contact', 'iceberg_travel' ),
        'edit_item'          => __( 'Edit Contact', 'iceberg_travel' ),
        'new_item'           => __( 'New Contact', 'iceberg_travel' ),
        'view_item'          => __( 'View Contact', 'iceberg_travel' ),
        'search_items'       => __( 'Search Contacts', 'iceberg_travel' ),
        'not_found'          => __( 'No Contacts found', 'iceberg_travel' ),
        'not_found_in_trash' => __( 'No Contacts found in Trash', 'iceberg_travel' ),
        'parent_item_colon'  => __( 'Parent Contact:', 'iceberg_travel' ),
        'menu_name'          => __( 'Contacts', 'iceberg_travel' ),

    );

    $args = array(
        'labels'              => $labels,
        'hierarchical'        => false,
        'description'         => 'description',
        'taxonomies'          => array(),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => null,
        'menu_icon'           => 'dashicons-email-alt',
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'has_archive'         => true,
        'query_var'           => true,
        'can_export'          => true,
        'rewrite'             => true,
        'capability_type'     => 'post',
        'capabilities' => array(
            'create_posts' => 'do_not_allow', // false < WP 4.5, credit @Ewout
        ),
        'map_meta_cap' => true,
        'supports'            => array(
            'title',
            'editor',
            'author',
        ),
    );

    register_post_type( 'contact', $args );

}

	add_action( 'init', 'register_post_type_custom' );

