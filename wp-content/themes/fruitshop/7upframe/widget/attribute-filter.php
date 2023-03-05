<?php
/**
 * Created by Sublime Text 2.
 * User: thanhhiep992
 * Date: 24/12/15
 * Time: 10:20 AM
 */
if(!class_exists('S7upf_Attribute_Filter') && class_exists("woocommerce")){
    class S7upf_Attribute_Filter extends WP_Widget {


        protected $default=array();

        static function _init()
        {
            add_action( 'widgets_init', array(__CLASS__,'_add_widget') );
        }

        static function _add_widget()
        {
            register_widget( 'S7upf_Attribute_Filter' );
        }

        function __construct() {
            // Instantiate the parent object
            parent::__construct( false, esc_html__('Attribute Filter','fruitshop'),
                array( 'description' => esc_html__( 'Filter product shop page', 'fruitshop' ), ));

            $this->default=array(
                'title'             => '',
                'attribute'         => '',
            );
        }



        function widget( $args, $instance ) {
            // Widget output
            global $post;
            $check_shop = false;
            if(isset($post->post_content)){
                if(strpos($post->post_content, '[s7upf_shop')){
                    $check_shop = true;
                }
            }
            if ( !is_shop() && !is_product_taxonomy() ) {
                if(!$check_shop) return;
            }else{
                $check_shop = true;
            }
            if(!is_single()){
                echo apply_filters('s7upf_output_content',$args['before_widget']);
                if ( ! empty( $instance['title'] ) ) {
                   echo apply_filters('s7upf_output_content',$args['before_title']) . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
                }

                $instance=wp_parse_args($instance,$this->default);
                extract($instance);
                $taxonomy       = "pa_".$attribute;
                $query_type     = 'and';
                $terms          = s7upf_get_terms_filter($taxonomy);
                if(!isset($terms->errors) && !empty($terms)){
                    $terms          = array();                    
                    $term_counts    = $this->get_filtered_term_product_counts( wp_list_pluck( $terms, 'term_id' ), $taxonomy, $query_type ,$check_shop);
                    if(!empty($term_counts)){
                        foreach ($term_counts as $term_id => $count) {
                            $terms[] = get_term_by('id',$term_id,$taxonomy);
                        }
                    }
                }
                if($check_shop) $terms = get_terms("pa_".$attribute);
                if(!empty($terms)){
                    $attr = S7upf_Woocommerce_Attributes::s7upf_get_tax_attribute( "pa_".$attribute );
                    $term_current = '';
                    if(isset($_GET['filter_'.$attribute])) $term_current = sanitize_text_field($_GET['filter_'.$attribute]);
                    if($term_current != '') $term_current = explode(',', $term_current);
                    else $term_current = array();                
                    $class_white_color = '';
                    if(!empty($attr->attribute_type))
                    switch ($attr->attribute_type){
                        case 'image':?>
                            <div class="tawcvs-swatches attribute-type-<?php echo esc_attr($attr->attribute_type); ?>">
                                <?php 
                                if(is_array($terms)){
                                    foreach ($terms as $term){                                
                                        if(is_object($term)){
                                            $value = get_term_meta( $term->term_id, 'image', true );
                                            $image = $value ? wp_get_attachment_image_url( $value, 'thumbnail' ) : '';
                                            $image = $image ?  $image : WC()->plugin_url() . '/assets/images/placeholder.png';
                                            $name     = esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name ) );
                                            if(in_array($term->slug, $term_current)) $selected = 'selected';
                                            else $selected = '';
                                            if(!empty($image)){
                                                echo sprintf(
                                                    '<a data-attribute="%s" data-term="%s" class="load-shop-ajax swatch swatch-image swatch-%s %s" title="%s" data-value="%s" href="%s"><img src="%s" alt="%s"><span class="hide">%s</span></a>',
                                                    esc_attr($attribute),
                                                    esc_attr( $term->slug ),
                                                    esc_attr( $term->slug ),
                                                    $selected,
                                                    esc_attr( $name ),
                                                    esc_attr( $term->slug ),
                                                    esc_url( s7upf_get_filter_url('filter_'.$attr->attribute_name,$term->slug) ),
                                                    esc_url( $image ),
                                                    esc_attr( $name ),
                                                    esc_attr( $name )
                                                );
                                            }

                                        }
                                    }
                                }
                                ?>
                            </div>
                            <?php
                            break;
                        case 'color': ?>
                            <div class="tawcvs-swatches attribute-type-<?php echo esc_attr($attr->attribute_type); ?>">
                                <?php 
                                if(is_array($terms)){
                                    foreach ($terms as $term){
                                        if(is_object($term)){
                                            $color = get_term_meta( $term->term_id, 'color', true );
                                            $name     = esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name ) );
                                            $class_white_color = '';
                                            if(in_array($term->slug, $term_current)) $selected = 'selected';
                                            else $selected = '';
                                            if(!empty($color)){
                                                $white_color = array('#fff','#ffffff');
                                                if(in_array(strtolower($color), $white_color)) $class_white_color = 'class_white_bg_color white-color';
                                                echo sprintf(
                                                    '<a data-attribute="%s" data-term="%s" class="load-shop-ajax swatch swatch-color '.$class_white_color.' swatch-%s %s"  '.s7upf_add_html_attr('border-color:'.$color.';background: '.$color).' title="%s" href="%s"><span class="span-trong" '.s7upf_add_html_attr('background-color:'.$color).'></span></a>',
                                                    esc_attr($attribute),
                                                    esc_attr( $term->slug ),
                                                    esc_attr( $term->slug ),
                                                    $selected,
                                                    esc_attr( $name ),
                                                    esc_url( s7upf_get_filter_url('filter_'.$attr->attribute_name,$term->slug) )
                                                );
                                            }

                                        }
                                    }
                                }
                                ?>
                            </div>
                            <?php
                            break;
                        case 'label': ?>
                            <div class="tawcvs-swatches attribute-type-<?php echo esc_attr($attr->attribute_type); ?>">
                                <?php 
                                if(is_array($terms)){
                                    foreach ($terms as $term){
                                        if(is_object($term)){
                                            $label = get_term_meta( $term->term_id, 'label', true );
                                            $name     = esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name ) );
                                            $label = $label ? $label : $name;
                                            if(in_array($term->slug, $term_current)) $selected = 'selected';
                                            else $selected = '';
                                            if(!empty($label)){
                                                echo sprintf(
                                                    '<a data-attribute="%s" data-term="%s" class="load-shop-ajax swatch swatch-label swatch-%s %s" title="%s" data-value="%s" href="%s">%s</a>',
                                                    esc_attr($attribute),
                                                    esc_attr( $term->slug ),
                                                    esc_attr( $term->slug ),
                                                    $selected,
                                                    esc_attr( $name ),
                                                    esc_attr( $term->slug ),
                                                    esc_url( s7upf_get_filter_url('filter_'.$attr->attribute_name,$term->slug) ),
                                                    esc_html( $label )
                                                );
                                            }

                                        }
                                    }
                                }
                                ?>
                            </div>
                            <?php
                            break;
                        default :
                            echo    '<ul class="list-filter color-filter">';                
                            if(is_array($terms)){
                                foreach ($terms as $term) {
                                    if(is_object($term)){
                                        if(in_array($term->slug, $term_current)) $active = 'active';
                                        else $active = '';
                                        echo    '<li class="'.esc_attr($term->slug).'-inline">
                                                    <a data-attribute="'.esc_attr($attribute).'" data-term="'.esc_attr($term->slug).'" class="load-shop-ajax '.esc_attr($active).' bgcolor-'.esc_attr($term->slug).'" href="'.esc_url(s7upf_get_filter_url('filter_'.$attribute,$term->slug)).'">
                                                    <span></span>'.$term->name.'
                                                    </a>
                                                    <span class="smoke">('.$term->count.')</span>
                                                </li>';
                                    }
                                }
                            }
                            echo    '</ul>';
                            break;
                    }    
                }    
                echo apply_filters('s7upf_output_content',$args['after_widget']);
            }
        }

        protected function get_filtered_term_product_counts( $term_ids, $taxonomy, $query_type ,$check_shop) {
            global $wpdb;            
            if(!$check_shop){
                $tax_query  = WC_Query::get_main_tax_query();
                $meta_query = WC_Query::get_main_meta_query();
                if ( 'or' === $query_type ) {
                    foreach ( $tax_query as $key => $query ) {
                        if ( is_array( $query ) && $taxonomy === $query['taxonomy'] ) {
                            unset( $tax_query[ $key ] );
                        }
                    }
                }

                $meta_query      = new WP_Meta_Query( $meta_query );
                $tax_query       = new WP_Tax_Query( $tax_query );
                $meta_query_sql  = $meta_query->get_sql( 'post', $wpdb->posts, 'ID' );
                $tax_query_sql   = $tax_query->get_sql( $wpdb->posts, 'ID' );

                // Generate query.
                $query           = array();
                $query['select'] = "SELECT COUNT( DISTINCT {$wpdb->posts}.ID ) as term_count, terms.term_id as term_count_id";
                $query['from']   = "FROM {$wpdb->posts}";
                $query['join']   = "
                    INNER JOIN {$wpdb->term_relationships} AS term_relationships ON {$wpdb->posts}.ID = term_relationships.object_id
                    INNER JOIN {$wpdb->term_taxonomy} AS term_taxonomy USING( term_taxonomy_id )
                    INNER JOIN {$wpdb->terms} AS terms USING( term_id )
                    " . $tax_query_sql['join'] . $meta_query_sql['join'];

                $query['where']   = "
                    WHERE {$wpdb->posts}.post_type IN ( 'product' )
                    AND {$wpdb->posts}.post_status = 'publish'"
                    . $tax_query_sql['where'] . $meta_query_sql['where'] .
                    'AND terms.term_id IN (' . implode( ',', array_map( 'absint', $term_ids ) ) . ')';

                if ( $search = WC_Query::get_main_search_query_sql() ) {
                    $query['where'] .= ' AND ' . $search;
                }

                $query['group_by'] = 'GROUP BY terms.term_id';
                $query             = apply_filters( 'woocommerce_get_filtered_term_product_counts_query', $query );
                $query             = implode( ' ', $query );

                // We have a query - let's see if cached results of this query already exist.
                $query_hash    = md5( $query );
                $cached_counts = (array) get_transient( 'wc_layered_nav_counts' );

                if ( ! isset( $cached_counts[ $query_hash ] ) ) {
                    $results                      = $wpdb->get_results( $query, ARRAY_A ); // @codingStandardsIgnoreLine
                    $counts                       = array_map( 'absint', wp_list_pluck( $results, 'term_count', 'term_count_id' ) );
                    $cached_counts[ $query_hash ] = $counts;
                    set_transient( 'wc_layered_nav_counts', $cached_counts, DAY_IN_SECONDS );
                }

                return array_map( 'absint', (array) $cached_counts[ $query_hash ] );
            }
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
                <label><?php esc_html_e( 'Attribute:' ,'fruitshop'); ?></label></br>
                <select id="<?php echo esc_attr($this->get_field_id( 'attribute' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'attribute' )); ?>">
                    <?php 
                    global $wpdb;
                    $attribute_taxonomies = wc_get_attribute_taxonomies();
                    if(!empty($attribute_taxonomies)){
                        foreach($attribute_taxonomies as $attr){
                            $selected=selected($attr->attribute_name,$attribute,false);
                            echo "<option {$selected} value='{$attr->attribute_name}'>{$attr->attribute_label}</option>";
                        }
                    }
                    else echo esc_html__("No any attribute.","fruitshop");
                    ?>
                </select>                
            </p>
        <?php
        }
    }

    S7upf_Attribute_Filter::_init();

}
