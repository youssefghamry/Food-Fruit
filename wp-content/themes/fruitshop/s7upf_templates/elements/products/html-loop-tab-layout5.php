<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 15/06/2017
 * Time: 8:35 SA
 */
$image_size  = s7upf_get_size_image('600x600',$image_size);
if($vip_query->have_posts()) {
    while($vip_query->have_posts()) {
        $vip_query->the_post(); ?>
        <div class="col-md-<?php echo esc_attr($col_layout_tab); ?> col-sm-4 col-xs-6 product">
            <div class="item-product item-product1 text-center border drop-shadow">
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
        </div>
        <!-- End Item -->
    <?php }
}