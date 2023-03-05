<?php
/**
 * Created by PhpStorm
 * User: up7theme
 * Date: 29/02/16
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_blog'))
{
    function s7upf_vc_blog($attr)
    {
        $html = $class_nav = $autoplay= $number_item_desktop = $load_more =$button_view= $image_size_vertical = $image_size_small = $date_format = $main_color = $user_id = $col_layout = $style = $post_format = $post_id = $word_excerpt = $image_size = $pagination = $number = $order_by = $order = '';
        extract(shortcode_atts(array(
            'number'     => '8',
            'word_excerpt'    => '30',
            'cats'      => '',
            'order'      => '',
            'order_by'   => '',
            'style'   => 'style1',
            'image_size'   => '',
            'pagination'   => 'off',
            'post_id'   => '',
            'user_id'   => 'off',
            'post_format'   => '',
            'load_more'   => 'off',
            'col_layout'   => '12',
            'main_color'   => '',
            'date_format'   => '',
            'button_view'   => '',
            'image_size_small'   => '', //style 6
            'image_size_vertical'   => '', //style 5
            'number_item_desktop'   => '', //style 7
            'autoplay'   => 'true', //style 7
        ),$attr));
        $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => $number,
            'orderby'           => $order_by,
            'order'             => $order,
            'paged'             => $paged,
            'post_status' => 'publish',
        );
        if($order_by == 'post_views'){
            $args['orderby'] = 'meta_value_num';
            $args['meta_key'] = 'post_views';
        }
        if($order_by == 'time_update'){
            $args['orderby'] = 'meta_value';
            $args['meta_key'] = 'time_update';
        }
        if($order_by == '_post_like_count'){
            $args['orderby'] = 'meta_value_num';
            $args['meta_key'] = '_post_like_count';
        }
        if(!empty($cats)) {
            $custom_list = explode(",",$cats);
            $args['tax_query'][]=array(
                'taxonomy'=>'category',
                'field'=>'slug',
                'terms'=> $custom_list
            );
        }
        $query = new WP_Query($args);
        if($user_id == 'on' and !empty($post_id)){
            $ids_arr = explode(',', $post_id);
            $ids_arr = array_unique($ids_arr);
            $args2 = array(
                'post_type' => 'post',
                'post__in'=>$ids_arr,
                'posts_per_page'    => $number,
                'paged'             => $paged,
                'post_status' => 'publish',
                'order'             => $order,
                'orderby'           => $order_by,
            );
            $query = new WP_Query($args2);
        }
        $max_page = $query->max_num_pages;
        if('style2' === $style )
            $html .='<div class="content-shop mb-element-blog-masonry"><div class="masonry-list-post">';

        $html .= S7upf_Template::load_view('elements/blog/blog',$style,array(
            'query' => $query,
            'word_excerpt' => $word_excerpt,
            'image_size' => $image_size,
            'post_format' => $post_format,
            'pagination' => $pagination,
            'paged' => $paged,
            'col_layout' => $col_layout,
            'main_color' => $main_color,
            'date_format' => $date_format,
            'image_size_small' => $image_size_small, //style 6
            'image_size_vertical' => $image_size_vertical, //style 5
            'button_view' => $button_view,
            'number_item_desktop' => $number_item_desktop,
            'autoplay' => $autoplay,
            'post_format' => $post_format,

        ));

        if('style2' === $style ){
            $html .='</div>';
            if($max_page>1 and 'on' == $load_more){
                $html .='<div class="text-center">
                            <a href="#" class="btn-arrow color masonry-ajax" data-postid = "'.$post_id.'"  data-imgsize = "'.$image_size.'" data-wordexcerpt = "'.$word_excerpt.'" data-cat="'.$cats.'" data-userid="'.$user_id.'" data-postformat="'.$post_format.'" data-number="'.$number.'"  data-order="'.$order.'" data-orderby="'.$order_by.'" data-paged="1"  data-maxpage="'.$max_page.'">'.esc_html__('Load more','fruitshop').'</a>
                        </div>';
            }

            $html .='</div>';
        }


        wp_reset_postdata();
        return $html;
    }
}

stp_reg_shortcode('s7upf_blog','s7upf_vc_blog');

vc_map( array(
    "name"      => esc_html__("SV Blog", 'fruitshop'),
    "base"      => "s7upf_blog",
    "icon"      => "icon-st",
    "category"  => '7Up-theme',
    "params"    => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Style blog",'fruitshop'),
            "param_name" => "style",
            'admin_label' => true,
            'description'   => esc_html__( 'Select style blog.', 'fruitshop' ),
            "value"         => array(
                esc_html__('Style 1 (Post list)','fruitshop') => 'style1',
                esc_html__('Style 2 (Masonry)','fruitshop') => 'style2',
                esc_html__('Style 3 (Grid)','fruitshop') => 'style3',
                esc_html__('Style 4 (Classic)','fruitshop') => 'style4',
                esc_html__('Style 5 (Classic)','fruitshop') => 'style5',
                esc_html__('Style 6 (Classic)','fruitshop') => 'style6',
                esc_html__('Style 7 (slider)','fruitshop') => 'style7',
                esc_html__('Style 8 (slider)','fruitshop') => 'style8',
            ),
        ),
        array(
            'type' => 's7up_image_check',
            'param_name' => 'style_blog',
            'heading' => '',
            'element' => 'style',
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("User ID post",'fruitshop'),
            "param_name" => "user_id",
            'admin_label' => true,
            "value"         => array(
                esc_html__('Off','fruitshop') => 'off',
                esc_html__('On','fruitshop') => 'on',
            ),
        ),
        array(
            'type' => 'autocomplete',
            'heading' => __( 'Posts', 'fruitshop' ),
            'param_name' => 'post_id',
            'edit_field_class'=>'vc_col-sm-12 vc_column',
            'settings' => array(
                'multiple' => true,
                'sortable' => true,
                'unique_values' => true,
                // In UI show results except selected. NB! You should manually check values in backend
            ),
            'save_always' => true,
            'description' => __( 'Enter List of Posts', 'fruitshop' ),
            'dependency'    =>array(
                'element'   =>'user_id',
                'value'     =>array('on')
            ),
        ),
        array(
            "type" => "s7up_number",
            "heading" => esc_html__("Number post",'fruitshop'),
            "param_name" => "number",
            'edit_field_class'=>'vc_col-sm-12 vc_column',
            'admin_label' => true,
            'std' => 8,
            "min" => 0,
            'suffix' => esc_html__('Post','fruitshop'),

        ),
        array(
            'holder'     => 'div',
            'heading'     => esc_html__( 'Categories', 'fruitshop' ),
            'type'        => 'checkbox',
            'param_name'  => 'cats',
            'value'       => s7upf_list_taxonomy('category',false),
            'edit_field_class'=>'vc_col-sm-12 vc_column s7upf-category-option',
            'dependency'    =>array(
                'element'   =>'user_id',
                'value'     =>array('off')
            ),
        ),
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Order",'fruitshop'),
            "param_name"    => "order",
            "value"         => array(
                esc_html__('Desc','fruitshop') => 'DESC',
                esc_html__('Asc','fruitshop')  => 'ASC',
            ),
            'edit_field_class'=>'vc_col-sm-6 vc_column',

        ),
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Order By",'fruitshop'),
            "param_name"    => "order_by",
            "value"         => s7upf_get_order_list(),
            'edit_field_class'=>'vc_col-sm-6 vc_column',

        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Column layout', 'fruitshop'),
            'param_name' => 'col_layout',
            'edit_field_class'=>'vc_col-sm-6 vc_column',
            'value' => array(
                esc_html__("Columns 1", 'fruitshop') => '12',
                esc_html__("Columns 2", 'fruitshop') => '6',
                esc_html__("Columns 3", 'fruitshop') => '4',
                esc_html__("Columns 4", 'fruitshop') => '3',
            ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style3')
            ),
        ),
        array(
            "type" => "s7up_number",
            "heading" => esc_html__("Number word excerpt",'fruitshop'),
            "param_name" => "word_excerpt",
            'edit_field_class'=>'vc_col-sm-6 vc_column',
            "min" => 0,
            'suffix' => esc_html__('word','fruitshop'),
            'std'=>30
        ),
        array(
            "type" => "vc_link",
            "heading" => esc_html__("Add button view all",'fruitshop'),
            "param_name" => "button_view",
            'edit_field_class'=>'vc_col-sm-6 vc_column',
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style4')
            ),
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Enable Pagination', 'fruitshop'),
            'param_name' => 'pagination',
            'edit_field_class'=>'vc_col-sm-6 vc_column',
            'value' => array(
                esc_html__("Off", 'fruitshop') => 'off',
                esc_html__("On", 'fruitshop') => 'on'
            ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style1','style3')
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Enable load more', 'fruitshop'),
            'param_name' => 'load_more',
            'edit_field_class'=>'vc_col-sm-6 vc_column',
            'value' => array(
                esc_html__("Off", 'fruitshop') => 'off',
                esc_html__("On", 'fruitshop') => 'on'
            ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style2')
            ),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Turn off post format', 'fruitshop'),
            'param_name' => 'post_format',
            'edit_field_class'=>'vc_col-sm-12 vc_column',
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style1','style2')
            ),
        ),
        array(
            'type' => 'colorpicker',
            'group' => esc_html__('Design Option','fruitshop'),
            'heading' => esc_html__( 'Main color', 'fruitshop' ),
            'param_name' => 'main_color',
            'description' => esc_html__('Select color.', 'fruitshop'),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style3','style6')
            ),
        ),
        array(
            'type' => 'textfield',
            'group' => esc_html__('Design Option','fruitshop'),
            'heading' => esc_html__( 'Custom Date Format (Default get in Settings/General)', 'fruitshop' ),
            'param_name' => 'date_format',
            'description' => wp_kses(__('Eg: d/m/Y <a href="https://codex.wordpress.org/Formatting_Date_and_Time" target="_blank">Documentation on date and time formatting</a>','fruitshop'),array('a' => array('href' => array(),'target'=>array()))),


        ),
        array(
            'type' => 'textfield',
            'group' => esc_html__('Design Option','fruitshop'),
            'heading' => esc_html__('Custom image size', 'fruitshop'),
            'param_name' => 'image_size',
            'edit_field_class' => 'vc_column vc_col-sm-12',
            'description' => esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'fruitshop'),
        ),
        array(
            'type' => 'textfield',
            'group' => esc_html__('Design Option','fruitshop'),
            'heading' => esc_html__('Custom image size item post small', 'fruitshop'),
            'param_name' => 'image_size_small',
            'edit_field_class' => 'vc_column vc_col-sm-12',
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style6')
            ),
            'description' => esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'fruitshop'),
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
                'value' => array('style7','style8')
            ),
            'description' => esc_html__( 'Select number column of slides to display (990px screen).', 'fruitshop' )
        ),
        array(
            'type' => 'dropdown',
            'group' => esc_html__('Design Option','fruitshop'),
            'heading' => esc_html__( 'Auto play silder', 'fruitshop' ),
            'param_name' => 'autoplay',
            'dependency'    =>array(
                'element'   =>'style',
                'value' => array('style7','style8')
            ),
            'value' => array(
                esc_html__('On','fruitshop') => 'true',
                esc_html__('Off','fruitshop') => 'false',

            ),
            'description' => esc_html__( 'This allows you to enable or disable autoplay of slider.', 'fruitshop' )
        ),
        array(
            'type' => 'textfield',
            'group' => esc_html__('Design Option','fruitshop'),
            'heading' => esc_html__('Custom image size item post vertical', 'fruitshop'),
            'param_name' => 'image_size_vertical',
            'edit_field_class' => 'vc_column vc_col-sm-12',
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style5')
            ),
            'description' => esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'fruitshop'),
        ),
    )
));

add_action( 'wp_ajax_load_more_post_masonry', 's7upf_load_more_post_masonry' );
add_action( 'wp_ajax_nopriv_load_more_post_masonry', 's7upf_load_more_post_masonry' );
if(!function_exists('s7upf_load_more_post_masonry')){
    function s7upf_load_more_post_masonry() {
        $number         = $_POST['number'];
        $order_by       = $_POST['orderby'];
        $order          = $_POST['order'];
        $cats           = $_POST['cats'];
        $paged          = $_POST['paged'];
        $user_id          = $_POST['userid'];
        $post_id          = $_POST['postid'];
        $word_excerpt          = absint($_POST['wordexcerpt']);
        $image_size          = $_POST['imgsize'];
        $postformat        = $_POST['postformat'];
        $html = '';
        $args   =   array(
            'post_type'         => 'post',
            'posts_per_page'    => $number,
            'orderby'           => $order_by,
            'order'             => $order,
            'paged'             => $paged + 1,
            'post_status' => 'publish',
        );
        if($order_by == 'post_views'){
            $args['orderby'] = 'meta_value_num';
            $args['meta_key'] = 'post_views';
        }
        if($order_by == 'time_update'){
            $args['orderby'] = 'meta_value';
            $args['meta_key'] = 'time_update';
        }
        if($order_by == '_post_like_count'){
            $args['orderby'] = 'meta_value_num';
            $args['meta_key'] = '_post_like_count';
        }
        if(!empty($cats)) {
            $custom_list = explode(",",$cats);
            $args['tax_query']['relation'] = 'AND';
            $args['tax_query'][]=array(
                'taxonomy'  => 'category',
                'field'     => 'slug',
                'terms'     => $custom_list
            );
        }
        $query = new WP_Query($args);
        if($user_id == 'on' and !empty($post_id)){
            $ids_arr = explode(',', $post_id);
            $ids_arr = array_unique($ids_arr);
            $args2 = array(
                'post_type' => 'post',
                'post__in'=>$ids_arr,
                'posts_per_page'    => $number,
                'post_status' => 'publish',
                'paged'             => $paged+1,
            );
            $query = new WP_Query($args2);
        }
        $html .= S7upf_Template::load_view('elements/blog/blog-style2',false,array(
            'word_excerpt' => $word_excerpt,
            'image_size' => $image_size,
            'post_format' => $postformat,
            'query' => $query,
        ));

        echo balanceTags($html);
        wp_reset_postdata();
    }
}