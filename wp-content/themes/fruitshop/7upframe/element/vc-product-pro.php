<?php
/**
 * Created by PhpStorm.
 * User: uptheme
 * Date: 21/04/2017
 * Time: 09:58
 */
if ( !class_exists('WC_Product') ) {
    return;
}
if(!function_exists('s7upf_vc_products'))
{
    function s7upf_vc_products($attr)
    {
        $html = $style = $load_more_ajax=$word_excerpt=$style_nav_tab = $show_box_tab6=$title2_tab6=$button_tab6=$image_tab6 =$title_tab6=$text_color=$data_item_product =$load_more_ajax_tab=$col_layout_tab= $orderby_shop = $order_by_show =$bg_left = $bg_right =$extra_class = $max_width = $shadow_box_hover = $pull_product = $number_item_desktop_tab = $word_excerpt_tab = $style_layout = $add_item_tab = $data_item_tab = $position_tab_active = $tab_all = $pagination = $title = $btn_link = $animation_img = $number_item_product_col = $secondary_color = $class_secondary_color = $col_layout = $main_color = $class_main_color = $number_item_desktop = $autoplay = $product_number =$order = $image_size = $order_by =$product_category = $select_tab = $pro_sale=  $filter_type = $pro_feature = $max_price = $min_price = '';
        extract(shortcode_atts(array(
            'style'      => 'style1',
            'product_number'     => '12',
            'order_by' => 'date',
            'product_category' => '',
            'order' => 'DESC',
            'min_price'    => '',
            'max_price'    => '',
            'filter_type'    => '',
            'pro_feature'    => '',
            'pro_sale'    => '',
            'select_tab'    => '',
            'image_size'     => '',
            'word_excerpt'     => '30',
            'word_excerpt_tab'     => '30', //style 13
            'autoplay'     => 'true',
            'number_item_desktop'     => '',
            'col_layout'     => '',
            'main_color'     => '',
            'secondary_color'     => '',
            'animation_img'     => 'rotate-thumb',
            'number_item_product_col'     => '',
            'title'     => '',
            'btn_link'     => '', //style 4
            'pagination'     => '', //style 8,9
            'position_tab_active'     => 1, //style 12
            'tab_all'     => '', //style 12
            'add_item_tab'     => '', //style 13
            'style_layout'     => 'style1', //style 13
            'max_width'     => '', //style 13 - layout 2
            'number_item_desktop_tab'     => '', //style 13 - layout 2
            'pull_product'     => 'pull-left', //style 13 - layout 2
            'shadow_box_hover'     => '', //style 8
            'extra_class'     => '',
            'bg_left'     => '', //style 1
            'bg_right'     => '', //style 1
            'order_by_show'     => 'off', //style 8
            'col_layout_tab'     => '3', //style 13
            'load_more_ajax_tab'     => 'off', //style 13
            'add_item_product'     => '',//style 14
            'text_color'     => '', //style 14
            'show_box_tab6'     => 'off', //style 13 layout 6
            'image_tab6'     => '', //style 13 layout 6
            'title_tab6'     => '', //style 13 layout 6
            'title2_tab6'     => '', //style 13 layout 6
            'button_tab6'     => '', //style 13 layout 6
            'style_nav_tab'     => 'style1', //style 13 layout 3
            'load_more_ajax'     => 'off', //style 9
        ),$attr));
        $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
        if(!empty($add_item_tab))
            $data_item_tab = vc_param_group_parse_atts($add_item_tab);
        if(!empty($add_item_product))
            $data_item_product = vc_param_group_parse_atts($add_item_product);

        if ($order_by == 'popularity') {
            $args = array(
                'post_type' => 'product',
                'meta_key' => 'total_sales',
                'orderby' => 'meta_value_num',
                'post_status'    => 'publish',
                'paged'             => $paged,
                'order' => $order,
                'posts_per_page' => $product_number
            );
        } elseif ($order_by == 'rating') {
            $args = array(
                'post_type' => 'product',
                'post_status'    => 'publish',
                'posts_per_page' => $product_number,
                'meta_key' => '_wc_average_rating',
                'orderby'        => 'meta_value_num',
                'paged'             => $paged,
                'order'          => $order,
                'meta_query'     => WC()->query->get_meta_query(),
                'tax_query'      => WC()->query->get_tax_query(),
            );
            $args['meta_query'] = WC()->query->get_meta_query();
        } elseif ($order_by == 'mostview'){
            $args = array(
                'post_type' => 'product',
                'post_status'    => 'publish',
                'posts_per_page' => $product_number,
                'meta_key'           => 'post_views',
                'order'             => $order,
                'orderby'             => 'meta_value_num',
            );
        } elseif ($order_by == 'price'){
            $args['orderby']  = "meta_value_num ID";
            $args['order']    = $order;
            $args['meta_key'] = '_price';
        }  else {
            $args = array(
                'post_type' => 'product',
                'post_status'    => 'publish',
                'orderby' => $order_by,
                'order' => $order,
                'posts_per_page' => $product_number,
                'paged'             => $paged,
            );
        }
        if(isset($_GET['orderby'])){
            $orderby_shop = $_GET['orderby'];
        }
        switch ($orderby_shop) {
            case 'price' :
                $args['orderby']  = "meta_value_num ID";
                $args['order']    = 'ASC';
                $args['meta_key'] = '_price';
                break;

            case 'price-desc' :
                $args['orderby']  = "meta_value_num ID";
                $args['order']    = 'DESC';
                $args['meta_key'] = '_price';
                break;

            case 'popularity' :
                $args['meta_key'] = 'total_sales';
                $args['order']    = 'DESC';
                add_filter( 'posts_clauses', array( WC()->query, 'order_by_popularity_post_clauses' ) );
                break;

            case 'rating' :
                $args['meta_key'] = '_wc_average_rating';
                $args['orderby'] = 'meta_value_num';
                $args['order'] = 'DESC';
                $args['meta_query'] = WC()->query->get_meta_query();
                $args['tax_query'][] = WC()->query->get_tax_query();
                break;

            case 'date':
                $args['orderby'] = 'date';
                $args['order'] = 'DESC';
                break;

            case 'mostview':
                $args = array(
                    'post_type' => 'product',
                    'post_status'    => 'publish',
                    'posts_per_page' => $product_number,
                    'meta_key'           => 'post_views',
                    'order'             => 'DESC',
                    'orderby'             => 'meta_value_num',
                );
                break;

            case 'rand':
                $args = array(
                    'post_type' => 'product',
                    'post_status'    => 'publish',
                    'orderby' => 'rand',
                    'posts_per_page' => $product_number,
                    'paged'             => $paged,
                );
                break;

            case 'author':
                $args = array(
                    'post_type' => 'product',
                    'post_status'    => 'publish',
                    'orderby' => 'author',
                    'posts_per_page' => $product_number,
                    'paged'             => $paged,
                );
                break;

            case 'comment_count':
                $args = array(
                    'post_type' => 'product',
                    'post_status'    => 'publish',
                    'orderby' => 'comment_count',
                    'posts_per_page' => $product_number,
                    'paged'             => $paged,
                );
                break;

            case 'title':
                $args = array(
                    'post_type' => 'product',
                    'post_status'    => 'publish',
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'posts_per_page' => $product_number,
                    'paged'             => $paged,
                );
                break;

            default:
                $args= $args;
                break;
        }
// filter by category
        if (!empty($product_category)) {
            $list_cat = explode(",", $product_category);
            if ($list_cat[0] != '') {
                $args['tax_query'][] = array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => $list_cat,
                );
            }
        }

// Filter product by feature
        if ($pro_feature == 'yes') {
            $args['tax_query'][] = array(
                'taxonomy' => 'product_visibility',
                'field'    => 'name',
                'terms'    => 'featured',
                'operator' => 'IN',
            );
        }

//filter by pride
        $arr_post_in = array();
        if ($filter_type == 'price') {
            $arr_price = s7upf_price_filter($min_price, $max_price);
            if(count($arr_price)>0)
                $arr_post_in = array_merge($arr_post_in, $arr_price);

        }
        if ($pro_sale == 'yes') {

            if(count($arr_post_in)>0  or $filter_type == 'price') {
                $arr_post_in = array_intersect($arr_post_in, wc_get_product_ids_on_sale());

            }else{
                $arr_post_in = array_merge($arr_post_in, wc_get_product_ids_on_sale());
            }
        }
        if ($filter_type == 'browse') {
            if (isset($_COOKIE['sv_pro_cookie'])) {
                $pro_cookie = explode(',', $_COOKIE['sv_pro_cookie']);
                if (count($pro_cookie) > 0 ) {
                    if(count($arr_post_in)>0 or $pro_sale == 'yes' )
                        $arr_post_in = array_intersect($arr_post_in, $pro_cookie);
                    else
                        $arr_post_in = array_merge($arr_post_in, $pro_cookie);
                } else {
                    $html .= esc_html__('You have not viewed any products.', 'fruitshop');
                    wp_reset_postdata();
                    return $html;
                }
            } else {
                $html .= esc_html__('You have not viewed any products.', 'fruitshop');
                wp_reset_postdata();
                return $html;
            }
        }

        if(($filter_type == 'price' or $pro_sale == 'yes' or $filter_type == 'browse') and count($arr_post_in) < 1 ){
            $arr_post_in[0] = '-1';
            $args['post__in'] = array_unique($arr_post_in);
        }else{
            $args['post__in'] = array_unique($arr_post_in);
        }
        $pro_query = new WP_Query($args);
        $default_image = get_template_directory_uri().'/assets/images/placeholder.png';
        //check main color
        if(!empty($main_color)){
            $class_main_color = S7upf_Assets::build_css('color:'.$main_color.';', ' div.product span.price');
            $class_main_color .= ' '.S7upf_Assets::build_css('background:'.$main_color.'; border-color:'.$main_color.';', ' .owl-theme .owl-controls .owl-buttons div:hover');
            $class_main_color .= ' '.S7upf_Assets::build_css('color:'.$main_color.';', ' .product-title a:hover');
            $class_main_color .= ' '.S7upf_Assets::build_css('background:'.$main_color.';', ' a.button');
            $class_main_color .= ' '.S7upf_Assets::build_css('color:'.$main_color.'; border-color:'.$main_color.';', ' .product-extra-link .mb-wishlist:hover');
            $class_main_color .= ' '.S7upf_Assets::build_css('color:'.$main_color.'; border-color:'.$main_color.';', ' .product-extra-link .mb-compare:hover');
            $class_main_color .= ' '.S7upf_Assets::build_css('background:'.$main_color.';', ' .quickview-link');
            $class_main_color .= ' '.S7upf_Assets::build_css('border-color:'.$main_color.'; color:'.$main_color.';', ' .deal-timer');
        }
        if(!empty($secondary_color)){
            $class_secondary_color = S7upf_Assets::build_css('background:'.$secondary_color.';', ' .product-thumb > .quickview-link:hover');
            $class_secondary_color .= ' '.S7upf_Assets::build_css('background:'.$secondary_color.';', '  a.button:hover');
        }
        if($style == 'style4' and !empty($main_color)){
            $class_main_color .= ' '.S7upf_Assets::build_css('color:'.$main_color.';', ' a.button');
            $class_main_color .= ' '.S7upf_Assets::build_css('color:'.$main_color.';', ' a.button:hover');
            $class_main_color .= ' '.S7upf_Assets::build_css('border-color:'.$main_color.'; color:'.$main_color.';', ' .view-all-product .btn-arrow');
            $class_main_color .= ' '.S7upf_Assets::build_css('background:'.$main_color.'; ', ' .view-all-product .btn-arrow.style2::after');
            $class_main_color .= ' '.S7upf_Assets::build_css('background:'.$main_color.'; color:#fff;', ' .view-all-product .btn-arrow.color:hover');
        }
        if($style == 'style5' and !empty($main_color)){
            $class_main_color .= ' '.S7upf_Assets::build_css('color:'.$main_color.';', ' .product-in-cat a:hover');
        }
        if($style == 'style6' and !empty($main_color)){
            $class_main_color .= ' '.S7upf_Assets::build_css('color:'.$main_color.';', ' a.button');
            $class_main_color .= ' '.S7upf_Assets::build_css('color:'.$main_color.';', ' a.button:hover');
            $class_main_color .= ' '.S7upf_Assets::build_css('border-color:'.$main_color.'; color:'.$main_color.';', ' .view-all-product .btn-arrow');
            $class_main_color .= ' '.S7upf_Assets::build_css('background:'.$main_color.'; ', ' .view-all-product .btn-arrow.style2::after');
            $class_main_color .= ' '.S7upf_Assets::build_css('background:'.$main_color.'; color:#fff;', ' .view-all-product .btn-arrow.color:hover');
        }
        if($style == 'style9' and !empty($main_color)){
            $class_main_color .= ' '.S7upf_Assets::build_css('color:'.$main_color.';', ' .product-in-cat a:hover');
        }
        if($style == 'style12' and !empty($main_color)){
            $class_main_color .= ' '.S7upf_Assets::build_css('background:'.$main_color.'; border-color:'.$main_color.'; color:#fff;', ' .title-tab1 li.active a');
            $class_main_color .= ' '.S7upf_Assets::build_css('color:'.$main_color.';', ' .title-tab1 li a:hover');
            $class_main_color .= ' '.S7upf_Assets::build_css('color:#fff;', ' .title-tab1 li.active a:hover');
        }
        if($style == 'style13'){
            $class_main_color .= ' '.S7upf_Assets::build_css('color:'.$main_color.';', ' .product-in-cat a:hover');
            $class_main_color .= ' '.S7upf_Assets::build_css('border-color:'.$main_color.';', ' .title-tab-icon li a');
            $class_main_color .= ' '.S7upf_Assets::build_css('background-color:'.$main_color.';', ' .title-tab-icon li.active a');
            $class_main_color .= ' '.S7upf_Assets::build_css('background-color:'.$main_color.';', ' .title-tab-icon li a:hover');
            $class_main_color .= ' '.S7upf_Assets::build_css('color:'.$main_color.';', ' .title-tab1 li a:hover');
            $class_main_color .= ' '.S7upf_Assets::build_css('background-color:'.$main_color.'; border-color:'.$main_color.'; color:#fff;', ' .title-tab1 li.active a');
            $class_main_color .= ' '.S7upf_Assets::build_css('border-color:'.$main_color.'; color:'.$main_color.';', ' .btn-arrow.color');
            $class_main_color .= ' '.S7upf_Assets::build_css('background-color:'.$main_color.'; color:#fff;', ' .btn-arrow.color:hover');

            $class_secondary_color .= ' '.S7upf_Assets::build_css('background-color:'.$secondary_color.';', '  .title-tab-layout2 li::after');
            if($style_layout == 'style1' and !empty($secondary_color)){
                $class_secondary_color .= ' '.S7upf_Assets::build_css('color:'.$secondary_color.';', '  .color2');

            }
            if($max_width!=='') $class_main_color .=  ' '.S7upf_Assets::build_css('max-width:'.$max_width.'px;');
            $class_main_color .= ' '.S7upf_Assets::build_css('color:'.$main_color.';', ' .product-title .color');
            $class_main_color .= ' '.S7upf_Assets::build_css('color:'.$main_color.';', ' .title-tab-icon3 a:hover');
            $class_main_color .= ' '.S7upf_Assets::build_css('color:'.$main_color.';', ' .title-tab-icon3 li.active a');
        }
        //Check button
        if(!empty($btn_link)){
            $btn_link = vc_build_link($btn_link);
        }
        //Check style
        $html .= S7upf_Template::load_view('elements/products/product', $style, array(
            'image_size' => $image_size,
            'pro_query' => $pro_query,
            'word_excerpt' => $word_excerpt,//style 1, 10
            'default_image' => $default_image,
            'autoplay' => $autoplay,
            'number_item_desktop' => $number_item_desktop,
            'col_layout' => $col_layout,
            'class_main_color' => $class_main_color,
            'class_secondary_color' => $class_secondary_color,
            'animation_img' => $animation_img,
            'number_item_product_col' => $number_item_product_col, //style 4,5,6
            'title' => $title, //style 4,5,6
            'btn_link' => $btn_link, //style 4
            'pagination' => $pagination, //style 8,9
            'paged'        => $paged, //style 8,9
            'product_category'        => $product_category, //style 12
            'args'        => $args, //style 12
            'position_tab_active'        => $position_tab_active, //style 12
            'tab_all'        => $tab_all, //style 12
            'data_item_tab'        => $data_item_tab, //style 13
            'style_layout'        => $style_layout, //style 13
            'word_excerpt_tab'        => $word_excerpt_tab, //style 13 - layout style2
            'number_item_desktop_tab'        => $number_item_desktop_tab, //style 13 -layout style 1,2,4
            'pull_product'        => $pull_product, //style 13 -layout style 2
            'shadow_box_hover'        => $shadow_box_hover, //style 8
            'bg_right'        => $bg_right, //style 1
            'bg_left'        => $bg_left, //style 1
            'extra_class'        => $extra_class,
            'orderby_shop'        => $orderby_shop,//style 8
            'order_by_show'        => $order_by_show,//style 8
            'col_layout_tab'        => $col_layout_tab,//style 13
            'load_more_ajax_tab'        => $load_more_ajax_tab, //style 13
            'data_item_product'        => $data_item_product, //style 14
            'text_color'        => $text_color, //style 14
            'show_box_tab6'        => $show_box_tab6, //style 13 layout 6
            'image_tab6'        => $image_tab6, //style 13 layout 6
            'title_tab6'        => $title_tab6, //style 13 layout 6
            'title2_tab6'        => $title2_tab6, //style 13 layout 6
            'button_tab6'        => $button_tab6, //style 13 layout 6
            'load_more_ajax'        => $load_more_ajax, //style 13 layout 6
            'pro_feature'        => $pro_feature, //style 9 ajax
            'pro_sale'        => $pro_sale, //style 9 ajax
            'product_number'        => $product_number, //style 9 ajax
            'order'        => $order, //style 9 ajax
            'order_by'        => $order_by, //style 9 ajax
            'style_nav_tab'        => $style_nav_tab, //style 9 ajax
        ));
        wp_reset_postdata();
        return $html;
    }
}
stp_reg_shortcode('s7upf_products','s7upf_vc_products');
add_action( 'vc_before_init_base','s7upf_sv_add_category_product_element',10,100 );
if ( ! function_exists( 's7upf_sv_add_category_product_element' ) ) {
    function s7upf_sv_add_category_product_element()
    {
        vc_map(array(
            'name' => esc_html__('SV Products', 'fruitshop'),
            'base' => 's7upf_products',
            'category' => '7Up-theme',
            'icon' => 'icon-st',
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'admin_label' => true,
                    'heading' => esc_html__('Style element', 'fruitshop'),
                    'param_name' => 'style',
                    'description' => esc_html__('Select style', 'fruitshop'),
                    'value' => array(
                        esc_html__('Style 1A (Slider)', 'fruitshop') => 'style1',
                        esc_html__('Style 1B (Slider)', 'fruitshop') => 'style1b',
                        esc_html__('Style 2 (Slider)', 'fruitshop') => 'style2',
                        esc_html__('Style 3 (Slider)', 'fruitshop') => 'style3',
                        esc_html__('Style 4 (Slider)', 'fruitshop') => 'style4',
                        esc_html__('Style 5 (Slider)', 'fruitshop') => 'style5',
                        esc_html__('Style 6 (Slider)', 'fruitshop') => 'style6',
                        esc_html__('Style 7 (Slider)', 'fruitshop') => 'style7',
                        esc_html__('Style 8 (Grid default)', 'fruitshop') => 'style8',
                        esc_html__('Style 9 (Grid)', 'fruitshop') => 'style9',
                        esc_html__('Style 10 (List default)', 'fruitshop') => 'style10',
                        esc_html__('Style 11 (List)', 'fruitshop') => 'style11',
                        esc_html__('Style 12 (Tab categories)', 'fruitshop') => 'style12',
                        esc_html__('Style 13 (Tab PRO)', 'fruitshop') => 'style13',
                        esc_html__('Style 14 (Custom slider) new*', 'fruitshop') => 'style14',
                        esc_html__('Style 15 (Custom slider) new*', 'fruitshop') => 'style15',
                    ),
                ),
                array(
                    'type' => 's7up_image_check',
                    'param_name' => 'style_product',
                    'heading' => '',
                    'element' => 'style',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title element', 'fruitshop'),
                    'param_name' => 'title',
                    'description' => esc_html__('Enter text', 'fruitshop'),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1','style1b','style4','style5','style6','style7','style11','style12','style13','style14')
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'admin_label' => true,
                    'heading' => esc_html__('Style layout', 'fruitshop'),
                    'param_name' => 'style_layout',
                    'description' => esc_html__('Select style', 'fruitshop'),
                    'value' => array(
                        esc_html__('Classic 1', 'fruitshop') => 'style1',
                        esc_html__('Classic 2', 'fruitshop') => 'style2',
                        esc_html__('Classic 3', 'fruitshop') => 'style3',
                        esc_html__('Classic 4', 'fruitshop') => 'style4',
                        esc_html__('Classic 5 (New)', 'fruitshop') => 'style5',
                        esc_html__('Classic 6 (New)', 'fruitshop') => 'style6'
                    ),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style13')
                    ),
                ),

                array(
                    'type' => 'param_group',
                    'heading' => esc_html__('Add tab item', 'fruitshop'),
                    'param_name' => 'add_item_tab',
                    'value' =>'',
                    'params' => array(
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__( 'Title tab', 'fruitshop' ),
                            'param_name' => 'title',
                            'admin_label' => true,
                            'description' => esc_html__('Enter text.','fruitshop'),
                        ),
                        array(
                            'type' => 'attach_image',
                            'heading' => esc_html__( 'Title icon (Size 40x34)', 'fruitshop' ),
                            'param_name' => 'title_icon',
                            'description' => esc_html__('Select image from library.','fruitshop'),
                        ),
                        array(
                            'type' => 's7up_number',
                            'heading' => esc_html__('Number Products', 'fruitshop'),
                            'param_name' => 'product_number',
                            'min' => 1,
                            'value'=> 12,
                            'suffix' => esc_html__('product', 'fruitshop'),
                            'description' => esc_html__('Enter a number to show product in page', 'fruitshop'),

                        ),
                        array(
                            'type' => 'checkbox',
                            'heading' => esc_html__('Product Featured', 'fruitshop'),
                            'param_name' => 'pro_feature',
                            'edit_field_class' => 'vc_column vc_col-sm-6',
                            'std' => 'no',
                            'description' => esc_html__('Check the box to filter products is feature', 'fruitshop'),
                            'value' => array(
                                esc_html__('Product featured', 'fruitshop') => 'yes'
                            ),
                        ),
                        array(
                            'type' => 'checkbox',
                            'heading' => esc_html__('Products On Sale', 'fruitshop'),
                            'param_name' => 'pro_sale',
                            'value' => array(
                                esc_html__('Product On Sale', 'fruitshop') => 'yes'
                            ),
                            'std' => 'no',
                            'edit_field_class' => 'vc_column vc_col-sm-6',
                            'description' => esc_html__('Check the box to filter products is on sale', 'fruitshop')
                        ),
                        array(
                            'type' => 'checkbox',
                            'holder' => 'div',
                            'heading' => esc_html__('Select Categories', 'fruitshop'),
                            'param_name' => 'product_category',
                            'description' => esc_html__('Check the box to choose category', 'fruitshop'),
                            'value' => s7upf_list_taxonomy('product_cat',false),
                            'edit_field_class' => 's7upf-category-option vc_col-sm-12',
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Order By', 'fruitshop'),
                            'param_name' => 'order_by',
                            'value' => s7upf_convert_array(s7upf_get_order_list_shop()),
                            'edit_field_class' => 'vc_col-sm-6',
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Order', 'fruitshop'),
                            'param_name' => 'order',
                            'value' => array(
                                esc_html__("Descending", 'fruitshop') => 'DESC',
                                esc_html__("Ascending", 'fruitshop') => 'ASC'
                            ),
                            'edit_field_class' => 'vc_col-sm-6',
                        ),
                        array(
                            'type' => 'vc_link',
                            'heading' => esc_html__('Add button view all', 'fruitshop'),
                            'param_name' => 'btn_link',
                            'edit_field_class' => 'vc_col-sm-12',
                        ),
                    ),
                    'callbacks' => array(
                        'after_add' => 'vcChartParamAfterAddCallback'
                    ),
                    'dependency'    =>array(
                        'element'   =>'style',
                        'value'     =>array('style13')
                    ),
                ),
                array(
                    'type' => 's7up_number',
                    'heading' => esc_html__('Number Products', 'fruitshop'),
                    'param_name' => 'product_number',
                    'min' => 1,
                    'value'=> 12,
                    'suffix' => esc_html__('product', 'fruitshop'),
                    'description' => esc_html__('Enter a number to show product in page', 'fruitshop'),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1','style1b','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12')
                    ),

                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Filter Type', 'fruitshop'),
                    'param_name' => 'filter_type',
                    'value' => array(
                        esc_html__('None', 'fruitshop') => '',
                        esc_html__('Filter By Price', 'fruitshop') => 'price',
                        esc_html__('Browse History', 'fruitshop') => 'browse'
                    ),
                    'description' => esc_html__('Select a filter type', 'fruitshop'),
                    'std' => '',
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1','style1b','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12')
                    ),
                ),
                array(
                    'type' => 's7up_number',
                    'min' => 0,
                    'max' => 999999999,
                    'heading' => esc_html__('Min Price (*)', 'fruitshop'),
                    'param_name' => 'min_price',
                    'suffix'    => get_woocommerce_currency_symbol(),
                    'description' => esc_html__('Enter a min price', 'fruitshop'),
                    'dependency' => array(
                        'element' => 'filter_type',
                        'value' => array('price')
                    ),
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                    'dependency' => array(
                        'element' => 'filter_type',
                        'value' => array('price')
                    ),
                ),
                array(
                    'type' => 's7up_number',
                    'min' => 0,
                    'max' => 999999999,
                    'heading' => esc_html__('Max Price (*)', 'fruitshop'),
                    'param_name' => 'max_price',
                    'suffix'    => get_woocommerce_currency_symbol(),
                    'description' => esc_html__('Enter a max price', 'fruitshop'),
                    'dependency' => array(
                        'element' => 'filter_type',
                        'value' => array('price')
                    ),
                    'edit_field_class' => 'vc_column vc_col-sm-6'
                ),
                array(
                    'type' => 'checkbox',
                    'heading' => esc_html__('Product Featured', 'fruitshop'),
                    'param_name' => 'pro_feature',
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                    'std' => 'no',
                    'description' => esc_html__('Check the box to filter products is feature', 'fruitshop'),
                    'value' => array(
                        esc_html__('Product featured', 'fruitshop') => 'yes'
                    ),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1','style1b','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12')
                    ),

                ),
                array(
                    'type' => 'checkbox',
                    'heading' => esc_html__('Products On Sale', 'fruitshop'),
                    'param_name' => 'pro_sale',
                    'value' => array(
                        esc_html__('Product On Sale', 'fruitshop') => 'yes'
                    ),
                    'std' => 'no',
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1','style1b','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12')
                    ),
                    'description' => esc_html__('Check the box to filter products is on sale', 'fruitshop')
                ),
                array(
                    'type' => 'checkbox',
                    'holder' => 'div',
                    'heading' => esc_html__('Select Categories', 'fruitshop'),
                    'param_name' => 'product_category',
                    'description' => esc_html__('Check the box to choose category', 'fruitshop'),
                    'value' => s7upf_list_taxonomy('product_cat',false),
                    'edit_field_class' => 's7upf-category-option vc_col-sm-12',
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1','style1b','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12')
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Order By', 'fruitshop'),
                    'param_name' => 'order_by',
                    'value' => s7upf_convert_array(s7upf_get_order_list_shop()),
                    'edit_field_class' => 'vc_col-sm-6',
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1','style1b','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12')
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Order', 'fruitshop'),
                    'param_name' => 'order',
                    'value' => array(
                        esc_html__("Descending", 'fruitshop') => 'DESC',
                        esc_html__("Ascending", 'fruitshop') => 'ASC'
                    ),
                    'edit_field_class' => 'vc_col-sm-6',
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1','style1b','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12')
                    ),
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__('Add button view all', 'fruitshop'),
                    'param_name' => 'btn_link',
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style4')
                    ),
                    'edit_field_class' => 'vc_col-sm-12',
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Pagination bar', 'fruitshop'),
                    'param_name' => 'pagination',
                    'description' => esc_html__( 'This allows you to hide or show the pagination bar.', 'fruitshop' ),
                    'value' => array(
                        esc_html__("Off", 'fruitshop') => '',
                        esc_html__("On", 'fruitshop') => 'on'
                    ),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style8','style9','style10')
                    ),
                ),
                //style 14
                array(
                    'type' => 'param_group',
                    'heading' => esc_html__('Add product item', 'fruitshop'),
                    'param_name' => 'add_item_product',
                    'value' =>'',
                    'params' => array(
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__( 'Title product', 'fruitshop' ),
                            'param_name' => 'title',
                            'admin_label' => true,
                            'description' => esc_html__('Enter text.','fruitshop'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__( 'Regular price', 'fruitshop' ),
                            'param_name' => 'regular_price',
                            'description' => esc_html__('Enter regular price (Ex: $50).','fruitshop'),
                            'edit_field_class' => 'vc_col-sm-6',
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__( 'Sale price', 'fruitshop' ),
                            'param_name' => 'sale_price',
                            'description' => esc_html__('Enter sale price (Ex: $30).','fruitshop'),
                            'edit_field_class' => 'vc_col-sm-6',
                        ),
                        array(
                            'type' => 'attach_image',
                            'heading' => esc_html__( 'Product image', 'fruitshop' ),
                            'param_name' => 'image',
                            'description' => esc_html__('Select image from library.','fruitshop'),
                        ),
                        array(
                            'type' => 'vc_link',
                            'heading' => esc_html__('Add button read more', 'fruitshop'),
                            'param_name' => 'btn_link',
                            'edit_field_class' => 'vc_col-sm-12',
                        ),
                    ),
                    'callbacks' => array(
                        'after_add' => 'vcChartParamAfterAddCallback'
                    ),
                    'dependency'    =>array(
                        'element'   =>'style',
                        'value'     =>array('style14','style15')
                    ),
                ),

                //-------------------Box layout tab 6 Option----------------
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Show box banner', 'fruitshop'),
                    'group' => esc_html__('Box Banner','fruitshop'),
                    'param_name' => 'show_box_tab6',
                    'value' => array(
                        esc_html__('Off', 'fruitshop') => 'off',
                        esc_html__('On', 'fruitshop') => 'on',
                    ),
                    'edit_field_class' => 'vc_col-sm-12',
                    'dependency' => array(
                        'element' => 'style_layout',
                        'value' => array('style6')
                    )
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Image banner', 'fruitshop' ),
                    'group' => esc_html__('Box Banner','fruitshop'),
                    'param_name' => 'image_tab6',
                    'description' => esc_html__('Select image from library.','fruitshop'),
                    'dependency' => array(
                        'element' => 'show_box_tab6',
                        'value' => array('on')
                    )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title', 'fruitshop' ),
                    'group' => esc_html__('Box Banner','fruitshop'),
                    'param_name' => 'title_tab6',
                    'description' => esc_html__('Enter text','fruitshop'),
                    'dependency' => array(
                        'element' => 'show_box_tab6',
                        'value' => array('on')
                    )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title 2', 'fruitshop' ),
                    'group' => esc_html__('Box Banner','fruitshop'),
                    'param_name' => 'title2_tab6',
                    'description' => esc_html__('Enter text','fruitshop'),
                    'dependency' => array(
                        'element' => 'show_box_tab6',
                        'value' => array('on')
                    )
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'Button', 'fruitshop' ),
                    'group' => esc_html__('Box Banner','fruitshop'),
                    'param_name' => 'button_tab6',
                    'dependency' => array(
                        'element' => 'show_box_tab6',
                        'value' => array('on')
                    )
                ),
                //-------------------Design Option----------------
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Show bar order by', 'fruitshop'),
                    'group' => esc_html__('Design Option','fruitshop'),
                    'param_name' => 'order_by_show',
                    'value' => array(
                        esc_html__('Off', 'fruitshop') => 'off',
                        esc_html__('On', 'fruitshop') => 'on',
                    ),
                    'edit_field_class' => 'vc_col-sm-12',
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style8','style10')
                    )
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Show tab All', 'fruitshop'),
                    'param_name' => 'tab_all',
                    'value' => array(
                        esc_html__("Off", 'fruitshop') => '',
                        esc_html__("On", 'fruitshop') => 'on'
                    ),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style12')
                    ),
                    'edit_field_class' => 'vc_col-sm-12',
                    'group' => esc_html__('Design Option','fruitshop'),
                ),
                array(
                    'type' => 's7up_number',
                    'heading' => esc_html__('Position tab active', 'fruitshop'),
                    'param_name' => 'position_tab_active',
                    'description' => esc_html__( 'Select the active tab position (From left to right)', 'fruitshop' ),
                    'std' => 1,
                    'min' => 1,
                    'suffix' => esc_html__('Position', 'fruitshop'),
                    'edit_field_class' => 'vc_col-sm-12',
                    'group' => esc_html__('Design Option','fruitshop'),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style12','style13')
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Style navigation tab', 'fruitshop'),
                    'param_name' => 'style_nav_tab',
                    'group' => esc_html__('Design Option','fruitshop'),
                    'description' => esc_html__( 'Select style', 'fruitshop' ),
                    'value' => array(
                        esc_html__('Style 1','fruitshop')=>'style1',
                        esc_html__('Style 2','fruitshop')=>'style2',
                    ),
                    'dependency'    =>array(
                        'element'   =>'style_layout',
                        'value'     =>array('style3')
                    ),
                ),

                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Column layout', 'fruitshop'),
                    'param_name' => 'col_layout',
                    'group' => esc_html__('Design Option','fruitshop'),
                    'description' => esc_html__( 'This allows you to change the number column of the product grid.', 'fruitshop' ),
                    'value' => array(
                        esc_html__('Default','fruitshop')=>'',
                        esc_html__('4 columns','fruitshop')=>'3',
                        esc_html__('3 columns','fruitshop')=>'4',
                        esc_html__('2 columns','fruitshop')=>'6',
                        esc_html__('1 column','fruitshop')=>'12',
                    ),
                    'dependency'    =>array(
                        'element'   =>'style',
                        'value'     =>array('style8','style9')
                    ),
                ),

                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Column layout', 'fruitshop'),
                    'param_name' => 'col_layout_tab',
                    'group' => esc_html__('Design Option','fruitshop'),
                    'description' => esc_html__( 'This allows you to change the number column of the product grid.', 'fruitshop' ),
                    'value' => array(
                        esc_html__('4 columns','fruitshop')=>'3',
                        esc_html__('3 columns','fruitshop')=>'4',
                        esc_html__('2 columns','fruitshop')=>'6',
                        esc_html__('1 column','fruitshop')=>'12',
                    ),
                    'dependency'    =>array(
                        'element'   =>'style_layout',
                        'value'     =>array('style5')
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Show load more ajax', 'fruitshop'),
                    'param_name' => 'load_more_ajax_tab',
                    'group' => esc_html__('Design Option','fruitshop'),
                    'value' => array(
                        esc_html__('Off','fruitshop')=>'off',
                        esc_html__('On','fruitshop')=>'on',
                    ),
                    'dependency'    =>array(
                        'element'   =>'style_layout',
                        'value'     =>array('style5')
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Show load more ajax', 'fruitshop'),
                    'param_name' => 'load_more_ajax',
                    'group' => esc_html__('Design Option','fruitshop'),
                    'value' => array(
                        esc_html__('Off','fruitshop')=>'off',
                        esc_html__('On','fruitshop')=>'on',
                    ),
                    'dependency'    =>array(
                        'element'   =>'style',
                        'value'     =>array('style9')
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'admin_label' => true,
                    'group' => esc_html__('Design Option','fruitshop'),
                    'heading' => esc_html__( 'Custom column Slider in (Display desktop)', 'fruitshop' ),
                    'param_name' => 'number_item_desktop',
                    'value' => array(
                        esc_html__('Default','fruitshop')=>'',
                        esc_html__('1 Column','fruitshop')=>'1',
                        esc_html__('2 Columns','fruitshop')=>'2',
                        esc_html__('3 Columns','fruitshop')=>'3',
                        esc_html__('4 Columns','fruitshop')=>'4',
                        esc_html__('5 Columns','fruitshop')=>'5',
                    ),
                    'dependency'    =>array(
                        'element'   =>'style',
                        'value' => array('style1','style2','style3','style4','style5','style6','style7','style12','style14','style15')
                    ),
                    'description' => esc_html__( 'Select number column of slides to display (990px screen).', 'fruitshop' )
                ),
                array(
                    'type' => 'dropdown',
                    'admin_label' => true,
                    'group' => esc_html__('Design Option','fruitshop'),
                    'heading' => esc_html__( 'Custom column Slider in (Display desktop)', 'fruitshop' ),
                    'param_name' => 'number_item_desktop_tab',
                    'value' => array(
                        esc_html__('Default','fruitshop')=>'',
                        esc_html__('1 Column','fruitshop')=>'1',
                        esc_html__('2 Columns','fruitshop')=>'2',
                        esc_html__('3 Columns','fruitshop')=>'3',
                        esc_html__('4 Columns','fruitshop')=>'4',
                        esc_html__('5 Columns','fruitshop')=>'5',
                    ),
                    'dependency'    =>array(
                        'element'   =>'style_layout',
                        'value' => array('style1','style2','style4')
                    ),
                    'description' => esc_html__( 'Select number column of slides to display (990px screen).', 'fruitshop' )
                ),
                array(
                    'type' => 'dropdown',
                    'admin_label' => true,
                    'group' => esc_html__('Design Option','fruitshop'),
                    'heading' => esc_html__( 'Custom number product in 1 column of Slider', 'fruitshop' ),
                    'param_name' => 'number_item_product_col',
                    'value' => array(
                        esc_html__('Default','fruitshop')=>'',
                        esc_html__('1 product','fruitshop')=>1,
                        esc_html__('2 products','fruitshop')=>2,
                        esc_html__('3 products','fruitshop')=>3,
                        esc_html__('4 products','fruitshop')=>4,
                        esc_html__('5 products','fruitshop')=>5,
                        esc_html__('6 products','fruitshop')=>6,
                        esc_html__('7 products','fruitshop')=>7,
                        esc_html__('8 products','fruitshop')=>8,
                    ),
                    'dependency'    =>array(
                        'element'   =>'style',
                        'value' => array('style4','style5','style6')
                    ),

                ),
                array(
                    'type' => 'dropdown',
                    'group' => esc_html__('Design Option','fruitshop'),
                    'heading' => esc_html__( 'Auto play silder', 'fruitshop' ),
                    'param_name' => 'autoplay',
                    'dependency'    =>array(
                        'element'   =>'style',
                        'value' => array('style1','style2','style3','style4','style5','style6','style7','style14','style15')
                    ),
                    'value' => array(
                        esc_html__('On','fruitshop') => 'true',
                        esc_html__('Off','fruitshop') => 'false',

                    ),
                    'description' => esc_html__( 'This allows you to enable or disable autoplay of slider.', 'fruitshop' )
                ),
                array(
                    'type' => 'dropdown',
                    'group' => esc_html__('Design Option','fruitshop'),
                    'heading' => esc_html__( 'Animation image', 'fruitshop' ),
                    'param_name' => 'animation_img',
                    'value' => array(
                        esc_html__('Rotate','fruitshop') => 'rotate-thumb',
                        esc_html__('Zoom out','fruitshop') => 'zoomout-thumb',
                        esc_html__('Zoom','fruitshop') => 'zoom-thumb',
                    ),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1','style1b','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12','style13')
                    ),
                    'description' => esc_html__( 'This allows you to change animation image product.', 'fruitshop' )
                ),
                array(
                    'type' => 's7up_number',
                    'heading' => esc_html__('Number word excerpt', 'fruitshop'),
                    'param_name' => 'word_excerpt',
                    'group' => esc_html__('Design Option','fruitshop'),
                    'min' => 1,
                    'value'=>30,
                    'suffix' => esc_html__('word', 'fruitshop'),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1','style1b','style10')
                    ),
                    'description' => esc_html__('Custom number word excerpt (default 30 word)', 'fruitshop')
                ),
                array(
                    'type' => 's7up_number',
                    'heading' => esc_html__('Number word excerpt', 'fruitshop'),
                    'param_name' => 'word_excerpt_tab',
                    'group' => esc_html__('Design Option','fruitshop'),
                    'min' => 1,
                    'value'=>30,
                    'suffix' => esc_html__('word', 'fruitshop'),
                    'dependency' => array(
                        'element' => 'style_layout',
                        'value' => array('style3')
                    ),
                    'description' => esc_html__('Custom number word excerpt (default 30 word)', 'fruitshop')
                ),
                array(
                    'type' => 'colorpicker',
                    'group' => esc_html__('Design Option','fruitshop'),
                    'heading' => esc_html__( 'Main color', 'fruitshop' ),
                    'param_name' => 'main_color',
                    'description' => esc_html__( 'Select color', 'fruitshop' ),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12','style13')
                    ),
                ),
                array(
                    'type' => 'colorpicker',
                    'group' => esc_html__('Design Option','fruitshop'),
                    'heading' => esc_html__( 'Secondary color', 'fruitshop' ),
                    'param_name' => 'secondary_color',
                    'description' => esc_html__( 'Select color', 'fruitshop' ),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12','style13')
                    ),
                ),
                array(
                    'type' => 'colorpicker',
                    'group' => esc_html__('Design Option','fruitshop'),
                    'heading' => esc_html__( 'Text color', 'fruitshop' ),
                    'param_name' => 'text_color',
                    'description' => esc_html__( 'Select color', 'fruitshop' ),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style14')
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'group' => esc_html__('Design Option','fruitshop'),
                    'heading' => esc_html__( 'Shadow box on hover', 'fruitshop' ),
                    'param_name' => 'shadow_box_hover',
                    'value' => array(
                        esc_html__('Off','fruitshop')=>'',
                        esc_html__('On','fruitshop')=>'border'
                    ),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style8')
                    ),
                ),
                array(
                    'type' => 's7up_number',
                    'group' => esc_html__('Design Option','fruitshop'),
                    'heading' => esc_html__( 'Max width', 'fruitshop' ),
                    'param_name' => 'max_width',
                    'min' => 0,
                    'value'=>10,
                    'suffix' => esc_html__('px', 'fruitshop'),
                    'dependency' => array(
                        'element' => 'style_layout',
                        'value' => array('style2')
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'group' => esc_html__('Design Option','fruitshop'),
                    'heading' => esc_html__( 'Pull left/right', 'fruitshop' ),
                    'param_name' => 'pull_product',
                    'value' => array(
                        esc_html__('Pull left','fruitshop') => 'pull-left',
                        esc_html__('Pull right','fruitshop') => 'pull-right',

                    ),
                    'dependency' => array(
                        'element' => 'style_layout',
                        'value' => array('style2')
                    ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Image Size', 'fruitshop'),
                    'param_name' => 'image_size',
                    'group' => esc_html__('Design Option','fruitshop'),
                    'edit_field_class' => 'vc_column vc_col-sm-12',
                    'description' => esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'fruitshop'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Extra Class Name','fruitshop'),
                    'param_name' => 'extra_class',
                    'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.','fruitshop'),
                ),
                array(
                    'type' => 'attach_image',
                    'group' => esc_html__('Background Option','fruitshop'),
                    'heading' => esc_html__( 'Background left (*)', 'fruitshop' ),
                    'param_name' => 'bg_left',
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1','style1b')
                    ),
                ),
                array(
                    'type' => 'attach_image',
                    'group' => esc_html__('Background Option','fruitshop'),
                    'heading' => esc_html__( 'Background right (*)', 'fruitshop' ),
                    'param_name' => 'bg_right',
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1','style1b')
                    ),
                ),
            )
        ));
    }
}

