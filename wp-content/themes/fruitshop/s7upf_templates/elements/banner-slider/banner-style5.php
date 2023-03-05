<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 04/04/2017
 * Time: 12:01
 */
$image_size = s7upf_get_size_image('full',$bg_image_size);
$title_color1 = S7upf_Assets::build_css('color:'.$title_color_1.';');
$title_color2 = S7upf_Assets::build_css('color:'.$title_color_2.';');
$title_color3 = S7upf_Assets::build_css('color:'.$title_color_3.';');

$class_btn_color = S7upf_Assets::build_css('color:'.$btn_color.';');
$class_btn_color .= ' '.S7upf_Assets::build_css('border-color:'.$btn_color.';','.btn-arrow');
$class_btn_color .= ' '.S7upf_Assets::build_css('background:'.$btn_color.';','.btn-arrow:hover');
if(!empty($data_banner_5) and is_array($data_banner_5)){
?>
<div class="banner-slider banner-slider5 <?php echo esc_attr($extra_class); ?>">
    <div class="wrap-item" data-pagination="false"  data-autoplay="<?php echo esc_attr($autoplay)?>" data-navigation="<?php echo esc_attr($navigation)?>" data-itemscustom="[[0,1]]">
    <?php foreach($data_banner_5 as $value){
        $data_button  = '';
        if(!empty($value['button']))
            $data_button = vc_build_link($value['button']);
        ?>
        <div class="item-slider item-slider5">
            <?php if(!empty($value['bg_image'])){ ?>
            <div class="banner-thumb">
                <a href="#">
                    <?php echo wp_get_attachment_image($value['bg_image'],$image_size)?>
                </a>
            </div>
            <?php } ?>
            <div class="banner-info text-center">
                <?php if(!empty($value['title_1'])){?>
                <h3 class="title30 paci-font <?php echo esc_attr($title_color1); ?>"><?php echo do_shortcode($value['title_1']); ?></h3>
                <?php } ?>
                <?php if(!empty($value['title_2'])){?>
                <h2 class="title60 color text-uppercase font-bold <?php echo esc_attr($title_color2); ?>"><?php echo do_shortcode($value['title_2']); ?></h2>
                <?php } ?>
                <?php if(!empty($value['title_3'])){?>
                <h4 class="title18 text-uppercase <?php echo esc_attr($title_color3); ?>"> <?php echo do_shortcode($value['title_3']); ?></h4>
                <?php } ?>
                <?php if(!empty($data_button['title'])){ ?>
                <a href="<?php echo (!empty($data_button['url']))? esc_url($data_button['url']): '#'; ?>" <?php if(empty($data_button['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_button['target']))?'_blank':'_parent'; ?>" class="btn-arrow color <?php echo esc_attr($class_btn_color); ?>"><?php echo esc_attr($data_button['title']); ?></a>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
    </div>
</div>
<?php }