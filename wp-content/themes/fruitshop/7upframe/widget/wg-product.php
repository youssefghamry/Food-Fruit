<?php
/**
 * Created by Sublime Text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:20 AM
 */
if ( !class_exists('WC_Product') ) {
    return;
}
if(!class_exists('S7upf_List_products'))
{
    class S7upf_List_products extends WP_Widget {


        protected $default=array();

        static function _init()
        {
            add_action( 'widgets_init', array(__CLASS__,'_add_widget') );
        }

        static function _add_widget()
        {
            register_widget( 'S7upf_List_products' );
        }

        function __construct() {
            // Instantiate the parent object
            parent::__construct( false, esc_html__('SV Products','fruitshop'),
                array( 'description' => esc_html__( 'Get products widget', 'fruitshop' ), ));

            $this->default=array(
                'title'     => '',
                'number'     => '',
                'product_type'     => '',
            );
        }

        function widget( $args, $instance ) {
            // Widget output
            $html = $number = $product_type = '' ;
            echo balancetags($args['before_widget']);
            if ( ! empty( $instance['title'] ) ) {
                echo balancetags($args['before_title']) . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
            }
            $instance = wp_parse_args($instance,$this->default);
            extract($instance);
            $args_post=array(
                'post_type'         => 'product',
                'posts_per_page'    => (int)$number,
                'orderby'           => 'date',
                'post_status'    => 'publish',
            );
            if($product_type == 'toprate'){
                $args_post['meta_key'] = '_wc_average_rating';
                $args_post['meta_query'] = WC()->query->get_meta_query();
                $args_post['tax_query'] = WC()->query->get_tax_query();
                $args_post['no_found_rows'] = 1;
                $args_post['orderby'] = 'meta_value_num';
                $args_post['order'] = 'DESC';
            }
            if($product_type == 'mostview'){
                $args_post['meta_key'] = 'post_views';
                $args_post['orderby'] = 'meta_value_num';
            }
            if($product_type == 'bestsell'){
                $args_post['meta_key'] = 'total_sales';
                $args_post['orderby'] = 'meta_value_num';
                $args_post['meta_query'] = WC()->query->get_meta_query();
                $args_post['tax_query'] = WC()->query->get_tax_query();
                $args_post['ignore_sticky_posts'] = 1;
            }
            if($product_type=='onsale'){
                $args_post['meta_query']['relation']= 'OR';
                $args_post['meta_query'][]=array(
                    'key'   => '_sale_price',
                    'value' => 0,
                    'compare' => '>',
                    'type'          => 'numeric'
                );
                $args_post['meta_query'][]=array(
                    'key'   => '_min_variation_sale_price',
                    'value' => 0,
                    'compare' => '>',
                    'type'          => 'numeric'
                );
            }
            if($product_type == 'featured'){
                $args_post['tax_query'][] = array(
                    'taxonomy' => 'product_visibility',
                    'field'    => 'name',
                    'terms'    => 'featured',
                    'operator' => 'IN',
                );

            }
            $query = new WP_Query($args_post);
            $class='';
            if($query->post_count>5 and empty($instance['title'])) $class = 'phantrang';
            $html .= '<div class="wg-product-slider '.$class.'"><div class="wrap-item group-navi" data-pagination="false" data-navigation="true" data-itemscustom="[[0,1],[560,2],[768,1]]">';
            $html .= S7upf_Template::load_view('widget/product',false,array(
               'query'=>$query
            ));
            $html .= '</div></div>';
            wp_reset_postdata();
            echo balancetags($html);
            echo balancetags($args['after_widget']);
        }

        function update( $new_instance, $old_instance ) {

            // Save widget options
            $instance=array();
            $instance=wp_parse_args($instance,$this->default);
            $new_instance=wp_parse_args($new_instance,$instance);

            return $new_instance;
        }

        function form( $instance ) {
            // Output admin widget options form

            $instance=wp_parse_args($instance,$this->default);
            extract($instance);
            ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:' ,'fruitshop'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number', 'fruitshop'); ?>: </label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="number" min = "0" value="<?php echo esc_attr($number); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('product_type')); ?>"><?php esc_html_e('Product Type', 'fruitshop'); ?>: </label>
                <select id="<?php echo esc_attr($this->get_field_id( 'product_type' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'product_type' )); ?>">
                    <option value="" <?php if($product_type == '') echo'selected="selected"';?>><?php esc_html_e('Recent Product','fruitshop');?></option>
                    <option value="featured" <?php if($product_type == 'featured') echo'selected="selected"';?>><?php esc_html_e('Featured Product','fruitshop');?></option>
                    <option value="onsale" <?php if($product_type == 'onsale') echo'selected="selected"';?>><?php esc_html_e('Sale Product','fruitshop');?></option>
                    <option value="bestsell" <?php if($product_type == 'bestsell') echo'selected="selected"';?>><?php esc_html_e('Bestsell Product','fruitshop');?></option>
                    <option value="toprate" <?php if($product_type == 'toprate') echo'selected="selected"';?>><?php esc_html_e('Top rate Product','fruitshop');?></option>
                    <option value="mostview" <?php if($product_type == 'mostview') echo'selected="selected"';?>><?php esc_html_e('Most view Product','fruitshop');?></option>
                </select>
            </p>
            <?php
        }
    }

    S7upf_List_products::_init();

}
