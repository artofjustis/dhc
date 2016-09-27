<?php

namespace DHC;

/**
 * Plugin Settings
 */
class Settings
{
	/**
	 * @var array 	Plugin Settings
	 */
	protected $settings;

	/**
	 * Constructor
	 *
	 * @return	void
	 */
	public function __construct()
	{
		// Load Settings
		$this->settings = get_option( 'dhc_settings', array() );
		
		// Register Admin Stuff
		if ( is_admin() )
		{
			add_action( 'admin_menu', array( $this, 'registerPage' ) );
			add_action( 'admin_init', array( $this, 'registerFields' ) );
		}
	}
	
	/**
	 * Settings Getter
	 *
	 * @param	string		$setting		The setting to get
	 * @return	mixed
	 */
	public function getSetting( $setting )
	{
		return isset( $this->settings[ $setting ] ) ? $this->settings[ $setting ] : NULL;
	}

	/**
	 * Register settings page
	 *
	 * @return	void
	 */
	public function registerPage()
	{
		add_options_page(
		    'DHC Plugin Settings', 
		    'DHC Settings', 
		    'manage_options', 
		    'dhc_settings_page', 
		    array( $this, 'outputSettingsPage' )
		);
	}

	/**
	 * Register settings fields
	 *
	 * @return	void
	 */
	public function registerFields()
	{
		add_settings_section(
		    'main-settings',
		    'DHC Settings',
		    function() { print "Enter your settings below:"; },
		    'dhc_settings_page'
		);  

		add_settings_field(
		    'box-product',
		    'Get a Box Product ID',
		    array( $this, 'boxProductField' ),
		    'dhc_settings_page',
		    'main-settings'       
		);
		add_settings_field(
		    'box-product2',
		    'Gift a Box Product ID',
		    array( $this, 'boxProductField2' ),
		    'dhc_settings_page',
		    'main-settings'       
		);
		
		register_setting( 'dhc_plugin_settings', 'dhc_settings' );
	}

	/**
	 * Generate Settings Page
	 *
	 * @return	void
	 */
	public function outputSettingsPage()
	{		
		?>
		<div class="wrap">
		    <h2>DHC Settings</h2>           
		    <form method="post" action="options.php">
		    <?php
			settings_fields( 'dhc_plugin_settings' );   
			do_settings_sections( 'dhc_settings_page' );
			submit_button(); 
		    ?>
		    </form>
		</div>
		<?php
	}

	/** 
	 * Output Box Product Field
	 *
	 * @return	void
	 */
	public function boxProductField()
	{
		printf(
		    '<input type="text" id="box_product" name="dhc_settings[box_product]" value="%s" />',
		    $this->getSetting( 'box_product' ) !== NULL ? esc_attr( $this->getSetting( 'box_product' ) ) : ''
		);
	}
	public function boxProductField2()
	{
		printf(
		    '<input type="text" id="box_product2" name="dhc_settings[box_product2]" value="%s" />',
		    $this->getSetting( 'box_product2' ) !== NULL ? esc_attr( $this->getSetting( 'box_product2' ) ) : ''
		);
	}
}
