<?php
/**
 * Created by PhpStorm.
 * User: 7uptheme
 * Date: 08/04/2017
 * Time: 10:37
 */
if(!function_exists('s7upf_vc_mini_cart'))
{
    function s7upf_vc_mini_cart($attr,$content = false)
    {
        $html = $style = $pull_cart = $extra_class= '' ;
        extract(shortcode_atts(array(
            'style'      => 'style1',
            'pull_cart'      => 'pull-right',
            'extra_class'      => '',
        ),$attr));
        $html .= S7upf_Template::load_view('elements/mini-cart',false,array(
            'style' => $style,
            'pull_cart' => $pull_cart,
            'extra_class' => $extra_class,
        ));
        return $html;
    }
}
stp_reg_shortcode('s7upf_mini_cart','s7upf_vc_mini_cart');

vc_map(
    array(
        "name"      => esc_html__("SV Mini Cart", 'fruitshop'),
        "base"      => "s7upf_mini_cart",
        "icon"      => "icon-st",
        "category"  => '7Up-theme',
        "params"    => array(
            array(
                'type' => 'dropdown',
                'admin_label' => true,
                'heading' => esc_html__( 'Style', 'fruitshop' ),
                'param_name' => 'style',
                'value' => array(
                    esc_html__('Style 1','fruitshop')=>'style1',
                    esc_html__('Style 2','fruitshop')=>'style2',
                ),
                'description' => esc_html__( 'Select style', 'fruitshop' )
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Pull cart', 'fruitshop' ),
                'param_name' => 'pull_cart',
                'value' => array(
                    esc_html__('Pull right','fruitshop') => 'pull-right',
                    esc_html__('Pull left','fruitshop') => 'pull-left',
                    esc_html__('Pull center','fruitshop') => 'text-center',

                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Extra Class Name','fruitshop'),
                'param_name' => 'extra_class',
                'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.','fruitshop'),
            ),
        )
    )
);