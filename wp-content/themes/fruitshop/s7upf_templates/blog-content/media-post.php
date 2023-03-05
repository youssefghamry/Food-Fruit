<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 29/03/2017
 * Time: 11:39
 */
$format = get_post_format();
$data_gallery = get_post_meta(get_the_ID(),'format_gallery',true);
$data_media = get_post_meta(get_the_ID(),'format_media',true);
$style_post = s7upf_get_option('s7upf_style_blog_list','default');
$data_gallery = explode(',',$data_gallery);
$size_image = 'full';
if(!empty($image_size))
$size_image = s7upf_get_size_image('full',$image_size);
$img_hover = 'fade-out-in';
if(!empty($img_overlay)){
    $img_hover = 'overlay-image';
}
$default_image = get_template_directory_uri().'/assets/images/no_image.png';

switch ($format){
    case 'image':
        if(has_post_thumbnail()) { ?>
            <div class="banner-quangcao <?php echo esc_attr($img_hover); ?> zoom-image mb-media ">
                <a href="<?php the_permalink(); ?>" class="adv-thumb-link"><?php the_post_thumbnail($size_image); ?></a>
            </div>
        <?php }
        break;
    case 'gallery':
        if(!empty($data_gallery) and is_array($data_gallery)){
            ?>
            <div class="post-gallery mb-media-post mb-media">
                <div class=" smart-slider" data-item = "1" data-itemres="0:1" data-speed = "5000" data-navigation="true" >
                    <?php
                    foreach ($data_gallery as $value){?>
                        <div class="image-slider12 banner-quangcao <?php echo esc_attr($img_hover); ?> zoom-image">
                            <a href="<?php the_permalink(); ?>" class="adv-thumb-link">
                            <?php echo wp_get_attachment_image($value,$size_image,false,array('class'=>'full-width')); ?>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php
        }
        break;
    case 'video':
        $video_format = array('.mp4','.ogg','.webm','.MP4','.Ogg','WebM');
        $check_format = true;
        if(!empty($data_media)) {
            ?>
            <div class="mb-media-video-post">
                <?php
                $check_format = false;
                foreach ($video_format as $key => $value) {
                    $check_format = strpos($data_media, $value);
                    if ($check_format !== false)
                        break;
                }
                if($check_format !== false) {
                    ?>
                    <video class="video_host_media" controls> <source src="<?php echo esc_url($data_media); ?>"></video>
                    <?php
                }else{
                    echo s7upf_remove_w3c(wp_oembed_get($data_media));
                }
                ?>
            </div>
            <?php
        }

        break;
    case 'audio':
        $check_type = true;
        if(!empty($data_media)) {
            if(strpos($data_media,'.mp3') == false){
                ?>
                <div
                    class="audio mb-media-audio-post"><?php echo s7upf_remove_w3c(wp_oembed_get($data_media, array('height' => '176'))) ?></div>
                <?php
            }else{
                ?>
                <audio controls class="audio mb-media-post">
                    <source src="<?php echo esc_url($data_media); ?>" type="audio/mpeg">
                </audio>
                <?php
            }
        }
        break;
    default:
        if(has_post_thumbnail()) { ?>
            <div class="banner-quangcao <?php echo esc_attr($img_hover); ?> zoom-image mb-media">
                <a href="<?php the_permalink(); ?>" class="adv-thumb-link"><?php the_post_thumbnail($size_image); ?></a>
            </div>
        <?php }
        break;
}
?>
