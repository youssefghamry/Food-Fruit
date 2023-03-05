<?php
/**
 * Created by Sublime Text 2.
 * User: 7uptheme
 * Date: 14/04/75
 * Time: 10:20 AM
 */
if(!class_exists('S7upf_Woocommerce_Controller')){
    class S7upf_Woocommerce_Controller{
        static function _init(){
            if (!class_exists('WC_Product')) return;
            add_action('after_setup_theme', array(__CLASS__, '_woocommerce_support'));
            remove_action('woocommerce_before_main_content','woocommerce_output_content_wrapper',10);
            remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);
            remove_action('woocommerce_after_main_content','woocommerce_output_content_wrapper_end',10);
            remove_action('woocommerce_before_shop_loop','woocommerce_result_count',20);
            remove_action('woocommerce_before_shop_loop','woocommerce_catalog_ordering',30);
            remove_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open',10);
            remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close',5);
            remove_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail',10);
            remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10);
            remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5);
            remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',10);
            remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart',10);
            //remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_images',20);
            remove_action('woocommerce_single_product_summary','woocommerce_template_single_price',10);
            remove_action('woocommerce_single_product_summary','woocommerce_template_single_rating',10);
            remove_action('woocommerce_single_product_summary','woocommerce_template_single_add_to_cart',30);
            //remove_action('woocommerce_archive_description','woocommerce_taxonomy_archive_description',10);
            //remove_action('woocommerce_archive_description','woocommerce_product_archive_description',10);


            add_action('woocommerce_share', array(__CLASS__, 's7upf_share_product'),10);
            add_action('woocommerce_single_product_summary','woocommerce_template_single_price',7);
            add_action('woocommerce_single_product_summary', array(__CLASS__, 's7upf_template_single_rating'),10);
            add_action('woocommerce_single_product_summary', array(__CLASS__, 's7upf_template_single_add_to_cart'),30);
            add_action('woocommerce_before_main_content', array(__CLASS__, 's7upf_woo_begin_main_content'),20);
            add_action('woocommerce_after_main_content', array(__CLASS__, 's7upf_woo_end_main_content'),10);
            add_action('woocommerce_before_shop_loop', array(__CLASS__, 's7upf_woo_box_view_product'),10);
            add_action('s7upf_before_shop_product_thumb', array(__CLASS__,'s7upf_template_loop_product_label_icon'), 10);
            add_action('woocommerce_before_shop_loop_item_title', array(__CLASS__,'s7upf_template_loop_product_thumbnail'), 10);
            add_action('woocommerce_after_shop_loop_item_title', array(__CLASS__, 's7upf_info_product'),30);
           // add_action('woocommerce_before_single_product_summary', array(__CLASS__, 's7upf_product_thumbnail_detail'),30);
            add_action( 'admin_init',array(__CLASS__, 's7upf_metabox_shop'));
            add_action( 's7upf_template_single_add_to_cart','woocommerce_template_single_add_to_cart',30);
            add_action( 'wp_ajax_update_mini_cart',  array(__CLASS__,'s7upf_update_mini_cart' ));
            add_action( 'wp_ajax_nopriv_update_mini_cart',  array(__CLASS__,'s7upf_update_mini_cart' ));

            add_action('product_cat_add_form_fields', array(__CLASS__,'s7upf_product_cat_metabox_add'), 10, 1);
            add_action('product_cat_edit_form_fields', array(__CLASS__,'s7upf_product_cat_metabox_edit'), 10, 1);
            add_action('created_product_cat', array(__CLASS__,'s7upf_product_save_category_metadata'), 10, 1);
            add_action('edited_product_cat', array(__CLASS__,'s7upf_product_save_category_metadata'), 10, 1);

            add_action('wp_ajax_product_popup_content', array(__CLASS__,'s7upf_product_popup_content' ));
            add_action('wp_ajax_nopriv_product_popup_content', array(__CLASS__,'s7upf_product_popup_content' ));
            add_action('wp_ajax_add_to_cart',array(__CLASS__,'s7upf_mini_cart_ajax'));
            add_action('wp_ajax_nopriv_add_to_cart',array(__CLASS__,'s7upf_mini_cart_ajax'));
            add_action('wp_ajax_product_remove',array(__CLASS__,'s7upf_product_remove'));
            add_action('wp_ajax_nopriv_product_remove',array(__CLASS__,'s7upf_product_remove'));


            add_action('woocommerce_before_shop_loop',array(__CLASS__,'s7upf_shop_wrap_before'),30);
            add_action('woocommerce_after_shop_loop',array(__CLASS__,'s7upf_shop_wrap_after'),10);
             // Ajax shop
             add_action('wp_ajax_load_shop',array(__CLASS__,'s7upf_load_shop'));
            add_action('wp_ajax_nopriv_load_shop',array(__CLASS__,'s7upf_load_shop'));

            add_filter('woocommerce_show_page_title', array(__CLASS__,'s7upf_remove_page_title'));
            add_filter('loop_shop_per_page',  array(__CLASS__, 's7upf_shop_per_page'),20);
            add_filter('woocommerce_breadcrumb_defaults',array(__CLASS__,'s7upf_custom_breadcrumb_defaults_woo'));
            add_filter('woocommerce_output_related_products_args',array(__CLASS__,'s7upf_output_related_products_args'),10,1);
            add_filter('woocommerce_product_tabs', array(__CLASS__,'s7upf_custom_description_tab'), 98 );


            add_filter( 'woocommerce_loop_add_to_cart_link', array(__CLASS__,'s7upf_custom_add_to_cart_link'));
            add_action( 's7upf_template_single_add_to_cart', array(__CLASS__,'s7upf_filter_single_add_to_cart'), 20 );
            add_filter( 'woocommerce_get_price_html', array(__CLASS__,'s7upf_change_price_html'), 100, 2 );
            add_filter( 'woocommerce_loop_add_to_cart_args', array(__CLASS__,'s7upf_fix_add_cart'));

        }

        static  function s7upf_load_shop() {
            $data_filter = $_POST['filter_data'];
            extract($data_filter);
            if(!isset($page)) $page = 1;
            $args = array(
                'post_type'         => 'product',
                'post_status'       => 'publish',
                'order'             => 'ASC',
                'posts_per_page'    => $number,
                'paged'             => $page,
            );
            if(isset($s)) if(!empty($s)){
                $args['s'] = $s;
                $args['order'] = 'DESC';
            }
            $attr_taxquery = array();
            if(!empty($attributes)){
                foreach($attributes as $key => $term){
                    $attr_taxquery[] =  array(
                                            'taxonomy'      => 'pa_'.$key,
                                            'terms'         => $term,
                                            'field'         => 'slug',
                                            'operator'      => 'IN'
                                        );
                }
            }
            if(!empty($cats)) {
                if(is_string($cats)) $cats = explode(",",$cats);
                $attr_taxquery[]=array(
                    'taxonomy'=>'product_cat',
                    'field'=>'slug',
                    'terms'=> $cats
                );
            }
            if(!empty($tags)) {
                if(is_string($tags)) $tags = explode(",",$tags);
                $attr_taxquery[]=array(
                    'taxonomy'=>'product_tag',
                    'field'=>'slug',
                    'terms'=> $tags
                );
            }
            if (!empty($attr_taxquery)){
                $attr_taxquery['relation'] = 'AND';
                $args['tax_query'] = $attr_taxquery;
            }
            if( isset( $price['min']) && isset( $price['max']) ){
                $min = $price['min'];
                $max = $price['max'];
                if($max != $max_price || $min != $min_price) $args['post__in'] = s7upf_filter_price($min,$max);
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
                    $order_default = apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
                    if($order_default == 'menu_order') $order_default = $order_default.' title';
                    if(!$order_default) $order_default = 'menu_order title';
                    $args['orderby'] = $order_default;
                    break;
            }
            if(isset($s)){
                if(!empty($s) && $args['orderby'] == 'menu_order title'){
                    unset($args['order']);
                    unset($args['orderby']);
                }
            }
            $size = s7upf_get_size_image('full',$size);
            $attr = array(
                'type'    => $type_view,
                'column'        => $column,
                'size'          => $size,
                'number'        => $number,
                );
            echo '<div class="products list-product-wrap js-content-main">
            <div class="product-'.$type_view.'-view products ">
               ';
            if($type_view == 'grid' ) echo'<div class="row">';
            update_option('type_view_shop',$type_view);
            $product_query = new WP_Query($args);
            $max_page = $product_query->max_num_pages;
            if($product_query->have_posts()) {
                while($product_query->have_posts()) {
                    $product_query->the_post();
                   echo S7upf_Template::load_view('woo/loop/content-product',false,$attr);

                }
            }
             update_option('type_view_shop','');
            if($type_view == 'grid' ) echo'</div>';
            echo    '</div></div>';
            echo S7upf_Template::load_view('woo/loop/paginaticon',false,array('wp_query'=>$product_query,'paged'=>$page));
            wp_reset_postdata();
            die();
        }

         static function s7upf_shop_wrap_after(){
             ?>
            </div>
            </div>

            <?php
         }
         static function s7upf_shop_wrap_before(){
            global $wp_query;
            $cats = '';
            $tags = '';
            if(isset($wp_query->query_vars['product_cat'])) $cats = $wp_query->query_vars['product_cat'];
            if(isset($wp_query->query_vars['product_tag'])) $tags = $wp_query->query_vars['product_tag'];

            $type_view      = s7upf_get_option('woo_style_view_way_product');
            $number         = s7upf_get_option('st_product_post_per_page',12);
            if(isset($_GET['number'])) $number = $_GET['number'];
            if(isset($_GET['type'])) $type_view = $_GET['type'];
            // data shop ajax
            $attr_ajax = array(
                'column'        => s7upf_get_option('woo_shop_column'),
                'size'          => s7upf_get_option('s7upf_image_size_list_product'),
                'number'        => $number,
                'cats'          => $cats,
                'tags'          => $tags,
                'type_view'          => $type_view,
                );
            $data_ajax = array(
                "attr"        => $attr_ajax,
                );
            $data_ajax = json_encode($data_ajax);
            ?>
            <div class="products-wrap js-content-wrap content-wrap-shop" data-load="<?php echo esc_attr($data_ajax)?>">
                <div class="products  list-product-wrap js-content-main">
            <?php
        }

        /********************************** BEGIN UPDATE CART AJAX ***************************************/



        static function s7upf_update_mini_cart() {
            WC_AJAX::get_refreshed_fragments();
            die();
        }
    /********************************** END UPDATE CART  AJAX ***************************************/
        function s7upf_mini_cart_ajax() {

            $product_id = apply_filters( 'woocommerce_add_to_cart_product_id', absint( $_POST['product_id'] ) );
            $quantity = empty( $_POST['quantity'] ) ? 1 : apply_filters( 'woocommerce_stock_amount', $_POST['quantity'] );
            $passed_validation = apply_filters( 'woocommerce_add_to_cart_validation', true, $product_id, $quantity );

            if ( $passed_validation && WC()->cart->add_to_cart( $product_id, $quantity ) ) {
                do_action( 'woocommerce_ajax_added_to_cart', $product_id );
                WC_AJAX::get_refreshed_fragments();
            } else {
                $this->json_headers();

                // If there was an error adding to the cart, redirect to the product page to show any errors
                $data = array(
                    'error' => true,
                    'product_url' => apply_filters( 'woocommerce_cart_redirect_after_error', get_permalink( $product_id ), $product_id )
                );
                echo json_encode( $data );
            }
            die();
        }
        static function s7upf_product_remove() {
            global $wpdb, $woocommerce;
            $cart_item_key = $_POST['cart_item_key'];
            if ( $woocommerce->cart->get_cart_item( $cart_item_key ) ) {
                $woocommerce->cart->remove_cart_item( $cart_item_key );
            }
            WC_AJAX::get_refreshed_fragments();
            die();
        }
        static function s7upf_product_popup_content() {
                $product_id = $_POST['product_id'];

                $query = new WP_Query( array(
                    'post_type' => 'product',
                    'post__in' => array($product_id)
                ));
                if( $query->have_posts() ):

                    while ( $query->have_posts() ) : $query->the_post();
                        echo S7upf_Template::load_view('woo/popup-product-dialog',false);
                    endwhile;
                endif;
                wp_reset_postdata();
            }
        static function s7upf_output_related_products_args($args){
            $number_product = 4;
            $number_product = s7upf_get_option('s7upf_number_related_product');
            $args =array(
                'posts_per_page' 	=> (int)$number_product,
                'orderby' 			=> 'title',
            );
            return $args;
        }
        static function s7upf_share_product(){
            $box_share = s7upf_get_option('s7upf_show_share_product_detail');
            if($box_share=='on') { ?>
                <p class="desc info-extra">
                    <label><?php echo esc_html__('Share:','fruitshop')?></label>
                    <a class="share-face silver" target="popup" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>"><i class="fa fa-facebook"></i></a>
                    <a class="share-twitter silver" target="popup" href="http://twitter.com/share?url=<?php the_permalink() ?>"><i class="fa fa-twitter "></i></a>
                    <a class="no-open share-pin silver" href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());" target="popup"><i class="fa fa-pinterest"></i></a>
                    <a class="share-google silver" target="popup"  href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus"></i></a>
                </p>
                <?php
            }
        }

        static function s7upf_custom_description_tab( $tabs ) {
            $data_tabs = get_post_meta(get_the_ID(),'s7upf_product_tab_data',true);
            if(!empty($data_tabs) and is_array($data_tabs)){
                foreach ($data_tabs as $key=>$data_tab){
                    $tabs['s7upf_custom_tab_' . $key] = array(
                        'title' => (!empty($data_tab['title']) ? $data_tab['title'] : $key),
                        'priority' => (!empty($data_tab['priority']) ? $data_tab['priority'] : 50),
                        'callback' => array(__CLASS__, 's7upf_render_tab'),
                        'content' => apply_filters('the_content', $data_tab['tab_content']) //this allows shortcodes in custom tabs
                    );
                }
            }

            return $tabs;
        }
        static function s7upf_render_tab($key, $tab) {
            echo apply_filters('s7upf_product_custom_tab_content', $tab['content'], $tab, $key);
        }
        static function s7upf_template_single_add_to_cart(){
            echo S7upf_Template::load_view('woo/wrap-qty',false);
        }
        static function s7upf_template_single_rating($count = false){
            global $product;
            $star = $product->get_average_rating();
            $review_count = $product->get_review_count();
            $width = $star / 5 * 100;
            if(get_option( 'woocommerce_enable_review_rating' ) === 'yes' ){
            ?>
            <div class="product-rate">
            <div class="product-rating" style="width: <?php echo esc_attr($width);?>%"></div>
            <?php
            if($count){ ?>
                <span>(<?php echo esc_attr($review_count); ?>s)</span>
            <?php }
            ?>
            </div>
            <?php
            }
        }
        static function s7upf_custom_breadcrumb_defaults_woo(){

            return array(
                'delimiter'   => '<span class="delimiter"> // </span>',
                'wrap_before' => '<nav class=" bread-crumb-woo" ' . ( is_single() ? 'itemprop="breadcrumb"' : '' ) . '>',
                'wrap_after'  => '</nav>',
                'before'      => '',
                'after'       => '',
                'home'        => _x( 'Home', 'breadcrumb', 'fruitshop' )
            );

        }
        static function s7upf_shop_per_page(){
           $number_post = s7upf_get_option('st_product_post_per_page');
            return $number_post;
        }
        static function s7upf_info_product(){
            echo S7upf_Template::load_view('woo/info-product',false);
        }
        static function s7upf_product_thumbnail_detail(){
            echo S7upf_Template::load_view('woo/product-thumbnail-detail',false);
        }


        static function s7upf_remove_compare_link(){
            return true;
        }

        static function s7upf_template_loop_product_label_icon(){
             echo S7upf_Template::load_view('woo/label-icon',false);
        }
        static function s7upf_template_loop_product_thumbnail(){
             echo S7upf_Template::load_view('woo/product-thumbnail',false);
        }
        static function _woocommerce_support(){
            add_theme_support('woocommerce');
        }

        static function s7upf_woo_box_view_product(){
            echo S7upf_Template::load_view('woo/loop/result-orderby-view',false);
        }

        static function s7upf_remove_page_title(){
            return false;
        }


        static function s7upf_woo_begin_main_content(){
            ?>
            <div class="content-shop">
                        <div class="row">
                        <?php s7upf_output_sidebar('left')?>
                        <div  class = "<?php echo esc_attr(s7upf_get_main_class()); ?>">
                            <div class="main-content-shop">
            <?php
        }
        static function s7upf_woo_end_main_content(){
            ?>
                            </div>
                        </div>
                        <?php s7upf_output_sidebar('right')?>
                    </div>
            </div>
            <?php
        }


        static  function s7upf_product_cat_metabox_add($tag) {
            ?>
            <div class="form-field">
                <label class="title" for="st_product_item_style"><?php esc_html_e('Show banner', 'fruitshop'); ?></label>
                <select id="s7upf_show_banner_product_list" name="s7upf_show_banner_product_list" class="postform">
                    <option value=""><?php esc_html_e('---User in theme settings---', 'fruitshop'); ?></option>
                    <option value="on"><?php esc_html_e('On', 'fruitshop'); ?></option>
                    <option value="off"><?php esc_html_e('Off', 'fruitshop'); ?></option>
                </select>
            </div>
            <div class="form-field">
                <label><?php esc_html_e('Image banner','fruitshop'); ?></label>
                <div class="wrap-metabox">
                    <div class="live-previews"></div>
                    <a class="button button-primary sv-button-remove"> <?php esc_html_e("Remove","fruitshop")?></a>
                    <a class="button button-primary sv-button-upload"><?php esc_html_e("Upload","fruitshop")?></a>
                    <input name="cat-banner-image" type="hidden" class="sv-image-value" value=""> </input>
                </div>
            </div>
            <div class="form-field">
                <label><?php esc_html_e('Title banner','fruitshop'); ?></label>
                <input name="cat-title-banner" type="text" value="" size="40">
            </div>

        <?php }
        static function s7upf_product_cat_metabox_edit($tag) { ?>
            <tr class="form-field">
                <th scope="row" valign="top">
                    <label class="title" for="s7upf_show_banner_product_list"><?php esc_html_e('Show banner', 'fruitshop'); ?></label>
                </th>
                <td>
                    <select id="s7upf_show_banner_product_list" name="s7upf_show_banner_product_list" class="postform">
                        <option value="" <?php selected('',get_term_meta($tag->term_id, 's7upf_show_banner_product_list', true));?> ><?php esc_html_e('---Theme settings---', 'fruitshop'); ?></option>
                        <option value="on" <?php selected('on',get_term_meta($tag->term_id, 's7upf_show_banner_product_list', true));?> ><?php esc_html_e('On', 'fruitshop'); ?></option>
                        <option value="off" <?php selected('off',get_term_meta($tag->term_id, 's7upf_show_banner_product_list', true));?> ><?php esc_html_e('Off', 'fruitshop'); ?></option>

                    </select>
                </td>
            </tr>
            <tr class="form-field">
                <th scope="row" valign="top">
                    <label><?php esc_html_e('Image banner','fruitshop'); ?></label>
                </th>
                <td>
                    <div class="wrap-metabox">
                        <div class="live-previews">
                            <?php
                            $image = get_term_meta($tag->term_id, 'cat-banner-image', true);
                            echo '<img src="'.esc_url($image).'" />';
                            ?>
                        </div>
                        <a class="button button-primary sv-button-remove"> <?php esc_html_e("Remove","fruitshop")?></a>
                        <a class="button button-primary sv-button-upload"><?php esc_html_e("Upload","fruitshop")?></a>
                        <input name="cat-banner-image" type="hidden" class="sv-image-value" value="<?php echo esc_attr($image)?>"> </input>
                    </div>
                </td>
            </tr>
            <tr class="form-field">
                <th scope="row"><label><?php esc_html_e('Title banner','fruitshop'); ?></label></th>
                <td><input name="cat-title-banner" type="text" value="<?php echo get_term_meta($tag->term_id, 'cat-title-banner', true)?>" size="40">
            </tr>

        <?php }
        static  function s7upf_product_save_category_metadata($term_id)
        {
            if (isset($_POST['s7upf_show_banner_product_list'])) update_term_meta( $term_id, 's7upf_show_banner_product_list', $_POST['s7upf_show_banner_product_list']);
            if (isset($_POST['cat-banner-image'])) update_term_meta( $term_id, 'cat-banner-image', $_POST['cat-banner-image']);
            if (isset($_POST['cat-title-banner'])) update_term_meta( $term_id, 'cat-title-banner', $_POST['cat-title-banner']);

        }

        static  function s7upf_metabox_shop(){
            $s7upf_metabox = array(
                'id' => 's7upf_shop_setting',
                'title' => esc_html__('Shop Options','fruitshop'),
                'pages' => array('product'),
                'context' => 'normal',
                'priority' => 'high',
                'fields' => array(
                    array(
                        'label' => esc_html__('General setting','fruitshop'),
                        'id' => 'mb_general_setting',
                        'type' => 'tab'
                    ),
                    array(
                        'id'          => 'discount_time_product',
                        'label'       => esc_html__('Discount time product','fruitshop'),
                        'type'        => 'date-time-picker',
                        'desc'        => esc_html__('Select time.','fruitshop'),
                        'std'         => '',
                    ),
                    array(
                        'id'          => 'quotation',
                        'label'       => esc_html__('product quotation (Ex: $20/1 Pound)','fruitshop'),
                        'type'        => 'text',
                        'desc'        => esc_html__('Enter text.','fruitshop'),
                        'std'         => '',
                    ),

                    array(
                        'id'          => 'label_icon',
                        'label'       => esc_html__('Label icon','fruitshop'),
                        'type'        => 'upload',
                        'desc'        => esc_html__('Select image icon from library.','fruitshop'),
                    ),
                    array(
                        'id'          => 's7upf_product_tab_data',
                        'label'       => esc_html__('Add Tab','fruitshop'),
                        'type'        => 'list-item',
                        'settings'    => array(
                            array(
                                'id' => 'tab_content',
                                'label' => esc_html__('Content', 'fruitshop'),
                                'type' => 'textarea',
                            ),
                            array(
                                'id' => 'priority',
                                'label' => esc_html__('Priority (Default 50)', 'fruitshop'),
                                'type'        => 'numeric-slider',
                                'min_max_step'=> '0,100,10',
                                'std'         => 50
                            ),
                        )
                    ),

                    array(
                        'label' => esc_html__('Banner setting','fruitshop'),
                        'id' => 'mb_banner_setting',
                        'type' => 'tab'
                    ),
                    array(
                        'id'          => 's7upf_show_banner_product_detail',
                        'label'       => esc_html__('Show banner','fruitshop'),
                        'type'        => 'select',
                        'section'     => 'option_woo',
                        'desc'=>esc_html__('This allow you to show or hide Banner in detail products','fruitshop'),
                        'std'=>'',
                        'choices'     => array(
                            array(
                                'value'=>'',
                                'label'=>esc_html__('--- Theme option ---','fruitshop'),
                            ),
                            array(
                                'value'=>'on',
                                'label'=>esc_html__('On','fruitshop'),
                            ),
                            array(
                                'value'=>'off',
                                'label'=>esc_html__('Off','fruitshop'),
                            )
                        )
                    ),
                    array(
                        'id'          => 's7upf_banner_title_product_detail',
                        'label'       => esc_html__('Title banner','fruitshop'),
                        'type'        => 'text',
                        'section'     => 'option_woo',
                        'desc'=>esc_html__('Enter title banner','fruitshop'),
                        'condition'   => 's7upf_show_banner_product_detail:is(on)',
                    ),
                    array(
                        'id'          => 's7upf_banner_desc_product_detail',
                        'label'       => esc_html__('Description banner','fruitshop'),
                        'type'        => 'text',
                        'section'     => 'option_woo',
                        'desc'=>esc_html__('Enter description banner','fruitshop'),
                        'condition'   => 's7upf_show_banner_product_detail:is(on)',
                    ),
                    array(
                        'id'          => 's7upf_banner_bg_product_detail',
                        'label'       => esc_html__('Background banner','fruitshop'),
                        'type'        => 'upload',
                        'section'     => 'option_woo',
                        'desc'=>esc_html__('Select image from library','fruitshop'),
                        'condition'   => 's7upf_show_banner_product_detail:is(on)',
                    ),
                    array(
                        'label' => esc_html__('Layout setting','fruitshop'),
                        'id' => 'mb_layout_setting',
                        'type' => 'tab'
                    ),
                    array(
                        'id'          => 's7upf_sidebar_position_detail_product',
                        'label'       => esc_html__('Sidebar position product page','fruitshop'),
                        'type'        => 'select',
                        'desc'=>esc_html__('Left, or Right, or Center (Default get in Theme Option)','fruitshop'),
                        'choices'     => array(
                            array(
                                'value'=>'',
                                'label'=>esc_html__('--- Theme option ---','fruitshop'),
                            ),
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
                        'id'          => 's7upf_sidebar_detail_product',
                        'label'       => esc_html__('Sidebar select product page','fruitshop'),
                        'type'        => 'sidebar-select',
                        'condition'   => 's7upf_sidebar_position_detail_product:not(no),s7upf_sidebar_position_detail_product:not()',
                        'desc'        => esc_html__('Choose one style of sidebar for WooCommerce page','fruitshop'),
                    ),

                    array(
                        'id'          => 's7upf_header_product_detail',
                        'label'       => esc_html__('Header Page','fruitshop'),
                        'type'        => 'select',
                        'choices'     => s7upf_list_header_page(),
                        'desc'        => esc_html__('Select page to header in product detail','fruitshop'),
                    ),
                    array(
                        'id'          => 's7upf_footer_product_detail',
                        'label'       => esc_html__('Footer Page','fruitshop'),
                        'type'        => 'select',
                        'choices'     => s7upf_list_footer_page(),
                        'desc'        => esc_html__('Select page to footer in product detail','fruitshop'),
                    ),
                )
            );
            if(function_exists('ot_register_meta_box')){
                ot_register_meta_box($s7upf_metabox);
            }
        }


        static function s7upf_tempalte_mini_cart($html){
            $show_mode = s7upf_check_catelog_mode();
            $hide_minicart = s7upf_get_option('hide_minicart');
            if($show_mode == 'on' && $hide_minicart == 'on') $html = '';
            return $html;
        }

        static function s7upf_custom_add_to_cart_link($content){
            $hide_other_page = s7upf_get_option('hide_other_page');
            $show_mode = s7upf_check_catelog_mode();
            if($show_mode == 'on' and $hide_other_page == 'on') $content = '';
            return $content;
        }
        static function s7upf_catelog_custom_button(){
            $html = '';
            $show_button_catalog = s7upf_get_option('show_button_catalog');
            $hide_detail = s7upf_get_option('hide_detail');
            $button_text_catalog = s7upf_get_option('button_text_catalog');
            $url_protocol_type = s7upf_get_option('url_protocol_type');
            $link_url_catalog = s7upf_get_option('link_url_catalog');
            if($show_button_catalog == 'on' and $hide_detail == 'on'){
                if($url_protocol_type == 'email'){
                    $html .= '<a href="mailto:'.$link_url_catalog.'" class="single_add_to_cart_button button alt mb_button_catalog"><i class="fa fa-envelope-o" aria-hidden="true"></i>'.$button_text_catalog.'</a>';
                }elseif ($url_protocol_type == 'phone_number'){
                    $html .= '<a href="tel:'.$link_url_catalog.'" class="single_add_to_cart_button button alt mb_button_catalog"><i class="fa fa-phone" aria-hidden="true"></i>'.$button_text_catalog.'</a>';
                }elseif ($url_protocol_type == 'skype'){
                    $html .= '<a href="skype:'.$link_url_catalog.'?userinfo" class="single_add_to_cart_button button alt mb_button_catalog"><i class="fa fa-skype" aria-hidden="true"></i>'.$button_text_catalog.'</a>';
                }else{
                    $html .= '<a href="'.esc_url($link_url_catalog).'" class="single_add_to_cart_button button alt mb_button_catalog">'.$button_text_catalog.'</a>';
                }

            }

            echo balanceTags($html);
        }
        static function s7upf_filter_single_add_to_cart(){
            $hide_detail = s7upf_get_option('hide_detail');

            $show_mode = s7upf_check_catelog_mode();
            if($show_mode == 'on' and $hide_detail == 'on'){
                remove_action( 's7upf_template_single_add_to_cart', 'woocommerce_template_single_add_to_cart', 30);
                add_action( 's7upf_template_single_add_to_cart', array(__CLASS__, 's7upf_catelog_custom_button'), 40);

            }
        }
        static function s7upf_change_price_html($price, $product){
            $text_price = s7upf_get_option('text_price');
            $show_mode = s7upf_check_catelog_mode();
            if($show_mode == 'on'){
                if(!empty($text_price)){
                    $price = $text_price;
                }else{
                    $price = '';
                }
            }

            return $price;
        }
        static  function s7upf_fix_add_cart($args){
            if(isset($args['class'])){
                $class = str_replace('ajax_add_to_cart', 'mb-ajax_add_to_cart', $args['class']);
                $args['class'] = $class;
            }
            return $args;
        }
    }
    S7upf_Woocommerce_Controller::_init();
}