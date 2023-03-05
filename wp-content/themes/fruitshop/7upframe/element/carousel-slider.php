<?php
/**
 * Created by 7upTheme team.
 * User: 7upTheme
 * Date: 31/08/15
 * Time: 10:00 AM
 */
/************************************Main Carousel*************************************/
if(!function_exists('s7upf_vc_slide_carousel'))
{
    function s7upf_vc_slide_carousel($attr, $content = false)
    {
        $html = $css_class = '';
        $attr = shortcode_atts(array(
            'item'          => '1',
            'speed'         => '',
            'itemres'       => '',
            'navigation'    => '',
            'pagination'    => '',
            'nav_next'      => '',
            'nav_prev'      => '',
            'banner_bg'     => '',
            'animation'     => '',
            'custom_css'    => '',
            'el_class'      => '',
            'content'       => $content,
        ),$attr);
        extract($attr);
        if(!empty($custom_css)) $css_class = vc_shortcode_custom_css_class( $custom_css );
        $el_class .= ' '.$banner_bg.' '.$css_class;

        $nav_next= s7upf_base64decode($nav_next);
        $nav_prev= s7upf_base64decode($nav_prev);
        $attr = array_merge($attr,array(
            'el_class' => $el_class,
            'nav_next' => $nav_next,
            'nav_prev' => $nav_prev,
        ));
        $html = S7upf_Template::load_view('elements/slide-carousel/carousel','',$attr);
        return $html;
    }
}
stp_reg_shortcode('slide_carousel','s7upf_vc_slide_carousel');
vc_map(
    array(
        'name'          => esc_html__( 'Carousel Slider', 'fruitshop' ),
        'base'          => 'slide_carousel',
        "category"      => esc_html__("7Up-theme", 'fruitshop'),
        "description"   => esc_html__( 'Display banner slider', 'fruitshop' ),
        'icon'          => 'icon-st',
        'as_parent'     => array( 'only' => 'vc_row,vc_column_text,vc_single_image,slide_banner_item,s7upf_advertisement' ),
        'content_element' => true,
        'js_view'       => 'VcColumnView',
        'params'        => array(
            array(
                'heading'     => esc_html__( 'Item slider display', 'fruitshop' ),
                'type'        => 'textfield',
                'edit_field_class'=>'vc_col-sm-12 vc_column',
                'description' => esc_html__( 'Enter number of item. Default is 1.', 'fruitshop' ),
                'param_name'  => 'item',
            ),
            array(
                'heading'     => esc_html__( 'Custom Item', 'fruitshop' ),
                'type'        => 'textfield',
                'description'   => esc_html__( 'Enter item for screen width(px) format is width:value and separate values by ",". Example is 0:2,600:3,1000:4. Default is auto.', 'fruitshop' ),
                'param_name'  => 'itemres',
            ),
            /*array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Image style', 'fruitshop' ),
                'param_name'  => 'banner_bg',
                'value'       => array(
                    esc_html__( 'Default', 'fruitshop' )                        => '',
                    esc_html__( 'Banner Background', 'fruitshop' )              => 'bg-slider',
                    esc_html__( 'Banner Background Parallax', 'fruitshop' )     => 'bg-slider parallax-slider',
                ),
            ),*/
            array(
                'heading'     => esc_html__( 'Speed', 'fruitshop' ),
                'type'        => 'textfield',
                'description' => esc_html__( 'Enter time slider go to next item. Unit (ms). Example 5000. If empty this field autoPlay is false.', 'fruitshop' ),
                'param_name'  => 'speed',
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Navigation', 'fruitshop' ),
                'param_name'  => 'navigation',
                'value'       => array(
                    esc_html__( 'Hidden', 'fruitshop' )                  => '',
                    esc_html__( 'Default Navigation', 'fruitshop' )      => 'navi-nav-style',
                ),
            ),
            array(
                'heading'     => esc_html__( 'Text prev', 'fruitshop' ),
                'type'        => 'textarea_raw_html',
                'description' => esc_html__( 'Enter text/html previous button slider', 'fruitshop' ),
                'param_name'  => 'nav_prev',
                'edit_field_class'=>'vc_col-sm-12 vc_column css-textarea-raw-html',
                'dependency'  => array(
                    'element'   => 'navigation',
                    'not_empty' => true,
                )
            ),
            array(
                'heading'     => esc_html__( 'Text next', 'fruitshop' ),
                'type'        => 'textarea_raw_html',
                'description' => esc_html__( 'Enter text/html next button slider', 'fruitshop' ),
                'param_name'  => 'nav_next',
                'edit_field_class'=>'vc_col-sm-12 vc_column css-textarea-raw-html',
                'dependency'  => array(
                    'element'   => 'navigation',
                    'not_empty' => true,
                )
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Pagination', 'fruitshop' ),
                'param_name'  => 'pagination',
                'value'       => array(
                    esc_html__( 'Hidden', 'fruitshop' )                  => '',
                    esc_html__( 'Default Pagination', 'fruitshop' )      => 'pagi-nav-style',
                ),
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Slider Animation', 'fruitshop' ),
                'param_name'  => 'animation',
                'value'       => array(
                    esc_html__( 'None', 'fruitshop' )        => '',
                    esc_html__( 'Fade', 'fruitshop' )        => 'fade',
                    esc_html__( 'BackSlide', 'fruitshop' )   => 'backSlide',
                    esc_html__( 'GoDown', 'fruitshop' )      => 'goDown',
                    esc_html__( 'FadeUp', 'fruitshop' )      => 'fadeUp',
                )
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__("Extra class name",'fruitshop'),
                "param_name"    => "el_class",
                'group'         => esc_html__('Design Options','fruitshop'),
                'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'fruitshop' )
            ),
            array(
                "type"          => "css_editor",
                "heading"       => esc_html__("CSS box",'fruitshop'),
                "param_name"    => "custom_css",
                'group'         => esc_html__('Design Options','fruitshop')
            ),
        )
    )
);

