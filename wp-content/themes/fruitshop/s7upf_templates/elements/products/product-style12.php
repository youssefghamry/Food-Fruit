<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 21/04/2017
 * Time: 10:28
 */
$uniqid= uniqid();
$tab_html = $tab_content = '';
$image_size  = s7upf_get_size_image('250x250',$image_size);
//check number item default
if(empty($number_item_desktop)) $number_item_desktop = '4';
if(!empty($product_category)){
    $product_category = explode(',',$product_category); ?>
    <div class="<?php echo esc_attr($extra_class); ?> product-bestsale  mb-element-product-style12 woocommerce <?php echo esc_attr($class_main_color);?> <?php echo esc_attr($class_secondary_color);?>">
        <?php if(!empty($title)){?>
            <h2 class="title30 font-bold title-box1 text-center"><?php echo esc_attr($title); ?></h2>
        <?php }?>
        <ul class="text-center title-tab1 list-inline-block">
            <?php
            if($tab_all == 'on'){ ?>
                <li class="<?php if($position_tab_active ==1) echo 'active'?>"><a href="#tab_allahihi" data-toggle="tab"><?php echo esc_html__('All','fruitshop'); ?></a></li>
                <?php
            }
            if(is_array($product_category)){
            foreach ($product_category as $key=>$cart) {
                $term = get_term_by('slug', $cart, 'product_cat');
                if (!empty($term->slug) && is_object($term)) {
                    if($tab_all == 'on'){
                        if($key+2 == $position_tab_active) $active = 'active'; else $active = '';
                    }else{
                        if($key+1 == $position_tab_active) $active = 'active'; else $active = '';
                    } ?>
                    <li class="<?php echo esc_attr($active);?>"><a href="#tab_<?php echo esc_attr($term->slug); ?>_<?php echo esc_attr($uniqid); ?>" data-toggle="tab"><?php echo esc_attr($term->name); ?></a></li>
                <?php }
                }
            } ?>
        </ul>
        <div class="tab-content">
            <?php
            if($tab_all == 'on'){?>
                <div id="tab_allahihi" class="tab-pane <?php if($position_tab_active ==1) echo 'active'?>">
                    <div class="product-slider line-white product-slider1 product">
                        <div class="wrap-item" data-pagination="false" data-navigation="true" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-itemscustom="[[0,1],[560,2],[768,3],[990,<?php echo esc_attr($number_item_desktop)?>]]">
                            <?php
                            if($pro_query->have_posts()) {
                                while($pro_query->have_posts()) {
                                    $pro_query->the_post(); ?>
                                    <div class="item-product item-product1 text-center">
                                        <div class="product-thumb">
                                            <?php s7upf_get_image_product_quickview_in_loop($image_size,$default_image,$animation_img); ?>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <?php do_action( 's7upf_vendor_shop_loop_sold_by' );?>
                                            <div class="product-price">
                                                <?php woocommerce_template_loop_price(); ?>
                                            </div>
                                            <?php s7upf_get_rating_html(); ?>
                                            <div class="product-extra-link">
                                                <?php
                                                echo s7up_wishlist_url();
                                                woocommerce_template_loop_add_to_cart();
                                                echo s7upf_compare_url();
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
                <?php
            }

            if(is_array($product_category)){
                foreach ($product_category as $key=>$cart){
                    $term = get_term_by('slug', $cart, 'product_cat');
                    if($tab_all == 'on'){
                        if($key+2 == $position_tab_active) $active = 'active'; else $active = '';
                    }else{
                        if($key+1 == $position_tab_active) $active = 'active'; else $active = '';
                    }

                    unset($args['tax_query']);
                    $args['tax_query'][]=array(
                        'taxonomy'=>'product_cat',
                        'field'=>'slug',
                        'terms'=> $cart
                    );
                    $product_query = new WP_Query($args);?>
                    <div id="tab_<?php if(!empty($term->slug)) echo esc_attr($term->slug); ?>_<?php echo esc_attr($uniqid); ?>" class="tab-pane <?php echo esc_attr($active); ?>">
                        <div class="product-slider line-white product-slider1 product">
                            <div class="wrap-item" data-pagination="false" data-navigation="true" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-itemscustom="[[0,1],[560,2],[768,3],[990,<?php echo esc_attr($number_item_desktop)?>]]">
                                <?php
                                if($product_query->have_posts()) {
                                    while($product_query->have_posts()) {
                                        $product_query->the_post(); ?>
                                        <div class="item-product item-product1 text-center">
                                            <div class="product-thumb">
                                                <?php s7upf_get_image_product_quickview_in_loop($image_size,$default_image,$animation_img); ?>
                                            </div>
                                            <div class="product-info">
                                                <h3 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                <?php do_action( 's7upf_vendor_shop_loop_sold_by' );?>
                                                <div class="product-price">
                                                    <?php woocommerce_template_loop_price(); ?>
                                                </div>
                                                <?php s7upf_get_rating_html(); ?>
                                                <div class="product-extra-link">
                                                    <?php
                                                    s7up_wishlist_url();
                                                    woocommerce_template_loop_add_to_cart();
                                                    s7upf_compare_url();
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                } wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                <?php }
            } ?>
        </div>
    </div>
    <?php
}wp_reset_postdata();