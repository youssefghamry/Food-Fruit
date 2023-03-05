<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 21/04/2017
 * Time: 10:28
 */
$image_size  = s7upf_get_size_image('600x600',$image_size);
if($pro_query->have_posts()){?>
<div class="<?php echo esc_attr($extra_class); ?>  mb-element-product-style11 woocommerce <?php echo esc_attr($class_main_color);?> <?php echo esc_attr($class_secondary_color);?>">
   <?php if(!empty($title)){?>
        <h2 class="title30 title text-uppercase font-bold"><?php echo esc_attr($title); ?></h2>
   <?php } ?>
    <?php while ($pro_query->have_posts()) {
        $pro_query->the_post();?>
        <div class="item-deal-product5 product">
            <div class="product-thumb">
                <?php s7upf_get_image_product_quickview_in_loop($image_size,$default_image,$animation_img); ?>
                <?php if(s7upf_product_loop_discount_sale() !== ''){?>
                    <div class="product-label sale-label"><?php echo esc_attr(s7upf_product_loop_discount_sale()); ?></div>
                <?php } ?>
            </div>
            <div class="product-info text-center">
                <div class="product-price">
                    <?php woocommerce_template_loop_price(); ?>
                </div>
            </div>
        </div>
    <!-- End Product -->
    <?php } wp_reset_postdata();?>
</div>
<?php }