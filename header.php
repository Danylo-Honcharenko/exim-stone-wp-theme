<?php
    $custom_content_text = get_theme_mods();
?>

<!doctype html>
<html <?php language_attributes();?> >
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php wp_head();?>
</head>
<body <?php body_class("bg-primary");?>>
<?php wp_body_open(); ?>

<header class="bg-primary">
    <div class="border-bottom">
        <div class="d-flex align-items-center pt-3 pb-3 container-xxl justify-content-between">
            <div class="text-light align-items-center gap-4 flex-wrap top-bar-container">
                <div><h3 class="fw-lighter m-0"><?php bloginfo('name'); ?></h3></div>
                <div><p class="m-0 slogan"><?php echo $custom_content_text['eximstone_slogan'] ?></p></div>
            </div>
            <div class="search-container">
                <?php aws_get_search_form( true ); ?>
            </div>
        </div>
    </div>
    <div class="border-bottom">
        <div class="container-xxl d-flex align-items-center justify-content-between" id="main-menu-container">
            <nav class="navbar navbar-expand-lg">
                <div class="d-flex">
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasMobileMenu" aria-controls="offcanvasMobileMenu"
                            aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="offcanvas offcanvas-start menu bg-primary overflow-auto" data-bs-scroll="false"
                         tabindex="-1" id="offcanvasMobileMenu" aria-labelledby="offcanvasMobileMenuLabel">
                        <div class="offcanvas-header"><h2 class="offcanvas-title fw-lighter"
                                                          id="offcanvasMobileMenuLabel"><?php bloginfo('name'); ?></h2>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div>
                                <?php aws_get_search_form( true ); ?>
                            </div>
                            <?php wp_nav_menu( array(
                                    'theme_location' => 'header-menu',
                                    'menu_class'     => 'navbar-nav me-auto mt-3 mb-lg-0 text-uppercase',
                                    'container'      => false,
                                    'walker'         => new Header_Mobile_Walker_Menu()
                            ) ); ?>
                        </div>
                    </div>
                    <a class="navbar-brand" href="<?php echo home_url('/') ?>"><img src="<?php echo get_template_directory_uri() . '/assets/img/granit.in_.ua_%201.png' ?>" alt="Logo" width="75"
                                                          height="75" class="d-inline-block align-text-top"></a>
                    <div class="collapse navbar-collapse" id="main-menu">
                        <?php wp_nav_menu( array(
                                'theme_location' => 'header-menu',
                                'menu_class'     => 'navbar-nav mb-2 mb-lg-0 gap-3',
                                'container'      => false,
                                'walker'         => new Header_Walker_Menu()
                        ) ); ?>
                    </div>
                </div>
            </nav>
            <div class="d-flex align-items-center gap-3">
