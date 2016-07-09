<?php

namespace DHC;

/**
 * DHC Plugin Class
 */
class Plugin
{
	/**
	 * @var Plugin
	 */
	protected static $_instance;
	
	/**
	 * @var string 	Plugin Path
	 */
	protected $path;
	
	/**
	 * @var Settings
	 */
	protected $settings;
	
	/**
	 * Singleton Instance
	 *
	 * @return	Plugin
	 */
	public static function instance()
	{
		if ( isset( static::$_instance ) )
		{
			return static::$_instance;
		}
		
		static::$_instance = new static;
		return static::$_instance;
	}
	
	/** 
	 * Set Plugin Path
	 *
	 * @return	void
	 */
	public function setPath( $path )
	{
		$this->path = $path;
	}
	
	/**
	 * Set Settings
	 *
	 * @param	\DHC\Settings		$settings		The settings object
	 * @return	void
	 */
	public function setSettings( \DHC\Settings $settings )
	{
		$this->settings = $settings;
	}
	
	/** 
	 * Get Settings
	 *
	 * @return	\DHC\Settings
	 */
	public function getSettings()
	{
		return $this->settings;
	}
	
	/**
	 * Register Scripts
	 *
	 * @return	void
	 */
	public function registerScripts()
	{
		wp_register_script( 'jquery-steps', $this->fileUrl( 'js/jquery.steps.min.js' ), array( 'jquery' ), false, true );
		wp_register_script( 'jquery-wait', $this->fileUrl( 'js/jquery.wait.min.js' ), array( 'jquery' ), false, true );
		wp_register_script( 'dhc-plugin', $this->fileUrl( 'js/plugin.js' ), array( 'jquery' ), false, true );
		wp_localize_script( 'dhc-plugin', 'dhclocal', $this->localData() );
	}
	
	/**
	 * Localization Data
	 */
	public function localData()
	{
		return array
		(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
		);
	}
	
	/**
	 * WooCommerce: Filter Templates
	 * 
	 * @param	string		$current		The current template file
	 * @param	mixed		$slug			The template slug
	 * @param	string		$name			An optional template name
	 * @return	string
	 */
	public function templateHandler( $current, $slug='', $name='' )
	{
		global $post;
		
		if ( $name == 'single-product' )
		{
			if ( $post->ID == $this->getSettings()->getSetting( 'box_product' ) )
			{
				return $this->pluginFile( 'template/product', 'php' );
			}
		}
		
		return $current;
	}
	
	/**
	 * Ajax Handler
	 *
	 * @return 	void
	 */
	public function ajaxHandler()
	{
		switch( $_REQUEST[ 'do' ] )
		{
			case 'clear':
				
				WC()->cart->empty_cart();
				wp_send_json( array
				(
					'checkout' => WC()->cart->get_checkout_url(),
				));
				break;
		}
	}
	
	/**
	 * Get a plugin file path
	 *
	 * @param	string		$pathfile		The file path and name (without extension)
	 * @param	string		$type			The file type
	 * @return	string
	 */
	public function pluginFile( $pathfile, $type='php' )
	{
		return $this->path . '/' . $pathfile . '.' . $type;
	}
	
	/**
	 * Get a plugin file url
	 *
	 * @param	string		$filename		The file path and name (including extension)
	 * @return	string
	 */
	public function fileUrl( $filename )
	{
		return plugins_url( $filename, $this->path . '/dummydir' );
	}
	
}