<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 15/06/2017
 * Time: 11:29 SA
 */
$class ='';
if(empty($number_item_desktop)) $number_item_desktop = '3';
if(!empty($text_color)){
    $class .= ' '.S7upf_Assets::build_css('color:'.$text_color.';',' .text-color');
}
$image_size  = s7upf_get_size_image('700x700',$image_size);
if(!empty($data_item_product) and  is_array($data_item_product)){ ?>
    <div class="mb-element-product-style15 <?php echo esc_attr($extra_class); ?> <?php echo esc_attr($class);?>">
        <div class="wrap-item" data-navigation="true" data-pagination="false" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-itemscustom="[[0,1],[560,2],[990,<?php echo esc_attr($number_item_desktop)?>]]">
                <?php
                foreach($data_item_product as $value){
                    $link = '';
                    if(!empty($value['btn_link'])) $link =  vc_build_link($value['btn_link']);?>
                    <div class="item-product15">
                        <?php if(!empty($value['image'])){ ?>
                            <div class="product-thumb">
                                <a href="<?php echo (!empty($link['url']))? esc_url($link['url']): '#'; ?>" <?php if(empty($link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($link['target']))?'_blank':'_parent'; ?>" >
                                    <?php echo wp_get_attachment_image($value['image'],$image_size)?>
                                </a>
                            </div>
                        <?php } ?>
                        <div class="product-info">
                            <?php if(!empty($value['title'])){ ?>
                                <h3 class="title18"><a class="white" href="<?php echo (!empty($link['url']))? esc_url($link['url']): '#'; ?>" <?php if(empty($link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($link['target']))?'_blank':'_parent'; ?>" ><?php echo esc_attr($value['title']); ?></a></h3>
                            <?php } ?>
                            <div class="product-price">
                                <?php if(!empty($value['regular_price']) and !empty($value['sale_price'])){ ?>
                                    <del class="white"><span><?php echo esc_attr($value['regular_price']); ?></span></del>
                                <?php } else if(!empty($value['regular_price']) and empty($value['sale_price'])){ ?>
                                    <ins class="white"><span><?php echo esc_attr($value['regular_price']); ?></span></ins>
                                <?php }

                                if(!empty($value['sale_price'])){ ?>
                                    <ins class="white"><span><?php echo esc_attr($value['sale_price']); ?></span></ins>
                                <?php }  ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
    </div>
<?php }


