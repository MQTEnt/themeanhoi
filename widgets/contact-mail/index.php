<?php
/**
 * Load scripts.
 */
//Style and Script have already included in Intro Widget


/**
 * Mail Contact Widget
 */
class Mail_Contact_Widget extends WP_Widget {
    protected $defaults;
    function __construct() {

        $this->defaults = array(
            'title' => '',
            'place' => '',
            'phone' => '',
            'email' => '',
            'image' => '',
        );

        $widget_ops = array(
            'classname'   => 'tmq-mail-contact-widget',
            'description' => __( 'Display Mail contact widget ', 'tmq' ),
        );

        $control_ops = array(
            'id_base' => 'tmq-mail-contact-widget',
            'width'   => 200,
            'height'  => 250,
        );

        parent::__construct( 'tmq-mail-contact-widget', __( 'Mail contact Widget', 'tmq' ), $widget_ops, $control_ops );

    }
    function widget( $args, $instance ) {
        $instance = wp_parse_args( (array) $instance, $this->defaults );
        echo $args['before_widget'];
        ?>
		<!-- /.contact section -->
		<div id="contact">
		    <div class="contact fullscreen parallax" style="background-image:url('<?php echo $instance['image']; ?>');" data-img-width="2000" data-img-height="1334" data-diff="100">
		        <div class="overlay">
		            <div class="container">
		                <div class="row contact-row">
		                    <!-- /.address and contact -->
		                    <div class="col-sm-5 contact-left wow fadeInUp">
		                    	<?php 
		                    		$title_arr = explode(' ',trim($instance['title']));
		                    	?>
		                        <h2><span class="highlight"><?php echo $title_arr[0] ?></span> <?php echo substr(strstr($instance['title']," "), 1); ?></h2>
		                        <ul class="ul-address">
		                            <li><i class="pe-7s-map-marker"></i><?php echo $instance['place'] ?></li><br>
		                            <li><i class="pe-7s-phone"></i><?php echo $instance['phone'] ?></li><br>
		                            <li><i class="pe-7s-mail"></i><?php echo $instance['email'] ?></li><br>
		                        </ul>	
		                    </div>

		                    <!-- /.contact form -->
		                    <div class="col-sm-7 contact-right">
		                        <form id="contact-form" class="form-horizontal">
		                            <div class="form-group">
		                                <input type="text" id="message_name" class="form-control wow fadeInUp" placeholder="Tên" required/>
		                            </div>
		                            <div class="form-group">
		                                <input type="text" id="message_email" class="form-control wow fadeInUp" placeholder="Email" required/>
		                            </div>					
		                            <div class="form-group">
		                                <textarea rows="20" cols="20" id="message_content" class="form-control input-message wow fadeInUp"  placeholder="Nội dung yêu cầu" required></textarea>
		                            </div>
		                            <div class="form-group">
		                                <input type="button" id="btn-submit" name="btn-submit" value="Gửi yêu cầu" class="btn btn-success wow fadeInUp" />
		                            	<div id="container-send-loading" style="text-align: center; margin: 10px 0">
		                          		</div>
		                            </div>
		                        </form>
		                        <script>
		                            (function($){
		                                $(document).ready(function(){
		                                    $('#btn-submit').click(function(){
		                                        var message_name= $('#message_name').val();
		                                        var message_email= $('#message_email').val();
		                                        var message_content= $('#message_content').val();
		                                        //console.log(message_content);
		                                        if(message_content === '' || message_email === '' || message_name === '')
		                                            alert('Nhập thiếu nội dung, mời nhập lại!');
		                                        else{
		                                            var regex_email = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		                                            if(!regex_email.test(message_email)){
		                                                alert('Email không hợp lệ, mời nhập lại!');
		                                            }
		                                            else{
		                                                //Send request
		                                                $.ajax({
		                                                    type : "post",
		                                                    dataType : "json", 
		                                                    url : '<?php echo admin_url('admin-ajax.php');?>', //Defalt
		                                                    data : {
		                                                        action: "mail_handle", //action name in function.php
		                                                        message_name: message_name,
		                                                        message_email: message_email,
		                                                        message_content: message_content
		                                                    },
		                                                    context: this,
		                                                    beforeSend: function(){
		                                                        //Do something...
		                                                        $('#container-send-loading').append("<img id='send-loading' style='width: 50px; height: 50px; text-align: center' src='<?php echo get_template_directory_uri().'/imgs/sending.gif' ?>'/>");
		                                                    },
		                                                    success: function(response) {
		                                                    	$('#send-loading').remove();
		                                                        if(response.success) {
		                                                            alert(response.data);
		                                                            //Clean form
		                                                            $('#message_name').val('');
		                                                            $('#message_email').val('');
		                                                            $('#message_content').val('');
		                                                        }
		                                                        else {
		                                                            alert('Đã có lỗi xảy ra');
		                                                        }
		                                                    },
		                                                    error: function( jqXHR, textStatus, errorThrown ){
		                                                        //Do something
		                                                        console.log( 'The following error occured: ' + textStatus, errorThrown );
		                                                    }
		                                                })
		                                                return false;
		                                            }
		                                        }
		                                    })
		                                })
		                            })(jQuery)
		                        </script>		
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
        $new_instance['place']  = strip_tags( $new_instance['place'] );
        $new_instance['image']  = strip_tags( $new_instance['image'] );
        $new_instance['phone']   = strip_tags( $new_instance['phone'] );
        $new_instance['email']   = strip_tags( $new_instance['email'] );

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
            <label for="<?php echo $this->get_field_id( 'place' ); ?>"><?php _e( 'Place', 'tmq' ); ?>:</label>
            <input type="text" id="<?php echo $this->get_field_id( 'place' ); ?>" name="<?php echo $this->get_field_name( 'place' ); ?>" value="<?php echo esc_attr( $instance['place'] ); ?>" class="widefat" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'phone' ); ?>"><?php _e( 'Phone', 'tmq' ); ?>:</label>
            <input type="text" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" value="<?php echo esc_attr( $instance['phone'] ); ?>" class="widefat" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'Email', 'tmq' ); ?>:</label>
            <input type="text" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" value="<?php echo esc_attr( $instance['email'] ); ?>" class="widefat" />
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
        <?php

    }

}


/**
 * Register Widget
 */
function register_mail_contact_widget() { 
  
    register_widget( 'Mail_Contact_Widget' ); 

} 
add_action( 'widgets_init','register_mail_contact_widget' );
