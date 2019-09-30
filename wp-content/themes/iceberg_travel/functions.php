<?php
/**
 * iceberg_travel functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package iceberg_travel
 */
 

/**
 * custom added code
 */
 
// remove_filter( 'the_content', 'wpautop' );
// remove_filter( 'the_excerpt', 'wpautop' );

// 	function WP_auto_formatting($content) {
//         global $post;
//         if(get_post_meta($post->ID, 'disable_auto_formatting', true) == 1) {
//             remove_filter('the_content', 'wpautop');
//         }
//         return $content;   
//     }
//     add_filter( "the_content", "WP_auto_formatting", 1 );
/**
 * end of custom added code
 */    
 

if ( ! function_exists( 'iceberg_travel_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function iceberg_travel_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on iceberg_travel, use a find and replace
		 * to change 'iceberg_travel' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'iceberg_travel', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'iceberg_travel' ),
            'primary_menu'=>esc_html__('Top Header', 'iceberg_travel'),
            'secondary_menu'=> esc_html('Breadcumb _Header', 'iceberg_travel'),
            'activity_menu'=> esc_html('Activity', 'iceberg_travel'),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'iceberg_travel_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );


	}
endif;
add_action( 'after_setup_theme', 'iceberg_travel_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function iceberg_travel_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'iceberg_travel_content_width', 640 );
}
add_action( 'after_setup_theme', 'iceberg_travel_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function iceberg_travel_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'iceberg_travel' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'iceberg_travel' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    register_sidebar(array(
            'name'          => esc_html__( 'Footer', 'iceberg_travel' ),
            'id'            => 'footer-1',
            'description'   => esc_html__( 'Add widgets here.', 'iceberg_travel' ),
            'before_widget' => '<li>',
            'after_widget'  => '</li>',

        )
    );
    register_sidebar(array(
            'name'          => esc_html__( 'Footer Part 1', 'iceberg_travel' ),
            'id'            => 'footer-part-1',
            'description'   => esc_html__( 'Add widgets here.', 'iceberg_travel' ),
            'before_widget' => '<li>',
            'after_widget'  => '</li>',

        )
    );
    register_sidebar(array(
            'name'          => esc_html__( 'Footer Part 2', 'iceberg_travel' ),
            'id'            => 'footer-part-2',
            'description'   => esc_html__( 'Add widgets here.', 'iceberg_travel' ),
            'before_widget' => '<li>',
            'after_widget'  => '</li>',

        )
    );
    register_sidebar(array(
            'name'          => esc_html__( 'Footer Part 3', 'iceberg_travel' ),
            'id'            => 'footer-part-3',
            'description'   => esc_html__( 'Add widgets here.', 'iceberg_travel' ),
            'before_widget' => '<li>',
            'after_widget'  => '</li>',

        )
    );
    register_sidebar(array(
            'name'          => esc_html__( 'Footer Part 4', 'iceberg_travel' ),
            'id'            => 'footer-part-4',
            'description'   => esc_html__( 'Add widgets here.', 'iceberg_travel' ),
            'before_widget' => '<li>',
            'after_widget'  => '</li>',

        )
    );
    register_sidebar(array(
            'name'          => esc_html__( 'Social Icon', 'iceberg_travel' ),
            'id'            => 'social-icon',
            'description'   => esc_html__( 'Add widgets here.', 'iceberg_travel' ),
            'before_widget' => '<li>',
            'after_widget'  => '</li>',

        )
    );
}
add_action( 'widgets_init', 'iceberg_travel_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function iceberg_travel_scripts() {
	wp_enqueue_style( 'iceberg_travel-style', get_stylesheet_uri() );

	wp_enqueue_script( 'iceberg_travel-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'iceberg_travel-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
    wp_enqueue_style('home-style',get_template_directory_uri().'/css/duck.css');
    wp_enqueue_style('home-style1',get_template_directory_uri().'/css/duckmain.css');
    wp_enqueue_style('jquery-UiCss',get_template_directory_uri().'/css/jquery-ui.css');
    wp_enqueue_style('home-stl',get_template_directory_uri().'/css/duck1.css');
    wp_enqueue_style('bxslider-css',get_template_directory_uri().'/css/jquery.bxslider.css');
    wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui.js');
    wp_enqueue_script('bxslider-js', get_template_directory_uri() . '/js/jquery.bxslider.js');
    wp_enqueue_script('home-script4', get_template_directory_uri() . '/js/common.js');
    
    if(is_single()) {
        wp_enqueue_style('home-style3', get_template_directory_uri() . '/css/simpleLightbox.css');
        wp_enqueue_script('home-script', get_template_directory_uri() . '/js/simpleLightbox.min.js');
        wp_enqueue_script('jquery-cookies', get_template_directory_uri() . '/js/jquery-cookies.js');
    }
}
add_action( 'wp_enqueue_scripts', 'iceberg_travel_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}


/**
 * filter to choose template (Template Chooser)
 */

function template_chooser( $template ){
    global $wp_query;
    $post_type = get_query_var('post_type');
    if( $wp_query->is_search && $post_type == 'tour' ){
        return locate_template('archive-tour.php');  //  redirect to archive-search.php
    }  elseif($wp_query->is_search && $post_type='trekking'){
        return locate_template('archive-trekking.php');  //  redirect to archive-search.php

    }
    return $template;
}
add_filter( 'template_include', 'template_chooser' );

/**
 *  Search Result title filter
*/

function title_filter($where, &$wp_query){
    global $wpdb;
    if($search_term = $wp_query->get( 'title_filter' )){
        $search_term = $wpdb->esc_like($search_term); //instead of esc_sql()
        $search_term = ' \'%' . $search_term . '%\'';
        $title_filter_relation = (strtoupper($wp_query->get( 'title_filter_relation'))=='OR' ? 'OR' : 'AND');
        $where .= ' '.$title_filter_relation.' ' . $wpdb->posts . '.post_title LIKE '.$search_term;
    }
    return $where;
}
add_filter('posts_where','title_filter',10,2);

/**
 * Require items
*/
 require_once get_template_directory().'/inc/custom-post-type.php';
 require_once  get_template_directory().'/inc/custom-taxonomy.php';
 require_once get_template_directory().'/inc/support-partner.php';

function wpdocs_enqueue_custom_admin_style() {
    if (!is_page('widgets') ) {
        wp_enqueue_script('admin-script2', get_template_directory_uri() . '/js/ckeditor/ckeditor.js');
        wp_enqueue_script('admin-script3', get_template_directory_uri() . '/js/ckeditor/config.js');
        wp_enqueue_script('admin-script1', get_template_directory_uri() . '/js/ckeditor/styles.js');
    }
}
add_action( 'admin_enqueue_scripts','wpdocs_enqueue_custom_admin_style' );

add_action( 'add_meta_boxes', 'cd_meta_box_add' );
function cd_meta_box_add()
{
    add_meta_box( 'form_type', 'Form Type', 'view_form_type', 'quick-form', 'normal', 'high' );
    add_meta_box( 'name', 'Name', 'view_name', 'quick-form', 'normal', 'high' );
    add_meta_box( 'email', 'Email', 'view_email', 'quick-form', 'normal', 'high' );
    add_meta_box( 'contactno', 'Contact No.', 'view_contact', 'quick-form', 'normal', 'high' );
    add_meta_box( 'name', 'Name', 'view_name', 'contact', 'normal', 'high' );
    add_meta_box( 'email', 'Email', 'view_email', 'contact', 'normal', 'high' );
    add_meta_box( 'contact', 'Phone No.', 'view_contact', 'contact', 'normal', 'high' );


}

function view_form_type(){
    global $post;

    //$contact = get_post_meta( get_the_id(), 'contact',true);
    $quick_form_type = get_the_terms(  $post, 'quick-form-type');
    if(!empty($quick_form_type)):
        foreach ($quick_form_type as $quick_form_types):
            $form_type= $quick_form_types->name;
        endforeach;
    endif;

    ?>
    <table>
        <?php
        if(!empty($form_type)):
            ?>
            <tr>
                <td>Quick Form Type:</td>
                <td><?php echo $form_type;?></td>
            </tr>

            <?php
        endif;
        ?>
    </table>
    <?php

}
function view_name(){
    global $post;


    $name = get_post_meta( get_the_id(), 'name',true);

    ?>
    <table>

        <?php
        if(!empty($name)):
            ?>
            <tr>
                <td>Full Name:</td>
                <td><?php echo $name; ?></td>
            </tr>
            <?php
        endif;
        ?>
    </table>
    <?php

}
function view_email(){
    global $post;

    $email = get_post_meta( get_the_id(), 'email',true);


    ?>
    <table>

        <?php
        if(!empty($email)):
            ?>
            <tr>
                <td>Email:</td>
                <td><?php echo $email; ?></td>
            </tr>
            <?php
        endif;
        ?>

    </table>
    <?php

}
function view_contact(){
    global $post;
    $contact = get_post_meta( get_the_id(), 'contactno',true);

    ?>
    <table>

        <?php
        if(!empty($contact)):
            ?>
            <tr>
                <td>Contact No.:</td>
                <td><?php echo $contact; ?></td>
            </tr>
            <?php
        endif;
        ?>

    </table>
    <?php

}



add_filter('manage_quick-form_posts_columns', 'bs_event_table_head');
function bs_event_table_head( $defaults ) {
    $defaults['form_type']  = 'Form Type';
    // $defaults['venue']   = 'Venue';
    // $defaults['author'] = 'Added By';
    return $defaults;
}

add_action( 'manage_quick-form_posts_custom_column', 'bs_event_table_content', 10, 2 );

function bs_event_table_content( $column_name, $post_id )
{
    if ($column_name == 'form_type') {
        $quick_form_type = get_the_terms(  $post_id, 'quick-form-type');
        if(!empty($quick_form_type)):
        foreach ($quick_form_type as $quick_form_types):
        echo  $quick_form_types->name;
        endforeach;
        endif;
    }
}

//function wpse_setup_theme() {
//    add_theme_support( 'post-thumbnails' );
//    if (function_exists('add_image_size')) {
//
//        add_image_size('blog_big', 736, 352, false);
//        add_image_size('blog_small', 352, 352, false);
//    }
//}
//
//add_action( 'after_setup_theme', 'wpse_setup_theme' );

add_action( 'add_meta_boxes', 'meta_box_add_booking' );
function meta_box_add_booking(){
    add_meta_box( 'booking-status', 'Booking Status', 'booking_status_view', 'booking-list', 'side', 'high' );

    add_meta_box('personal_details','Personal Details','personal_details_view','booking-list','normal','high');
//    add_meta_box( 'full_name', 'Full Name', 'fullname_view', 'booking-list', 'normal', 'high' );
//    add_meta_box( 'email', 'Email', 'email_view', 'booking-list', 'normal', 'high' );
//    add_meta_box( 'mobileno', ' Mobile Number', 'mobileno_view', 'booking-list', 'normal', 'high' );
//    add_meta_box( 'landline', 'Landline Number', 'landline_view', 'booking-list', 'normal', 'high' );
//    add_meta_box( 'dob', 'Date Of Birth', 'dob_view', 'booking-list', 'normal', 'high' );
//    add_meta_box( 'occupation', 'Occupation', 'occupation_view', 'booking-list', 'normal', 'high' );
//    add_meta_box( 'countryfrom', 'Country From', 'countryfrom_view', 'booking-list', 'normal', 'high' );
//    add_meta_box( 'address', 'Address', 'address_view', 'booking-list', 'normal', 'high' );

    add_meta_box( 'peopleno', 'People Number', 'peopleno_view', 'booking-list', 'normal', 'high' );

    add_meta_box('trip_details','Trip Details','trip_details_view','booking-list','normal','high');
//    add_meta_box( 'destination', 'Destination', 'destination_view', 'booking-list', 'normal', 'high' );
//    add_meta_box( 'activity', 'Activity', 'activity_view', 'booking-list', 'normal', 'high' );
//    add_meta_box( 'price', 'Price', 'price_view', 'booking-list', 'normal', 'high' );
//    add_meta_box( 'discount', 'Discount', 'discount_view', 'booking-list', 'normal', 'high' );

    add_meta_box( 'startdate', 'Start Date', 'startdate_view', 'booking-list', 'normal', 'high' );
    add_meta_box( 'enddate', 'End Date', 'enddate_view', 'booking-list', 'normal', 'high' );

}
function booking_status_view(){
    require_once get_template_directory() . '/inc/booking_status_view.php';
}


function personal_details_view(){
    require_once get_template_directory() . '/inc/personal_details_view.php';
}

function peopleno_view(){
    require_once get_template_directory() . '/inc/peopleno_view.php';
}

function trip_details_view(){
    require_once get_template_directory() . '/inc/trip_details_view.php';
}

function startdate_view(){
    require_once get_template_directory() . '/inc/startdate_view.php';
}
function enddate_view($post){
    require_once get_template_directory() . '/inc/enddate_view.php';
}

add_action( 'save_post', 'cd_meta_box_save' );
function cd_meta_box_save( $post_id ){
    global $post;
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post',$post_id ) ) return;

    if( isset( $_POST['booking_status'] ) ){
        $booking_status = $_POST['booking_status'];
        // var_dump( $booking_status);
        // die();

        update_post_meta( $post_id, 'booking_status', $booking_status, false );
		if($booking_status==1){

        $to=get_field('email',$post_id);
        $subject='Booking Of '.get_the_title($post_id);
        $message='Your Booking have been approved for the further process.We will contact you for other process in your phone or in this email.
        If there is any queries regarding your booking and the trip,Please do contact us. You may contact us through mail and phone.
        e-mail:icebergtechnology@gmail.com
        contact no:9898989898';
       $sender_name='Travel Bird';
			$sender_mail='wordpress@travelbird.com.np';
        $headers='From: '. $sender_name .' <'. $sender_mail .'>' . "\r\n";
        $attachment='';
        $approve_sent=wp_mail(  $to, $subject, $message,$headers);
        
    }elseif ($booking_status==2){
        $to=get_field('email',$post_id);
        $subject='Booking Of '.get_the_title($post_id);
        $message='Your Booking have been rejected because of various reason.We will contact you for other process in your phone or in this email.
        If there is any queries regarding your booking and the trip,Please do contact us. You may contact us through mail and phone.
        e-mail:icebergtechnology@gmail.com
        contact no:9898989898';
			$sender_name='Travel Bird';
			$sender_mail='wordpress@travelbird.com.np';
        $headers='From: '. $sender_name .' <'. $sender_mail .'>' . "\r\n";
        $attachment='';
        $reject_sent=wp_mail(  $to, $subject, $message,$headers);
      
    }

    }

}

add_action( 'save_post', 'peopleno_save' );
function peopleno_save( $post_id ){
    global $post;
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post',$post_id ) ) return;

    if( isset( $_POST['peopleno'] ) ){
        $peopleno = $_POST['peopleno'];


        update_post_meta( $post_id, 'peopleno', $peopleno, false );

    }

}

add_action( 'save_post', 'sdate_save' );
function sdate_save( $post_id ){
    global $post;
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post',$post_id ) ) return;

    if( isset( $_POST['stdate'] ) ){
        $startdate = $_POST['stdate'];


        update_post_meta( $post_id, 'stdate', $startdate, false );

    }

}
add_action( 'save_post', 'edate_save' );
function edate_save( $post_id ){
    global $post;
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post',$post_id ) ) return;

    if( isset( $_POST['endate'] ) ){
        $enddate = $_POST['endate'];


        update_post_meta( $post_id, 'endate', $enddate, false );

    }

}

add_action( 'save_post', 'space_left' );
function space_left( $post_id ){
    global $post;

    $peopleno=0;
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post',$post_id ) ) return;
    $tripbook_type=get_post_meta($post_id,'tripbook_type',true);

    if($tripbook_type=='fixed') {

        $prebook_status=(int)get_post_meta($post_id,'booking_status');

        if ($_POST['booking_status'] == 1) {

            $peopleno = $_POST['peopleno'];

            $posid = get_post_field('pos_id', $post_id);
            $spacerow = get_post_field('spacerow', $post_id)-1;

            //$rows = get_post_meta($posid,'fixed_departure',false);
            $rows = get_field('fixed_departure', $posid); // get all the rows
            // get all the rows
            $specific_row = $rows[$spacerow]; // 0 will get the first row, remember that the count starts at 0
            $sub_field_value = $specific_row['max_people']; // get the sub field value
            $totalpeople = $sub_field_value - $peopleno;

           // update_sub_row('max_people', $totalpeople, $spacerow, $posid);
          // update_sub_field(array('fixed_departure',$spacerow,'max_people'), $totalpeople, $posid);
           update_post_meta( $posid, 'fixed_departure_'.$spacerow.'_max_people', $totalpeople );
        } elseif ($_POST['booking_status'] == 0 && $prebook_status== 1 ) {

            $peopleno = $_POST['peopleno'];

            $posid = get_post_field('pos_id', $post_id);
            $spacerow = get_post_field('spacerow', $post_id);
            $rows = get_field('fixed_departure', $posid); // get all the rows
            $specific_row = $rows[$spacerow]; // 0 will get the first row, remember that the count starts at 0
            $sub_field_value = $specific_row['max_people']; // get the sub field value

            $totalpeople = $sub_field_value + $peopleno;
          // update_sub_row('max_people', $totalpeople, $spacerow, $posid);
//            update_sub_field(array('max_people',$spacerow), $totalpeople, $posid);
            update_post_meta( $posid, 'fixed_departure_'.$spacerow.'_max_people', $totalpeople );
        }
     elseif ( $_POST['booking_status'] == 2 && $prebook_status==1) {

        $peopleno = $_POST['peopleno'];

        $posid = get_post_field('pos_id', $post_id);
        $spacerow = get_post_field('spacerow', $post_id);
        $rows = get_field('fixed_departure', $posid); // get all the rows
        $specific_row = $rows[$spacerow]; // 0 will get the first row, remember that the count starts at 0
        $sub_field_value = $specific_row['max_people']; // get the sub field value

        $totalpeople = $sub_field_value + $peopleno;
        // update_sub_row('max_people', $totalpeople, $spacerow, $posid);
//            update_sub_field(array('max_people',$spacerow), $totalpeople, $posid);
        update_post_meta( $posid, 'fixed_departure_'.$spacerow.'_max_people', $totalpeople );
    }

}

}

add_filter('manage_booking-list_posts_columns', 'headerlisttable');
function headerlisttable( $defaults ) {
    $defaults['full_name']  = 'Full Name';
    $defaults['status']    = 'Status';
    // $defaults['venue']   = 'Venue';
    // $defaults['author'] = 'Added By';
    return $defaults;
}

add_action( 'manage_booking-list_posts_custom_column', 'colbookname', 10, 2 );

function colbookname( $column_name, $post_id ) {
    if ($column_name == 'full_name') {
        $full_name = get_post_meta( $post_id, 'name', true );
        echo $full_name;
    }

    if ($column_name == 'status') {
        $status = get_post_meta( $post_id, 'booking_status', true );
        if( $status==1){
            // approved
            echo "<span style='background-color:#4CFBCB; color:#fff;padding: 5px; font-weight:bold'>Approved</span>";
        }else if( $status==2){
            // rejectd
            echo "<span style='background-color:#F24335; color:#fff;padding: 5px; font-weight:bold'>Rejected</span>";
        }else{
            // pending
            echo "<span style='background-color:#EEBD62; color:#fff;padding: 5px; font-weight:bold'>Pending</span>";
        }
    }


}


add_action( 'wp_enqueue_scripts', 'ajax_test_enqueue_scripts' );
function ajax_test_enqueue_scripts() {
//    wp_enqueue_script('mnth_script', get_template_directory_uri() . '/js/month_selector.js');

    wp_register_script( 'my_script_handles', get_template_directory_uri() . '/js/month_selector.js', array('jquery') );

    wp_enqueue_script( 'my_script_handles');
    wp_localize_script( 'my_script_handles', 'my_ajaxurl', array(
            'ajax_url'=>admin_url( 'admin-ajax.php' )) );

}

//add_action( 'init', 'my_script_enqueuer' );
//
//function my_script_enqueuer() {
//    wp_register_script( "my_voter_script", get_template_directory_uri() . '/js/month_selector.js', array('jquery') );
//    wp_localize_script( 'my_voter_script', 'my_ajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
//
//    wp_enqueue_script( 'jquery' );
//    wp_enqueue_script( 'my_voter_script' );
//
//}


add_action( 'wp_ajax_my_ajax_action', 'my_ajax_action_callback' );

add_action('wp-ajax_nopriv_my_ajax_action','my_ajax_action_callback');
/**
 * Ajax Callback
 */
function my_ajax_action_callback(){
    $monthrange = isset( $_POST['mnth'] ) ? $_POST['mnth'] : '';


 echo 'this is '.$monthrange;
// wp_reset_postdata();
    wp_die();
     // required. to end AJAX request.
}


add_action( 'wp_head', 'my_deregister_javascript', 100 );
function my_deregister_javascript() {
    if ( is_page('widgets') ) {
        wp_deregister_script( 'ckeditor' );
//        wp_dequeue_script('ckeditor');
    }
}

function admin_ckeditor_register(){
     //ckeditor script file call
    wp_enqueue_script('ckeditoradmin',get_template_directory_uri().'/js/customjs.js',array(),false,true);
// end of ckeditor script file call
}
 add_action( 'admin_enqueue_scripts', 'admin_ckeditor_register' );

//custom mail
add_filter('wp_mail_from','mailfrom');
add_filter('wp_mail_from_name','mailer_name');
function mailfrom(){
    $mailfrom="wordpress@travelbird.com.np";

    return $mailfrom;
}
function mailer_name(){
    $mailer_name="Travel Bird";
    return $mailer_name;
}




