<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 10/04/2017
 * Time: 11:30
 */
$array_image = '';
$size_image = s7upf_get_size_image('380x205',$image_size);
$class_color_title = S7upf_Assets::build_css('color:'.$color_title.';');
$class_bg_icon = S7upf_Assets::build_css('background:'.$bg_icon.';',' .btn-gal');
$class_bg_icon_hover = S7upf_Assets::build_css('background:'.$bg_icon_hover.';',' .btn-gal:hover');
$class_bg_content = S7upf_Assets::build_css('background:'.$bg_content.';');
if(!empty($data_photo) and is_array($data_photo) and 'style1' == $style){ ?>
    <div class="list-photo-gal3 mb-element-gallery">
        <div class="row">
            <?php foreach ($data_photo as $key=>$value) {
                $data_link = '';
                if(!empty($value['link'])){
                    $data_link = vc_build_link($value['link']);
                }
                if (!empty($value['images'])) {
                    $array_image = explode(',',$value['images']); ?>
                    <div class="col-md-<?php echo esc_attr($column); ?> col-sm-6 col-xs-6">
                        <div class="item-gal3 box-hover-dir wow <?php if(!empty($value['animation_css'])) echo esc_attr($value['animation_css']);?>" <?php if(!empty($value['animation_delay'])) echo'data-wow-delay="'.$value['animation_delay'].'s"'; ?>>
                            <?php if(!empty($array_image[0])){

                                echo wp_get_attachment_image($array_image[0],$size_image,false);
                            }?>
                            <div class="gal-info3 <?php echo esc_attr($class_bg_icon);?> <?php echo esc_attr($class_bg_icon_hover);?>">
                                <div class="gal-content3 <?php echo esc_attr($class_bg_content); ?>">
                                    <?php if(!empty($array_image) and is_array($array_image)) {
                                        foreach ($array_image as $key_image => $img_item) { ?>
                                            <a href="<?php echo esc_url(wp_get_attachment_image_url($img_item,'full')); ?>" class="fancybox <?php if($key_image==0)echo 'btn-gal'?>" data-fancybox-group="gallery_<?php echo esc_attr($key); ?>"><?php if($key_image == 0){ ?><i class="fa fa-search" aria-hidden="true"></i><?php } ?></a>
                                        <?php }
                                    }
                                    if(!empty($value['title'])){?>
                                        <h2 class="title18 font-bold"><a  href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" class="color <?php echo esc_attr($class_color_title); ?>"><?php echo esc_attr($value['title']); if(empty($value['hidden_count'])){?> (<?php echo esc_attr(count($array_image)); ?>)<?php } ?></a></h2>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
            }?>
        </div>
    </div>
<?php } else if(!empty($data_photo2) and is_array($data_photo2) and 'style2' == $style){
    ?>
    <div class="wrap-hover-dir element-gallery-style2">
        <?php foreach ($data_photo2 as $key=>$value) {
            $data_link = '';
            if(!empty($value['link'])){
                $data_link = vc_build_link($value['link']);
            }
            if (!empty($value['images'])) {
                $array_image = explode(',',$value['images']); ?>
                <div class="item-picture box-hover-dir">
                    <?php if(!empty($array_image[0])){

                        echo wp_get_attachment_image($array_image[0],$size_image,false);
                    }?>
                    <div class="item-info">
                        <div class="wrap-info">
                            <?php if(!empty($value['title'])){
                                echo '<p class="desc">'.$value['title'].'</p>';
                            } ?>
                            <?php if(!empty($data_link['title'])) { ?>
                                <a  class="shop-button shop-button3" href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>"><?php echo esc_attr($data_link['title']); ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php }
        }?>
    </div>
    <?php
}
