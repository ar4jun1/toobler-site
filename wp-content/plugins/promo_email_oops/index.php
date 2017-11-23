<?php
/*
  Plugin Name: Promo Email oops.
  Plugin URI: http://www.clevrsoft.com/
  Description:  Creating a contact-form to send promo email.
  Version: 1.0
  Text Domain: promo-email-oops.
*/
class promoEmailClass {

    function __construct() {

        // register_activation_hook( __FILE__, array( &$this, 'form_submit_install'));
        add_action( 'wp_enqueue_scripts', array( &$this, 'promo_load_resources'));
        add_action( 'wp_ajax_promo_ajax_request', array( &$this, 'promo_ajax_request' ));
        add_action( 'wp_ajax_nopriv_promo_ajax_request' , array( &$this, 'promo_ajax_request' ));
        add_filter( 'wp_mail_content_type', array( &$this, 'set_content_type' ));
        // add_action( 'admin_menu', array( $this, 'wpa_add_menu' ));
        add_shortcode( 'promo_form',  array( $this, 'promo_display_form'));


    }

public function promo_load_resources(){
  /*wp_enqueue_style( 'promo_resources.css', plugin_dir_url( __FILE__ ) . 'css/intepro_custom.css', array(), '1.0.0' );*/
    
  wp_enqueue_script( 'promo-validate-js', plugin_dir_url( __FILE__ ) . 'js/jquery-1.11.0.validate.js', array('jquery'),'',true);

  wp_enqueue_script( 'promo-resources.js', plugin_dir_url( __FILE__ ) . 'js/common.js', array(), '1.0.0', true );

  // Localize JS so we can do AJAX calls :D
  wp_localize_script( 'promo-resources.js', 'recruitmeajax', array( 'ajaxurl' => admin_url('admin-ajax.php'), 'security' => wp_create_nonce('recruitme-security-noncey') ) );
  
}


public function form_submit_install() 
    {
      global $wpdb;
      $table_name = $wpdb->prefix . "promo_leads"; 
      echo $table_name; 
      $sql = "CREATE TABLE IF NOT EXISTS $table_name (
          id INT(11) NOT NULL AUTO_INCREMENT ,
          status INT(11) NULL ,
          customer_name VARCHAR(248) NULL ,
          customer_email VARCHAR(248) NULL   ,
          customer_mobile VARCHAR(248) NULL   ,
          customer_message TEXT(248) NULL   ,
          created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
          PRIMARY KEY (id));";

      require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
      dbDelta( $sql ); 
    }


public function wpa_add_menu() {

        add_menu_page( 'Promo page', 'Promo-list', 'manage_options', 'promo-listing', array(
                          __CLASS__,
                         'wpa_page_file_path'
                        ), plugins_url('images/email-icon.png', __FILE__),'2.2.9');

       
    }


function wpa_page_file_path() {

        global $wpdb;
        $table_name = $wpdb->prefix . "promo_leads"; 
        $sql = "SELECT * FROM $table_name ORDER BY created_date DESC  ";
        $result = $wpdb->get_results($sql) ;
        if($result){
        ?>
            <center>
              <h2>Customer Details</h2>
              <table class="wp-list-table widefat fixed striped users">
                <thead>
                  <tr  class="success"><th>NAME</th><th>EMAIL</th><th>CONTACT NUMBER</th><th>MESSAGE</th><th>DATE</th></tr>
                </thead>
                  <?php
                      foreach( $result as $results ) {
                          echo '<tr><td>'.$results->customer_name.'</td><td>'.$results->customer_email.'</td><td>'.$results->customer_mobile.'</td><td>'.$results->customer_message.'</td><td>'.$results->created_date.'</td></tr>';
                         
                      }
                  ?>
              </table >
            </center>
           
        
            <?php   
        }else{
            print_r("No results Found!");
        }   
            
        
}
     




public function set_content_type( $content_type ) {
    return 'text/html';
}

