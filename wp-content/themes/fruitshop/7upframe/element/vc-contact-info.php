<?php
/**
 * Created by PhpStorm.
 * User: up7theme
 * Date: 08/04/2017
 * Time: 17:27
 */
if(!function_exists('s7upf_vc_contact_info'))
{
    function s7upf_vc_contact_info($attr,$content = false)
    {
        $html = $style = $add_item_contact = $bg_icon = $link_icon = $position =$icon = $color_icon  = $color_title = $data_item_contact = '' ;
        extract(shortcode_atts(array(
            'style'      => 'style1',
            'add_item_contact'      => '',
            'color_title'      => '',
            'color_icon'      => '',
            'icon'      => '',
            'link_icon'      => '',
            'position'      => 'text-center',
            'bg_icon'      => '',
        ),$attr));
        if(isset($add_item_contact))
            $data_item_contact = vc_param_group_parse_atts($add_item_contact);

        $html .= S7upf_Template::load_view('elements/contact-info',false,array(
            'data_item_contact' => $data_item_contact,
            'style' => $style,
            'content' => $content,
            'color_title' => $color_title,
            'color_icon' => $color_icon,
            'icon' => $icon,
            'position' => $position,
            'bg_icon' => $bg_icon,
            'link_icon' => $link_icon,
        ));
        return $html;
    }
}
stp_reg_shortcode('s7upf_contact_info','s7upf_vc_contact_info');

vc_map(
    array(
        "name"      => esc_html__("SV Contact Info", 'fruitshop'),
        "base"      => "s7upf_contact_info",
        "icon"      => "icon-st",
        "category"  => '7Up-theme',
        "params"    => array(
            array(
                'type' => 'dropdown',
                'admin_label' => true,
                'heading' => esc_html__( 'Style', 'fruitshop' ),
                'param_name' => 'style',
                'value' => array(
                    esc_html__('Style 1 (Default)','fruitshop')=>'style1',
                    esc_html__('Style 2','fruitshop')=>'style2',
                    esc_html__('Style 3','fruitshop')=>'style3',
                ),
                'description' => esc_html__( 'Select style', 'fruitshop' )
            ),
            array(
                'type' => 's7up_image_check',
                'param_name' => 'style_contact',
                'heading' => '',
                'element' => 'style',
            ),
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Add contact info item', 'fruitshop'),
                'param_name' => 'add_item_contact',
                'value' =>'',
                'params' => array(
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
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Title', 'fruitshop' ),
                        'param_name' => 'title',
                        'admin_label' => true,
                        'description' => esc_html__('Enter text.','fruitshop'),
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__( 'Link item', 'fruitshop' ),
                        'param_name' => 'link',
                    ),

                ),
                'callbacks' => array(
                    'after_add' => 'vcChartParamAfterAddCallback'
                ),
                'dependency'    =>array(
                    'element'   =>'style',
                    'value'     =>array('style1','style3')
                ),
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
                'dependency'    =>array(
                    'element'   =>'style',
                    'value'     =>array('style2')
                ),
            ),
            array(
                'type' => 'textarea_html',
                'heading' => esc_html__( 'Content', 'fruitshop' ),
                'param_name' => 'content',
                'description' => esc_html__('Enter text.','fruitshop'),
                'dependency'    =>array(
                    'element'   =>'style',
                    'value'     =>array('style1','style2')
                ),
            ),
            array(
                'type' => 'vc_link',
                'heading' => esc_html__( 'Link icon', 'fruitshop' ),
                'param_name' => 'link_icon',
                'description'   => esc_html__( 'Enter Link/URL.', 'fruitshop' ),
                'dependency'    =>array(
                    'element'   =>'style',
                    'value'     =>array('style2')
                ),
            ),
            array(
                'type' => 'colorpicker',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__( 'Color title', 'fruitshop' ),
                'param_name' => 'color_title',
                'dependency'    =>array(
                    'element'   =>'style',
                    'value'     =>array('style1','style3')
                ),
            ),
            array(
                'type' => 'colorpicker',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__( 'Color icon', 'fruitshop' ),
                'param_name' => 'color_icon',

            ),
            array(
                'type' => 'colorpicker',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__( 'Background icon (Default: white)', 'fruitshop' ),
                'param_name' => 'bg_icon',
                'dependency'    =>array(
                    'element'   =>'style',
                    'value'     =>array('style3')
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
                'dependency'    =>array(
                    'element'   =>'style',
                    'value'     =>array('style2')
                ),
            ),
        )
    )
);