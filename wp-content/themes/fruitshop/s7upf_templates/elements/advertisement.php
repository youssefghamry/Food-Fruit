<?php
$data_link = vc_build_link($link);
if('about' == $style){ ?>
    <div class="banner-about-advs <?php echo esc_attr($el_class);?> <?php echo esc_attr($animation);?>">
        <a class="<?php if('wobble-horizontal' == $animation) echo 'wobble-horizontal'; ?> <?php if(!empty($animation) and 'wobble-horizontal' !== $animation) echo 'adv-thumb-link'; ?>" href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" title="<?php if(!empty($data_link['title'])) echo esc_attr($data_link['title']); ?>">
            <?php
            echo wp_get_attachment_image($image,$size);
            if($animation == 'zoom-out' || $animation ==  'zoom-out overlay-image')
                echo wp_get_attachment_image($image2,$size);
            ?>
        </a>
        <?php if(!empty($content)):?>
            <div class="banner-info-about <?php echo esc_attr($el_class2);?>">
                <?php echo wpb_js_remove_wpautop($content, true);?>
            </div>
        <?php endif;?>
    </div>
<?php } else{ ?>
    <div class="banner-advs <?php echo esc_attr($el_class);?> <?php echo esc_attr($animation);?>">
        <a class="<?php if('wobble-horizontal' == $animation) echo 'wobble-horizontal'; ?> <?php if(!empty($animation) and 'wobble-horizontal' !== $animation) echo 'adv-thumb-link'; ?>" href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" title="<?php if(!empty($data_link['title'])) echo esc_attr($data_link['title']); ?>">
            <?php
            echo wp_get_attachment_image($image,$size);
            if($animation == 'zoom-out' || $animation ==  'zoom-out overlay-image')
                echo wp_get_attachment_image($image2,$size);
            ?>
        </a>
        <?php if(!empty($content)):?>
            <div class="banner-info <?php echo esc_attr($el_class2);?>">
                <?php echo wpb_js_remove_wpautop($content, true);?>
            </div>
        <?php endif;?>
    </div>
<?php } ?>