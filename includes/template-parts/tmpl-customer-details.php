<!-- MultiStep Form -->
<?php 
$saved_items = get_proudct_item( $type = 'product' );

?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form id="msform">
            <!-- progressbar -->
            <ul id="progressbar">
                <li class="active">Customer Details</li>
                <li>Product</li>
                <li>Order Summery</li>
            </ul>
            <!-- fieldsets -->
            <fieldset>
                <h2 class="fs-title">Customer Details</h2>
                <h3 class="fs-subtitle">Tell us something more about you</h3>
                <!-- <input type="text" name="fname" placeholder="First Name"/>
                <input type="text" name="lname" placeholder="Last Name"/>
                <input type="text" name="phone" placeholder="Phone"/> -->

                <label for="name"><?php _e( 'Name', 'perdays-addon' ); ?></label>
                <input type="text" name="name" id="name" class="regular-text" value="" placeholder="Full Name">

                <label for="phone"><?php _e( 'Phone', 'perdays-addon' ); ?></label>
                <input type="text" name="phone" id="phone" class="regular-text" value="" placeholder="Phone Number">

                <label for="email"><?php _e( 'E-mail', 'perdays-addon' ); ?></label>
                <input type="email" name="email" id="email" class="regular-text" value="" placeholder="Email" >

                <label for="address"><?php _e( 'Address', 'perdays-addon' ); ?></label>
                <textarea class="regular-text" name="address" id="address"  placeholder="Address" ></textarea>

                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset>
                <div class="produt-div">
                     
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
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Order Summery</h2>
                <h3 class="fs-subtitle">Add Details About Order</h3>
                <label for="summery_of_order"><?php _e( 'Summery of Order', 'perdays-addon' ); ?></label>
                    <textarea class="regular-text" name="summery_of_order" id="summery_of_order" placeholder="Order Summery"></textarea>
                    <?php wp_nonce_field( 'perdays-customer-details' ) ;?>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>

                <input type="submit" id="perdays_submit_customer_details" name="perdays_submit_customer_details" class="submit primary action-button" value="Submit"/>
            </fieldset>
        </form>

    </div>
</div>
<!-- /.MultiStep Form -->