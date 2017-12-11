<?php
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

class TMQ_Theme_Setting {
	protected $option;
	protected $option_group = 'tmq_theme_setting_group';

	public function __construct() {
		$this->option = get_option('tmq_theme_setting');
		//Add Menu
		add_action('admin_menu', function() {
			add_submenu_page(
				'themes.php',
				'TMQ Theme Setting',
				'TMQ Setting',
				'manage_options',
				'tmq_anhoitheme',
				[$this, 'create_page']
			);
		});

		add_action('admin_init', [$this, 'register_setting']);
	}

	public function create_page() {
		$option_group = $this->option_group;

		//Check theme setting option is created?
		if(get_option('tmq_theme_setting')){
			$footer = get_option('tmq_theme_setting')['footer'];
			$phone = get_option('tmq_theme_setting')['phone'];
		}
		else{
			$footer = null;
			$phone = null;
		}

		require(THEME_URL . '/setting/theme-setting-view.php');

		// TMQ_Custom
		// Record in table 'wp_option', option_name: 'tmq_theme_setting' (value in __construct())
		// echo '<div style="clear: both; margin: 50px">';
		// echo '<p>Old Option</p>';
		// echo '<pre>';
		// print_r($this->option);
		// echo '</pre>';
		// echo '</div>';
	}


	public function register_setting() {
		register_setting(
			$this->option_group,
			'tmq_theme_setting',
			[$this, 'save_setting']
		);
	}

	public function save_setting($input) {
		$new_input = [];
		$new_input['footer'] = $input['footer'];
		$new_input['phone'] = $input['phone'];
		return $new_input;
	}
}