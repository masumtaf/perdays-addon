<?php 
/**
 * PerDays-Addon helpers functions
 *
 * @package PerDays addon
 * @since 1.0.0
 */



defined( 'ABSPATH' ) || exit;

//Tempalte Include Fucntion

if (!function_exists('perdays_get_template')) :
    function perdays_get_template($template_name = null)
    {
        $template_path = apply_filters('perday-addon/template-path', '/includes/template-parts/');
        $template = locate_template($template_path . $template_name);
        if (!$template) {
            $template = PEDN_INCLUDES  . '/template-parts/' . $template_name;
        }
        if (file_exists($template)) {
            return $template;
        } else {
            return false;
        }

    }
endif;

	/**
	 *  Get All Product 
	 *
	 *  @param string $type Type.
	 *  @since 0.0.1
	 *  @return string
	 */
	function get_proudct_item( $type = 'product' ) {
		$products = get_posts(
			array(
				'post_type'        => $type,
				'orderby'          => 'title',
				'order'            => 'ASC',
				'posts_per_page'   => '-1',
			)
		);
	
		$productsVal = array();

		foreach ( $products as $product ) :
			$productsVal[] = array(
				'id'   => $product->ID,
				'slug' => $product->post_name,
				'name' => $product->post_title,
				'post_author' => $product->post_author
			);
		endforeach;

		return $productsVal;
	}

	/**
	 *  Get Product List
	 *
	 *  @param string $type Type.
	 *  @since 0.0.1
	 *  @return string
	 */
	function get_product_in_select($type = 'product') {

		$productID = !empty($_POST['product_id']) ? esc_attr(wp_unslash($_POST['product_id'])) : null;

		$saved_items = get_proudct_item( $type );
		echo '<select id="pstep-products" class="pstep-product-list" name="product_id">';
		echo '<option value="0">'. esc_html('Select Product' ) .'</option>';
		if ( count( $saved_items ) ) :
			foreach ( $saved_items as $item ) :
				echo '<option value="'. $item['id'] .'">'. $item['name'] .'</option>';
			endforeach;
		else :
			echo $options = __( 'No section template is added.', 'exclusive-addons-elementor' );
		endif;
		
		echo '<select class="product-list">';
		
	}