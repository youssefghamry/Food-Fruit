<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14/04/2017
 * Time: 14:23
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

$type = 'grid';
if(isset($type)){
    $type = s7upf_get_option('woo_style_view_way_product');
}

if(isset($_GET['type'])){
    $type = $_GET['type'];
}
?>
<div class="shop-pagibar clearfix">
    <div class="desc silver pull-left"><?php woocommerce_result_count(); ?></div>
    <ul class="wrap-sort-view list-inline-block pull-right">
        <li>
            <div class="sort-bar">
                <span class="inline-block"><?php echo esc_html__('Sort:','fruitshop'); ?></span>
                <div class="select-box border radius6 inline-block">
                    <?php
                    woocommerce_catalog_ordering()
                    ?>
                </div>
            </div>
        </li>
        <li class="mb-view-grid-list">
            <div class="view-bar">
                <a  data-type="grid" class="grid-view load-shop-ajax <?php if('grid' === $type) echo 'active'?>" href="<?php echo esc_url(s7upf_get_key_url('type','grid'))?>"></a>
                <a   data-type="list" class="list-view load-shop-ajax <?php if('list' === $type) echo 'active'?>" href="<?php echo esc_url(s7upf_get_key_url('type','list'))?>"></a>
            </div>
        </li>
    </ul>
</div>
