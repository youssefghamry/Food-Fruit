<?php
/**
 * Created by Sublime text 2.
 * User: 7uptheme
 * Date: 12/08/15
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_map'))
{
    function s7upf_vc_map($attr)
    {
        $html = $style = $width = $height = $html_mask = $mask=$mask_color= $market = $zoom = $location = $control = $scrollwheel = $disable_ui = $draggable = '';
        extract(shortcode_atts(array(
            'style'         =>'style1',
            'market'        =>'',
            'zoom'          =>'16',
            'location'      =>'',
            'control'       =>'yes',
            'scrollwheel'   =>'yes',
            'disable_ui'    =>'no',
            'draggable'     =>'yes',
            'mask'     =>'yes',
            'mask_color'     =>'',
            'width'     =>'100%',
            'height'     =>'500px'
        ),$attr));
        $location = vc_param_group_parse_atts($attr['location']);
        $location_text = '';
        if(is_array($location) && count($location) > 0 ) {
            foreach ($location as $value) {
                if(!empty($value)) {
                    if(isset($value['image_location'])){
                        $img_src1 = wp_get_attachment_image_src($value['image_location'], "full");
                        if(is_array($img_src1) and count($img_src1)>0)
                            $img_src = $img_src1[0];
                    }
                    $location_text .= '|' . s7upf_get_data_isset($value,'st_lat') . '&&' . s7upf_get_data_isset($value,'st_long') . '&&' . s7upf_get_data_isset($value,'marker_title') . '&&' . s7upf_get_data_isset($value,'info_box') . '&&' . ((!empty($img_src) )?$img_src:'');
                }
            }
        }
        $img = array();$img[0]='';
        if($market != '') {
            $img = wp_get_attachment_image_src($market,"full");
        }
        $id = 'sv-map-'.uniqid();
        $map_css = S7upf_Assets::build_css('width:' . $width . ';height:' . $height . ';max-width-100%;');
        $class_mask_color = S7upf_Assets::build_css('background:'.$mask_color.';');
        $class_mask_color_1 = S7upf_Assets::build_css('color:'.$mask_color.'!important;');
        if($mask == 'yes')
        $html_mask = '<span class="control-mask"><i class="fa fa-expand '.$class_mask_color_1.'"></i></span><span class="mask '.$class_mask_color.'"></span>';
        if($location_text !== '')
            $html .= '<div class="mb-google-map">'.$html_mask.'<div id = "'.$id.'" class="' . $map_css. ' sv-ggmaps" data-location="' . $location_text . '" data-market="' . $img[0] . '" data-zoom="' . $zoom . '" data-style="' . $style . '" data-control="' . $control . '" data-scrollwheel="' . $scrollwheel . '" data-disable_ui="' . $disable_ui . '" data-draggable="' . $draggable . '"></div></div>';
        return $html;
    }
}

stp_reg_shortcode('sv_map','s7upf_vc_map');

vc_map( array(
    "name"      => esc_html__("SV GoogleMap", 'fruitshop'),
    "base"      => "sv_map",
    "icon"      => "icon-st",
    "category"  => '7Up-theme',
    "params" => array(
        array(
            'type' => 'param_group',
            "heading" => esc_html__("Add Map Location", 'fruitshop'),
            "param_name" => "location",
            'value' =>'',
            'params' => array(
                array(
                    "type" => "textfield",
                    "heading" => esc_html__( "Latitude", 'fruitshop' ),
                    "param_name" => "st_lat",
                    "value" => "",
                    "description" => esc_html__("Enter Latitude of location",'fruitshop'),

                ),
                array(
                    "type" => "textfield",
                    "heading" => esc_html__( "Longitude", 'fruitshop' ),
                    "param_name" => "st_long",
                    "value" => "",
                    "description" => esc_html__("Enter Longitude of location",'fruitshop'),
                ),
                array(
                    "type" => "textfield",
                    "heading" => esc_html__( "Marker Title", 'fruitshop' ),
                    "param_name" => "marker_title",
                    "value" => "",
                    "admin_label" => true,
                ),
                array(
                    "type" => "textfield",
                    "heading" => esc_html__( "Info Box", 'fruitshop' ),
                    "param_name" => "info_box",
                    "value" => "",
                    "description" => esc_html__("Enter info of location",'fruitshop'),

                ),
                array(
                    "type" => "attach_image",
                    "heading" => esc_html__( "Image Location", 'fruitshop' ),
                    "param_name" => "image_location",
                    "description" => esc_html__("Upload image",'fruitshop'),

                ),
            ),
            'callbacks' => array(
                'after_add' => 'vcChartParamAfterAddCallback'
            ),
            "group"=> esc_html__("Location",'fruitshop'),

        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "heading" => esc_html__("Map Style", 'fruitshop'),
            "param_name" => "style",
            'value' => array(
                esc_html__('Default', 'fruitshop') => 'style1',
                esc_html__('Grayscale', 'fruitshop') => 'grayscale',
                esc_html__('Blue', 'fruitshop') => 'blue',
                esc_html__('Dark', 'fruitshop') => 'dark',
                esc_html__('Pink', 'fruitshop') => 'pink',
                esc_html__('Light', 'fruitshop') => 'light',
                esc_html__('Blueessence', 'fruitshop') => 'blueessence',
                esc_html__('Bentley', 'fruitshop') => 'bentley',
                esc_html__('Retro', 'fruitshop') => 'retro',
                esc_html__('Cobalt', 'fruitshop') => 'cobalt',
                esc_html__('Brownie', 'fruitshop') => 'brownie',
                esc_html__('Snazzy', 'fruitshop') => 'snazzy'
            ),
            "group"=> esc_html__("Map Settings",'fruitshop'),
        ),
        array(
            'type' => 's7up_image_check',
            "group"=> esc_html__("Map Settings",'fruitshop'),
            'param_name' => 'style_map',
            'heading' => '',
            'element' => 'style',
        ),
        array(
            "type" => "s7up_number",
            "holder" => "div",
            "heading" => esc_html__("Map Zoom", 'fruitshop'),
            "param_name" => "zoom",
            "description" => esc_html__("Enter zoom for map (Default is 16 level).", 'fruitshop'),
            'min' => '1',
            'max' => '20',
            'suffix' => esc_html__('Level','fruitshop'),
            "group"=> esc_html__("Map Settings",'fruitshop'),
            'value' => '16'
        ),
        array(
            'type' => 'attach_image',
            "holder" => "div",
            'heading' => esc_html__('Marker Image', 'fruitshop'),
            'param_name' => 'market',
            "group"=> esc_html__("Map Settings",'fruitshop'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Map Width', 'fruitshop'),
            'param_name' => 'width',
            "description" => esc_html__("This is value to set width and height for map. Unit % , px or em. ", 'fruitshop'),
            "group"=> esc_html__("Map Settings",'fruitshop'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Map Height', 'fruitshop'),
            'param_name' => 'height',
            "group"=> esc_html__("Map Settings",'fruitshop'),
            "description" => esc_html__("This is value to set height for map. Unit % or px. Example: 100%,500px. Default is 500px", 'fruitshop')
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_html__("Map Type Control", 'fruitshop'),
            "param_name" => "control",
            'value' => array(
                esc_html__('Yes', 'fruitshop') => 'yes',
                esc_html__('No', 'fruitshop') => 'no',
            ),
            "group"=> esc_html__("Map Settings",'fruitshop'),
            'edit_field_class' => 'vc_col-sm-6 vc_column'
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Scroll wheel", 'fruitshop'),
            "param_name" => "scrollwheel",
            'value' => array(
                esc_html__('Yes', 'fruitshop') => 'yes',
                esc_html__('No', 'fruitshop') => 'no',
            ),
            "group"=> esc_html__("Map Settings",'fruitshop'),
            'edit_field_class' => 'vc_col-sm-6 vc_column'
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Disable Default UI", 'fruitshop'),
            "param_name" => "disable_ui",
            'value' => array(
                esc_html__('No', 'fruitshop') => 'no',
                esc_html__('Yes', 'fruitshop') => 'yes',
            ),
            "group"=> esc_html__("Map Settings",'fruitshop'),
            'edit_field_class' => 'vc_col-sm-6 vc_column'
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Draggable", 'fruitshop'),
            "param_name" => "draggable",
            'value' => array(
                esc_html__('Yes', 'fruitshop') => 'yes',
                esc_html__('No', 'fruitshop') => 'no',
            ),
            "group"=> esc_html__("Map Settings",'fruitshop'),
            'edit_field_class' => 'vc_col-sm-6 vc_column'
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Mask show", 'fruitshop'),
            "param_name" => "mask",
            'value' => array(
                esc_html__('Yes', 'fruitshop') => 'yes',
                esc_html__('No', 'fruitshop') => 'no',
            ),
            "group"=> esc_html__("Map Settings",'fruitshop'),
            'edit_field_class' => 'vc_col-sm-6 vc_column'
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Mask color", 'fruitshop'),
            "param_name" => "mask_color",
            "group"=> esc_html__("Map Settings",'fruitshop'),
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'dependency'    =>array(
                'element'   =>'mask',
                'value'     =>array('yes')
            ),
        ),
    )
));