<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 26/06/2017
 * Time: 9:46 SA
*/
if('style1' === $style){ ?>
    <?php if( class_exists('WC_Product') and !is_admin()){ ?>
    <div class="mini-cart-box mini-cart1 <?php echo esc_attr($pull_cart); ?> <?php echo esc_attr($extra_class); ?>">
        <input class="num-decimal" type="hidden" value="<?php echo get_option("woocommerce_price_num_decimals"); ?>">
        <div class="total-default hidden"><?php echo wc_price(0)?></div>
        <a class="mini-cart-link" href="#">
            <span class="mini-cart-icon title18 color"><i class="fa fa-shopping-basket"></i></span>
            <span class="mini-cart-number"><span class="cart-number"><?php echo count( WC()->cart->get_cart() );?></span><?php echo(count( WC()->cart->get_cart() )>1)? esc_html__(' Items - ','fruitshop'): esc_html__(' Item - ','fruitshop'); ?>
                <span class="mb-cart-total color"><?php echo WC()->cart->get_cart_subtotal(); ?></span>
                                </span>
        </a>
        <div class="mini-cart-content text-left">
            <?php s7upf_mini_cart(); ?>
        </div>
    </div>
    <?php } ?>
<?php }else{ ?>
    <?php if( class_exists('WC_Product') and !is_admin()){ ?>
    <ul class="list-inline-block pull-right search-cart3 <?php echo esc_attr($extra_class); ?>">
        <li>
            <div class="mini-cart-box mini-cart3 pull-right">
                <input class="num-decimal" type="hidden" value="<?php echo get_option("woocommerce_price_num_decimals"); ?>">
                <div class="total-default hidden"><?php echo wc_price(0)?></div>
                <a class="mini-cart-link" href="#">
                    <span class="mini-cart-icon title18 color2"><i class="fa fa-shopping-basket"></i></span>
                    <span class="mini-cart-number bg-color white cart-number"><?php echo count( WC()->cart->get_cart() );?></span>
                </a>

                <div class="mini-cart-content text-left">
                    <?php s7upf_mini_cart(); ?>
                </div>
            </div>
        </li>
    </ul>
<?php } }