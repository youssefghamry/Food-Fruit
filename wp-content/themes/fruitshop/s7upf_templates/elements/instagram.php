<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 08/04/2017
 * Time: 15:01
 */
$class_width  = '';
$media_array=array();
if(function_exists('s7upf_scrape_instagram'))
    $media_array = s7upf_scrape_instagram($user, $photo_number,$token,$size_index);
if($source == 'media'){
    if(is_array($data_media)){
        $default_val = array(
            'thumbnail_src'      => '',
            'link'      => '',
        );
        if(!empty($width_two) && !empty($height_two)){
            $img_size = array($width_two,$height_two);
        } 
        else{
            $img_size = 'full';
        } 
        $img_size = 'full';
        foreach ($data_media as $key => $value){
            $url = wp_get_attachment_image_url($value['thumbnail_src']);
            $size_default = getimagesize($url);
            if($img_size[0]>$size_default[0] || $img_size[1]>$size_default[1]){
                $img_size = 'full';
            }
            
            $value = array_merge($default_val,$value);
            $media_array[] = array(
                'thumbnail_src' => wp_get_attachment_image_url($value['thumbnail_src'],$img_size),
                'link'      => $value['link'],
            );
        }
    }
}else if(function_exists('s7upf_scrape_instagram')){
    $media_array = s7upf_scrape_instagram($user, $photo_number,$token,$size_index);
}
if(!empty($width))
$class_width = S7upf_Assets::build_css('width:'.$width.'px!important;');
if($style == 'style1'){

        if(!empty($media_array)){
            ?><div class="list-instagram mb-list-instagram style1 <?php echo esc_attr($el_class);?> <?php echo esc_attr($position);?>"><?php
            foreach ($media_array as $item) {
                if(isset($item['link']) && isset($item['thumbnail_src'])){
                    if($click_action == 'popup') { ?>
                        <a href="<?php echo esc_url($item['thumbnail_src']); ?>" class="fancybox <?php echo esc_attr($class_width)?>" data-fancybox-group="instagram">
                            <img class="grow" src="<?php echo esc_url($item['thumbnail_src']); ?>" alt="instagram">
                        </a>
                        <?php
                    }else if($click_action == 'instagram'){
                        ?>
                        <a href="<?php echo esc_url( $item['link'] ); ?>" class="<?php echo esc_attr($class_width)?>">
                            <img class="grow" src="<?php echo esc_url($item['thumbnail_src']); ?>" alt="instagram">
                        </a>
                        <?php
                    }else{
                        ?>
                        <a href="#" onclick="return false;" class="<?php echo esc_attr($class_width)?>">
                            <img class="grow" src="<?php echo esc_url($item['thumbnail_src']); ?>" alt="instagram">
                        </a>
                        <?php
                    }
                }
            }
            ?> </div><?php
        }

}else{
    $class_image = S7upf_Assets::build_css('width:'.$width_two.'px; height:'.$height_two.'px;',' a img');

        if(!empty($media_array)){
            ?><ul class="list-inline-block mb-instagram-style2 <?php echo esc_attr($el_class);?> <?php echo esc_attr($position);?> list-photo-in <?php echo esc_attr($class_image); ?>"><?php
            foreach ($media_array as $item) {
                if(isset($item['link']) && isset($item['thumbnail_src'])){
                    if($click_action == 'popup'){
                        ?>
                        <li>
                            <div class="banner-quangcao zoom-image overlay-image">
                                <a href="<?php echo esc_url($item['thumbnail_src']); ?>" class="adv-thumb-link fancybox" data-fancybox-group="instagram2">
                                    <img src="<?php echo esc_url($item['thumbnail_src']); ?>" alt="instagram">
                                </a>
                            </div>
                        </li>
                        <?php
                    }else if($click_action == 'instagram'){
                        ?>
                        <li>
                            <div class="banner-quangcao zoom-image overlay-image">
                                <a href="<?php echo esc_url( $item['link'] ); ?>" class="adv-thumb-link">
                                    <img src="<?php echo esc_url($item['thumbnail_src']); ?>" alt="instagram">
                                </a>
                            </div>
                        </li>
                        <?php
                    }else{
                        ?>
                        <li>
                            <div class="banner-quangcao zoom-image overlay-image">
                                <a href="#" class="adv-thumb-link" onclick="return false;">
                                    <img src="<?php echo esc_url($item['thumbnail_src']); ?>" alt="instagram">
                                </a>
                            </div>
                        </li>
                        <?php
                    }
                }
            }
            ?></ul><?php
        }

}