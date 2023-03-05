<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 21/04/2017
 * Time: 10:28
 */
$vip_args = '';
$image_size_button_ajax=$image_size;
$image_size  = s7upf_get_size_image('300x300',$image_size);
//check layout style
switch ($style_layout){
    case 'style1':
        $class_main = 'featured-product2 mb-element-product-style13';
        $class_ul = 'list-inline-block text-center title-tab-icon';
        $class_product_slider = 'product-slider';
        $class_item_product = 'item-product border text-center';
        $class_title = 'color2 title30 text-center title-box2';
        $class_icon_title = '';
        if(empty($number_item_desktop_tab)) $number_item_desktop_tab = '4';
        $size_icon = array(40,34);
        break;
    case 'style2':
        $class_main = 'product-tab3 '.$pull_product.' mb-element-product-style13-2';
        $class_ul = 'text-center title-tab1 title-tab-layout2 list-inline-block';
        $class_product_slider = 'deal-slider2 product-slider';
        $class_item_product = 'item-product item-deal-product2 text-center';
        $class_title = 'title30 text-center font-bold';
        $class_icon_title = '';
        if(empty($number_item_desktop_tab)) $number_item_desktop_tab = '2';
        $size_icon = array(20,20);
        break;
    case 'style3':
        $class_main = 'mb-element-product-style13-2';
        if('style2'===$style_nav_tab){
            $class_ul = 'list-inline-block text-center title-tab-icon';
        } else{
            $class_ul = 'list-inline-block text-center title-tab-icon3';
        }
        $class_product_slider = 'list-price-off clearfix';
        $class_item_product = 'item-product-price table';
        $class_title = 'title30 text-center font-bold';
        $class_icon_title = 'wobble-horizontal';
        $size_icon = array(40,34);
        break;
    default:
        $class_main = 'product-tab4 bg-white drop-shadow mb-element-product-style13-4';
        $class_ul = 'title-tab1 list-inline-block';
        $class_product_slider = 'product-slider';
        $class_item_product = 'item-product item-product1 text-center';
        $class_title = 'title30 font-bold text-uppercase';
        $class_icon_title = '';
        if(empty($number_item_desktop_tab)) $number_item_desktop_tab = '4';
        $size_icon = array(20,20);
        break;
}
$time= uniqid();
if('style6' === $style_layout){?>

    <div class="product-block7">
        <?php if(!empty($title)) { ?>
            <h2 class="title30 font-bold title-box1 text-center"><?php echo esc_attr($title); ?></h2>
        <?php } ?>
        <?php if(!empty($data_item_tab) and is_array($data_item_tab)){ ?>
            <ul class="text-center title-tab1 list-inline-block">
                <?php foreach ($data_item_tab as $key => $value){
                    if($key +1 == $position_tab_active) $class_active = 'active'; else $class_active ='';
                    ?>
                    <li class="<?php echo esc_attr($class_active); ?>"><a href="#tab-vip<?php echo esc_attr($key); echo esc_attr($time); ?>" data-toggle="tab"><?php if(!empty($value['title'])) echo esc_attr($value['title']); ?></a></li>
                <?php } ?>
            </ul>
            <div class="row">
                <?php if('on'===$show_box_tab6) {
                    $button_tab6 = vc_build_link($button_tab6); ?>
                    <div class="col-md-3 col-sm-4 col-xs-6">
                        <div class="block-adv7 banner-quangcao zoom-image line-scale">
                            <a href="<?php echo (!empty($button_tab6['url']))? esc_url($button_tab6['url']): '#'; ?>" class="adv-thumb-link">
                                <img src="<?php echo wp_get_attachment_image_url($image_tab6,'full'); ?>">
                            </a>
                            <div class="banner-info white text-center">
                                <h2 class="title30 title-underline"><?php echo esc_attr($title_tab6); ?> </h2>
                                <h3 class="title30 font-bold"><?php echo esc_attr($title2_tab6); ?></h3>
                                <a href="<?php echo (!empty($button_tab6['url']))? esc_url($button_tab6['url']): '#'; ?>" <?php if(empty($button_tab6['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($button_tab6['target']))?'_blank':'_parent'; ?>" class="btn-arrow white text-uppercase"><?php echo esc_attr($button_tab6['title']); ?></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="<?php echo ('on'===$show_box_tab6) ?'col-md-9 col-sm-8 col-xs-6':'col-md-12'?>">
                    <div class="tab-content">
                        <?php

                        foreach ($data_item_tab as $key => $value){
                            $link ='';
                            if($key +1 == $position_tab_active) $class_active = 'active'; else $class_active =''; ?>
                            <div id="tab-vip<?php echo esc_attr($key); echo esc_attr($time); ?>" class="tab-pane <?php echo esc_attr($class_active); ?>">
                                <div class="product-slider woocommerce product-slider1">
                                    <div class="wrap-item" data-pagination="false" data-navigation="true" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-itemscustom="[[0,1],[768,2],[1024,3],[1200,<?php echo esc_attr($number_item_desktop_tab)?>]]">
                                    <?php
                                        if(empty($value['product_number'])) $value['product_number']=12;
                                        if ($value['order_by'] == 'best_seller') {
                                            $vip_args = array(
                                                'post_type' => 'product',
                                                'meta_key' => 'total_sales',
                                                'orderby' => 'meta_value_num',
                                                'post_status'    => 'publish',
                                                'order' => $value['order'],
                                                'posts_per_page' => $value['product_number']
                                            );
                                        } elseif ($value['order_by'] == 'top_rating') {
                                            $vip_args = array(
                                                'post_type' => 'product',
                                                'post_status'    => 'publish',
                                                'posts_per_page' => $value['product_number'],
                                                'meta_key' => '_wc_average_rating',
                                                'orderby'        => 'meta_value_num',
                                                'order'          => $value['order'],
                                                'meta_query'     => WC()->query->get_meta_query(),
                                                'tax_query'      => WC()->query->get_tax_query(),
                                            );
                                            $vip_args['meta_query'] = WC()->query->get_meta_query();
                                        } elseif ($value['order_by'] == 'mostview'){
                                            $vip_args = array(
                                                'post_type' => 'product',
                                                'post_status'    => 'publish',
                                                'posts_per_page' => $value['product_number'],
                                                'meta_key'           => 'post_views',
                                                'order'             => $value['order'],
                                                'orderby'             => 'meta_value_num',
                                            );
                                        } else {
                                            $vip_args = array(
                                                'post_type' => 'product',
                                                'post_status'    => 'publish',
                                                'orderby' => $value['order_by'],
                                                'order' => $value['order'],
                                                'posts_per_page' => $value['product_number'],
                                            );
                                        }

                                        // filter by category
                                        if (!empty($value['product_category'])) {
                                            $list_cat = explode(",", $value['product_category']);
                                            if ($list_cat[0] != '') {
                                                $vip_args['tax_query'][] = array(
                                                    'taxonomy' => 'product_cat',
                                                    'field' => 'slug',
                                                    'terms' => $list_cat,
                                                );
                                            }
                                        }

                                        // Filter product by feature
                                        if (!empty($value['pro_feature']) and $value['pro_feature'] == 'yes') {
                                            $vip_args['tax_query'][] = array(
                                                'taxonomy' => 'product_visibility',
                                                'field'    => 'name',
                                                'terms'    => 'featured',
                                                'operator' => 'IN',
                                            );
                                        }
                                        if (!empty($value['pro_sale']) and $value['pro_sale'] == 'yes') {
                                            $vip_args['post__in'] = array_unique( wc_get_product_ids_on_sale());
                                        }
                                        $vip_query = new WP_Query($vip_args);
                                        if($vip_query->have_posts()) {
                                            while($vip_query->have_posts()) {
                                                $vip_query->the_post();
                                                ?>
                                                <div class="item-product product item-product1 style2 text-center">
                                                    <div class="product-thumb">
                                                        <?php s7upf_get_image_product_quickview_in_loop($image_size,$default_image,$animation_img); ?>

                                                    </div>
                                                    <div class="product-info">
                                                        <h3 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                        <?php do_action( 's7upf_vendor_shop_loop_sold_by' );?>
                                                        <div class="product-price">
                                                            <?php woocommerce_template_loop_price(); ?>
                                                        </div>
                                                        <div class="product-rate">
                                                            <?php echo s7upf_get_rating_html(); ?>
                                                        </div>
                                                        <div class="product-extra-link">
                                                            <?php
                                                            //echo s7up_wishlist_url();
                                                            woocommerce_template_loop_add_to_cart();
                                                          ///  echo s7upf_compare_url();
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Item -->
                                        <?php }
                                        }?>
                                    </div>
                                </div>
                            </div>
                        <!-- End Tab -->
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php
}else if('style5' === $style_layout){
    if(!empty($data_item_tab) and is_array($data_item_tab)){ ?>
        <div class="product-bestsale best-sale6 <?php echo esc_attr($extra_class); ?>  woocommerce <?php echo esc_attr($class_main_color);?> <?php echo esc_attr($class_secondary_color);?>">
            <?php if(!empty($title)) { ?>
                <h2 class=" title30 font-bold title-box1 text-center"><?php echo esc_attr($title); ?></h2>
            <?php } ?>
            <ul class="text-center title-tab1 list-inline-block">
                <?php foreach ($data_item_tab as $key => $value){
                    if($key +1 == $position_tab_active) $class_active = 'active'; else $class_active ='';
                    ?>
                    <li class="<?php echo esc_attr($class_active); ?>"><a href="#tab-vip<?php echo esc_attr($key); echo esc_attr($time); ?>" data-toggle="tab"><?php if(!empty($value['title'])) echo esc_attr($value['title']); ?></a></li>
                <?php } ?>
            </ul>
            <div class="tab-content">
        <?php
            foreach ($data_item_tab as $key => $value){
                $link ='';
                if($key +1 == $position_tab_active) $class_active = 'active'; else $class_active =''; ?>
                    <div id="tab-vip<?php echo esc_attr($key); echo esc_attr($time); ?>" class="tab-pane <?php echo esc_attr($class_active); ?>">
                        <div class="product-loadmore">
                            <div class="row list-product-loadmore">
                            <?php if(empty($value['product_number'])) $value['product_number']=12;
                            if ($value['order_by'] == 'best_seller') {
                                $vip_args = array(
                                    'post_type' => 'product',
                                    'meta_key' => 'total_sales',
                                    'orderby' => 'meta_value_num',
                                    'post_status'    => 'publish',
                                    'order' => $value['order'],
                                    'posts_per_page' => $value['product_number']
                                );
                            } elseif ($value['order_by'] == 'top_rating') {
                                $vip_args = array(
                                    'post_type' => 'product',
                                    'post_status'    => 'publish',
                                    'posts_per_page' => $value['product_number'],
                                    'meta_key' => '_wc_average_rating',
                                    'orderby'        => 'meta_value_num',
                                    'order'          => $value['order'],
                                    'meta_query'     => WC()->query->get_meta_query(),
                                    'tax_query'      => WC()->query->get_tax_query(),
                                );
                                $vip_args['meta_query'] = WC()->query->get_meta_query();
                            } elseif ($value['order_by'] == 'mostview'){
                                $vip_args = array(
                                    'post_type' => 'product',
                                    'post_status'    => 'publish',
                                    'posts_per_page' => $value['product_number'],
                                    'meta_key'           => 'post_views',
                                    'order'             => $value['order'],
                                    'orderby'             => 'meta_value_num',
                                );
                            } else {
                                $vip_args = array(
                                    'post_type' => 'product',
                                    'post_status'    => 'publish',
                                    'orderby' => $value['order_by'],
                                    'order' => $value['order'],
                                    'posts_per_page' => $value['product_number'],
                                );
                            }

                            // filter by category
                            if (!empty($value['product_category'])) {
                                $list_cat = explode(",", $value['product_category']);
                                if ($list_cat[0] != '') {
                                    $vip_args['tax_query'][] = array(
                                        'taxonomy' => 'product_cat',
                                        'field' => 'slug',
                                        'terms' => $list_cat,
                                    );
                                }
                            }

                            // Filter product by feature
                            if (!empty($value['pro_feature']) and $value['pro_feature'] == 'yes') {
                                $vip_args['tax_query'][] = array(
                                    'taxonomy' => 'product_visibility',
                                    'field'    => 'name',
                                    'terms'    => 'featured',
                                    'operator' => 'IN',
                                );
                            }
                            if (!empty($value['pro_sale']) and $value['pro_sale'] == 'yes') {
                                $vip_args['post__in'] = array_unique( wc_get_product_ids_on_sale());
                            }
                            $vip_query = new WP_Query($vip_args);

                            $max_page = $vip_query->max_num_pages;
                            if($vip_query->have_posts()) {
                                while($vip_query->have_posts()) {
                                    $vip_query->the_post(); ?>
                                    <div class="col-md-<?php echo esc_attr($col_layout_tab); ?> col-sm-4 col-xs-6 product">
                                        <div class="item-product item-product1 text-center border drop-shadow bg-white">
                                            <div class="product-thumb">
                                                <?php s7upf_get_image_product_quickview_in_loop($image_size,$default_image,$animation_img); ?>
                                            </div>
                                            <div class="product-info">
                                                <h3 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                <?php do_action( 's7upf_vendor_shop_loop_sold_by' );?>
                                                <div class="product-price">
                                                    <?php woocommerce_template_loop_price(); ?>
                                                </div>
                                                <?php echo s7upf_get_rating_html(); ?>
                                                <div class="product-extra-link">
                                                    <?php
                                                    echo s7up_wishlist_url();
                                                    woocommerce_template_loop_add_to_cart();
                                                    echo s7upf_compare_url();
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Item -->
                               <?php }
                            }?>
                            </div>
                            <?php
                            if(!empty($value['btn_link'])) $link = vc_build_link($value['btn_link']);
                            if(!empty($link['url'])){ ?>
                                <div class="text-center">
                                    <a href="<?php echo (!empty($link['url']))? esc_url($link['url']): '#'; ?>" <?php if(empty($link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($link['target']))?'_blank':'_parent'; ?>" class="btn-arrow color text-uppercase loadmore-link"><?php if(!empty($link['title'])) echo esc_attr($link['title']); ?></a>
                                </div>
                            <?php } else if($max_page>1 and 'on' == $load_more_ajax_tab){?>
                            <div class="text-center">
                                <a href="#" class="btn-arrow color text-uppercase loadmore-link ajax-loadmore-tab" data-collayout = "<?php echo esc_attr($col_layout_tab); ?>" data-defaultimage = "<?php echo esc_attr($default_image); ?>" data-animationimg = "<?php echo esc_attr($animation_img); ?>" data-imgsize = "<?php echo esc_attr($image_size_button_ajax); ?>" data-profeatured = "<?php if(!empty($value['pro_feature'])) echo esc_attr($value['pro_feature']); ?>" data-prosale = "<?php if(!empty($value['pro_sale'])) echo esc_attr($value['pro_sale']); ?>" data-cat="<?php if(!empty($value['product_category'])) echo esc_attr($value['product_category']);?>" data-number="<?php if(!empty($value['product_number'])) echo esc_attr($value['product_number']);?>"  data-order="<?php if(!empty($value['order'])) echo esc_attr($value['order']);?>" data-orderby="<?php if(!empty($value['order_by'])) echo esc_attr($value['order_by']);?>" data-paged="1"  data-maxpage="<?php echo esc_attr($max_page);?>"><?php echo esc_html__('load more','fruitshop'); ?></a>
                            </div>
                            <?php } ?>

                        </div>
                    </div>
                    <!-- End Tab -->
            <?php } ?>
            </div>
        </div>
    <?php
    }
}else{
    if(!empty($data_item_tab) and is_array($data_item_tab)){ ?>
        <div class="<?php echo esc_attr($extra_class); ?> <?php echo esc_attr($class_main);?> woocommerce <?php echo esc_attr($class_main_color);?> <?php echo esc_attr($class_secondary_color);?>">
            <?php if($style_layout == 'style4') echo '<div class="tab-header4">';?>
            <?php if(!empty($title)) { ?>
            <h2 class="<?php echo esc_attr($class_title); ?>"><?php echo esc_attr($title); ?></h2>
            <?php } ?>
            <ul class="<?php echo esc_attr($class_ul);?>">
                <?php foreach ($data_item_tab as $key => $value){
                    if($key +1 == $position_tab_active) $class_active = 'active'; else $class_active ='';
                   ?>
                    <li class="<?php echo esc_attr($class_active); ?>"><a href="#tab-vip<?php echo esc_attr($key); echo esc_attr($time); ?>" data-toggle="tab"><?php if(!empty($value['title_icon'])) echo wp_get_attachment_image($value['title_icon'],$size_icon,false,array('class'=>$class_icon_title) ); ?><?php if(!empty($value['title'])){?><span><?php echo esc_attr($value['title'])?></span><?php } ?></a></li>
                <?php } ?>
            </ul>
            <?php if($style_layout == 'style4') echo '</div>';?>
            <div class="tab-content"><?php
                foreach ($data_item_tab as $key => $value){
                    $link ='';
                    if($key +1 == $position_tab_active) $class_active = 'active'; else $class_active =''; ?>
                <div id="tab-vip<?php echo esc_attr($key); echo esc_attr($time); ?>" class="tab-pane <?php echo esc_attr($class_active); ?>">
                    <div class="<?php echo esc_attr($class_product_slider); ?>">
                       <?php if($style_layout !=='style3') {?>
                        <div class="wrap-item" data-navigation="true" data-pagination="false" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-itemscustom="[[0,1],[560,2],[768,3],[990,<?php echo esc_attr($number_item_desktop_tab)?>]]">
                        <?php } ?>
                            <?php if(empty($value['product_number'])) $value['product_number']=12;
                            if ($value['order_by'] == 'best_seller') {
                                $vip_args = array(
                                    'post_type' => 'product',
                                    'meta_key' => 'total_sales',
                                    'orderby' => 'meta_value_num',
                                    'post_status'    => 'publish',
                                    'order' => $value['order'],
                                    'posts_per_page' => $value['product_number']
                                );
                            } elseif ($value['order_by'] == 'top_rating') {
                                $vip_args = array(
                                    'post_type' => 'product',
                                    'post_status'    => 'publish',
                                    'posts_per_page' => $value['product_number'],
                                    'meta_key' => '_wc_average_rating',
                                    'orderby'        => 'meta_value_num',
                                    'order'          => $value['order'],
                                    'meta_query'     => WC()->query->get_meta_query(),
                                    'tax_query'      => WC()->query->get_tax_query(),
                                );
                                $vip_args['meta_query'] = WC()->query->get_meta_query();
                            } elseif ($value['order_by'] == 'mostview'){
                                $vip_args = array(
                                    'post_type' => 'product',
                                    'post_status'    => 'publish',
                                    'posts_per_page' => $value['product_number'],
                                    'meta_key'           => 'post_views',
                                    'order'             => $value['order'],
                                    'orderby'             => 'meta_value_num',
                                );
                            } else {
                                $vip_args = array(
                                    'post_type' => 'product',
                                    'post_status'    => 'publish',
                                    'orderby' => $value['order_by'],
                                    'order' => $value['order'],
                                    'posts_per_page' => $value['product_number'],
                                );
                            }

                            // filter by category
                            if (!empty($value['product_category'])) {
                                $list_cat = explode(",", $value['product_category']);
                                if ($list_cat[0] != '') {
                                    $vip_args['tax_query'][] = array(
                                        'taxonomy' => 'product_cat',
                                        'field' => 'slug',
                                        'terms' => $list_cat,
                                    );
                                }
                            }

                            // Filter product by feature
                            if (!empty($value['pro_feature']) and $value['pro_feature'] == 'yes') {
                                $vip_args['tax_query'][] = array(
                                    'taxonomy' => 'product_visibility',
                                    'field'    => 'name',
                                    'terms'    => 'featured',
                                    'operator' => 'IN',
                                );
                            }
                            if (!empty($value['pro_sale']) and $value['pro_sale'] == 'yes') {
                                $vip_args['post__in'] = array_unique( wc_get_product_ids_on_sale());
                            }
                            $vip_query = new WP_Query($vip_args);
                            if($vip_query->have_posts()) {
                                while($vip_query->have_posts()) {
                                    $vip_query->the_post();
                                    ?>
                                    <div class="<?php echo esc_attr($class_item_product); ?> product">
                                        <div class="product-thumb">
                                            <?php s7upf_get_image_product_quickview_in_loop($image_size,$default_image,$animation_img); ?>
                                        </div>
                                        <?php if($style_layout == 'style3'){
                                            ?>
                                            <div class="product-info">
                                                <h3 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><?php $quotation = get_post_meta(get_the_ID(),'quotation',true); if(!empty($quotation)){ ?><strong class="color pull-right"><?php echo esc_attr($quotation); ?></strong><?php } ?></h3>
                                                <?php do_action( 's7upf_vendor_shop_loop_sold_by' );?>
                                                <div class="desc">
                                                    <?php if ( has_excerpt( get_the_ID()) ) {
                                                        echo balanceTags(wp_trim_words( get_the_excerpt(), $word_excerpt_tab , '...' ), true); }
                                                    ?>
                                                </div>
                                            </div>
                                            <?php
                                        }else if($style_layout == 'style2'){
                                            ?>
                                            <div class="product-info">
                                                <div class="product-price">
                                                    <?php woocommerce_template_loop_price(); ?>
                                                </div>
                                                <h3 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                <?php do_action( 's7upf_vendor_shop_loop_sold_by' );?>
                                                <?php echo s7upf_get_rating_html(); ?>
                                                <div class="product-extra-link">
                                                    <?php
                                                    echo s7up_wishlist_url();
                                                    woocommerce_template_loop_add_to_cart();
                                                    echo s7upf_compare_url();
                                                    ?>
                                                </div>
                                                <?php if ($style_layout == 'style1'){ ?>
                                                    <div class="product-in-cat list-inline-block">
                                                        <?php echo wc_get_product_category_list( get_the_ID(), ''); ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <?php
                                        }else{ ?>
                                        <div class="product-info">
                                            <h3 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <?php do_action( 's7upf_vendor_shop_loop_sold_by' );?>
                                            <div class="product-price">
                                                <?php woocommerce_template_loop_price(); ?>
                                            </div>
                                            <?php echo s7upf_get_rating_html(); ?>
                                            <div class="product-extra-link">
                                                <?php
                                                echo s7up_wishlist_url();
                                                woocommerce_template_loop_add_to_cart();
                                                echo s7upf_compare_url();
                                                ?>
                                            </div>
                                            <?php if ($style_layout == 'style1'){ ?>
                                            <div class="product-in-cat list-inline-block">
                                                <?php echo wc_get_product_category_list( get_the_ID(), ''); ?>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <?php
                                }wp_reset_postdata();
                            }
                            ?>
                            <?php if($style_layout !=='style3') {?>
                        </div>
                        <?php }?>
                    </div>
                    <?php if(!empty($value['btn_link'])) $link = vc_build_link($value['btn_link']);
                    if(!empty($link['title']) and $style_layout == 'style3'){ ?>
                        <div class="text-center">
                            <a href="<?php echo (!empty($link['url']))? esc_url($link['url']): '#'; ?>" <?php if(empty($link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($link['target']))?'_blank':'_parent'; ?>" class="btn-arrow color"><?php echo esc_attr($link['title']); ?></a>
                        </div>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
        </div><?php
    }
}
