<?php
/**
 * Reports Template
 *
 * This template can be overridden by copying it to yourtheme/wc-vendors/dashboard/reports.php
 *
 * @author		Jamie Madden, WC Vendors
 * @package 	WCVendors/Templates/dashboard
 * @version 	2.0.0

 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<div class="dashboard-reports ">
    <h2 class="title18 text-uppercase font-bold title-sales-report"><?php esc_html_e( 'Sales Report', 'fruitshop' ); ?></h2>

    <?php

    if ( $datepicker !== 'false' ) {
        wc_get_template( 'date-picker.php', array(
            'start_date' => $start_date,
            'end_date'   => $end_date,
        ), 'wc-vendors/dashboard/', wcv_plugin_dir . 'templates/dashboard/' );
    }

    ?>

    <table class="table shop_table  table-condensed table-vendor-sales-report">
        <thead>
        <tr>
            <th class="product-header"><?php esc_html_e( 'Product', 'fruitshop' ); ?></th>
            <th class="quantity-header"><?php esc_html_e( 'Quantity', 'fruitshop' ) ?></th>
            <th class="commission-header"><?php esc_html_e( 'Commission', 'fruitshop' ) ?></th>
            <th class="rate-header"><?php esc_html_e( 'Rate', 'fruitshop' ) ?></th>
            <th></th>
        </thead>
        <tbody>

        <?php if ( !empty( $vendor_summary ) ) : ?>


            <?php if ( !empty( $vendor_summary[ 'products' ] ) ) : ?>

                <?php foreach ( $vendor_summary[ 'products' ] as $product ) :
                    $_product = wc_get_product( $product[ 'id' ] ); ?>

                    <tr>

                        <td class="product"><strong><a
                                    href="<?php echo esc_url( get_permalink( $_product->get_id() ) ) ?>"><?php echo $product[ 'title' ] ?></a></strong>
                            <?php if ( !empty( $_product->variation_id ) ) {
                                echo woocommerce_get_formatted_variation( $_product->variation_data );
                            } ?>
                        </td>
                        <td class="qty"><?php echo $product[ 'qty' ]; ?></td>
                        <td class="commission"><?php echo wc_price( $product[ 'cost' ] ); ?></td>
                        <td class="rate"><?php echo sprintf( '%.2f%%', $product[ 'commission_rate' ] ); ?></td>

                        <?php if ( $can_view_orders ) : ?>
                            <td>
                                <a href="<?php echo $product[ 'view_orders_url' ]; ?>"><?php esc_html_e( 'Show Orders', 'fruitshop' ); ?></a>
                            </td>
                        <?php endif; ?>

                    </tr>

                <?php endforeach; ?>

                <tr>
                    <td><strong><?php esc_html_e( 'Totals', 'fruitshop' ); ?></strong></td>
                    <td><?php echo $vendor_summary[ 'total_qty' ]; ?></td>
                    <td><?php echo wc_price( $vendor_summary[ 'total_cost' ] ); ?></td>
                    <td></td>

                    <?php if ( $can_view_orders ) : ?>
                        <td></td>
                    <?php endif; ?>

                </tr>

            <?php else : ?>

                <tr>
                    <td colspan="4"
                        style="text-align:center;"><?php esc_html_e( 'You have no sales during this period.', 'fruitshop' ); ?></td>
                </tr>

            <?php endif; ?>



        <?php else : ?>

            <tr>
                <td colspan="4"
                    style="text-align:center;"><?php esc_html_e( 'You haven\'t made any sales yet.', 'fruitshop' ); ?></td>
            </tr>

        <?php endif; ?>

        </tbody>
    </table>
</div>