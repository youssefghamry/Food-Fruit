<?php
/**
 * Created by Sublime Text 2.
 * User: thanhhiep992
 * Date: 13/08/15
 * Time: 10:20 AM
 */
$main_color = s7upf_get_value_by_id('main_color');
$secondary_color = s7upf_get_value_by_id('secondary_color');
$bg_page = s7upf_get_value_by_id('bg_page');
?>
<?php
$style = '';

/*****BEGIN MAIN COLOR*****/
if(!empty($main_color)){
	$style .= '.list-cat-mega-menu a.active,.item-post15 .category-blog8 a:hover,.menu-header-16 .search-form.search-form3::after, .menu-header-16 .mini-cart-icon,.mb-social-style3 li a,.item-post15:hover .comment,.comment-box15 a.white:hover,.account-manager.color-white-link2 > ul > li > a:hover .color,.account-manager.color-white-link2 > ul > li > a:hover,.info-account .dropdown-list li a:hover,.info-account .dropdown-list li a i,.main-nav .sub-menu > li.current-menu-ancestor > a, .main-nav .sub-menu > li.active > a,.product-extra-link a.wishlist-link.added,.newsletter-box10.color .title30 i,.nav-header9 .main-nav > ul > li:hover > a,.nav-header9 .top-social a,.deal-timer,.blockquote p::before,.element-menu-style4 .main-nav > ul > li:hover > a,.gm-style-iw .title-map,.list-cat-mega-menu ul li a:hover,.element-menu-style3 .main-nav > ul > li:hover > a,.main-nav.main-nav8 .sub-menu > li.active > a,.main-nav.main-nav8 > ul > li.current-menu-parent > a,.mb-element-product-style14 a.text-color:hover,.element-menu-default .main-nav > ul > li:hover > a,.rotate-number.style1,.woocommerce-thankyou-order-received,.woocommerce div.product .woocommerce-tabs .panel .woocommerce-Reviews .woocommerce-Reviews-title span,.woocommerce div.product .woocommerce-tabs .panel h2,.product-detail .product_meta .posted_in a, .product-detail .product_meta .tagged_as a,.product-detail .detail-info .price .woocommerce-Price-amount,.widget ul li .count,.widget_s7upf_list_products .price,.mb-comment ul.comments-list .item-comment .post-date-comment li .comment-reply-link:hover,.mb-comment ul.comments-list .item-comment .post-date-comment li .comment-reply-link:before,.main-content-single .single-post-control .post-control-prev > a,.main-content-single .single-post-control .post-control-next > a,.mb-category a,.bread-crumb a:hover,.mb-item-blog-list .mb-category a,.element-menu-style4 ul li.active > a,.element-menu-style4 .mb-menu-root > li.current-menu-ancestor > a,.menu-footer2 a,.mb-google-map .control-mask i,.mb-header-default .main-nav .mb-menu-root li li.active a,.mb-header-default ul ul li a:hover,.item-popcat3:hover .btn-arrow.style2.color2,.title-tab-icon3 li.active a,.element-menu-style3 .mb-menu-root > li.current-menu-ancestor > a,.email-form2 > i,.item-farm .top-social a,.mb-element-product-style4 a.add_to_cart_button:hover, .mb-element-product-style6 a.add_to_cart_button:hover, .mb-element-product-style4 a.addcart-link:hover, .mb-element-product-style6 a.addcart-link:hover,.mb-element-product-style4 a.add_to_cart_button, .mb-element-product-style6 a.add_to_cart_button, .mb-element-product-style4 a.addcart-link, .mb-element-product-style6 a.addcart-link,.item-service1 .service-icon a,.days-countdown .time_circles > div .text,.product-extra-link a:hover,.woocommerce div.product span.price,.mb-menu-root a:hover,.mb-menu-root a:focus, .info-account a:hover,.info-account a:focus,.currency-language a:hover, .currency-language a:focus , .list-mini-cart-item .mini-cart-qty,.color,.live-search-on .list-product-search .item-search-pro .product-info .product-price,.product-title a:hover,.search-form input[type="submit"], .search-form::after, a:hover, a:focus
    {color:'.$main_color.'}'."\n";
    $style .= '.btn-video-css,.client-say18 .owl-theme .owl-controls .active span,.mini-cart-header18,.mini-cart-header18 .mini-cart-link,.box-client16 .owl-theme .owl-controls .owl-page.active span,.button-style16-2:after,.button-style16-2:hover,.mb-social-style3 li a:hover,.top-footer-15 .title h3,.top-footer-15 .title-social h3,.item-post15 .quickview-link,.blog-slider15 .owl-theme .owl-controls .owl-buttons div,.breakfast-product15 .owl-theme .owl-controls .owl-buttons div,.shop-button-2:hover,.product-coundown15 .owl-theme .owl-controls .owl-buttons div,.shop-button-2.style2.btn-arrow::after,.banner-slider15 .banner-info .shop-button-2:hover,.vendor-dashboard-settings form input[type="submit"],form[name="export_orders"] input[type="submit"],.dashboard-reports form input.btn,.dashboard-links .button,.woocommerce button.button[name="update_cart"], .newsletter-box10.color .email-form input[type="submit"],.nav-header9 .top-social a:hover,.dm-button,.list-diet .mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,.banner-slider3 .btn-arrow.style2.color2:hover,.item-slider7 .btn-arrow.bg-color2, .banner-slider.banner-slider6 .owl-theme .owl-controls .owl-buttons div:hover,.element-menu-style5.fixed-ontop,.element-menu-style5 .mini-cart-link,.diet-thumb a::after,.main-nav .toggle-mobile-menu span, .main-nav .toggle-mobile-menu::before, .main-nav .toggle-mobile-menu::after,.content-popup input[type="submit"],.preload #loading,#add_payment_method #payment, .woocommerce-cart #payment, .woocommerce-checkout #payment,.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,.mb-gallery-product .gallery-control .next:hover, .mb-gallery-product .gallery-control .prev:hover,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content,.widget_product_tag_cloud a:hover, .widget_tag_cloud a:hover,.main-nav.main-nav1 > ul > li.current-menu-item > a,.woocommerce span.onsale,.main-content-single .single-post-control .post-control-prev > a:hover,.main-content-single .single-post-control .post-control-next > a:hover,.main-content-single .single-post-control .post-control-next > a:hover,body .scroll-top,.menu-footer li::before,.btn-arrow.white:hover,.item-service4 .service-icon a,.mb-blog-element-style4 .post-info ul li a,.mb-header-default .main-nav .mb-menu-root > li.current-menu-ancestor > a,.item-popcat3:hover .btn-arrow.style2.color2::after,.title-tab1 li.active a,.item-service1 .service-icon a.color2:hover,.email-form2 input[type="submit"],.farm-slider.banner-slider .owl-theme .owl-controls .owl-buttons div:hover,.item-client2 .desc::before,.days-countdown .time_circles > div .text::before,.owl-theme .owl-controls .owl-buttons div:hover,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.title-tab-icon li.active a, .title-tab-icon li a:hover,.btn-viewall.color::before,.cat-menu2 li a:hover span,.banner-slider .owl-theme .owl-controls .owl-buttons div:hover, .element-menu-style2.fixed-ontop,.btn-arrow.color:hover,.btn-arrow.style2.bg-color,.btn-arrow.style2::after,.bg-color, .shop-button,.product-thumb > .quickview-link, .gal-content3 .btn-gal,.live-search-on .list-product-search .item-search-pro .product-thumb .quickview-link,.dropdown-list li a:hover, .language-list li a:hover, .list-profile li a:hover, .currency-list li a:hover
    {background:'.$main_color.'}'."\n";
    $style .= '.pagibar > a:hover, .pagibar > a.current-page,.pagibar > .page-numbers.current,.view-bar a.active
    {background-color:'.$main_color.'}'."\n";
    $style .= '.breakfast-product15 .item-product-grid:hover,.list-instagram a:hover img,.reservations-box18,.mini-cart-header18 .mini-cart-link,.intagram15 .title-link span,.footer-box15 .title-link span,.footer-box15 .menu-footer-box li:before,.mb-social-style3 li a,.item-post15:hover,.product-extra-link a.wishlist-link.added,.newsletter-box10.color .email-form input[type="submit"],.nav-header9 .top-social a,.deal-timer,.banner-slider3 .btn-arrow.style2.color2:hover,.border-main-color,.pop-cat8,.diet-thumb a,.rotate-number.style1,.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,.mb-gallery-product .gallery-control .next:hover, .mb-gallery-product .gallery-control .prev:hover,.pagibar > a:hover, .pagibar > a.current-page,.pagibar > .page-numbers.current,.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content .ui-slider-handle,.view-bar a.active,.main-content-single .single-post-control .post-control-prev > a,.main-content-single .single-post-control .post-control-next > a,.btn-arrow.white:hover,.item-popcat3:hover .btn-arrow.style2.color2,.title-tab1 li.active a,.item-service1 .service-icon a.color2:hover,.element-menu-style3 .mb-menu-root > li.current-menu-ancestor > a,.item-farm .top-social a:hover,.item-farm .farm-info,.farm-slider.banner-slider .owl-theme .owl-controls .owl-buttons div:hover,.item-client2 .client-thumb a img, .client-thumb a, .item-service1 .service-icon a::before,.item-service1 .service-icon a,.owl-theme .owl-controls .owl-buttons div:hover,.product-extra-link a:hover,.title-tab-icon li a,.cat-menu2 li a:hover span,.line-space::before, .line-space::after,.btn-arrow.color
    {border-color:'.$main_color.'}'."\n";
    list($r, $g, $b) = sscanf($main_color, "#%02x%02x%02x");
    $style .= '.item-product15 .product-info
    {background-color: rgba('.$r.','.$g.','.$b.', 0.8)}'."\n";

    $style .= '.main-nav.active > ul::-webkit-scrollbar-thumb,.list-mini-cart-item::-webkit-scrollbar-thumb
    {background-image: -webkit-gradient(linear, 40% 0%, 75% 84%, from('.$main_color.'), to('.$main_color.'), color-stop(0.6,'.$main_color.'))}'."\n";

    $style .= '.mask
    {background:'.$main_color.';opacity:0.5}'."\n";
    $style .= '@media (max-width: 767px) {
    .bg-color.hnav-header2,.main-nav.main-nav1 > ul > li.current-menu-item > a,.mb-header-default .main-nav .mb-menu-root > li.current-menu-ancestor > a
    {background:transparent;}
    }'."\n";
    $style .= '@media (max-width: 767px) {
     .main-nav > ul > li:hover > a,.main-nav > ul li.active > a, .mb-menu-root > li.current-menu-ancestor > a,.element-menu-style3 .mb-menu-root  li.active > a,.element-menu-style3 .mb-menu-root > li.current-menu-ancestor > a,.main-nav.main-nav1 > ul > li.current-menu-item > a,.mb-header-default .main-nav .mb-menu-root > li.current-menu-ancestor > a
    {color:'.$main_color.'!important;}
    .nav-header ul li a {
            color: #555!important;
        }
    }'."\n";
}
/*****END MAIN COLOR*****/

