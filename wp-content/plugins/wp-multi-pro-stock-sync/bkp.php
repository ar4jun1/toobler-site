<?php

class wp_multiProductStockSync
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

      //Manage stock when edit or save stocks from admin.
      // add_action( 'save_post', array(&$this, 'stksync_manage_stock_admin' ));   

      //For saving lynk
       // add_action( 'woocommerce_process_product_meta', array(&$this, 'stksync_custom_general_fields_save' )); 

      //Adding meta box.
      // add_action( 'load-post.php' , array(&$this,  'custom_product_basic_load' ));
      // add_action( 'load-post-new.php' , array(&$this,  'custom_product_basic_load' )); 

      //for Adding custom select fields in product variations.
      // add_action( 'woocommerce_product_after_variable_attributes', array(&$this,   'variable_fields'),10,3); 

      //Save variations
      // add_action( 'woocommerce_save_product_variation', array(&$this, 'save_variable_fields' ));
      //Admin scripts 
      // add_action( 'admin_enqueue_scripts', array( &$this, 'stksync_admin_resources' ) );

      //Handling ajax
      // add_action( 'wp_ajax_stkSync_stock_up', array( &$this, 'stkSync_stock_up' ) );
      // add_action( 'wp_ajax_nopriv_stkSync_stock_up', array( &$this, 'stkSync_stock_up' ) );
  }

   /**
   * Add script.
   *
   * @return null
   */
    function stksync_admin_resources() {
        
          wp_register_script( 'stkSync_admin.js', plugin_dir_url( __FILE__ ) . 'js/custom-sync.js',array(), '1.0.0' );
          wp_localize_script( 'stkSync_admin.js', 'ajax_object_iq',
                      array(
                          'ajax_url' => admin_url( 'admin-ajax.php' ),
                          'plugin_base_path' => plugin_dir_url(__FILE__),
                          '_ajax_nonce'      => wp_create_nonce( "my-special-string" )
                      ));
          wp_enqueue_script( 'stkSync_admin.js');
    }

   /**
   * Ajax call- For prefilling inherited products stock.
   *
   * @return null
   */    
   public function stkSync_stock_up() { 
        $_id = trim($_POST['_id']);
        $new_stock  = get_post_meta($_id,'_stock',true);
        if($new_stock)
          wp_send_json( array('status'=>true,'message'=>$new_stock) );
        else
          wp_send_json( array('status'=>false,'message'=>'') );

        die();

    }


   /**
   * Admin- product variations stock sync.
   *
   * @return null
   */

    public function save_variable_fields( $post_id ) { 
      if (isset( $_POST['variable_sku'] ) ) :
          wp_multiProductStockSync::_variationSyncSlaveFun();
      endif;
    }

   /**
   * Admin- partition:1
   *
   * @return null
   */
    public function _variationSyncSlaveFun(){
        $variable_sku           = $_POST['variable_sku'];
        $variable_post_id       = $_POST['variable_post_id'];
        $max_count              = max(array_keys($variable_sku ));
        $_select                = $_POST['_variationSyncSlave'];
        $_p_stock               = $_POST['variable_stock'];
        for ( $i = 0; $i <= $max_count ; $i++ ) :
          $variation_id         = (int) $variable_post_id[$i];
          //Checkking, if variation is selected or not.(for slave products)
          if ( isset( $_select[$i] ) && $_select[$i] != 'NA'  ) { 
            update_post_meta( $variation_id, '_variationSyncSlave', stripslashes( $_select[$i] ) );
            if($_p_stock[$i] && $_p_stock[$i] != null && $_p_stock[$i] != 0 ){
              $new_stock         = $_p_stock[$i];
            }else{
              $update_stock_status = wp_multiProductStockSync::_updateStockIfNull($_select[$i],$variation_id);

            }
            if($new_stock){
              $available_array    = wp_multiProductStockSync::_updateVariationStockAdmin($variation_id);
              if($available_array && count($available_array)>0){
                wp_multiProductStockSync::_updateALlStockWithNew($available_array, $new_stock);
              }
            }

          }else if(isset( $_select[$i] ) && $_select[$i] == 'NA'){
            update_post_meta( $variation_id, '_variationSyncSlave', stripslashes( $_select[$i] ) );
          }else{

            if($_p_stock[$i] && $_p_stock[$i] != null && $_p_stock[$i] != 0 ){
              $new_stock          = $_p_stock[$i];
            }
            //If master, and ther is no master for this product and also stock is empty-enable below comment ,if such case exist.
            // else{
            //   $update_stock_status = wp_multiProductStockSync::_updateStockIfNull($_select[$i],$variation_id);
            // }
            if($new_stock){
              $available_array    = wp_multiProductStockSync::_updateVariationStockAdmin($variation_id);
              if($available_array && count($available_array)>0){
                wp_multiProductStockSync::_updateALlStockWithNew($available_array, $new_stock);
              }

            }

          }
        endfor;
    }


     /**
     * Admin- If stock, Upadte all linked variation products with new.
     *
     * @return null
     */
    public function _updateALlStockWithNew($post_ids ,$new_stock){
        global $wpdb;
        foreach ($post_ids as $stock_id) {  
            $ck_manage_stock  = null;
            $ck_manage_stock  = $wpdb->get_row(
                $wpdb->prepare("SELECT * FROM {$wpdb->prefix}postmeta WHERE meta_key='_manage_stock'  AND post_id = $stock_id", null));
            // if(isset($ck_manage_stock->meta_value) && $ck_manage_stock->meta_value == 'no' ){
                update_post_meta( $stock_id, '_manage_stock','yes');
                update_post_meta( $stock_id, '_stock_status','instock');
                update_post_meta( $stock_id, '_stock',$new_stock);
            // }else{
            //   update_post_meta( $stock_id, '_stock',$new_stock);
            // }
        }
    }

    /**
    * Admin- If stock is null, Upadte current variation product's stock with other.
    *
    * @return new stock
    */
    public function _updateStockIfNull($post_id ,$variation_id){
        global $wpdb;
        $stock_data= $wpdb->get_row(
            $wpdb->prepare("SELECT * FROM {$wpdb->prefix}postmeta WHERE meta_key='_stock'  AND post_id = $post_id", null));
        if(isset($stock_data->meta_value) && $stock_data->meta_value != null ){
          $new_stocks     = $stock_data->meta_value; 
          $_manage_stock  = get_post_meta( $post_id, '_manage_stock', true );
          $_stock_status  = get_post_meta( $post_id, '_stock_status', true );

          update_post_meta( $variation_id, '_manage_stock',$_manage_stock);
          update_post_meta( $variation_id, '_stock_status',$_stock_status);
          update_post_meta( $variation_id, '_stock',$new_stocks);
          
        }
      return $new_stocks;
      
    }

    /**
    * Admin- FOr getting all linked varaiation products id.
    *
    * @return array
    */
    public function _updateVariationStockAdmin($variation_id){
        global $wpdb;
        $post_ids=array();
        $post_ids[]=$variation_id;
        for($i=0;$i<count($post_ids);$i++){
            $postMeta= $wpdb->get_results(
                $wpdb->prepare("SELECT * FROM {$wpdb->prefix}postmeta WHERE meta_key='_variationSyncSlave'  AND ( post_id = $post_ids[$i] OR meta_value= $post_ids[$i] ) ", null));
            if($postMeta){
                foreach ($postMeta as $value) {
                    if (!in_array($value->post_id, $post_ids)) {
                        $post_ids[]   =$value->post_id;
                    }
                    if (!in_array($value->meta_value, $post_ids)) {
                        $post_ids[]   =$value->meta_value;
                    }
                }
            }                 
        }
        return $post_ids;
    }

    /**
    * Admin- For adding custom select box.
    *
    * @return 
    */
    public function variable_fields( $loop, $variation_data, $variation ) {
        global $post,$woocommerce,$wpdb;       
        ?>   
        <div class="varaition-pro">
          <?php
        $post_id            =get_the_ID();

        $_link_id           = get_post_meta( $post_id, '_variationsync', true );
        if($_link_id && $_link_id != null){
          $variation_array  = $wpdb->get_results(
                          $wpdb->prepare("SELECT ID FROM {$wpdb->prefix}posts WHERE post_parent=$_link_id  AND  post_type = 'product_variation' AND menu_order != -1 AND post_status = 'publish' ", null));
                  // print_r($variation_array);

          $Linked_product   = $wpdb->get_results(
                          $wpdb->prepare("SELECT post_name FROM {$wpdb->prefix}posts WHERE ID=$_link_id  ", null));
          $_option= array();
          $_option['NA']      ='Select Variation.. ';
          foreach ($variation_array as $_value) {
            $index=$_value->ID;

            $attribute_pa   = $wpdb->get_results(
                          $wpdb->prepare("SELECT * FROM  {$wpdb->prefix}postmeta WHERE `post_id`=$index AND meta_key LIKE %s;", $wpdb->esc_like('attribute_') .'%'));
            // echo"<pre>";
            // print_r($attribute_pa); die();
            $attribute_string ='';
            foreach ($attribute_pa  as $attribute_) {
              if($attribute_string && $attribute_->meta_value != null)
                $attribute_string   = $attribute_string.' : '.$attribute_->meta_value;
              else if($attribute_->meta_value != null)
                $attribute_string   = $attribute_->meta_value;
            }

            $_option[$index]  = $attribute_string;
          
          }
          if($_option && count($_option)>0 )  {
            woocommerce_wp_select( 
                array( 
                  'id'          => '_variationSyncSlave['.$loop.']', 
                  'label'       => __( 'Link with    :  ', 'woocommerce' ), 
                  'description' => __( 'Choose a Variaton.', 'woocommerce' ),
                  'value'       => get_post_meta( $variation->ID, '_variationSyncSlave', true ),
                  'options'     => $_option
                  )
                );
          }else{
            $_info    = 'There is no Variations added for the Linked Product : '; 
            if($Linked_product[0]->post_name)
              $_info  = $_info.$Linked_product[0]->post_name;           
            ?> <h4> <?php _e($_info); ?> </h4>
            <?php
          }
        } 
        ?> </div> <?php
      }

    /**
    * Admin- Adding metabox.
    *
    * @return string
    */
    public function custom_product_basic_load() {
      
      add_meta_box( 'custom_product_basic_metabox' , __( 'Variation Support ' ) , 'custom_product_basic_metabox' , 'product' , 'normal' , 'high' );

     function custom_product_basic_metabox( $post ) { ?>

      <input type="hidden" name="product_type" value="simple" />
      <h4><?php _e( 'For Link Variations Products' ); ?></h4>
      <p class="form-field">
      <table><tr><td style="width:200px;">  
              <label for="_variationsync"><?php _e( 'Products Link to  : ', 'woocommerce' ); ?></label></td><td style="width:300px;">
              
<?php  
  global $wpdb;
 $postDatas= $wpdb->get_results(
                  $wpdb->prepare("SELECT ID,post_title FROM {$wpdb->prefix}posts WHERE post_type='product' AND post_status='publish' AND ID != $post->ID  ", null));
 $product_ids = array_filter( array_map( 'absint', (array) get_post_meta( $post->ID, '_variationsync', true ) ) );
 $_help_tip ="Please select a Product to Link!"
// echo "<pre>"; print_r($postDatas); die();
 ?>
          <select class="form-control"  id="search_status" style="width:300px;"  name="_variationsync" >
                          <option value="">Select</option>
                          <?php foreach ($postDatas as $postData){
                            ?>
                          <option value="<?php echo $postData->ID ?>"  

                          <?php if (isset($product_ids) && ($postData->ID == $product_ids[0])) : $_help_tip= $postData->post_title; ?>selected="selected"<?php endif; ?>

                           >
                          <?php  echo $postData->post_title;?></option>
                          <?php }?>
                    </select>
              </td><td> <?php echo wc_help_tip( __( $_help_tip, 'woocommerce' ) ); ?>
         
             </td></tr>
             <tr>
               <td>Unlink Variations : </td>
               <td><input type="checkbox" name="_unlink_variation" >    </td>
             </tr>
           </table> 
         </p>

        <?php
      }
    }

  /**
   * Notice admin about the needs.
   *
   * @return string
   */
  public function stksync_woocommerce_missing_notice() {
      echo '<div class="error"><p>' . sprintf(__('WOOCOMMERCE MULTI PRODUCT STOCK SYNCING PLUGIN requires WooCommerce to be installed and active. You can download %s here.', 'wc-stock-sync'), '<a href="http://www.woothemes.com/woocommerce/" target="_blank">WooCommerce</a>') . '</p></div>';
  }

  /**
   * Check for,is woocmmerce is active or not.
   *
   * @return Boolean
   */
  public function stksync_is_woocommerce_active() {
      if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
          return true;
      }
      return false;
  }

  /**
   * for creating custom fileds in admin(product page).
   *
   * @return string
   */
  public  function stksync_custom_add_custom_fields() {    
      wp_multiProductStockSync::makeHtmlSelectBox();
      wp_multiProductStockSync::makeHtmlCheckbox();    
  }

  /**
   * Creating select box.
   *
   * @return string
   */
  public function makeHtmlSelectBox(){

      global $woocommerce,$post, $post;


      global $wpdb;
      $postDatas= $wpdb->get_results(
                        $wpdb->prepare("SELECT ID,post_title FROM {$wpdb->prefix}posts WHERE post_type='product' AND post_status='publish' AND ID != $post->ID ", null));
      $product_ids = array_filter( array_map( 'absint', (array) get_post_meta( $post->ID, '_inventorysync', true ) ) );
      $_help_tip ="Please select a Product to Link!"
      // echo "<pre>"; print_r($postDatas); die();
      ?>
      <p class="form-field">

      <label for="_inventorysync"><?php _e( 'Products link to', 'woocommerce' ); ?></label>
        <select class="form-control"  id="_inventorysync" style="width:300px;"  name="_inventorysync" >
                        <option value="">Select</option>
                        <?php foreach ($postDatas as $postData){
                          ?>
                        <option value="<?php echo $postData->ID ?>"  

                        <?php if (isset($product_ids) && ($postData->ID == $product_ids[0])) : $_help_tip= $postData->post_title; ?>selected="selected"<?php endif; ?>

                         >
                        <?php  echo $postData->post_title;?></option>
                        <?php }?>
                  </select>
            <?php echo wc_help_tip( __( $_help_tip, 'woocommerce' ) ); 








      ?>
     </p>
      <?Php
      return true;

    }

  /**
   * Creating Check box.
   *
   * @return string
   */
  public function makeHtmlCheckbox(){
      woocommerce_wp_checkbox( 
                array( 
                  'id'            => '_checkbox_unlink', 
                  'wrapper_class' => 'show_if_simple', 
                  'label'         => __('Unlink', 'woocommerce' ), 
                  'description'   => __( 'Check this to unlink from the above product!', 'woocommerce' ) 
                  )
                );
      return true;
  }


 /**
   * Manage stock's (frontend).
   *
   * @return Boolean.
   */
  public function stksync_manage_stock_booking( $order ) { 

      global $wpdb;
      // print_r($order); die();
      // die("123");
      // $items        = $order->get_items();
      // $_items       = array();
      // $_var_items   = array();
      // foreach( $items as $item ) {
      //     if($item['variation_id'] && $item['variation_id']!= 0){
      //       $var_items_ids        = array();
      //       $var_items_ids['id']  = $item['variation_id'];
      //       $var_items_ids['qty'] = $item['qty'];
      //       $_var_items[] = $var_items_ids;
      //     }else{
      //       $items_ids        = array();
      //       $items_ids['id']  = $item['product_id'];
      //       $items_ids['qty'] = $item['qty'];
      //       $_items[] = $items_ids;
      //     }
      // }

      // if($_items && count($_items)>0 ){
      //   foreach ($_items as  $_item) {
      //       $post_ids=array();
      //       $post_ids[]=$_item['id'];
      //       for($i=0;$i<count($post_ids);$i++){
      //         $postMeta= $wpdb->get_results(
      //             $wpdb->prepare("SELECT * FROM {$wpdb->prefix}postmeta WHERE meta_key='_inventorysync'  AND ( post_id = $post_ids[$i] OR meta_value= $post_ids[$i] ) ", null));
      //         if($postMeta){
      //             foreach ($postMeta as $value) {
      //                 if (!in_array($value->post_id, $post_ids)) {
      //                     $post_ids[]   = $value->post_id;
      //                 }
      //                 if (!in_array($value->meta_value, $post_ids)) {
      //                     $post_ids[]   = $value->meta_value;
      //                 }
      //             }
      //         }
      //      }
      //     foreach ($post_ids as $stock_id) {
      //         if($stock_id!= $_item['id'] ){
      //             $old_stock= $wpdb->get_row(
      //               $wpdb->prepare("SELECT * FROM {$wpdb->prefix}postmeta WHERE post_id = $stock_id AND meta_key='_stock'", null)
      //               );
      //             if($old_stock){
      //                 $new_stock  = $old_stock->meta_value-$_item['qty'];
      //                 if($new_stock <= 0){ 
      //                   update_post_meta( $stock_id, '_stock_status','outofstock');
      //                 }
      //                 update_post_meta( $stock_id, '_stock',$new_stock);
      //             }
      //         }
      //     }
      //   }
      // }
      // if($_var_items && count($_var_items)>0 ){
      //     wp_multiProductStockSync::_variationStockMaintain($_var_items);
      // }
      return true;
  }

  public function _variationStockMaintain($_var_items){
      global $wpdb;
      foreach ($_var_items as  $_item) {
            $post_ids=array();
            $post_ids[]=$_item['id'];
            for($i=0;$i<count($post_ids);$i++){
              $postMeta= $wpdb->get_results(
                  $wpdb->prepare("SELECT * FROM {$wpdb->prefix}postmeta WHERE meta_key='_variationSyncSlave'  AND ( post_id = $post_ids[$i] OR meta_value= $post_ids[$i] ) ", null));
              if($postMeta){
                  foreach ($postMeta as $value) {
                      if (!in_array($value->post_id, $post_ids)) {
                          $post_ids[]   = $value->post_id;
                      }
                      if (!in_array($value->meta_value, $post_ids)) {
                          $post_ids[]   = $value->meta_value;
                      }
                  }
              }
           }
          foreach ($post_ids as $stock_id) {
              if($stock_id    != $_item['id'] ){
                  $old_stock  = $wpdb->get_row(
                    $wpdb->prepare("SELECT * FROM {$wpdb->prefix}postmeta WHERE post_id = $stock_id AND meta_key='_stock'", null)
                    );
                  if($old_stock){
                      $new_stock  = $old_stock->meta_value-$_item['qty'];
                      if($new_stock <= 0){ 
                        update_post_meta( $stock_id, '_stock_status','outofstock');
                      }
                      update_post_meta( $stock_id, '_stock',$new_stock);
                  }
              }
          }
        }
  }

 /**
   * Manage stocks(admin).
   *
   * @return Boolean.
   */
  public function stksync_manage_stock_admin($post_id){
      global $wpdb;   
      // print_r($_POST); die();
      //Only need to mange stock if the prodcut is linked to another products. 
    if($_POST['_checkbox_unlink'] && $_POST['_checkbox_unlink']== 'yes'){ 
       return true;
    }else{     
      if($_POST['_inventorysync']){
          $_inventorysync=$_POST['_inventorysync'];
          $post_ID=$_POST['post_ID'];

          if($_POST['_stock']){
              $new_stock = $_POST['_stock'];
          }else{           
              $stock_data= $wpdb->get_row(
                  $wpdb->prepare("SELECT * FROM {$wpdb->prefix}postmeta WHERE meta_key='_stock'  AND post_id = $_inventorysync", null));
              if(isset($stock_data->meta_value) && $stock_data->meta_value != null ){
                  $new_stocks=$stock_data->meta_value; 
                  update_post_meta( $post_ID, '_manage_stock','yes');
                  update_post_meta( $post_ID, '_stock_status','instock');
                  update_post_meta( $post_ID, '_stock',$new_stocks);
              }
          }
        //Only need to update stocks if $_POST has _stock.
        if($new_stock){ 
            $post_ids=array();
            $post_ids[]=$_POST['_inventorysync'];
            for($i=0;$i<count($post_ids);$i++){
                $postMeta= $wpdb->get_results(
                    $wpdb->prepare("SELECT * FROM {$wpdb->prefix}postmeta WHERE meta_key='_inventorysync'  AND ( post_id = $post_ids[$i] OR meta_value= $post_ids[$i] ) ", null));
                if($postMeta){
                    foreach ($postMeta as $value) {
                        if (!in_array($value->post_id, $post_ids)) {
                            $post_ids[]=$value->post_id;
                        }
                        if (!in_array($value->meta_value, $post_ids)) {
                            $post_ids[]=$value->meta_value;
                        }
                    }
                }                 
            }
            //updates stocks. 
            foreach ($post_ids as $stock_id) {  
                $ck_manage_stock = null;
                $ck_manage_stock= $wpdb->get_row(
                    $wpdb->prepare("SELECT * FROM {$wpdb->prefix}postmeta WHERE meta_key='_manage_stock'  AND post_id = $stock_id", null));
                if(isset($ck_manage_stock->meta_value) && $ck_manage_stock->meta_value == 'no' ){
                    update_post_meta( $stock_id, '_manage_stock','yes');
                    update_post_meta( $stock_id, '_stock_status','instock');
                    update_post_meta( $stock_id, '_stock',$new_stock);
                }else{
                  update_post_meta( $stock_id, '_stock',$new_stock);
                }
            }
        }
    }else{
          $post_ID    = $_POST['post_ID'];
          $post_ids   = array();
          $post_ids[] = $_POST['post_ID'];
          
          for($i=0;$i<count($post_ids);$i++){
              $postMeta= $wpdb->get_results(
                  $wpdb->prepare("SELECT * FROM {$wpdb->prefix}postmeta WHERE meta_key='_inventorysync'  AND ( post_id = $post_ids[$i] OR meta_value= $post_ids[$i] ) ", null));
              if($postMeta){ 
                  foreach ($postMeta as $value) {
                      if (!in_array($value->post_id, $post_ids)) {
                          $post_ids[]=$value->post_id;
                      }
                      if (!in_array($value->meta_value, $post_ids)) {
                          $post_ids[]=$value->meta_value;
                      }
                  }
              }              
          } 
          if($_POST['_stock']){
              $new_stock = $_POST['_stock'];
          }else {    
            foreach ($post_ids as $_stock_id) {       
              $stock_data= $wpdb->get_row(
                  $wpdb->prepare("SELECT * FROM {$wpdb->prefix}postmeta WHERE meta_key='_stock'  AND post_id = $_stock_id", null));
              if(isset($stock_data->meta_value) && $stock_data->meta_value != null ){
                 $new_stocks_og=$stock_data->meta_value; 
              }
            }
              if(isset($stock_data->meta_value) && $stock_data->meta_value != null ){
                 
                  update_post_meta( $post_ID, '_manage_stock','yes');
                  update_post_meta( $post_ID, '_stock_status','instock');
                  update_post_meta( $post_ID, '_stock',$new_stocks_og);
              }
          }
          if($new_stock) {    
            foreach ($post_ids as $stock_id) {
              $ck_manage_stock = null;
              $ck_manage_stock= $wpdb->get_row(
                  $wpdb->prepare("SELECT * FROM {$wpdb->prefix}postmeta WHERE meta_key='_manage_stock'  AND post_id = $stock_id", null));
              if(isset($ck_manage_stock->meta_value) && $ck_manage_stock->meta_value == 'no' ){
                  update_post_meta( $stock_id, '_manage_stock','yes');
                  update_post_meta( $stock_id, '_stock_status','instock');
                  update_post_meta( $stock_id, '_stock',$new_stock);
              }else{
                update_post_meta( $stock_id, '_stock',$new_stock);
              }
            }
          }        
    }
  } 
    return true;
  }


  //Save _inventorysync in postmeta.
  public function stksync_custom_general_fields_save( $post_id  ) {
    global $wpdb;
    if($_POST['_checkbox_unlink'] && $_POST['_checkbox_unlink']== 'yes'){
       update_post_meta( $post_id, '_inventorysync', '' );
    }else{
      $link_product     =  $_POST['_inventorysync'];  
      update_post_meta( $post_id, '_inventorysync', $link_product );
    }


    if($_POST['_unlink_variation'] && $_POST['_unlink_variation']== 'on'){
      $variation_array= $wpdb->get_results(
                      $wpdb->prepare("SELECT ID FROM {$wpdb->prefix}posts WHERE post_parent=$post_id  AND  post_type = 'product_variation' AND menu_order != -1 ", null));
      foreach ($variation_array as $_value) {
        $index=$_value->ID;
        update_post_meta( $index, '_variationSyncSlave', '' );
      }
      update_post_meta( $post_id, '_variationsync', '' );
    }else if($_POST['_variationsync'] && $_POST['_variationsync'] != null){
      $_link_product     =  $_POST['_variationsync']; 
      $db_data  = get_post_meta($post_id,'_variationsync', true);
      
      if($db_data && $db_data != $_link_product){
          $syncSlave_array = $wpdb->get_results(
                        $wpdb->prepare("SELECT ID FROM {$wpdb->prefix}posts WHERE post_parent=$post_id  AND  post_type = 'product_variation' AND menu_order != -1 ", null));
          foreach ($syncSlave_array as $sync_value) {
              $index=$sync_value->ID;
              update_post_meta( $index, '_variationSyncSlave', '' );
          }
            update_post_meta( $post_id, '_variationsync', $_link_product );
      }else{
        update_post_meta( $post_id, '_variationsync', $_link_product );
      }

    }


  }

  

}//class ends here.


$stksync_object  = new wp_multiProductStockSync;

 
?>
