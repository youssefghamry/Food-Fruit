<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 10/04/2017
 * Time: 10:18
 */
$class_color_title = S7upf_Assets::build_css('color:'.$color_title.';');
$class_color_number = S7upf_Assets::build_css('color:'.$color_number.';','.rotate-number');
$class_bg_number = S7upf_Assets::build_css('background:'.$bg_number.';','.rotate-number');
$class_border_number = S7upf_Assets::build_css('border: 1px '.$style_border.' '.$color_border.';','.rotate-number');
?>
<div class="list-statistic <?php echo esc_attr($position); ?> mb-elemnet-count">
    <div class="item-rotate-number text-center text-uppercase font-bold">
        <?php if(!empty($number)){ ?>
        <div class="rotate-number numscroller style1 <?php echo esc_attr($class_border_number); ?>  <?php echo esc_attr($class_color_number); ?> <?php echo esc_attr($class_bg_number); ?>"><?php echo esc_attr($number)?></div>
        <?php } ?>
        <?php if(!empty($title)){ ?>
        <h2 class="title14 <?php echo esc_attr($class_color_title); ?>"><?php echo esc_attr($title); ?></h2>
        <?php } ?>
    </div>
</div>
