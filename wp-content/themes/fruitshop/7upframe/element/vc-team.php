<?php
/**
 * Created by PhpStorm
 * User: 7uptheme
 * Date: 18/08/15
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_team'))
{
    function s7upf_vc_team($attr,$content = false)
    {
        $html = $style = $data_item_team = $image_size = $add_item_team = '' ;
        extract(shortcode_atts(array(
            'style'      => 'style1',
            'add_item_team'      => '',
            'image_size'      => '',
        ),$attr));
        if(isset($add_item_team))
            $data_item_team = vc_param_group_parse_atts($add_item_team);

        $html .= S7upf_Template::load_view('elements/team',false,array(
            'data_item_team' => $data_item_team,
            'style' => $style,
            'image_size' => $image_size,
        ));
        return $html;
    }
}

stp_reg_shortcode('s7upf_team','s7upf_vc_team');

vc_map(
    array(
    "name"      => esc_html__("SV Team", 'fruitshop'),
    "base"      => "s7upf_team",
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
            ),
            'description' => esc_html__( 'Select style', 'fruitshop' )
        ),
        array(
            'type' => 's7up_image_check',
            'param_name' => 'style_team',
            'heading' => '',
            'element' => 'style',
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__('Add team item', 'fruitshop'),
            'param_name' => 'add_item_team',
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
                    'heading' => esc_html__( 'Link item', 'fruitshop' ),
                    'param_name' => 'link',
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'Facebook social', 'fruitshop' ),
                    'param_name' => 'face_social',
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'Twitter social', 'fruitshop' ),
                    'param_name' => 'twitter_social',
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'Instagram social', 'fruitshop' ),
                    'param_name' => 'insta_social',
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'Ggoogle social', 'fruitshop' ),
                    'param_name' => 'google_social',
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
    )
)
);