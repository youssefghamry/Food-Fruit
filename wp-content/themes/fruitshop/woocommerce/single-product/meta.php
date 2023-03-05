<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $product;
?>
<div class="product_meta desc info-extra">

    <?php do_action( 'woocommerce_product_meta_start' ); ?>

    <?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

        <p class="sku_wrapper"><label><?php esc_html_e( 'SKU:', 'fruitshop' ); ?></label> <span class="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'fruitshop' ); ?></span></p>

    <?php endif; ?>
    <?php if(count( $product->get_category_ids() )>0){?>
    <p class="posted_in">
        <label>
            <?php echo(count( $product->get_category_ids() )>1)?esc_html__('Categories:','fruitshop'):esc_html__('Categorie:','fruitshop')?>
       </label>
        <?php echo wc_get_product_category_list( $product->get_id(), ', '); ?>
    </p>
    <?php } ?>
    <?php if(count( $product->get_tag_ids() )>0){?>
    <p class="posted_in">
        <label>
            <?php echo(count( $product->get_tag_ids() )>1)?esc_html__('Tags:','fruitshop'):esc_html__('Tag:','fruitshop')?>
        </label>
        <?php echo wc_get_product_tag_list( $product->get_id(), ', '); ?>
    </p>
    <?php }?>
    <?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>
