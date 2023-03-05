<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 21/04/2017
 * Time: 10:28
 */
global $post;
$image_size  = s7upf_get_size_image('400x400',$image_size);
if(empty($number_item_desktop)) $number_item_desktop = '1';
if(!empty($bg_left) and !empty($bg_right)){
    $class_bg = S7upf_Assets::build_css('background-image: url('.wp_get_attachment_image_url($bg_left,'full').'), url('.wp_get_attachment_image_url($bg_right,'full').');'); ?>
    <div class="<?php echo esc_attr($class_bg); ?> mb_bg_product_style1">

<?php } ?>
<?php if(!empty($title)) {?><h2 class="text-uppercase title30 title-box1 text-center"><?php echo esc_attr($title); ?></h2><?php } ?>
<?php
if($pro_query->have_posts()){ ?>

    <div class="<?php echo esc_attr($extra_class); ?> featured-product-slider mb-element-product-style1b woocommerce <?php echo esc_attr($class_main_color);?> <?php echo esc_attr($class_secondary_color);?>">
        <div class="product-style1b-slick">
            <?php  while ($pro_query->have_posts()) {
                $pro_query->the_post(); ?>
                <div class="item-product-featured product">
                    <div class="row">
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <div class="product-thumb border">
                                <?php s7upf_get_image_product_quickview_in_loop($image_size,$default_image,$animation_img); ?>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <div class="product-info">
                                <h3 class="product-title"><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h3>
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
            <?php } ?>
        </div>
    </div>
<?php } wp_reset_postdata();
if(!empty($bg_left) and !empty($bg_right)){?>
    </div>
<?php }