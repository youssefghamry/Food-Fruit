<?php
/**
 * Created by PhpStorm.
 * User: up7theme
 * Date: 12/04/2017
 * Time: 08:16
 */
if(!function_exists('s7upf_vc_social_network'))
{
    function s7upf_vc_social_network($attr,$content = false)
    {
        $html = $style = $title = $add_item_social = $color_title = $data_social = $data_social3 = '' ;
        extract(shortcode_atts(array(
            'style'      => 'style1',
            'add_item_social'      => '',
            'title'      => '',
            'color_title'      => '',
            'add_item_social3'      => '',
        ),$attr));

        if(isset($add_item_social))
            $data_social = vc_param_group_parse_atts($add_item_social);
        if(isset($add_item_social3))
            $data_social3 = vc_param_group_parse_atts($add_item_social3);

        $html .= S7upf_Template::load_view('elements/social-network',false,array(
            'style' => $style,
            'title' => $title,
            'data_social' => $data_social,
            'color_title' => $color_title,
            'data_social3' => $data_social3,
        ));
        return $html;
    }
}
stp_reg_shortcode('s7upf_social_network','s7upf_vc_social_network');

vc_map(
    array(
        "name"      => esc_html__("SV Social Network", 'fruitshop'),
        "base"      => "s7upf_social_network",
        "icon"      => "icon-st",
        "category"  => '7Up-theme',
        "params"    => array(
            array(
                'type' => 'dropdown',
                'admin_label' => true,
                'heading' => esc_html__( 'Style', 'fruitshop' ),
                'param_name' => 'style',
                'value' => array(
                    esc_html__('Style 1 (big)','fruitshop')=>'style1',
                    esc_html__('Style 2 (small)','fruitshop')=>'style2',
                    esc_html__('Style 3','fruitshop')=>'style3',
                ),
                'description' => esc_html__( 'Select style', 'fruitshop' )
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title', 'fruitshop' ),
                'param_name' => 'title',
                'admin_label' => true,
                'description' => esc_html__('Enter title','fruitshop'),
                'dependency'    =>array(
                    'element'   =>'style',
                    'value'     =>array('style1')
                ),
            ),
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Add social item', 'fruitshop'),
                'param_name' => 'add_item_social',
                'value' =>'',
                'params' => array(
                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__( 'Add link', 'fruitshop' ),
                        'param_name' => 'link',
                    ),
                    array(
                        'type'          => 'iconpicker',
                        'heading'       => esc_html__( 'Icon', 'fruitshop' ),
                        'param_name'    => 'icon',
                        'value'         => '',
                        'settings'      => array(
                            'emptyIcon'     => true,
                            'iconsPerPage'  => 4000,
                        ),
                        'description'   => esc_html__( 'Select icon from library.', 'fruitshop' ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__( 'Background social color', 'fruitshop' ),
                        'param_name' => 'bg_color',
                        'group' => esc_html__('Design Option','fruitshop'),
                        'description' => esc_html__( 'Select color', 'fruitshop' ),
                    ),
                ),
                'callbacks' => array(
                    'after_add' => 'vcChartParamAfterAddCallback'
                ),
                'dependency'    =>array(
                    'element'   =>'style',
                    'value'     =>array('style1','style2')
                ),
            ),
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Add social item', 'fruitshop'),
                'param_name' => 'add_item_social3',
                'value' =>'',
                'params' => array(
                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__( 'Add link', 'fruitshop' ),
                        'param_name' => 'link',
                    ),
                    array(
                        'type'          => 'iconpicker',
                        'heading'       => esc_html__( 'Icon', 'fruitshop' ),
                        'param_name'    => 'icon',
                        'value'         => '',
                        'settings'      => array(
                            'emptyIcon'     => true,
                            'iconsPerPage'  => 4000,
                        ),
                        'description'   => esc_html__( 'Select icon from library.', 'fruitshop' ),
                    ),
                ),
                'callbacks' => array(
                    'after_add' => 'vcChartParamAfterAddCallback'
                ),
                'dependency'    =>array(
                    'element'   =>'style',
                    'value'     =>array('style3')
                ),
            ),
            array(
                'type' => 'colorpicker',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__( 'Color title', 'fruitshop' ),
                'param_name' => 'color_title',
                'description' => esc_html__( 'Select color', 'fruitshop' ),
                'dependency'    =>array(
                    'element'   =>'style',
                    'value'     =>array('style1')
                ),
            ),

        )
    )
);