<?php
/**
 * Created by PhpStorm.
 * User: 7uptheme
 * Date: 04/04/2017
 * Time: 14:17
 */

if(!function_exists('s7upf_vc_banner'))
{
    function s7upf_vc_banner($attr,$content = false)
    {
        $html = $style  = $button = $extra_class =$type_style7=$image_size=$title_size= $position_info = $pull_info =$height_info = $link_banner = $info_color_hover = $info_animation = $button_color = $bg_info = $add_button_list = $button_animation =$title_animation = $bg_animation_css = $data_button_list = $title = $bg_image = $bg_image_out = $title_2 = $title_underline = $animation_bg = $info_color = $title_color = $title_color_2 = '' ;
        extract(shortcode_atts(array(
            'style'      => 'style1',
            'button'      => '',
            'title'      => '',
            'title_2'      => '',
            'info_color'      => '',
            'title_color'      => '',
            'title_color_2'      => '',
            'animation_bg'      => '',
            'title_underline'      => '',
            'bg_image'      => '',
            'bg_image_out'      => '',
            'add_button_list'      => '',
            'bg_animation_css'      => '',
            'title_animation'      => '',
            'button_animation'      => '',
            'link_banner'      => '',
            'bg_info'      => '',
            'info_animation'      => '',
            'button_color'      => '',
            'info_color_hover'      => '',
            'height_info'      => '',
            'pull_info'      => 'pull-right',
            'extra_class'      => '',
            'title_size'      => 'title40',
            'position_info'      => 'text-center',
            'image_size'      => '',
            'type_style7'      => 'type1',
        ),$attr));
        if(isset($add_button_list))
            $data_button_list= vc_param_group_parse_atts($add_button_list);
        $html .= S7upf_Template::load_view('elements/banner',false,array(
            'style' => $style,
            'button' => $button,
            'title' => $title,
            'title_2' => $title_2,
            'animation_bg' => $animation_bg,
            'info_color' => $info_color,
            'title_color' => $title_color,
            'title_color_2' => $title_color_2,
            'title_underline' => $title_underline,
            'bg_image_out' => $bg_image_out,
            'bg_image' => $bg_image,
            'data_button_list' => $data_button_list,
            'bg_animation_css' => $bg_animation_css,
            'title_animation' => $title_animation,
            'button_animation' => $button_animation,
            'link_banner' => $link_banner,
            'bg_info' => $bg_info,
            'info_animation' => $info_animation,
            'content' => $content,
            'button_color' => $button_color,
            'info_color_hover' => $info_color_hover,
            'height_info' => $height_info,
            'pull_info' => $pull_info,
            'extra_class' => $extra_class,
            'title_size' => $title_size,
            'position_info' => $position_info,
            'image_size' => $image_size,
            'type_style7' => $type_style7,
        ));
        return $html;
    }
}

stp_reg_shortcode('s7upf_banner','s7upf_vc_banner');

