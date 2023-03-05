<?php
/**
 * Created by 7upTheme team.
 * User: 7upTheme
 * Date: 12/08/15
 * Time: 10:20 AM
 */
if(class_exists( 'WC_Vendors' )){
    remove_action( 'woocommerce_after_shop_loop_item',array('WCV_Vendor_Shop', 'template_loop_sold_by'), 9 );
    remove_action( 'woocommerce_product_meta_start',array('WCV_Vendor_Cart', 'sold_by_meta'), 10, 2 );

    if ( apply_filters( 'wcvendors_disable_sold_by_labels', wc_string_to_bool( get_option( 'wcvendors_display_label_sold_by_enable', 'no'  ) ) ) ) {
        add_action( 's7upf_vendor_shop_loop_sold_by', array('WCV_Vendor_Shop', 'template_loop_sold_by'), 9 );
    }

    if ( 'yes' == get_option( 'wcvendors_display_label_sold_by_enable', 'no'  ) ) {
        add_action( 'woocommerce_product_meta_start', 's7upf_sold_by_vendor_meta', 10, 2 );
    }


    if(!function_exists('s7upf_sold_by_vendor_meta')){
        function s7upf_sold_by_vendor_meta() {
            $vendor_id = get_the_author_meta( 'ID' );
            $sold_by_label = get_option( 'wcvendors_label_sold_by' );
            $sold_by_label = '<label>'.$sold_by_label.':&nbsp;</label>';
            $sold_by = WCV_Vendors::is_vendor( $vendor_id )
                ? sprintf( '<a href="%s" class="wcvendors_cart_sold_by_meta">%s</a>', WCV_Vendors::get_vendor_shop_page( $vendor_id ), WCV_Vendors::get_vendor_sold_by( $vendor_id ) )
                : get_bloginfo( 'name' );
            echo '<div class="wcvendor-sold-by-meta">';
            echo apply_filters('wcvendors_cart_sold_by_meta', $sold_by_label, get_the_ID(), $vendor_id ) .''. $sold_by;
            echo '</div>';
        }
    }
}