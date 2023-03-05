<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 31/03/2017
 * Time: 17:36
 */
$logo = $class = $class_cart = $class_bg = '';
if(!empty($logo_img)){
    $img = wp_get_attachment_image_src( $logo_img ,"full");
    $logo .= $img[0];
}
else{
    $logo .= s7upf_get_option('logo');
}
if(!empty($main_color)){
    $class = S7upf_Assets::build_css('color: '.$main_color.';',':after');
    $class_cart = S7upf_Assets::build_css('color: '.$main_color.';');
}
if(!empty($bg_color)){
    $class_bg = S7upf_Assets::build_css('background: '.$bg_color.';');
}
switch ($style){
    case 'style2' :
        ?>
        <div class="main-header <?php echo esc_attr($class_bg);?> <?php echo esc_attr($extra_class)?>">
            <div class="mb-container">
                <div class="row">
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <?php if('show' === $search_box){ ?>
                            <div class="live-search-<?php echo esc_attr($live_search);?>">
                                <form class="search-form pull-left <?php echo esc_attr($class);?>" action = "<?php echo esc_url(home_url('/')); ?>">
                                    <input  name="s" autocomplete ="off" type="text" value="<?php echo get_search_query()?>" placeholder = "<?php echo esc_html__('Search this site','fruitshop')?>">
                                    <input name="post_type" type="hidden" value="product">
                                    <input type="submit" value="">
                                    <div class="list-product-search">
                                        <p class="text-center"><?php echo esc_html__('Please enter key search to display results','fruitshop')?></p>
                                    </div>
                                </form>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-12">
                        <?php if(!empty($logo)){ ?>
                        <div class="logo logo1">
                            <a href="<?php echo esc_url(home_url('/'))?>"><img src="<?php echo esc_url($logo); ?>" alt="logo"></a>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <?php if('show' === $cart_box and class_exists('WC_Product')and !is_admin()){ ?>
                        <div class="mini-cart-box mini-cart1 pull-right">
                            <input class="num-decimal" type="hidden" value="<?php echo get_option("woocommerce_price_num_decimals"); ?>">
                            <div class="total-default hidden"><?php echo wc_price(0)?></div>
                            <a class="mini-cart-link" href="#">
                                <span class="mini-cart-icon title18 color <?php echo esc_attr($class_cart);?>"><i class="fa fa-shopping-basket"></i></span>
                                <span class="mini-cart-number"><span class="cart-number"><?php echo count( WC()->cart->get_cart() );?></span><?php echo(count( WC()->cart->get_cart() )>1)? esc_html__(' Items - ','fruitshop'): esc_html__(' Item - ','fruitshop'); ?>
                                    <span class="mb-cart-total color <?php echo esc_attr($class_cart);?>"><?php echo WC()->cart->get_cart_subtotal(); ?></span>
                                </span>
                            </a>
                            <div class="mini-cart-content text-left">
                                <?php s7upf_mini_cart(); ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        break;
    case 'style3' :
        ?>
        <div class="main-header2  <?php echo esc_attr($extra_class)?>">
            <div class="mb-container">
                <div class="row">
                    <div class="col-md-12">
                        <?php if(!empty($logo)){ ?>
                            <div class="logo logo2 pull-left">
                                <a href="<?php echo esc_url(home_url('/'))?>"><img src="<?php echo esc_url($logo); ?>" alt="logo"></a>
                            </div>
                        <?php } ?>
                        <?php if('show' === $cart_box and class_exists('WC_Product') and !is_admin()){ ?>

                        <div class="mini-cart-box mini-cart1 pull-right">
                            <input class="num-decimal" type="hidden" value="<?php echo get_option("woocommerce_price_num_decimals"); ?>">
                            <div class="total-default hidden"><?php echo wc_price(0)?></div>
                            <a class="mini-cart-link" href="#">
                                <span class="mini-cart-icon title18 color <?php echo esc_attr($class_cart);?>"><i class="fa fa-shopping-basket"></i></span>
                                <span class="mini-cart-number"><span class="cart-number"><?php echo count( WC()->cart->get_cart() );?></span><?php echo(count( WC()->cart->get_cart() )>1)? esc_html__(' Items - ','fruitshop'): esc_html__(' Item - ','fruitshop'); ?>
                                    <span class="color mb-cart-total <?php echo esc_attr($class_cart);?>"><?php echo WC()->cart->get_cart_subtotal(); ?></span>
                                </span>
                            </a>
                            <div class="mini-cart-content text-left">
                                <?php s7upf_mini_cart(); ?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if('show' === $search_box){ ?>
                            <div class="live-search-<?php echo esc_attr($live_search);?> mb-search-3">
                                <form class="search-form search-form<?php echo ('show' === $show_categories) ? '2' :'5' ;?> pull-right <?php echo esc_attr($class);?>" action = "<?php echo esc_url(home_url('/')); ?>">
                                    <input  name="s" type="text"  autocomplete ="off" value="<?php echo get_search_query()?>" placeholder = "<?php echo esc_html__('Search this site','fruitshop')?>">
                                    <input name="post_type" type="hidden" value="product">
                                    <input type="submit" value="">
                                     <?php if('show' === $show_categories){ ?>
                                     <input class="cat-value" type="hidden" name="product_cat" value="" />
                                    <div class="dropdown-box select-category">

                                    <a href="#" class="dropdown-link category-toggle-link">
                                        <span><?php esc_html_e("All Categories","fruitshop")?></span>
                                    </a>
                                    <span class="mb-angle-down"><i class="fa fa-angle-down"></i></span>
                                    <ul class="dropdown-list list-none">
                                    <?php
                                    if(!empty($cats)){
                                        $custom_list = explode(",",$cats);
                                        foreach ($custom_list as $key => $cat) {
                                            $term = get_term_by( 'slug',$cat, 'product_cat' );
                                            if(!empty($term->slug) && is_object($term)){
                                                if(!empty($term) && is_object($term)){
                                                    echo '<li><a href="#" data-filter=".'.$term->slug.'">'.$term->name.'</a></li>';
                                                }
                                            }
                                        }
                                    }
                                    else{
                                        $product_cat_list = get_terms('product_cat');
                                        if(is_array($product_cat_list) && !empty($product_cat_list)){
                                            foreach ($product_cat_list as $cat) {
                                                echo '<li><a href="#" data-filter=".'.$cat->slug.'">'.$cat->name.'</a></li>';
                                            }
                                        }
                                    }
                                    ?>
                                    </ul>
                                </div>
                                <?php } ?>
                                    <div class="list-product-search">
                                        <p class="text-center"><?php echo esc_html__('Please enter key search to display results','fruitshop')?></p>
                                    </div>
                                </form>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        break;
    case 'style4' : ?>
        <div class="logo logo8  <?php echo esc_attr($extra_class)?>">
            <a href="<?php echo esc_url(home_url('/'))?>"><img src="<?php echo esc_url($logo); ?>" alt="logo"></a>
        </div>
        <?php
        break;
    default: ?>
        <?php if(!empty($logo)){ ?>
            <div class="logo logo3 <?php echo esc_attr($pull_logo); ?>  <?php echo esc_attr($extra_class)?>">
                <a href="<?php echo esc_url(home_url('/'))?>"><img src="<?php echo esc_url($logo); ?>" alt="logo"></a>
            </div>
        <?php } ?>
        <?php
        break;
}