public function promo_ajax_request(){
  // check_ajax_referer('promo-security-noncey', 'security');


   if($_POST)   
    {
       
        $params['email']            = htmlspecialchars($_POST['user_email']);
        $params['fullname']         = htmlspecialchars($_POST['user_name']);
        $params['contact_number']   = htmlspecialchars($_POST['user_contact_number']);
        $params['user_message']     = htmlspecialchars($_POST['user_message']);
        $params['email_to']         = get_option( 'admin_email' ); 

        global $wpdb;
        $table_name = $wpdb->prefix . "promo_leads";  
        $wpdb->insert( 
            $table_name, 
                array( 
                  'created_date' => current_time( 'mysql' ), 
                  'customer_mobile' => $params['contact_number'], 
                  'customer_email' => $params['email'] , 
                  'customer_name' => $params['fullname']  , 
                  'customer_message' => $params['user_message'], 
                  'status' => 1, 
                ) 
        );
        $headers = 'From: '. $params['fullname'] .' <'. $params['email'] .'>' . "\r\n";
        $group_emails = array(
            $_POST['user_email']
            );
        $email_subject = "example intro: $email";

        // $body = file_get_contents(locate_template(ABSPATH ."wp-content/plugins/promo_email/templates/email-temp.html"));
        // $body = file_get_contents( plugin_dir_url( __FILE__ ) ."/templates/email-temp.html"));
        $body = file_get_contents( plugin_dir_url( __FILE__ ) ."/templates/email-temp.html");
        
      
        $mail_body = promoEmailClass::formatEmail($body,$params);

        //send mail to admin
        if(wp_mail($params['email_to'] ,$email_subject,$mail_body,$headers)) {
          // send mail to user about the confirmation.
          $mail_body .="<br><br>Thanks for contacting us, we will reply to you as soon as possible. If any problem, our e-mail address is info@toobler.com ";
          $headers = 'From: Toobler <'. $params['email_to'] .'>' . "\r\n";
          if(wp_mail($params['email'],'Our next steps',$mail_body,$headers)) {

            $contents= "Your email has been sent successfully";
          }else{
            $contents= "Error ! ".$GLOBALS['phpmailer']->ErrorInfo;
          }
            
        } else {
            $contents= "Error ! ".$GLOBALS['phpmailer']->ErrorInfo;
        }
        print_r($contents);
        die();
    }
}

/* format email*/
 public function formatEmail($body="", $params){

    if($body == "")
      return;


    if(!empty($params['fullname']))
      $body = str_replace("{{user-name}}", $params['fullname'], $body);
    else
      $body = str_replace("{{user-name}}", "Hi there,", $body);

    if(!empty($params['email']))
      $body = str_replace("{{user-email}}", $params['email'], $body);
    else
      $body = str_replace("{{user-email}}", "ex@example.com", $body);

    if(!empty($params['contact_number']))
      $body = str_replace("{{user-contact-number}}", $params['contact_number'], $body);
    else
      $body = str_replace("{{user-contact-number}}", "9998887770", $body);
    if(!empty($params['user_message']))
      $body = str_replace("{{user-message}}", $params['user_message'], $body);
    else
      $body = str_replace("{{user-message}}", "this is just a demon.", $body);

    return $body;
  }





public function promo_display_form(){
  ob_start();
?>
  

        <div class="loader" hidden  ></div>
          <form  id= "email_submit_form" class="common-form">
            <div class="layout-sm-6  layout-md-6 layout-lg-6">               
                <div class="form-group">
                     <input type="text" class="form-control" name="user_name" >
                    <label>Your Name</label>
               </div> 
            </div>
            <div class="layout-sm-6  layout-md-6 layout-lg-6">
                <div class="form-group">
                    <input type="text" class="form-control" name="user_email" id="user_email">
                    <label>Your Email</label>
               </div> 
            </div>
            <div class="layout-sm-12  layout-md-12 layout-lg-12">
                <div class="form-group">
                    <textarea class="form-control" id="user_message"  name="user_message"></textarea>
                    <label>Your  Message</label>
               </div> 
            </div>
            
            <div class="layout-sm-12  layout-md-12 layout-lg-12">
                <div class="submit-block">
                    <!--<label class="checkbox">
                        <input type="checkbox">
                        <span>I  would like to receive news updates.</span>
                    </label>-->
                    <button type="submit" class="btn-primary submit-btn" id="email_submit" >Send Message</button>
                </div>
            </div>
            
        </form>












            <!-- <section class="ready-talk">
                
                <h2>GET A FREE 30 MIN CONSULTATION</h2>
                <p>Fill this out so we can learn more about you and your needs.</p>
                <form id="email_submit_form" name="email_submit_form" method="POST" class="contact-form">
                    <div class="input-group">
                        <input type="text" class="input-control enter-name" name="user_name" placeholder="Enter your name"/>
                    </div>
                    <div class="grid">
                        <div class="grid-col6">
                            <div class="input-group">
                                <input type="email" class="input-control enter-email" name="user_email" id="user_email"  placeholder="Enter your email"/>
                            </div>
                        </div>
                        <div class="grid-col6">
                            <div class="input-group">
                                <input type="text" class="input-control enter-number" name="user_contact_number" id="user_contact_number"  placeholder="Enter your contact number"/>
                            </div>
                        </div>
                    </div>
                   
                    <div class="input-group">
                        <textarea rows="3" class="input-control enter-message" id="user_message"  name="user_message" placeholder="What can we help you with?"></textarea>
                    </div>
                    <div class="input-group">
                      <div id="show_message" style="display:none" ></div>
                    </div>
                    <button class="btn primary-btn" id= "email_submit" >SEND</button>
                </form>

        </section><br><br> -->
<?php 
 // Get contents and stop output buffering
$output = ob_get_contents();
ob_end_clean();
echo $output ;
}

}

 $string_object  = new promoEmailClass;

?>