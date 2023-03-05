<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 19/10/2017
 * Time: 2:45 CH
 */
if(!function_exists('s7upf_vc_block'))
{
    function s7upf_vc_block($attr, $content = false)
    {
        $html = $css_class =$custom_css= $el_class = '';
        extract(shortcode_atts(array(
            'el_class' => '',
            'custom_css' => '',
        ),$attr));

        $css_class = vc_shortcode_custom_css_class( $custom_css );
        $html .= '<div class="element-parent '.esc_attr($el_class).' '. esc_attr($css_class).'">
                       '. wpb_js_remove_wpautop($content, false).'
                    </div>';
                return $html;
    }
}
stp_reg_shortcode('s7upf_block','s7upf_vc_block');
vc_map(
    array(
        'name'     => esc_html__( 'SV Block', 'fruitshop' ),
        'base'     => 's7upf_block',
        'category' => esc_html__( '7Up-theme', 'fruitshop' ),
        'icon'     => 'icon-st',
        'as_parent' => array( 'only' => 'slide_carousel,contact-form-7,s7upf_tabs,s7upf_mail_chimp,s7upf_menu,s7upf_mini_cart,s7upf_products,s7upf_search_product,s7upf_service,s7upf_social_network,s7upf_team,s7upf_text_header,s7upf_top_header,s7upf_gallery_photo,sv_map,s7upf_instagram,sv_language_selector,s7upf_link,s7upf_logo_header,s7upf_client_review,s7upf_contact_info,s7upf_content_box,s7upf_count_number,s7upf_countdown_box,s7upf_categories,s7upf_brand,s7upf_blog,s7upf_banner,s7upf_banner_slider,vc_column_text,vc_single_image,vc_row' ),
        'content_element' => true,
        'js_view' => 'VcColumnView',
        'params'   => array(

            array(
                "type" => "textfield",
                "heading" => esc_html__("Extra class name",'fruitshop'),
                "param_name" => "el_class",
                'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'fruitshop' ),
            ),
            array(
                "type"          => "css_editor",
                "heading"       => esc_html__("CSS box",'fruitshop'),
                "param_name"    => "custom_css",
                'group'         => esc_html__('Design Option','fruitshop')
            ),
        )
    )
);


//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_s7upf_block extends WPBakeryShortCodesContainer {}
}