<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 04/04/2017
 * Time: 17:20
 */
$data_button = $data_link_banner ='';
if(!empty($button))
$data_button = vc_build_link($button);
if(!empty($link_banner))
$data_link_banner = vc_build_link($link_banner);
$class_info_color = S7upf_Assets::build_css('color: '.$info_color.';');
$class_info_color .= ' '.S7upf_Assets::build_css('background: '.$info_color.';',' .title-underline::after');
$class_info_color .= ' '.S7upf_Assets::build_css('color: '.$info_color.'; border-color:'.$info_color.';',' .btn-arrow');
$class_title_color = S7upf_Assets::build_css('color: '.$title_color.';');
$class_title_2_color = S7upf_Assets::build_css('color: '.$title_color_2.';');
$class_bg_info = S7upf_Assets::build_css('background: '.$bg_info.';',' .banner-info .info-product-adv3');
$class_button_color = S7upf_Assets::build_css('color: '.$button_color.'; border-color: '.$button_color.';','.btn-arrow');
$class_button_color .= ' '.S7upf_Assets::build_css('background: '.$button_color.';','.btn-arrow:after');
$class_button_color .= ' '.S7upf_Assets::build_css('background: '.$button_color.';','.btn-arrow:hover');
$class_height_info = S7upf_Assets::build_css('height: '.$height_info.'px;',' .ver.banner-info');
$image_size =  s7upf_get_size_image('full',$image_size);
switch ($style){
    case 'style1':
        ?>
        <div class="<?php echo esc_attr($extra_class); ?> item-adv1 overlay-image banner-quangcao mb-banner-element1 <?php echo esc_attr($class_height_info); ?> <?php echo esc_attr($animation_bg); ?>">
            <a href="<?php echo (!empty($data_button['url']))? esc_url($data_button['url']): '#'; ?>" <?php if(empty($data_button['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_button['target']))?'_blank':'_parent'; ?>" class="adv-thumb-link">
                <?php if($animation_bg === 'zoom-out'){ ?>
                   <?php echo wp_get_attachment_image($bg_image,$image_size,false, array('class'=>'img-1'));
                    if(!empty($bg_image_out)){
                        echo wp_get_attachment_image($bg_image_out,$image_size);
                    }else{
                        echo wp_get_attachment_image($bg_image,$image_size);
                    }
                    ?>
                <?php } else{
                    echo wp_get_attachment_image($bg_image,$image_size);
                } ?>
            </a>
            <div class="banner-info ver white text-center <?php echo esc_attr($class_info_color); ?>">
                <div class="mb-info">
                <?php if(!empty($title)){ ?>
                    <h2 class="title30 <?php echo esc_attr($title_underline); ?>"><?php echo balanceTags($title); ?></h2>
                <?php } if(!empty($title_2)){?>
                    <h2 class="title30 font-bold"><?php echo balanceTags($title_2);?></h2>
                <?php } if(!empty($data_button['title'])){ ?>
                <a  href="<?php echo (!empty($data_button['url']))? esc_url($data_button['url']): '#'; ?>" <?php if(empty($data_button['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_button['target']))?'_blank':'_parent'; ?>"  class="btn-arrow white"><?php echo esc_attr($data_button['title'])?></a>
                <?php } ?>
                </div>
            </div>
        </div>
        <?php
        break;
    case 'style2':
        $s = 0.4;
        ?>
        <div class="<?php echo esc_attr($extra_class); ?> <?php if($position_info == 'left') echo 'hoz-banner';?> banner-guide <?php echo esc_attr($animation_bg);?> overlay-image banner-quangcao">
            <a href="<?php echo (!empty($data_link_banner['url']))? esc_url($data_link_banner['url']): '#'; ?>" <?php if(empty($data_link_banner['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link_banner['target']))?'_blank':'_parent'; ?>" class="adv-thumb-link wow <?php echo esc_attr($bg_animation_css); ?> " >
                <?php if($animation_bg === 'zoom-out'){ ?>
                    <?php echo wp_get_attachment_image($bg_image,$image_size,false, array('class'=>'img-1'));
                    if(!empty($bg_image_out)){
                        echo wp_get_attachment_image($bg_image_out,$image_size);
                    }else{
                        echo wp_get_attachment_image($bg_image,$image_size);
                    }
                    ?>
                <?php } else{
                    echo wp_get_attachment_image($bg_image,$image_size);
                } ?>
            </a>
            <div class="banner-info <?php echo esc_attr($position_info); ?>">
                <?php if(!empty($title)){ ?>
                    <h2 class="<?php echo esc_attr($title_size); ?> white paci-font wow <?php echo esc_attr($class_title_color); ?> <?php echo esc_attr($title_animation); ?>"><?php echo balanceTags($title); ?></h2>
                <?php } ?>
                <?php if(!empty($data_button_list) and is_array($data_button_list)){ ?>
                <ul class="list-inline-block">
                    <?php foreach($data_button_list as $value) {

                        if (!empty($value['button']))
                            $data_link = vc_build_link($value['button']);
                        if (!empty($data_link['title'])) { ?>
                            <li>
                                <a href="<?php echo (!empty($data_link['url'])) ? esc_url($data_link['url']) : '#'; ?>" <?php if (empty($data_link['url'])) echo 'onclick="return false;"'; ?>
                                   target="<?php echo (!empty($data_link['target'])) ? '_blank' : '_parent'; ?>"
                                   class="shop-button wow <?php echo esc_attr($button_animation); ?>"
                                   data-wow-duration="0.3s" data-wow-delay="<?php echo esc_attr($s);?>s"><?php echo esc_attr($data_link['title']); ?></a></li>
                        <?php }
                        $s = $s+0.4;
                    }?>
                </ul>
                <?php } ?>
            </div>
        </div>
        <?php
        break;
    case 'style3':
        ?>
        <div class="product-adv3 banner-background <?php echo esc_attr($class_bg_info); ?> <?php echo esc_attr($extra_class); ?>">
            <?php echo wp_get_attachment_image($bg_image,'full',false,array('class'=>'image-background hidden')) ?>
            <?php if(!empty($title) || !empty($title_2) ||  !empty($data_button['title']) || !empty($content)){ ?>
            <div class="banner-info">
                <div class="info-product-adv3 <?php echo esc_attr($pull_info); ?> text-center wow <?php echo esc_attr($info_animation); ?>">
                    <?php if(!empty($title)){ ?>
                    <h2 class="paci-font title30 color <?php echo esc_attr($class_title_color); ?>"><?php echo balanceTags($title); ?></h2>
                    <?php } if(!empty($title_2)){ ?>
                        <h2 class="title30 color2 text-uppercase font-bold  <?php echo esc_attr($class_title_2_color); ?>"><?php echo balanceTags($title_2); ?></h2>
                    <?php }
                    if(!empty($data_button['title'])){ ?>
                        <a href="<?php echo (!empty($data_button['url']))? esc_url($data_button['url']): '#'; ?>" <?php if(empty($data_button['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_button['target']))?'_blank':'_parent'; ?>" class="color btn-arrow style2 <?php echo esc_attr($class_button_color);?>"><?php echo esc_attr($data_button['title']); ?></a>
                    <?php }
                        echo wpb_js_remove_wpautop($content, true);
                    ?>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php
        break;
    case 'style4':
            $class_title_color = S7upf_Assets::build_css('color: '.$info_color.';');
            $class_title_color_hover = S7upf_Assets::build_css('color: '.$info_color_hover.';',':hover');
            $class_button_color_hover = S7upf_Assets::build_css('background: '.$info_color_hover.'; border-color:'.$info_color_hover.';','.btn-arrow:hover');
            ?>
            <div class="mb-banner-style-5 <?php echo esc_attr($extra_class); ?>">
                <div class="banner-quangcao item-adv5 overlay-image zoom-rotate">
                    <a href="<?php echo (!empty($data_link_banner['url']))? esc_url($data_link_banner['url']): '#'; ?>" <?php if(empty($data_link_banner['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link_banner['target']))?'_blank':'_parent'; ?>" class="adv-thumb-link">
                        <?php echo wp_get_attachment_image($bg_image,'full') ?>
                    </a>
                    <div class="banner-info white text-center <?php echo esc_attr($class_info_color);?>">
                        <?php if(!empty($title)){ ?>
                            <h3 class="title18"><a href="<?php echo (!empty($data_link_banner['url']))? esc_url($data_link_banner['url']): '#'; ?>" <?php if(empty($data_link_banner['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link_banner['target']))?'_blank':'_parent'; ?>" class="white <?php echo esc_attr($class_title_color); ?> <?php echo esc_attr($class_title_color_hover); ?>"><?php echo esc_attr($title); ?> </a></h3>
                        <?php }
                        if(!empty($title_2)){ ?>
                            <div class="product-price">
                                <ins class="white <?php echo esc_attr($class_title_color); ?>"><span><?php echo esc_attr($title_2)?></span></ins>
                            </div>
                        <?php }
                        if(!empty($data_button['title'])){ ?>
                            <a href="<?php echo (!empty($data_button['url']))? esc_url($data_button['url']): '#'; ?>" <?php if(empty($data_button['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_button['target']))?'_blank':'_parent'; ?>" class="btn-arrow white <?php echo esc_attr($class_button_color_hover); ?>"><?php echo esc_attr($data_button['title']); ?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php
        break;
    case 'style5':
        $class_color='';
        if(!empty($info_color)) $class_color = S7upf_Assets::build_css('border-color: '.$info_color.'; color:'.$info_color.';', ' .white'); ?>
        <div class="item-adv7 banner-quangcao  <?php echo esc_attr($animation_bg); ?>  <?php echo esc_attr($class_color); ?> overlay-image <?php echo esc_attr($extra_class); ?>">
            <a href="<?php echo (!empty($data_button['url']))? esc_url($data_button['url']): '#'; ?>" <?php if(empty($data_button['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_button['target']))?'_blank':'_parent'; ?>" class="adv-thumb-link">
                <?php if($animation_bg === 'zoom-out'){ ?>
                    <?php echo wp_get_attachment_image($bg_image,$image_size,false, array('class'=>'img-1'));
                    if(!empty($bg_image_out)){
                        echo wp_get_attachment_image($bg_image_out,$image_size);
                    }else{
                        echo wp_get_attachment_image($bg_image,$image_size);
                    }
                    ?>
                <?php } else{
                    echo wp_get_attachment_image($bg_image,$image_size);
                } ?>
            </a>
            <div class="banner-info text-center white">
                <?php if(!empty($title)){ ?>
                    <h3 class="title24 <?php echo esc_attr($title_underline); ?>"><?php echo balanceTags($title); ?></h3>
                <?php } if(!empty($title_2)){?>
                    <h2 class="title30"><?php echo balanceTags($title_2);?></h2>
                <?php } if(!empty($data_button['title'])){ ?>
                    <a  href="<?php echo (!empty($data_button['url']))? esc_url($data_button['url']): '#'; ?>" <?php if(empty($data_button['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_button['target']))?'_blank':'_parent'; ?>"  class="btn-arrow white text-uppercase"><?php echo esc_attr($data_button['title'])?></a>
                <?php } ?>
            </div>
        </div>
        <?php
        break;
    case 'style6':
        $class_color=''; if(!empty($bg_info)) $class_color = S7upf_Assets::build_css('background:'.$bg_info.';');
        ?>
        <div class="item-adv8 banner-quangcao  <?php echo esc_attr($animation_bg); ?> <?php echo esc_attr($extra_class); ?>">
            <div class="info-adv8 text-center white bg-color <?php echo esc_attr($class_color); ?>">
                <?php if(!empty($title)){ ?>
                    <h2 class="title30 text-uppercase font-bold"><?php echo balanceTags($title); ?></h2>
                <?php } if(!empty($title_2)){ ?>
                    <h3 class="title18"><?php echo balanceTags($title_2);?></h3>
                <?php } ?>
            </div>
            <a href="<?php echo (!empty($data_link_banner['url']))? esc_url($data_link_banner['url']): '#'; ?>" <?php if(empty($data_link_banner['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link_banner['target']))?'_blank':'_parent'; ?>" class="adv-thumb-link">
                <?php if($animation_bg === 'zoom-out'){ ?>
                    <?php echo wp_get_attachment_image($bg_image,$image_size,false, array('class'=>'img-1'));
                    if(!empty($bg_image_out)){
                        echo wp_get_attachment_image($bg_image_out,$image_size);
                    }else{
                        echo wp_get_attachment_image($bg_image,$image_size);
                    }
                    ?>
                <?php } else{
                    echo wp_get_attachment_image($bg_image,$image_size);
                } ?>
            </a>
        </div>
        <?php
        break;
    default :
        $class_color=''; if(!empty($bg_info)) $class_color = S7upf_Assets::build_css('background:'.$bg_info.';');
         ?>
        <div class="item-banner10 banner-quangcao zoom-image  <?php echo esc_attr($extra_class); ?>">
            <a href="<?php echo (!empty($data_link_banner['url']))? esc_url($data_link_banner['url']): '#'; ?>" <?php if(empty($data_link_banner['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link_banner['target']))?'_blank':'_parent'; ?>" class="adv-thumb-link">
                <?php echo wp_get_attachment_image($bg_image,$image_size); ?>
            </a>
            <div class="<?php echo ($type_style7 == 'type1')?'banner-info style1 text-center text-uppercase':'banner-info style2 text-uppercase'?>">
              <?php  echo wpb_js_remove_wpautop($content, true); ?>
            </div>
        </div>
        <?php
        break;
}