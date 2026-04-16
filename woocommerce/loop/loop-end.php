<?php
/**
 * Product Loop End
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-end.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<?php if ( is_archive() ) : ?>
	</div>
<?php else : ?>
	</div>
	<button class="swiper-slide-button-left swiper-button-prev rounded-circle" type="button" id="swiper-items-prev"></button>
	<button class="swiper-slide-button-right swiper-button-next rounded-circle"  type="button" id="swiper-items-next"></button>
	</div>
	</section>
<?php endif; ?>