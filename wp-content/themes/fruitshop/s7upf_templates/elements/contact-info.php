<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 10/04/2017
 * Time: 08:10
 */
$class_color_icon = S7upf_Assets::build_css('color: '.$color_icon.';');
$class_color_title = S7upf_Assets::build_css('color: '.$color_title.';');
if('style1' === $style){
    if(!empty($data_item_contact) and is_array($data_item_contact)) {
        ?>
        <div class="contact-footer">
            <?php foreach ($data_item_contact as $value){
                $data_link = '';
                if(!empty($value['link']))
                    $data_link = vc_build_link($value['link']); ?>
            <p class="desc silver <?php echo esc_attr($class_color_title); ?>">
                <?php if(!empty($value['icon'])){ ?>
                <span class="color <?php echo esc_attr($class_color_icon); ?>">
                    <i class="fa <?php echo esc_attr($value['icon']); ?>" aria-hidden="true"></i>
                </span>
                <?php } ?>
                <?php if(!empty($data_link['url'])){?><a href="<?php echo esc_url($data_link['url'])?>" target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" class="silver <?php echo esc_attr($class_color_title); ?>"><?php } if(!empty($value['title'])) echo esc_attr($value['title']); if(!empty($data_link['url'])){ ?></a><?php } ?>
            </p>
            <?php }
            if(!empty($content)){?>

            <div class="desc silver none-padding">
                <?php echo wpb_js_remove_wpautop($content,true);?>
            </div>
            <?php } ?>
        </div>
        <?php
    }
}elseif('style2' === $style){
    $data_link_icon = '';
    if(!empty($link_icon)) $data_link_icon = vc_build_link($link_icon); ?>
    <div class="item-contact-info <?php echo esc_attr($position); ?>">
        <a class="contact-icon <?php echo esc_attr($class_color_icon); ?> color wobble-horizontal" href="<?php echo (!empty($data_link_icon['url']))? esc_url($data_link_icon['url']): '#'; ?>" <?php if(empty($data_link_icon['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link_icon['target']))?'_blank':'_parent'; ?>"><i class="fa <?php echo esc_attr($icon); ?>"></i></a>
        <?php if(!empty($content)) { ?><div class="title18 text-upperrcase font-bold"><?php echo wpb_js_remove_wpautop($content,true)?></div><?php } ?>
    </div>
    <?php
}else{
    $class_bg_icon = S7upf_Assets::build_css('background: '.$bg_icon.';',' .desc span');
    if(!empty($data_item_contact) and is_array($data_item_contact)) { ?>
        <div class="contact-footer2 <?php echo esc_attr($class_bg_icon); ?>">
        <?php foreach ($data_item_contact as $value){
            $data_link = '';
            if(!empty($value['link']))
                $data_link = vc_build_link($value['link']); ?>
            <p class="desc <?php echo esc_attr($class_color_title); ?>">
                <?php if(!empty($value['icon'])){ ?>
                <span class="color <?php echo esc_attr($class_color_icon); ?>"><i class="fa <?php echo esc_attr($value['icon']); ?>" aria-hidden="true"></i></span>
                <?php } ?>
                <?php if(!empty($data_link['url'])){?><a href="<?php echo esc_url($data_link['url'])?>" target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" class="<?php echo esc_attr($class_color_title); ?>"><?php } if(!empty($value['title'])) echo esc_attr($value['title']); if(!empty($data_link['url'])){ ?></a><?php } ?>

            </p>
            <?php } ?>
        </div>
        <?php
    }
}
?>
