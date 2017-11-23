<?php
/*
  Plugin Name: Twilio Custom Apis.
  Plugin URI: http://www.toobler.com/
  Description:  Custom Apis to send and verify OTP's.
  Version: 1.0
  Text Domain: OTP.
*/
class twilioApiClass {

    function __construct() {

        register_activation_hook( __FILE__, array( &$this, 'form_submit_install'));
        add_action( 'wp_enqueue_scripts', array( &$this, 'twilio_load_resources'));
        // Send otp
        add_action( 'wp_ajax_send_otp', array( &$this, 'twilio_sendOTP_api' ));
        add_action( 'wp_ajax_nopriv_send_otp' , array( &$this, 'twilio_sendOTP_api' ));
        // Verify OTP
        add_action( 'wp_ajax_verify_otp', array( &$this, 'twilio_verifyOTP_api' ));
        add_action( 'wp_ajax_nopriv_verify_otp' , array( &$this, 'twilio_verifyOTP_api' ));

    }

public function twilio_load_resources(){
    
  // Localize JS so we can do AJAX calls :D
  wp_localize_script( 'twilio-api-js', 'twilioCustomApis', array( 'ajaxurl' => admin_url('admin-ajax.php'), 'security' => wp_create_nonce('twilioCustomApis-security-noncey') ) );
  
}

   /******************************************************************************************
   *Crete a table otp_vaerification, for storing phone_no and corresponding otp for verification.
   *
   * @return Null
   ******************************************************************************************/

public function form_submit_install() 
    {
      global $wpdb;
      $table_name = $wpdb->prefix . "otp_verification"; 
      echo $table_name; 
      $sql = "CREATE TABLE IF NOT EXISTS $table_name (
          ID INT(11) NOT NULL AUTO_INCREMENT ,
          otp INT(11) NULL ,
          phone_number VARCHAR(248) NULL ,
          created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
          PRIMARY KEY (ID));";

      require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
      dbDelta( $sql ); 
    }


   /*****************************************************************************************
   *Send OTP, using twilio plugin.
   *
   * @return Object
   ******************************************************************************************/
public function twilio_sendOTP_api(){ 
    if($_POST){
      $validation = twilioApiClass::validatePhone($_POST['phone_number']);
      if($_POST['phone_number'] && $validation['status']){ 
        global $wpdb;
        $number_to    = $_POST['phone_number'];
        $message_to   = $_POST['message'];
        $result       =   '';
        $length       =   4;
            for($i = 0; $i < $length; $i++) {
                $result   .= mt_rand(0, 9);
            }
        $message_to   = "Your OTP for xxxx is ".$result;
        $args = array( 
            'number_to' =>  $number_to,
            'message'    =>  $message_to
        ); 
        $response=twl_send_sms( $args );
        if ( is_wp_error($response) ){
              $return = array( 
                          'status'  =>  FALSE,
                          'return'  =>  $response->errors
                        ); 
        }else{
            $table_name = $wpdb->prefix . "otp_verification";  
            $wpdb->insert( 
                $table_name, 
                    array( 
                      'otp'           => $result, 
                      'phone_number'  => $number_to
                    ) 
            );
            $return = array( 
                'status'  =>  TRUE,
                'return'  =>  array('phone_number'=>$_POST['phone_number'],'OTP'=>$result)
            );  
      }

      }else{
          $resErr = "Please provide a valid Mobile number!";
          if($validation['error'])
              $resErr =  $validation['error'];

          $return = array( 
              'status'  =>  FALSE,
              'return'  =>  $resErr
          ); 
      }
      wp_send_json($return); die();
  
    } 
  }
  
   /*****************************************************************************************
   *Validating phone number.
   *
   * @return Boolean
   ******************************************************************************************/
  public function validatePhone($mobileNumber){
        $errors = '';
        $responseErr['status']= false;
        if( (!isset($mobileNumber)) || (empty($mobileNumber) ) ) {
              //Here is null or undefined or an empty string
              $errors = "Please enter your mobile number for text messages";
        }

        else if(!is_numeric($mobileNumber)) {
              $errors = "Please provide a valid number";
        }
        // else if(strlen($mobileNumber) != 12) {
        //      //Here is not 11 characters long
        //      $errors = "Please provide 12 character number, with country Code!";   
        // }

       if($errors) {
          $responseErr['error']=$errors;
          return  $responseErr;
       }
       else {
          $responseErr['status']= true;
          return $responseErr;
       }
    }
     
   /*****************************************************************************************
   *Verify Otp.
   *
   * @return Object
   ******************************************************************************************/

    public function twilio_verifyOTP_api(){
          if( (isset($_POST['phone_number'])) && (isset($_POST['otp'])) && twilioApiClass::validatePhone($_POST['phone_number']) ) {
            global $wpdb;
            $phoneNo = trim(preg_replace('/\D+/', '', $_POST['phone_number']));
            //Get Corresponding otp from table
            $postData= $wpdb->get_results(
                        $wpdb->prepare("SELECT * FROM {$wpdb->prefix}otp_verification WHERE phone_number = %s ORDER BY ID DESC LIMIT 1", $_POST['phone_number']));

            if($postData && count($postData)>0 ){
                if($postData[0]->otp == $_POST['otp']){
                    $userID  = ''; 


                    //Get corresponding user is with metakey ans metavalue
                    $user = reset(get_users(
                                array(
                                     'meta_key'   => 'focus_Phone',
                                     'meta_value' => $phoneNo,
                                     'fields'     => 'ID',
                                     'number'     => 1,
                                     'count_total'=> false
                                    ))); 

                    if ( isset( $user) )
                        $userID = $user;

                    $data = array(
                      'userId'        =>$userID,
                      'phone_number'  =>$_POST['phone_number']
                      );
                    // Response data   
                    $return = array( 
                        'status'  =>  TRUE,
                        'return'  =>  $data
                    ); 

                }else{
                  $return = array( 
                      'status'  =>  FALSE,
                      'return'  =>  "OTP Mismatch!"
                  ); 
                }

            }else{
              $return = array( 
                  'status'  =>  FALSE,
                  'return'  =>  "Phone Number Does'nt exist!"
              ); 
            }
        }else{
            $return = array( 
                'status'  =>  FALSE,
                'return'  =>  "Invalid Params!"
            ); 
          }
      wp_send_json($return); die();         
   }


}

 $twilioApi_object  = new twilioApiClass;

?>
