<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 21/04/2017
 * Time: 10:28
 */

if(empty($number_item_desktop)) $number_item_desktop = '4';
$image_size  = s7upf_get_size_image('250x250',$image_size);
if($pro_query->have_posts()){?>
<div class="<?php echo esc_attr($extra_class); ?> product-slider product-slider1 line-white  mb-element-product-style2 woocommerce <?php echo esc_attr($class_main_color);?> <?php echo esc_attr($class_secondary_color);?>">
    <div class="wrap-item" data-pagination="false" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-navigation="true" data-itemscustom="[[0,1],[560,2],[768,3],[990,<?php echo esc_attr($number_item_desktop)?>]]">
    <?php  while ($pro_query->have_posts()) {
        $pro_query->the_post();
        $date_time = get_post_meta(get_the_ID(),'discount_time_product',true); ?>
        <div class="item-product item-product1 text-center product">
            <div class="product-thumb">
                <?php if(!empty($date_time)){?>
                    <div class="deal-timer" data-date="<?php echo esc_attr($date_time);?>"></div>
                <?php }?>
               <?php s7upf_get_image_product_quickview_in_loop($image_size,$default_image,$animation_img); ?>
            </div>
            <div class="product-info">
                <h3 class="product-title"><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h3>
                <?php do_action( 's7upf_vendor_shop_loop_sold_by' );?>
                <div class="product-price">
                    <?php woocommerce_template_loop_price(); ?>
                    <?php if(s7upf_product_loop_discount_sale()!=''){?>
                        <span class="percent-sale"><?php echo esc_attr(s7upf_product_loop_discount_sale()); ?></span>
                    <?php } ?>
                </div>
                <?php echo s7upf_get_rating_html(); ?>
                <div class="product-extra-link">
                    <?php
                    echo s7up_wishlist_url();
                    woocommerce_template_loop_add_to_cart();
                    echo s7upf_compare_url();
                    ?>
                </div>
            </div>
        </div>
        <!-- End Item -->
      <?php } wp_reset_postdata(); ?>
    </div>
</div>
<?php }