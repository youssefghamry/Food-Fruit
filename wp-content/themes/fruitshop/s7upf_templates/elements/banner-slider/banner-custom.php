<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 26/06/2017
 * Time: 10:21 SA
 */
$image_size = s7upf_get_size_image('full',$bg_image_size);
if(!empty($data_banner_custom) and is_array($data_banner_custom)){ ?>
    <div class="banner-slider banner-slider-custom <?php echo esc_attr($extra_class); ?>">
        <div class="wrap-item" data-transition="fade" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-pagination="false" data-navigation="<?php echo esc_attr($navigation); ?>" data-itemscustom="[[0,1]]">
            <?php foreach($data_banner_custom as $value){
                $data_button='';
                if(!empty($value['button']))
                    $data_button = vc_build_link($value['button']); ?>
                <div class="item-slider <?php echo esc_attr($title_color_2); ?>">
                    <?php if(!empty($value['bg_image'])){ ?>
                        <div class="banner-thumb">
                            <a href="<?php echo (!empty($data_button['url']))? esc_url($data_button['url']): '#'; ?>">
                                <?php echo wp_get_attachment_image($value['bg_image'],$image_size,false)?>
                            </a>
                        </div>
                    <?php } ?>
                    <?php if(!empty($value['html_content'])){ ?>
                        <div class="banner-info <?php echo esc_attr($extra_class_info); ?> <?php echo esc_attr($value['pull_info']); ?> animated" data-animated="<?php if(!empty($value['animation_css'])) echo esc_attr($value['animation_css'])?>">
                            <div class="<?php echo esc_attr($value['align']); ?>">
                                <?php  echo s7upf_base64decode($value['html_content']);?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
<?php }