/*******************************************END MAIN*****************************************/


/**************************************BEGIN ITEM************************************/
//Banner item Frontend
if(!function_exists('s7upf_vc_slide_banner_item'))
{
    function s7upf_vc_slide_banner_item($attr, $content = false)
    {
        $html = $css_class = '';
        $attr = shortcode_atts(array(
            'style'             => '',
            'image'             => '',
            'link'              => '',
            'info_animation'    => '',
            'info_style'        => '',
            'info_align'        => '',
            'info_transform'    => '',
            'custom_css'        => '',
            'el_class'          => '',
            'content'           => $content,
        ),$attr);
        extract($attr);
        if(!empty($custom_css)) $css_class = vc_shortcode_custom_css_class( $custom_css );
        $el_class .= ' '.$style.' '.$css_class;
        $info_class = $info_style.' '.$info_align.' '.$info_transform;
        if(!empty($info_animation)) $info_class .= ' animated';
        $attr = array_merge($attr,array(
            'el_class'      => $el_class,
            'info_class'    => $info_class,
        ));
        if(!empty($image)){
            $html = S7upf_Template::load_view('elements/slide-carousel/item',$style,$attr);
        }
        return $html;
    }
}
//stp_reg_shortcode('slide_banner_item','s7upf_vc_slide_banner_item');

// Banner item
/*vc_map(
    array(
        'name'     => esc_html__( 'Banner Item', 'fruitshop' ),
        'base'     => 'slide_banner_item',
        'icon'     => 'icon-st',
        'content_element' => true,
        'as_child' => array('only' => 'slide_carousel'),
        'params'   => array(
            array(
                "type"          => "textarea_html",
                'admin_label' => true,
                "heading"       => esc_html__("Content",'fruitshop'),
                "param_name"    => "content",
            ),
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Style', 'fruitshop' ),
                'param_name'    => 'style',
                'value'         => array(
                    esc_html__( 'Default', 'fruitshop' ) => '',
                    esc_html__( 'Style two columns', 'fruitshop' ) => 'two_column',
                )
            ),
            array(
                'type'          => 'attach_image',
                'heading'       => esc_html__( 'Image', 'fruitshop' ),
                'param_name'    => 'image',
            ),
            array(
                'type'          => 'textfield',
                'heading'       => esc_html__( 'Link Banner', 'fruitshop' ),
                'param_name'    => 'link',
            ),
            array(
                'type'          => 'animation_style',
                'heading'       => esc_html__( 'Info Animation', 'fruitshop' ),
                'param_name'    => 'info_animation',
                'admin_label'   => true,
                'value'         => '',
                'settings'      => array(
                    'type'          => 'in',
                    'custom'        =>  array(
                        array(
                            'label'     => esc_html__( 'Default', 'fruitshop' ),
                            'values'    => array(
                                esc_html__( 'Top to bottom', 'fruitshop' ) => 'top-to-bottom',
                                esc_html__( 'Bottom to top', 'fruitshop' ) => 'bottom-to-top',
                                esc_html__( 'Left to right', 'fruitshop' ) => 'left-to-right',
                                esc_html__( 'Right to left', 'fruitshop' ) => 'right-to-left',
                                esc_html__( 'Appear from center', 'fruitshop' ) => 'appear',
                            ),
                        ),
                    ),
                ),
                'description' => esc_html__( 'Select type of animation for element to be animated when it enters the browsers viewport (Note: works only in modern browsers).', 'fruitshop' ),
            ),
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Info Style', 'fruitshop' ),
                'param_name'    => 'info_style',
                'value'         => array(
                    esc_html__( 'None', 'fruitshop' )     => '',
                    esc_html__( 'Black', 'fruitshop' )    => 'black',
                    esc_html__( 'White', 'fruitshop' )    => 'white',
                    esc_html__( 'Navy', 'fruitshop' )     => 'navi',
                )
            ),
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Info Align', 'fruitshop' ),
                'param_name'    => 'info_align',
                'value'         => array(
                    esc_html__( 'Default', 'fruitshop' )    => '',
                    esc_html__( 'Left', 'fruitshop' )       => 'text-left',
                    esc_html__( 'Right', 'fruitshop' )      => 'text-right',
                    esc_html__( 'Center', 'fruitshop' )     => 'text-center',
                )
            ),
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Info Transform', 'fruitshop' ),
                'param_name'    => 'info_transform',
                'value'         => array(
                    esc_html__( 'Default', 'fruitshop' )     => '',
                    esc_html__( 'Uppercase', 'fruitshop' )   => 'text-uppercase',
                )
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__("Extra class name",'fruitshop'),
                "param_name"    => "el_class",
                'group'         => esc_html__('Design Options','fruitshop'),
                'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'fruitshop' )
            ),
            array(
                "type"          => "css_editor",
                "heading"       => esc_html__("CSS box",'fruitshop'),
                "param_name"    => "custom_css",
                'group'         => esc_html__('Design Options','fruitshop')
            ),
        )
    )
);*/

/**************************************END ITEM************************************/

/**************************************BEGIN ITEM************************************/
//Banner item Frontend


//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_Slide_Carousel extends WPBakeryShortCodesContainer {}
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Slide_Banner_Item extends WPBakeryShortCode {}
}