/*****BEGIN Secondary Color*****/
if(!empty($secondary_color)){
	$style .= '.custom-color-blog17 a:hover,.custom-color-blog17 .color, .custom-color-blog17 .item-post15:hover .comment, .custom-color-blog17 .item-post15 .category-blog8 a:hover,.list-content-style3 .item-menu-info h3,.banner-product-17 .btn-arrow.dark:hover,.top-header-link li a:hover,.bg-color .currency-language > li > div > a:hover, .bg-color .info-account > li > a:hover,.account-manager.color-white-link > ul > li > a:hover,.color-secondary, .search-form.search-form3::after,.item-service1 .service-icon a.color2,.btn-viewall.color:hover,.color2
    {color:'.$secondary_color.'}'."\n";
	$style .= '.custom-color-blog17 .item-post15:hover,.banner-product-17 .btn-arrow.dark:hover,.list-advs15 .col-sm-4,.vendor-dashboard-settings form input[type="submit"]:hover,.nav-header10 .top-social a,.nav-header10 .top-social a ,.element-menu-style2.nav-header10 .mb-menu-root > li.current-menu-ancestor > a, .btn-arrow.style2.color2
    {border-color:'.$secondary_color.'}'."\n";
    $style .= '.btn-video-css:hover.custom-color-blog17 .item-post15 .quickview-link,.custom-color-blog17 .bg-color, .custom-color-blog17 .blog-slider15 .owl-theme .owl-controls .owl-buttons div,.client-home-17 .owl-theme .owl-controls .owl-pagination .active span,.menu-header-16 .mini-cart-number,.button-style16-1:after,.button-style16-1:hover,.upcoming-box .shop-button-1.style2::after,.banner-slider15 .banner-info .shop-button-1:hover,.upcoming-box .shop-button-1.style2:hover,.banner-slider15 .banner-info .shop-button-1::after,.upcoming-box .title-box h3 a,.upcoming-box .shop-button-1.style2:hover,form[name="export_orders"] input[type="submit"]:hover,.dashboard-reports form input.btn:hover,.dashboard-links .button:hover,.woocommerce button.button[name="update_cart"]:hover,.btn-arrow.bg-color2,.nav-header10 .top-social a:hover,.element-menu-style2.nav-header10 .mb-menu-root > li.current-menu-ancestor > a, .bg-color2,.item-popcat3:hover .popcat-info3,.btn-arrow.style2.color2::after,.mb-element-product-style13-2 .title-tab1 li::after, .bg-secondary, .element-menu-style5 .mini-cart-link .mini-cart-number,.btn-arrow.bg-color2:hover,.content-popup input[type="submit"]:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.mb-blog-element-style4 .post-info ul li a:hover,.product-label.sale-label,.fruit-list-cat .btn-viewall.color:hover::before,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.fruit-list-cat .btn-viewall.color:hover::before,.btn-arrow.style2.bg-color:hover,.shop-button:hover,.product-thumb > .quickview-link:hover, .gal-content3 .btn-gal:hover
    {background:'.$secondary_color.'}'."\n";

}
/*****END MAIN COLOR*****/
if(!empty($bg_page)){
    $style .= '.wrap > .main-wrapper
    {background:'.$bg_page.'}'."\n";
}
/*****BEGIN CUSTOM CSS*****/
$custom_css = s7upf_get_option('custom_css');
if(!empty($custom_css)){
    $style .= $custom_css."\n";
}

