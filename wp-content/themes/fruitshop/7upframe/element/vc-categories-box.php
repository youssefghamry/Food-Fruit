<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 24/04/2017
 * Time: 14:56
 */
if ( !class_exists('WC_Product') ) {
    return;
}
if(!function_exists('s7upf_vc_categories'))
{
    function s7upf_vc_categories($attr)
    {
        $html = $style = $data_category=$bg_image = $number_item_desktop=  $autoplay = $animation_css = $animation_img = $add_button = $main_color = $secondary_color = $product_count = $title = $item_active = $bottom_image = $category = '';
        extract(shortcode_atts(array(
            'style'      => 'style1',
            'category'      => '',
            'bg_image'      => '',
            'add_button'      => '',
            'bottom_image'      => '',
            'item_active'      => '',
            'title'      => '',
            'product_count'      => '',
            'secondary_color'      => '',
            'main_color'      => '',
            'animation_css'      => '',
            'animation_img'      => '',
            'autoplay'      => 'true',
            'number_item_desktop'      => '',
            'add_category'      => '',
        ),$attr));
        if(isset($add_category))
            $data_category = vc_param_group_parse_atts($add_category);
        $html .= S7upf_Template::load_view('elements/categories-box', false, array(
            'style' => $style,
            'item_active' => $item_active,
            'bottom_image' => $bottom_image,
            'add_button' => $add_button,
            'bg_image' => $bg_image,
            'category' => $category,
            'title' => $title,
            'product_count' => $product_count,
            'secondary_color' => $secondary_color,
            'main_color' => $main_color,
            'animation_css' => $animation_css,
            'autoplay' => $autoplay,
            'number_item_desktop' => $number_item_desktop,
            'data_category' => $data_category,// style 3
        ));
        return $html;
    }
}
stp_reg_shortcode('s7upf_categories','s7upf_vc_categories');
add_action( 'vc_before_init_base','s7upf_sv_add_category_box_element',10,100 );
if ( ! function_exists( 's7upf_sv_add_category_box_element' ) ) {
    function s7upf_sv_add_category_box_element()
    {
        vc_map(array(
            'name' => esc_html__('SV Categories Box', 'fruitshop'),
            'base' => 's7upf_categories',
            'category' => '7Up-theme',
            'icon' => 'icon-st',
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'admin_label' => true,
                    'heading' => esc_html__('Style element', 'fruitshop'),
                    'param_name' => 'style',
                    'description' => esc_html__('Select style', 'fruitshop'),
                    'value' => array(
                        esc_html__('Style 1 (List cat)', 'fruitshop') => 'style1',
                        esc_html__('Style 2 (Slider cat)', 'fruitshop') => 'style2',
                        esc_html__('Style 3 (Slider custom)', 'fruitshop') => 'style3',
                    ),
                ),
                array(
                    'type' => 's7up_image_check',
                    'param_name' => 'style_category',
                    'heading' => '',
                    'element' => 'style',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title element', 'fruitshop'),
                    'param_name' => 'title',
                    'description' => esc_html__('Enter text', 'fruitshop'),
                ),
                array(
                    'type' => 'checkbox',
                    'holder' => 'div',
                    'heading' => esc_html__('Select Categories', 'fruitshop'),
                    'param_name' => 'category',
                    'description' => esc_html__('Check the box to choose category', 'fruitshop'),
                    'value' => s7upf_list_taxonomy('product_cat',false),
                    'edit_field_class' => 's7upf-category-option vc_col-sm-12',
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1','style2')
                    ),

                ),
                array(
                    'type' => 'param_group',
                    'heading' => esc_html__('Add category item', 'fruitshop'),
                    'param_name' => 'add_category',
                    'value' =>'',
                    'params' => array(
                        array(
                            'type' => 'attach_image',
                            'heading' => esc_html__( 'Image', 'fruitshop' ),
                            'param_name' => 'image',
                            'description' => esc_html__('Select image from library.','fruitshop'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Title', 'fruitshop'),
                            'param_name' => 'title',
                            'description' => esc_html__('Enter text', 'fruitshop'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Description', 'fruitshop'),
                            'param_name' => 'desc',
                            'description' => esc_html__('Enter text', 'fruitshop'),
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
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style3')
                    ),
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Background image', 'fruitshop' ),
                    'param_name' => 'bg_image',
                    'description' => esc_html__('Select image from library.','fruitshop'),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1')
                    ),
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Bottom image', 'fruitshop' ),
                    'param_name' => 'bottom_image',
                    'description' => esc_html__('Select image from library.','fruitshop'),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1')
                    ),
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'Add button', 'fruitshop' ),
                    'param_name' => 'add_button',
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1')
                    ),
                ),
                array(
                    'type' => 'checkbox',
                    'heading' => esc_html__( 'Item active', 'fruitshop' ),
                    'param_name' => 'item_active',
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1')
                    ),
                ),
                array(
                    'type' => 'checkbox',
                    'heading' => esc_html__( 'Hide product count', 'fruitshop' ),
                    'param_name' => 'product_count',
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1')
                    ),
                ),
                array(
                    'type' => 'animation_style',
                    'heading' => esc_html__( 'CSS animation info text', 'fruitshop' ),
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
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1')
                    ),
                    'description' => esc_html__( 'Select type of animation for element to be animated when it (enters) the browsers viewport (Note: works only in modern browsers).', 'fruitshop' ),
                ),
                //-------------------Design Option----------------

                array(
                    'type' => 'colorpicker',
                    'group' => esc_html__('Design Option','fruitshop'),
                    'heading' => esc_html__( 'Main color', 'fruitshop' ),
                    'param_name' => 'main_color',
                    'description' => esc_html__( 'Select color', 'fruitshop' ),

                ),
                array(
                    'type' => 'colorpicker',
                    'group' => esc_html__('Design Option','fruitshop'),
                    'heading' => esc_html__( 'Secondary color', 'fruitshop' ),
                    'param_name' => 'secondary_color',
                    'description' => esc_html__( 'Select color', 'fruitshop' ),
                    'dependency'    =>array(
                        'element'   =>'style',
                        'value' => array('style1','style2')
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'admin_label' => true,
                    'group' => esc_html__('Design Option','fruitshop'),
                    'heading' => esc_html__( 'Custom column Slider in (Display desktop)', 'fruitshop' ),
                    'param_name' => 'number_item_desktop',
                    'value' => array(
                        esc_html__('Default','fruitshop')=>'',
                        esc_html__('1 Column','fruitshop')=>'1',
                        esc_html__('2 Columns','fruitshop')=>'2',
                        esc_html__('3 Columns','fruitshop')=>'3',
                        esc_html__('4 Columns','fruitshop')=>'4',
                        esc_html__('5 Columns','fruitshop')=>'5',
                    ),
                    'dependency'    =>array(
                        'element'   =>'style',
                        'value' => array('style2','style3')
                    ),
                    'description' => esc_html__( 'Select number column of slides to display (990px screen).', 'fruitshop' )
                ),
                array(
                    'type' => 'dropdown',
                    'group' => esc_html__('Design Option','fruitshop'),
                    'heading' => esc_html__( 'Auto play silder', 'fruitshop' ),
                    'param_name' => 'autoplay',
                    'dependency'    =>array(
                        'element'   =>'style',
                        'value' => array('style2','style3')
                    ),
                    'value' => array(
                        esc_html__('On','fruitshop') => 'true',
                        esc_html__('Off','fruitshop') => 'false',

                    ),
                    'description' => esc_html__( 'This allows you to enable or disable autoplay of slider.', 'fruitshop' )
                ),

            )
        ));
    }
}