<?php

// Register and load the widget
function wpb_load_widget() {
    register_widget( 'support_partner_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );

// Creating the widget
class support_partner_widget extends WP_Widget {

    function __construct() {
        parent::__construct(

// Base ID of your widget
            'support_partner_widget',


// Widget name will appear in UI
            __('Support_Partner Widget', 'iceberg_travel'),

// Widget description
            array( 'description' => __( 'Widget for the footer menu to display the supportive partner of the Company', 'iceberg_travel' ), )
        );
    }

// Creating widget front-end

    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );

// before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
        echo __( 'Hello, World!', 'wpb_widget_domain' );
        echo $args['after_widget'];
    }

// Widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'New title', 'iceberg_travel' );
        }
        if ( isset( $instance[ 'icon' ] ) ) {
            $icon = $instance[ 'icon' ];
        }
        else {
            $icon = __( 'New Icon', 'iceberg_travel' );
        }
// Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="partner_title" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'icon' ); ?>"><?php _e( 'Icon:' ); ?></label>
            <input class="partner_icon" id="<?php echo $this->get_field_id( 'icon' ); ?>" name="<?php echo $this->get_field_name( 'icon' ); ?>" type="file" value="<?php echo esc_attr( $icon ); ?>" />
        </p>
        <?php
    }

// Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['icon'] = ( ! empty( $new_instance['icon'] ) ) ? strip_tags( $new_instance['icon'] ) : '';

        return $instance;
    }
} // Class wpb_widget ends here
