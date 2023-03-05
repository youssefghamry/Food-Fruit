<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 08/04/2017
 * Time: 10:46
 */
$image_size = s7upf_get_size_image('full',$image_size);
switch ($style){
    case 'style1':
        if(!empty($data_item_brand) and is_array($data_item_brand)) {
            ?>
            <div class="brand-slider">
                <div class="wrap-item" data-pagination="<?php echo esc_attr($pagination); ?>" data-autoplay="<?php echo esc_attr($autoplay)?>" data-itemscustom="[[0,2],[480,<?php echo esc_attr($smart); ?>],[768,<?php echo esc_attr($tablet); ?>],[990,<?php echo esc_attr($desktop);?>]]">
                    <?php foreach ($data_item_brand as $value) {
                        $data_link = '';
                        if(!empty($value['link']))
                            $data_link = vc_build_link($value['link']);
                        if(!empty($value['image'])){ ?>
                            <div class="item-brand">
                                <a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" class="pulse-grow">
                                    <?php echo wp_get_attachment_image($value['image'],$image_size)?>
                                </a>
                            </div>
                    <?php }
                    } ?>
                </div>
            </div>
            <?php
        }
        break;
    case 'style2':
        if(!empty($data_item_brand) and is_array($data_item_brand)) {
            ?>
            <div class="list-brand2">
            <?php foreach ($data_item_brand as $value) {
                $data_link = '';
                if(!empty($value['link']))
                    $data_link = vc_build_link($value['link']);
                if(!empty($value['image'])){ ?>
                <div class="item-brand2">
                    <a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" class="border">
                        <?php echo wp_get_attachment_image($value['image'],$image_size, false, array('class'=>'wobble-horizontal')); ?>
                    </a>
                </div>
              <?php }
            } ?>
            </div>
            <?php
        }
        break;
    case 'style3':
        if(!empty($data_item_brand) and is_array($data_item_brand)) { ?>
            <div class="payment-method <?php echo esc_attr($position);?>">
            <?php foreach ($data_item_brand as $value) {
                $data_link = '';
                if(!empty($value['link']))
                    $data_link = vc_build_link($value['link']);
                if(!empty($value['image'])){ ?>
                <a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" class="wobble-top">
                    <?php echo wp_get_attachment_image($value['image'],$image_size); ?>
                </a>
                <?php }
                } ?>
            </div>
            <?php
        }
        break;
    default:
        $class_color_title = S7upf_Assets::build_css('color: '.$color_title.';');
        ?>
        <ul class="list-inline-block mb-brand-element4 <?php echo esc_attr($position); ?>">
            <?php if(!empty($title)){ ?>
            <li><h2 class="title18 <?php echo esc_attr($class_color_title);?>"><?php echo esc_attr($title); ?></h2></li>
            <?php } ?>
            <?php  if(!empty($data_item_brand) and is_array($data_item_brand)) {  ?>
            <li>
                <div class="payment-method">
                    <?php foreach ($data_item_brand as $value) {  $data_link = '';
                    if(!empty($value['link']))
                        $data_link = vc_build_link($value['link']);
                    if(!empty($value['image'])){ ?>
                    <a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" class="wobble-top">
                        <?php echo wp_get_attachment_image($value['image'],$image_size); ?>
                    </a>
                    <?php } } ?>
                </div>
            </li>
            <?php } ?>
        </ul>
        <?php
        break;
}