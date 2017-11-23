<?php
/*
  * Plugin Name:       ADD SUBSCRIPTION
  * Plugin URI:        http://www.toobler.com/
  * Description:       For add subscription dynamicaly when an order placed.
  * Version:           1.0
  * Author:            Toobler.
  * Author URI:        http://www.toobler.com/
*/

class prep_membershipADd
{
  /**
   * Start up
   */
  function __construct() {
      //WOOCOMMERCE MULTI PRODUCT STOCK SYNCING requires woocommerce plugin.
      if (!$this->stksync_is_woocommerce_active()) {
        add_action('admin_notices', array(&$this, 'stksync_woocommerce_missing_notice'));
        return;
      } 

      //Add a custom autosuggest select box in product page for product syncing.
      // add_action( 'woocommerce_product_options_general_product_data',array( &$this, 'stksync_custom_add_custom_fields' ));

      //Manage stock while booking.
      add_action( 'woocommerce_reduce_order_stock',array(&$this, 'stksync_manage_stock_booking' ));

    }



    public function stksync_woocommerce_missing_notice() {
      echo '<div class="error"><p>' . sprintf(__('WOOCOMMERCE MULTI PRODUCT STOCK SYNCING PLUGIN requires WooCommerce to be installed and active. You can download %s here.', 'wc-stock-sync'), '<a href="http://www.woothemes.com/woocommerce/" target="_blank">WooCommerce</a>') . '</p></div>';
  }

   public function stksync_manage_stock_booking( $order ) { 
    print_r($order); die();

      global $wpdb;
    }




  }

  $stksync_object  = new prep_membershipADd;
