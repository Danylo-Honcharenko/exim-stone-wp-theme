<?php
defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_mini_cart' ); ?>

<div class="widget_shopping_cart_content">
	<?php if ( WC()->cart && ! WC()->cart->is_empty() ) : ?>
    <div class="d-flex flex-column gap-3">
		<?php
		do_action( 'woocommerce_before_mini_cart_contents' );
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				/**
				 * This filter is documented in woocommerce/templates/cart/cart.php.
				 *
				 * @since 2.1.0
				 */
				$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
				$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
				$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
				$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
				$delete_link = apply_filters(
					'woocommerce_cart_item_remove_link',
					sprintf(
						'<a href="%s" class="remove remove_from_cart_button link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s" data-success_message="%s">Удалить</a>',
						esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
						esc_attr( sprintf( __( 'Remove %s from cart', 'woocommerce' ), wp_strip_all_tags( $product_name ) ) ),
						esc_attr( $product_id ),
						esc_attr( $cart_item_key ),
						esc_attr( $_product->get_sku() ),
						esc_attr( sprintf( __( '&ldquo;%s&rdquo; has been removed from your cart', 'woocommerce' ), wp_strip_all_tags( $product_name ) ) )
					),
					$cart_item_key
				);
				?>
				<div>
					<div class="d-flex align-items-start gap-3">
						<div>
							<?php echo $thumbnail ?>
						</div>
						<div>
							<p class="m-0"><?php echo wp_kses_post( $product_name ) ?></p>
							<p class="m-0"><?php echo sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ); ?></p>
							<p><?php echo $delete_link ?></p>
						</div>
					</div>
				</div>
				<?php
			}
		}

		do_action( 'woocommerce_mini_cart_contents' );
		?>
    </div>
        <div>
            <div>
                <hr>
                <p class="fs-5">Итого: <?php echo WC()->cart->get_cart_contents_total() ?>$</p>
                <hr>
            </div>
            <div class="d-flex flex-column gap-2">
                <a href="<?php echo wc_get_cart_url() ?>">
                    <button class="btn btn-primary w-100">Просмотр корзины</button>
                </a>
                <a href="<?php echo wc_get_checkout_url() ?>">
                    <button class="btn btn-primary w-100">Перейти к оформлению</button>
                </a>
            </div>
        </div>
	<?php else : ?>

		<p class="woocommerce-mini-cart__empty-message"><?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?></p>

	<?php endif; ?>

	<?php do_action( 'woocommerce_after_mini_cart' ); ?>
</div>