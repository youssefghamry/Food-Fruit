<?php
/**
 * Notepad++.
 * User: 7uptheme
 * Date: 05/24/15
 * Time: 10:00 AM
 */
if(!function_exists('s7upf_vc_account_manager'))
{
    function s7upf_vc_account_manager($attr,$content = false)
    {

        $attr = shortcode_atts(array(
            'login_url'      => '',
            'register_url'   => '',
            'redirect_url'	 => '',
            'login_icon'     => '',
            'register_icon'  => '',
            'logout_icon'	 => '',
            'list'      	 => '',
            'el_class'       => '',
            'custom_css'     => '',
            'add_social_item'     => '',
            'login_account_icon'     => '',
            'logout_account_icon'     => '',
        ),$attr);
        extract($attr);
        if(!empty($custom_css)) $el_class .= ' '.vc_shortcode_custom_css_class( $custom_css );
        $data = (array) vc_param_group_parse_atts( $list );
        $data_social_item = (array) vc_param_group_parse_atts( $add_social_item );

        $default_val = array(
            'icon'      => '',
            'title'     => '',
            'link'      => '',
            'roles'     => '',
        );

        // Add variable to data
        $attr = array_merge($attr,array(
            'el_class'      => $el_class,
            'data'          => $data,
            'default_val'   => $default_val,
            'data_social_item'   => $data_social_item,
        ));
        // Call function get template
        $html = S7upf_Template::load_view('elements/account',false,$attr);



        return $html;
    }
}
stp_reg_shortcode('s7upf_account_manager','s7upf_vc_account_manager');

vc_map( array(
    "name"      => esc_html__("Account manager", 'fruitshop'),
    "base"      => "s7upf_account_manager",
    "icon"      => "icon-st",
    "category"  => '7Up-theme',
    "params"    => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Login Url",'fruitshop'),
            "param_name" => "login_url",
            'description'   => esc_html__( 'Enter login url. Defualt is myaccount page.', 'fruitshop' ),
        ),
        array(
            'type'          => 'iconpicker',
            'heading'       => esc_html__( 'Login Icon', 'fruitshop' ),
            'param_name'    => 'login_icon',
            'value'         => '',
            'settings'      => array(
                'emptyIcon'     => true,
                'iconsPerPage'  => 4000,
            ),
            'description'   => esc_html__( 'Select icon from library.', 'fruitshop' ),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Register Url",'fruitshop'),
            "param_name" => "register_url",
            'description'   => esc_html__( 'Enter login url. Defualt is myaccount page.', 'fruitshop' ),
        ),
        array(
            'type'          => 'iconpicker',
            'heading'       => esc_html__( 'Register Icon', 'fruitshop' ),
            'param_name'    => 'register_icon',
            'value'         => '',
            'settings'      => array(
                'emptyIcon'     => true,
                'iconsPerPage'  => 4000,
            ),
            'description'   => esc_html__( 'Select icon from library.', 'fruitshop' ),
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Logout Redirect Url",'fruitshop'),
            "param_name" => "redirect_url",
            'description'   => esc_html__( 'Enter url redirect when user logout. Defualt is home page.', 'fruitshop' ),

        ),
        array(
            'type'          => 'iconpicker',
            'heading'       => esc_html__( 'Logout Icon', 'fruitshop' ),
            'param_name'    => 'logout_icon',
            'value'         => '',
            'settings'      => array(
                'emptyIcon'     => true,
                'iconsPerPage'  => 4000,
            ),
            'description'   => esc_html__( 'Select icon from library.', 'fruitshop' ),
        ),

        array(
            "type" => "param_group",
            "heading" => esc_html__("Add a drop down list of links",'fruitshop'),
            "param_name" => "list",
            "params"    => array(
                array(
                    "type" => "textfield",
                    "heading" => esc_html__("Title",'fruitshop'),
                    "param_name" => "title",
                    'description'   => esc_html__( 'Enter title.', 'fruitshop' ),
                ),
                array(
                    "type" => "textfield",
                    "heading" => esc_html__("Link (*)",'fruitshop'),
                    "param_name" => "link",
                    'description'   => esc_html__( 'Enter Link/URL.', 'fruitshop' ),
                ),
                array(
                    'type'          => 'iconpicker',
                    'heading'       => esc_html__( 'Icon', 'fruitshop' ),
                    'param_name'    => 'icon',
                    'value'         => '',
                    'settings'      => array(
                        'emptyIcon'     => true,
                        'iconsPerPage'  => 4000,
                    ),
                    'description'   => esc_html__( 'Select icon from library.', 'fruitshop' ),
                ),

                array(
                    "type"          => "checkbox",
                    "heading"       => esc_html__("Show with Role",'fruitshop'),
                    "param_name"    => "roles",
                    "value"         => s7upf_get_list_role(),
                    'description'   =>  esc_html__( 'Check to show link with role. Default show with all roles.', 'fruitshop' ),
                ),
            ),
            'description' =>  esc_html__( 'List links only show when you was login.', 'fruitshop' ),
        ),
        array(
            'type'          => 'iconpicker',
            'heading'       => esc_html__( 'Add login account icon ', 'fruitshop' ),
            'param_name'    => 'login_account_icon',
            'group'         => esc_html__('Add list link','fruitshop'),
            'value'         => '',
            'settings'      => array(
                'emptyIcon'     => true,
                'iconsPerPage'  => 4000,
            ),
            'description'   => esc_html__( 'Select icon from library.', 'fruitshop' ),
        ),
        array(
            'type'          => 'iconpicker',
            'heading'       => esc_html__( 'Add logout account icon ', 'fruitshop' ),
            'param_name'    => 'logout_account_icon',
            'group'         => esc_html__('Add list link','fruitshop'),
            'value'         => '',
            'settings'      => array(
                'emptyIcon'     => true,
                'iconsPerPage'  => 4000,
            ),
            'description'   => esc_html__( 'Select icon from library.', 'fruitshop' ),
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__('Add link item', 'fruitshop'),
            'param_name' => 'add_social_item',
            'group'         => esc_html__('Add list link','fruitshop'),
            'value' =>'',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title (*)', 'fruitshop' ),
                    'param_name' => 'title',
                    'description' => esc_html__('Enter text.','fruitshop'),
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'Link/URL', 'fruitshop' ),
                    'param_name' => 'link',
                    'description' => esc_html__('Enter Link/URL.','fruitshop'),
                ),
                array(
                    'type'          => 'iconpicker',
                    'heading'       => esc_html__( 'Add icon', 'fruitshop' ),
                    'param_name'    => 'icon',
                    'value'         => '',
                    'settings'      => array(
                        'emptyIcon'     => true,
                        'iconsPerPage'  => 4000,
                    ),
                    'description'   => esc_html__( 'Select icon from library.', 'fruitshop' ),
                ),
            ),
            'callbacks' => array(
                'after_add' => 'vcChartParamAfterAddCallback'
            ),
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Extra class name",'fruitshop'),
            "param_name"    => "el_class",
            'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'fruitshop' )
        ),
        array(
            "type"          => "css_editor",
            "heading"       => esc_html__("CSS box",'fruitshop'),
            "param_name"    => "custom_css",
            'group'         => esc_html__('Design Options','fruitshop')
        ),
    )
));