<?php
/**
 * Tạo class Social linker
 */
class Social_Widget extends WP_Widget {
	protected $defaults;
    function __construct() {
		$this->defaults = array(
            'facebook' => 'facebook.com/',
			'twitter' => 'twitter.com/',
			'google_plus' => 'plus.google.com/',
			'instagram' => 'instagram.com/'
        );

        $widget_ops = array(
            'classname'   => 'tmq-social-widget',
            'description' => __( 'Display Social widget ', 'tmq' ),
        );

        $control_ops = array(
            'id_base' => 'tmq-social-widget',
            'width'   => 200,
            'height'  => 250,
        );

        parent::__construct( 'tmq-social-widget', __( 'Social Widget', 'tmq' ), $widget_ops, $control_ops );
	}
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, $default);
		$facebook = esc_attr( $instance['facebook'] );
		$twitter = esc_attr( $instance['twitter'] );
		$instagram = esc_attr( $instance['instagram'] );
		$google_plus = esc_attr( $instance['google_plus'] );
		echo "<p>Facebook url: <input type='text' class='widefat' name='".$this->get_field_name('facebook')."' value='".$facebook."' /></p>";
		echo "<p>Twitter url: <input type='text' class='widefat' name='".$this->get_field_name('twitter')."' value='".$twitter."' /></p>";
		echo "<p>Google plus url: <input type='text' class='widefat' name='".$this->get_field_name('google_plus')."' value='".$google_plus."' /></p>";
		echo "<p>Instagram url: <input type='text' class='widefat' name='".$this->get_field_name('instagram')."' value='".$instagram."' /></p>";
	}
	
	/**
	 * save widget form
	 */
	
	function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		$instance['facebook'] = strip_tags($new_instance['facebook']);
		$instance['twitter'] = strip_tags($new_instance['twitter']);
		$instance['google_plus'] = strip_tags($new_instance['google_plus']);
		$instance['instagram'] = strip_tags($new_instance['instagram']);
		return $instance;
	}
	function widget( $args, $instance ) {
		echo $before_widget;
		?>
			<div style= 'padding: 20px 0px 0px'>
				<div class="container">
	                <div class="col-sm-4 col-sm-offset-4">
	                    <!-- /.social links -->
	                    <div class="social text-center">
	                        <ul>
	                            <li><a class="wow fadeInUp" href="<?php echo $instance['twitter'] ?>"><i class="fa fa-twitter"></i></a></li>
	                            <li><a class="wow fadeInUp" href="<?php echo $instance['facebook'] ?>" data-wow-delay="0.2s"><i class="fa fa-facebook"></i></a></li>
	                            <li><a class="wow fadeInUp" href="<?php echo $instance['google_plus'] ?>" data-wow-delay="0.4s"><i class="fa fa-google-plus"></i></a></li>
	                            <li><a class="wow fadeInUp" href="<?php echo $instance['instagram'] ?>" data-wow-delay="0.6s"><i class="fa fa-instagram"></i></a></li>
	                        </ul>
	                    </div>
	                </div>	
	            </div>
            </div>	
		<?php
		echo $after_widget;
	}
	
}
add_action( 'widgets_init', 'create_social_widget' );
function create_social_widget() {
	register_widget('Social_Widget');
}