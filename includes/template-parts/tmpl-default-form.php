<?php 

$current_user = wp_get_current_user();

// print_r($current_user);

if ( !empty( $current_user->display_name ) ){
    $placeholderName = $current_user->display_name;
} else {
    $placeholderName = 'Your Name';
}

if ( !empty( $current_user->user_email ) ){
    $placeholderEmail = $current_user->user_email;
} else {
    $placeholderEmail = 'Email Address';
}

if ( is_user_logged_in() ) {
	$placeholderPhone = !empty($_POST['phone']) ? esc_attr(wp_unslash($_POST['phone'])) : 'Phone Number';
	$placeholderAddress = !empty($_POST['address']) ? esc_attr(wp_unslash($_POST['address'])) : 'Address'; 
	$placeholderSummery = !empty($_POST['summery_of_order']) ? esc_attr(wp_unslash($_POST['summery_of_order'])) : 'Summery of Order';
} else {
	$placeholderPhone = 'Phone Number';
    $placeholderAddress = 'Address';
	$placeholderSummery = 'Summery of Order';
}


?>

<div class="wrap-step-form">
    <h2 class="wp-heading-inline"><?php _e( 'Customer Details Information' , 'perdays-addon' );?></h2>
    <?php //var_dump($this->errors);?> 
        <form id="perdays-form" action="<?php echo esc_url( get_permalink() ); ?>" method="post">

            <div class="input-text">
                <div class="input-div">
                    <label for="name"><?php _e( 'Name', 'perdays-addon' ); ?></label>
                    <input type="text" name="name" id="name" class="regular-text" value="" placeholder="<?php esc_attr_e( $placeholderName );?>" >
                </div>
            </div>
            <div class="input-text">
                <div class="input-div">
                    <label for="phone"><?php _e( 'Phone', 'perdays-addon' ); ?></label>
                    <input type="text" name="phone" id="phone" class="regular-text" value="" placeholder="<?php esc_attr_e($placeholderPhone); ?>" required >
                </div>
            </div>
            <div class="input-text">
                <div class="input-div">
                    <label for="email"><?php _e( 'E-mail', 'perdays-addon' ); ?></label>
                    <input type="email" name="email" id="email" class="regular-text" value="" placeholder="<?php esc_attr_e( $placeholderEmail );?>" >
                </div>
            </div>

            <div class="input-text">
                <div class="input-div">
                    <label for="address"><?php _e( 'Address', 'perdays-addon' ); ?></label>
                    <textarea class="regular-text" name="address" id="address" placeholder="<?php esc_attr_e($placeholderAddress); ?>" required ></textarea>
                </div>
            </div>      
            

            <div class="">
                <div class="input-div">
                    <?php// get_product_in_select('product') ;?>
                </div>
            
            </div>

            <div class="input-text">
                <div class="input-div">
                    <label for="summery_of_order"><?php _e( 'Summery of Order', 'perdays-addon' ); ?></label>
                    <textarea class="regular-text" name="summery_of_order" id="summery_of_order" placeholder="<?php esc_attr_e($placeholderSummery); ?>" required ></textarea>
                </div>
            </div>

            <div class="buttons button_space">
                <button class="back_button">Back</button>
                <?php wp_nonce_field( 'perdays-customer-details' ) ;?>
                <?php submit_button( __('Add Details', 'perdays-addon' ), 'primary submit_button', 'perdays_submit_customer_details' ) ?>
            </div>

    </form>

</div>