add_action( 'wp_ajax_load_more_product_tab_layout', 's7upf_load_more_product_tab_layout');
add_action( 'wp_ajax_nopriv_load_more_product_tab_layout', 's7upf_load_more_product_tab_layout');
if(!function_exists('s7upf_load_more_product_tab_layout')){
    function s7upf_load_more_product_tab_layout() {
        $number         = $_POST['number'];
        $order_by       = $_POST['orderby'];
        $order          = $_POST['order'];
        $cats          = $_POST['cats'];
        $paged          = $_POST['paged'];
        $image_size     = $_POST['img_size'];
        $pro_featured    = $_POST['profeatured'];
        $pro_sale    = $_POST['prosale'];
        $default_image    = $_POST['defaultimage'];
        $animation_img    = $_POST['animation_img'];
        $col_layout_tab    = $_POST['col_layout'];
        $html = '';
        if ($order_by == 'best_seller') {
            $vip_args = array(
                'post_type' => 'product',
                'paged'  => $paged + 1,
                'meta_key' => 'total_sales',
                'orderby' => 'meta_value_num',
                'post_status'    => 'publish',
                'order' => $order,
                'posts_per_page' => $number
            );
        } elseif ($order_by == 'top_rating') {
            $vip_args = array(
                'post_type' => 'product',
                'post_status'    => 'publish',
                'paged'  => $paged + 1,
                'posts_per_page' =>$number,
                'meta_key' => '_wc_average_rating',
                'orderby'        => 'meta_value_num',
                'order'          => $order,
                'meta_query'     => WC()->query->get_meta_query(),
                'tax_query'      => WC()->query->get_tax_query(),
            );
            $vip_args['meta_query'] = WC()->query->get_meta_query();
        } elseif ($order_by == 'mostview'){
            $vip_args = array(
                'post_type' => 'product',
                'post_status'    => 'publish',
                'paged'  => $paged + 1,
                'posts_per_page' => $number,
                'meta_key'           => 'post_views',
                'order'             => $order,
                'orderby'             => 'meta_value_num',
            );
        } else {
            $vip_args = array(
                'post_type' => 'product',
                'post_status'    => 'publish',
                'paged'  => $paged + 1,
                'orderby' => $order_by,
                'order' => $order,
                'posts_per_page' => $number,
            );
        }
        // filter by category
        if (!empty($cats)) {
            $list_cat = explode(",", $cats);
            if ($list_cat[0] != '') {
                $vip_args['tax_query'][] = array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => $list_cat,
                );
            }
        }

        // Filter product by feature
        if (!empty($pro_featured) and $pro_featured == 'yes') {
            $vip_args['tax_query'][] = array(
                'taxonomy' => 'product_visibility',
                'field'    => 'name',
                'terms'    => 'featured',
                'operator' => 'IN',
            );
        }
        if (!empty($pro_sale) and $pro_sale == 'yes') {
            $vip_args['post__in'] = array_unique( wc_get_product_ids_on_sale());
        }

        $vip_query = new WP_Query($vip_args);

        $html .= S7upf_Template::load_view('elements/products/html-loop-tab-layout5',false,array(
            'image_size' => $image_size,
            'vip_query' => $vip_query,
            'default_image' => $default_image,
            'animation_img' => $animation_img,
            'col_layout_tab' => $col_layout_tab,
        ));
        echo balanceTags($html);
        wp_reset_postdata();
    }
}
/*ajax style 9*/
add_action( 'wp_ajax_load_more_product_style9', 's7upf_load_more_product_style9');
add_action( 'wp_ajax_nopriv_load_more_product_style9', 's7upf_load_more_product_style9');
if(!function_exists('s7upf_load_more_product_style9')){
    function s7upf_load_more_product_style9() {
        $number         = $_POST['number'];
        $order_by       = $_POST['orderby'];
        $order          = $_POST['order'];
        $cats          = $_POST['cats'];
        $paged          = $_POST['paged'];
        $image_size     = $_POST['img_size'];
        $pro_featured    = $_POST['profeatured'];
        $pro_sale    = $_POST['prosale'];
        $default_image    = $_POST['defaultimage'];
        $animation_img    = $_POST['animation_img'];
        $col_layout    = $_POST['col_layout'];
        $html = '';
        if ($order_by == 'best_seller') {
            $args = array(
                'post_type' => 'product',
                'paged'  => $paged + 1,
                'meta_key' => 'total_sales',
                'orderby' => 'meta_value_num',
                'post_status'    => 'publish',
                'order' => $order,
                'posts_per_page' => $number
            );
        } elseif ($order_by == 'top_rating') {
            $args = array(
                'post_type' => 'product',
                'post_status'    => 'publish',
                'paged'  => $paged + 1,
                'posts_per_page' =>$number,
                'meta_key' => '_wc_average_rating',
                'orderby'        => 'meta_value_num',
                'order'          => $order,
                'meta_query'     => WC()->query->get_meta_query(),
                'tax_query'      => WC()->query->get_tax_query(),
            );
            $args['meta_query'] = WC()->query->get_meta_query();
        } elseif ($order_by == 'mostview'){
            $args = array(
                'post_type' => 'product',
                'post_status'    => 'publish',
                'paged'  => $paged + 1,
                'posts_per_page' => $number,
                'meta_key'           => 'post_views',
                'order'             => $order,
                'orderby'             => 'meta_value_num',
            );
        } else {
            $args = array(
                'post_type' => 'product',
                'post_status'    => 'publish',
                'paged'  => $paged + 1,
                'orderby' => $order_by,
                'order' => $order,
                'posts_per_page' => $number,
            );
        }
        // filter by category
        if (!empty($cats)) {
            $list_cat = explode(",", $cats);
            if ($list_cat[0] != '') {
                $args['tax_query'][] = array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => $list_cat,
                );
            }
        }

        // Filter product by feature
        if (!empty($pro_featured) and $pro_featured == 'yes') {
            $args['tax_query'][] = array(
                'taxonomy' => 'product_visibility',
                'field'    => 'name',
                'terms'    => 'featured',
                'operator' => 'IN',
            );
        }
        if (!empty($pro_sale) and $pro_sale == 'yes') {
            $args['post__in'] = array_unique( wc_get_product_ids_on_sale());
        }

        $pro_query = new WP_Query($args);
        $html .= S7upf_Template::load_view('elements/products/html-loop-style9',false,array(
            'image_size' => $image_size,
            'pro_query' => $pro_query,
            'default_image' => $default_image,
            'animation_img' => $animation_img,
            'col_layout' => $col_layout,
        ));
        echo balanceTags($html);
        wp_reset_postdata();
    }
}