<?php




// Settings Page: Woo Quick View
class wooquickview_Settings_Page {

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'wph_create_settings' ) );
		add_action( 'admin_init', array( $this, 'wph_setup_sections' ) );
		add_action( 'admin_init', array( $this, 'wph_setup_fields' ) );
	}

	public function wph_create_settings() {
		$page_title = 'View Woocommerce';
		$menu_title = 'Woo Quick View';
		$capability = 'manage_options';
		$slug = 'wooquickview';
		$callback = array($this, 'wph_settings_content');
		$icon = 'dashicons-admin-settings';
		$position = 2;
		add_menu_page($page_title, $menu_title, $capability, $slug, $callback, $icon, $position);
	}

	public function wph_settings_content() { ?>
		<div class="wrap">
			<h1>View Woocommerce</h1>
			<?php settings_errors(); ?>
			<form method="POST" action="options.php">
				<?php
					settings_fields( 'wooquickview' );
					do_settings_sections( 'wooquickview' );
					submit_button();
				?>
			</form>
		</div> <?php
	}

	public function wph_setup_sections() {
		add_settings_section( 'wooquickview_section', 'Woocommerce Quick View Plugin', array(), 'wooquickview' );
	}

	public function wph_setup_fields() {
		$fields = array(
			array(
				'label' => 'Enable/Disable',
				'id' => 'enable_disable',
				'type' => 'checkbox',
				'section' => 'wooquickview_section',
				'placeholder' => 'Enable/Disable',
			),
		);
		foreach( $fields as $field ){
			add_settings_field( $field['id'], $field['label'], array( $this, 'wph_field_callback' ), 'wooquickview', $field['section'], $field );
			register_setting( 'wooquickview', $field['id'] );
		}
	}

	public function wph_field_callback( $field ) {
		$value = get_option( $field['id'] );
		$placeholder = '';
		if ( isset($field['placeholder']) ) {
			$placeholder = $field['placeholder'];
		}
		switch ( $field['type'] ) {
				case 'checkbox':
					printf('<input %s id="%s" name="%s" type="checkbox" value="1">',
						$value === '1' ? 'checked' : '',
						$field['id'],
						$field['id']
				);
					break;
			default:
				printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />',
					$field['id'],
					$field['type'],
					$placeholder,
					$value
				);
		}
		if( isset($field['desc']) ) {
			if( $desc = $field['desc'] ) {
				printf( '<p class="description">%s </p>', $desc );
			}
		}
	}
}
new wooquickview_Settings_Page();













?>