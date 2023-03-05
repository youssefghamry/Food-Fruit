<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 10/03/2017
 * Time: 10:10
 */
$default_image = get_template_directory_uri().'/assets/images/placeholder.png';
$image_size  = s7upf_get_size_image('70x70');
$i = 1;
$count_post = $query->post_count;

global $post;
if($query->have_posts()) {
    while($query->have_posts()) {
        $query->the_post(); ?>
        <?php if($i % 5 == 1) echo '<div class="item">';?>
        <div class="item-wg-product table">
            <div class="product-thumb">
                <a href="<?php the_permalink(); ?>" class="product-thumb-link zoom-thumb">
                    <?php
                    if ( has_post_thumbnail() ) {
                        echo get_the_post_thumbnail(get_the_ID(),$image_size);
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
            </div>
        </div>
        <?php if($i==$count_post || $i % 5 == 0) echo '</div>';?>
        <?php $i = $i+1;
    }

}
?>

