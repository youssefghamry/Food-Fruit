<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 21/04/2017
 * Time: 10:28
 */

$i = 1;
$count_post = $pro_query->post_count;
//check number item default
if(empty($number_item_desktop)) $number_item_desktop = '1';
//check number item in 1 column default
if(empty($number_item_product_col)) $number_item_product_col = 3;
$image_size  = s7upf_get_size_image('300x300',$image_size);
if($pro_query->have_posts()){?>
<div class="<?php echo esc_attr($extra_class); ?> product-box4 bg-white drop-shadow mb-element-product-style5 woocommerce <?php echo esc_attr($class_main_color);?> <?php echo esc_attr($class_secondary_color);?>">
    <?php if(!empty($title)) {?>
    <h2 class="text-uppercase font-bold title30"><?php echo esc_attr($title); ?></h2>
    <?php } ?>
    <div class="product-slider">
        <div class="wrap-item group-navi" data-pagination="false" data-navigation="true" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-itemscustom="[[0,1],[560,2],[768,<?php echo esc_attr($number_item_desktop)?>]]">
        <?php  while ($pro_query->have_posts()) {
            $pro_query->the_post();?>
            <?php if($i % (int)$number_item_product_col == 1) echo '<div class="item">'; ?>
                <div class="item-product item-product2 product">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="product-thumb">
                                <?php s7upf_get_image_product_quickview_in_loop($image_size,$default_image,$animation_img); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="product-info">
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

            <?php if($i % (int)$number_item_product_col == 0 || $i == $count_post) echo '</div>'; ?>
            <!-- End Item -->
        <?php $i = $i+1; } ?>
        </div>
    </div>
</div>
<?php } wp_reset_postdata();