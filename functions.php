<?php
/*
@ Khai báo hằng giá trị
  @ THEME_URL = Lấy đường dẫn tới thư mục theme
  @ CORE = Lấy đường dẫn tới thư mục core
*/
define( 'THEME_URL', get_stylesheet_directory() );
define ( 'CORE', THEME_URL . "/core" );
/*
@ Nhúng file /core/init.php
*/
require_once( CORE . "/init.php" );

/*
@ Thiết lập chiều rộng nội dung
*/
if(!isset($content_width)){
  $content_width = 620;
}

/*
@ KHAI BÁO CHỨC NĂNG CỦA THEME
*/
if(!function_exists('tmq_theme_setup')){
  	function tmq_theme_setup() {
	    $center = [
	      'name' => __('Phần hiển thị các Widget', 'tmq'),
	      'id' => 'center-sidebar',
	      'description' => __('Phần hiển thị các Widget cho trang, chọn các Widget có trong danh sách vào khu vực này'),
	      'class' => 'center-sidebar',
	    ];
	    register_sidebar($center);

	    //Add Custom Header
	    $defaults = array(
			'default-image'          => '',
			'width'                  => 0,
			'height'                 => 0,
			'flex-height'            => false,
			'flex-width'             => false,
			'uploads'                => true,
			'random-default'         => false,
			'header-text'            => true,
			'default-text-color'     => '',
			'wp-head-callback'       => '',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		);
		add_theme_support( 'custom-header', $defaults );

		//Add Menu location
		register_nav_menu( 'navbar', __('Main Menu', 'tmq') );

		//Add theme support thumbnail
		add_theme_support( 'post-thumbnails' );
  	}
  	add_action('init', 'tmq_theme_setup'); //Hook
}

//Display menu function
if(!function_exists('display_menu')){
  function display_menu($slug) {
    $menu = array(
      'theme_location' => $slug,
      'container' => 'div',
      'container_class' => 'collapse navbar-collapse navbar-right',
      'container_id' => 'btn-navbar-collapse',
      'menu_class' => 'nav navbar-nav'
    );
    wp_nav_menu($menu);
  }
}
//Active nav item
add_filter('nav_menu_css_class' , 'active_nav_item' , 10 , 2);
function active_nav_item ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active';
    }
    return $classes;
}

/*
@ Display post title
*/
if(!function_exists('tmq_entry_header')){
	function tmq_entry_header(){
		if(!is_single() && !is_page()){
		?>
			<h2 style='text-align: left; padding: 0px 5%;'><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<?php
		}
		else{
		?>
			<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<?php
		}
	}
}
/*
@ Display entry content
*/
if(!function_exists('tmq_entry_content')){
	function tmq_entry_content(){
		if(!is_single() && !is_page()){
			//Hiển thị phần rút ngọn nội dung nếu không phải là trang đơn (Single) và Page
			$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		?>
			<p class="excerpt-post">
				<?php if($feat_image): ?>
					<img class='excerpt-post-image' src="<?php echo $feat_image; ?>" alt="">
				<?php endif; ?>
				<?php 
					echo get_the_excerpt(); 
					echo '	<p class="post-date">
								<i class="glyphicon glyphicon-pencil"></i> '.get_the_date().'
							</p>';
				?>
			</p>
		<?php
		}
		else{
			//Hiển thị toàn bộ nội dung nếu là trang đơn (single.php) và Page (page.php)
			the_content();
			echo '<p class="post-date">'.get_the_date().'</p>';
		}
	}
}

//Add Widgets
require_once( THEME_URL . "/widgets/demo.php" );
require_once( THEME_URL . "/widgets/intro/index.php" );
require_once( THEME_URL . "/widgets/feature/index.php" );
require_once( THEME_URL . "/widgets/testimonial/index.php" );
require_once( THEME_URL . "/widgets/contact-mail/index.php" );
require_once( THEME_URL . "/widgets/social-footer/index.php" );

/*** Mail contact handle ***/
add_action( 'wp_ajax_mail_handle', 'mail_handle_init' );
add_action( 'wp_ajax_nopriv_mail_handle', 'mail_handle_init' );
function mail_handle_init() {
    $message_content = (isset($_POST['message_content']))?esc_attr($_POST['message_content']) : '';
    $message_name = (isset($_POST['message_name']))?esc_attr($_POST['message_name']) : '';
    $message_email = (isset($_POST['message_email']))?esc_attr($_POST['message_email']) : '';
 	
 	if($message_content != '' && $message_name != '' && $message_email != '') //Validate...
 	{
 		//Send email
		$to = get_option('admin_email');
		$subject = "Someone sent a message from ".get_bloginfo('name');
		$headers = 'From: '. $message_email . "\r\n" .'Reply-To: ' . $message_email . "\r\n";
		$message = $message_name.' <'.$message_email.'>: '.$message_content;
		$sent = wp_mail($to, $subject, $message, $headers);
		if($sent)
			wp_send_json_success('Đã gửi mail thành công, cảm ơn đã liên hệ ^ ^');
		else
			wp_send_json_success('Máy chủ lỗi khi gửi mail');
 	}
    die();//bắt buộc phải có khi kết thúc
}

/*** Nhúng file style.css ***/
function tmq_style(){
	//CSS
	wp_register_style('main-style', get_template_directory_uri().'/style.css', 'all'); //Đăng kí file css, 'all' - Tất cả các loại thiết bị (screen, print...)
	wp_enqueue_style('main-style'); //Đưa vào danh sách những file css
	
	wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', 'screen');
	wp_enqueue_style('bootstrap');
	
	wp_register_style('font-awesome', get_template_directory_uri().'/css/font-awesome.min.css', 'all');
	wp_enqueue_style('font-awesome');
	
	wp_register_style('icon', get_template_directory_uri().'/fonts/icon-7-stroke/css/pe-icon-7-stroke.css', 'all');
	wp_enqueue_style('icon');
	
	wp_register_style('animate', get_template_directory_uri().'/css/animate.min.css', 'screen');
	wp_enqueue_style('animate');
	
	wp_register_style('owl-theme', get_template_directory_uri().'/css/owl.theme.css', 'all');
	wp_enqueue_style('owl-theme');
	
	wp_register_style('owl-carousel', get_template_directory_uri().'/css/owl.carousel.css', 'all');
	wp_enqueue_style('owl-carousel');
	
	wp_register_style('index-red', get_template_directory_uri().'/css/css-index-red.css', 'screen');
	wp_enqueue_style('index-red');

	wp_register_script('jquery-custom', get_template_directory_uri().'/js/jquery.js', [], false, false);
  	wp_enqueue_script('jquery-custom');

	wp_register_script('bootstrap-js', get_template_directory_uri().'/js/bootstrap.min.js', ['jquery-custom'], false, true); //Thư viện Bootstrap phụ thuộc jQuery nên cần đăng kí jQuery chạy trước
  	wp_enqueue_script('bootstrap-js');

  	wp_register_script('custom-js', get_template_directory_uri().'/js/custom.js', ['jquery-custom'], false, true);
  	wp_enqueue_script('custom-js');

  	wp_register_script('wow-js', get_template_directory_uri().'/js/wow.min.js', [], false, true);
  	wp_enqueue_script('wow-js');

  	wp_register_script('owl-carousel-js', get_template_directory_uri().'/js/owl.carousel.min.js', [], false, true);
  	wp_enqueue_script('owl-carousel-js');
}
add_action('wp_enqueue_scripts', 'tmq_style'); //Hook gọi hàm nhúng file css ở trên
