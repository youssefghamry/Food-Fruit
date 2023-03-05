<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 21/04/2017
 * Time: 10:28
 */

$image_size  = s7upf_get_size_image('600x600',$image_size);
$type = 'list';
if($order_by_show == 'on'){
    s7upf_shop_loop_before($pro_query,$orderby_shop,'list');
    if(isset($_GET['type'])){
        $type = $_GET['type'];
    }
}
if($pro_query->have_posts()){
    if($type == 'grid'){ ?>
        <div class="<?php echo esc_attr($extra_class); ?> mb-product-element-grid product-grid-view mb-element-product-style9 woocommerce <?php echo esc_attr($class_main_color);?> <?php echo esc_attr($class_secondary_color);?>">
            <div class="row">
                <?php while ($pro_query->have_posts()) {
                    $pro_query->the_post();?>
                    <div class="col-md-<?php echo esc_attr($col_layout); ?> col-sm-4 col-xs-6">
                        <div class="item-product item-product-grid text-center product <?php echo esc_attr($shadow_box_hover);?>">
                            <div class="product-thumb">
                                <?php
                                /**
                                 * s7upf_before_shop_product_thumb hook.
                                 *
                                 * @hooked s7upf_template_loop_product_label_icon - 10
                                 */
                                do_action( 's7upf_before_shop_product_thumb' );?>
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
                <?php } wp_reset_postdata(); ?>
            </div>
        </div>
        <?php
    }else{ ?>
        <div class="<?php echo esc_attr($extra_class); ?> product-list-view mb-element-product-style10 woocommerce <?php echo esc_attr($class_main_color);?> <?php echo esc_attr($class_secondary_color);?>">
            <?php while ($pro_query->have_posts()) {
                $pro_query->the_post();?>
                <div class="item-product item-product-list product">
                    <div class="row">
                        <div class="col-md-4 col-sm-5 col-xs-5">
                            <div class="product-thumb">
                                <?php
                                /**
                                 * s7upf_before_shop_product_thumb hook.
                                 *
                                 * @hooked s7upf_template_loop_product_label_icon - 10
                                 */
                                do_action( 's7upf_before_shop_product_thumb' );?>
                                <?php s7upf_get_image_product_quickview_in_loop($image_size,$default_image,$animation_img); ?>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-7 col-xs-7">
                            <div class="product-info">
                                <h3 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <?php do_action( 's7upf_vendor_shop_loop_sold_by' );?>
                                <div class="product-price">
                                    <?php woocommerce_template_loop_price(); ?>
                                </div>
                                <?php echo s7upf_get_rating_html(); ?>
                                <div class="desc">
                                    <?php if ( has_excerpt( get_the_ID()) ) {
                                        echo balanceTags(wp_trim_words( get_the_excerpt(), $word_excerpt , '...' ), true); }
                                    ?>
                                </div>
                                <div class="product-extra-link">
                                    <?php
                                    woocommerce_template_loop_add_to_cart();
                                    echo s7up_wishlist_url();
                                    echo s7upf_compare_url();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } wp_reset_postdata();?>
        </div>
        <?php
    }?>

<?php }
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