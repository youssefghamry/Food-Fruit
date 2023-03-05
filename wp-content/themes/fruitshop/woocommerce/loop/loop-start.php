<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */
$type = 'grid';
$type = s7upf_get_option('woo_style_view_way_product');
$shop_mobile_2column = s7upf_get_option('shop_mobile_2column','off');
if(isset($_GET['type'])){
    $type = $_GET['type'];
}
if($type == 'list'){
    ?>
    <div class="product-list-view  ">
    <?php
}else{
    ?>
    <div class="product-grid-view <?php echo 'shop_mobile_2column-'.esc_attr($shop_mobile_2column)?> ">
    <div class="row">
    <?php
}