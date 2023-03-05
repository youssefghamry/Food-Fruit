<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 19/07/2017
 * Time: 1:53 CH
 */

$image_size  = s7upf_get_size_image('600x600',$image_size);
if($pro_query->have_posts()) {
    while($pro_query->have_posts()) {
        $pro_query->the_post(); ?>
        <div class="col-md-<?php echo esc_attr($col_layout); ?> col-sm-6 col-xs-6">
            <div class="item-product item-product2 product">
                <div class="row">
                    <div class="col-md-<?php echo ($col_layout == '3')?'12':'6'; ?> col-sm-12 col-xs-12">
                        <div class="product-thumb">
                            <?php s7upf_get_image_product_quickview_in_loop($image_size,$default_image,$animation_img); ?>
                        </div>
                    </div>
                    <div class="col-md-<?php echo ($col_layout == '3')?'12':'6'; ?> col-sm-12 col-xs-12">
                        <div class="product-info <?php if($col_layout == '3') echo'text-center'; ?> ">
                            <div class="product-price">
                                <?php woocommerce_template_loop_price(); ?>
                            </div>
                            <h3 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <?php do_action( 's7upf_vendor_shop_loop_sold_by' );?>
                            <?php echo s7upf_get_rating_html(); ?>
                            <div class="product-extra-link">
                                <?php
                                woocommerce_template_loop_add_to_cart();
                                echo s7up_wishlist_url();
                                echo s7upf_compare_url();
                                ?>
                            </div>
                            <div class="product-in-cat list-inline-block">
                                <?php echo wc_get_product_category_list( get_the_ID(), ''); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Item -->
    <?php }
}