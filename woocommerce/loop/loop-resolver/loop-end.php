<?php

global $use_slider;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ($use_slider) {
	wc_get_template( 'loop/wrappers/slider-wrapper-end.php' );
} else {
	wc_get_template( 'loop/wrappers/container-wrapper-end.php' );
}