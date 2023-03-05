<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 25/04/2017
 * Time: 10:30
 */
$class_main =  $class_main2 = '';
if($main_color !==''){
    $class_main .= ' '.S7upf_Assets::build_css('color:'.$main_color.';');
    $class_main .= ' '.S7upf_Assets::build_css('background:'.$main_color.';',' .email-form input[type="email"]');
    $class_main .= ' '.S7upf_Assets::build_css('border-color:'.$main_color.'; color:'.$main_color.';',' .email-form input[type="submit"]');
    $class_main2 .= ' '.S7upf_Assets::build_css('color:'.$main_color.';',' .color');
    $class_main2 .= ' '.S7upf_Assets::build_css('background:'.$main_color.';',' .email-form2 input[type="submit"]');
    $class_main2 .= ' '.S7upf_Assets::build_css('color:'.$main_color.';',' .email-form2 > i');
}
if($desc_color !== ''){
    $class_main2 .= ' '.S7upf_Assets::build_css('color:'.$desc_color.';',' .desc');
}
if('style3' === $style){ ?>
    <div class="mailchimp-style3 footer-box2 <?php echo esc_attr($class_main2); ?> mb-mailchimp  <?php echo esc_attr($extra_class)?> "  data-namesubmit = "<?php echo esc_attr($submit_name)?>" data-placeholder = "<?php echo esc_attr($placeholder)?>">
        <div class="icon-mailchimp">
            <i class="fa color <?php echo esc_attr($icon)?>"></i>
            <div class="title-desc">
                <h2 class="title18 font-bold"><?php echo esc_attr($title); ?></h2>
                <p class="desc"><?php echo esc_attr($desc); ?></p>
            </div>
        </div>
        <div class="email-form2">
            <?php echo wpb_js_remove_wpautop('[mc4wp_form id="'.$shortcode.'"]'); ?>
        </div>
    </div>
    <?php
} else if('style1' === $style){ ?>
    <ul class="mailchimp-style1 inner-newsletter color list-inline-block mb-mailchimp <?php echo esc_attr($extra_class)?> <?php echo esc_attr($position); ?> <?php echo esc_attr($class_main); ?>" data-namesubmit = "<?php echo esc_attr($submit_name)?>" data-placeholder = "<?php echo esc_attr($placeholder)?>">
        <li><h2 class="title30"><i class="fa <?php echo esc_attr($icon)?>"></i><?php echo esc_attr($title); ?></h2></li>
        <li><p><?php echo esc_attr($desc); ?></p></li>
        <li>
            <div class="email-form">
                <?php echo wpb_js_remove_wpautop('[mc4wp_form id="'.$shortcode.'"]'); ?>
            </div>
        </li>
    </ul>
    <?php
}else{
    ?>
    <div class="footer-box2 mailchimp-style2 <?php echo esc_attr($class_main2); ?> mb-mailchimp  <?php echo esc_attr($extra_class)?> "  data-namesubmit = "<?php echo esc_attr($submit_name)?>" data-placeholder = "<?php echo esc_attr($placeholder)?>">
        <h2 class="title18 font-bold color"><?php echo esc_attr($title); ?></h2>
        <p class="desc"><?php echo esc_attr($desc); ?></p>
        <div class="email-form2">
            <i class="fa <?php echo esc_attr($icon)?>"></i>
            <?php echo wpb_js_remove_wpautop('[mc4wp_form id="'.$shortcode.'"]'); ?>
        </div>
    </div>
    <?php
}