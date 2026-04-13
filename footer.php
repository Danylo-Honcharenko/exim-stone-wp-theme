<?php
$custom_content_text = get_theme_mods();

function eximstone_remove_phone_symbols($phone): string {
    if (!empty($phone)) {
        return str_replace(['+', '-', '(', ')', ' '], ['', '', '', '', ''], $phone);
    }
    return $phone;
}

?>

<?php wp_footer();?>
<footer class="border-top mt-5 pt-md-5 pt-3">
    <div class="container-xxl text-white">
        <div class="d-md-flex align-items-start gap-5 justify-content-md-center">
            <div class="d-flex gap-4 align-items-center flex-wrap logo-footer-container">
                <div><img src="<?php echo get_template_directory_uri() . '/assets/img/granit.in_.ua_footer.png' ?>"
                          alt="..."></div>
                <div><h3 class="fw-lighter fs-1"><?php bloginfo( 'name' ); ?></h3>
                    <p><?php echo $custom_content_text['eximstone_slogan'] ?></p></div>
            </div>
            <div class="footer-menu-container"><h4>Навигация</h4>
                <?php wp_nav_menu( array(
                        'theme_location' => 'footer-menu',
                        'menu_class'     => 'list-unstyled mt-3 footer-menu',
                        'container'      => false
                ) ); ?>
            </div>
            <div>
                <h4>Контакты</h4>
                <ul class="list-unstyled mt-3 footer-contact">
                    <li class="footer-contact-item"><?php echo $custom_content_text['eximstone_addr'] ?></li>
                    <li class="footer-contact-item"><a href=<?php echo '"tel:+' . eximstone_remove_phone_symbols($custom_content_text['eximstone_phone1']) . '"' ?>><?php echo $custom_content_text['eximstone_phone1'] ?></a></li>
                    <li class="footer-contact-item"><a href=<?php echo '"tel:+' . eximstone_remove_phone_symbols($custom_content_text['eximstone_phone2']) . '"' ?>><?php echo $custom_content_text['eximstone_phone2'] ?></a></li>
                    <li class="footer-contact-item"><a href=<?php echo '"mailto:' . $custom_content_text['eximstone_email'] . '"' ?>><?php echo $custom_content_text['eximstone_email'] ?></a></li>
                    <li class="footer-contact-item"><?php echo $custom_content_text['eximstone_opening_hours'] ?></li>
                </ul>
            </div>
        </div>
        <div class="pt-md-5 pb-md-5 pt-3 pb-3">
            <hr>
            <p id="rights">Granit.in.ua © All Rigths Reserved</p></div>
    </div>
</footer>
</body>
</html>