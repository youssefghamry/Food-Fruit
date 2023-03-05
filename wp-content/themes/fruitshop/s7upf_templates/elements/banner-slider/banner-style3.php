<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 04/04/2017
 * Time: 10:24
 */
$image_size = s7upf_get_size_image('full',$bg_image_size);
$title_color1 = S7upf_Assets::build_css('color:'.$title_color_1.';');
$title_color2 = S7upf_Assets::build_css('color:'.$title_color_2.';');
$btn_color_1 = S7upf_Assets::build_css('color:'.$button_color.';');
$btn_color_1 .= ' '.S7upf_Assets::build_css('border-color:'.$button_color.';','.btn-arrow.style2');
$btn_color_1 .= ' '.S7upf_Assets::build_css('border-color:'.$button_color_2.';','.btn-arrow.style2:hover');
$btn_color_1 .= ' '.S7upf_Assets::build_css('background:'.$button_color_2.';','.btn-arrow.style2:hover');
$btn_color_1 .= ' '.S7upf_Assets::build_css('background:'.$button_color.';','.btn-arrow.style2:after');
$btn_color_1 .= ' '.S7upf_Assets::build_css('background:rgba(255, 255, 255, 0.2);','.btn-arrow.style2:hover:after');
$btn_color_2 = S7upf_Assets::build_css('background:'.$button_color_2.';','.btn-arrow.style2');
$btn_color_2 .= ' '.S7upf_Assets::build_css('background:'.$button_color.';','.btn-arrow.style2:hover');
if(!empty($data_banner_3) and is_array($data_banner_3)){
?>
<div class="banner-slider bg-slider banner-slider3 <?php echo esc_attr($extra_class); ?>">
    <div class="wrap-item" data-navigation="<?php echo esc_attr($navigation)?>" data-pagination="<?php echo esc_attr($pagination)?>" data-transition="fade" data-autoplay="<?php echo esc_attr($autoplay)?>" data-itemscustom="[[0,1]]">
    <?php foreach($data_banner_3 as $value){
        $data_button1 = $data_button2 = $data_bg_link='';
        if(!empty($value['button_1']))
            $data_button1 = vc_build_link($value['button_1']);
        if(!empty($value['button_2']))
            $data_button2 = vc_build_link($value['button_2']);
        if(!empty($value['bg_link']))
            $data_bg_link = vc_build_link($value['bg_link']); ?>
        <div class="item-slider item-slider3">
            <?php if(!empty($value['bg_image'])){?>
            <div class="banner-thumb">
                <a href="<?php echo (!empty($data_bg_link['url']))? esc_url($data_bg_link['url']): '#'; ?>" <?php if(empty($data_bg_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_bg_link['target']))?'_blank':'_parent'; ?>">
                    <?php echo wp_get_attachment_image($value['bg_image'],$image_size,false,array('class'=>'mb_image_full'))?>
                </a>
            </div>
            <?php } ?>
            <div class="banner-info text-center white animated" <?php if(!empty($value['animation_info_text'])) echo 'data-animated="'.$value['animation_info_text'].'"'?>>
            <?php if(!empty($value['title_1'])){?>
                <h2 class="title30 paci-font <?php echo esc_attr($title_color1); ?>"><?php echo do_shortcode($value['title_1']); ?></h2>
            <?php } ?>
            <?php if(!empty($value['title_2'])){?>
                <h2 class="font-bold text-uppercase title30 <?php echo esc_attr($title_color2); ?>"><?php echo do_shortcode($value['title_2']); ?></h2>
            <?php } ?>
                <div class="banner-button">
                    <?php if(!empty($data_button1['title'])){?>
                        <a href="<?php echo (!empty($data_button1['url']))? esc_url($data_button1['url']): '#'; ?>" <?php if(empty($data_button1['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_button1['target']))?'_blank':'_parent'; ?>" class="btn-arrow color2 style2 <?php echo esc_attr($btn_color_1);?>"><?php echo esc_attr($data_button1['title']); ?></a>
                    <?php } ?>
                    <?php if(!empty($data_button2['title'])){?>
                        <a href="<?php echo (!empty($data_button2['url']))? esc_url($data_button2['url']): '#'; ?>" <?php if(empty($data_button2['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_button2['target']))?'_blank':'_parent'; ?>" class="btn-arrow bg-color style2 <?php echo esc_attr($btn_color_2);?>"><?php echo esc_attr($data_button2['title']); ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
</div>
<?php }