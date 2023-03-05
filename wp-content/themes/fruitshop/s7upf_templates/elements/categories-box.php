<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 24/04/2017
 * Time: 15:10
 */
$class_color = '';
if('style1' == $style){
    if(!empty($add_button))
        $data_link = vc_build_link($add_button);
    if(!empty($bg_image)){
        $class_color .= ' '.S7upf_Assets::build_css('background-image : url("'.wp_get_attachment_image_url($bg_image,'full').'")',' .item-fruit-cat1::before');
    }
    if(!empty($main_color)){
        $class_color .= ' '.S7upf_Assets::build_css('color:'.$main_color.';',' .btn-viewall');
        $class_color .= ' '.S7upf_Assets::build_css('color:'.$main_color.';',' .cat-menu2 li a:hover');
        $class_color .= ' '.S7upf_Assets::build_css('background:'.$main_color.'; border-color:'.$main_color.';',' .cat-menu2 li a:hover span');
        $class_color .= ' '.S7upf_Assets::build_css('background:'.$main_color.';',' .btn-viewall.color::before');
        $class_color .= ' '.S7upf_Assets::build_css('border-color:'.$main_color.';',' .line-space::after');
        $class_color .= ' '.S7upf_Assets::build_css('border-color:'.$main_color.';',' .line-space::before');
        $class_color .= ' '.S7upf_Assets::build_css('color:'.$main_color.';',' .line-space i');
    }
    if(!empty($secondary_color)){
        $class_color .= ' '.S7upf_Assets::build_css('color:'.$secondary_color.';',' .color2 ');
        $class_color .= ' '.S7upf_Assets::build_css('color:'.$secondary_color.';',' .btn-viewall.color:hover');
        $class_color .= ' '.S7upf_Assets::build_css('background:'.$secondary_color.';',' .btn-viewall.color:hover::before');
    }?>
    <div class="fruit-list-cat element-categories <?php echo esc_attr($class_color); ?> wow <?php echo esc_attr($animation_css);?>">
        <div class="item-fruit-cat1 <?php if(!empty($item_active)) echo 'item-active item-center';?>">
            <?php if(!empty($title)){ ?>
            <h2 class="title18 color2 text-uppercase font-bold text-center"><?php echo esc_attr($title); ?></h2>
            <?php } ?>
            <div class="title18 line-space color text-center"><i class="fa fa-pagelines"></i></div>
            <?php
            if(!empty($category)){ $category =  explode(',',$category);
                if(is_array($category)){ ?>
                <ul class="list-none cat-menu2">
                    <?php foreach ($category as $cart){
                        $term = get_term_by('slug', $cart, 'product_cat');
                        if(!empty($term->term_id)){ ?>
                        <li><a href="<?php echo esc_url(get_term_link($term->term_id),'product_cat'); ?>"><?php echo esc_attr($term->name); ?><?php if(empty($product_count)) { ?><span><?php echo esc_attr($term->count); ?></span><?php } ?></a></li>
                        <?php } } ?>
                </ul>
            <?php }
            } ?>
            <?php if(!empty($data_link['url'])){?>
            <a  href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" class="btn-viewall color"><?php if(!empty($data_link['title'])) echo esc_attr($data_link['title']); ?></a>
            <?php }
            if(!empty($bottom_image)){?>
            <div class="cat-menu-img">
                <?php echo wp_get_attachment_image($bottom_image,'full'); ?>
            </div>
            <?php } ?>
        </div>
    </div>
<?php } else if('style3' === $style){
    if(empty($number_item_desktop)) $number_item_desktop = '3';
    if(!empty($main_color)){
        $class_color .= ' '.S7upf_Assets::build_css('border-color:'.$main_color.';');
        $class_color .= ' '.S7upf_Assets::build_css('border-color: '.$main_color.';',' .btn-arrow.color');
        $class_color .= ' '.S7upf_Assets::build_css('color: '.$main_color.';',' .color');
        $class_color .= ' '.S7upf_Assets::build_css('border-color:'.$main_color.'; background:'.$main_color.';',' .owl-theme .owl-controls .owl-buttons div:hover');
        $class_color .= ' '.S7upf_Assets::build_css('background:'.$main_color.';',' .btn-arrow.color:hover');

    }?>
    <div class="pop-cat8 bg-white <?php echo esc_attr($class_color);?>">
        <?php if(!empty($title)) {?>
        <h2 class="title30 font-bold text-center"><?php echo esc_attr($title); ?></h2>
        <?php } if(!empty($data_category) and is_array($data_category)) { ?>
        <div class="popcat-slider8">
            <div class="wrap-item" data-pagination="false" data-navigation="true" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-itemscustom="[[0,1],[560,2],[990,<?php echo esc_attr($number_item_desktop);?>]]">
                <?php foreach($data_category as $value){
                    if(!empty($value['link'])){
                        $link = vc_build_link($value['link']);
                    }?>
                    <div class="item-popcat8">
                        <?php if($value['image']){?>
                            <div class="banner-quangcao overlay-image zoom-out">
                                <a href="<?php echo (!empty($link['url']))? esc_url($link['url']):'#'; ?>" class="adv-thumb-link">
                                    <?php
                                    echo wp_get_attachment_image($value['image'],'full');
                                    echo wp_get_attachment_image($value['image'],'full');
                                    ?>
                                </a>
                            </div>
                        <?php } ?>
                        <div class="popcat-info8 text-center">
                            <?php if(!empty($value['title'])){ ?>
                                <h3 class="title18"><?php echo esc_attr($value['title']); ?></h3>
                            <?php } if(!empty($value['desc'])){ ?>
                                <p class="desc"><?php echo esc_attr($value['desc'])?></p>
                            <?php } if(!empty($link['title'])){ ?>
                                <a href="<?php echo (!empty($link['url']))? esc_url($link['url']): '#'; ?>" <?php if(empty($link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($link['target']))?'_blank':'_parent'; ?>" class="btn-arrow color"><?php echo esc_attr($link['title']);?></a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php } else {
    if(empty($number_item_desktop)) $number_item_desktop = '3';
    if(!empty($main_color)){
        $class_color .= ' '.S7upf_Assets::build_css('background:'.$main_color.';',' .bg-color');
        $class_color .= ' '.S7upf_Assets::build_css('border-color:'.$main_color.'; color:'.$main_color.';',' .item-popcat3:hover .btn-arrow.style2.color2');
        $class_color .= ' '.S7upf_Assets::build_css('border-color:'.$main_color.'; background:'.$main_color.';',' .owl-theme .owl-controls .owl-buttons div:hover');
        $class_color .= ' '.S7upf_Assets::build_css('background:'.$main_color.';',' .item-popcat3:hover .btn-arrow.style2.color2::after');

    }
    if(!empty($secondary_color)){
        $class_color .= ' '.S7upf_Assets::build_css('border-color:'.$secondary_color.'; color:'.$secondary_color.';',' .btn-arrow.style2.color2');
        $class_color .= ' '.S7upf_Assets::build_css('background:'.$secondary_color.'; ',' .btn-arrow.style2.color2::after');
        $class_color .= ' '.S7upf_Assets::build_css('background:'.$secondary_color.'; ',' .item-popcat3:hover .popcat-info3');
    } ?>
    <div class="pop-cat3 <?php echo esc_attr($class_color);?>">
        <?php if(!empty($title)){ ?>
            <h2 class="title30 font-bold text-center"><?php echo esc_attr($title); ?></h2>
        <?php } ?>
        <div class="popcat-slider3">
            <div class="wrap-item" data-pagination="false" data-navigation="true" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-itemscustom="[[0,1],[560,2],[990,<?php echo esc_attr($number_item_desktop);?>]]">
                <?php if(!empty($category)){ $category =  explode(',',$category);
                    if(is_array($category)) {
                        foreach ($category as $cart) {
                            $term = get_term_by('slug', $cart, 'product_cat');
                            if(!empty($term->term_id)){
                                $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true ); ?>
                                <div class="item-popcat3">
                                    <div class="banner-quangcao overlay-image zoom-out">
                                        <a href="<?php echo esc_url(get_term_link($term->term_id), 'product_cat'); ?>" class="adv-thumb-link">
                                            <?php echo wp_get_attachment_image($thumbnail_id,'full'); ?>
                                            <?php echo wp_get_attachment_image($thumbnail_id,'full'); ?>
                                        </a>

                                    </div>
                                    <div class="popcat-info3 text-center white bg-color">
                                        <h3 class="title18 text-uppercase font-bold"><?php if (!empty($term->name)) echo esc_attr($term->name); ?></h3>
                                        <p class="desc white">
                                            <?php echo esc_attr($term->description);?>
                                        </p>
                                        <a href="<?php echo esc_url(get_term_link($term->term_id), 'product_cat'); ?>"
                                           class="btn-arrow color2 style2"><?php echo esc_html__('View category', 'fruitshop') ?></a>
                                    </div>
                                </div>
                            <?php }
                        }
                    }
                }?>
            </div>
        </div>
    </div>
<?php }
