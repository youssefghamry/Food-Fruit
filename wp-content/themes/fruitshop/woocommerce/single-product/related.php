<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
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
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$style = s7upf_get_option('s7upf_style_related_product');
$show_related = s7upf_get_option('s7upf_show_related_product_detail');
$title_related = s7upf_get_option('s7upf_title_related_product');
$default_image = get_template_directory_uri().'/assets/images/placeholder.png';
$image_size = s7upf_get_option('s7upf_image_size_list_product');
$image_size = s7upf_get_size_image('full',$image_size);
$sidebar = s7upf_get_sidebar();
if ( $related_products and $show_related == 'on') :
    if($style == 'slider'){ ?>
        <div class="related-product">
            <h2 class="title30 font-bold"><?php echo esc_attr($title_related); ?></h2>
            <div class="related-product-slider product-slider">
                <div class="wrap-item group-navi" data-navigation="true" data-pagination="false" data-itemscustom="[[0,1],[560,2],[990,<?php echo ($sidebar['position'] == 'no')? '4': '3'; ?>]]">
                <?php foreach ( $related_products as $related_product ) :
                    $post_object = get_post( $related_product->get_id() );
                    setup_postdata( $GLOBALS['post'] =& $post_object );

                    $attachment_ids = $related_product->get_gallery_image_ids(); ?>
                    <div class="item-product item-product-grid text-center">
                        <div class="product-thumb">
                            <a href="<?php the_permalink(); ?>" class="product-thumb-link <?php if(count($attachment_ids)>=1) echo 'rotate-thumb'?> ">
                                <?php
                                if ( has_post_thumbnail() ) {
                                    echo get_the_post_thumbnail($related_product->get_id(),$image_size);

                                }
                                if(is_array($attachment_ids) and count($attachment_ids)>0){
                                    foreach ($attachment_ids as $key => $value){
                                        if($key == 0){
                                            echo wp_get_attachment_image($value,$image_size,false);
                                        }
                                    }
                                }
                                ?>
                            </a>
                            <a data-product-id="<?php echo get_the_id();?>" href="<?php the_permalink(); ?>" class="quickview-link product-ajax-popup"><i class="fa fa-search" aria-hidden="true"></i></a>
                        </div>
                        <div class="product-info">
                            <h3 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
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
                <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php
    }else{ ?>

    <section class="related products mb-related-product-default">

        <h2 class="title30 font-bold"><?php echo esc_attr($title_related); ?></h2>

        <?php woocommerce_product_loop_start(); ?>

        <?php foreach ( $related_products as $related_product ) : ?>

            <?php
            $post_object = get_post( $related_product->get_id() );

            setup_postdata( $GLOBALS['post'] =& $post_object );

            wc_get_template_part( 'content', 'product' ); ?>

        <?php endforeach; ?>

        <?php woocommerce_product_loop_end(); ?>

    </section>

<?php } endif;

wp_reset_postdata();
