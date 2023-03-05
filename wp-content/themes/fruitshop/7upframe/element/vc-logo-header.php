<?php
/**
 * Created by Sublime text 2.
 * User: 7uptheme
 * Date: 12/08/15
 * Time: 10:00 AM
 */
if(!function_exists('s7upf_vc_logo_header'))
{
    function s7upf_vc_logo_header($attr)
    {
        $html = $logo_img = $style =$extra_class= $live_search = $pull_logo =$search_box = $show_categories=$cats = $cart_box = $main_color = $bg_color = '';
        extract(shortcode_atts(array(
            'logo_img'      => '',
            'style'      => 'style1',
            'search_box'      => 'show',
            'cart_box'      => 'show',
            'main_color'      => '',
            'bg_color'      => '',
            'cats'      => '',
            'live_search'      => 'on',
            'show_categories'      => 'show',
            'pull_logo'      => 'pull-left',
            'extra_class'      => '',
        ),$attr));
        $html .= S7upf_Template::load_view('elements/logo-header',false,array(
            'logo_img'  => $logo_img,
            'style'  => $style,
            'search_box'  => $search_box,
            'cart_box'  => $cart_box,
            'main_color'  => $main_color,
            'bg_color'  => $bg_color,
            'cats'  => $cats,
            'live_search'  => $live_search,
            'show_categories'  => $show_categories,
            'pull_logo'  => $pull_logo,
            'extra_class'  => $extra_class,
        ));
        return $html;
    }
}
stp_reg_shortcode('s7upf_logo_header','s7upf_vc_logo_header');
$check_add = '';
if(isset($_GET['return'])) $check_add = $_GET['return'];
if(empty($check_add)) add_action( 'vc_before_init_base','s7upf_add_admin_logo_header',10,100 );
if ( ! function_exists( 's7upf_add_admin_logo_header' ) ) {
    function s7upf_add_admin_logo_header(){
        vc_map( array(
            "name"      => esc_html__("SV Logo Header", 'fruitshop'),
            "base"      => "s7upf_logo_header",
            "icon"      => "icon-st",
            "category"  => '7Up-theme',
            "params"    => array(
                array(
                    'type' => 'dropdown',
                    'admin_label' => true,
                    'heading' => esc_html__( 'Style', 'fruitshop' ),
                    'param_name' => 'style',
                    'value' => array(
                        esc_html__('Style 1(Default)','fruitshop')=>'style1',
                        esc_html__('Style 2 (Search - Logo - Cart)','fruitshop')=>'style2',
                        esc_html__('Style 3 (Logo - Search - Cart)','fruitshop')=>'style3',
                        esc_html__('Style 4 (Home 8)','fruitshop')=>'style4',
                    ),
                    'description' => esc_html__( 'Select style', 'fruitshop' )
                ),
                array(
                    'type' => 's7up_image_check',
                    'param_name' => 'style_logo_header',
                    'heading' => '',
                    'element' => 'style',
                ),
                array(
                    "type" => "attach_image",
                    "holder" => "div",
                    "heading" => esc_html__("Logo image",'fruitshop'),
                    "param_name" => "logo_img",
                    'description' => esc_html__( 'Select image from library', 'fruitshop' )
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
                        'value'     =>array('style2','style3')
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Live Search', 'fruitshop' ),
                    'param_name' => 'live_search',
                    'value'=>array(
                        esc_html__('On','fruitshop')=> 'on',
                        esc_html__('Off','fruitshop')=> 'off',
                    ),
                    'dependency'    =>array(
                        'element'   =>'search_box',
                        'value'     =>array('show')
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Show product categories', 'fruitshop' ),
                    'param_name' => 'show_categories',
                    'value'=>array(
                        esc_html__('Show','fruitshop')=> 'show',
                        esc_html__('Hide','fruitshop')=> 'hide',
                    ),
                    'dependency'    =>array(
                        'element'   =>'style',
                        'value'     =>array('style3')
                    ),
                ),
                array(
                    'holder'     => 'div',
                    'heading'     => esc_html__( 'Product Categories', 'fruitshop' ),
                    'type'        => 'autocomplete',
                    'param_name'  => 'cats',
                    'settings' => array(
                        'multiple' => true,
                        'sortable' => true,
                        'values' => s7upf_get_product_taxonomy(),
                    ),
                    'save_always' => true,
                    'description' => esc_html__( 'List of product categories', 'fruitshop' ),
                    'dependency'    =>array(
                        'element'   =>'show_categories',
                        'value'     =>array('show')
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
                        'value'     =>array('style2','style3')
                    ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Main color', 'fruitshop' ),
                    'param_name' => 'main_color',
                    'description' => esc_html__( 'Select color', 'fruitshop' )
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Background color', 'fruitshop' ),
                    'param_name' => 'bg_color',
                    'description' => esc_html__( 'Select color', 'fruitshop' ),
                    'dependency'    =>array(
                        'element'   =>'style',
                        'value'     =>array('style2')
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Pull logo', 'fruitshop' ),
                    'param_name' => 'pull_logo',
                    'value' => array(
                        esc_html__('Pull left','fruitshop') => 'pull-left',
                        esc_html__('Pull right','fruitshop') => 'pull-right',
                        esc_html__('Pull center','fruitshop') => 'text-center',

                    ),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1')
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
    }
}

add_action( 'wp_ajax_live_search', 's7upf_live_search' );
add_action( 'wp_ajax_nopriv_live_search', 's7upf_live_search' );
if(!function_exists('s7upf_live_search')){
    function s7upf_live_search() {
        $key = $_POST['key'];
        $post_type = $_POST['post_type'];
        $trim_key = trim($key);
        $args = array(
            'post_type' => $post_type,
            's'         => $key,
            'post_status' => 'publish'
        );
        // $args['meta_query'] = array(
        //     array(
        //         'key'     => '_visibility',
        //         'value'   => array( 'catalog', 'visible' ),
        //         'compare' => 'IN',
        //     )
        // );
        $query = new WP_Query( $args );
        if( $query->have_posts() && !empty($key) && !empty($trim_key)){
            while ( $query->have_posts() ) : $query->the_post();
                global $product;
                $post_object = get_post( $product->get_id() );
                setup_postdata( $GLOBALS['post'] =& $post_object );
                echo    '<div class="item-search-pro">
                            <div class="search-ajax-thumb product-thumb">
                                <a href="'.esc_url(get_the_permalink()).'" class="product-thumb-link">
                                    '.get_the_post_thumbnail(get_the_ID(),array(77,77)).'
                                </a>
                                <a data-product-id="'.get_the_id().'" href="'. esc_url(get_the_permalink()) .'" class="quickview-link product-ajax-popup"><i class="fa fa-search" aria-hidden="true"></i></a>
                            </div>
                            <div class="search-ajax-title product-info">
                                <h3 class="product-title">
                                    <a href="'.esc_url(get_the_permalink()).'">'.get_the_title().'</a>
                                </h3>
                                <div class="product-price">
                                   '.$product->get_price_html().'
                                </div>
                               '.s7upf_get_rating_html().'
                            </div>
                            
                        </div>';
            endwhile;
        }
        else{
            echo '<p class="text-center">'.esc_html__("No any results with this keyword.",'fruitshop').'</p>';
        }
        wp_reset_postdata();
    }
}