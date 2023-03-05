<?php
/**
 * Created by Sublime text 2.
 * User: 7uptheme
 * Date: 18/08/15
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_banner_slider'))
{
    function s7upf_vc_banner_slider($attr,$content = false)
    {
        $html = $autoplay =$extra_class= $text_align=$navigation = $data_banner_custom= $add_item_banner_5 = $data_banner_6= $data_banner_5 = $button_color = $btn_color =$data_banner_4 = $add_item_banner_4 = $pagination = $add_item_banner_3= $data_banner_3 = $button_color_2 = $bg_image_size = $data_banner_2 = $add_item_banner_2 = $title_color_1 = $title_color_2 = $title_color_3 = $style = $add_item_banner_1 = $data_banner_1 = '' ;
        extract(shortcode_atts(array(
            'style'      => 'style1',
            'add_item_banner_1'      => '',
            'add_item_banner_2'      => '',
            'add_item_banner_4'      => '',
            'add_item_banner_5'      => '',
            'add_item_banner_3'      => '',
            'add_item_banner_6'      => '',
            'add_item_banner_custom'      => '',
            'title_color_1'      => '',
            'title_color_2'      => '',
            'title_color_3'      => '',
            'navigation'      => 'true',
            'autoplay'      => 'true',
            'pagination'      => 'true',
            'bg_image_size'      => '',
            'button_color'      => '',
            'button_color_2'      => '',
            'btn_color'      => '',
            'text_align'      => 'text-left',
            'extra_class'      => '',
            'extra_class_info'      => '',
        ),$attr));
        if(isset($add_item_banner_1))
            $data_banner_1 = vc_param_group_parse_atts($add_item_banner_1);
        if(isset($add_item_banner_2))
            $data_banner_2 = vc_param_group_parse_atts($add_item_banner_2);
        if(isset($add_item_banner_3))
            $data_banner_3 = vc_param_group_parse_atts($add_item_banner_3);
        if(isset($add_item_banner_4))
            $data_banner_4 = vc_param_group_parse_atts($add_item_banner_4);
        if(isset($add_item_banner_5))
            $data_banner_5 = vc_param_group_parse_atts($add_item_banner_5);
        if(isset($add_item_banner_6))
            $data_banner_6 = vc_param_group_parse_atts($add_item_banner_6);
        if(isset($add_item_banner_custom))
            $data_banner_custom = vc_param_group_parse_atts($add_item_banner_custom);
        $html .= S7upf_Template::load_view('elements/banner-slider/banner',$style,array(
            'data_banner_1' => $data_banner_1,
            'navigation' => $navigation,
            'title_color_1' => $title_color_1,
            'title_color_2' => $title_color_2,
            'title_color_3' => $title_color_3,
            'button_color' => $button_color,
            'button_color_2' => $button_color_2,
            'pagination' => $pagination,
            'autoplay' => $autoplay,
            'bg_image_size' => $bg_image_size,
            'data_banner_2' => $data_banner_2,
            'data_banner_3' => $data_banner_3,
            'data_banner_4' => $data_banner_4,
            'data_banner_5' => $data_banner_5,
            'data_banner_6' => $data_banner_6,
            'data_banner_custom' => $data_banner_custom,
            'btn_color' => $btn_color,
            'text_align' => $text_align,
            'extra_class' => $extra_class,
            'extra_class_info' => $extra_class_info,
        ));
        return $html;
    }
}

stp_reg_shortcode('s7upf_banner_slider','s7upf_vc_banner_slider');

vc_map( array(
    "name"      => esc_html__("SV Banner Slider", 'fruitshop'),
    "base"      => "s7upf_banner_slider",
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
                esc_html__('Style 7','fruitshop')=>'style7',
                esc_html__('Style 8','fruitshop')=>'style8',
                esc_html__('Style 9 (Custom)','fruitshop')=>'custom',
            ),
            'description' => esc_html__( 'Select style', 'fruitshop' )
        ),
        array(
            'type' => 's7up_image_check',
            'param_name' => 'style_banner_slider',
            'heading' => '',
            'element' => 'style',
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__('Add banner item', 'fruitshop'),
            'param_name' => 'add_item_banner_custom',
            'value' =>'',
            'params' => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Background Image', 'fruitshop' ),
                    'param_name' => 'bg_image',
                    'description' => esc_html__('Select image from library.','fruitshop'),
                ),
                array(
                    'type' => 'textarea_raw_html',
                    'heading' => esc_html__( 'Content', 'fruitshop' ),
                    'param_name' => 'html_content',
                    'description' => esc_html__('Enter your HTML content..','fruitshop'),
                ),
                array(
                    'type' => 'dropdown',
                    'admin_label' => true,
                    'heading' => esc_html__( 'Text align', 'fruitshop' ),
                    'param_name' => 'align',
                    'value' => array(
                        esc_html__('Center','fruitshop')=>'text-center',
                        esc_html__('Right','fruitshop')=>'text-right',
                        esc_html__('Left','fruitshop')=>'text-left',
                    ),
                    'description' => esc_html__( 'Align information', 'fruitshop' )
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Pull information', 'fruitshop' ),
                    'param_name' => 'pull_info',
                    'value' => array(
                        esc_html__('Pull center','fruitshop') => 'text-center',
                        esc_html__('Pull right','fruitshop') => 'text-right',
                        esc_html__('Pull left','fruitshop') => 'text-left',
                    ),
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'CSS animation', 'fruitshop' ),
                    'param_name' => 'animation_css',
                    'group' => esc_html__('Design Option','fruitshop'),
                    'value' => '',
                    'edit_field_class' => 'vc_column vc_col-sm-12',
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
            ),
            'callbacks' => array(
                'after_add' => 'vcChartParamAfterAddCallback'
            ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('custom')
            ),
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__('Add banner item', 'fruitshop'),
            'param_name' => 'add_item_banner_1',
            'value' =>'',
            'params' => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Background Image', 'fruitshop' ),
                    'param_name' => 'bg_image',
                    'description' => esc_html__('Select image from library.','fruitshop'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title 1', 'fruitshop' ),
                    'param_name' => 'title_1',
                    'admin_label' => true,
                    'description' => esc_html__('Enter text.','fruitshop'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title 2', 'fruitshop' ),
                    'param_name' => 'title_2',
                    'description' => esc_html__('Enter text.','fruitshop'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title 3', 'fruitshop' ),
                    'param_name' => 'title_3',
                    'description' => esc_html__('Enter text.','fruitshop'),
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'Add button', 'fruitshop' ),
                    'param_name' => 'button',
                ),

            ),
            'callbacks' => array(
                'after_add' => 'vcChartParamAfterAddCallback'
            ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style1','style7','style8')
            ),
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__('Add banner item', 'fruitshop'),
            'param_name' => 'add_item_banner_2',
            'value' =>'',
            'params' => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Background Image', 'fruitshop' ),
                    'param_name' => 'bg_image',
                    'description' => esc_html__('Select image from library.','fruitshop'),
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Image info', 'fruitshop' ),
                    'param_name' => 'img_info',
                    'description' => esc_html__('Select image from library.','fruitshop'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title 1', 'fruitshop' ),
                    'param_name' => 'title_1',
                    'admin_label' => true,
                    'description' => esc_html__('Enter text.','fruitshop'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title 2', 'fruitshop' ),
                    'param_name' => 'title_2',
                    'description' => esc_html__('Enter text.','fruitshop'),
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'Add button 1', 'fruitshop' ),
                    'param_name' => 'button_1',
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'Add button 2', 'fruitshop' ),
                    'param_name' => 'button_2',
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'CSS animation image info', 'fruitshop' ),
                    'param_name' => 'animation_img',
                    'value' => '',
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
                    'heading' => esc_html__( 'CSS animation info text', 'fruitshop' ),
                    'param_name' => 'animation_info_text',
                    'value' => '',
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
            'type' => 'param_group',
            'heading' => esc_html__('Add banner item', 'fruitshop'),
            'param_name' => 'add_item_banner_3',
            'value' =>'',
            'params' => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Background Image', 'fruitshop' ),
                    'param_name' => 'bg_image',
                    'description' => esc_html__('Select image from library.','fruitshop'),
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'Add link background', 'fruitshop' ),
                    'param_name' => 'bg_link',
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title 1', 'fruitshop' ),
                    'param_name' => 'title_1',
                    'admin_label' => true,
                    'description' => esc_html__('Enter text.','fruitshop'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title 2', 'fruitshop' ),
                    'param_name' => 'title_2',
                    'description' => esc_html__('Enter text.','fruitshop'),
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'Add button 1', 'fruitshop' ),
                    'param_name' => 'button_1',
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'Add button 2', 'fruitshop' ),
                    'param_name' => 'button_2',
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'CSS animation info text', 'fruitshop' ),
                    'param_name' => 'animation_info_text',
                    'value' => '',
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
            'type' => 'param_group',
            'heading' => esc_html__('Add banner item', 'fruitshop'),
            'param_name' => 'add_item_banner_4',
            'value' =>'',
            'params' => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Background Image', 'fruitshop' ),
                    'param_name' => 'bg_image',
                    'description' => esc_html__('Select image from library.','fruitshop'),
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'Add link background', 'fruitshop' ),
                    'param_name' => 'bg_link',
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title 1', 'fruitshop' ),
                    'param_name' => 'title_1',
                    'admin_label' => true,
                    'description' => esc_html__('Enter text.','fruitshop'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title 2', 'fruitshop' ),
                    'param_name' => 'title_2',
                    'description' => esc_html__('Enter text.','fruitshop'),
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'Add button', 'fruitshop' ),
                    'param_name' => 'button',
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Button color', 'fruitshop' ),
                    'param_name' => 'button_color',
                    'description' => esc_html__( 'Select color', 'fruitshop' ),
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Button color hover', 'fruitshop' ),
                    'param_name' => 'button_color_hover',
                    'description' => esc_html__( 'Select color', 'fruitshop' ),
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Title 1 color', 'fruitshop' ),
                    'param_name' => 'title_color_1',
                    'description' => esc_html__( 'Select color', 'fruitshop' ),
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Title 2 color', 'fruitshop' ),
                    'param_name' => 'title_color_2',
                    'description' => esc_html__( 'Select color', 'fruitshop' ),
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                ),
            ),
            'callbacks' => array(
                'after_add' => 'vcChartParamAfterAddCallback'
            ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style4')
            ),
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__('Add banner item', 'fruitshop'),
            'param_name' => 'add_item_banner_5',
            'value' =>'',
            'params' => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Background Image', 'fruitshop' ),
                    'param_name' => 'bg_image',
                    'description' => esc_html__('Select image from library.','fruitshop'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title 1', 'fruitshop' ),
                    'param_name' => 'title_1',
                    'admin_label' => true,
                    'description' => esc_html__('Enter text.','fruitshop'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title 2', 'fruitshop' ),
                    'param_name' => 'title_2',
                    'description' => esc_html__('Enter text.','fruitshop'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title 3', 'fruitshop' ),
                    'param_name' => 'title_3',
                    'description' => esc_html__('Enter text.','fruitshop'),
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'Add button', 'fruitshop' ),
                    'param_name' => 'button',
                ),
            ),
            'callbacks' => array(
                'after_add' => 'vcChartParamAfterAddCallback'
            ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style5')
            ),
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__('Add banner item', 'fruitshop'),
            'param_name' => 'add_item_banner_6',
            'value' =>'',
            'params' => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Background Image', 'fruitshop' ),
                    'param_name' => 'bg_image',
                    'description' => esc_html__('Select image from library.','fruitshop'),
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Image info', 'fruitshop' ),
                    'param_name' => 'img_info',
                    'description' => esc_html__('Select image from library.','fruitshop'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title 1', 'fruitshop' ),
                    'param_name' => 'title_1',
                    'admin_label' => true,
                    'description' => esc_html__('Enter text.','fruitshop'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title 2', 'fruitshop' ),
                    'param_name' => 'title_2',
                    'description' => esc_html__('Enter text.','fruitshop'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title 3', 'fruitshop' ),
                    'param_name' => 'title_3',
                    'description' => esc_html__('Enter text.','fruitshop'),
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'Add button', 'fruitshop' ),
                    'param_name' => 'button',
                ),
            ),
            'callbacks' => array(
                'after_add' => 'vcChartParamAfterAddCallback'
            ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style6')
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra Class Name','fruitshop'),
            'param_name' => 'extra_class',
            'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.','fruitshop'),
        ),
        array(
            'type' => 'textfield',
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('custom')
            ),
            'heading' => esc_html__('Extra class name of block info','fruitshop'),
            'param_name' => 'extra_class_info',
            'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.','fruitshop'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__( 'Title 1 color', 'fruitshop' ),
            'param_name' => 'title_color_1',
            'group' => esc_html__('Design Option','fruitshop'),
            'description' => esc_html__( 'Select color', 'fruitshop' ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style1','style3','style4','style5','style8')
            ),
        ),
        array(
            'type' => 'colorpicker',
            'group' => esc_html__('Design Option','fruitshop'),
            'heading' => esc_html__( 'Title 2 color', 'fruitshop' ),
            'param_name' => 'title_color_2',
            'description' => esc_html__( 'Select color', 'fruitshop' ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style1','style3','style4','style5','style8')
            ),
        ),
        array(
            'type' => 'colorpicker',
            'group' => esc_html__('Design Option','fruitshop'),
            'heading' => esc_html__( 'Title 3 color', 'fruitshop' ),
            'param_name' => 'title_color_3',
            'description' => esc_html__( 'Select color', 'fruitshop' ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style1','style3','style5','style8')
            ),
        ),
        array(
            'type' => 'colorpicker',
            'group' => esc_html__('Design Option','fruitshop'),
            'heading' => esc_html__( 'Button color', 'fruitshop' ),
            'param_name' => 'btn_color',
            'description' => esc_html__( 'Select color', 'fruitshop' ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style5')
            ),
        ),
        array(
            'type' => 'colorpicker',
            'group' => esc_html__('Design Option','fruitshop'),
            'heading' => esc_html__( 'Button 1 color', 'fruitshop' ),
            'param_name' => 'button_color',
            'description' => esc_html__( 'Select color', 'fruitshop' ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style2','style3')
            ),
        ),
        array(
            'type' => 'colorpicker',
            'group' => esc_html__('Design Option','fruitshop'),
            'heading' => esc_html__( 'Button 2 color', 'fruitshop' ),
            'param_name' => 'button_color_2',
            'description' => esc_html__( 'Select color', 'fruitshop' ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style2','style3')
            ),
        ),
        array(
            'type' => 'dropdown',
            'group' => esc_html__('Design Option','fruitshop'),
            'heading' => esc_html__( 'Navigation', 'fruitshop' ),
            'param_name' => 'navigation',
            'value' => array(
                esc_html__('Show','fruitshop') => 'true',
                esc_html__('Hide','fruitshop') => 'false',
            ),

        ),
        array(
            'type' => 'dropdown',
            'group' => esc_html__('Design Option','fruitshop'),
            'heading' => esc_html__( 'Pagination', 'fruitshop' ),
            'param_name' => 'pagination',
            'value' => array(
                esc_html__('Show','fruitshop') => 'true',
                esc_html__('Hide','fruitshop') => 'false',
            ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style3')
            ),
        ),
        array(
            'type' => 'dropdown',
            'group' => esc_html__('Design Option','fruitshop'),
            'heading' => esc_html__( 'Autoplay', 'fruitshop' ),
            'param_name' => 'autoplay',
            'value' => array(
                esc_html__('On','fruitshop') => 'true',
                esc_html__('Off','fruitshop') => 'false',
            ),
        ),
        array(
            'type' => 'dropdown',
            'group' => esc_html__('Design Option','fruitshop'),
            'heading' => esc_html__( 'Text align', 'fruitshop' ),
            'param_name' => 'text_align',
            'value' => array(
                esc_html__('Left','fruitshop') => 'text-left',
                esc_html__('Right','fruitshop') => 'text-right',
                esc_html__('Center','fruitshop') => 'text-center',
            ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style8')
            ),
        ),
        array(
            'type' => 'textfield',
            'group' => esc_html__('Design Option','fruitshop'),
            'heading' => esc_html__('Custom background image size', 'fruitshop'),
            'param_name' => 'bg_image_size',
            'edit_field_class' => 'vc_column vc_col-sm-12',
            'description' => esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'fruitshop'),
        ),

    )
));