<?php

class sendEmailClasses {

 function __construct() {
  add_action( 'admin_menu', array( $this, 'wpa_add_menu' ));
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
        </table ></center>
       
        
            <?php   
            }else{
                print_r("No results Found!");
            }   
            
        
    }
     }

 $string  = new sendEmailClasses;

 ?>