<!--                <div>-->
<!--                    <button type="button" class="user-icon" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLogin"-->
<!--                            aria-controls="offcanvasLogin"></button>-->
<!--                    <div class="offcanvas offcanvas-end bg-primary" data-bs-scroll="false" tabindex="-1"-->
<!--                         id="offcanvasLogin" aria-labelledby="offcanvasLoginLabel">-->
<!--                        <div class="offcanvas-header offcanvas-header-end">-->
<!--                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"-->
<!--                                    aria-label="Close"></button>-->
<!--                            <h3 class="offcanvas-title fw-lighter" id="offcanvasLoginLabel">Вход</h3></div>-->
<!--                        <div class="offcanvas-body">-->
<!--                            <form>-->
<!--                                <div class="mb-3"><label for="exampleInputEmail1" class="form-label">Email адрес</label>-->
<!--                                    <input type="email" class="form-control login-input" id="exampleInputEmail1"-->
<!--                                           aria-describedby="emailHelp"></div>-->
<!--                                <div class="mb-3"><label for="exampleInputPassword1" class="form-label">Пароль</label>-->
<!--                                    <input type="password" class="form-control login-input" id="exampleInputPassword1">-->
<!--                                </div>-->
<!--                                <button type="submit" class="btn btn-primary w-100">Войти</button>-->
<!--                            </form>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div>-->
<!--                    <button type="button" class="heart-icon position-relative" data-bs-toggle="offcanvas"-->
<!--                            data-bs-target="#offcanvasWishlist" aria-controls="offcanvasWishlist"><span-->
<!--                                class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-light text-dark">0</span>-->
<!--                    </button>-->
<!--                    <div class="offcanvas offcanvas-end bg-primary" data-bs-scroll="false" tabindex="-1"-->
<!--                         id="offcanvasWishlist" aria-labelledby="offcanvasWishlistLabel">-->
<!--                        <div class="offcanvas-header offcanvas-header-end">-->
<!--                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"-->
<!--                                    aria-label="Close"></button>-->
<!--                            <h3 class="offcanvas-title fw-lighter" id="offcanvasWishlistLabel">Список желаний</h3></div>-->
<!--                        <div class="offcanvas-body d-flex flex-column justify-content-between">-->
<!--                            <div class="d-flex flex-column gap-3">-->
<!--                                <div>-->
<!--                                    <div class="d-flex align-items-start gap-3">-->
<!--                                        <div><img src="./assets/sofia_granit.png" class="img-fluid" alt="Товар"-->
<!--                                                  width="80px"></div>-->
<!--                                        <div><p class="m-0">Софиевский гранит</p>-->
<!--                                            <p class="m-0">1,200 грн</p>-->
<!--                                            <p><a href="#"-->
<!--                                                  class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Удалить</a>-->
<!--                                            </p></div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div>-->
<!--                                    <div class="d-flex align-items-start gap-3">-->
<!--                                        <div><img src="./assets/sofia_granit.png" class="img-fluid" alt="Товар"-->
<!--                                                  width="80px"></div>-->
<!--                                        <div><p class="m-0">Софиевский гранит</p>-->
<!--                                            <p class="m-0">1,200 грн</p>-->
<!--                                            <p><a href="#"-->
<!--                                                  class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Удалить</a>-->
<!--                                            </p></div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div></div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
                <?php if ( ! (is_cart() || is_checkout()) ) : ?>
                    <div>
                        <button type="button" class="cart-icon position-relative" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                        <span class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-danger cart-badge">
                            <?php echo WC()->cart->get_cart_contents_count() ?>
                        </span>
                        </button>
                        <div class="offcanvas offcanvas-end bg-primary" data-bs-scroll="false" tabindex="-1"
                             id="offcanvasCart" aria-labelledby="offcanvasCartLabel">
                            <div class="offcanvas-header offcanvas-header-end">
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                <h3 class="offcanvas-title fw-lighter" id="offcanvasCartLabel">Корзина</h3></div>
                            <div class="offcanvas-body">
                                <?php woocommerce_mini_cart(); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="align-items-center justify-content-center catigory-container pb-2 pt-2 bottom-vr">
        <nav class="navbar navbar-expand-lg p-0">
            <div class="collapse navbar-collapse" id="navbarText2">
                <?php wp_nav_menu( array(
                        'theme_location' => 'category-menu',
                        'menu_class'     => 'navbar-nav me-auto mb-2 mb-lg-0 gap-4',
                        'container'      => false,
                        'walker'         => new Header_Walker_Menu()
                ) ); ?>
            </div>
        </nav>
        <div class="catigory-button-container">
            <button class="btn btn-primary w-100" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                    aria-controls="offcanvasBottom">Категории
            </button>
            <div class="offcanvas offcanvas-bottom bg-primary" tabindex="-1" id="offcanvasBottom"
                 aria-labelledby="offcanvasBottomLabel">
                <div class="offcanvas-header"><h3 class="offcanvas-title fw-lighter" id="offcanvasBottomLabel">
                        Категории</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body text-uppercase">
                    <?php wp_nav_menu( array(
                            'theme_location' => 'category-menu',
                            'menu_class'     => 'navbar-nav me-auto mb-2 mb-lg-0 gap-1',
                            'container'      => false,
                            'walker'         => new Header_Mobile_Walker_Menu()
                    ) ); ?>
                </div>
            </div>
        </div>
    </div>
</header>