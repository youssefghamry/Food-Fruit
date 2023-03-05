<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 26/06/2017
 * Time: 10:21 SA
 */
$image_size = s7upf_get_size_image('full',$bg_image_size);
if(!empty($data_banner_1) and is_array($data_banner_1)){
    ?>
    <div class="banner-slider banner-slider7 <?php echo esc_attr($extra_class); ?>">
        <div class="wrap-item" data-transition="fade" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-pagination="false" data-navigation="<?php echo esc_attr($navigation); ?>" data-itemscustom="[[0,1]]">
            <?php foreach($data_banner_1 as $value){
                $data_button='';
                if(!empty($value['button']))
                    $data_button = vc_build_link($value['button']); ?>
                <div class="item-slider item-slider7 <?php echo esc_attr($title_color_2); ?>">
                    <?php if(!empty($value['bg_image'])){ ?>
                        <div class="banner-thumb">
                            <a href="<?php echo (!empty($data_button['url']))? esc_url($data_button['url']): '#'; ?>">
                                <?php echo wp_get_attachment_image($value['bg_image'],$image_size,false)?>
                            </a>
                        </div>
                    <?php } ?>
                    <div class="banner-info text-center text-uppercase animated" data-animated="zoomInRight">
                        <?php if(!empty($value['title_1'])){ ?>
                            <h3 class="title30"><?php echo do_shortcode($value['title_1']); ?></h3>
                        <?php }
                        if(!empty($value['title_2'])){?>
                            <h2 class="title60 font-bold color"><?php echo do_shortcode($value['title_2'])?></h2>
                        <?php }  if(!empty($value['title_3'])){ ?>
                            <h4 class="title18"> <?php echo do_shortcode($value['title_3'])?></h4>
                        <?php }
                        if(!empty($data_button['title'])){ ?>
                            <a href="<?php echo (!empty($data_button['url']))? esc_url($data_button['url']): '#'; ?>" <?php if(empty($data_button['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_button['target']))?'_blank':'_parent'; ?>" class="btn-arrow bg-color2"><?php echo esc_attr($data_button['title'])?></a>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>