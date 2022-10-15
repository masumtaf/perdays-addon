<?php
namespace PerDays_Addon\Includes;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class PerDays_Customer_details_Form{

    public $errors = [];

    public function __construct(){

       
        add_shortcode( 'per-cstm-details', [ $this, 'render_shortcode' ] );
        add_action( 'init', [ $this, 'form_handler' ] );
        // $this->form_handler();


        // add [per-cstm-details]
      
    }

 
    public function render_shortcode( $attr, $content = '' ) {
   
        ob_start();
     

        include perdays_get_template('/tmpl-default-form.php');
     
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
     
     }

    
    /**
     * Sanitize and Save data of customer Details to database table
     * 
     * @param array $args
     * 
     * @return int|WP_Error
     */
     public function form_handler() {

        if ( ! isset( $_POST['perdays_submit_customer_details'] ) ) {
            return;
        }

        if( ! wp_verify_nonce( $_POST['_wpnonce'], 'perdays-customer-details' ) ) {
            wp_die( 'Are you try to Cheat ?' );
        }

        if ( !is_user_logged_in() ){
            wp_die( 'Please login before add your information.' );
        }

        $name = isset( $_POST['name'] ) ? sanitize_text_field( $_POST['name'] ) : '';
        $phone = isset( $_POST['phone'] ) ? sanitize_text_field( $_POST['phone'] ) : '';
        $email = isset( $_POST['email'] ) ? sanitize_text_field( $_POST['email'] ) : '';
        $address = isset( $_POST['address'] ) ? sanitize_textarea_field( $_POST['address'] ) : '';
        $productID = isset( $_POST['prd_id'] ) ? sanitize_textarea_field( $_POST['prd_id'] ) : '';
        $summeryOfOrder = isset( $_POST['summery_of_order'] ) ? sanitize_textarea_field( $_POST['summery_of_order'] ) : '';
       
        // $CurrentUserId= get_current_user_id();
        if ( empty( $name ) ){
            $this->errors['name'] = __( 'Please provide a name' , 'perdays-addon' );
        }

        if ( empty( $phone ) ){
            $this->errors['phone'] = __( 'Please provide a phone number' , 'perdays-addon' );
        }

        if ( empty( $email ) ){
            $this->errors['email'] = __( 'Please provide a email address' , 'perdays-addon' );
        }  
         
        if ( empty( $address ) ){
            $this->errors['address'] = __( 'Please provide a address address' , 'perdays-addon' );
        }  
        
        if ( empty( $productID ) ){
            $this->errors['prd_id'] = __( 'Please Select Some Products' , 'perdays-addon' );
        }
        
        if ( empty( $summeryOfOrder ) ){
            $this->errors['summery_of_order'] = __( 'Please provide a Summery Of Order' , 'perdays-addon' );
        }

        if ( ! empty( $this->errors ) ) {
            return;
        }

        $inserted_id = insert_customer_details([
            // 'user_id' => $CurrentUserId,
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
            'prd_id' => $productID,
            'summery_of_order' => $summeryOfOrder
        ]);

     
        if ( is_wp_error( $inserted_id ) ) {
            wp_die( $inserted_id->get_error_massage() );
        }
        wp_redirect( home_url() );

        exit;

    }


}

