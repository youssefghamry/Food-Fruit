<?php
/**
 * Created by Sublime Text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:20 AM
 */
if(!function_exists('s7upf_set_theme_config')){
    function s7upf_set_theme_config(){
        global $s7upf_dir,$s7upf_config;
        /**************************************** BEGIN ****************************************/
        $s7upf_dir = get_template_directory() . '/7upframe';
        $s7upf_config = array();
        $s7upf_config['dir'] = $s7upf_dir;
        $s7upf_config['css_url'] = $s7upf_dir . '/assets/css/';
        $s7upf_config['js_url'] = $s7upf_dir . '/assets/js/';
        $s7upf_config['nav_menu'] = array(
            'primary' => esc_html__( 'Primary Navigation', 'fruitshop' ),
        );
        $s7upf_config['mega_menu'] = '1';
        $s7upf_config['sidebars']=array(
            array(
                'name'              => esc_html__( 'Blog Sidebar', 'fruitshop' ),
                'id'                => 'blog-sidebar',
                'description'       => esc_html__( 'Widgets in this area will be shown on all blog page.', 'fruitshop'),
                'before_title'      => '<h3 class="widget-title">',
                'after_title'       => '</h3>',
                'before_widget'     => '<div id="%1$s" class="sidebar-widget widget %2$s">',
                'after_widget'      => '</div>',
            )
        );
        $s7upf_config['import_config'] = array(
            'homepage_default'          => 'Home 1',
            'blogpage_default'          => 'Blog',
            'menu_locations'            => array("Main menu" => "primary"),
            'set_woocommerce_page'      => 1
        );
        $s7upf_config['import_theme_option'] = 'YTo3Nzp7czoxNzoiczd1cGZfaGVhZGVyX3BhZ2UiO3M6MjoiMTIiO3M6MTc6InM3dXBmX2Zvb3Rlcl9wYWdlIjtzOjM6IjU4OSI7czoxMDoibWFpbl9jb2xvciI7czo3OiIjNjZjYzMzIjtzOjE1OiJzZWNvbmRhcnlfY29sb3IiO3M6MDoiIjtzOjc6ImJnX3BhZ2UiO3M6MDoiIjtzOjEwOiJzY3JvbGxfdG9wIjtzOjI6Im9uIjtzOjc6InByZWxvYWQiO3M6Mjoib24iO3M6MTM6InJpZ2h0X3RvX2xlZnQiO3M6Mzoib2ZmIjtzOjExOiJtYXBfYXBpX2tleSI7czozOToiQUl6YVN5QUhzbEJpd2EwYjJ1THlnbTYySnZfZm9YUHFkcmFJNnQ0IjtzOjIyOiJlbmFibGVfYmFubmVyXzQwNF9wYWdlIjtzOjM6Im9mZiI7czoyNDoiYmdfaW1hZ2VfYmFubmVyXzQwNF9wYWdlIjtzOjA6IiI7czoyMToidGl0bGVfYmFubmVyXzQwNF9wYWdlIjtzOjA6IiI7czoxNDoiczd1cGZfNDA0X3BhZ2UiO3M6MDoiIjtzOjE2OiJzN3VwZl9jdXN0b21fY3NzIjtzOjA6IiI7czoyMzoiczd1cGZfY3VzdG9tX2phdmFzY3JpcHQiO3M6MDoiIjtzOjQ6ImxvZ28iO3M6MDoiIjtzOjc6ImZhdmljb24iO3M6MDoiIjtzOjE2OiJzN3VwZl9tZW51X2ZpeGVkIjtzOjI6Im9uIjtzOjE2OiJzN3VwZl9tZW51X2NvbG9yIjtzOjA6IiI7czoyOToibnVtYmVyX3dvcmRfZXhjZXJwdF9ibG9nX2xpc3QiO3M6MjoiNTAiO3M6MjA6InNob3dfc2hhcmVfYmxvZ19saXN0IjtzOjI6Im9uIjtzOjIzOiJlbmFibGVfYmFubmVyX2Jsb2dfbGlzdCI7czoyOiJvbiI7czoyNToiYmdfaW1hZ2VfYmFubmVyX2Jsb2dfbGlzdCI7czo3ODoiaHR0cHM6Ly9mcnVpdHNob3AuN3VwdGhlbWUubmV0L3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDE3LzA0L2Jhbm5lci1ibG9nLWxpc3QuanBnIjtzOjIyOiJ0aXRsZV9iYW5uZXJfYmxvZ19saXN0IjtzOjQ6ImJsb2ciO3M6MTk6ImVuYWJsZV9zaGFyZV9zaW5nbGUiO3M6Mjoib24iO3M6MjA6ImVuYWJsZV9iYW5uZXJfc2luZ2xlIjtzOjI6Im9uIjtzOjI3OiJiZ19pbWFnZV9iYW5uZXJfYmxvZ19zaW5nbGUiO3M6ODE6Imh0dHBzOi8vZnJ1aXRzaG9wLjd1cHRoZW1lLm5ldC93cC1jb250ZW50L3VwbG9hZHMvMjAxNy8wNC9iYW5uZXItYmxvZy1tYXNvbnJ5LmpwZyI7czoyNDoidGl0bGVfYmFubmVyX2Jsb2dfc2luZ2xlIjtzOjQ6IkJsb2ciO3M6Mjc6InM3dXBmX3NpZGViYXJfcG9zaXRpb25fYmxvZyI7czo0OiJsZWZ0IjtzOjE4OiJzN3VwZl9zaWRlYmFyX2Jsb2ciO3M6MTI6ImJsb2ctc2lkZWJhciI7czoyNzoiczd1cGZfc2lkZWJhcl9wb3NpdGlvbl9wYWdlIjtzOjI6Im5vIjtzOjE4OiJzN3VwZl9zaWRlYmFyX3BhZ2UiO3M6MDoiIjtzOjM1OiJzN3VwZl9zaWRlYmFyX3Bvc2l0aW9uX3BhZ2VfYXJjaGl2ZSI7czoyOiJubyI7czoyNjoiczd1cGZfc2lkZWJhcl9wYWdlX2FyY2hpdmUiO3M6MDoiIjtzOjI3OiJzN3VwZl9zaWRlYmFyX3Bvc2l0aW9uX3Bvc3QiO3M6NDoibGVmdCI7czoxODoiczd1cGZfc2lkZWJhcl9wb3N0IjtzOjEyOiJibG9nLXNpZGViYXIiO3M6MTc6InM3dXBmX2FkZF9zaWRlYmFyIjthOjE6e2k6MDthOjI6e3M6NToidGl0bGUiO3M6MTI6InNpZGViYXIgc2hvcCI7czoyMDoid2lkZ2V0X3RpdGxlX2hlYWRpbmciO3M6MjoiaDMiO319czoxMjoiZ29vZ2xlX2ZvbnRzIjthOjE6e2k6MDthOjE6e3M6NjoiZmFtaWx5IjtzOjA6IiI7fX1zOjI1OiJzN3VwZl9oZWFkZXJfcHJvZHVjdF9saXN0IjtzOjA6IiI7czoyNToiczd1cGZfZm9vdGVyX3Byb2R1Y3RfbGlzdCI7czowOiIiO3M6MjQ6InN0X3Byb2R1Y3RfcG9zdF9wZXJfcGFnZSI7czoxOiI5IjtzOjI2OiJ3b29fc3R5bGVfdmlld193YXlfcHJvZHVjdCI7czo0OiJncmlkIjtzOjE1OiJ3b29fc2hvcF9jb2x1bW4iO3M6MToiNCI7czo5OiJzaG9wX2FqYXgiO3M6Mjoib24iO3M6MTk6InNob3BfbW9iaWxlXzJjb2x1bW4iO3M6Mjoib24iO3M6MzA6InM3dXBmX3Nob3dfYmFubmVyX3Byb2R1Y3RfbGlzdCI7czoyOiJvbiI7czozMToiczd1cGZfYmFubmVyX3RpdGxlX3Byb2R1Y3RfbGlzdCI7czoxNjoiRnJlc2ggZnJ1aXQgc2hvcCI7czoyODoiczd1cGZfYmFubmVyX2JnX3Byb2R1Y3RfbGlzdCI7czo3MzoiaHR0cHM6Ly9mcnVpdHNob3AuN3VwdGhlbWUubmV0L3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDE3LzA0L2Jhbm5lci1ncmlkLmpwZyI7czoyNjoiczd1cGZfc2lkZWJhcl9wb3NpdGlvbl93b28iO3M6NDoibGVmdCI7czoxNzoiczd1cGZfc2lkZWJhcl93b28iO3M6MTI6InNpZGViYXItc2hvcCI7czoyOToiczd1cGZfaW1hZ2Vfc2l6ZV9saXN0X3Byb2R1Y3QiO3M6MDoiIjtzOjMyOiJzN3VwZl9zaG93X2Jhbm5lcl9wcm9kdWN0X2RldGFpbCI7czoyOiJvbiI7czozMzoiczd1cGZfYmFubmVyX3RpdGxlX3Byb2R1Y3RfZGV0YWlsIjtzOjExOiJGcmVzaCBmcnVpdCI7czozMDoiczd1cGZfYmFubmVyX2JnX3Byb2R1Y3RfZGV0YWlsIjtzOjc1OiJodHRwczovL2ZydWl0c2hvcC43dXB0aGVtZS5uZXQvd3AtY29udGVudC91cGxvYWRzLzIwMTcvMDQvYmFubmVyLWRldGFpbC5qcGciO3M6MjM6InM3dXBmX2N1c3RvbV9pbWFnZV9zaXplIjtzOjA6IiI7czozMToiczd1cGZfc2hvd19zaGFyZV9wcm9kdWN0X2RldGFpbCI7czoyOiJvbiI7czozNzoiczd1cGZfc2lkZWJhcl9wb3NpdGlvbl9kZXRhaWxfcHJvZHVjdCI7czo0OiJsZWZ0IjtzOjI4OiJzN3VwZl9zaWRlYmFyX2RldGFpbF9wcm9kdWN0IjtzOjEyOiJibG9nLXNpZGViYXIiO3M6Mjc6InM3dXBmX2hlYWRlcl9wcm9kdWN0X2RldGFpbCI7czowOiIiO3M6Mjc6InM3dXBmX2Zvb3Rlcl9wcm9kdWN0X2RldGFpbCI7czowOiIiO3M6MzM6InM3dXBmX3Nob3dfcmVsYXRlZF9wcm9kdWN0X2RldGFpbCI7czoyOiJvbiI7czoyNzoiczd1cGZfc3R5bGVfcmVsYXRlZF9wcm9kdWN0IjtzOjY6InNsaWRlciI7czoyNzoiczd1cGZfdGl0bGVfcmVsYXRlZF9wcm9kdWN0IjtzOjE2OiJSZWxhdGVkIFByb2R1Y3RzIjtzOjI4OiJzN3VwZl9udW1iZXJfcmVsYXRlZF9wcm9kdWN0IjtzOjE6IjgiO3M6MzQ6InM3dXBmX3Nob3dfdXBfc2VsbHNfcHJvZHVjdF9kZXRhaWwiO3M6Mzoib2ZmIjtzOjI4OiJzN3VwZl9zdHlsZV91cF9zZWxsc19wcm9kdWN0IjtzOjY6InNsaWRlciI7czoyODoiczd1cGZfdGl0bGVfdXBfc2VsbHNfcHJvZHVjdCI7czowOiIiO3M6MTE6Indvb19jYXRlbG9nIjtzOjM6Im9mZiI7czoxMToiaGlkZV9kZXRhaWwiO3M6Mzoib2ZmIjtzOjE1OiJoaWRlX290aGVyX3BhZ2UiO3M6Mzoib2ZmIjtzOjEwOiJoaWRlX3ByaWNlIjtzOjM6Im9mZiI7czoxMDoidGV4dF9wcmljZSI7czowOiIiO3M6MTA6ImhpZGVfYWRtaW4iO3M6Mzoib2ZmIjtzOjE5OiJzaG93X2J1dHRvbl9jYXRhbG9nIjtzOjI6Im9uIjtzOjE5OiJidXR0b25fdGV4dF9jYXRhbG9nIjtzOjA6IiI7czoxNzoidXJsX3Byb3RvY29sX3R5cGUiO3M6MDoiIjtzOjE2OiJsaW5rX3VybF9jYXRhbG9nIjtzOjA6IiI7fQ==';
        $s7upf_config['import_widget'] = '{"blog-sidebar":{"search-2":{"title":""},"woocommerce_product_categories-2":{"title":"Product categories","orderby":"name","dropdown":0,"count":1,"hierarchical":1,"show_children_only":0,"hide_empty":0},"woocommerce_price_filter-2":{"title":"Filter by price"},"s7upf_list_products-2":{"title":"New Arrivals","number":"10","product_type":""},"woocommerce_product_tag_cloud-2":{"title":"Search by Tags"}}}';
        $s7upf_config['import_category'] = '{"dried-products":{"thumbnail":"439","parent":""},"fresh-meal":{"thumbnail":"440","parent":""},"fruits-fresh":{"thumbnail":"441","parent":""},"juice":{"thumbnail":"439","parent":""},"vegetables":{"thumbnail":"440","parent":""}}';

        /**************************************** PLUGINS ****************************************/

        $s7upf_config['require-plugin'] = array(
            array(
                'name'               => esc_html__('Option Tree', 'fruitshop'), // The plugin name.
                'slug'               => 'option-tree', // The plugin slug (typically the folder name).
                'source'    =>get_template_directory().'/plugins/option-tree.zip',
                'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            ),
            array(
                'name'      => esc_html__( 'Contact Form 7', 'fruitshop'),
                'slug'      => 'contact-form-7',
                'required'  => true,
            ),
            array(
                'name'      => esc_html__( 'WPBakery Page Builder', 'fruitshop'),
                'slug'      => 'js_composer',
                'required'  => true,
                'source'    =>get_template_directory().'/plugins/js_composer.zip',
                'version'   => '6.9',
            ),
            array(
                'name'      => esc_html__( '7up Core', 'fruitshop'),
                'slug'      => '7up-core',
                'required'  => true,
                'source'    =>get_template_directory().'/plugins/7up-core.zip',
                 'version'   => '1.6',
            ),
            array(
                'name'      => esc_html__( 'Revslider', 'fruitshop'),
                'slug'      => 'revslider',
                'required'  => true,
                'source'    => get_template_directory().'/plugins/revslider.zip',
                'version'   => '6.5',
            ),
            array(
                'name'      => esc_html__( 'WooCommerce', 'fruitshop'),
                'slug'      => 'woocommerce',
                'required'  => true,
            ),
            array(
                'name' => esc_html__('Mail Chimp','fruitshop'),
                'slug' => 'mailchimp-for-wp',
                'required' => true
            ),
            array(
                'name'      => esc_html__('Yith Woocommerce Compare','fruitshop'),
                'slug'      => 'yith-woocommerce-compare',
                'required'  => true,
            ),
            array(
                'name'      => esc_html__('Yith Woocommerce Wishlist','fruitshop'),
                'slug'      => 'yith-woocommerce-wishlist',
                'required'  => true,
            )
        );

        /**************************************** PLUGINS ****************************************/
        $s7upf_config['theme-option'] = array(
            'sections' => array(
                array(
                    'id' => 'option_general',
                    'title' => '<i class="fa fa-cog"></i>'.esc_html__(' General Settings', 'fruitshop')
                ),
                array(
                    'id' => 'option_logo',
                    'title' => '<i class="fa fa-image"></i>'.esc_html__(' Logo Settings', 'fruitshop')
                ),
                array(
                    'id' => 'option_menu',
                    'title' => '<i class="fa fa-align-justify"></i>'.esc_html__(' Menu Settings', 'fruitshop')
                ),
                array(
                    'id' => 'option_blog',
                    'title' => '<i class="fa fa-file-text-o"></i> '.esc_html__('Blog Settings', 'fruitshop')
                ),
                array(
                    'id' => 'option_layout',
                    'title' => '<i class="fa fa-columns"></i>'.esc_html__(' Layout Settings', 'fruitshop')
                ),
                array(
                    'id' => 'option_typography',
                    'title' => '<i class="fa fa-font"></i>'.esc_html__(' Typography', 'fruitshop')
                )
            ),
            'settings' => array(
                /*----------------Begin General --------------------*/
                array(
                    'id' => 'st_tab_general_theme',
                    'type' => 'tab',
                    'section' => 'option_general',
                    'label' => esc_html__('General theme','fruitshop')
                ),
                array(
                    'id'          => 's7upf_header_page',
                    'label'       => esc_html__( 'Header Page', 'fruitshop' ),
                    'desc'        => esc_html__( 'Include page to Header', 'fruitshop' ),
                    'type'        => 'select',
                    'section'     => 'option_general',
                    'choices'     => s7upf_list_header_page()
                ),
                array(
                    'id'          => 's7upf_footer_page',
                    'label'       => esc_html__( 'Footer Page', 'fruitshop' ),
                    'desc'        => esc_html__( 'Include page to Footer', 'fruitshop' ),
                    'type'        => 'select',
                    'section'     => 'option_general',
                    'choices'     => s7upf_list_footer_page()
                ),
                array(
                    'id'          => 'main_color',
                    'label'       => esc_html__('Main color','fruitshop'),
                    'type'        => 'colorpicker-opacity',
                    'desc' => esc_html__('This allow you custom color main of theme.', 'fruitshop'),
                    'section'     => 'option_general',
                ),
                array(
                    'id'          => 'secondary_color',
                    'label'       => esc_html__('Secondary color','fruitshop'),
                    'type'        => 'colorpicker-opacity',
                    'desc' => esc_html__('This allow you custom color secondary of theme.', 'fruitshop'),
                    'section'     => 'option_general',
                ),
                array(
                    'id'          => 'bg_page',
                    'label'       => esc_html__('Background page','fruitshop'),
                    'type'        => 'colorpicker-opacity',
                    'desc' => esc_html__('This allow you custom background body.', 'fruitshop'),
                    'section'     => 'option_general',
                ),
                array(
                    'id'          => 'scroll_top',
                    'label'       => esc_html__('Scroll top','fruitshop'),
                    'type'        => 'on-off',
                    'desc' => esc_html__('This allow you to turn on or off scroll top.', 'fruitshop'),
                    'section'     => 'option_general',
                    'std' => 'on'
                ),
                array(
                    'id'          => 'preload',
                    'label'       => esc_html__('Preload','fruitshop'),
                    'type'        => 'on-off',
                    'desc' => esc_html__('This allow you to turn on or off Preload.', 'fruitshop'),
                    'section'     => 'option_general',
                    'std' => 'off'
                ),
                array(
                    'id'          => 'right_to_left',
                    'label'       => esc_html__('Right to left','fruitshop'),
                    'type'        => 'on-off',
                    'desc' => esc_html__('Language feature to right.', 'fruitshop'),
                    'section'     => 'option_general',
                    'std' => 'off'
                ),
                array(
                    'id'          => 'map_api_key',
                    'label'       => esc_html__('Map API key','fruitshop'),
                    'type'        => 'text',
                    'desc' => esc_html__('Navigate link to https://developers.google.com/maps/documentation/javascript/get-api-key for get Map API key.', 'fruitshop'),
                    'section'     => 'option_general',
                    'std'         => 'AIzaSyBX2IiEBg-0lQKQQ6wk6sWRGQnWI7iogf0',
                ),
                array(
                    'id' => 'st_tab_general_404',
                    'type' => 'tab',
                    'section' => 'option_general',
                    'label' => esc_html__('Page 404','fruitshop')
                ),
                array(
                    'id' => 'enable_banner_404_page',
                    'label' => esc_html__('Enable banner 404 page', 'fruitshop'),
                    'desc' => esc_html__('This allow you to turn on or off Banner.', 'fruitshop'),
                    'type' => 'on-off',
                    'section' => 'option_general',
                    'std'  => 'off'
                ),

                array(
                    'id' => 'bg_image_banner_404_page',
                    'label' => esc_html__('Background banner 404 page', 'fruitshop'),
                    'desc' => esc_html__('Select image from library.', 'fruitshop'),
                    'type' => 'upload',
                    'section' => 'option_general',
                    'condition'   => 'enable_banner_404_page:is(on)',
                ),

                array(
                    'id' => 'title_banner_404_page',
                    'label' => esc_html__('Title banner 404 page', 'fruitshop'),
                    'desc' => esc_html__('Enter title.', 'fruitshop'),
                    'type' => 'text',
                    'section' => 'option_general',
                    'condition'   => 'enable_banner_404_page:is(on)',
                ),
                array(
                    'id'          => 's7upf_404_page',
                    'label'       => esc_html__( '404 page', 'fruitshop' ),
                    'desc'        => esc_html__( 'Include page to 404 page', 'fruitshop' ),
                    'type'        => 'page-select',
                    'section'     => 'option_general'
                ),
                array(
                    'id' => 'st_tab_general_css_js',
                    'type' => 'tab',
                    'section' => 'option_general',
                    'label' => esc_html__('Edit style','fruitshop')
                ),
                array(
                    'id'          => 's7upf_custom_css',
                    'label'       => esc_html__('Custom CSS','fruitshop'),
                    'type'        => 'css',
                    'desc' => esc_html__('Enter code css.', 'fruitshop'),
                    'section'     => 'option_general',
                ),
                array(
                    'id'          => 's7upf_custom_javascript',
                    'label'       => esc_html__('Custom JavaScript','fruitshop'),
                    'type'        => 'javascript',
                    'desc' => esc_html__('Enter code JavaScript.', 'fruitshop'),
                    'section'     => 'option_general',
                ),
                /*----------------End General ----------------------*/

                /*----------------Begin Logo --------------------*/
                array(
                    'id' => 'logo',
                    'label' => esc_html__('Logo', 'fruitshop'),
                    'desc' => esc_html__('This allow you to change logo', 'fruitshop'),
                    'type' => 'upload',
                    'section' => 'option_logo',
                ),
                array(
                    'id' => 'favicon',
                    'label' => esc_html__('Favicon', 'fruitshop'),
                    'desc' => esc_html__('This allow you to change favicon of your website', 'fruitshop'),
                    'type' => 'upload',
                    'section' => 'option_logo'
                ),
                /*----------------End Logo ----------------------*/

                /*----------------Begin Menu --------------------*/
                array(
                    'id'          => 's7upf_menu_fixed',
                    'label'       => esc_html__('Menu Fixed','fruitshop'),
                    'desc'        => 'Menu change to fixed when scroll',
                    'type'        => 'on-off',
                    'section'     => 'option_menu',
                    'std'         => 'on',
                ),
                array(
                    'id'          => 's7upf_menu_color',
                    'label'       => esc_html__('Menu style','fruitshop'),
                    'type'        => 'typography',
                    'section'     => 'option_menu',
                ),

                /*----------------End Menu ----------------------*/

                /*----------------Begin Blog --------------------*/
                array(
                    'id' => 'st_tab_blog',
                    'type' => 'tab',
                    'section' => 'option_blog',
                    'label' => esc_html__('Page list post','fruitshop')
                ),

                array(
                    'id'          => 's7upf_blog_list_style',
                    'label'       => esc_html__('Blog style','fruitshop'),
                    'type'        => 'select',
                    'section'     => 'option_blog',
                    'desc'=>esc_html__('Select style','fruitshop'),
                    'choices'     => array(
                        array(
                            'value'=>'',
                            'label'=>esc_html__('List (default)','fruitshop'),
                        ),
                        array(
                            'value'=>'grid-style1',
                            'label'=>esc_html__('Grid style 1','fruitshop'),
                        ),
                        array(
                            'value'=>'grid-style2',
                            'label'=>esc_html__('Grid style 2','fruitshop'),
                        )
                    )
                ),
                array(
                    'id'          => 'col_layout_grid',
                    'label'       => esc_html__('Column layout','fruitshop'),
                    'type'        => 'select',
                    'section'     => 'option_blog',
                    'condition'   => 's7upf_blog_list_style:not()',
                    'desc'=>esc_html__('Select Column','fruitshop'),
                    'choices'     => array(
                        array(
                            'value'=>'6',
                            'label'=>esc_html__('2 Column','fruitshop'),
                        ),
                        array(
                            'value'=>'4',
                            'label'=>esc_html__('3 Column','fruitshop'),
                        ),
                        array(
                            'value'=>'3',
                            'label'=>esc_html__('4 Column','fruitshop'),
                        )
                    )
                ),
                array(
                    'id' => 'number_word_excerpt_blog_list',
                    'label' => esc_html__('Number word excerpt', 'fruitshop'),
                    'desc' => esc_html__('This allows you to change the number of words in the excerpt (Default: 30 word).', 'fruitshop'),
                    'type'        => 'numeric-slider',
                    'min_max_step'=> '0,50,1',
                    'section' => 'option_blog',
                    'std'  => 30
                ),
                array(
                    'id' => 'show_share_blog_list',
                    'label' => esc_html__('Display posts share button', 'fruitshop'),
                    'desc' => esc_html__('This allows you to hide or show the posts share button.(Default: show)', 'fruitshop'),
                    'type' => 'on-off',
                    'section' => 'option_blog',
                    'std'  => 'on'
                ),
                array(
                    'id' => 'enable_banner_blog_list',
                    'label' => esc_html__('Enable banner', 'fruitshop'),
                    'desc' => esc_html__('This allow you to turn on or Banner.', 'fruitshop'),
                    'type' => 'on-off',
                    'section' => 'option_blog',
                    'std'  => 'off'
                ),

                array(
                    'id' => 'bg_image_banner_blog_list',
                    'label' => esc_html__('Background banner', 'fruitshop'),
                    'desc' => esc_html__('Select image from library.', 'fruitshop'),
                    'type' => 'upload',
                    'section' => 'option_blog',
                    'condition'   => 'enable_banner_blog_list:is(on)',
                ),

                array(
                    'id' => 'title_banner_blog_list',
                    'label' => esc_html__('Title banner', 'fruitshop'),
                    'desc' => esc_html__('Enter title.', 'fruitshop'),
                    'type' => 'text',
                    'section' => 'option_blog',
                    'condition'   => 'enable_banner_blog_list:is(on)',
                ),

                array(
                    'id' => 'st_tab_blog_detail',
                    'type' => 'tab',
                    'section' => 'option_blog',
                    'label' => esc_html__('Page post detail','fruitshop')
                ),

                array(
                    'id'          => 'enable_share_single',
                    'label'       => esc_html__('Enable share post','fruitshop'),
                    'type'        => 'on-off',
                    'section' => 'option_blog',
                    'std' => 'on',
                ),
                array(
                    'id'          => 'enable_banner_single',
                    'label'       => esc_html__('Enable banner','fruitshop'),
                    'type'        => 'on-off',
                    'section' => 'option_blog',
                    'std' => 'off',
                ),
                array(
                    'id' => 'bg_image_banner_blog_single',
                    'label' => esc_html__('Background banner', 'fruitshop'),
                    'desc' => esc_html__('Select image from library.', 'fruitshop'),
                    'type' => 'upload',
                    'section' => 'option_blog',
                    'condition'   => 'enable_banner_single:is(on)',
                ),
                array(
                    'id' => 'title_banner_blog_single',
                    'label' => esc_html__('Title banner', 'fruitshop'),
                    'desc' => esc_html__('Enter title.', 'fruitshop'),
                    'type' => 'text',
                    'section' => 'option_blog',
                    'condition'   => 'enable_banner_single:is(on)',
                ),
                /*----------------End Blog ----------------------*/

                /*----------------Begin Layout --------------------*/
                array(
                    'id'          => 's7upf_sidebar_position_blog',
                    'label'       => esc_html__('Sidebar Blog','fruitshop'),
                    'type'        => 'select',
                    'section'     => 'option_layout',
                    'desc'=>esc_html__('Left, or Right, or Center','fruitshop'),
                    'choices'     => array(
                        array(
                            'value'=>'no',
                            'label'=>esc_html__('No Sidebar','fruitshop'),
                        ),
                        array(
                            'value'=>'left',
                            'label'=>esc_html__('Left','fruitshop'),
                        ),
                        array(
                            'value'=>'right',
                            'label'=>esc_html__('Right','fruitshop'),
                        )
                    )
                ),
                array(
                    'id'          => 's7upf_sidebar_blog',
                    'label'       => esc_html__('Sidebar select display in blog','fruitshop'),
                    'type'        => 'sidebar-select',
                    'section'     => 'option_layout',
                    'condition'   => 's7upf_sidebar_position_blog:not(no)',
                ),
                /****end blog****/
                array(
                    'id'          => 's7upf_sidebar_position_page',
                    'label'       => esc_html__('Sidebar Page','fruitshop'),
                    'type'        => 'select',
                    'section'     => 'option_layout',
                    'desc'=>esc_html__('Left, or Right, or Center','fruitshop'),
                    'choices'     => array(
                        array(
                            'value'=>'no',
                            'label'=>esc_html__('No Sidebar','fruitshop'),
                        ),
                        array(
                            'value'=>'left',
                            'label'=>esc_html__('Left','fruitshop'),
                        ),
                        array(
                            'value'=>'right',
                            'label'=>esc_html__('Right','fruitshop'),
                        )
                    )
                ),
                array(
                    'id'          => 's7upf_sidebar_page',
                    'label'       => esc_html__('Sidebar select display in page','fruitshop'),
                    'type'        => 'sidebar-select',
                    'section'     => 'option_layout',
                    'condition'   => 's7upf_sidebar_position_page:not(no)',
                ),
                /****end page****/
                array(
                    'id'          => 's7upf_sidebar_position_page_archive',
                    'label'       => esc_html__('Sidebar Position on Page Archives:','fruitshop'),
                    'type'        => 'select',
                    'section'     => 'option_layout',
                    'desc'=>esc_html__('Left, or Right, or Center','fruitshop'),
                    'choices'     => array(
                        array(
                            'value'=>'no',
                            'label'=>esc_html__('No Sidebar','fruitshop'),
                        ),
                        array(
                            'value'=>'left',
                            'label'=>esc_html__('Left','fruitshop'),
                        ),
                        array(
                            'value'=>'right',
                            'label'=>esc_html__('Right','fruitshop'),
                        )
                    )
                ),
                array(
                    'id'          => 's7upf_sidebar_page_archive',
                    'label'       => esc_html__('Sidebar select display in page Archives','fruitshop'),
                    'type'        => 'sidebar-select',
                    'section'     => 'option_layout',
                    'condition'   => 's7upf_sidebar_position_page_archive:not(no)',
                ),
                // END
                array(
                    'id'          => 's7upf_sidebar_position_post',
                    'label'       => esc_html__('Sidebar Single Post','fruitshop'),
                    'type'        => 'select',
                    'section'     => 'option_layout',
                    'desc'=>esc_html__('Left, or Right, or Center','fruitshop'),
                    'choices'     => array(
                        array(
                            'value'=>'no',
                            'label'=>esc_html__('No Sidebar','fruitshop'),
                        ),
                        array(
                            'value'=>'left',
                            'label'=>esc_html__('Left','fruitshop'),
                        ),
                        array(
                            'value'=>'right',
                            'label'=>esc_html__('Right','fruitshop'),
                        )
                    )
                ),
                array(
                    'id'          => 's7upf_sidebar_post',
                    'label'       => esc_html__('Sidebar select display in single post','fruitshop'),
                    'type'        => 'sidebar-select',
                    'section'     => 'option_layout',
                    'condition'   => 's7upf_sidebar_position_post:not(no)',
                ),
                array(
                    'id'          => 's7upf_add_sidebar',
                    'label'       => esc_html__('Add SideBar','fruitshop'),
                    'type'        => 'list-item',
                    'section'     => 'option_layout',
                    'std'         => '',
                    'settings'    => array(
                        array(
                            'id'          => 'widget_title_heading',
                            'label'       => esc_html__('Choose heading title widget','fruitshop'),
                            'type'        => 'select',
                            'std'        => 'h3',
                            'choices'     => array(
                                array(
                                    'value'=>'h1',
                                    'label'=>esc_html__('H1','fruitshop'),
                                ),
                                array(
                                    'value'=>'h2',
                                    'label'=>esc_html__('H2','fruitshop'),
                                ),
                                array(
                                    'value'=>'h3',
                                    'label'=>esc_html__('H3','fruitshop'),
                                ),
                                array(
                                    'value'=>'h4',
                                    'label'=>esc_html__('H4','fruitshop'),
                                ),
                                array(
                                    'value'=>'h5',
                                    'label'=>esc_html__('H5','fruitshop'),
                                ),
                                array(
                                    'value'=>'h6',
                                    'label'=>esc_html__('H6','fruitshop'),
                                ),
                            )
                        ),
                    ),
                ),
                /*----------------End Layout ----------------------*/

                /*----------------Begin Blog ----------------------*/


                /*----------------End BLOG----------------------*/

                /*----------------Begin Typography ----------------------*/
                array(
                    'id'          => 's7upf_custom_typography',
                    'label'       => esc_html__('Add Settings','fruitshop'),
                    'type'        => 'list-item',
                    'section'     => 'option_typography',
                    'std'         => '',
                    'settings'    => array(
                        array(
                            'id'          => 'typo_area',
                            'label'       => esc_html__('Choose Area to style','fruitshop'),
                            'type'        => 'select',
                            'std'        => 'main',
                            'choices'     => array(
                                array(
                                    'value'=>'header',
                                    'label'=>esc_html__('Header','fruitshop'),
                                ),
                                array(
                                    'value'=>'main',
                                    'label'=>esc_html__('Main Content','fruitshop'),
                                ),
                                array(
                                    'value'=>'widget',
                                    'label'=>esc_html__('Widget','fruitshop'),
                                ),
                                array(
                                    'value'=>'footer',
                                    'label'=>esc_html__('Footer','fruitshop'),
                                ),
                            )
                        ),
                        array(
                            'id'          => 'typo_heading',
                            'label'       => esc_html__('Choose heading Area','fruitshop'),
                            'type'        => 'select',
                            'std'        => 'h3',
                            'choices'     => array(
                                array(
                                    'value'=>'h1',
                                    'label'=>esc_html__('H1','fruitshop'),
                                ),
                                array(
                                    'value'=>'h2',
                                    'label'=>esc_html__('H2','fruitshop'),
                                ),
                                array(
                                    'value'=>'h3',
                                    'label'=>esc_html__('H3','fruitshop'),
                                ),
                                array(
                                    'value'=>'h4',
                                    'label'=>esc_html__('H4','fruitshop'),
                                ),
                                array(
                                    'value'=>'h5',
                                    'label'=>esc_html__('H5','fruitshop'),
                                ),
                                array(
                                    'value'=>'h6',
                                    'label'=>esc_html__('H6','fruitshop'),
                                ),
                                array(
                                    'value'=>'a',
                                    'label'=>esc_html__('a','fruitshop'),
                                ),
                                array(
                                    'value'=>'p',
                                    'label'=>esc_html__('p','fruitshop'),
                                ),
                            )
                        ),
                        array(
                            'id'          => 'typography_style',
                            'label'       => esc_html__('Add Style','fruitshop'),
                            'type'        => 'typography',
                            'section'     => 'option_typography',
                        ),
                    ),
                ),
                array(
                    'id'          => 'google_fonts',
                    'label'       => esc_html__('Add Google Fonts','fruitshop'),
                    'type'        => 'google-fonts',
                    'section'     => 'option_typography',
                ),
                /*----------------End Typography ----------------------*/
            )
        );
        if(class_exists( 'WooCommerce' )){
            array_push($s7upf_config['theme-option']['sections'], array(
                'id' => 'option_woo',
                'title' => '<i class="fa fa-shopping-cart"></i>'.esc_html__(' Shop Settings', 'fruitshop')
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                    'id' => 'st_tab_product_general',
                    'type' => 'tab',
                    'section' => 'option_woo',
                    'label' => esc_html__('General product','fruitshop')
                )
            );
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_header_product_list',
                'label'       => esc_html__('Header Page','fruitshop'),
                'type'        => 'select',
                'section'     => 'option_woo',
                'choices'     => s7upf_list_header_page(),
                'desc'        => esc_html__('Select page to header in product list','fruitshop'),
            ));

            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_footer_product_list',
                'label'       => esc_html__('Footer Page','fruitshop'),
                'type'        => 'select',
                'section'     => 'option_woo',
                'choices'     => s7upf_list_footer_page(),
                'desc'        => esc_html__('Select page to footer in product list','fruitshop'),
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                    'id'          => 'st_product_post_per_page',
                    'label'       => esc_html__('Post per page','fruitshop'),
                    'type'        => 'numeric-slider',
                    'min_max_step'=> '1,100,1',
                    'section'     => 'option_woo',
                    'desc'        => esc_html__('This allows you to change the number of products in shop page (Default 9 product).','fruitshop'),
                    'std'         => 9
                )
            );

            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 'woo_style_view_way_product',
                'label'       => esc_html__('Choose view way product','fruitshop'),
                'type'        => 'select',
                'section'     => 'option_woo',
                'std'         => 'grid',
                'choices'     => array(
                    array(
                        'value'=> 'grid',
                        'label'=> esc_html__('Grid view','fruitshop'),
                    ),
                    array(
                        'value'=> 'list',
                        'label'=> esc_html__('List view','fruitshop'),
                    ),
                )
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 'woo_shop_column',
                'label'       => esc_html__('Choose shop column','fruitshop'),
                'type'        => 'select',
                'section'     => 'option_woo',
                'condition'   => 'woo_style_view_way_product:is(grid)',
                'choices'     => array(
                    array(
                        'value'=> 3,
                        'label'=> 4,
                    ),
                    array(
                        'value'=> 4,
                        'label'=> 3,
                    ),
                    array(
                        'value'=> 6,
                        'label'=> 2,
                    ),
                    array(
                        'value'=> 12,
                        'label'=> 1,
                    ),



                )
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 'shop_ajax',
                'label'       => esc_html__('Shop ajax','fruitshop'),
                'type'        => 'on-off',
                'section'     => 'option_woo',
                'std'         => 'off',
                'desc'        => esc_html__('Enable ajax process for your shop page.','fruitshop'),
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 'shop_mobile_2column',
                'label'       => esc_html__('Shop mobile 2 column','fruitshop'),
                'type'        => 'on-off',
                'section'     => 'option_woo',
                'std'         => 'off',
                'desc'        => esc_html__('Setting 2 columns on the phone for the shop page.','fruitshop'),
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                    'id' => 'st_tab_product_list',
                    'type' => 'tab',
                    'section' => 'option_woo',
                    'label' => esc_html__('List product','fruitshop')
                )
            );

            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_show_banner_product_list',
                'label'       => esc_html__('Show banner','fruitshop'),
                'type'        => 'on-off',
                'section'     => 'option_woo',
                'desc'=>esc_html__('This allow you to show or hide Banner in list products','fruitshop'),
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_banner_title_product_list',
                'label'       => esc_html__('Title banner','fruitshop'),
                'type'        => 'text',
                'section'     => 'option_woo',
                'desc'=>esc_html__('Enter title banner','fruitshop'),
                'condition'   => 's7upf_show_banner_product_list:is(on)',
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_banner_bg_product_list',
                'label'       => esc_html__('Background banner','fruitshop'),
                'type'        => 'upload',
                'section'     => 'option_woo',
                'desc'=>esc_html__('Select image from library','fruitshop'),
                'condition'   => 's7upf_show_banner_product_list:is(on)',
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_sidebar_position_woo',
                'label'       => esc_html__('Sidebar Position WooCommerce page','fruitshop'),
                'type'        => 'select',
                'section'     => 'option_woo',
                'desc'=>esc_html__('Left, or Right, or Center','fruitshop'),
                'choices'     => array(
                    array(
                        'value'=>'no',
                        'label'=>esc_html__('No Sidebar','fruitshop'),
                    ),
                    array(
                        'value'=>'left',
                        'label'=>esc_html__('Left','fruitshop'),
                    ),
                    array(
                        'value'=>'right',
                        'label'=>esc_html__('Right','fruitshop'),
                    )
                )
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_sidebar_woo',
                'label'       => esc_html__('Sidebar select WooCommerce page','fruitshop'),
                'type'        => 'sidebar-select',
                'section'     => 'option_woo',
                'condition'   => 's7upf_sidebar_position_woo:not(no)',
                'desc'        => esc_html__('Choose one style of sidebar for WooCommerce page','fruitshop'),
            ));

            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_image_size_list_product',
                'label'       => esc_html__('Custom image size product','fruitshop'),
                'type'        => 'text',
                'section'     => 'option_woo',
                'desc'=>esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).','fruitshop'),
            ));

            array_push($s7upf_config['theme-option']['settings'], array(
                    'id' => 'st_tab_product_page',
                    'type' => 'tab',
                    'section' => 'option_woo',
                    'label' => esc_html__('Product page','fruitshop')
                )
            );

            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_show_banner_product_detail',
                'label'       => esc_html__('Show banner','fruitshop'),
                'type'        => 'on-off',
                'section'     => 'option_woo',
                'desc'=>esc_html__('This allow you to show or hide Banner in detail products','fruitshop'),
                'std'=>'off'
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_banner_title_product_detail',
                'label'       => esc_html__('Title banner','fruitshop'),
                'type'        => 'text',
                'section'     => 'option_woo',
                'desc'=>esc_html__('Enter title banner','fruitshop'),
                'condition'   => 's7upf_show_banner_product_detail:is(on)',
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_banner_bg_product_detail',
                'label'       => esc_html__('Background banner','fruitshop'),
                'type'        => 'upload',
                'section'     => 'option_woo',
                'desc'=>esc_html__('Select image from library','fruitshop'),
                'condition'   => 's7upf_show_banner_product_detail:is(on)',
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_custom_image_size',
                'label'       => esc_html__('Custom image size product(Default 800x800)','fruitshop'),
                'type'        => 'text',
                'section'     => 'option_woo',
                'desc'=>esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).','fruitshop'),
            ));

            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_show_share_product_detail',
                'label'       => esc_html__('Show share product','fruitshop'),
                'type'        => 'on-off',
                'section'     => 'option_woo',
                'desc'=>esc_html__('This allow you to show or hide box share in product detail','fruitshop'),
                'std'=>'on'
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_sidebar_position_detail_product',
                'label'       => esc_html__('Sidebar Position WooCommerce page','fruitshop'),
                'type'        => 'select',
                'section'     => 'option_woo',
                'desc'=>esc_html__('Left, or Right, or Center','fruitshop'),
                'choices'     => array(
                    array(
                        'value'=>'no',
                        'label'=>esc_html__('No Sidebar','fruitshop'),
                    ),
                    array(
                        'value'=>'left',
                        'label'=>esc_html__('Left','fruitshop'),
                    ),
                    array(
                        'value'=>'right',
                        'label'=>esc_html__('Right','fruitshop'),
                    )
                )
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_sidebar_detail_product',
                'label'       => esc_html__('Sidebar select WooCommerce page','fruitshop'),
                'type'        => 'sidebar-select',
                'section'     => 'option_woo',
                'condition'   => 's7upf_sidebar_position_detail_product:not(no)',
                'desc'        => esc_html__('Choose one style of sidebar for WooCommerce page','fruitshop'),
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_header_product_detail',
                'label'       => esc_html__('Header Page','fruitshop'),
                'type'        => 'select',
                'section'     => 'option_woo',
                'choices'     => s7upf_list_header_page(),
                'desc'        => esc_html__('Select page to header in product detail','fruitshop'),
            ));

            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_footer_product_detail',
                'label'       => esc_html__('Footer Page','fruitshop'),
                'type'        => 'select',
                'section'     => 'option_woo',
                'choices'     => s7upf_list_footer_page(),
                'desc'        => esc_html__('Select page to footer in product detail','fruitshop'),
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_show_related_product_detail',
                'label'       => esc_html__('Show related  product','fruitshop'),
                'type'        => 'on-off',
                'section'     => 'option_woo',
                'desc'=>esc_html__('This allow you to show or hide related product in product detail','fruitshop'),
                'std'=>'on'
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_style_related_product',
                'label'       => esc_html__('Style related product','fruitshop'),
                'condition'   => 's7upf_show_related_product_detail:is(on)',
                'type'        => 'select',
                'section'     => 'option_woo',
                'desc'=>esc_html__('Select style','fruitshop'),
                'std'=>'slider',
                'choices'     => array(
                    array(
                        'value'=>'default',
                        'label'=>esc_html__('Default','fruitshop'),
                    ),
                    array(
                        'value'=>'slider',
                        'label'=>esc_html__('slider','fruitshop'),
                    ),
                )
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_title_related_product',
                'label'       => esc_html__('Title related product','fruitshop'),
                'type'        => 'text',
                'section'     => 'option_woo',
                'desc'        => esc_html__('This allows you to change the title related product.','fruitshop'),
                'condition'   => 's7upf_show_related_product_detail:is(on)',
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_number_related_product',
                'label'       => esc_html__('Number related product','fruitshop'),
                'type'        => 'numeric-slider',
                'min_max_step'=> '1,100,1',
                'section'     => 'option_woo',
                'desc'        => esc_html__('Number product to show in related products box.','fruitshop'),
                'condition'   => 's7upf_show_related_product_detail:is(on)',
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_show_up_sells_product_detail',
                'label'       => esc_html__('Show Up-sells product','fruitshop'),
                'type'        => 'on-off',
                'section'     => 'option_woo',
                'desc'=>esc_html__('This allow you to show or hide Up-sells product in product detail','fruitshop'),
                'std'=>'on'
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_style_up_sells_product',
                'label'       => esc_html__('Style Up-sells product','fruitshop'),
                'condition'   => 's7upf_show_up_sells_product_detail:is(on)',
                'type'        => 'select',
                'section'     => 'option_woo',
                'desc'=>esc_html__('Select style','fruitshop'),
                'std'=>'slider',
                'choices'     => array(
                    array(
                        'value'=>'default',
                        'label'=>esc_html__('Default','fruitshop'),
                    ),
                    array(
                        'value'=>'slider',
                        'label'=>esc_html__('slider','fruitshop'),
                    ),
                )
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_title_up_sells_product',
                'label'       => esc_html__('Title Up-sells product','fruitshop'),
                'type'        => 'text',
                'section'     => 'option_woo',
                'desc'        => esc_html__('This allows you to change the title Up-sells product.','fruitshop'),
                'condition'   => 's7upf_show_up_sells_product_detail:is(on)',
            ));

            array_push($s7upf_config['theme-option']['settings'], array(
                    'id' => 'st_tab_catalog',
                    'type' => 'tab',
                    'section' => 'option_woo',
                    'label' => esc_html__('Catalog Mode','fruitshop')
                )
            );
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 'woo_catelog',
                'label'       => esc_html__('Enable WooCommerce Catalog Mode','fruitshop'),
                'desc'        => esc_html__('This allows you enable Catalog Mode.','fruitshop'),
                'type'        => 'on-off',
                'section'     => 'option_woo',
                'std'         => 'off'
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 'hide_detail',
                'label'       => esc_html__('Hide "Add to cart" button','fruitshop'),
                'type'        => 'on-off',
                'desc'        => esc_html__('Hide in product detail page.','fruitshop'),
                'section'     => 'option_woo',
                'condition'   => 'woo_catelog:is(on)',
                'std'         => 'off'
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 'hide_other_page',
                'label'       => esc_html__('Hide "Add to cart" button','fruitshop'),
                'type'        => 'on-off',
                'desc'        => esc_html__('Hide in other shop pages.','fruitshop'),
                'section'     => 'option_woo',
                'condition'   => 'woo_catelog:is(on)',
                'std'         => 'off',
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 'hide_price',
                'label'       => esc_html__('Hide Price','fruitshop'),
                'desc'        => esc_html__('Hide the price of products in your shop and replace it with a text.','fruitshop'),
                'type'        => 'on-off',
                'section'     => 'option_woo',
                'condition'   => 'woo_catelog:is(on)',
                'std'         => 'off',
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 'text_price',
                'label'       => esc_html__('Alternative text','fruitshop'),
                'desc'        => esc_html__('This text will replace price.','fruitshop'),
                'type'        => 'text',
                'section'     => 'option_woo',
                'condition'   => 'hide_price:is(on)',
            ));

            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 'hide_admin',
                'label'       => esc_html__('Admin View','fruitshop'),
                'desc'        => esc_html__('Enable Catalog Mode also for administrators.','fruitshop'),
                'type'        => 'on-off',
                'section'     => 'option_woo',
                'condition'   => 'woo_catelog:is(on)',
                'std'         => 'off',
            ));

            array_push($s7upf_config['theme-option']['settings'], array(
                    'id' => 'st_tab_custom_button_catalog',
                    'type' => 'tab',
                    'section' => 'option_woo',
                    'label' => esc_html__('Custom button catalog','fruitshop'),
                )
            );
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 'show_button_catalog',
                'label'       => esc_html__('Show button catalog','fruitshop'),
                'type'        => 'on-off',
                'desc'        => esc_html__('Show in product details page.','fruitshop'),
                'section'     => 'option_woo',
                'condition'   => 'hide_detail:is(on)',
                'std'         => 'off',
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 'button_text_catalog',
                'label'       => esc_html__('Button text','fruitshop'),
                'type'        => 'text',
                'desc'        => esc_html__('Show in product details page.','fruitshop'),
                'section'     => 'option_woo',
                'condition'   => 'show_button_catalog:is(on),hide_detail:is(on)',
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 'url_protocol_type',
                'label'       => esc_html__('URL protocol type','fruitshop'),
                'type'        => 'select',
                'desc'        => esc_html__('Specify the type of the URL.','fruitshop'),
                'section'     => 'option_woo',
                'condition'   => 'show_button_catalog:is(on),hide_detail:is(on)',
                'choices'     => array(
                    array(
                        'value'=>'',
                        'label'=>esc_html__('Generic URL','fruitshop'),
                    ),
                    array(
                        'value'=>'email',
                        'label'=>esc_html__('E-Mail address','fruitshop'),
                    ),
                    array(
                        'value'=>'phone_number',
                        'label'=>esc_html__('Phone number','fruitshop'),
                    ),
                    array(
                        'value'=>'skype',
                        'label'=>esc_html__('Skype contact','fruitshop'),
                    ),
                )
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 'link_url_catalog',
                'label'       => esc_html__('Link URL','fruitshop'),
                'type'        => 'text',
                'desc'        => esc_html__('Specify the type URL.','fruitshop'),
                'section'     => 'option_woo',
                'condition'   => 'show_button_catalog:is(on),hide_detail:is(on)',
            ));
        }
    }
}
s7upf_set_theme_config();