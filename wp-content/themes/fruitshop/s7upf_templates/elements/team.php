<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 08/04/2017
 * Time: 08:56
 */
$image_size = s7upf_get_size_image('full',$image_size);
if('style1' == $style){
    if(!empty($data_item_team) and is_array($data_item_team)) { ?>
        <div class="farm-slider banner-slider">
            <div class="wrap-item group-navi" data-transition="fade" data-pagination="false" data-navigation="true" data-itemscustom="[[0,1]]">
                <?php  foreach ($data_item_team as $value) {
                    $data_link=$data_link_face=$data_link_twitter=$data_link_insta=$data_link_google='';
                    if(!empty($value['link']))
                        $data_link = vc_build_link($value['link']);
                    if(!empty($value['face_social']))
                        $data_link_face = vc_build_link($value['face_social']);
                    if(!empty($value['twitter_social']))
                        $data_link_twitter = vc_build_link($value['twitter_social']);
                    if(!empty($value['insta_social']))
                        $data_link_insta = vc_build_link($value['insta_social']);
                    if(!empty($value['google_social']))
                        $data_link_google = vc_build_link($value['google_social']);
                    ?>
                <div class="item-farm item-slider">
                    <?php if(!empty($value['image'])){ ?>
                    <div class="farm-thumb banner-quangcao zoom-image fade-out-in animated" data-animated="bounceInLeft">
                        <a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" class="adv-thumb-link"><?php echo wp_get_attachment_image($value['image'],$image_size);?></a>
                    </div>
                    <?php } ?>
                    <div class="farm-info animated" data-animated="bounceInRight">
                        <?php if(!empty($value['title'])){ ?>
                        <h2 class="title18"><a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" class="black"><?php echo esc_attr($value['title'])?></a></h2>
                        <?php }
                        if(!empty($value['sub_title'])){
                        ?>
                        <div class="farm-cat">
                            <a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" class="silver"><?php echo esc_attr($value['sub_title']); ?></a>
                        </div>
                        <?php }
                        if(!empty($value['desc'])){?>
                        <p class="desc"><?php echo esc_attr($value['desc']); ?></p>
                        <?php } ?>
                        <div class="top-social">
                            <?php if(!empty($data_link_face['url'])){ ?>
                                <a href="<?php echo (!empty($data_link_face['url']))? esc_url($data_link_face['url']): '#'; ?>" <?php if(empty($data_link_face['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link_face['target']))?'_blank':'_parent'; ?>"><i class="fa fa-facebook"></i></a>
                            <?php } ?>
                            <?php if(!empty($data_link_twitter['url'])){ ?>
                                <a href="<?php echo (!empty($data_link_twitter['url']))? esc_url($data_link_twitter['url']): '#'; ?>" <?php if(empty($data_link_twitter['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link_twitter['target']))?'_blank':'_parent'; ?>">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            <?php } ?>
                            <?php if(!empty($data_link_insta['url'])){ ?>
                                <a href="<?php echo (!empty($data_link_insta['url']))? esc_url($data_link_insta['url']): '#'; ?>" <?php if(empty($data_link_insta['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link_insta['target']))?'_blank':'_parent'; ?>">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            <?php } ?>
                            <?php if(!empty($data_link_google['url'])){ ?>
                                <a href="<?php echo (!empty($data_link_google['url']))? esc_url($data_link_google['url']): '#'; ?>" <?php if(empty($data_link_google['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link_google['target']))?'_blank':'_parent'; ?>">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            <?php } ?>

                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php
    }
}else{
    if(!empty($data_item_team) and is_array($data_item_team)) { ?>
        <div class="decate-slider mb-team-element-style2">
            <div class="wrap-item" data-pagination="false" data-itemscustom="[[0,1],[990,2]]" data-autoplay="true">
            <?php  foreach ($data_item_team as $value) {
                $data_link=$data_link_face=$data_link_twitter=$data_link_insta=$data_link_google='';
                if(!empty($value['link']))
                    $data_link = vc_build_link($value['link']);
                if(!empty($value['face_social']))
                    $data_link_face = vc_build_link($value['face_social']);
                if(!empty($value['twitter_social']))
                    $data_link_twitter = vc_build_link($value['twitter_social']);
                if(!empty($value['insta_social']))
                    $data_link_insta = vc_build_link($value['insta_social']);
                if(!empty($value['google_social']))
                    $data_link_google = vc_build_link($value['google_social']);
                ?>
                <div class="item-decate">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <?php if(!empty($value['image'])){ ?>
                                <div class="decate-thumb banner-quangcao zoom-out">
                                    <a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" class="adv-thumb-link">
                                        <?php echo wp_get_attachment_image($value['image'],$image_size);?>
                                        <?php echo wp_get_attachment_image($value['image'],$image_size);?>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="decate-info">
                            <?php if(!empty($value['title'])){ ?>
                                <h3 class="title18 font-bold"><a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" class="black"><?php echo esc_attr($value['title'])?></a></h3>
                            <?php }
                            if(!empty($value['sub_title'])){ ?>
                                <p class="color"><?php echo esc_attr($value['sub_title']); ?></p>
                                <?php }
                                if(!empty($value['desc'])){?>
                                <p class="desc"><?php echo esc_attr($value['desc']); ?></p>
                                <?php } ?>
                                <div class="social-network">
                                    <?php if(!empty($data_link_face['url'])){ ?>
                                        <a class="float-shadow face" href="<?php echo (!empty($data_link_face['url']))? esc_url($data_link_face['url']): '#'; ?>" <?php if(empty($data_link_face['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link_face['target']))?'_blank':'_parent'; ?>"><i class="fa fa-facebook"></i></a>
                                    <?php } ?>
                                    <?php if(!empty($data_link_twitter['url'])){ ?>
                                        <a class="float-shadow twitter" href="<?php echo (!empty($data_link_twitter['url']))? esc_url($data_link_twitter['url']): '#'; ?>" <?php if(empty($data_link_twitter['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link_twitter['target']))?'_blank':'_parent'; ?>">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    <?php } ?>
                                    <?php if(!empty($data_link_insta['url'])){ ?>
                                        <a class="float-shadow insta" href="<?php echo (!empty($data_link_insta['url']))? esc_url($data_link_insta['url']): '#'; ?>" <?php if(empty($data_link_insta['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link_insta['target']))?'_blank':'_parent'; ?>">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    <?php } ?>
                                    <?php if(!empty($data_link_google['url'])){ ?>
                                        <a class="float-shadow google" href="<?php echo (!empty($data_link_google['url']))? esc_url($data_link_google['url']): '#'; ?>" <?php if(empty($data_link_google['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link_google['target']))?'_blank':'_parent'; ?>">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php
    }
}