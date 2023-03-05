<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 04/04/2017
 * Time: 11:15
 */
$btn_color = '';
$image_size = s7upf_get_size_image('full',$bg_image_size);
$title_color1_main = S7upf_Assets::build_css('color:'.$title_color_1.';');
$title_color2_main = S7upf_Assets::build_css('color:'.$title_color_2.';');
if(!empty($data_banner_4) and is_array($data_banner_4)){
?>
<div class="banner-slider banner-slider4 bg-slider drop-shadow <?php echo esc_attr($extra_class); ?>">
    <div class="wrap-item" data-pagination="false" data-autoplay="<?php echo esc_attr($autoplay)?>" data-navigation="<?php echo esc_attr($navigation)?>" data-itemscustom="[[0,1]]">
    <?php foreach($data_banner_4 as $value){
        $data_button  = $data_bg_link  = '';
        if(!empty($value['button']))
            $data_button = vc_build_link($value['button']);
        if(!empty($value['bg_link']))
            $data_bg_link = vc_build_link($value['bg_link']);
        if(!empty($value['button_color'])) {
            $btn_color = S7upf_Assets::build_css('background:' . $value['button_color'] . ';', '.btn-arrow.style2');
        }
        if(!empty($value['button_color_hover'])) {
            $btn_color .= ' ' . S7upf_Assets::build_css('background:' . $value['button_color_hover'] . ';', '.btn-arrow.style2:hover');
        }
        if(!empty($value['title_color_1'])) {
            $title_color1 = S7upf_Assets::build_css('color:' . $value['title_color_1'] . ';');
        }else $title_color1 = $title_color1_main;
        if(!empty($value['title_color_2'])) {
            $title_color2 = S7upf_Assets::build_css('color:' . $value['title_color_2'] . ';');
        }else $title_color2 = $title_color2_main;
        ?>
        <div class="item-slider item-slider4">
            <?php if(!empty($value['bg_image'])){ ?>
            <div class="banner-thumb">
                <a href="<?php echo (!empty($data_bg_link['url']))? esc_url($data_bg_link['url']): '#'; ?>" <?php if(empty($data_bg_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_bg_link['target']))?'_blank':'_parent'; ?>">
                    <?php echo wp_get_attachment_image($value['bg_image'],$image_size)?>
                </a>
            </div>
            <?php } ?>
            <div class="banner-info text-center">
            <?php if(!empty($value['title_1'])){?>
                <h2 class="color title30 paci-font <?php echo esc_attr($title_color1); ?>"><?php echo do_shortcode($value['title_1']); ?></h2>
            <?php } ?>
            <?php if(!empty($value['title_2'])){?>
                <h2 class="title30 text-uppercase font-bold <?php echo esc_attr($title_color2); ?>"><?php echo do_shortcode($value['title_2']); ?></h2>
            <?php } ?>
             <?php if(!empty($data_button['title'])){ ?>
                <a href="<?php echo (!empty($data_button['url']))? esc_url($data_button['url']): '#'; ?>" <?php if(empty($data_button['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_button['target']))?'_blank':'_parent'; ?>" class="btn-arrow style2 bg-color <?php echo esc_attr($btn_color);?>"><?php echo esc_attr($data_button['title']); ?></a>
            <?php } ?>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php }