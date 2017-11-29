<?php
/**
 * Load scripts.
 */
function testimonial_widget_script($hook) {

    global $wp_customize;

    if ( 'widgets.php' === $hook || isset( $wp_customize ) ) {
        //Style and Script have already included in Intro and Feature widget
    }

}
add_action( 'admin_enqueue_scripts', 'testimonial_widget_script' );


/**
 * Testimonial Widget
 */
class Testimonial_Widget extends WP_Widget {
    // Holds widget settings defaults, populated in constructor.
    protected $defaults;

    // Constructor. Set the default widget options and create widget.
    function __construct() {

        $this->defaults = array(
            'title' => '',

            'title_1' => '',
            'content_1' => '',
            'image_1' => '',
            'link_1'  => '',

            'title_2' => '',
            'content_2' => '',
            'image_2' => '',
            'link_2'  => '',

            'title_3' => '',
            'content_3' => '',
            'image_3' => '',
            'link_3'  => '',
        );

        $widget_ops = array(
            'classname'   => 'tmq-testimonial-widget',
            'description' => __( 'Display Testimonial widget ', 'tmq' ),
        );

        $control_ops = array(
            'id_base' => 'tmq-testimonial-widget',
            'width'   => 200,
            'height'  => 250,
        );

        parent::__construct( 'tmq-testimonial-widget', __( 'Testimonial Widget', 'tmq' ), $widget_ops, $control_ops );

    }

    // The widget content.
    function widget( $args, $instance ) {

        //* Merge with defaults
        $instance = wp_parse_args( (array) $instance, $this->defaults );

        echo $args['before_widget'];
        ?>
        <!-- /.testimonial section -->
        <div id="testi">
            <div class="container">
                <div class="text-center">
                    <h2 class="wow fadeInLeft"><?php echo $instance['title']; ?></h2>
                    <div class="title-line wow fadeInRight"></div>
                </div>
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1"> 
                        <div id="owl-testi" class="owl-carousel owl-theme wow fadeInUp">

                            <!-- /.testimonial 1 -->
                            <div class="testi-item">
                                <div class="client-pic text-center">
                                    <?php
                                        if(! empty( $instance['image_1'] )):
                                            echo '<a href="'.$instance['link_1'].'">';
                                            echo "<img src='".$instance['image_1']."' alt=''>";
                                            echo '</a>';
                                        endif;
                                    ?>
                                </div>
                                <div class="box">
                                    <!-- /.testimonial content -->
                                    <p class="message text-center">"<?php echo $instance['content_1']; ?>"</p>
                                </div>
                                <div class="client-info text-center">
                                    <!-- /.title -->
                                    <?php echo $instance['title_1']; ?>
                                    <!-- <span class="company"></span> -->  
                                </div>
                            </div>      

                            <!-- /.testimonial 2 -->
                            <div class="testi-item">
                                <div class="client-pic text-center">
                                    <?php
                                        if(! empty( $instance['image_2'] )):
                                            echo '<a href="'.$instance['link_2'].'">';
                                            echo "<img src='".$instance['image_2']."' alt=''>";
                                            echo '</a>';
                                        endif;
                                    ?>
                                </div>
                                <div class="box">
                                    <!-- /.testimonial content -->
                                    <p class="message text-center">"<?php echo $instance['content_2']; ?>"</p>
                                </div>
                                <div class="client-info text-center">
                                    <!-- /.title -->
                                    <?php echo $instance['title_2']; ?>
                                    <!-- <span class="company"></span> -->  
                                </div>
                            </div>

                            <!-- /.testimonial 3 -->
                            <div class="testi-item">
                                <div class="client-pic text-center">
                                    <?php
                                        if(! empty( $instance['image_3'] )):
                                            echo '<a href="'.$instance['link_3'].'">';
                                            echo "<img src='".$instance['image_3']."' alt=''>";
                                            echo '</a>';
                                        endif;
                                    ?>
                                </div>
                                <div class="box">
                                    <!-- /.testimonial content -->
                                    <p class="message text-center">"<?php echo $instance['content_3']; ?>"</p>
                                </div>
                                <div class="client-info text-center">
                                    <!-- /.title -->
                                    <?php echo $instance['title_3']; ?>
                                    <!-- <span class="company"></span> -->  
                                </div>
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

        $new_instance['title_1']  = strip_tags( $new_instance['title_1'] );
        $new_instance['content_1']  = strip_tags( $new_instance['content_1'] );
        $new_instance['image_1']  = strip_tags( $new_instance['image_1'] );
        $new_instance['link_1']   = strip_tags( $new_instance['link_1'] );

        $new_instance['title_2']  = strip_tags( $new_instance['title_2'] );
        $new_instance['content_2']  = strip_tags( $new_instance['content_2'] );
        $new_instance['image_2']  = strip_tags( $new_instance['image_2'] );
        $new_instance['link_2']   = strip_tags( $new_instance['link_2'] );

        $new_instance['title_3']  = strip_tags( $new_instance['title_3'] );
        $new_instance['content_3']  = strip_tags( $new_instance['content_3'] );
        $new_instance['image_3']  = strip_tags( $new_instance['image_3'] );
        $new_instance['link_3']   = strip_tags( $new_instance['link_3'] );

        return $new_instance;

    }

