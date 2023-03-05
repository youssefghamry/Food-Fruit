<?php
/**
 * Created by PhpStorm.
 * User: up7theme
 * Date: 11/04/2017
 * Time: 14:32
 */
if(!function_exists('s7upf_vc_link'))
{
    function s7upf_vc_link($attr,$content = false)
    {
        $html = $style = $title = $add_item_link = $data_link_mega = $add_item_link_mega = $delimiter = $text_transform = $position = $title_color = $title_color_hover = $data_link = '' ;
        extract(shortcode_atts(array(
            'style'      => 'style1',
            'add_item_link'      => '',
            'title_color'      => '',
            'title_color_hover'      => '',
            'position'      => 'text-left',
            'text_transform'      => 'none',
            'delimiter'      => '',
            'add_item_link_mega'      => '',
            'title'      => '',

        ),$attr));

        if(isset($add_item_link))
            $data_link = vc_param_group_parse_atts($add_item_link);
        if(isset($add_item_link_mega))
            $data_link_mega = vc_param_group_parse_atts($add_item_link_mega);
        $html .= S7upf_Template::load_view('elements/link',false,array(
            'style' => $style,
            'data_link' => $data_link,
            'title_color' => $title_color,
            'title_color_hover' => $title_color_hover,
            'position' => $position,
            'text_transform' => $text_transform,
            'delimiter' => $delimiter,
            'data_link_mega' => $data_link_mega,
            'title' => $title,
        ));
        return $html;
    }
}
stp_reg_shortcode('s7upf_link','s7upf_vc_link');

vc_map(
    array(
        "name"      => esc_html__("SV Link", 'fruitshop'),
        "base"      => "s7upf_link",
        "icon"      => "icon-st",
        "category"  => '7Up-theme',
        "params"    => array(
            array(
                'type' => 'dropdown',
                'admin_label' => true,
                'heading' => esc_html__( 'Style', 'fruitshop' ),
                'param_name' => 'style',
                'value' => array(
                    esc_html__('Style 1 (Vertical)','fruitshop')=>'style1',
                    esc_html__('Style 2 (Vertical)','fruitshop')=>'style1-2',
                    esc_html__('Style 3 (Horizontal)','fruitshop')=>'style2',
                    esc_html__('Style 4 (Mega link)','fruitshop')=>'style3',
                ),
                'description' => esc_html__( 'Select style', 'fruitshop' )
            ),
            array(
                'type' => 's7up_image_check',
                'param_name' => 'style_link',
                'heading' => '',
                'element' => 'style',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title', 'fruitshop' ),
                'param_name' => 'title',
                'admin_label' => true,
                'description' => esc_html__('Enter title','fruitshop'),
                'dependency'    =>array(
                    'element'   =>'style',
                    'value'     =>array('style3','style1-2')
                ),
            ),
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Add link item', 'fruitshop'),
                'param_name' => 'add_item_link',
                'value' =>'',
                'params' => array(
                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__( 'Add link', 'fruitshop' ),
                        'param_name' => 'link',
                    ),
                ),
                'callbacks' => array(
                    'after_add' => 'vcChartParamAfterAddCallback'
                ),
                'dependency'    =>array(
                    'element'   =>'style',
                    'value'     =>array('style1','style1-2','style2')
                ),
            ),
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Add link item', 'fruitshop'),
                'param_name' => 'add_item_link_mega',
                'value' =>'',
                'params' => array(
                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__( 'Add link', 'fruitshop' ),
                        'param_name' => 'link',
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Sub text', 'fruitshop' ),
                        'param_name' => 'sub_text',
                        'admin_label' => true,
                        'description' => esc_html__('Enter text','fruitshop'),
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__( 'Image icon', 'fruitshop' ),
                        'param_name' => 'img_icon',
                        'edit_field_class' => 'vc_column vc_col-sm-6',
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Select page mega', 'fruitshop' ),
                        'param_name' => 'id_page_mega',
                        'description' => esc_html__('Enter text','fruitshop'),
                        'edit_field_class' => 'vc_column vc_col-sm-6',
                        'value' => s7upf_list_vc_meage_menu_page(),
                    ),
                    array(
                        'type' => 'checkbox',
                        'heading' => esc_html__( 'Delimiter bottom', 'fruitshop' ),
                        'param_name' => 'delimiter',
                    ),
                    array(
                        'type' => 'checkbox',
                        'heading' => esc_html__( 'Text uppercase', 'fruitshop' ),
                        'param_name' => 'uppercase',
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
                'heading' => esc_html__( 'Link color', 'fruitshop' ),
                'param_name' => 'title_color',
                'group' => esc_html__('Design Option','fruitshop'),
                'description' => esc_html__( 'Select color', 'fruitshop' ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Link color (Hover)', 'fruitshop' ),
                'param_name' => 'title_color_hover',
                'group' => esc_html__('Design Option','fruitshop'),
                'description' => esc_html__( 'Select color', 'fruitshop' ),
            ),

            array(
                'type' => 'dropdown',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__( 'Position', 'fruitshop' ),
                'param_name' => 'position',
                'value' => array(
                    esc_html__('Left','fruitshop') => 'text-left',
                    esc_html__('Right','fruitshop') => 'text-right',
                    esc_html__('Center','fruitshop') => 'text-center',
                ),
                'dependency'    =>array(
                    'element'   =>'style',
                    'value'     =>array('style2')
                ),
            ),
            array(
                'type' => 'dropdown',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__( 'Delimiter', 'fruitshop' ),
                'param_name' => 'delimiter',
                'value' => array(
                    esc_html__('Off','fruitshop') => '',
                    esc_html__('On','fruitshop') => 'term-policy',
                ),
                'dependency'    =>array(
                    'element'   =>'style',
                    'value'     =>array('style2')
                ),
            ),
            array(
                'type' => 'dropdown',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__('Text transform','fruitshop'),
                'param_name' => 'text_transform',
                'description' => esc_html__('Select text transform','fruitshop'),
                'value' => array(
                    esc_html__('None','fruitshop') => 'none',
                    esc_html__('Capitalize','fruitshop') => 'capitalize',
                    esc_html__('Lowercase','fruitshop') => 'lowercase',
                    esc_html__('Uppercase','fruitshop') => 'uppercase'
                ),
                'dependency'    =>array(
                    'element'   =>'style',
                    'value'     =>array('style2','style1')
                ),
            ),
        )
    )
);