/*****END CUSTOM CSS*****/

/*****BEGIN MENU COLOR*****/
$menu_color = s7upf_get_option('s7upf_menu_color');
$menu_hover = s7upf_get_option('s7upf_menu_color_hover');
$menu_active = s7upf_get_option('s7upf_menu_color_active');
if(is_array($menu_color) && !empty($menu_color)){
    $style .= '.mb-menu-root>li a{';

    if(!empty($menu_color['font-family'])) $style .= 'font-family:'.$menu_color['font-family'].';';
    if(!empty($menu_color['font-size'])) $style .= 'font-size:'.$menu_color['font-size'].'!important;';
    if(!empty($menu_color['font-style'])) $style .= 'font-style:'.$menu_color['font-style'].';';
    if(!empty($menu_color['font-variant'])) $style .= 'font-variant:'.$menu_color['font-variant'].';';
    if(!empty($menu_color['font-weight'])) $style .= 'font-weight:'.$menu_color['font-weight'].';';
    if(!empty($menu_color['letter-spacing'])) $style .= 'letter-spacing:'.$menu_color['letter-spacing'].';';
    if(!empty($menu_color['line-height'])) $style .= 'line-height:'.$menu_color['line-height'].';';
    if(!empty($menu_color['text-decoration'])) $style .= 'text-decoration:'.$menu_color['text-decoration'].';';
    if(!empty($menu_color['text-transform'])) $style .= 'text-transform:'.$menu_color['text-transform'].';';
    $style .= '}'."\n";
}
if(!empty($menu_hover)){
    $style .= 'nav>li>a:hover{color:'.$menu_hover.'}'."\n";
    $style .= 'nav>li>a:hover{background-color:'.$menu_hover.'}'."\n";
}
if(!empty($menu_active)){
    $style .= 'nav li.parent-current-menu-item>a{color:'.$menu_active.'}'."\n";
    $style .= 'nav li.current-menu-item >a{background-color:'.$menu_active.'}'."\n";
}

