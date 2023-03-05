<?php
/**
 * Created by Sublime text 2.
 * User: 7uptheme
 * Date: 18/08/15
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_top_header'))
{
    function s7upf_vc_top_header($attr,$content = false)
    {
        $html = $show_account = $show_log_in=$extra_class = $color_text_hover =$color_text = $bg_color = $text_left = $title_account = $show_checkout = '' ;
        extract(shortcode_atts(array(
            'show_account'      => 'on',
            'title_account'      => esc_html__('My Account','fruitshop'),
            'show_log_in'      => 'on',
            'show_checkout'      => 'on',
            'text_left'      => '',
            'bg_color'      => '',
            'color_text'      => '',
            'color_text_hover'      => '',
            'extra_class'      => '',
        ),$attr));
        $html .= S7upf_Template::load_view('elements/top-header',false, array(
            'show_account' => $show_account,
            'title_account' => $title_account,
            'show_log_in' => $show_log_in,
            'show_checkout' => $show_checkout,
            'text_left' => $text_left,
            'bg_color' => $bg_color,
            'color_text' => $color_text,
            'color_text_hover' => $color_text_hover,
            'content' => $content,
            'extra_class' => $extra_class,
        ));
        return $html;
    }
}

stp_reg_shortcode('s7upf_top_header','s7upf_vc_top_header');

vc_map( array(
    "name"      => esc_html__("SV Top Header", 'fruitshop'),
    "base"      => "s7upf_top_header",
    "icon"      => "icon-st",
    "category"  => '7Up-theme',
    "params"    => array(
        array(
            'type' => 'textarea_raw_html',
            'heading' => esc_html__( 'Text left', 'fruitshop' ),
            'param_name' => 'text_left',
            'description' => esc_html__( 'Enter text', 'fruitshop' )
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Show my account', 'fruitshop' ),
            'admin_label' => true,
            'param_name'  => 'show_account',
            'value' => array(
                esc_html__('On','fruitshop') => 'on',
                esc_html__('Off','fruitshop') => 'off',
            ),
            'edit_field_class'=>'vc_col-sm-12 vc_column',
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Title my account",'fruitshop'),
            'value'=> '',
            "param_name" => "title_account",
            'dependency'    =>array(
                'element'   =>'show_account',
                'value'     =>array('on')
            ),
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Show log in', 'fruitshop' ),
            'param_name'  => 'show_log_in',
            'admin_label' => true,
            'value' => array(
                esc_html__('On','fruitshop') => 'on',
                esc_html__('Off','fruitshop') => 'off',
            ),
            'edit_field_class'=>'vc_col-sm-12 vc_column',
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Show checkout', 'fruitshop' ),
            'param_name'  => 'show_checkout',
            'admin_label' => true,
            'value' => array(
                esc_html__('On','fruitshop') => 'on',
                esc_html__('Off','fruitshop') => 'off',
            ),
            'edit_field_class'=>'vc_col-sm-12 vc_column',
        ),
        array(
            'type' => 'colorpicker',
            'group' => esc_html__('Design Option','fruitshop'),
            'heading' => esc_html__( 'Color text', 'fruitshop' ),
            'param_name' => 'color_text',
        ),
        array(
            'type' => 'colorpicker',
            'group' => esc_html__('Design Option','fruitshop'),
            'heading' => esc_html__( 'Color text hover', 'fruitshop' ),
            'param_name' => 'color_text_hover',
        ),
        array(
            'type' => 'colorpicker',
            'group' => esc_html__('Design Option','fruitshop'),
            'heading' => esc_html__( 'Background color', 'fruitshop' ),
            'param_name' => 'bg_color',
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra Class Name','fruitshop'),
            'param_name' => 'extra_class',
            'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.','fruitshop'),
        ),
    )
));