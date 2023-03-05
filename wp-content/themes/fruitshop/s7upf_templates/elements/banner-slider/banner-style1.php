<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 03/04/2017
 * Time: 16:33
 */

$image_size = s7upf_get_size_image('full',$bg_image_size);
$title_color_1 = S7upf_Assets::build_css('color:'.$title_color_1.';');
$title_color_2 = S7upf_Assets::build_css('color:'.$title_color_2.';',' .banner-info .title120');
$title_color_3 = S7upf_Assets::build_css('color:'.$title_color_3.';');
if(!empty($data_banner_1) and is_array($data_banner_1)){
?>
<div class="banner-slider banner-slider1 bg-slider <?php echo esc_attr($extra_class); ?>">
    <div class="wrap-item" data-transition="fade" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-pagination="false" data-navigation="<?php echo esc_attr($navigation); ?>" data-itemscustom="[[0,1]]">
        <?php foreach($data_banner_1 as $value){
            $data_button='';
            if(!empty($value['button']))
                $data_button = vc_build_link($value['button']); ?>
                <div class="item-slider item-slider1 <?php echo esc_attr($title_color_2); ?>">
                    <?php if(!empty($value['bg_image'])){ ?>
                    <div class="banner-thumb">
                        <a href="<?php echo (!empty($data_button['url']))? esc_url($data_button['url']): '#'; ?>">
                            <?php echo wp_get_attachment_image($value['bg_image'],$image_size,false,array('class'=>'mb_image_full'))?>
                        </a>
                    </div>
                    <?php } ?>
                    <div class="banner-info animated" data-animated="bounceIn">
                        <div class="text-center white text-uppercase">
                            <?php if(!empty($value['title_1'])){ ?>
                                <h3 class="title30 <?php echo esc_attr($title_color_1); ?>"><?php echo do_shortcode($value['title_1']); ?></h3>
                            <?php }
                            if(!empty($value['title_2'])){?>
                                <h2 class="title120 font-bold animated" data-animated="flash"><?php echo do_shortcode($value['title_2'])?></h2>
                            <?php }  if(!empty($value['title_3'])){ ?>
                                <h4 class="title18 <?php echo esc_attr($title_color_3); ?>"> <?php echo do_shortcode($value['title_3'])?></h4>
                            <?php }
                            if(!empty($data_button['title'])){ ?>
                            <a href="<?php echo (!empty($data_button['url']))? esc_url($data_button['url']): '#'; ?>" <?php if(empty($data_button['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_button['target']))?'_blank':'_parent'; ?>" class="btn-arrow white"><?php echo esc_attr($data_button['title'])?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
        <?php } ?>
    </div>
</div>
<?php }