/*****END MENU COLOR*****/

/*****BEGIN TYPOGRAPHY*****/
$typo_data = s7upf_get_option('s7upf_custom_typography');
if(is_array($typo_data) && !empty($typo_data)){
    foreach ($typo_data as $value) {
        switch ($value['typo_area']) {
            case 'header':
                $style_class = '.site-header';
                break;

            case 'footer':
                $style_class = '.site-footer';
                break;

            case 'widget':
                $style_class = '.widget';
                break;
            
            default:
                $style_class = '#main-content';
                break;
        }
        $class_array = explode(',', $style_class);
        $new_class = '';
        if(is_array($class_array)){
            foreach ($class_array as $prefix) {
                $new_class .= $prefix.' '.$value['typo_heading'].',';
            }
        }
        if(!empty($new_class)) $style .= $new_class.' .nocss{';
        if(!empty($value['typography_style']['font-color'])) $style .= 'color:'.$value['typography_style']['font-color'].';';
        if(!empty($value['typography_style']['font-family'])) $style .= 'font-family:'.$value['typography_style']['font-family'].';';
        if(!empty($value['typography_style']['font-size'])) $style .= 'font-size:'.$value['typography_style']['font-size'].';';
        if(!empty($value['typography_style']['font-style'])) $style .= 'font-style:'.$value['typography_style']['font-style'].';';
        if(!empty($value['typography_style']['font-variant'])) $style .= 'font-variant:'.$value['typography_style']['font-variant'].';';
        if(!empty($value['typography_style']['font-weight'])) $style .= 'font-weight:'.$value['typography_style']['font-weight'].';';
        if(!empty($value['typography_style']['letter-spacing'])) $style .= 'letter-spacing:'.$value['typography_style']['letter-spacing'].';';
        if(!empty($value['typography_style']['line-height'])) $style .= 'line-height:'.$value['typography_style']['line-height'].';';
        if(!empty($value['typography_style']['text-decoration'])) $style .= 'text-decoration:'.$value['typography_style']['text-decoration'].';';
        if(!empty($value['typography_style']['text-transform'])) $style .= 'text-transform:'.$value['typography_style']['text-transform'].';';
        $style .= '}';
        $style .= "\n";
    }
}
/*****END TYPOGRAPHY*****/

/*****BEGIN CUSTOM CSS*****/
$custom_css = s7upf_get_option('s7upf_custom_css');
if(!empty($custom_css)){
    $style .= $custom_css."\n";
}
if(!empty($style)) print $style;
?>