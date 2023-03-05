<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package 7up-framework
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head();
$preload = s7upf_get_option('preload','off'); ?>
</head>
<body <?php body_class(); ?>>
    <div class="wrap  <?php  if($preload == 'on')echo'preload' ?> ">
        <?php  if($preload == 'on'){ ?>
        <div id="loading">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_four"></div>
                    <div class="object" id="object_three"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_one"></div>
                </div>
            </div>
        </div>
        <?php } ?>
        <header id="header">
            <div class="header">
                <?php
                $page_id = s7upf_get_value_by_id('s7upf_header_page');
                $header_product_list = s7upf_get_option('s7upf_header_product_list');
                $header_product_detail = s7upf_get_value_by_id('s7upf_header_product_detail');
                if(class_exists('woocommerce')){
                    if(is_woocommerce() and !empty($header_product_list)){
                        $page_id = $header_product_list;
                    }
                    if(is_product() and !empty($header_product_detail)){
                        $page_id = $header_product_detail;
                    }
                }

                if(!empty($page_id)){
                   s7upf_get_header_visual($page_id);
                }
                else{
                    s7upf_get_header_default();
                }?>
            </div>
        </header>
        <!--header Close-->
        <section id="content" class="main-wrapper">
            <div class="container">
                <?php s7upf_display_breadcrumb();