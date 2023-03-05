<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package 7up-framework
 */
$scroll_top = s7upf_get_option('scroll_top','on');
?>
    </div> <!--End .container-->
</section><!-- End .main-wrapper-->
    <?php
    $page_id = s7upf_get_value_by_id('s7upf_footer_page');
    $footer_product_list = s7upf_get_option('s7upf_footer_product_list');
    $footer_product_detail = s7upf_get_value_by_id('s7upf_footer_product_detail');
    if(class_exists('woocommerce')){
        if(is_woocommerce() and !empty($footer_product_list)){
            $page_id = $footer_product_list;
        }
        if(is_product() and !empty($footer_product_detail)){
            $page_id = $footer_product_detail;
        }
    }
    if(!empty($page_id)) {
        s7upf_get_footer_visual($page_id);
    }
    else{
        s7upf_get_footer_default();
    }?>
<div class="wishlist-mask">
    <?php
    if(class_exists('YITH_WCWL_Init')){
        $url = YITH_WCWL()->get_wishlist_url();
        echo    '<div class="wishlist-popup">
                        <span class="popup-icon"><i class="fa fa-bullhorn" aria-hidden="true"></i></span>
                        <p class="wishlist-alert">"<span class="wishlist-title"></span>" '.esc_html__("was added to wishlist","fruitshop").'</p>
                        <div class="wishlist-button">
                            <a href="#" class="wishlist-close">'.esc_html__("Close","fruitshop").' (<span class="wishlist-countdown">3</span>)</a>
                            <a href="'.esc_url($url).'">'.esc_html__("View page","fruitshop").'</a>
                        </div>
                    </div>';
    }
    ?>
</div>
<?php if($scroll_top == 'on'){ ?>
<a href="#" class="scroll-top round"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
<?php }
if(function_exists('mc4wp_show_form')) {
    $show_popup = get_post_meta(get_the_ID(), 'show_popup_mail_chimp', true);
    $title_popup = get_post_meta(get_the_ID(), 'title_popup_mail_chimp', true);
    $id_mailchimp = get_post_meta(get_the_ID(), 'shortcode_mail_chimp', true);
    $placeholder = get_post_meta(get_the_ID(), 'placeholder_popup_mail_chimp', true);
    $title_submit = get_post_meta(get_the_ID(), 'title_submit_popup_mail_chimp', true);
    $bg_popup = get_post_meta(get_the_ID(), 'bg_popup_mail_chimp', true);
    $class_bg = S7upf_Assets::build_css('background: url('.$bg_popup.'); background-size: 100% 100%;');
    if ($show_popup == 'on') { ?>
        <div id="boxes">
            <div class="window" id="dialog">
                <div class="window-popup text-center <?php echo esc_attr($class_bg); ?>">
                    <a href="#" class="close-popup"><i class="fa fa-times" aria-hidden="true"></i></a>
                    <div class="content-popup mb-mailchimp" data-placeholder = "<?php echo esc_attr($placeholder)?>" data-namesubmit = "<?php echo esc_attr($title_submit);?>">
                        <h2 class="title30 text-uppercase white"><?php echo esc_attr($title_popup); ?></h2>
                        <?php if(!empty($id_mailchimp)) echo do_shortcode('[mc4wp_form id="'.$id_mailchimp.'"]'); ?>
                    </div>
                </div>
            </div>
            <div id="mask"></div>
        </div>
    <?php }
}
?>
</div> <!--End .wrap-->
<?php wp_footer(); ?>
</body>
</html>
