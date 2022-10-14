<?php
namespace PerDays_Addon\Includes;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class PerDays_Customer_details_Form{

    public $errors = [];

    public function __construct(){

        add_action( 'admin_init', [ $this, 'form_handler' ] );

        add_shortcode( 'per-cstm-details', [ $this, 'render_shortcode' ] );

      

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
     * Insert a new customer Details to database table
     * 
     * @param array $args
     * 
     * @return int|WP_Error
     */
    public function insert_customer_details( $args = [] ) {

        global $wpdb;

        if ( empty ( $args['name']) ){
            return new \WP_Error('NO - Name', __( 'You must be provide a Name', 'perdays-addon') );
        }

        if ( empty ( $args['phone']) ){
            return new \WP_Error('NO - Phone', __( 'You must be provide a Phone', 'perdays-addon') );
        }

        if ( empty ( $args['email']) ){
            return new \WP_Error('NO - Email', __( 'You must be provide a Email', 'perdays-addon') );
        }

        if ( empty ( $args['address']) ){
            return new \WP_Error('NO - Address', __( 'You must be provide a Address', 'perdays-addon') );
        }

        if ( empty ( $args['product_id']) ){
            return new \WP_Error('NO - Product', __( 'Please Select Some Products', 'perdays-addon') );
        }

        if ( empty ( $args['summery_of_order']) ){
            return new \WP_Error('NO - Summery', __( 'You must be provide a Summery of Order', 'perdays-addon') );
        }
    
    $defaults = [
            'user_id' => get_current_user_id(),
            'name' => '',
            'phone' => '',
            'email' => '',
            'address' => '',
            'product_id' => int(null),
            'summery_of_order' => ''
        ];
    
        $data = wp_parse_args( $args, $defaults );
    
        $inserted = $wpdb->insert(
            $wpdb->prefix . 'pdy_customer_detls',
            $data,
            [
                '%d', // user id
                '%s', // name
                '%s', // phone
                '%s', // email
                '%s', // address
                '%d', // produect id
                '%s', // summery_of_order
               
            ]
        );
    
        if ( ! $inserted ) {
            return new \WP_Error( 'failed-to-insert', __( 'Faild to insert data' , '' ) );
        }
    
        return $wpdb->insert_id;
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
        // $productID = isset( $_POST['product_id'] ) ? sanitize_textarea_field( $_POST['product_id'] ) : '';
        $summeryOfOrder = isset( $_POST['summery_of_order'] ) ? sanitize_textarea_field( $_POST['summery_of_order'] ) : '';
       
        $CurrentUserId= get_current_user_id();
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
            $this->errors['product_id'] = __( 'Please Select Some Products' , 'perdays-addon' );
        }
        
        if ( empty( $summeryOfOrder ) ){
            $this->errors['summery_of_order'] = __( 'Please provide a Summery Of Order' , 'perdays-addon' );
        }

        if ( ! empty( $this->errors ) ) {
            return;
        }

        $inserted_id = $this->insert_customer_details([
            // 'user_id' => $CurrentUserId,
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
            'product_id' => $productID,
            'summery_of_order' => $summeryOfOrder
        ]);

        if ( is_wp_error( $inserted_id ) ) {
            wp_die( $inserted_id->get_error_massage() );
        }
        wp_redirect( get_permalink() );

        exit;

    }


}

