<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 11/04/2017
 * Time: 11:08
 */
if(!function_exists('s7upf_vc_text_header'))
{
    function s7upf_vc_text_header($attr,$content = false)
    {
        $html = $font_family = $class_style1 = $margin_top = $sub_text_color = $class_heading = $text_transform = $animation_css = $font_family = $sub_text = $bottom_line = $letter_spacing = $style = $margin_top = $extra_class  = $text = $margin_bottom = $text_align = $element_tag = $font_size = $font_weight = $font_style = $line_height = $font_color = $divider_align = '' ;
        extract(shortcode_atts(array(
            'text' => '',
            'element_tag' => 'h2',
            'font_size' => '',
            'font_weight' => '',
            'font_style' => '',
            'font_color' => '',
            'line_height' => '',
            'text_align' => 'text-center',
            'margin_bottom' => '',
            'extra_class' => '',
            'margin_top' => '',
            'style' => 'style1',
            'letter_spacing' => '',
            'font_family' => '',
            'sub_text' => '',
            'text_transform' => 'none',
            'sub_text_color' => '',
            'animation_css' => '',
            'margin_top' => ''
        ),$attr));

        if(!empty($font_size)){
            $class_heading .= S7upf_Assets::build_css('font-size:'.$font_size.'px!important;');
        }
        if(!empty($font_weight)){
            $class_heading .= ' '.S7upf_Assets::build_css('font-weight:'.$font_weight.'!important;');
        }
        if(!empty($font_style)){
            $class_heading .= ' '.S7upf_Assets::build_css('font-style:'.$font_style.'!important;');
        }
        if(!empty($line_height)){
            $class_heading .= ' '.S7upf_Assets::build_css('line-height:'.$line_height.'px!important;');
        }
        if(!empty($font_color)){
            $class_heading .= ' '.S7upf_Assets::build_css('color:'.$font_color.'!important;');
            $class_style1 .= ' '.S7upf_Assets::build_css('color:'.$font_color.'!important;',' .color');
        }
        if(!empty($sub_text_color)){
            $class_style1 .= ' '.S7upf_Assets::build_css('color:'.$sub_text_color.'!important;',' .sub_title');
        }
        if($margin_bottom !== ''){
            $class_heading .= ' '.S7upf_Assets::build_css('margin-bottom:'.$margin_bottom.'px!important;');
            $class_style1 .= ' '.S7upf_Assets::build_css('margin-bottom:'.$margin_bottom.'px!important;');
        }
        if($margin_top !== ''){
            $class_heading .= ' '.S7upf_Assets::build_css('margin-top:'.$margin_top.'px!important;');
            $class_style1 .= ' '.S7upf_Assets::build_css('margin-top:'.$margin_top.'px!important;');
        }
        if(!empty($letter_spacing)){
            $class_heading .= ' '.S7upf_Assets::build_css('letter-spacing:'.$letter_spacing.'px!important;');
        }
        if(!empty($text_transform)){
            $class_heading .= ' '.S7upf_Assets::build_css('text-transform:'.$text_transform.'!important;');
        }


        if('style1' === $style){
            $html .= '<div class="choise-title wow '.$extra_class.'  '.$text_align.' '.$animation_css.' '.$class_style1.'">
                        <h2 class="title30 paci-font color">'.$text.'</h2>
                        <h2 class="title30 font-bold text-uppercase sub_title">'.$sub_text.'</h2>
                    </div>';
        }else{
            $html .= '<'.$element_tag.' class="mb-text-header wow '.$animation_css.' '.$font_family.' '.$text_align.' '.$extra_class.' '.$class_heading.'">'.$text.'</'.$element_tag.'>';
        }
        return $html;
    }
}
stp_reg_shortcode('s7upf_text_header','s7upf_vc_text_header');