vc_map( array(
    "name"      => esc_html__("SV Banner", 'fruitshop'),
    "base"      => "s7upf_banner",
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
                esc_html__('Style 5 (New)','fruitshop')=>'style5',
                esc_html__('Style 6 (home 8)','fruitshop')=>'style6',
                esc_html__('Style 7 (Custom)','fruitshop')=>'style7',
            ),
            'description' => esc_html__( 'Select style', 'fruitshop' )
        ),
        array(
            'type' => 's7up_image_check',
            'param_name' => 'style_banner',
            'heading' => '',
            'element' => 'style',
        ),
        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Background image', 'fruitshop' ),
            'param_name' => 'bg_image',
            'description' => esc_html__('Select image from library.','fruitshop'),
            'edit_field_class' => 'vc_column vc_col-sm-12',
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Title', 'fruitshop' ),
            'param_name' => 'title',
            'admin_label' => true,
            'description' => esc_html__('Enter text.','fruitshop'),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style1','style2','style3','style4','style5','style6')
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Title 2', 'fruitshop' ),
            'param_name' => 'title_2',
            'description' => esc_html__('Enter text.','fruitshop'),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style1','style3','style4','style5','style6')
            ),
        ),
        array(
            'type' => 'vc_link',
            'heading' => esc_html__( 'Add button', 'fruitshop' ),
            'param_name' => 'button',
            'description' => esc_html__('Enter link/URL.','fruitshop'),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style1','style3','style4','style5')
            ),
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__('Add Button', 'fruitshop'),
            'param_name' => 'add_button_list',
            'value' =>'',
            'params' => array(
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'Add button', 'fruitshop' ),
                    'param_name' => 'button',
                    'description' => esc_html__('Enter link/URL.','fruitshop'),
                ),
            ),
            'callbacks' => array(
                'after_add' => 'vcChartParamAfterAddCallback'
            ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style2')
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Type', 'fruitshop' ),
            'param_name' => 'type_style7',
            'value' => array(
                esc_html__('Type 1','fruitshop')=>'type1',
                esc_html__('Type 2','fruitshop')=>'type2',
            ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style7')
            ),
        ),
        array(
            "type" => "textarea_html",
            'heading' => esc_html__( 'Description', 'fruitshop' ),
            'param_name' => 'content',
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style3','style7')
            ),
        ),
        array(
            'type' => 'vc_link',
            'heading' => esc_html__( 'Banner link', 'fruitshop' ),
            'param_name' => 'link_banner',
            'description' => esc_html__('Enter link/URL.','fruitshop'),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style2','style4','style6','style7')
            ),
        ),
        array(
            'type' => 'dropdown',
            'admin_label' => true,
            'heading' => esc_html__( 'Animation background image (Hover mouse)', 'fruitshop' ),
            'param_name' => 'animation_bg',
            'group' => esc_html__('Design Option','fruitshop'),
            'value' => array(
                esc_html__('None (Default)','fruitshop')=>'',
                esc_html__('Zoom Out','fruitshop')=>'zoom-out',
                esc_html__('Zoom Rotate','fruitshop')=>'zoom-rotate',
                esc_html__('Zoom','fruitshop')=>'zoom-image',
            ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style1','style2','style5','style6')
            ),
            'description' => esc_html__( 'Select animation', 'fruitshop' )
        ),
        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Background image out (Default: background image)', 'fruitshop' ),
            'param_name' => 'bg_image_out',
            'group' => esc_html__('Design Option','fruitshop'),
            'description' => esc_html__('Select image from library.','fruitshop'),
            'dependency'    =>array(
                'element'   =>'animation_bg',
                'value'     =>array('zoom-out')
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Title underline', 'fruitshop' ),
            'param_name' => 'title_underline',
            'group' => esc_html__('Design Option','fruitshop'),
            'value' => array(
                esc_html__('Hide','fruitshop')=>'',
                esc_html__('Show','fruitshop')=>'title-underline',
            ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style1')
            ),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__( 'Info color', 'fruitshop' ),
            'param_name' => 'info_color',
            'group' => esc_html__('Design Option','fruitshop'),
            'description' => esc_html__( 'Select color', 'fruitshop' ),
            'edit_field_class'=>'vc_col-sm-6 vc_column',
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style1','style4','style5')
            ),
        ),
        array(
            'type' => 's7up_number',
            'heading' => esc_html__( 'Height info (Default: 160px)', 'fruitshop' ),
            'param_name' => 'height_info',
            'group' => esc_html__('Design Option','fruitshop'),
            "min" => 0,
            'suffix' => esc_html__('px','fruitshop'),
            'edit_field_class'=>'vc_col-sm-6 vc_column',
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style1')
            ),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__( 'Title color', 'fruitshop' ),
            'param_name' => 'title_color',
            'group' => esc_html__('Design Option','fruitshop'),
            'description' => esc_html__( 'Select color', 'fruitshop' ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style2','style3')
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Title size', 'fruitshop' ),
            'param_name' => 'title_size',
            'group' => esc_html__('Design Option','fruitshop'),
            'description' => esc_html__( 'Select size', 'fruitshop' ),
            'value' => array(
                esc_html__('Big','fruitshop')=>'title40',
                esc_html__('Small','fruitshop')=>'title30',
            ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style2')
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Position info', 'fruitshop' ),
            'param_name' => 'position_info',
            'group' => esc_html__('Design Option','fruitshop'),
            'value' => array(
                esc_html__('Center','fruitshop')=>'text-center',
                esc_html__('Left','fruitshop')=>'left',
            ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style2')
            ),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__( 'Title 2 color', 'fruitshop' ),
            'param_name' => 'title_color_2',
            'group' => esc_html__('Design Option','fruitshop'),
            'description' => esc_html__( 'Select color', 'fruitshop' ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style3')
            ),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__( 'Custom background info', 'fruitshop' ),
            'param_name' => 'bg_info',
            'group' => esc_html__('Design Option','fruitshop'),
            'description' => esc_html__( 'Select color', 'fruitshop' ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style3','style6')
            ),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__( 'Button color', 'fruitshop' ),
            'param_name' => 'button_color',
            'group' => esc_html__('Design Option','fruitshop'),
            'description' => esc_html__( 'Select color', 'fruitshop' ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style3')
            ),
        ),
        array(
            'type' => 'dropdown',
            'group' => esc_html__('Design Option','fruitshop'),
            'heading' => esc_html__( 'Pull info box', 'fruitshop' ),
            'param_name' => 'pull_info',
            'value' => array(
                esc_html__('Pull right','fruitshop') => 'pull-right',
                esc_html__('Pull left','fruitshop') => 'pull-left',
            ),
            'dependency' => array(
                'element' => 'style',
                'value' => array('style3')
            ),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__( 'Info color (Hover title and hover button)', 'fruitshop' ),
            'param_name' => 'info_color_hover',
            'group' => esc_html__('Design Option','fruitshop'),
            'description' => esc_html__( 'Select color', 'fruitshop' ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style4')
            ),
        ),
        array(
            'type' => 'animation_style',
            'heading' => esc_html__( 'CSS animation background', 'fruitshop' ),
            'param_name' => 'bg_animation_css',
            'group' => esc_html__('Design Option','fruitshop'),
            'value' => '',
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style2')
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
        array(
            'type' => 'animation_style',
            'heading' => esc_html__( 'CSS animation title', 'fruitshop' ),
            'param_name' => 'title_animation',
            'group' => esc_html__('Design Option','fruitshop'),
            'value' => '',
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style2')
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
        array(
            'type' => 'animation_style',
            'heading' => esc_html__( 'CSS animation button', 'fruitshop' ),
            'param_name' => 'button_animation',
            'group' => esc_html__('Design Option','fruitshop'),
            'value' => '',
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style2')
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
        array(
            'type' => 'animation_style',
            'heading' => esc_html__( 'CSS animation info', 'fruitshop' ),
            'param_name' => 'info_animation',
            'group' => esc_html__('Design Option','fruitshop'),
            'value' => '',
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style3')
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
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra Class Name','fruitshop'),
            'param_name' => 'extra_class',
            'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.','fruitshop'),
        ),
        array(
            'type' => 'textfield',
            'group' => esc_html__('Design Option','fruitshop'),
            'heading' => esc_html__('Custom image size', 'fruitshop'),
            'param_name' => 'image_size',
            'edit_field_class' => 'vc_column vc_col-sm-12',
            'description' => esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'fruitshop'),
        ),

    )
));