<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 05/04/2017
 * Time: 11:58
 */
$class_title_color = S7upf_Assets::build_css('color: '.$title_color.';');
$class_sub_title_color = S7upf_Assets::build_css('color: '.$sub_title_color.';');
$class_desc_color = S7upf_Assets::build_css('color: '.$desc_color.';');
switch ($style){
    case 'style1':
        if(!empty($title)){ ?>
            <h2 class="title30 font-bold title-box1 text-center"><?php echo esc_attr($title); ?></h2>
        <?php } ?>
            <?php  if(!empty($data_item_review) and is_array($data_item_review)) { ?>
            <div class="client-slider">
                <div class="slick center">
                    <?php foreach ($data_item_review as $value){
                        if(!empty($value['link']))
                        $data_link = vc_build_link($value['link']);?>
                        <div class="item-client">
                            <div class="client-thumb">
                                <a href="#" onclick="return false;"><?php if(!empty($value['image'])) echo wp_get_attachment_image($value['image'],array(100,100)); ?></a>
                            </div>
                            <div class="client-info">
                                <?php if(!empty($value['desc'])){ ?>
                                <p class="desc <?php echo esc_attr($class_desc_color); ?>"><?php echo esc_attr($value['desc']); ?></p>
                                <?php }
                                if(!empty($value['title'])){?>
                                    <h3 class="title18">
                                        <a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" class="black <?php echo esc_attr($class_title_color); ?>"><?php echo esc_attr($value['title']); ?></a>
                                    </h3>
                                <?php }
                                if(!empty($value['sub_title'])){ ?>
                                    <span class="color <?php echo esc_attr($class_sub_title_color); ?>"><?php echo esc_attr($value['sub_title']); ?></span>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                    <?php foreach ($data_item_review as $value){
                        if(!empty($value['link']))
                            $data_link = vc_build_link($value['link']);?>
                        <div class="item-client">
                            <div class="client-thumb">
                                <a href="#" onclick="return false;"><?php if(!empty($value['image'])) echo wp_get_attachment_image($value['image'],array(100,100)); ?></a>
                            </div>
                            <div class="client-info">
                                <?php if(!empty($value['desc'])){ ?>
                                    <p class="desc"><?php echo esc_attr($value['desc']); ?></p>
                                <?php }
                                if(!empty($value['title'])){?>
                                    <h3 class="title18">
                                        <a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" class="black"><?php echo esc_attr($value['title']); ?></a>
                                    </h3>
                                <?php }
                                if(!empty($value['sub_title'])){ ?>
                                    <span class="color"><?php echo esc_attr($value['sub_title']); ?></span>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php
        }
        break;
    case 'style2':
        $class_desc_line = S7upf_Assets::build_css('background: '.$title_color.';',' .desc::before');
        $class_desc_line .= ' '.S7upf_Assets::build_css('border-color: '.$title_color.';',' .client-thumb a');
        $class_desc_line .= ' '.S7upf_Assets::build_css('border-color: '.$title_color.';',' .client-thumb a img');
        $class_desc_line .= ' '.S7upf_Assets::build_css('background: '.$title_color.'; border-color:'.$title_color.';',' .owl-theme .owl-controls .owl-buttons div:hover');
        if(!empty($data_item_review) and is_array($data_item_review)) { ?>
            <div class="client-slider2 text-center  <?php echo esc_attr($class_desc_line); ?>">
                <div class="wrap-item" data-transition="fade" data-pagination="false" data-navigation="true"
                     data-itemscustom="[[0,1]]">
                    <?php foreach ($data_item_review as $value){
                        if(!empty($value['link']))
                            $data_link = vc_build_link($value['link']); ?>
                            <div class="item-client2">
                                <div class="client-thumb">
                                    <a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" tabindex="0">
                                        <?php if(!empty($value['image'])) echo wp_get_attachment_image($value['image'],array(100,100)); ?>
                                    </a>
                                </div>
                                <div class="client-info">
                                    <?php if(!empty($value['title'])){?>
                                    <h3 class="title18">
                                        <a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" class="color <?php echo esc_attr($class_title_color); ?>">
                                            <?php echo esc_attr($value['title']); ?>
                                        </a>
                                    </h3>
                                    <?php }
                                    if(!empty($value['sub_title'])){ ?>
                                        <span class="<?php echo esc_attr($class_sub_title_color); ?>"><?php echo esc_attr($value['sub_title']); ?></span>
                                    <?php } ?>
                                    <?php if(!empty($value['desc'])){ ?>
                                        <p class="desc <?php echo esc_attr($class_desc_color); ?>"><?php echo esc_attr($value['desc']); ?></p>
                                    <?php } ?>

                                </div>
                            </div>
                        <?php } ?>
                </div>
            </div>
            <?php
        }
        break;
        case 'style3':
            $class_main_color = S7upf_Assets::build_css('border-color: '.$sub_title_color.';',' .client-thumb a');
            $class_main_color .= ' '.S7upf_Assets::build_css('background-color: '.$sub_title_color.';',' .owl-pagination .owl-page.active span');
            $class_main_color .= ' '.S7upf_Assets::build_css('border-color: '.$sub_title_color.';',' .owl-pagination .owl-page span');
            $class_main_color .= ' '.S7upf_Assets::build_css('background: '.$sub_title_color.';',' .item-about-client .title18::before');
            if(!empty($data_item_review) and is_array($data_item_review)) { ?>
                <div class="about-client-slider <?php echo esc_attr($class_main_color); ?>">
                    <div class="wrap-item" data-itemscustom="[[0,1]]" data-transition="fade">
                        <?php foreach ($data_item_review as $value){
                            if(!empty($value['link']))
                                $data_link = vc_build_link($value['link']); ?>
                            <div class="item-about-client text-center">
                                <div class="client-thumb">
                                    <a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>">
                                        <?php if(!empty($value['image'])) echo wp_get_attachment_image($value['image'],array(100,100)); ?>
                                    </a>
                                </div>
                                <?php if(!empty($value['desc'])){ ?>
                                    <p class="desc <?php echo esc_attr($class_desc_color); ?>"><?php echo esc_attr($value['desc']); ?></p>
                                <?php } ?>
                                <?php if(!empty($value['title'])){?>
                                    <h3 class="title18 font-bold">
                                        <a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" class="black <?php echo esc_attr($class_title_color); ?>"><?php echo esc_attr($value['title']); ?></a>
                                    </h3>
                                <?php }
                                if(!empty($value['sub_title'])){ ?>
                                    <span class="color <?php echo esc_attr($class_sub_title_color); ?>"><?php echo esc_attr($value['sub_title']); ?></span>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php
        }
        break;
    default:
       if(!empty($data_item_review4) and is_array($data_item_review4)) { ?>

            <div class="client-slider8">
                <div class="wrap-item" data-itemscustom="[[0,1]]">
                    <?php foreach ($data_item_review4 as $value){
                        if(!empty($value['link']))
                            $data_link = vc_build_link($value['link']); ?>
                        <div class="item-client8 text-center">
                            <?php if(!empty($value['desc'])){ ?>
                                <p class="desc <?php echo esc_attr($class_desc_color); ?>"><?php echo esc_attr($value['desc']); ?></p>
                            <?php } if(!empty($value['title'])){?>
                                <h3 class="title18"><a  href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" class="<?php echo esc_attr($class_title_color); ?>">
                                        <?php echo esc_attr($value['title']); ?>
                                    </a></h3>
                            <?php } if(!empty($value['sub_title'])){ ?>
                                <span class="color <?php echo esc_attr($class_sub_title_color); ?>"><?php echo esc_attr($value['sub_title']); ?></span>
                            <?php } ?>
                        </div>
                    <?php }?>
                </div>
            </div>
            <?php
        }
        break;
}