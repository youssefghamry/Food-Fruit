<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12/04/2017
 * Time: 10:10
 */

$data_date=get_option('date_format');
if(!empty($date_format))
    $data_date= $date_format;
$class_color = S7upf_Assets::build_css('color:'.$main_color.';',' .color');
$class_color .= ' '.S7upf_Assets::build_css('color:'.$main_color.';',' .black:hover');
$class_color_button = S7upf_Assets::build_css('background:'.$main_color.';');
if($query->have_posts()) { ?>
<div class="list-post-format3 mb-blog-element-style6 <?php echo esc_attr($class_color); ?>">
    <div class="row">
        <?php $i = 0;
        while ($query->have_posts()) {
        $query->the_post();
            $format = get_post_format();
            if($format == 'gallery'){
                $data_format = 'fa-book';
            }elseif($format == 'video'){
                $data_format = 'fa-video-camera';
            }else{
                $data_format = 'fa-image';
            }
            if($i%3 == 1) {
                $custom_size_img = s7upf_get_size_image('full',$image_size);
            }else{
                $custom_size_img = s7upf_get_size_image('full',$image_size_small);
            }
        ?>
        <div class="item col-md-<?php if($i%3 == 1) echo '6'; else echo'3'; ?> col-sm-6 col-xs-12">
            <div class="item-post-format3">
                <div class="banner-quangcao  <?php if($i%3 == 1) echo 'line-scale'; else echo'fade-out-in'; ?> zoom-image">
                    <?php
                    if (has_post_thumbnail()) { ?>
                        <a href="<?php the_permalink(); ?>"
                           class="adv-thumb-link"><?php the_post_thumbnail($custom_size_img); ?></a>
                    <?php } ?>
                </div>
                <div class="post-info">
                    <h3 class="title18 text-uppercase">
                        <span class="color"><i class="fa <?php echo esc_attr($data_format); ?>"></i></span>
                        <a href="<?php the_permalink(); ?>" class="black"><?php the_title(); ?></a></h3>
                    <p class="silver post-author-date"><?php echo esc_html__('Post by: ','fruitshop'); ?><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo get_the_author(); ?></a><?php echo esc_html__(' - on ','fruitshop'); echo get_the_date($data_date); ?></p>
                    <p class="desc">
                        <?php if (!empty($word_excerpt)) { ?>
                            <?php if (has_excerpt(get_the_ID())) {
                                echo balanceTags(wp_trim_words(get_the_excerpt(), $word_excerpt, '...'), true);
                            } else echo balanceTags(wp_trim_words(get_the_content(), $word_excerpt, '...'), true); ?>
                        <?php } ?>
                    </p>
                    <a href="<?php the_permalink(); ?>" class="shop-button <?php echo esc_attr($class_color_button);?>"><?php echo esc_html__('Read more','fruitshop')?></a>
                </div>
            </div>
        </div>

        <?php $i=$i+1; } ?>
    </div>
</div>
<?php }