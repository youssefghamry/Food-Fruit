<?php
/**
 * Links Template
 *
 * This template can be overridden by copying it to yourtheme/wc-vendors/dashboard/links.php
 *
 * @author		Jamie Madden, WC Vendors
 * @package 	WCVendors/Templates/dashboard
 * @version 	2.0.0

 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<?php wc_print_notices(); ?>

<div class="text-left dashboard-links">
        <a href="<?php echo $shop_page; ?>" class="button">
            <i class="fa fa-shopping-basket"></i>
            <?php echo esc_html__( 'View Your Store', 'fruitshop' ); ?>
        </a>
        <a href="<?php echo $settings_page; ?>" class="button">
            <i class="fa fa-cog"></i>
            <?php echo esc_html__( 'Store Settings', 'fruitshop' ); ?>
        </a>

        <?php if ( $can_submit ) { ?>
            <a target="_TOP" href="<?php echo $submit_link; ?>" class="button">
                <i class="fa fa-file-text-o"></i>
                <?php echo esc_html__( 'Add New Product', 'fruitshop' ); ?>
            </a>
            <a target="_TOP" href="<?php echo $edit_link; ?>" class="button">
                <i class="fa fa-pencil-square-o"></i>
                <?php echo esc_html__( 'Edit Products', 'fruitshop' ); ?>
            </a>
        <?php }
        do_action( 'wcvendors_after_links' );
        ?>
</div>