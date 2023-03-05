<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 26/10/17
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_advertisement'))
{
    function s7upf_vc_advertisement($attr,$content = false)
    {
        $html = $css_class = $css_class2 = '';
        $attr = shortcode_atts(array(
            'style'         => '',
            'image'         => '',
            'image2'        => '',
            'link'          => '',
            'animation'     => '',
            'el_class'      => '',
            'el_class2'     => '',
            'custom_css'    => '',
            'custom_css2'   => '',
            'size'          => '',
            'content'       => $content,
        ),$attr);
        extract($attr);
        if(!empty($custom_css)) $el_class .= ' '.vc_shortcode_custom_css_class( $custom_css );
        $size =  s7upf_get_size_image('full',$size);
        $attr = array_merge($attr,array(
            'el_class'  => $el_class,
            'size'  => $size,
        ));
        $html = S7upf_Template::load_view('elements/advertisement',false,$attr);

        return $html;
    }
}

stp_reg_shortcode('s7upf_advertisement','s7upf_vc_advertisement');

vc_map( array(
    "name"          => esc_html__("Advertisement", 'fruitshop'),
    "base"          => "s7upf_advertisement",
    "icon"          => "icon-st",
    "category"      => esc_html__("7Up-theme", 'fruitshop'),
    "description"   => esc_html__( 'Display a advertisement', 'fruitshop' ),
    "params"        => array(
        array(
            "type"          => "textarea_html",
            "holder"        => "div",
            "heading"       => esc_html__("Content Info",'fruitshop'),
            "param_name"    => "content",
            "description"   => esc_html__( 'Enter info content of element.', 'fruitshop' )
        ),
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => esc_html__("Style",'fruitshop'),
            "param_name"    => "style",
            "value"         => array(
                esc_html__("Default",'fruitshop')   => '',
                esc_html__("About",'fruitshop')   => 'about',
            ),
            "description"   => esc_html__( 'Choose menu style to display.', 'fruitshop' )
        ),
        array(
            "type"          => "attach_image",
            "admin_label"   => true,
            "heading"       => esc_html__("Image",'fruitshop'),
            "param_name"    => "image",
            "description"   => esc_html__( 'Select image from media library.', 'fruitshop' )
        ),
        array(
            "type"          => "vc_link",
            "heading"       => esc_html__("Link",'fruitshop'),
            "param_name"    => "link",
            "description"   => esc_html__( 'Enter URL redirect when click to image.', 'fruitshop' )
        ),
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Animation",'fruitshop'),
            "param_name"    => "animation",
            "value"         => array(
                esc_html__("Default",'fruitshop')                    => '',
                esc_html__("Zoom",'fruitshop')                       => 'zoom-image',
                esc_html__("Zoom out",'fruitshop')                   => 'zoom-out',
                esc_html__("Zoom out Overlay",'fruitshop')           => 'zoom-out overlay-image',
                esc_html__("Fade out-in",'fruitshop')                => 'fade-out-in',
                esc_html__("Zoom Fade out-in",'fruitshop')           => 'zoom-image fade-out-in',
                esc_html__("Fade in-out",'fruitshop')                => 'fade-in-out',
                esc_html__("Zoom rotate",'fruitshop')                => 'zoom-rotate',
                esc_html__("Zoom rotate Fade out-in",'fruitshop')    => 'zoom-rotate fade-out-in',
                esc_html__("Overlay",'fruitshop')                    => 'overlay-image',
                esc_html__("Overlay Zoom",'fruitshop')               => 'overlay-image zoom-image',
                esc_html__("Zoom image line",'fruitshop')            => 'zoom-image line-scale',
                esc_html__("Gray image",'fruitshop')                 => 'gray-image',
                esc_html__("Gray image line",'fruitshop')            => 'gray-image line-scale',
                esc_html__("Pull curtain",'fruitshop')               => 'pull-curtain',
                esc_html__("Pull curtain gray image",'fruitshop')    => 'pull-curtain gray-image',
                esc_html__("Pull curtain zoom image",'fruitshop')    => 'pull-curtain zoom-image',
                esc_html__("Wobble horizontal image",'fruitshop')    => 'wobble-horizontal',
                esc_html__("Rotate image",'fruitshop')    => 'rotate-image',

            ),
            "description"   => esc_html__( 'Select type of animation for image.', 'fruitshop' )
        ),
        array(
            "type"          => "attach_image",
            "heading"       => esc_html__("Image fade",'fruitshop'),
            "param_name"    => "image2",
            "dependency"    => array(
                "element"       => "animation",
                "value"     => array("zoom-out","zoom-out overlay-image"),
            ),
            "description"   => esc_html__( 'Select image from media library.', 'fruitshop' )
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Image custom size",'fruitshop'),
            "param_name"    => "size",
            'description'   => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'fruitshop' ),
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
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Extra class name",'fruitshop'),
            "param_name"    => "el_class2",
            'group'         => esc_html__('Design Info Box','fruitshop'),
            'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'fruitshop' )
        ),
        array(
            "type"          => "css_editor",
            "heading"       => esc_html__("CSS box",'fruitshop'),
            "param_name"    => "custom_css2",
            'group'         => esc_html__('Design Info Box','fruitshop')
        ),
    )
));