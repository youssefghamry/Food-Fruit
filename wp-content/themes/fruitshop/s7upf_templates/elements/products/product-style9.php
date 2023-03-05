<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 21/04/2017
 * Time: 10:28
 */
//check col

$image_size_button_ajax=$image_size;
if(empty($col_layout)) $col_layout = '6';
$image_size  = s7upf_get_size_image('300x300',$image_size);
if($pro_query->have_posts()){ ?>
    <div class="<?php echo esc_attr($extra_class); ?> mb-product-element-grid list-best-pro2 mb-element-product-style8 woocommerce <?php echo esc_attr($class_main_color);?> <?php echo esc_attr($class_secondary_color);?>">
        <div class="row product-loadmore">
            <?php while ($pro_query->have_posts()) {
                $pro_query->the_post();?>
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
            <?php } wp_reset_postdata();?>
        </div>

        <?php } $max_page = $pro_query->max_num_pages;
        if($max_page>1  and 'on' === $load_more_ajax) {?>
            <div class="text-center">
                <a href="#" class="btn-arrow color text-uppercase loadmore-link ajax-loadmore9" data-collayout = "<?php echo esc_attr($col_layout); ?>" data-defaultimage = "<?php echo esc_attr($default_image); ?>" data-animationimg = "<?php echo esc_attr($animation_img); ?>" data-imgsize = "<?php echo esc_attr($image_size_button_ajax); ?>" data-profeatured = "<?php echo esc_attr($pro_feature); ?>" data-prosale = "<?php echo esc_attr($pro_sale); ?>" data-cat="<?php echo esc_attr($product_category);?>" data-number="<?php echo esc_attr($product_number);?>"  data-order="<?php echo esc_attr($order);?>" data-orderby="<?php echo esc_attr($order_by);?>" data-paged="1"  data-maxpage="<?php echo esc_attr($max_page);?>"><?php echo esc_html__('load more','fruitshop'); ?></a>
            </div>
            <?php
        }?>
    </div>
<?php
if($pagination == 'on'){ ?>
    <nav class="woocommerce-pagination pagibar text-center">
        <?php
        echo paginate_links( apply_filters( 'woocommerce_pagination_args', array(
            'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
            'format'       => '',
            'add_args'     => false,
            'current'      =>  max(1, $paged),
            'total'        => $pro_query->max_num_pages,
            'prev_text'    => '<i class="icon ion-ios-arrow-thin-left"></i>',
            'next_text'    => '<i class="icon ion-ios-arrow-thin-right"></i>',
            'type' => 'plain',
            'end_size'     => 3,
            'mid_size'     => 3,
        ) ) );
        ?>
    </nav>
<?php }