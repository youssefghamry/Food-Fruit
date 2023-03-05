<?php
/**
 * Created by PhpStorm.
 * User: 7uptheme
 * Date: 08/04/2017
 * Time: 14:52
 */
if(!function_exists('s7upf_vc_instagram'))
{
    function s7upf_vc_instagram($attr,$content = false)
    {
        $html = $photo_number = $width = $position=  $width_two = $height_two = $style = $click_action =$user = $image_size = '' ;
        extract(shortcode_atts(array(
            'photo_number'      => '',
            'user'      => '',
            'image_size'      => '',
            'style'      => 'style1',
            'click_action'      => 'popup',
            'width'      => '80',
            'width_two'      => '150',
            'height_two'      => '150',
            'position'      => 'text-center',
            'size_index'      => 0,
            'token'      => '',
            'el_class'      => '',
            'source'      => 'username',
            'list_media'      => '',

        ),$attr));
        $data_media = (array) vc_param_group_parse_atts( $list_media);
        $html .= S7upf_Template::load_view('elements/instagram',false,array(
            'photo_number' => $photo_number,
            'user' => $user,
            'image_size' => $image_size,
            'style' => $style,
            'click_action' => $click_action,
            'width_two' => $width_two,
            'height_two' => $height_two,
            'position' => $position,
            'position' => $position,
            'token' => $token,
            'size_index' => $size_index,
            'el_class' => $el_class,
            'source' => $source,
            'data_media' => $data_media,
        ));
        return $html;
    }
}
stp_reg_shortcode('s7upf_instagram','s7upf_vc_instagram');

vc_map(
    array(
        "name"      => esc_html__("SV Instagram", 'fruitshop'),
        "base"      => "s7upf_instagram",
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
                'param_name' => 'style_instagram',
                'heading' => '',
                'element' => 'style',
            ),
            array(
                "type"          => "dropdown",
                "admin_label"   => true,
                "heading"       => esc_html__("Source",'fruitshop'),
                "param_name"    => "source",
                "value"         => array(
                    esc_html__("User name",'fruitshop')           => 'username',
                    esc_html__("From your media",'fruitshop')     => 'media',
                )
            ),
            array(
                "type"          => "param_group",
                "heading"       => esc_html__("Add Image List",'fruitshop'),
                "param_name"    => "list_media",
                "params"        => array(
                    array(
                        "type"          => "attach_image",
                        "heading"       => esc_html__("Image",'fruitshop'),
                        "param_name"    => "thumbnail_src",
                    ),
                    array(
                        "type"          => "textfield",
                        "heading"       => esc_html__("Link",'fruitshop'),
                        "param_name"    => "link",
                    ),
                ),
                'dependency'    => array(
                    'element'       => 'source',
                    'value'         => array('media'),
                ),
                'description'   => esc_html__( 'Add more image with link', 'fruitshop' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Token', 'fruitshop'),
                'param_name' => 'token',
                'edit_field_class' => 'vc_column vc_col-sm-12',
                'dependency'    => array(
                    'element'       => 'source',
                    'value'         => array('username'),
                ),
                "description"   => esc_html__("Enter token to view photos. Create token your account at: https://www.youtube.com/watch?v=X2ndbJAnQKM",'fruitshop'),
            ),

            array(
                'type' => 'textfield',
                'heading' => esc_html__('User name', 'fruitshop'),
                'param_name' => 'user',
                'edit_field_class' => 'vc_column vc_col-sm-6',
                'description' => esc_html__('Enter user name Instagram.', 'fruitshop'),
                'dependency'    => array(
                    'element'       => 'source',
                    'value'         => array('username'),
                ),
            ),

            array(
                'type' => 's7up_number',
                'heading' => esc_html__('Photo number', 'fruitshop'),
                'param_name' => 'photo_number',
                'edit_field_class' => 'vc_column vc_col-sm-6',
                'min' => '1',
                'suffix' => esc_html__('Photo','fruitshop'),
                'dependency'    => array(
                    'element'       => 'source',
                    'value'         => array('username'),
                ),
            ),
            array(
                'type' => 's7up_number',
                'heading' => esc_html__('Width image (Default 80px , Height: auto)', 'fruitshop'),
                'param_name' => 'width',
                'group' => esc_html__('Design Option','fruitshop'),
                'edit_field_class' => 'vc_column vc_col-sm-6',
                'min' => '0',
                'std' => '80',
                'suffix' => esc_html__('px','fruitshop'),
                'dependency'    =>array(
                    'element'   =>'style',
                    'value'     =>array('style1')
                ),
            ),
            array(
                'type' => 's7up_number',
                'heading' => esc_html__('Width image (Default 150px)', 'fruitshop'),
                'param_name' => 'width_two',
                'group' => esc_html__('Design Option','fruitshop'),
                'edit_field_class' => 'vc_column vc_col-sm-6',
                'min' => '0',
                'std' => '150',
                'suffix' => esc_html__('px','fruitshop'),
                'dependency'    =>array(
                    'element'   =>'style',
                    'value'     =>array('style2')
                ),
            ),
            array(
                'type' => 's7up_number',
                'heading' => esc_html__('Height image (Default 150px)', 'fruitshop'),
                'param_name' => 'height_two',
                'group' => esc_html__('Design Option','fruitshop'),
                'edit_field_class' => 'vc_column vc_col-sm-6',
                'min' => '0',
                'std' => '150',
                'suffix' => esc_html__('px','fruitshop'),
                'dependency'    =>array(
                    'element'   =>'style',
                    'value'     =>array('style2')
                ),
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__("Extra class name",'fruitshop'),
                "param_name"    => "el_class",
                'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'fruitshop' )
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('On click action', 'fruitshop'),
                'group' => esc_html__('Design Option','fruitshop'),
                'param_name' => 'click_action',
                'edit_field_class' => 'vc_column vc_col-sm-12',
                'value' => array(
                    esc_html__('Popup image','fruitshop')=>'popup',
                    esc_html__('Link to Instagram','fruitshop')=>'instagram',
                    esc_html__('None','fruitshop')=>'none',
                ),
                'description' => esc_html__('Select action for click action.','fruitshop'),
            ),
            array(
                'type' => 'dropdown',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__( 'Position', 'fruitshop' ),
                'param_name' => 'position',
                'value' => array(
                    esc_html__('Center','fruitshop') => 'text-center',
                    esc_html__('Right','fruitshop') => 'text-right',
                    esc_html__('Left','fruitshop') => 'text-left',
                ),
            ),
            array(
                "type"          => "dropdown",
                'group' => esc_html__('Design Option','fruitshop'),
                "heading"       => esc_html__("Image custom size",'fruitshop'),
                "param_name"    => "size_index",
                "value"         => array(
                    esc_html__("Small",'fruitshop')          => '0',
                    esc_html__("Medium",'fruitshop')         => '1',
                    esc_html__("Large",'fruitshop')          => '2',
                ),
                'dependency'    => array(
                    'element'       => 'source',
                    'value'         => array('username'),
                ),
                'description'   => esc_html__( 'Select size', 'fruitshop' ),
            ),
        )
    )
);