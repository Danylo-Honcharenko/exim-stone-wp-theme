<?php
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

// Уберём описание категории шаблон taxonomy-product-cat.php
add_filter('woocommerce_taxonomy_archive_description_raw', function ($description) {
	return "";
});

// Уберём метку распродажа
add_filter('woocommerce_sale_flash', function ($html, $post, $product) {
	return "";
}, 10, 3);

remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

add_action('woocommerce_before_shop_loop_item_title', function () {
	global $product;

	if ( ! ( $product instanceof WC_Product ) ) {
		return;
	}

	$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

	echo '<div>';
	echo '<a href="' . esc_url( $link ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">';
	echo woocommerce_get_product_thumbnail('', ['class' => 'card-img-top card-image']);
	echo '</a>';
	echo '</div>';

	echo '<div class="card-body">';
}, 10);

remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);

add_action('woocommerce_shop_loop_item_title', function () {
	global $product;

	$categoryIds = $product->get_category_ids();
	if (!empty($categoryIds)) {
		$term = get_term($categoryIds[0]);
		echo '<p class="card-text fw-lighter">Категория: ' . $term->name . '</p>';
	}

	echo '<h5 class="card-title woocommerce-loop-product__title text-truncate">' . get_the_title() . '</h5>';
}, 10);

remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);

add_action('woocommerce_after_shop_loop_item_title', function () {
	global $product;
	if ( $price_html = $product->get_price_html() ) {
		echo '<p class="card-text">' . $price_html . '</p>';
	}
}, 10);

add_action('woocommerce_after_shop_loop_item', function () {
	echo '</div>';
}, 10);

remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

add_filter('woocommerce_show_page_title', '__return_false');

remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);

add_filter('woocommerce_cart_item_thumbnail', function($thumbnail, $cart_item, $cart_item_key) {
	return str_replace('img', 'img class="cart-thumbnail"', $thumbnail);
}, 10, 3);

add_filter('woocommerce_add_to_cart_fragments', function($fragments) {
	$fragments['span.cart-badge'] = '<span class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-danger cart-badge">' . WC()->cart->get_cart_contents_count() . '</span>';
	return $fragments;
});

//add_filter('woocommerce_single_product_image_thumbnail_html', function($html, $post_id) {
//	return str_replace('class="woocommerce-product-gallery__image', 'class="woocommerce-product-gallery__image swiper-slide', $html);
//}, 10, 2);

add_filter('woocommerce_gallery_image_html_attachment_image_params', function ($params) {
	$params['class'] = 'img-fluid';
	$params['style'] = 'min-width: 5rem';
	return $params;
});

add_filter('woocommerce_dropdown_variation_attribute_options_args', function ($args) {
	$args['class'] = 'form-select';
	return $args;
});

add_action( 'comment_form_fields', function ($comment_fields) {
	$order = array( 'author', 'email', 'comment' );

	$new_fields = array();

	foreach( $order as $index ) {
		$new_fields[ $index ] = $comment_fields[ $index ];
	}

	return $new_fields;
}, 25 );

remove_action('woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20);

add_action('woocommerce_proceed_to_checkout', function($cart) {
	echo '<a href="'.wc_get_checkout_url().'"><button class="btn btn-primary w-100">Перейти к оформлению</button></a>';
});

remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');


add_filter( 'woocommerce_form_field_args', function ( $args, $key, $value = null ) {
	if ($key === 'billing_country') {
		$args['class'][] = 'custom-class';
	}
	$args['input_class'][] = 'form-control login-input';
	$args['label_class'][] = 'form-label';
	return $args;
}, 10, 3 );


add_filter('woocommerce_order_button_html', function($button_html) {
	return str_replace('class="button alt', 'class="button alt btn btn-primary w-100', $button_html);
});

add_filter( 'excerpt_length', function($length) {
	return 200;
} );