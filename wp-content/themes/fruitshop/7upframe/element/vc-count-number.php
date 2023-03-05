<?php
/**
 * Created by PhpStorm.
 * User: up7theme
 * Date: 08/04/2017
 * Time: 17:27
 */
if(!function_exists('s7upf_vc_count_number'))
{
    function s7upf_vc_count_number($attr,$content = false)
    {
        $html = $number = $title = $position =$color_border = $style_border = $bg_number = $color_number = $color_title = '' ;
        extract(shortcode_atts(array(
            'number'      => '100',
            'title'      => '',
            'color_border'      => '',
            'color_title'      => '',
            'bg_number'      => '',
            'color_number'      => '',
            'style_border'      => 'solid',
            'position'      => 'text-center',
        ),$attr));
        $html .= S7upf_Template::load_view('elements/count-number',false,array(
            'number' => $number,
            'title' => $title,
            'color_border' => $color_border,
            'color_title' => $color_title,
            'color_number' => $color_number,
            'bg_number' => $bg_number,
            'style_border' => $style_border,
            'position' => $position,
        ));
        return $html;
    }
}
stp_reg_shortcode('s7upf_count_number','s7upf_vc_count_number');

vc_map(
    array(
        "name"      => esc_html__("SV Count Number", 'fruitshop'),
        "base"      => "s7upf_count_number",
        "icon"      => "icon-st",
        "category"  => '7Up-theme',
        "params"    => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title', 'fruitshop' ),
                'param_name' => 'title',
                'admin_label' => true,
                'description' => esc_html__('Enter text.','fruitshop'),
            ),
            array(
                "type" => "s7up_number",
                "holder" => "div",
                "heading" => esc_html__("Count number", 'fruitshop'),
                "param_name" => "number",
                'min' => '0',
                'value' => '100',
                'suffix' => esc_html__('Number','fruitshop'),
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
                'heading' => esc_html__( 'Color number', 'fruitshop' ),
                'param_name' => 'color_number',

            ),
            array(
                'type' => 'colorpicker',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__( 'Background number (Default: white)', 'fruitshop' ),
                'param_name' => 'bg_number',
            ),
            array(
                'type' => 'dropdown',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__( 'Style border', 'fruitshop' ),
                'param_name' => 'style_border',
                'value' => array(
                    esc_html__('Solid (Default)','fruitshop')=>'solid',
                    esc_html__('Dashed','fruitshop')=>'dashed',
                    esc_html__('Dotted','fruitshop')=>'dotted',
                    esc_html__('none','fruitshop')=>'',
                ),
            ),
            array(
                'type' => 'colorpicker',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__( 'Color border', 'fruitshop' ),
                'param_name' => 'color_border',
                'dependency'    =>array(
                    'element'   =>'style_border',
                    'value'     =>array('solid','dashed','dotted')
                ),
            ),
            array(
                'type' => 'dropdown',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__( 'Position', 'fruitshop' ),
                'param_name' => 'position',
                'value' => array(
                    esc_html__('Center','fruitshop') => 'text-center',
                    esc_html__('Right','fruitshop') => 'text-right',
                    esc_html__('Left','fruitshop') => 'text-left',
                ),

            ),
        )
    )
);