<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 24/04/2017
 * Time: 17:50
 */
$image_size  = s7upf_get_size_image('54x64',$image_size);
if('style4' === $style){
    if(!empty($data_add_content4) and is_array($data_add_content4)) { ?>
    <div class="list-content-style4 <?php echo esc_attr($el_class); ?>">
        <?php foreach ($data_add_content4 as $value) {
            if(!empty($value['link'])) $link = vc_build_link($value['link']); ?>
            <div class="item-list-menu table">
                <div class="product-thumb zoom-rotate">
                    <a href="<?php if(!empty($value['link'])) echo esc_url($value['link']); else "#"; ?>" class="adv-thumb-link">
                        <?php echo wp_get_attachment_image($value['img'],'full'); ?>
                    </a>
                </div>
                <div class="product-info">
                    <?php if(!empty($value['title'])){
                        ?>
                        <h3 class="title14"><a href="<?php if(!empty($value['link'])) echo esc_url($value['link']); else "#"; ?>"><?php echo esc_attr($value['title']); ?></a></h3>
                        <?php
                    } ?>
                    <?php if(!empty($value['desc'])){ ?>
                        <p class="desc silver"><?php echo esc_attr($value['desc']); ?></p>
                    <?php } ?>
                    <?php if(!empty($value['price'])){ ?>
                        <span class="color"><?php echo esc_attr($value['price']); ?></span>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php }
}else if('style3' === $style){ ?>
    <div class="list-content-style3  <?php echo esc_attr($el_class); ?>">
        <?php if(!empty($img_icon)){ ?>
        <div class="img_icon">
            <?php echo wp_get_attachment_image($img_icon,array(70,70))?>
        </div>
        <?php } ?>
        <div class="item-menu-info">
            <?php if(!empty($title3)) echo  '<h3 class="title18 color">'.$title3.'</h3>'?>
            <?php if(!empty($desc3)) echo  '<p class="desc">'.$desc3.'</p>'?>
            <?php
            if(!empty($data_add_content3) and is_array($data_add_content3)) { ?>
                <?php foreach ($data_add_content3 as $value) {
                    if(!empty($value['title'])){?>
                        <p class="name-food"><?php echo esc_attr($value['title']); ?><span><?php if(!empty($value['price'])) echo esc_attr($value['price'])?></span></p>
                    <?php }
                }
            } ?>
        </div>
    </div>
    <?php

}else if('style1' === $style){

    if(!empty($data_add_content) and is_array($data_add_content)) { ?>
        <div class="list-diet  <?php echo esc_attr($el_class); ?> <?php echo ('off'===$scrollbar)?'':'custom-scroll'?> <?php echo esc_attr($position_img);?>">
            <?php foreach ($data_add_content as $value) {
                $url = wp_get_attachment_url($value['img']);
                $size_default = getimagesize($url);
                if($image_size[0]>$size_default[0] || $image_size[1]>$size_default[1]){
                    $image_size = 'full';
                }

                if(!empty($value['link'])) $link = vc_build_link($value['link']); ?>
                <div class="item-diet table">
                    <?php if('left' === $position_img) {?>
                    <div class="diet-thumb"><a href="<?php echo (!empty($link['url']))? esc_url($link['url']): '#'; ?>" <?php if(empty($link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($link['target']))?'_blank':'_parent'; ?>" ><?php if(!empty($value['img'])) echo wp_get_attachment_image($value['img'],$image_size)?></a></div>
                    <?php } ?>
                    <div class="diet-info text-<?php echo esc_attr($position_img);?>">
                        <?php if(!empty($value['title'])){ ?>
                            <h3 class="title18"><a href="<?php echo (!empty($link['url']))? esc_url($link['url']): '#'; ?>" <?php if(empty($link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($link['target']))?'_blank':'_parent'; ?>" class="black"><?php echo esc_attr($value['title']); ?></a></h3>
                        <?php } ?>
                        <?php if(!empty($value['desc'])){ ?>
                            <p class="desc"><?php echo esc_attr($value['desc']); ?></p>
                        <?php } ?>
                    </div>
                    <?php if('right' === $position_img) {?>
                    <div class="diet-thumb"><a href="<?php echo (!empty($link['url']))? esc_url($link['url']): '#'; ?>" <?php if(empty($link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($link['target']))?'_blank':'_parent'; ?>" ><?php if(!empty($value['img'])) echo wp_get_attachment_image($value['img'],$image_size)?></a></div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
        <?php
    }
}else{
    if(!empty($bg_image))
    $class_bg = S7upf_Assets::build_css('background: transparent url('.wp_get_attachment_image_url($bg_image,'full').') no-repeat center center / 100% 100%;')?>
    <div class="diet-intro  <?php echo esc_attr($el_class); ?> <?php echo esc_attr($class_bg); ?>">
        <?php if(!empty($text_content)){ ?>
            <p class="desc">
                <?php echo esc_attr($text_content);?>
            </p>
        <?php } ?>
    </div>
    <?php
}
?>