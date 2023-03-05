<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 10/04/2017
 * Time: 16:05
 */
if(!function_exists('s7upf_vc_countdown_box'))
{
    function s7upf_vc_countdown_box($attr,$content = false)
    {
        $html = $title = $date = $background = $color_title = $color_time = $color_time_text = '' ;
        extract(shortcode_atts(array(
            'title'      => '',
            'date'      => '',
            'color_title'      => '',
            'color_time'      => '',
            'color_time_text'      => '',
            'background'      => '',
            'style'      => '',
            'el_class'      => '',

        ),$attr));

        $html .= S7upf_Template::load_view('elements/countdown-box',false,array(
            'title' => $title,
            'date' => $date,
            'color_title' => $color_title,
            'color_time' => $color_time,
            'color_time_text' => $color_time_text,
            'background' => $background,
            'style' => $style,
            'el_class' => $el_class,
        ));
        return $html;
    }
}
stp_reg_shortcode('s7upf_countdown_box','s7upf_vc_countdown_box');

vc_map(
    array(
        "name"      => esc_html__("SV Countdown Box", 'fruitshop'),
        "base"      => "s7upf_countdown_box",
        "icon"      => "icon-st",
        "category"  => '7Up-theme',
        "params"    => array(
            array(
                "type"          => "dropdown",
                "admin_label"   => true,
                "heading"       => esc_html__("Style",'fruitshop'),
                "param_name"    => "style",
                "value"         => array(
                    esc_html__("Style 1",'fruitshop')   => '',
                    esc_html__("Style 2",'fruitshop')   => 'style2',
                ),
                "description"   => esc_html__( 'Choose Countdown style to display.', 'fruitshop' )
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title', 'fruitshop' ),
                'param_name' => 'title',
                'admin_label' => true,
                'edit_field_class'=>'vc_col-sm-12 vc_column',
                'description' => esc_html__('Enter title','fruitshop'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Date time', 'fruitshop' ),
                'param_name' => 'date',
                'admin_label' => true,
                'edit_field_class'=>'vc_col-sm-12 vc_column s7up_vc_calendar',
                'description' => esc_html__('Select date','fruitshop'),
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__("Extra class name",'fruitshop'),
                "param_name"    => "el_class",
                'group'         => esc_html__('Design Option','fruitshop'),
                'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'fruitshop' )
            ),
            array(
                'type' => 'colorpicker',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__( 'Color title', 'fruitshop' ),
                'param_name' => 'color_title',
            ),
            array(
                'type' => 'colorpicker',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__( 'Color date time', 'fruitshop' ),
                'param_name' => 'color_time',
            ),
            array(
                'type' => 'colorpicker',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__( 'Color text date time', 'fruitshop' ),
                'param_name' => 'color_time_text',
            ),
            array(
                'type' => 'colorpicker',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__( 'Background', 'fruitshop' ),
                'param_name' => 'background',
            ),
        )
    )
);