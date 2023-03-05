<?php
/**
 * Created by Sublime text 2.
 * User: 7uptheme
 * Date: 18/08/15
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_menu'))
{
    function s7upf_vc_menu($attr,$content = false)
    {
        $s7upf_menu_fixed = s7upf_get_option('s7upf_menu_fixed','on');

        $html = $style = $active_color = $html_logo_fixed = $extra_class=$menu_fixed = $data_add_social = $img_logo = $bg_color = $active_color = $text_color = $add_social = $menu = $cart_box = $search_box = $class_menu = $menu_position = '' ;
        if($s7upf_menu_fixed == 'on') $menu_fixed = 'header-ontop';

        extract(shortcode_atts(array(
            'menu'      => 'primary',
            'search_box'      => 'show',
            'cart_box'      => 'show',
            'style'      => 'default',
            'active_color'      => '',
            'menu_position'      => 'text-center',
            'add_social'      => '',
            'text_color'      => '',
            'bg_color'      => '',
            'img_logo'      => '',
            'extra_class'      => '',
            'img_logo_fixed'      => '',
            'cart_box_fixed'      => 'hide',
            'search_fixed'      => 'hide',
        ),$attr));
        if(isset($add_social))
            $data_add_social = vc_param_group_parse_atts( $add_social );

        if(!empty($img_logo_fixed) and $s7upf_menu_fixed == 'on'){
            $class_menu .=' logo-fixed-show ';
            $html_logo_fixed = '<div class="menu-logo-fixed"><a href="'.esc_url(home_url('/')).'">'.wp_get_attachment_image($img_logo_fixed,'full').'</a></div>';
        }
        switch ($style){
            case 'default':
                if(!empty($text_color)) {
                    $class_menu .= S7upf_Assets::build_css('color: ' . $text_color . ';', ' ul li a');
                    $class_menu .= ' '.S7upf_Assets::build_css('color: ' . $text_color . ';', '.mb-header-default .main-nav > ul >li.current-menu-ancestor > a');
                    $class_menu .= ' '.S7upf_Assets::build_css('color: ' . $text_color . ';', '.mb-header-default .main-nav > ul >li.current-menu-ancestor > a:hover');
                }
                if(!empty($active_color)){
                    $class_menu .= ' '.S7upf_Assets::build_css('background: ' . $active_color . ';', '.mb-header-default .main-nav > ul > li.current-menu-item > a');
                    $class_menu .= ' '.S7upf_Assets::build_css('background: ' . $active_color . ';', '.mb-header-default .main-nav > ul >li.current-menu-ancestor > a');
                    $class_menu .= ' '.S7upf_Assets::build_css('color: ' . $active_color . ';', '.mb-header-default .mb-menu-root li li.active >a');

                    $class_menu .= ' '.S7upf_Assets::build_css('color: ' . $active_color . ';', '.element-menu-default .main-nav  li:hover> a');
                }
                $html .= '<div class="nav-header  '.$menu_fixed.' mb-header-default element-menu-'.$style.' '.$class_menu.' '.$extra_class.'">';
                $html .= '<div class="container"><div class="row"><div class="col-md-12">';
                $html .= $html_logo_fixed;
                $html .= '<nav class="main-nav main-nav1">';
                ob_start();
                if('primary'===$menu){
                    wp_nav_menu( array(
                        'theme_location' => $menu,
                        'container'=>false,
                        'walker'=>new S7upf_Walker_Nav_Menu(),
                        'menu_class'=> $menu_position.' mb-menu-root',
                    ));
                }else{
                    wp_nav_menu( array(
                        'menu' => $menu,
                        'container'=>false,
                        'walker'=>new S7upf_Walker_Nav_Menu(),
                        'menu_class'=> $menu_position.' mb-menu-root',
                    ));
                }
                $html .= @ob_get_clean();
                $html .= '<a href="#" class="toggle-mobile-menu"><span></span></a></nav>';
                if($cart_box_fixed == 'show'){
                    $html .= S7upf_Template::load_view('elements/mini-cart',false,array('style'=>'style1','extra_class'=>' mini-cart-fixed ' ,'pull_cart'=>'pull-right'));
                }
                if($search_fixed == 'show'){
                    $html .= S7upf_Template::load_view('elements/search-product',false,array('style'=>'style2','extra_class'=>' search-menu-fixed ' ,'live_search'=>'on'));
                }

                $html .= '</div></div></div>';
                $html .= '</div>';
                break;
            case 'style2':
                if(!empty($bg_color))
                    $class_menu .= S7upf_Assets::build_css('background: ' . $bg_color . '!important;');

                if(!empty($active_color)){
                    $class_menu .= ' '.S7upf_Assets::build_css('color: ' . $active_color . ';' ,' .main-nav li li:hover > a');
                    $class_menu .= ' '.S7upf_Assets::build_css('color: ' . $active_color . ';' ,' .mb-menu-root li li.active >a');
                }
                if(!empty($text_color)){
                    $class_menu .= ' '.S7upf_Assets::build_css('color: ' . $text_color . ';' ,' .main-nav .mb-menu-root > li > a');
                    $class_menu .= ' '.S7upf_Assets::build_css('border-color: ' . $text_color . ';' ,' .main-nav.main-nav2 > ul > li.current-menu-item > a');
                    $class_menu .= ' '.S7upf_Assets::build_css('border-color: ' . $text_color . ';' ,' .top-social a');
                    $class_menu .= ' '.S7upf_Assets::build_css('color: ' . $text_color . ';' ,' .top-social a');
                }
                $html .= '<div class="nav-header2 bg-color '.$menu_fixed.' element-menu-'.$style.' '.$class_menu.' '.$extra_class.'">';
                $html .= '<div class="container"><div class="row"><div class="col-md-12">';
                $html .= $html_logo_fixed;
                $html .= '<nav class="main-nav main-nav2 pull-left">';
                ob_start();
                if('primary'===$menu){
                    wp_nav_menu( array(
                        'theme_location' => $menu,
                        'container'=>false,
                        'walker'=>new S7upf_Walker_Nav_Menu(),
                        'menu_class'=> ' mb-menu-root',
                    ));
                }else{
                    wp_nav_menu( array(
                        'menu' => $menu,
                        'container'=>false,
                        'walker'=>new S7upf_Walker_Nav_Menu(),
                        'menu_class'=> ' mb-menu-root',
                    ));
                }
                $html .= @ob_get_clean();

                $html .= '<a href="#" class="toggle-mobile-menu"><span></span></a></nav>';
                $html .= S7upf_Template::load_view('elements/menu-social',false, array(
                    'data_add_social' => $data_add_social,
                    'text_color' => $text_color,
                ));
                if($cart_box_fixed == 'show'){
                    $html .= S7upf_Template::load_view('elements/mini-cart',false,array('style'=>'style1','extra_class'=>' mini-cart-fixed ' ,'pull_cart'=>'pull-right'));
                }

                $html .= '</div></div></div></div>';
                break;
            case 'style3':

                if(!empty($active_color)){
                    $class_menu .= S7upf_Assets::build_css('color: ' . $active_color . ';' ,' .main-nav ul li:hover > a');
                    $class_menu .= ' '.S7upf_Assets::build_css('color: ' . $active_color . ';' ,' .mb-menu-root li li.active >a');
                    $class_menu .= ' '.S7upf_Assets::build_css('color: ' . $active_color . ';', ' .main-nav > ul > li.current-menu-item > a');
                    $class_menu .= ' '.S7upf_Assets::build_css('border-color: ' . $active_color . ';', ' .main-nav > ul > li.current-menu-item > a');
                    $class_menu .= ' '.S7upf_Assets::build_css('color: ' . $active_color . ';', ' .main-nav > ul > li.current-menu-ancestor > a');
                    $class_menu .= ' '.S7upf_Assets::build_css('border-color: ' . $active_color . ';', ' .main-nav > ul > li.current-menu-ancestor > a');
                    $class_menu .= ' '.S7upf_Assets::build_css('background: ' . $active_color . ';', ' .search-cart3 .mini-cart-number');
                }
                if(!empty($text_color)){
                    $class_menu .= ' '.S7upf_Assets::build_css('color: ' . $text_color . ';', ' .main-nav ul li a');
                }

                $html .= '<div class="main-header3 bg-white '.$menu_fixed.' element-menu-'.$style.' '.$class_menu.' '.$extra_class.'">';
                $html .= '<div class="container"><div class="row">';
                $col = '12';
                if(!empty($img_logo)){
                    $html .= '<div class="col-md-3 col-sm-12 col-xs-12">
							<div class="logo logo3 pull-left">
								<a href="'.esc_url(home_url('/')).'">'.wp_get_attachment_image($img_logo,'full').'</a>
							</div>
						</div>';
                    $col = '9';
                }

                $html .= '<div class="col-md-'.$col.' col-sm-12 col-xs-12">';
                $html .= '<nav class="main-nav main-nav3 pull-left">';
                ob_start();
                if('primary'===$menu){
                    wp_nav_menu( array(
                        'theme_location' => $menu,
                        'container'=>false,
                        'walker'=>new S7upf_Walker_Nav_Menu(),
                        'menu_class'=> ' mb-menu-root',
                    ));
                }else{
                    wp_nav_menu( array(
                        'menu' => $menu,
                        'container'=>false,
                        'walker'=>new S7upf_Walker_Nav_Menu(),
                        'menu_class'=> ' mb-menu-root',
                    ));
                }
                $html .= @ob_get_clean();
                $html .= '<a href="#" class="toggle-mobile-menu"><span></span></a></nav>';
                $html .= S7upf_Template::load_view('elements/menu-cart-search',false, array(
                   'search_box' => $search_box,
                   'cart_box' => $cart_box,
                ));
                $html .= '</div></div></div></div>';
                break;
            case 'style5':

                if(!empty($active_color)){
                    $class_menu .= S7upf_Assets::build_css('color: ' . $active_color . ';' ,' .main-nav ul li:hover > a');
                    $class_menu .= ' '.S7upf_Assets::build_css('color: ' . $active_color . ';' ,' .mb-menu-root li li.active >a');
                    $class_menu .= ' '.S7upf_Assets::build_css('color: ' . $active_color . ';', ' .main-nav > ul > li.current-menu-item > a');
                    $class_menu .= ' '.S7upf_Assets::build_css('border-color: ' . $active_color . ';', ' .main-nav > ul > li.current-menu-item > a');
                    $class_menu .= ' '.S7upf_Assets::build_css('color: ' . $active_color . ';', ' .main-nav > ul > li.current-menu-ancestor > a');
                    $class_menu .= ' '.S7upf_Assets::build_css('border-color: ' . $active_color . ';', ' .main-nav > ul > li.current-menu-ancestor > a');
                    $class_menu .= ' '.S7upf_Assets::build_css('background: ' . $active_color . ';', ' .search-cart3 .mini-cart-number');
                }
                if(!empty($text_color)){
                    $class_menu .= ' '.S7upf_Assets::build_css('color: ' . $text_color . ';', ' .main-nav ul li a');
                }

                $html .= '<div class="main-header8 bg-white '.$menu_fixed.' element-menu-'.$style.' '.$class_menu.' '.$extra_class.'">';
                $html .= '<div class="container"><div class="row">';
                $col = '12';
                if(!empty($img_logo)){
                    $html .= '<div class="col-md-3 col-sm-12 col-xs-12">
							<div class="logo logo3 pull-left">
								<a href="'.esc_url(home_url('/')).'">'.wp_get_attachment_image($img_logo,'full').'</a>
							</div>
						</div>';
                    $col = '9';
                }

                $html .= '<div class="col-md-'.$col.' col-sm-12 col-xs-12">';
                $html .= $html_logo_fixed;
                $html .= '<nav class="main-nav main-nav8 pull-left">';
                ob_start();
                if('primary'===$menu){
                    wp_nav_menu( array(
                        'theme_location' => $menu,
                        'container'=>false,
                        'walker'=>new S7upf_Walker_Nav_Menu(),
                        'menu_class'=> ' mb-menu-root',
                    ));
                }else{
                    wp_nav_menu( array(
                        'menu' => $menu,
                        'container'=>false,
                        'walker'=>new S7upf_Walker_Nav_Menu(),
                        'menu_class'=> ' mb-menu-root',
                    ));
                }
                $html .= @ob_get_clean();
                $html .= '<a href="#" class="toggle-mobile-menu"><span></span></a></nav>';
                $html .= S7upf_Template::load_view('elements/menu-cart-search',false, array(
                   'search_box' => $search_box,
                   'cart_box' => $cart_box,
                ));
                $html .= '</div></div></div></div>';
                break;
            case 'style6':
                if(!empty($bg_color))
                    $class_menu .= S7upf_Assets::build_css('background: ' . $bg_color . '!important;');
                if(!empty($text_color)) {
                    $class_menu .= S7upf_Assets::build_css('color: ' . $text_color . ';', ' ul li a');
                    $class_menu .= ' '.S7upf_Assets::build_css('color: ' . $text_color . ';', '.mb-header-default .main-nav > ul >li.current-menu-ancestor > a');
                    $class_menu .= ' '.S7upf_Assets::build_css('color: ' . $text_color . ';', '.mb-header-default .main-nav > ul >li.current-menu-ancestor > a:hover');
                }
                if(!empty($active_color)){
                    $class_menu .= ' '.S7upf_Assets::build_css('background: ' . $active_color . ';', '.mb-header-default .main-nav > ul > li.current-menu-item > a');
                    $class_menu .= ' '.S7upf_Assets::build_css('background: ' . $active_color . ';', '.mb-header-default .main-nav > ul >li.current-menu-ancestor > a');
                    $class_menu .= ' '.S7upf_Assets::build_css('color: ' . $active_color . ';', '.mb-header-default .mb-menu-root li li.active >a');

                    $class_menu .= ' '.S7upf_Assets::build_css('color: ' . $active_color . ';', '.element-menu-default .main-nav  li:hover> a');
                }
                $html .= '<div class="nav-header2 nav-header9 '.$menu_fixed.' mb-header-default element-menu-'.$style.' '.$class_menu.' '.$extra_class.'">';
                $html .= '<div class="container"><div class="row">';
                $html .= $html_logo_fixed;
                $html .= '<nav class="main-nav main-nav1 pull-left">';
                ob_start();
                if('primary'===$menu){
                    wp_nav_menu( array(
                        'theme_location' => $menu,
                        'container'=>false,
                        'walker'=>new S7upf_Walker_Nav_Menu(),
                        'menu_class'=> ' mb-menu-root',
                    ));
                }else{
                    wp_nav_menu( array(
                        'menu' => $menu,
                        'container'=>false,
                        'walker'=>new S7upf_Walker_Nav_Menu(),
                        'menu_class'=> ' mb-menu-root',
                    ));
                }
                $html .= @ob_get_clean();
                $html .= '<a href="#" class="toggle-mobile-menu"><span></span></a></nav>';
                $html .= S7upf_Template::load_view('elements/menu-social',false, array(
                    'data_add_social' => $data_add_social,
                    'text_color' => $text_color,
                ));
                if($cart_box_fixed == 'show'){
                    $html .= S7upf_Template::load_view('elements/mini-cart',false,array('style'=>'style1','extra_class'=>' mini-cart-fixed ' ,'pull_cart'=>'pull-right'));
                }

                $html .= '</div></div>';
                $html .= '</div>';
                break;
            default :
                if(!empty($text_color)){
                    $class_menu .= ' '.S7upf_Assets::build_css('color: ' . $text_color . ';', ' .main-nav ul li a');
                }
                if(!empty($active_color)){
                    $class_menu .= ' '.S7upf_Assets::build_css('color: ' . $active_color . ';' ,' .main-nav >ul> li:hover > a');
                    $class_menu .= ' '.S7upf_Assets::build_css('color: ' . $active_color . ';' ,' .main-nav > ul ul  li > a:hover');
                    $class_menu .= ' '.S7upf_Assets::build_css('color: ' . $active_color . ';' ,' .main-nav > ul ul  li.active > a');
                    $class_menu .= ' '.S7upf_Assets::build_css('color: ' . $active_color . ';', ' .main-nav > ul > li.current-menu-item > a');
                    $class_menu .= ' '.S7upf_Assets::build_css('color: ' . $active_color . ';', ' .main-nav > ul > li.current-menu-ancestor > a');
                }
                $html .= '<div class="nav-header5 '.$menu_fixed.' element-menu-'.$style.' '.$class_menu.' '.$extra_class.'">';
                $html .= '<div class="container"><div class="row"><div class="col-md-12">';
                $html .= $html_logo_fixed;
                $html .= '<nav class="main-nav main-nav5">';
                ob_start();
                if('primary'===$menu){
                    wp_nav_menu( array(
                        'theme_location' => $menu,
                        'container'=>false,
                        'walker'=>new S7upf_Walker_Nav_Menu(),
                        'menu_class'=> $menu_position.' mb-menu-root',
                    ));
                }else{
                    wp_nav_menu( array(
                        'menu' => $menu,
                        'container'=>false,
                        'walker'=>new S7upf_Walker_Nav_Menu(),
                        'menu_class'=> $menu_position.' mb-menu-root',
                    ));
                }
                $html .= @ob_get_clean();
                $html .= '<a href="#" class="toggle-mobile-menu"><span></span></a></nav>';
                if($cart_box_fixed == 'show'){
                    $html .= S7upf_Template::load_view('elements/mini-cart',false,array('style'=>'style1','extra_class'=>' mini-cart-fixed ' ,'pull_cart'=>'pull-right'));
                }

                $html .= '</div></div></div></div>';

        }
        return $html;
    }
}

stp_reg_shortcode('s7upf_menu','s7upf_vc_menu');

vc_map( array(
    "name"      => esc_html__("SV Menu", 'fruitshop'),
    "base"      => "s7upf_menu",
    "icon"      => "icon-st",
    "category"  => '7Up-theme',
    "params"    => array(
        array(
            'type' => 'dropdown',
            'admin_label' => true,
            'heading' => esc_html__( 'Menu name', 'fruitshop' ),
            'param_name' => 'menu',
            'value' => s7upf_list_menu_name(),
            'description' => esc_html__( 'Select Menu name to display', 'fruitshop' )
        ),
        array(
            'type' => 'dropdown',
            'admin_label' => true,
            'heading' => esc_html__( 'Style menu', 'fruitshop' ),
            'param_name' => 'style',
            'value' => array(
                esc_html__('Style 1 (Default)','fruitshop')=>'default',
                esc_html__('Style 2','fruitshop')=>'style2',
                esc_html__('Style 3','fruitshop')=>'style3',
                esc_html__('Style 4','fruitshop')=>'style4',
                esc_html__('Style 5','fruitshop')=>'style5',
                esc_html__('Style 6','fruitshop')=>'style6',
            ),
            'description' => esc_html__( 'Select style', 'fruitshop' )
        ),
        array(
            'type' => 's7up_image_check',
            'param_name' => 'style_menu',
            'heading' => '',
            'element' => 'style',
        ),
        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Logo Image', 'fruitshop' ),
            'param_name' => 'img_logo',
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style3')
            ),
        ),
        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Logo fixed', 'fruitshop' ),
            'param_name' => 'img_logo_fixed',
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('default','style2','style4','style5','style6')
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Show search box', 'fruitshop' ),
            'param_name' => 'search_box',
            'value'=>array(
                esc_html__('Show','fruitshop')=> 'show',
                esc_html__('Hide','fruitshop')=> 'hide',
            ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style3','style5')
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Show cart fixed', 'fruitshop' ),
            'param_name' => 'cart_box_fixed',
            'value'=>array(
                esc_html__('Hide','fruitshop')=> 'hide',
                esc_html__('Show','fruitshop')=> 'show',

            ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('default','style2','style4','style6')
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Show search fixed', 'fruitshop' ),
            'param_name' => 'search_fixed',
            'value'=>array(
                esc_html__('Hide','fruitshop')=> 'hide',
                esc_html__('Show','fruitshop')=> 'show',

            ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('default','style2','style4','style6')
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Show cart box', 'fruitshop' ),
            'param_name' => 'cart_box',
            'value'=>array(
                esc_html__('Show','fruitshop')=> 'show',
                esc_html__('Hide','fruitshop')=> 'hide',
            ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style3','style5')
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Menu position', 'fruitshop' ),
            'param_name' => 'menu_position',
            'value'=>array(
                esc_html__('Center','fruitshop')=> 'text-center',
                esc_html__('Left','fruitshop')=> 'text-left',
                esc_html__('Right','fruitshop')=> 'text-right',
            ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('default','style4')
            ),
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__('Add link Social', 'fruitshop'),
            'param_name' => 'add_social',
            'value' =>'',
            'params' => array(
                array(
                    'type'        => 'iconpicker',
                    'admin_label' => true,
                    'heading'     => esc_html__( 'Icon', 'fruitshop' ),
                    'param_name'  => 'icon',
                    'description' => esc_html__( 'Select icon.', 'fruitshop' ),
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'Link', 'fruitshop' ),
                    'param_name' => 'link',
                    'description' => esc_html__('Add link to Social.','fruitshop'),
                ),
            ),
            'callbacks' => array(
                'after_add' => 'vcChartParamAfterAddCallback'
            ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style2','style6')
            ),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__( 'Text color', 'fruitshop' ),
            'param_name' => 'text_color',
            'description' => esc_html__( 'Select color', 'fruitshop' )
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__( 'Active/Hover color', 'fruitshop' ),
            'param_name' => 'active_color',
            'description' => esc_html__( 'Select color', 'fruitshop' )
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__( 'Background color', 'fruitshop' ),
            'param_name' => 'bg_color',
            'description' => esc_html__( 'Select color', 'fruitshop' ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style2','style6')
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra Class Name','fruitshop'),
            'param_name' => 'extra_class',
            'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.','fruitshop'),
        ),
    )
));