<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17/04/2017
 * Time: 11:07
 */
?>
<div class="mb-popup-product woocommerce">
    <div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="product-detail">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <?php
                    /**
                     * woocommerce_before_single_product_summary hook.
                     *
                     * @hooked woocommerce_show_product_sale_flash - 10
                     * @hooked woocommerce_show_product_images - 20
                     */
                    do_action( 'woocommerce_before_single_product_summary' );
                    ?>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="summary entry-summary detail-info">

                        <?php
                        /**
                         * woocommerce_single_product_summary hook.
                         *
                         * @hooked woocommerce_template_single_title - 5
                         * @hooked woocommerce_template_single_rating - 10
                         * @hooked woocommerce_template_single_price - 10
                         * @hooked woocommerce_template_single_excerpt - 20
                         * @hooked woocommerce_template_single_add_to_cart - 30
                         * @hooked woocommerce_template_single_meta - 40
                         * @hooked woocommerce_template_single_sharing - 50
                         * @hooked WC_Structured_Data::generate_product_data() - 60
                         */
                        do_action( 'woocommerce_single_product_summary' );
                        ?>

                    </div><!-- .summary -->
                </div>
            </div>
        </div>
    </div>
</div>
