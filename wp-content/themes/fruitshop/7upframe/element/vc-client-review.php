<?php
/**
 * Created by PhpStorm.
 * User: 7uptheme
 * Date: 05/04/2017
 * Time: 11:39
 */

if(!function_exists('s7upf_vc_client_review'))
{
    function s7upf_vc_client_review($attr,$content = false)
    {
        $html = $style = $title = $data_item_review4=$add_item_review = $desc_color =$sub_title_color =  $title_color = $data_item_review = '' ;
        extract(shortcode_atts(array(
            'style'      => 'style1',
            'add_item_review'      => '',
            'add_item_review4'      => '',
            'title'      => '',
            'title_color'      => '',
            'sub_title_color'      => '',
            'desc_color'      => '',

        ),$attr));
        if(isset($add_item_review))
            $data_item_review = vc_param_group_parse_atts($add_item_review);
        if(isset($add_item_review4))
            $data_item_review4 = vc_param_group_parse_atts($add_item_review4);
        $html .= S7upf_Template::load_view('elements/client-review',false,array(
            'style' => $style,
            'data_item_review' => $data_item_review,
            'data_item_review4' => $data_item_review4,
            'title' => $title,
            'title_color' => $title_color,
            'sub_title_color' => $sub_title_color,
            'desc_color' => $desc_color,
        ));
        return $html;
    }
}

stp_reg_shortcode('s7upf_client_review','s7upf_vc_client_review');
vc_map( array(
    "name"      => esc_html__("SV Client Review", 'fruitshop'),
    "base"      => "s7upf_client_review",
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
            ),
            'description' => esc_html__( 'Select style', 'fruitshop' )
        ),
        array(
            'type' => 's7up_image_check',
            'param_name' => 'style_client_review',
            'heading' => '',
            'element' => 'style',
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Title', 'fruitshop' ),
            'param_name' => 'title',
            'admin_label' => true,
            'description' => esc_html__('Enter text.','fruitshop'),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style1')
            ),
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__('Add review item', 'fruitshop'),
            'param_name' => 'add_item_review',
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
                    'heading' => esc_html__( 'Title/Name', 'fruitshop' ),
                    'param_name' => 'title',
                    'admin_label' => true,
                    'description' => esc_html__('Enter text.','fruitshop'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Sub title', 'fruitshop' ),
                    'param_name' => 'sub_title',
                    'admin_label' => true,
                    'description' => esc_html__('Enter text.','fruitshop'),
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__( 'Description', 'fruitshop' ),
                    'param_name' => 'desc',
                    'description' => esc_html__('Enter text.','fruitshop'),
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'Link', 'fruitshop' ),
                    'param_name' => 'link',
                ),
            ),
            'callbacks' => array(
                'after_add' => 'vcChartParamAfterAddCallback'
            ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style1','style2','style3')
            ),
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__('Add review item', 'fruitshop'),
            'param_name' => 'add_item_review4',
            'value' =>'',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title/Name', 'fruitshop' ),
                    'param_name' => 'title',
                    'admin_label' => true,
                    'description' => esc_html__('Enter text.','fruitshop'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Sub title', 'fruitshop' ),
                    'param_name' => 'sub_title',
                    'admin_label' => true,
                    'description' => esc_html__('Enter text.','fruitshop'),
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__( 'Description', 'fruitshop' ),
                    'param_name' => 'desc',
                    'description' => esc_html__('Enter text.','fruitshop'),
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'Link', 'fruitshop' ),
                    'param_name' => 'link',
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
            'type' => 'colorpicker',
            'group' => esc_html__('Design Option','fruitshop'),
            'heading' => esc_html__( 'Title color', 'fruitshop' ),
            'param_name' => 'title_color',
            'description' => esc_html__( 'Select color', 'fruitshop' ),

        ),
        array(
            'type' => 'colorpicker',
            'group' => esc_html__('Design Option','fruitshop'),
            'heading' => esc_html__( 'Sub title color', 'fruitshop' ),
            'param_name' => 'sub_title_color',
            'description' => esc_html__( 'Select color', 'fruitshop' ),
        ),
        array(
            'type' => 'colorpicker',
            'group' => esc_html__('Design Option','fruitshop'),
            'heading' => esc_html__( 'Description color', 'fruitshop' ),
            'param_name' => 'desc_color',
            'description' => esc_html__( 'Select color', 'fruitshop' ),
        ),
    )
));