vc_map(
    array(
        "name"      => esc_html__("SV Text Header", 'fruitshop'),
        "base"      => "s7upf_text_header",
        "icon"      => "icon-st",
        "category"  => '7Up-theme',
        "params"    => array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Style Heading','fruitshop'),
                'param_name' => 'style',
                'description' => esc_html__('Select style','fruitshop'),
                'value' => array(
                    esc_html__('style 1 (default)','fruitshop') => 'style1',
                    esc_html__('Custom','fruitshop') => 'custom',
                ),
            ),
            array(
                'type' => 'textarea',
                'admin_label' => true,
                'heading' => esc_html__('Text','fruitshop'),
                'param_name' => 'text',
                'description' => esc_html__('Enter a text','fruitshop'),
            ),
            array(
                'type' => 'textarea',
                'admin_label' => true,
                'heading' => esc_html__('Sub Text','fruitshop'),
                'param_name' => 'sub_text',
                'description' => esc_html__('Enter a text','fruitshop'),
                'dependency' => array(
                    'element' => 'style',
                    'value' => array('style1')
                ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Element Tag','fruitshop'),
                'param_name' => 'element_tag',
                'description' => esc_html__('Select a element tag','fruitshop'),
                'value' => array(
                    esc_html__('H1','fruitshop') => 'h1',
                    esc_html__('H2','fruitshop') => 'h2',
                    esc_html__('H3','fruitshop') => 'h3',
                    esc_html__('H4','fruitshop') => 'h4',
                    esc_html__('H5','fruitshop') => 'h5',
                    esc_html__('H6','fruitshop') => 'h6',
                    esc_html__('P','fruitshop') => 'p',
                    esc_html__('div','fruitshop') => 'div',
                ),
                'dependency' => array(
                    'element' => 'style',
                    'value' => array('custom')
                ),
                'std' => 'h2'
            ),
            array(
                'type' => 's7up_number',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__('Font size','fruitshop'),
                'param_name' => 'font_size',
                'description' => esc_html__('Enter font size','fruitshop'),
                'min' => 1,
                'suffix' => 'px',
                'edit_field_class' => 'vc_column vc_col-sm-6',
                'dependency' => array(
                    'element' => 'style',
                    'value' => array('custom')
                ),
            ),
            array(
                'type' => 'colorpicker',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__('Font color text','fruitshop'),
                'param_name' => 'font_color',
                'description' => esc_html__('Select a color for heading','fruitshop'),
                'edit_field_class' => 'vc_column vc_col-sm-6',
            ),
            array(
                'type' => 'colorpicker',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__('Font color sub text','fruitshop'),
                'param_name' => 'sub_text_color',
                'description' => esc_html__('Select a color for heading','fruitshop'),
                'edit_field_class' => 'vc_column vc_col-sm-6',
                'dependency' => array(
                    'element' => 'style',
                    'value' => array('style1')
                ),
            ),
            array(
                'type' => 'dropdown',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__('Font Weight','fruitshop'),
                'param_name' => 'font_weight',
                'edit_field_class' => 'vc_column vc_col-sm-6',
                'description' => esc_html__('Select a font weight','fruitshop'),
                'value' => array(
                    esc_html__('Default','fruitshop') => '',
                    esc_html__('Normal','fruitshop') => 'normal',
                    esc_html__('Bold','fruitshop') => 'bold',
                    esc_html__('100','fruitshop') => 100,
                    esc_html__('200','fruitshop') => 200,
                    esc_html__('300','fruitshop') => 300,
                    esc_html__('400','fruitshop') => 400,
                    esc_html__('500','fruitshop') => 500,
                    esc_html__('600','fruitshop') => 600,
                    esc_html__('700','fruitshop') => 700,
                    esc_html__('800','fruitshop') => 800,
                    esc_html__('900','fruitshop') => 900,
                ),
                'std' => '',
                'dependency' => array(
                    'element' => 'style',
                    'value' => array('custom')
                ),

            ),
            array(
                'type' => 'dropdown',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__('Font style','fruitshop'),
                'param_name' => 'font_style',
                'edit_field_class' => 'vc_column vc_col-sm-6',
                'description' => esc_html__('Select a font style','fruitshop'),
                'value' => array(
                    esc_html__('Normal','fruitshop') => '',
                    esc_html__('Italic','fruitshop') => 'italic',
                    esc_html__('Oblique','fruitshop') => 'oblique'
                ),
                'std' => '',
                'dependency' => array(
                    'element' => 'style',
                    'value' => array('custom')
                ),
            ),
            array(
                'type' => 'dropdown',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__('Font family','fruitshop'),
                'param_name' => 'font_family',
                'edit_field_class' => 'vc_column vc_col-sm-6',
                'description' => esc_html__('Select a font family','fruitshop'),
                'value' => array(
                    esc_html__('Inherit','fruitshop') => '',
                    esc_html__('Pacifico','fruitshop') => 'paci-font',
                ),
                'std' => '',
                'dependency' => array(
                    'element' => 'style',
                    'value' => array('custom')
                ),
            ),
            array(
                'type' => 'dropdown',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__('Text Align','fruitshop'),
                'param_name' => 'text_align',
                'edit_field_class' => 'vc_column vc_col-sm-6',
                'description' => esc_html__('Select a align for heading','fruitshop'),
                'value' => array(
                    esc_html__('Center','fruitshop') => 'text-center',
                    esc_html__('Left','fruitshop') => 'text-left',
                    esc_html__('Right','fruitshop') => 'text-right'
                ),
            ),
            array(
                'type' => 's7up_number',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__('Line Height','fruitshop'),
                'param_name' => 'line_height',
                'edit_field_class' => 'vc_column vc_col-sm-6',
                'description' => esc_html__('Enter line height','fruitshop'),
                'min' => 1,
                'suffix' => 'px',
                'dependency' => array(
                    'element' => 'style',
                    'value' => array('custom')
                ),

            ),
            array(
                'type' => 's7up_number',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__('Letter Spacing','fruitshop'),
                'param_name' => 'letter_spacing',
                'edit_field_class' => 'vc_column vc_col-sm-6',
                'description' => esc_html__('Enter letter spcing','fruitshop'),
                'min' => 0,
                'suffix' => 'px',
                'dependency' => array(
                    'element' => 'style',
                    'value' => array('custom')
                ),
            ),

            array(
                'type' => 'dropdown',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__('Text transform','fruitshop'),
                'param_name' => 'text_transform',
                'edit_field_class' => 'vc_column vc_col-sm-6',
                'description' => esc_html__('Select text transform','fruitshop'),
                'value' => array(
                    esc_html__('None','fruitshop') => 'none',
                    esc_html__('Capitalize','fruitshop') => 'capitalize',
                    esc_html__('Lowercase','fruitshop') => 'lowercase',
                    esc_html__('Uppercase','fruitshop') => 'uppercase'
                ),
                'dependency' => array(
                    'element' => 'style',
                    'value' => array('custom')
                ),
            ),

            array(
                'type' => 's7up_number',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__('Margin Top','fruitshop'),
                'param_name' => 'margin_top',
                'description' => esc_html__('Enter margin top','fruitshop'),
                'min' => 1,
                'edit_field_class' => 'vc_column vc_col-sm-6',
                'suffix' => 'px',
            ),
            array(
                'type' => 's7up_number',
                'group' => esc_html__('Design Option','fruitshop'),
                'heading' => esc_html__('Margin Bottom','fruitshop'),
                'param_name' => 'margin_bottom',
                'description' => esc_html__('Enter margin bottom','fruitshop'),
                'min' => 1,
                'edit_field_class' => 'vc_column vc_col-sm-6',
                'suffix' => 'px'
            ),
            array(
                'type' => 'animation_style',
                'heading' => esc_html__( 'CSS animation', 'fruitshop' ),
                'param_name' => 'animation_css',
                'group' => esc_html__('Design Option','fruitshop'),
                'value' => '',
                'edit_field_class' => 'vc_column vc_col-sm-6',
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
                'heading' => esc_html__('Extra Class Name','fruitshop'),
                'param_name' => 'extra_class',
                'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.','fruitshop'),
            ),

        )
    )
);