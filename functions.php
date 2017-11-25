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
  }
  add_action('init', 'tmq_theme_setup'); //Hook
}


//Add Widgets
require_once( THEME_URL . "/widgets/demo.php" );
require_once( THEME_URL . "/widgets/intro/index.php" );



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

	wp_register_script('jquery-custom', get_template_directory_uri().'/js/jquery.js', [], false, true);
  	wp_enqueue_script('jquery-custom');

	wp_register_script('bootstrap-js', get_template_directory_uri().'/js/bootstrap.min.js', ['jquery-custom'], false, true); //Thư viện Bootstrap phụ thuộc jQuery nên cần đăng kí jQuery chạy trước
  	wp_enqueue_script('bootstrap-js');

  	wp_register_script('custom-js', get_template_directory_uri().'/js/custom.js', ['jquery-custom'], false, true);
  	wp_enqueue_script('custom-js');

  	wp_register_script('jquery-sticky-js', get_template_directory_uri().'/js/jquery.sticky.js', [], false, true);
  	wp_enqueue_script('jquery-sticky-js');

  	wp_register_script('wow-js', get_template_directory_uri().'/js/wow.min.js', [], false, true);
  	wp_enqueue_script('wow-js');

  	wp_register_script('owl-carousel-js', get_template_directory_uri().'/js/owl.carousel.min.js', [], false, true);
  	wp_enqueue_script('owl-carousel-js');
}
add_action('wp_enqueue_scripts', 'tmq_style'); //Hook gọi hàm nhúng file css ở trên
