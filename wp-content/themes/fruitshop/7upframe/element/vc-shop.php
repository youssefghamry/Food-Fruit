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
if(!function_exists('s7upf_vc_shop'))
{
    function s7upf_vc_shop($attr)
    {
        $html = $css_class = '';
         $order_default = apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
        if($order_default == 'menu_order') $order_default = $order_default.' title';
        extract(shortcode_atts(array(
            'type_view'         => 'grid',
            'number'        => '12',
            'cats'          => '',
            'orderby'       => $order_default,
            'col_layout'        => '3',
            'image_size'          => '',
            'size_list'     => '',
            'extra_class'      => '',
            'shop_ajax'     => '',
        ),$attr));
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        if(isset($_GET['orderby'])){
            $orderby = $_GET['orderby'];
        }
        $args = array(
            'post_type'         => 'product',
            'post_status'       => 'publish',
            'order'             => 'ASC',
            'posts_per_page'    => $number,
            'paged'             => $paged,
        );
        $attr_taxquery = array();
        $_chosen_attributes = WC_Query::get_layered_nav_chosen_attributes();
        if(!empty($_chosen_attributes) && is_array($_chosen_attributes)){
            $attr_taxquery = array('relation ' => 'AND');
            foreach ($_chosen_attributes as $key => $value) {
                $attr_taxquery[] =  array(
                    'taxonomy'      => $key,
                    'terms'         => $value['terms'],
                    'field'         => 'slug',
                    'operator'      => 'IN'
                );
            }
        }
        if(isset( $_GET['product_cat'])) $cats = sanitize_text_field($_GET['product_cat']);
        if(!empty($cats)) {
            $cats = explode(",",$cats);
            $attr_taxquery[]=array(
                'taxonomy'=>'product_cat',
                'field'=>'slug',
                'terms'=> $cats
            );
        }
        if (!empty($attr_taxquery)){
            $attr_taxquery['relation'] = 'AND';
            $args['tax_query'] = $attr_taxquery;
        }
        if( isset( $_GET['min_price']) && isset( $_GET['max_price']) ){
            $min = sanitize_text_field($_GET['min_price']);
            $max = sanitize_text_field($_GET['max_price']);
            $args['post__in'] = s7upf_filter_price($min,$max);
        }
        switch ($orderby) {
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
                break;

            case 'rating' :
                $args['meta_key'] = '_wc_average_rating';
                $args['orderby'] = 'meta_value_num';
                $args['order']    = 'DESC';
                break;

            case 'date':
                $args['orderby'] = 'date';
                $args['order']    = 'DESC';
                break;

            case 'mostview':
                $args['orderby'] = 'meta_value_num';
                $args['order']    = 'DESC';
                $args['meta_key']    = 'post_views';
                break;

            case 'rand':
                $args['orderby'] = 'rand';
                break;

            case 'comment_count':
                $args['orderby'] = 'comment_count';
                break;

            case 'title':
                $args['orderby'] = 'title';
                $args['order']    = 'ASC';

                break;

            default:
                $args['orderby'] = $order_default;
                break;
        }
        //Check style
        $attr_ajax = array(
            'column'    => $col_layout,
            'size'          => $image_size,
            'size_list'     => $size_list,
            'number'        => $number,
            'type_view'     => $type_view,
            'cats'          => $cats,
        );
        $data_ajax = array(
            "attr"        => $attr_ajax,
        );
        $product_query = new WP_Query($args);
        $data_ajax = json_encode($data_ajax);
        ob_start();

        s7upf_shop_loop_before($product_query,$orderby,$type_view);
        $html .= ob_get_clean();
        $html .=    '<div class="'.esc_attr($extra_class).' woocommerce products-wrap js-content-wrap content-wrap-shop" data-load="'.esc_attr($data_ajax).'">
                        <div class="products  list-product-wrap js-content-main"> ';
        if(isset($_GET['type'])){
            $type_view = $_GET['type'];
        }
        $shop_mobile_2column = s7upf_get_option('shop_mobile_2column','off');

        if($type_view == 'list'){

            $html .= '<div class="product-list-view">';
        }else{
            $html .= '<div class="product-grid-view shop_mobile_2column-'.$shop_mobile_2column.'">
                <div class="row">';
        }

        $max_page = $product_query->max_num_pages;
        if($product_query->have_posts()) {
            while($product_query->have_posts()) {
                $product_query->the_post();
                $html .= S7upf_Template::load_view('woo/loop/content-product', false, array('type' => $type_view,'column'=>$col_layout));

            }
        }
        if($type_view == 'list'){

            $html .= '</div>';
        }else{
            $html .= '</div></div>';
        }
        $html .= S7upf_Template::load_view('woo/loop/paginaticon',false,array('wp_query'=>$product_query,'paged'=>$paged));

        $html .= '</div></div>';

        wp_reset_postdata();
        return $html;
    }
}
stp_reg_shortcode('s7upf_shop','s7upf_vc_shop');

