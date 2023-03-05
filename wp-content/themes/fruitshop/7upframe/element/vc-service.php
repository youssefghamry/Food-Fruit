<?php
/**
 * Created by PhpStorm.
 * User: 7uptheme
 * Date: 04/04/2017
 * Time: 14:17
 */

if(!function_exists('s7upf_vc_service'))
{
    function s7upf_vc_service($attr,$content = false)
    {
        $html = $style = $icon = $link =$image5= $title = $animation = $desc = $title_color_hover =$icon_color = $title_color = $desc_color = $bg_icon ='' ;
        extract(shortcode_atts(array(
            'style'      => 'style1',
            'icon'      => '',
            'link'      => '',
            'title'      => '',
            'desc'      => '',
            'icon_color'      => '',
            'title_color'      => '',
            'desc_color'      => '',
            'bg_icon'      => '',
            'title_color_hover'      => '',
            'animation'      => '',
            'image5'      => '',
        ),$attr));

        $html .= S7upf_Template::load_view('elements/service',false,array(
            'style' => $style,
            'icon' => $icon,
            'link' => $link,
            'title' => $title,
            'desc' => $desc,
            'icon_color' => $icon_color,
            'title_color' => $title_color,
            'desc_color' => $desc_color,
            'bg_icon' => $bg_icon,
            'title_color_hover' => $title_color_hover,
            'animation' => $animation,
            'image5' => $image5,
        ));
        return $html;
    }
}

stp_reg_shortcode('s7upf_service','s7upf_vc_service');

vc_map( array(
    "name"      => esc_html__("SV Service", 'fruitshop'),
    "base"      => "s7upf_service",
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
                esc_html__('Style 4','fruitshop')=>'style4',
                esc_html__('Style 5','fruitshop')=>'style5',
                esc_html__('Style 6','fruitshop')=>'style6',
            ),
            'description' => esc_html__( 'Select style', 'fruitshop' )
        ),
        array(
            'type' => 's7up_image_check',
            'param_name' => 'style_service',
            'heading' => '',
            'element' => 'style',
        ),
        array(
            'type'          => 'iconpicker',
            'heading'       => esc_html__( 'Icon', 'fruitshop' ),
            'param_name'    => 'icon',
            'value'         => '',
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style1','style2','style3','style4')
            ),
            'settings'      => array(
                'emptyIcon'     => true,
                'iconsPerPage'  => 4000,
            ),
            'description'   => esc_html__( 'Select icon from library.', 'fruitshop' ),
        ),
        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Image', 'fruitshop' ),
            'param_name' => 'image5',
            'description' => esc_html__('Select image from library.','fruitshop'),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style5','style6')
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Title', 'fruitshop' ),
            'param_name' => 'title',
            'admin_label' => true,
            'description' => esc_html__( 'Enter text', 'fruitshop' ),

        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Description', 'fruitshop' ),
            'param_name' => 'desc',
            'description' => esc_html__( 'Enter text', 'fruitshop' ),
        ),
        array(
            'type' => 'vc_link',
            'heading' => esc_html__( 'Add link', 'fruitshop' ),
            'param_name' => 'link',
            'description' => esc_html__( 'Enter link/URL', 'fruitshop' ),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__( 'Title color', 'fruitshop' ),
            'param_name' => 'title_color',
            'group' => esc_html__('Design Option','fruitshop'),
            'description' => esc_html__( 'Select color', 'fruitshop' ),
            'edit_field_class' => 'vc_column vc_col-sm-6',
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style1','style2','style3','style4','style5')
            ),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__( 'Title color hover', 'fruitshop' ),
            'param_name' => 'title_color_hover',
            'group' => esc_html__('Design Option','fruitshop'),
            'description' => esc_html__( 'Select color', 'fruitshop' ),
            'edit_field_class' => 'vc_column vc_col-sm-6',
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style1','style2','style4')
            ),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__( 'Icon color', 'fruitshop' ),
            'param_name' => 'icon_color',
            'group' => esc_html__('Design Option','fruitshop'),
            'edit_field_class' => 'vc_column vc_col-sm-6',
            'description' => esc_html__( 'Select color', 'fruitshop' ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style1','style2','style3','style4')
            ),
        ),
        array(
            'type' => 'colorpicker',
            'group' => esc_html__('Design Option','fruitshop'),
            'heading' => esc_html__( 'Description color', 'fruitshop' ),
            'param_name' => 'desc_color',
            'description' => esc_html__( 'Select color', 'fruitshop' ),
            'edit_field_class' => 'vc_column vc_col-sm-6',
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style1','style2','style3','style4','style5')
            ),
        ),
        array(
            'type' => 'colorpicker',
            'group' => esc_html__('Design Option','fruitshop'),
            'heading' => esc_html__( 'Background icon', 'fruitshop' ),
            'param_name' => 'bg_icon',
            'description' => esc_html__( 'Select color', 'fruitshop' ),
            'edit_field_class' => 'vc_column vc_col-sm-6',
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style4')
            ),
        ),
        array(
            'type' => 'animation_style',
            'heading' => esc_html__( 'CSS animation', 'fruitshop' ),
            'param_name' => 'animation',
            'group' => esc_html__('Design Option','fruitshop'),
            'value' => '',
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style1','style2','style3','style4')
            ),
            'settings' => array(
                'type' => 'in',
                'custom' => array(
                    array(
                        'label' => __( 'Default', 'fruitshop' ),
                        'values' => array(
                            esc_html__( 'Top to bottom', 'fruitshop' ) => 'top-to-bottom',
                            esc_html__( 'Bottom to top', 'fruitshop' ) => 'bottom-to-top',
                            esc_html__( 'Left to right', 'fruitshop' ) => 'left-to-right',
                            esc_html__( 'Right to left', 'fruitshop' ) => 'right-to-left',
                            esc_html__( 'Appear from center', 'fruitshop' ) => 'appear',
                        ),
                    ),
                ),
            ),
            'description' => esc_html__( 'Select type of animation for element to be animated when it (enters) the browsers viewport (Note: works only in modern browsers).', 'fruitshop' ),
        ),

    )
));