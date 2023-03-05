<?php
/**
 * Created by PhpStorm.
 * User: up7theme
 * Date: 10/04/2017
 * Time: 11:11
 */
if(!function_exists('s7upf_vc_gallery_photo'))
{
    function s7upf_vc_gallery_photo($attr,$content = false)
    {
        $html = $add_item_photo = $data_photo = $color_title =$column= $image_size= $bg_content=$bg_icon_hover= $bg_icon= '' ;
        extract(shortcode_atts(array(
            'style'      => 'style1',
            'add_item_photo'      => '',
            'color_title'      => '',
            'image_size'      => '',
            'bg_content'      => '',
            'bg_icon_hover'      => '',
            'bg_icon'      => '',
            'column'      => '3',
            'add_item_photo2'      => '',

        ),$attr));
        if(isset($add_item_photo))
            $data_photo = vc_param_group_parse_atts($add_item_photo);
        if(isset($add_item_photo2))
            $data_photo2 = vc_param_group_parse_atts($add_item_photo2);
        $html .= S7upf_Template::load_view('elements/gallery-photo',false,array(
            'data_photo' => $data_photo,
            'color_title' => $color_title,
            'image_size' => $image_size,
            'bg_content' => $bg_content,
            'bg_icon_hover' => $bg_icon_hover,
            'bg_icon' => $bg_icon,
            'column' => $column,
            'data_photo2' => $data_photo2,
            'style' => $style,

        ));
        return $html;
    }
}
stp_reg_shortcode('s7upf_gallery_photo','s7upf_vc_gallery_photo');

vc_map(
    array(
        "name"      => esc_html__("SV Gallery Photo", 'fruitshop'),
        "base"      => "s7upf_gallery_photo",
        "icon"      => "icon-st",
        "category"  => '7Up-theme',
        "params"    => array(
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Style', 'fruitshop' ),
                'param_name'    => 'style',
                'edit_field_class'=>'vc_col-sm-12 vc_column',
                'value'         => array(
                    esc_html__( 'Default', 'fruitshop' ) => 'style1',
                    esc_html__( 'Style 2', 'fruitshop' ) => 'style2',
                )
            ),
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Add images item', 'fruitshop'),
                'param_name' => 'add_item_photo2',
                'value' =>'',
                'params' => array(
                    array(
                        'type' => 'attach_images',
                        'heading' => esc_html__( 'Image', 'fruitshop' ),
                        'param_name' => 'images',
                        'description' => esc_html__('Select images from library.','fruitshop'),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Title gallery', 'fruitshop' ),
                        'param_name' => 'title',
                        'admin_label' => true,
                        'description' => esc_html__('Enter title','fruitshop'),
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__( 'Button link', 'fruitshop' ),
                        'param_name' => 'link',
                    ),

                ),
                'callbacks' => array(
                    'after_add' => 'vcChartParamAfterAddCallback'
                ),
                'dependency'  => array(
                    'element'   => 'style',
                    'value' => 'style2',
                )
            ),
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Add images item', 'fruitshop'),
                'param_name' => 'add_item_photo',
                'value' =>'',
                'params' => array(

                    array(
                        'type' => 'attach_images',
                        'heading' => esc_html__( 'Images', 'fruitshop' ),
                        'param_name' => 'images',
                        'description' => esc_html__('Select images from library.','fruitshop'),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Title gallery', 'fruitshop' ),
                        'param_name' => 'title',
                        'admin_label' => true,
                        'description' => esc_html__('Enter title','fruitshop'),
                    ),
                    array(
                        'type' => 'checkbox',
                        'heading' => esc_html__( 'Hidden image counts', 'fruitshop' ),
                        'param_name' => 'hidden_count',
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__( 'Title link', 'fruitshop' ),
                        'param_name' => 'link',
                    ),
                    array(
                        'type' => 'animation_style',
                        'heading' => esc_html__( 'CSS animation', 'fruitshop' ),
                        'param_name' => 'animation_css',
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
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Animation delay (Unit: s)', 'fruitshop' ),
                        'param_name' => 'animation_delay',
                        'description' => esc_html__('Enter animation delay (EX: 0.2)','fruitshop'),
                    ),

                ),
                'callbacks' => array(
                    'after_add' => 'vcChartParamAfterAddCallback'
                ),
                'dependency'  => array(
                    'element'   => 'style',
                    'value' => 'style1',
                )
            ),
            array(
                'type' => 'colorpicker',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__( 'Color title', 'fruitshop' ),
                'param_name' => 'color_title',
                'dependency'  => array(
                    'element'   => 'style',
                    'value' => 'style1',
                )
            ),
            array(
                'type' => 'colorpicker',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__( 'Background icon', 'fruitshop' ),
                'param_name' => 'bg_icon',
                'dependency'  => array(
                    'element'   => 'style',
                    'value' => '',
                )
            ),
            array(
                'type' => 'colorpicker',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__( 'Background icon (hover)', 'fruitshop' ),
                'param_name' => 'bg_icon_hover',
                'dependency'  => array(
                    'element'   => 'style',
                    'value' => 'style1',
                )
            ),
            array(
                'type' => 'colorpicker',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__( 'Background content', 'fruitshop' ),
                'param_name' => 'bg_content',
                'dependency'  => array(
                    'element'   => 'style',
                    'value' => 'style1',
                )
            ),
            array(
                'type' => 'dropdown',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__( 'Column (Default 3 columns)', 'fruitshop' ),
                'param_name' => 'column',
                'value' => array(
                    esc_html__('4 columns','fruitshop')=>'3',
                    esc_html__('3 columns','fruitshop')=>'4',
                    esc_html__('2 columns','fruitshop')=>'6',
                    esc_html__('1 column','fruitshop')=>'12',
                ),
                'dependency'  => array(
                    'element'   => 'style',
                    'value' => 'style1',
                )
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
    )
);