$check_add = '';
if(isset($_GET['return'])) $check_add = $_GET['return'];
if(empty($check_add)) add_action( 'vc_before_init_base','s7upf_admin_shop',10,100 );
if ( ! function_exists( 's7upf_admin_shop' ) ) {
    function s7upf_admin_shop()
    {
        $order_default = apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
        if($order_default == 'menu_order') $order_default = $order_default.' title';
        vc_map(array(
            'name' => esc_html__('SV Shop', 'fruitshop'),
            'base' => 's7upf_shop',
            'category' => '7Up-theme',
            'icon' => 'icon-st',
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'admin_label' => true,
                    'heading' => esc_html__('Choose view way product', 'fruitshop'),
                    'param_name' => 'type_view',
                    'description' => esc_html__('Select style', 'fruitshop'),
                    'value' => array(
                        esc_html__('Grid', 'fruitshop') => 'grid',
                        esc_html__('List', 'fruitshop') => 'list',
                    ),
                ),
                array(
                    "type"          => "dropdown",
                    "admin_label"   => true,
                    "heading"       => esc_html__("Shop ajax",'fruitshop'),
                    "param_name"    => "shop_ajax",
                    "value"         => array(
                        esc_html__("Off",'fruitshop')   => '',
                        esc_html__("On",'fruitshop')   => 'on',
                    ),
                ),
                array(
                    'heading'     => esc_html__( 'Number', 'fruitshop' ),
                    'type'        => 'textfield',
                    'description' => esc_html__( 'Enter number of product. Default is 12.', 'fruitshop' ),
                    'param_name'  => 'number',
                ),
                array(
                    'heading'     => esc_html__( 'Product Categories', 'fruitshop' ),
                    'type'        => 'autocomplete',
                    'param_name'  => 'cats',
                    'settings' => array(
                        'multiple' => true,
                        'sortable' => true,
                        'values' => s7upf_get_list_taxonomy(),
                    ),
                    'save_always' => true,
                    'description' => esc_html__( 'List of product categories', 'fruitshop' ),
                ),
                array(
                    "type" => "dropdown",
                    "heading" => esc_html__("Order By",'fruitshop'),
                    "param_name" => "orderby",
                    "value"         => array(
                        esc_html__( 'Default sorting', 'fruitshop' )          => $order_default,
                        esc_html__( 'Popularity (sales)', 'fruitshop' )       => 'popularity',
                        esc_html__( 'Average Rating', 'fruitshop' )           => 'rating',
                        esc_html__( 'Sort by most recent', 'fruitshop' )      =>'date',
                        esc_html__( 'Sort by price (asc)', 'fruitshop' )      => 'price',
                        esc_html__( 'Sort by price (desc)', 'fruitshop' )     =>'price-desc',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Column layout', 'fruitshop'),
                    'param_name' => 'col_layout',
                    'group' => esc_html__('Design Option','fruitshop'),
                    'description' => esc_html__( 'This allows you to change the number column of the product grid.', 'fruitshop' ),
                    'value' => array(
                        esc_html__('4 columns','fruitshop')=>'3',
                        esc_html__('3 columns','fruitshop')=>'4',
                        esc_html__('2 columns','fruitshop')=>'6',
                        esc_html__('1 column','fruitshop')=>'12',
                    ),
                ),

                array(
                    'type' => 's7up_number',
                    'heading' => esc_html__('Number word excerpt', 'fruitshop'),
                    'param_name' => 'word_excerpt',
                    'group' => esc_html__('Design Option','fruitshop'),
                    'value'=>30,
                    'suffix' => esc_html__('word', 'fruitshop'),
                    'description' => esc_html__('Custom number word excerpt (default 30 word)', 'fruitshop')
                ),

                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Image Size (Grid)', 'fruitshop'),
                    'param_name' => 'image_size',
                    'group' => esc_html__('Design Option','fruitshop'),
                    'edit_field_class' => 'vc_column vc_col-sm-12',
                    'description' => esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'fruitshop'),
                ),

                array(
                    "type"          => "textfield",
                    'group' => esc_html__('Design Option','fruitshop'),
                    "heading"       => esc_html__("Image size (List)",'fruitshop'),
                    "param_name"    => "size_list",
                    'description'   => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'fruitshop' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Extra Class Name','fruitshop'),
                    'param_name' => 'extra_class',
                    'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.','fruitshop'),
                ),

            )
        ));
    }
}
