<?php

$current_user = wp_get_current_user();

$saved_items = get_proudct_item( $type = 'product' );

?>



<div class="from-container">
    <div class="card">
        <div class="form">
            <div class="left-side">
                <div class="left-heading">
                    <h3>Customer Details</h3>
                </div>
                <div class="steps-content">
                    <h3>Step <span class="step-number">1</span></h3>
                    <p class="step-number-content active">Enter your details information to get closer to companies.</p>
                    <p class="step-number-content d-none">Get to know better by adding your diploma,certificate and education life.</p>
                    <p class="step-number-content d-none">Help companies get to know you better by telling then about your past experiences.</p>
                    <p class="step-number-content d-none">Add your profile piccture and let companies find youy fast.</p>
                </div>
                <ul class="progress-bar">
                    <li class="active">Customer Information</li>
                    <li>products</li>
                    <li>Summery of Order</li>
                </ul>
            </div>

            <div class="right-side">
            <form id="perdays-form" action="" method="post">
                <div class="main active">
                    <div class="text">
                        <h2>Your Personal Information</h2>
                        <p>Enter your personal information to get closer to copanies.</p>
                    </div>
                
                    <div class="input-text">
                        <div class="input-div">
                            <label for="name"><?php _e( 'Name', 'perdays-addon' ); ?></label>
                            <input type="text" name="name" id="name" class="regular-text" value="" placeholder="Full Name" required require>
                        </div>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <label for="phone"><?php _e( 'Phone', 'perdays-addon' ); ?></label>
                            <input type="text" name="phone" id="phone" class="regular-text" value="" placeholder="Phone Number" required require>
                        </div>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <label for="email"><?php _e( 'E-mail', 'perdays-addon' ); ?></label>
                            <input type="email" name="email" id="email" class="regular-text" value="" placeholder="Email" required require>
                        </div>
                    </div>

                    <div class="input-text">
                        <div class="input-div">
                            <label for="address"><?php _e( 'Address', 'perdays-addon' ); ?></label>
                            <textarea class="regular-text" name="address" id="address" placeholder="Address"></textarea>
                        </div>
                    </div>   
                    <div class="buttons">
                        <input type="button" name="next" class="button next next_button" value="Next Step"/>
                    </div>
                </div>

                <div class="main">
                    <div class="text">
                        <h2>Products</h2>
                        <p>Please Select Some Products.</p>
                    </div>
                    <div class="">
                        <div class="input-div">
                            <select id="pstep-products" class="pstep-product-list" name="prd_id[]" multiple="multiple">
                                <?php
                                    if ( count( $saved_items ) ) :
                                        foreach ( $saved_items as $item ) : ?>
                                            <option value="<?php echo esc_attr($item['id']) ;?>"><?php echo esc_html($item['name']) ;?></option>
                                        <?php  endforeach;
                                    else :
                                        echo $options = __( 'No section template is added.', 'exclusive-addons-elementor' );
                                    endif; 
                                ?>
                            </select>
                        </div>
                    </div>
                  
                    <div class="buttons button_space">
                        <input type="button" name="previous" class="button back_button" value="Previous"/>
                        <input type="button" name="next" class="button next next_button" value="Next Step"/>
                    </div>
                </div>
           
                <div class="main">
             
                    <div class="text">
                        <h2>Summery of Order</h2>
                        <p>Please Add Summery of Order</p>
                    </div>

                    <div class="input-text">
                        <div class="input-div">
                            <label for="summery_of_order"><?php _e( 'Summery of Order', 'perdays-addon' ); ?></label>
                            <textarea class="regular-text" name="summery_of_order" id="summery_of_order" placeholder="Summery of Order"></textarea>
                        </div>
                    </div>
                 
                    <div class="buttons button_space">
                    <?php wp_nonce_field( 'perdays-customer-details' ) ;?>
                        <input type="button" name="previous" class="button back_button" value="Previous"/>
                        <input type="submit" id="perdays_submit_customer_details" name="perdays_submit_customer_details" class="submit_buttonsubmit primary" value="Place order"/>
                    </div>
                </div>
                <div class="main">
                     <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                         <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                        <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                    </svg>
                     
                    <div class="text congrats">
                        <h2>Congratulations!</h2>
                        <p>Thanks Mr./Mrs. <span class="shown_name"></span> your information have been submitted successfully for the future reference we will contact you soon.</p>
                    </div>
                </div>
                </form>

             
            </div>
        </div>
    </div>
</div>