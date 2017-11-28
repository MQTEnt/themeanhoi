<?php
/**
 * Load scripts.
 */
function feature_widget_script($hook) {

    global $wp_customize;

    if ( 'widgets.php' === $hook || isset( $wp_customize ) ) {
        //Script media (Image) has already included in Intro widget

        wp_register_style('icon', get_template_directory_uri().'/fonts/icon-7-stroke/css/pe-icon-7-stroke.css', 'all');
        wp_enqueue_style('icon');

        wp_register_style('feature_widget_css', get_template_directory_uri().'/widgets/feature/css/style.css', 'all');
        wp_enqueue_style('feature_widget_css');
    }

}
add_action( 'admin_enqueue_scripts', 'feature_widget_script' );


/**
 * Feature Widget
 */
class Feature_Widget extends WP_Widget {
    // Holds widget settings defaults, populated in constructor.
    protected $defaults;

    // Constructor. Set the default widget options and create widget.
    function __construct() {

        $this->defaults = array(
            'title' => '',
            'content' => '',
            'image' => '',

            'title_1'=> '',
            'icon_1' => '',
            'content_1' => '',

            'title_2'=> '',
            'icon_2' => '',
            'content_2' => '',

            'title_3'=> '',
            'icon_3' => '',
            'content_3' => '',

            'title_4'=> '',
            'icon_4' => '',
            'content_4' => ''
        );

        $widget_ops = array(
            'classname'   => 'tmq-feature-widget',
            'description' => __( 'Display Feature widget ', 'tmq' ),
        );

        $control_ops = array(
            'id_base' => 'tmq-feature-widget',
            'width'   => 200,
            'height'  => 250,
        );

        parent::__construct( 'tmq-feature-widget', __( 'Feature Widget', 'tmq' ), $widget_ops, $control_ops );

    }

    // The widget content.
    function widget( $args, $instance ) {

        //* Merge with defaults
        $instance = wp_parse_args( (array) $instance, $this->defaults );

        echo $args['before_widget'];
        // echo ( ! empty( $instance['title'] ) )?$instance['title'].'<br>':'None<br>';
        ?>
        <!-- /.feature section -->
        <div id="feature">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center feature-title">

                        <!-- /.feature title -->
                        <h2><?php echo ( ! empty( $instance['title'] ) )?$instance['title']:''; ?></h2>
                        <p><?php echo $instance['content']; ?></p>
                    </div>
                </div>
                <div class="row row-feat">
                    <div class="col-md-4 text-center">
                        <!-- /.feature image -->
                        <?php
                            if(! empty( $instance['image'] )):
                        ?>
                            <div class="feature-img">
                                <img src="<?php echo $instance['image']; ?>" alt="image" class="img-responsive wow fadeInLeft">
                            </div>
                        <?php 
                            endif;
                        ?>
                    </div>

                    <div class="col-md-8">

                        <!-- /.feature 1 -->
                        <div class="col-sm-6 feat-list">
                            <i class="pe-7s-<?php echo $instance['icon_1']; ?> pe-5x pe-va wow fadeInUp"></i>
                            <div class="inner">
                                <h4><?php echo $instance['title_1']; ?></h4>
                                <p><?php echo $instance['content_1']; ?></p>
                            </div>
                        </div>

                        <!-- /.feature 2 -->
                        <div class="col-sm-6 feat-list">
                            <i class="pe-7s-<?php echo $instance['icon_2']; ?> pe-5x pe-va wow fadeInUp"></i>
                            <div class="inner">
                                <h4><?php echo $instance['title_2']; ?></h4>
                                <p><?php echo $instance['content_2']; ?></p>
                            </div>
                        </div>

                        <!-- /.feature 3 -->
                        <div class="col-sm-6 feat-list">
                            <i class="pe-7s-<?php echo $instance['icon_3']; ?> pe-5x pe-va wow fadeInUp"></i>
                            <div class="inner">
                                <h4><?php echo $instance['title_3']; ?></h4>
                                <p><?php echo $instance['content_3']; ?></p>
                            </div>
                        </div>

                        <!-- /.feature 4 -->
                        <div class="col-sm-6 feat-list">
                            <i class="pe-7s-<?php echo $instance['icon_4']; ?> pe-5x pe-va wow fadeInUp"></i>
                            <div class="inner">
                                <h4><?php echo $instance['title_4']; ?></h4>
                                <p><?php echo $instance['content_4']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        echo $args['after_widget'];
    }

