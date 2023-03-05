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

$image_size  = s7upf_get_size_image('600x600',$image_size);
if($pro_query->have_posts()){?>
<div class="<?php echo esc_attr($extra_class); ?> box-product-type mb-element-product-style4 woocommerce <?php echo esc_attr($class_main_color);?> <?php echo esc_attr($class_secondary_color);?>">
    <?php if(!empty($title)){ ?>
        <h2 class="color2 title30 text-left title-box2"><?php echo esc_attr($title); ?></h2>
    <?php } ?>
    <div class="product-type-slider">
        <div class="wrap-item group-navi" data-pagination="false" data-navigation="true"  data-autoplay="<?php echo esc_attr($autoplay); ?>" data-itemscustom="[[0,1],[560,2],[768,<?php echo esc_attr($number_item_desktop)?>]]">
        <?php  while ($pro_query->have_posts()) {
        $pro_query->the_post();?>
            <?php if($i % (int)$number_item_product_col == 1) echo '<div class="item">'; ?>
                <div class="item-product-type table product">
                    <div class="product-thumb">
                        <?php s7upf_get_image_product_quickview_in_loop($image_size,$default_image,$animation_img); ?>
                    </div>
                    <div class="product-info">
                        <div class="product-price">
                            <?php woocommerce_template_loop_price(); ?>
                        </div>
                        <h3 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <?php do_action( 's7upf_vendor_shop_loop_sold_by' );?>
                        <?php echo s7upf_get_rating_html(); ?>
                        <?php
                        woocommerce_template_loop_add_to_cart();
                        ?>

                    </div>
                </div>

            <?php if($i % (int)$number_item_product_col == 0 || $i == $count_post) echo '</div>'; ?>
            <!-- End Item -->
        <?php $i = $i+1; } wp_reset_postdata();?>
        </div>
    </div>
    <?php if(!empty($btn_link['title'])) {?>
        <div class="view-all-product text-center">
            <a  href="<?php echo (!empty($btn_link['url']))? esc_url($btn_link['url']): '#'; ?>" <?php if(empty($btn_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($btn_link['target']))?'_blank':'_parent'; ?>" class="btn-arrow color style2"><?php echo esc_attr($btn_link['title'])?></a>
        </div>
    <?php } ?>
</div>
<?php }