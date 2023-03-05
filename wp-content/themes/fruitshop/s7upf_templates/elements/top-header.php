<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 03/04/2017
 * Time: 14:58
 */
$class = '';
if(!empty($color_text)){
    $class .= ' '.S7upf_Assets::build_css('color: '.$color_text.';',' .pull-right a');
    $class .= ' '.S7upf_Assets::build_css('color: '.$color_text.';',' .pull-right a .color');
    $class .= ' '.S7upf_Assets::build_css('color: '.$color_text.';',' .language-box> a');
    $class .= ' '.S7upf_Assets::build_css('color: '.$color_text.';',' .currency-box .currency-current');
}
if(!empty($color_text_hover)){
    $class .= ' '.S7upf_Assets::build_css('color: '.$color_text_hover.';',' .pull-right a:hover');
    $class .= ' '.S7upf_Assets::build_css('color: '.$color_text_hover.';',' .pull-right a:hover .color');
    $class .= ' '.S7upf_Assets::build_css('color: '.$color_text_hover.';',' .language-box> a:hover');
    $class .= ' '.S7upf_Assets::build_css('color: '.$color_text_hover.';',' .currency-box .currency-current:hover');
}
if(!empty($bg_color)){
    $class .= ' '.S7upf_Assets::build_css('background: '.$bg_color.';');
}
?>
<div class="top-header top-header2 <?php echo esc_attr($class); ?> <?php echo esc_attr($extra_class); ?>">
    <div class="mb-container">
        <div class="row">
            <?php if(!empty($text_left)){ ?>
            <div class="col-md-4 col-sm-4 hidden-xs">
                <?php echo apply_filters('the_content',s7upf_base64decode($text_left));?>
            </div>
            <?php } ?>
            <div class="<?php echo (!empty($text_left)) ? 'col-md-8 col-sm-8' : 'col-md-12 col-sm-12';?> col-xs-12">
                <ul class="info-account list-inline-block pull-right">
                <?php
                    if('on' === $show_account and class_exists( 'WooCommerce' )){?>
                    <li><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><span class="color"><i class="fa fa-user-o" aria-hidden="true"></i> </span><?php echo esc_attr($title_account); ?></a></li>
                <?php }
                if('on' === $show_log_in){?>
                    <li>
                        <?php if(is_user_logged_in()){?>
                            <a href="<?php echo wp_logout_url( get_permalink() ); ?>"><span class="color"><i class="fa fa-key" aria-hidden="true"></i></span> <?php echo esc_html__('Logout','fruitshop')?></a>
                        <?php } elseif(!is_user_logged_in()){?>
                            <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') );  ?>"><span class="color"><i class="fa fa-key" aria-hidden="true"></i> </span><?php echo esc_html__('Log In','fruitshop')?></a>
                        <?php } ?>
                    </li>
                <?php }
                    if('on' === $show_checkout and class_exists( 'WooCommerce' )){
                        global $woocommerce;
                        ?>
                    <li><a href="<?php echo get_permalink( wc_get_page_id( 'checkout' ) ); ?>"><span class="color"><i class="fa fa-check-circle-o"></i></span><?php echo esc_html__('Checkout','fruitshop')?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