    // Update a particular instance.
    function update( $new_instance, $old_instance ) {
        $new_instance['title']  = strip_tags( $new_instance['title'] );
        $new_instance['content']  = strip_tags( $new_instance['content'] );
        $new_instance['image']  = strip_tags( $new_instance['image'] );

        $new_instance['title_1']  = strip_tags( $new_instance['title_1'] );
        $new_instance['icon_1']  = strip_tags( $new_instance['icon_1'] );
        $new_instance['content_1']  = strip_tags( $new_instance['content_1'] );

        $new_instance['title_2']  = strip_tags( $new_instance['title_2'] );
        $new_instance['icon_2']  = strip_tags( $new_instance['icon_2'] );
        $new_instance['content_2']  = strip_tags( $new_instance['content_2'] );

        $new_instance['title_3']  = strip_tags( $new_instance['title_3'] );
        $new_instance['icon_3']  = strip_tags( $new_instance['icon_3'] );
        $new_instance['content_3']  = strip_tags( $new_instance['content_3'] );

        $new_instance['title_4']  = strip_tags( $new_instance['title_4'] );
        $new_instance['icon_4']  = strip_tags( $new_instance['icon_4'] );
        $new_instance['content_4']  = strip_tags( $new_instance['content_4'] );
        return $new_instance;
    }

