<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 6/13/17
 * Time: 9:11 PM
 */
$image_size = s7upf_get_size_image('full',$bg_image_size);
if(!empty($data_banner_6) and is_array($data_banner_6)){
    ?>
    <div class="banner-slider banner-slider6 bg-slider parallax-slider <?php echo esc_attr($extra_class); ?>">
        <div class="wrap-item" data-pagination="false" data-navigation="<?php echo esc_attr($navigation); ?>" data-transition="fade" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-itemscustom="[[0,1]]">
            <?php foreach($data_banner_6 as $value){
                $data_button='';
                if(!empty($value['button']))
                    $data_button = vc_build_link($value['button']); ?>
                <div class="item-slider item-slider6">
                    <div class="banner-thumb">
                        <a href="#">
                            <?php echo wp_get_attachment_image($value['bg_image'],$image_size,false,array('class'=>'mb_image_full'))?>
                        </a>
                    </div>
                    <div class="banner-info text-center text-uppercase">
                        <div class="info-image">
                            <?php echo wp_get_attachment_image($value['img_info'],'full')?>
                        </div>
                        <div class="info-text">
                            <?php if(!empty($value['title_1'])){?>
                                <h3 class="title30"><?php echo do_shortcode($value['title_1']); ?></h3>
                            <?php } ?>
                            <?php if(!empty($value['title_2'])){?>
                                <h2 class="title120 color font-bold"><?php echo do_shortcode($value['title_2']); ?></h2>
                            <?php } if(!empty($value['title_3'])){?>
                                <h4 class="title18"> <?php echo do_shortcode($value['title_3']);?></h4>
                            <?php } if(!empty($data_button['title'])){?>
                                <a href="<?php echo (!empty($data_button['url']))? esc_url($data_button['url']): '#'; ?>" <?php if(empty($data_button['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_button['target']))?'_blank':'_parent'; ?>" class="shop-button bg-color large"><?php echo esc_attr($data_button['title']); ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php }?>
