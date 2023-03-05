<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17/04/2017
 * Time: 15:55
 */
$_product = wc_get_product( get_the_ID() );
?>
<ul class="list-inline-block wrap-qty-extra">
    <li>
        <div class="mb_detail-qty">
           <?php do_action('s7upf_template_single_add_to_cart'); ?>
        </div>

    </li>
    <?php if($_product->is_type('simple') || $_product->is_type('external')){?>
    <li>
        <div class="product-extra-link">
           <?php
               echo s7up_wishlist_url();
               echo s7upf_compare_url();
           ?>
        </div>
    </li>
    <?php } ?>
</ul>
