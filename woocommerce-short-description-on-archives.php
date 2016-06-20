<?php
/*
Plugin Name: WooCommerce Product Short Descriptions on Shop Pages
Plugin URI: https://github.com/OM4/woocommerce-short-description-on-archives
Description: Adds each WooCommerce product's short description to shop and category/tag archive pages.
Version: 0.2
Author: OM4
Author URI: https://om4.com.au/plugins/
Text Domain: woocommerce-short-description-on-archives
Git URI: https://github.com/OM4/woocommerce-short-description-on-archives
Git Branch: release
License: GPLv2
*/

/*
Copyright 2014-2016 OM4 (email: plugins@om4.com.au    web: https://om4.com.au/plugins/)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( ! class_exists( 'WC_Short_Description_On_Archives' ) ) {

	/**
	 * This class is a singleton.
	 *
	 * Class WC_Short_Description_On_Archives
	 */
	class WC_Short_Description_On_Archives {

		/**
		 * Refers to a single instance of this class
		 */
		private static $instance = null;

		/**
		 * Creates or returns an instance of this class
		 * @return WC_Short_Description_On_Archives A single instance of this class
		 */
		public static function instance() {
			if ( null == self::$instance ) {
				self::$instance = new self();
			}
			return self::$instance;

		}

		/**
		 * Constructor
		 */
		private function __construct() {
			add_action( 'woocommerce_after_shop_loop_item_title', array( $this, 'woocommerce_after_shop_loop_item_title' ), 5 );
		}

		/**
		 * Add the product short description when displaying a product in the loop.
		 *
		 * Executed by the woocommerce_after_shop_loop_item_title hook.
		 */
		public function woocommerce_after_shop_loop_item_title() {

			wc_get_template( 'single-product/short-description.php' );

		}

	}

	WC_Short_Description_On_Archives::instance();

}