    // The settings update form.
    function form( $instance ) {

        // Merge with defaults
        $instance = wp_parse_args( (array) $instance, $this->defaults );

        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Main Title', 'tmq' ); ?>:</label>
            <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat" />
        </p>
        <div class="inside-widget-item">
            <p>
                <label for="<?php echo $this->get_field_id( 'title_1' ); ?>"><?php _e( 'Title 1', 'tmq' ); ?>:</label>
                <input type="text" id="<?php echo $this->get_field_id( 'title_1' ); ?>" name="<?php echo $this->get_field_name( 'title_1' ); ?>" value="<?php echo esc_attr( $instance['title_1'] ); ?>" class="widefat" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'content_1' ); ?>"><?php _e( 'Content 1', 'tmq' ); ?>:</label>
                <textarea id="<?php echo $this->get_field_id( 'content_1' ); ?>" rows="10" cols="50" name="<?php echo $this->get_field_name( 'content_1' ); ?>" class="widefat"><?php echo esc_attr( $instance['content_1'] ); ?></textarea>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'image_1' ); ?>"><?php _e( 'Image 1', 'tmq' ); ?>:</label>
                <div class="tmq-media-container">
                    <div class="tmq-media-inner">
                        <?php $img_style = ( $instance[ 'image_1' ] != '' ) ? '' : 'style="display:none;"'; ?>
                        <img id="<?php echo $this->get_field_id( 'image_1' ); ?>-preview" src="<?php echo esc_attr( $instance['image_1'] ); ?>" <?php echo $img_style; ?> />
                        <?php $no_img_style = ( $instance[ 'image_1' ] != '' ) ? 'style="display:none;"' : ''; ?>
                        <span class="tmq-no-image" id="<?php echo $this->get_field_id( 'image_1' ); ?>-noimg" <?php echo $no_img_style; ?>><?php _e( 'No image selected', 'tmq' ); ?></span>
                    </div>
                
                <input type="text" id="<?php echo $this->get_field_id( 'image_1' ); ?>" name="<?php echo $this->get_field_name( 'image_1' ); ?>" value="<?php echo esc_attr( $instance['image_1'] ); ?>" class="tmq-media-url" />

                <input type="button" value="<?php echo _e( 'Remove', 'tmq' ); ?>" class="button tmq-media-remove" id="<?php echo $this->get_field_id( 'image_1' ); ?>-remove" <?php echo $img_style; ?> />

                <?php $button_text = ( $instance[ 'image_1' ] != '' ) ? __( 'Change Image', 'tmq' ) : __( 'Select Image', 'tmq' ); ?>
                <input type="button" value="<?php echo $button_text; ?>" class="button tmq-media-upload" id="<?php echo $this->get_field_id( 'image_1' ); ?>-button" />
                <br class="clear">
                </div>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'link_1' ); ?>"><?php _e( 'URL 1', 'tmq' ); ?>:</label>
                <input type="text" id="<?php echo $this->get_field_id( 'link_1' ); ?>" name="<?php echo $this->get_field_name( 'link_1' ); ?>" value="<?php echo esc_attr( $instance['link_1'] ); ?>" class="widefat" />
            </p>
        </div>

        <div class="inside-widget-item">
            <p>
                <label for="<?php echo $this->get_field_id( 'title_2' ); ?>"><?php _e( 'Title 2', 'tmq' ); ?>:</label>
                <input type="text" id="<?php echo $this->get_field_id( 'title_2' ); ?>" name="<?php echo $this->get_field_name( 'title_2' ); ?>" value="<?php echo esc_attr( $instance['title_2'] ); ?>" class="widefat" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'content_2' ); ?>"><?php _e( 'Content 2', 'tmq' ); ?>:</label>
                <textarea id="<?php echo $this->get_field_id( 'content_2' ); ?>" rows="10" cols="50" name="<?php echo $this->get_field_name( 'content_2' ); ?>" class="widefat"><?php echo esc_attr( $instance['content_2'] ); ?></textarea>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'image_2' ); ?>"><?php _e( 'Image 2', 'tmq' ); ?>:</label>
                <div class="tmq-media-container">
                    <div class="tmq-media-inner">
                        <?php $img_style = ( $instance[ 'image_2' ] != '' ) ? '' : 'style="display:none;"'; ?>
                        <img id="<?php echo $this->get_field_id( 'image_2' ); ?>-preview" src="<?php echo esc_attr( $instance['image_2'] ); ?>" <?php echo $img_style; ?> />
                        <?php $no_img_style = ( $instance[ 'image_2' ] != '' ) ? 'style="display:none;"' : ''; ?>
                        <span class="tmq-no-image" id="<?php echo $this->get_field_id( 'image_2' ); ?>-noimg" <?php echo $no_img_style; ?>><?php _e( 'No image selected', 'tmq' ); ?></span>
                    </div>
                
                <input type="text" id="<?php echo $this->get_field_id( 'image_2' ); ?>" name="<?php echo $this->get_field_name( 'image_2' ); ?>" value="<?php echo esc_attr( $instance['image_2'] ); ?>" class="tmq-media-url" />

                <input type="button" value="<?php echo _e( 'Remove', 'tmq' ); ?>" class="button tmq-media-remove" id="<?php echo $this->get_field_id( 'image_2' ); ?>-remove" <?php echo $img_style; ?> />

                <?php $button_text = ( $instance[ 'image_2' ] != '' ) ? __( 'Change Image', 'tmq' ) : __( 'Select Image', 'tmq' ); ?>
                <input type="button" value="<?php echo $button_text; ?>" class="button tmq-media-upload" id="<?php echo $this->get_field_id( 'image_2' ); ?>-button" />
                <br class="clear">
                </div>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'link_2' ); ?>"><?php _e( 'URL 2', 'tmq' ); ?>:</label>
                <input type="text" id="<?php echo $this->get_field_id( 'link_2' ); ?>" name="<?php echo $this->get_field_name( 'link_2' ); ?>" value="<?php echo esc_attr( $instance['link_2'] ); ?>" class="widefat" />
            </p>
        </div>

        <div class="inside-widget-item">
            <p>
                <label for="<?php echo $this->get_field_id( 'title_3' ); ?>"><?php _e( 'Title 3', 'tmq' ); ?>:</label>
                <input type="text" id="<?php echo $this->get_field_id( 'title_3' ); ?>" name="<?php echo $this->get_field_name( 'title_3' ); ?>" value="<?php echo esc_attr( $instance['title_3'] ); ?>" class="widefat" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'content_3' ); ?>"><?php _e( 'Content 3', 'tmq' ); ?>:</label>
                <textarea id="<?php echo $this->get_field_id( 'content_3' ); ?>" rows="10" cols="50" name="<?php echo $this->get_field_name( 'content_3' ); ?>" class="widefat"><?php echo esc_attr( $instance['content_3'] ); ?></textarea>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'image_3' ); ?>"><?php _e( 'Image 3', 'tmq' ); ?>:</label>
                <div class="tmq-media-container">
                    <div class="tmq-media-inner">
                        <?php $img_style = ( $instance[ 'image_3' ] != '' ) ? '' : 'style="display:none;"'; ?>
                        <img id="<?php echo $this->get_field_id( 'image_3' ); ?>-preview" src="<?php echo esc_attr( $instance['image_3'] ); ?>" <?php echo $img_style; ?> />
                        <?php $no_img_style = ( $instance[ 'image_3' ] != '' ) ? 'style="display:none;"' : ''; ?>
                        <span class="tmq-no-image" id="<?php echo $this->get_field_id( 'image_3' ); ?>-noimg" <?php echo $no_img_style; ?>><?php _e( 'No image selected', 'tmq' ); ?></span>
                    </div>
                
                <input type="text" id="<?php echo $this->get_field_id( 'image_3' ); ?>" name="<?php echo $this->get_field_name( 'image_3' ); ?>" value="<?php echo esc_attr( $instance['image_3'] ); ?>" class="tmq-media-url" />

                <input type="button" value="<?php echo _e( 'Remove', 'tmq' ); ?>" class="button tmq-media-remove" id="<?php echo $this->get_field_id( 'image_3' ); ?>-remove" <?php echo $img_style; ?> />

                <?php $button_text = ( $instance[ 'image_3' ] != '' ) ? __( 'Change Image', 'tmq' ) : __( 'Select Image', 'tmq' ); ?>
                <input type="button" value="<?php echo $button_text; ?>" class="button tmq-media-upload" id="<?php echo $this->get_field_id( 'image_3' ); ?>-button" />
                <br class="clear">
                </div>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'link_3' ); ?>"><?php _e( 'URL 3', 'tmq' ); ?>:</label>
                <input type="text" id="<?php echo $this->get_field_id( 'link_3' ); ?>" name="<?php echo $this->get_field_name( 'link_3' ); ?>" value="<?php echo esc_attr( $instance['link_3'] ); ?>" class="widefat" />
            </p>
        </div>
        <?php

    }

}


/**
 * Register Widget
 */
function register_testimonial_widget() { 
  
    register_widget( 'Testimonial_Widget' ); 

} 
add_action( 'widgets_init','register_testimonial_widget' );
