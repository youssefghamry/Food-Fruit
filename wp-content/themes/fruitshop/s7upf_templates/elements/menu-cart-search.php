<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 31/03/2017
 * Time: 14:32
 */
if('hide' !== $search_box || 'hide' !== $cart_box) {
?>
<ul class="list-inline-block pull-right search-cart3">
    <?php if('show' === $search_box){ ?>
            <li class="live-search-on">
                <form class="search-form search-form3 pull-right" action="<?php echo esc_url(home_url('/'))?>">
                    <input name="s"  autocomplete ="off" value="<?php echo get_search_query()?>" type="text" placeholder = "<?php echo esc_html__('Search this site','fruitshop');?>">
                    <input name="post_type" type="hidden" value="product">
                    <input type="submit" value="">
                </form>

            </li>
        <?php } if(!is_admin() and 'show' === $cart_box and class_exists('WC_Product')){
            ?>
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
        <?php } ?>
</ul>
<?php }