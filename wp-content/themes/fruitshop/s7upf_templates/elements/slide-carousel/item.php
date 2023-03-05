
<div class="item-slider <?php echo esc_attr($el_class)?>">
    <div class="banner-thumb">
        <a href="<?php if(!empty($link)) echo esc_url($link)?>" <?php if(empty($link)) echo 'onclick="return false;"'; ?>><?php echo wp_get_attachment_image($image,'full')?></a>
    </div>
    <?php if(!empty($content)) { ?>
        <div class="banner-info">
            <div class="container">
                <div class="slider-content-text <?php echo esc_attr($info_class)?>" data-animated="<?php echo esc_attr($info_animation)?>">
                    <?php echo wpb_js_remove_wpautop($content, true)?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>