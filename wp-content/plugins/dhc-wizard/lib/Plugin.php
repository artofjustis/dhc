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
		wp_register_script( 'flip-plugin', $this->fileUrl( 'js/flip.js' ), array( 'jquery' ), false, true );
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
			if ( $post->ID == $this->getSettings()->getSetting( 'box_product2' ) )
			{
				return $this->pluginFile( 'template/product2', 'php' );
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
				
				$wc = WC();
				$wc->cart->empty_cart();
				$checkout = $wc->cart->get_checkout_url();
				
				wp_send_json( array
				(
					'nextstep' => is_user_logged_in() ? $checkout : get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ),
				));
				break;
		}
	}
	
	/**
	 * Login Handler
	 *
	 * @return	void
	 */
	public function loginHandler( $redirect )
	{
		if ( function_exists( 'WC' ) )
		{
			$wc = WC();
			if ( $wc->cart->get_cart_contents_count() )
			{
				return $wc->cart->get_checkout_url();
			}
		}
		
		return $redirect;
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