<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 21/04/2017
 * Time: 10:28
 */
//check number item default
if(empty($number_item_desktop)) $number_item_desktop = '2';
$image_size  = s7upf_get_size_image('300x300',$image_size);
if($pro_query->have_posts()){ ?>
<div class="<?php echo esc_attr($extra_class); ?> mega-new-arrival mb-element-product-style7 woocommerce <?php echo esc_attr($class_main_color);?> <?php echo esc_attr($class_secondary_color);?>">
    <?php if(!empty($title)) {?>
        <h2 class="mega-menu-title title30 text-uppercase"><?php echo esc_attr($title); ?></h2>
    <?php } ?>
    <div class="mega-new-arrival-slider product-slider">
        <div class="wrap-item group-navi" data-pagination="false" data-navigation="true" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-itemscustom="[[0,1],[768,2],[1024,3],[1170,<?php echo esc_attr($number_item_desktop)?>]]">
        <?php while ($pro_query->have_posts()) {
            $pro_query->the_post();?>
            <div class="item-product item-product-grid text-center product">
                <div class="product-thumb">
                    <?php s7upf_get_image_product_quickview_in_loop($image_size,$default_image,$animation_img); ?>
                </div>
                <div class="product-info">
                    <h3 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php do_action( 's7upf_vendor_shop_loop_sold_by' );?>
                    <div class="product-price">
                        <?php woocommerce_template_loop_price(); ?>
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
        <?php } wp_reset_postdata();?>
        </div>
    </div>
</div>
<?php }