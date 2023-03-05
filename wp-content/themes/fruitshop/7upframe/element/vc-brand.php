<?php
/**
 * Created by PhpStorm.
 * User: 7uptheme
 * Date: 08/04/2017
 * Time: 10:37
 */
if(!function_exists('s7upf_vc_brand'))
{
    function s7upf_vc_brand($attr,$content = false)
    {
        $html = $style = $title = $position = $color_title = $data_item_brand = $autoplay = $pagination = $smart= $desktop = $tablet = $image_size = $add_item_brand = '' ;
        extract(shortcode_atts(array(
            'style'      => 'style1',
            'add_item_brand'      => '',
            'image_size'      => '',
            'desktop'      => '5',
            'tablet'      => '4',
            'smart'      => '3',
            'pagination'      => 'false',
            'autoplay'      => 'true',
            'title'      => '',
            'position'      => 'text-right',
            'color_title'      => '',
        ),$attr));
        if(isset($add_item_brand))
            $data_item_brand = vc_param_group_parse_atts($add_item_brand);

        $html .= S7upf_Template::load_view('elements/brand',false,array(
            'data_item_brand' => $data_item_brand,
            'style' => $style,
            'image_size' => $image_size,
            'desktop' => $desktop,
            'tablet' => $tablet,
            'smart' => $smart,
            'pagination' => $pagination,
            'autoplay' => $autoplay,
            'title' => $title,
            'position' => $position,
            'color_title' => $color_title,
        ));
        return $html;
    }
}
stp_reg_shortcode('s7upf_brand','s7upf_vc_brand');

vc_map(
    array(
        "name"      => esc_html__("SV Brand", 'fruitshop'),
        "base"      => "s7upf_brand",
        "icon"      => "icon-st",
        "category"  => '7Up-theme',
        "params"    => array(
            array(
                'type' => 'dropdown',
                'admin_label' => true,
                'heading' => esc_html__( 'Style', 'fruitshop' ),
                'param_name' => 'style',
                'value' => array(
                    esc_html__('Style 1 (Slider)','fruitshop')=>'style1',
                    esc_html__('Style 2 (List)','fruitshop')=>'style2',
                    esc_html__('Style 3 (List)','fruitshop')=>'style3',
                    esc_html__('Style 4 (List)','fruitshop')=>'style4',
                ),
                'description' => esc_html__( 'Select style', 'fruitshop' )
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title', 'fruitshop' ),
                'param_name' => 'title',
                'admin_label' => true,
                'description' => esc_html__('Enter text.','fruitshop'),
                'dependency'    =>array(
                    'element'   =>'style',
                    'value'     =>array('style4')
                ),
            ),
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Add brand item', 'fruitshop'),
                'param_name' => 'add_item_brand',
                'value' =>'',
                'params' => array(
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__( 'Image', 'fruitshop' ),
                        'param_name' => 'image',
                        'description' => esc_html__('Select image from library.','fruitshop'),
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
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Custom image size', 'fruitshop'),
                'param_name' => 'image_size',
                'edit_field_class' => 'vc_column vc_col-sm-12',
                'description' => esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'fruitshop'),
            ),
            array(
                'type' => 'dropdown',
                'admin_label' => true,
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__( 'Select number item brand to display (Desktop)', 'fruitshop' ),
                'param_name' => 'desktop',
                'value' => array(
                    esc_html__('1 item','fruitshop')=>'1',
                    esc_html__('2 items','fruitshop')=>'2',
                    esc_html__('3 items','fruitshop')=>'3',
                    esc_html__('4 items','fruitshop')=>'4',
                    esc_html__('5 items','fruitshop')=>'5',
                ),
                'std' => '5',
                'dependency'    =>array(
                    'element'   =>'style',
                    'value'     =>array('style1')
                ),
                'description' => esc_html__( 'Select number of slides to display (990px screen).', 'fruitshop' )
            ),
            array(
                'type' => 'dropdown',
                'admin_label' => true,
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__( 'Select number item brand to display (Tablet)', 'fruitshop' ),
                'param_name' => 'tablet',
                'value' => array(
                    esc_html__('1 item','fruitshop')=>'1',
                    esc_html__('2 items','fruitshop')=>'2',
                    esc_html__('3 items','fruitshop')=>'3',
                    esc_html__('4 items','fruitshop')=>'4',
                    esc_html__('5 items','fruitshop')=>'5',
                ),
                'std' => '4',
                'dependency'    =>array(
                    'element'   =>'style',
                    'value'     =>array('style1')
                ),
                'description' => esc_html__( 'Select number of slides to display (768px screen).', 'fruitshop' )
            ),
            array(
                'type' => 'dropdown',
                'admin_label' => true,
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__( 'Select number item brand to display (Smart phone)', 'fruitshop' ),
                'param_name' => 'smart',
                'value' => array(
                    esc_html__('1 item','fruitshop')=>'1',
                    esc_html__('2 items','fruitshop')=>'2',
                    esc_html__('3 items','fruitshop')=>'3',
                    esc_html__('4 items','fruitshop')=>'4',
                    esc_html__('5 items','fruitshop')=>'5',
                ),
                'std' => '3',
                'dependency'    =>array(
                    'element'   =>'style',
                    'value'     =>array('style1')
                ),
                'description' => esc_html__( 'Select number of slides to display (480px screen).', 'fruitshop' )
            ),
            array(
                'type' => 'dropdown',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__( 'Pagination', 'fruitshop' ),
                'param_name' => 'pagination',
                'value' => array(
                    esc_html__('Hide','fruitshop') => 'false',
                    esc_html__('Show','fruitshop') => 'true',
                ),
                'dependency'    =>array(
                    'element'   =>'style',
                    'value'     =>array('style1')
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
                'dependency'    =>array(
                    'element'   =>'style',
                    'value'     =>array('style1')
                ),
            ),
            array(
                'type' => 'dropdown',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__( 'Position', 'fruitshop' ),
                'param_name' => 'position',
                'value' => array(
                    esc_html__('Right','fruitshop') => 'text-right',
                    esc_html__('Left','fruitshop') => 'text-left',
                    esc_html__('Center','fruitshop') => 'text-center',
                ),
                'dependency'    =>array(
                    'element'   =>'style',
                    'value'     =>array('style4','style3')
                ),
            ),
            array(
                'type' => 'colorpicker',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__( 'Color title', 'fruitshop' ),
                'param_name' => 'color_title',
                'dependency'    =>array(
                    'element'   =>'style',
                    'value'     =>array('style4')
                ),
            ),
        )
    )
);