<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:00 AM
 */

if(defined('ICL_LANGUAGE_CODE') || class_exists('Polylang')){
    if(!function_exists('s7upf_vc_language_selector'))
    {
        function s7upf_vc_language_selector($attr)
        {
            $html = $lang_sub = $lang_active = $style=$flag='';
            extract(shortcode_atts(array(
                'style'             => 'fruitshop-style',
                'flag'              => 'yes',
            ),$attr));

            switch ($style) {
                case 'poly-style':
                    if(function_exists('pll_the_languages')){
                        ob_start();
                        $html .=    '<div class="polylang-selector">';
                        pll_the_languages(array('dropdown'=>1,'show_flags'=>1));
                        $html .=    ob_get_clean();
                        $html .=    '</div>';
                    }
                    break;

                case 'wpml-style':
                    ob_start();
                    do_action('wpml_add_language_selector');
                    $html .=    ob_get_clean();
                    break;

                default:
                    if(defined('ICL_SITEPRESS_VERSION')){
                        $wpml_lang = icl_get_languages('skip_missing=0&orderby=custom');
                        foreach ($wpml_lang as $lang) {
                            if($lang['active']){
                                $l_class = 'active';
                                $lang_active .=     '<a class="language-current" href="'.esc_url($lang['url']).'">';
                                if($flag == 'yes') $lang_active .=     '<img alt="flag" src="'.esc_url($lang['country_flag_url']).'">';
                                $lang_active .=         $lang['native_name'];
                                $lang_active .=     '</a>';
                            }
                            else $l_class = '';
                            $lang_sub .=                '<li class="'.$l_class.'">
                                                            <a href="'.esc_url($lang['url']).'">';
                            if($flag == 'yes') $lang_sub .=     '<img alt="flag" src="'.esc_url($lang['country_flag_url']).'">';
                            $lang_sub .=                        $lang['native_name'];
                            $lang_sub .=                    '</a>
                                                        </li>';
                        }
                        $html .=            $lang_active;
                        $html .=    '<ul class="language-list list-none">';
                        $html .=        $lang_sub;
                        $html .=    '</ul>';
                    }
                    else{

                        if(class_exists('Polylang')){
                            global $polylang;
                            $languages = $polylang->model->get_languages_list();
                            $current_lang = pll_current_language();
                            foreach ($languages as $lang) {
                                $url = PLL()->links->get_translation_url($lang);
                                if($lang->slug == $current_lang){
                                    $l_class = 'active';
                                    $lang_active .=     '<a class="language-current" href="'.esc_url($url).'">';
                                    if($flag == 'yes') $lang_active .=     '<img alt="flag" src="'.esc_url($lang->flag_url).'">';
                                    $lang_active .=         '<span>'.$lang->name.'</span>';
                                    $lang_active .=     '</a>';
                                }
                                else $l_class = '';
                                $lang_sub .=                '<li class="'.$l_class.'">
                                                                <a href="'.esc_url($url).'">';
                                if($flag == 'yes') $lang_sub .=     '<img alt="flag" src="'.esc_url($lang->flag_url).'">';
                                $lang_sub .=                        '<span>'.$lang->name.'</span>';
                                $lang_sub .=                    '</a>
                                                            </li>';
                            }
                            $html .=            $lang_active;
                            $html .=    '<ul class="language-list list-none">';
                            $html .=        $lang_sub;
                            $html .=    '</ul>';
                        }
                    }
                    break;
            }
            return '<div class="language-box">'.$html.'</div>';
        }
    }

    stp_reg_shortcode('sv_language_selector','s7upf_vc_language_selector');

    vc_map( array(
        "name"      => esc_html__("SV Language Selector", 'fruitshop'),
        "base"      => "sv_language_selector",
        "icon"      => "icon-st",
        "category"  => '7Up-theme',
        "params"    => array(
            array(
                "type" => "dropdown",
                "heading" => esc_html__("Type",'fruitshop'),
                "param_name" => "style",
                "value"     => array(
                    esc_html__("Fruitshop style",'fruitshop')       => 'fruitshop-style',
                    esc_html__("Wpml style",'fruitshop')          => 'wpml-style',
                    esc_html__("Polylang style",'fruitshop')          => 'poly-style',
                )
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__("Show Flag",'fruitshop'),
                "param_name" => "flag",
                "value"     => array(
                    esc_html__("Yes",'fruitshop')     => 'yes',
                    esc_html__("No",'fruitshop')     => 'no',
                ),
                "dependency"     => array(
                    "element"       => "style",
                    "value"         => "fruitshop-style",
                )
            ),
        )
    ));
}