    // The settings update form.
    function form( $instance ) {
        $icons = [
            'notebook' => '&#xe62b;',
            'cash' => '&#xe68c;',
            'cart' => '&#xe66e;',
            'users' => '&#xe693;',
            'angle-down-circle' => '&#xe689;',
            'ticket' => '&#xe60c;',
            'star' => '&#xe611;',
            'home' => '&#xe648;',
            'gift' => '&#xe652;',
            'like2' => '&#xe6a1;',
            'piggy' => '&#xe6c0;'
        ];
        // Merge with defaults
        $instance = wp_parse_args( (array) $instance, $this->defaults );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'tmq' ); ?>:</label>
            <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'content' ); ?>"><?php _e( 'Content', 'tmq' ); ?>:</label>
            <textarea id="<?php echo $this->get_field_id( 'content' ); ?>" rows="5" cols="50" name="<?php echo $this->get_field_name( 'content' ); ?>" class="widefat"><?php echo esc_attr( $instance['content'] ); ?></textarea>
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

        <div class="feature-widget-item">
            <p>
                <label for="<?php echo $this->get_field_id( 'title_1' ); ?>"><?php _e( 'Title 1', 'tmq' ); ?>:</label>
                <input type="text" id="<?php echo $this->get_field_id( 'title_1' ); ?>" name="<?php echo $this->get_field_name( 'title_1' ); ?>" value="<?php echo esc_attr( $instance['title_1'] ); ?>" class="widefat" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'icon_1' ); ?>"><?php _e( 'Icon 1', 'tmq' ); ?>:</label>
                <select class="feature-widget-select" id="<?php echo $this->get_field_id( 'icon_1' ); ?>" name="<?php echo $this->get_field_name( 'icon_1' ); ?>">
                    <?php 
                        foreach ($icons as $key => $value) {
                            if($key == esc_attr( $instance['icon_1']))
                                echo '<option value="'.$key.'" selected> '.$value.' </option>';
                            else
                                echo '<option value="'.$key.'"> '.$value.' </option>';
                        }
                    ?>
                </select>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'content_1' ); ?>"><?php _e( 'Content 1', 'tmq' ); ?>:</label>
               <textarea id="<?php echo $this->get_field_id( 'content_1' ); ?>" rows="5" cols="50" name="<?php echo $this->get_field_name( 'content_1' ); ?>" class="widefat"><?php echo esc_attr( $instance['content_1'] ); ?></textarea>
            </p>
        </div>

        <div class="feature-widget-item">
            <p>
                <label for="<?php echo $this->get_field_id( 'title_2' ); ?>"><?php _e( 'Title 2', 'tmq' ); ?>:</label>
                <input type="text" id="<?php echo $this->get_field_id( 'title_2' ); ?>" name="<?php echo $this->get_field_name( 'title_2' ); ?>" value="<?php echo esc_attr( $instance['title_2'] ); ?>" class="widefat" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'icon_2' ); ?>"><?php _e( 'Icon 2', 'tmq' ); ?>:</label>
                <select class="feature-widget-select" id="<?php echo $this->get_field_id( 'icon_2' ); ?>" name="<?php echo $this->get_field_name( 'icon_2' ); ?>">
                    <?php 
                        foreach ($icons as $key => $value) {
                            if($key == esc_attr( $instance['icon_2']))
                                echo '<option value="'.$key.'" selected> '.$value.' </option>';
                            else
                                echo '<option value="'.$key.'"> '.$value.' </option>';
                        }
                    ?>
                </select>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'content_2' ); ?>"><?php _e( 'Content 2', 'tmq' ); ?>:</label>
               <textarea id="<?php echo $this->get_field_id( 'content_2' ); ?>" rows="5" cols="50" name="<?php echo $this->get_field_name( 'content_2' ); ?>" class="widefat"><?php echo esc_attr( $instance['content_2'] ); ?></textarea>
            </p>
        </div>

        <div class="feature-widget-item">
            <p>
                <label for="<?php echo $this->get_field_id( 'title_3' ); ?>"><?php _e( 'Title 3', 'tmq' ); ?>:</label>
                <input type="text" id="<?php echo $this->get_field_id( 'title_3' ); ?>" name="<?php echo $this->get_field_name( 'title_3' ); ?>" value="<?php echo esc_attr( $instance['title_3'] ); ?>" class="widefat" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'icon_3' ); ?>"><?php _e( 'Icon 3', 'tmq' ); ?>:</label>
                <select class="feature-widget-select" id="<?php echo $this->get_field_id( 'icon_3' ); ?>" name="<?php echo $this->get_field_name( 'icon_3' ); ?>">
                    <?php 
                        foreach ($icons as $key => $value) {
                            if($key == esc_attr( $instance['icon_3']))
                                echo '<option value="'.$key.'" selected> '.$value.' </option>';
                            else
                                echo '<option value="'.$key.'"> '.$value.' </option>';
                        }
                    ?>
                </select>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'content_3' ); ?>"><?php _e( 'Content 3', 'tmq' ); ?>:</label>
               <textarea id="<?php echo $this->get_field_id( 'content_3' ); ?>" rows="5" cols="50" name="<?php echo $this->get_field_name( 'content_3' ); ?>" class="widefat"><?php echo esc_attr( $instance['content_3'] ); ?></textarea>
            </p>
        </div>

        <div class="feature-widget-item">
            <p>
                <label for="<?php echo $this->get_field_id( 'title_4' ); ?>"><?php _e( 'Title 4', 'tmq' ); ?>:</label>
                <input type="text" id="<?php echo $this->get_field_id( 'title_4' ); ?>" name="<?php echo $this->get_field_name( 'title_4' ); ?>" value="<?php echo esc_attr( $instance['title_4'] ); ?>" class="widefat" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'icon_4' ); ?>"><?php _e( 'Icon 4', 'tmq' ); ?>:</label>
                <select class="feature-widget-select" id="<?php echo $this->get_field_id( 'icon_4' ); ?>" name="<?php echo $this->get_field_name( 'icon_4' ); ?>">
                    <?php 
                        foreach ($icons as $key => $value) {
                            if($key == esc_attr( $instance['icon_4']))
                                echo '<option value="'.$key.'" selected> '.$value.' </option>';
                            else
                                echo '<option value="'.$key.'"> '.$value.' </option>';
                        }
                    ?>
                </select>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'content_4' ); ?>"><?php _e( 'Content 4', 'tmq' ); ?>:</label>
               <textarea id="<?php echo $this->get_field_id( 'content_4' ); ?>" rows="5" cols="50" name="<?php echo $this->get_field_name( 'content_4' ); ?>" class="widefat"><?php echo esc_attr( $instance['content_4'] ); ?></textarea>
            </p>
        </div>
        <?php

    }

}


/**
 * Register Widget
 */
function register_feature_widget() { 
  
    register_widget( 'Feature_Widget' ); 

} 
add_action( 'widgets_init','register_feature_widget' );
