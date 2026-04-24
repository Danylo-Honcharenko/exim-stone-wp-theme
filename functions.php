<?php
add_action( 'after_setup_theme', function () {
	// Поддержка woocommerce
	add_theme_support( 'woocommerce' );
	// lightbox
	add_theme_support( 'wc-product-gallery-lightbox' );
	// Заголовок страницы
	add_theme_support('title-tag');

	register_nav_menus( [
		'header-menu' => __( 'Header Menu' ),
		'category-menu' => __( 'Category Menu' ),
		'footer-menu' => __( 'Footer Menu' )
	] );
} );

add_action('wp_enqueue_scripts', function () {
	wp_enqueue_style('eximstonecss', get_template_directory_uri() . '/assets/css/main.3ff7e469260bbf75285b.css');
	wp_enqueue_style('eximstonewpcss', get_template_directory_uri() . '/assets/css/wp_style.css');
	wp_enqueue_style('eximstonejsdelivr', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css');
	wp_enqueue_script('eximstonefontawesome', 'https://kit.fontawesome.com/7520a8b90b.js');
	wp_enqueue_script('eximstonejs', get_template_directory_uri() . '/assets/js/main.2a83023ae8b2197517c0.js', [], '', ['strategy' => 'defer']);
});

//add_action( 'widgets_init', function () {
//	register_sidebar( array(
//		'name'          => 'Мой виджет',
//		'id'            => 'new-widget-area',
//		'before_widget' => '<div class="widget-box">',
//		'after_widget'  => '</div>',
//		'before_title'  => '<h2 class="widget-title">',
//		'after_title'   => '</h2>',
//	) );
//} );

require get_template_directory() . '/inc/class-header-walker-menu.php';
require get_template_directory() . '/inc/class-header-mobile-walker-menu.php';
require get_template_directory() . '/inc/woocommerce-hooks.php';
require get_template_directory() . '/inc/customizer.php';