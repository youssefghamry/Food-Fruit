<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 04/04/2017
 * Time: 14:41
 */
$data_link = $class_color = '';
if(!empty($link))
    $data_link = vc_build_link($link);
switch($style){
    case 'style1':
        $class_color .= ' '.S7upf_Assets::build_css('color:'.$icon_color.'; border-color:'.$icon_color.';', ' .service-icon a');
        $class_color .= ' '.S7upf_Assets::build_css('border-color:'.$icon_color.';', ' .service-icon a::before');
        $class_color .= ' '.S7upf_Assets::build_css('color:'.$desc_color.';', ' .desc');
        $class_color_title = S7upf_Assets::build_css('color:'.$title_color.';');
        $class_color_title .= ' '.S7upf_Assets::build_css('color:'.$title_color_hover.';', ':hover');
        ?>
        <div class="item-service1 table <?php echo esc_attr($class_color); ?> wow <?php echo esc_attr($animation); ?>">
            <?php if(!empty($icon)){ ?>
            <div class="service-icon">
                <a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" ><i class="fa <?php echo esc_attr($icon); ?>"></i></a>
            </div>
            <?php } ?>
            <div class="service-info">
                <?php if(!empty($title)){ ?>
                <h3 class="title18"><a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>"  class="black <?php echo esc_attr($class_color_title);?>"><?php echo esc_attr($title); ?></a></h3>
                <?php } ?>
                <?php if(!empty($desc)){?>
                <p class="desc"><?php echo esc_attr($desc); ?></p>
                <?php } ?>
            </div>
        </div>
        <?php
        break;
    case 'style2':
        $class_color .= ' '.S7upf_Assets::build_css('color:'.$icon_color.'; border-color:'.$icon_color.';', ' .service-icon a.color2');
        $class_color .= ' '.S7upf_Assets::build_css('background:'.$title_color_hover.'; border-color:'.$title_color_hover.';', ' .service-icon a.color2:hover');
        $class_color .= ' '.S7upf_Assets::build_css('color:'.$desc_color.';', ' .desc');
        $class_color_title = S7upf_Assets::build_css('color:'.$title_color.';');
        $class_color_title .= ' '.S7upf_Assets::build_css('color:'.$title_color_hover.';', ':hover');
        ?>
        <div class="item-service1 table <?php echo esc_attr($class_color); ?> wow <?php echo esc_attr($animation); ?>">
            <?php if(!empty($icon)){ ?>
                <div class="service-icon">
                    <a class="color2" href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" ><i class="fa <?php echo esc_attr($icon); ?>"></i></a>
                </div>
            <?php } ?>
            <div class="service-info">
                <?php if(!empty($title)){ ?>
                    <h3 class="title18"><a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>"  class="black <?php echo esc_attr($class_color_title);?>"><?php echo esc_attr($title); ?></a></h3>
                <?php } ?>
                <?php if(!empty($desc)){?>
                    <p class="desc"><?php echo esc_attr($desc); ?></p>
                <?php } ?>
            </div>
        </div>

        <?php
        break;
    case 'style3':
        $class_color .= ' '.S7upf_Assets::build_css('color:'.$icon_color.';', ' .icon a');
        $class_color .= ' '.S7upf_Assets::build_css('color:'.$title_color.';', ' .title18 .color');
        $class_color .= ' '.S7upf_Assets::build_css('color:'.$desc_color.';', ' .desc');
        ?>
        <div class="choise-policy3 <?php echo esc_attr($class_color); ?>">
            <div class="item-choise3 table wow <?php echo esc_attr($animation); ?>" data-wow-delay="0.3s">
                <?php if(!empty($icon)){?>
                <div class="choise-icon3 icon">
                    <a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>"  class="color"><i class="fa <?php echo esc_attr($icon); ?>"></i></a>
                </div>
                <?php } ?>
                <div class="choise-info3">
                    <?php if(!empty($title)){ ?>
                    <h3 class="title18"><a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" class="color"><?php echo esc_attr($title); ?></a></h3>
                    <?php } ?>
                    <?php if(!empty($desc)){?>
                        <p class="desc"><?php echo esc_attr($desc); ?></p>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php
        break;
    case 'style4':
        $class_color .= ' '.S7upf_Assets::build_css('color:'.$icon_color.'; border-color:'.$icon_color.';', ' .service-icon a');
        $class_color .= ' '.S7upf_Assets::build_css('border-color:'.$icon_color.';', ' .service-icon a:before');
        $class_color .= ' '.S7upf_Assets::build_css('background:'.$bg_icon.';', ' .service-icon a');
        $class_color .= ' '.S7upf_Assets::build_css('color:'.$desc_color.';', ' .service-info .desc');
        $class_color_title = S7upf_Assets::build_css('color:'.$title_color.';');
        $class_color_title .= ' '.S7upf_Assets::build_css('color:'.$title_color_hover.';',':hover');
        ?>
        <div class="item-service4 text-center <?php echo esc_attr($class_color); ?> wow <?php echo esc_attr($animation); ?>">
            <?php if(!empty($icon)){?>
                <div class="service-icon">
                    <a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>"  class="white"><i class="fa <?php echo esc_attr($icon); ?>"></i></a>
                </div>
            <?php } ?>
            <div class="service-info">
                <?php if(!empty($title)){ ?>
                    <h3 class="title18"><a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" class="black <?php echo esc_attr($class_color_title); ?>"><?php echo esc_attr($title); ?></a></h3>
                <?php } ?>
                <?php if(!empty($desc)){?>
                    <p class="desc silver"><?php echo esc_attr($desc); ?></p>
                <?php } ?>
            </div>
        </div>
        <?php
        break;
    case 'style6':
       ?>
        <div class="service-style6">
            <?php if(!empty($image5)) { ?>
                <div class="item-thumb round">
                    <a class="pop" href="<?php echo (!empty($data_link['url'])) ? esc_url($data_link['url']) : '#'; ?>" <?php if (empty($data_link['url'])) echo 'onclick="return false;"'; ?>
                       target="<?php echo (!empty($data_link['target'])) ? '_blank' : '_parent'; ?>">
                        <?php echo wp_get_attachment_image($image5,'full'); ?>
                    </a>
                </div>
                <?php
            } ?>
            <div class="item-info">
                <?php if(!empty($title)){ ?>
                    <h3 class="title24 font-bold"><a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" ><?php echo esc_attr($title); ?></a></h3>
                <?php } ?>
                <?php if(!empty($desc)){?>
                    <p class="desc"><?php echo esc_attr($desc); ?></p>
                <?php } ?>
                <?php if(!empty($data_link['title'])){?>
                    <a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>"  class="shop-button"><?php echo esc_attr($data_link['title'])?></a>
                <?php } ?>

            </div>
        </div>

        <?php
        break;
    default :
        $class_color .= ' '.S7upf_Assets::build_css('color:'.$title_color.';', ' h2');
        $class_color .= ' '.S7upf_Assets::build_css('color:'.$desc_color.';', ' .desc');
        ?>
        <div class="item-policy11 text-center <?php echo esc_attr($class_color); ?>">
            <?php if(!empty($title)){ ?>
                <h2 class="title18 font-bold"><?php echo esc_attr($title); ?></h2>
            <?php }
            if(!empty($image5)) { ?>
                <a href="<?php echo (!empty($data_link['url'])) ? esc_url($data_link['url']) : '#'; ?>" <?php if (empty($data_link['url'])) echo 'onclick="return false;"'; ?>
                   target="<?php echo (!empty($data_link['target'])) ? '_blank' : '_parent'; ?>">
                    <?php echo wp_get_attachment_image($image5,'full'); ?>
                </a>
                <?php
            }if(!empty($desc)){?>
                <p class="desc"><?php echo esc_attr($desc); ?></p>
            <?php } ?>
        </div>
        <?php
        break;
}
?>

