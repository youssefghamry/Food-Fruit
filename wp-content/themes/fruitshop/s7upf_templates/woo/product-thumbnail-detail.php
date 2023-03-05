<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17/04/2017
 * Time: 11:32
 */
global $product;
global $post;
$default_image = get_template_directory_uri().'/assets/images/placeholder.png';
$attachment_ids = $product->get_gallery_image_ids();
$image_size = s7upf_get_option('s7upf_custom_image_size');
if(!empty($image_size)){
    $image_size  = s7upf_get_size_image('800x800',$image_size);
}
?>
<div class="detail-gallery mb-gallery-product">
    <div class="mid">
        <?php if ( has_post_thumbnail() ) {
            $id_img =  get_post_thumbnail_id( $post->ID );
            $url_img = wp_get_attachment_image_url($id_img,$image_size);
            ?>
            <img src="<?php echo esc_url($url_img); ?>"/>
            <?php
        }  else {
            $dimensions = wc_get_image_size( $image_size ); ?>
            <img src="<?php echo esc_url($default_image); ?>" width="<?php echo esc_attr( $dimensions['width'] ) ?> " height="<?php echo esc_attr( $dimensions['height'] ) ?> "  alt="<?php esc_html_e('Image Default','fruitshop')?>" title="<?php esc_html_e('product','fruitshop')?>" />
            <?php
        }?>
    </div>
    <?php if(count($attachment_ids)>0){ ?>
    <div class="gallery-control">
        <div class="carousel">
            <ul class="list-none">
                <li><a href="#" class="active">
                    <?php if ( has_post_thumbnail() ) {
                        $props = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
                        echo get_the_post_thumbnail( $post->ID, $image_size, array(
                            'title'	 => $props['title'],
                            'alt'    => $props['alt'],
                        ) );
                    }  else {
                        $dimensions = wc_get_image_size( $image_size ); ?>
                        <img src="<?php echo esc_url($default_image); ?>" width="<?php echo esc_attr( $dimensions['width'] ) ?> " height="<?php echo esc_attr( $dimensions['height'] ) ?> "  alt="<?php esc_html_e('Image Default','fruitshop')?>" title="<?php esc_html_e('product','fruitshop')?>" />
                        <?php
                    }?>
                </a></li>
                <?php
                if(is_array($attachment_ids) and count($attachment_ids)>0){
                    foreach ($attachment_ids as $key => $value){
                        if(!empty($value)){
                            ?><li><a href="#"><?php
                            echo wp_get_attachment_image($value,$image_size,false);
                            ?></a></li><?php
                        }
                    }
                }
                ?>

            </ul>
        </div>
        <a href="#" class="prev"><i class="icon ion-ios-arrow-thin-left"></i></a>
        <a href="#" class="next"><i class="icon ion-ios-arrow-thin-right"></i></a>
    </div>
    <?php } ?>
</div>