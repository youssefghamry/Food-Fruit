<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 25/04/2017
 * Time: 10:28
 */
if(!function_exists('s7upf_vc_mail_chimp'))
{
    function s7upf_vc_mail_chimp($attr,$content = false)
    {
        $html = $style  = $title = $placeholder = $extra_class=$position = $submit_name =  $icon = $shortcode =  $main_color = $desc_color = $desc = $placeholder = '' ;
        extract(shortcode_atts(array(
            'style'      => 'style1',
            'title'      => '',
            'desc'      => '',
            'placeholder'      => '',
            'icon'      => '',
            'desc_color'      => '',
            'main_color'      => '',
            'shortcode'      => '',
            'submit_name'      => '',
            'position'      => 'text-left',
            'extra_class'      => '',

        ),$attr));

        $html .= S7upf_Template::load_view('elements/mail-chimp',false,array(
            'style' => $style,
            'title'      => $title,
            'desc'      => $desc,
            'placeholder'      => $placeholder,
            'icon'      => $icon,
            'desc_color'      => $desc_color,
            'main_color'      => $main_color,
            'shortcode'      => $shortcode,
            'position'      => $position,
            'submit_name'      => $submit_name,
            'extra_class'      => $extra_class,
        ));
        return $html;
    }
}

stp_reg_shortcode('s7upf_mail_chimp','s7upf_vc_mail_chimp');

vc_map( array(
    "name"      => esc_html__("SV MailChimp", 'fruitshop'),
    "base"      => "s7upf_mail_chimp",
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
            ),
            'description' => esc_html__( 'Select style', 'fruitshop' )
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Get ID shortcode Mailchimp', 'fruitshop' ),
            'param_name' => 'shortcode',
            'admin_label' => true,
            'description' => esc_html__('Enter shortcode (Ex: 237).','fruitshop'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Title', 'fruitshop' ),
            'param_name' => 'title',
            'admin_label' => true,
            'description' => esc_html__('Enter text.','fruitshop'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Description', 'fruitshop' ),
            'param_name' => 'desc',
            'description' => esc_html__('Enter text.','fruitshop'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Placeholder input', 'fruitshop' ),
            'param_name' => 'placeholder',
            'description' => esc_html__('Enter text.','fruitshop'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Submit name', 'fruitshop' ),
            'param_name' => 'submit_name',
            'description' => esc_html__('Enter text.','fruitshop'),
        ),
        array(
            'type'          => 'iconpicker',
            'heading'       => esc_html__( 'Icon email', 'fruitshop' ),
            'param_name'    => 'icon',
            'value'         => '',
            'settings'      => array(
                'emptyIcon'     => true,
                'iconsPerPage'  => 4000,
            ),
            'description'   => esc_html__( 'Select icon from library.', 'fruitshop' ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra Class Name','fruitshop'),
            'param_name' => 'extra_class',
            'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.','fruitshop'),
        ),
        //---------- Design Option -------------------//
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__( 'Main color', 'fruitshop' ),
            'param_name' => 'main_color',
            'group' => esc_html__('Design Option','fruitshop'),
            'description' => esc_html__( 'Select color', 'fruitshop' ),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__( 'Description color', 'fruitshop' ),
            'param_name' => 'desc_color',
            'group' => esc_html__('Design Option','fruitshop'),
            'description' => esc_html__( 'Select color', 'fruitshop' ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style2','style3')
            ),
        ),
        array(
            'type' => 'dropdown',
            'group' => esc_html__('Design Option','fruitshop'),
            'heading' => esc_html__( 'Position', 'fruitshop' ),
            'param_name' => 'position',
            'value' => array(
                esc_html__('Left','fruitshop') => 'text-left',
                esc_html__('Center','fruitshop') => 'text-center',
                esc_html__('Right','fruitshop') => 'text-right',
            ),
        ),
    )
));