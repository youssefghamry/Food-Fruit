<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 10/04/2017
 * Time: 16:08
 */
if(empty($title) and empty($date))
    return;
$class = S7upf_Assets::build_css('color:'.$color_title.';',' .color');
$class .= ' '.S7upf_Assets::build_css('color:'.$color_time.';',' .days-countdown .time_circles > div');
$class .= ' '.S7upf_Assets::build_css('color:'.$color_time_text.';',' .days-countdown .time_circles > div .text');
$class .= ' '.S7upf_Assets::build_css('background:'.$background.';');
$class .= ' '.S7upf_Assets::build_css('background:'.$color_time_text.';',' .days-countdown .time_circles > div .text::before');
if($style == 'style2'){ ?>
    <div class="countdown-box-style2 <?php echo esc_attr($class); ?> <?php echo esc_attr($el_class); ?>">
        <?php if(!empty($title)){ ?>
            <h2 class="title18 color"><?php echo esc_attr($title); ?></h2>
        <?php }
        if(!empty($date)){ ?>
            <div class="days-countdown" data-date="<?php echo esc_attr($date); ?>" data-day="<?php echo esc_attr__('Days','fruitshop')?>" data-hour="<?php echo esc_attr__('Hours','fruitshop')?>" data-mins="<?php echo esc_attr__('Mins','fruitshop')?>" data-secs="<?php echo esc_attr__('Secs','fruitshop')?>"></div>
        <?php } ?>
    </div>
    <?php
}else{
?>
<div class="deal-countdown2 bg-color <?php echo esc_attr($class); ?> <?php echo esc_attr($el_class); ?>">
    <?php if(!empty($title)){ ?>
    <h2 class="title18 color"><?php echo esc_attr($title); ?></h2>
    <?php }
    if(!empty($date)){ ?>
    <div class="days-countdown" data-date="<?php echo esc_attr($date); ?>" data-day="<?php echo esc_attr__('Days','fruitshop')?>" data-hour="<?php echo esc_attr__('Hours','fruitshop')?>" data-mins="<?php echo esc_attr__('Mins','fruitshop')?>" data-secs="<?php echo esc_attr__('Secs','fruitshop')?>"></div>
    <?php } ?>
</div>
<?php }