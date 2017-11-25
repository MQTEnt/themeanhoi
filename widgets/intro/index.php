<?php
/**
 * Load scripts.
 */
function intro_widget_script($hook) {

    global $wp_customize;

    if ( 'widgets.php' === $hook || isset( $wp_customize ) ) {

        wp_enqueue_media();
        wp_register_script('image_widget_js', get_template_directory_uri().'/widgets/intro/js/script.js', ['jquery'], false, true);
        wp_enqueue_script('image_widget_js');

        wp_register_style('image_widget_css', get_template_directory_uri().'/widgets/intro/css/style.css', 'screen');
        wp_enqueue_style('image_widget_css');
    }

}
add_action( 'admin_enqueue_scripts', 'intro_widget_script' );


/**
 * Intro Widget
 */
class Intro_Widget extends WP_Widget {

    // Holds widget settings defaults, populated in constructor.
    protected $defaults;

    // Constructor. Set the default widget options and create widget.
    function __construct() {

        $this->defaults = array(
            'title' => '',
            'image' => '',
            'link'  => '',
        );

        $widget_ops = array(
            'classname'   => 'tmq-media-widget',
            'description' => __( 'Display Intro widget ', 'tmq' ),
        );

        $control_ops = array(
            'id_base' => 'tmq-media-widget',
            'width'   => 200,
            'height'  => 250,
        );

        parent::__construct( 'tmq-media-widget', __( 'Intro Widget', 'tmq' ), $widget_ops, $control_ops );

    }

    // The widget content.
    function widget( $args, $instance ) {

        //* Merge with defaults
        $instance = wp_parse_args( (array) $instance, $this->defaults );

        echo $args['before_widget'];

            if ( ! empty( $instance['title'] ) )
                echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $args['after_title'];

            echo ( ! empty( $instance['link'] ) ) ? '<a href="' . $instance['link'] . '">' : '';

            echo ( ! empty( $instance['image'] ) ) ? '<img src="' . $instance['image'] . '" alt="" />' : '';

            echo ( ! empty( $instance['link'] ) ) ? '</a>' : '';

        echo $args['after_widget'];

    }

    // Update a particular instance.
    function update( $new_instance, $old_instance ) {

        $new_instance['title']  = strip_tags( $new_instance['title'] );
        $new_instance['image']  = strip_tags( $new_instance['image'] );
        $new_instance['link']   = strip_tags( $new_instance['link'] );

        return $new_instance;

    }

    // The settings update form.
    function form( $instance ) {

        // Merge with defaults
        $instance = wp_parse_args( (array) $instance, $this->defaults );

        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'tmq' ); ?>:</label>
            <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'Image', 'tmq' ); ?>:</label>
            <div class="tmq-media-container">
                <div class="tmq-media-inner">
                    <?php $img_style = ( $instance[ 'image' ] != '' ) ? '' : 'style="display:none;"'; ?>
                    <img id="<?php echo $this->get_field_id( 'image' ); ?>-preview" src="<?php echo esc_attr( $instance['image'] ); ?>" <?php echo $img_style; ?> />
                    <?php $no_img_style = ( $instance[ 'image' ] != '' ) ? 'style="display:none;"' : ''; ?>
                    <span class="tmq-no-image" id="<?php echo $this->get_field_id( 'image' ); ?>-noimg" <?php echo $no_img_style; ?>><?php _e( 'No image selected', 'tmq' ); ?></span>
                </div>
            
            <input type="text" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" value="<?php echo esc_attr( $instance['image'] ); ?>" class="tmq-media-url" />

            <input type="button" value="<?php echo _e( 'Remove', 'tmq' ); ?>" class="button tmq-media-remove" id="<?php echo $this->get_field_id( 'image' ); ?>-remove" <?php echo $img_style; ?> />

            <?php $button_text = ( $instance[ 'image' ] != '' ) ? __( 'Change Image', 'tmq' ) : __( 'Select Image', 'tmq' ); ?>
            <input type="button" value="<?php echo $button_text; ?>" class="button tmq-media-upload" id="<?php echo $this->get_field_id( 'image' ); ?>-button" />
            <br class="clear">
            </div>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e( 'URL', 'tmq' ); ?>:</label>
            <input type="text" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" value="<?php echo esc_attr( $instance['link'] ); ?>" class="widefat" />
        </p>

        <?php

    }

}


/**
 * Register Widget
 */
function register_intro_widget() { 
  
    register_widget( 'Intro_Widget' ); 

} 
add_action( 'widgets_init','register_intro_widget' );
