<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12/04/2017
 * Time: 10:09
 */
$data_button = '';
$custom_size_img = s7upf_get_size_image('full',$image_size);
$data_date=get_option('date_format');
if(!empty($date_format))
    $data_date= $date_format;
if(!empty($button_view))
$data_button = vc_build_link($button_view);
if($query->have_posts()) {
?>
<div class=" mb-blog-element-style4">
        <div class="row">
            <?php
            $i = 1;
            while ($query->have_posts()) {
                $query->the_post();
                                ?>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="item-post1">
                    <?php if($i%2 !== 0 ){?>
                        <div class="post-thumb banner-quangcao overlay-image zoom-image">
                            <?php
                            if (has_post_thumbnail()) { ?>
                                <a href="<?php the_permalink(); ?>"
                                   class="adv-thumb-link"><?php the_post_thumbnail($custom_size_img); ?></a>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <div class="post-info">
                        <?php echo get_the_category_list(); ?>
                        <h3 class="title18"><a href="<?php the_permalink(); ?>" class="black"><?php the_title(); ?></a></h3>
                        <p class="post-author-date silver"><?php echo esc_html__('by ','fruitshop')?><b class="text-uppercase"><?php echo get_the_author(); ?></b>  <?php echo get_the_date($data_date); ?></p>
                        <p class="desc">
                            <?php if (!empty($word_excerpt)) { ?>
                                <?php if (has_excerpt(get_the_ID())) {
                                    echo balanceTags(wp_trim_words(get_the_excerpt(), $word_excerpt, '...'), true);
                                } else echo balanceTags(wp_trim_words(get_the_content(), $word_excerpt, '... '), true); ?>
                            <?php } ?>
                        </p>
                    </div>
                    <?php if($i%2 == 0 ){?>
                        <div class="post-thumb banner-quangcao overlay-image zoom-image">
                            <?php
                            if (has_post_thumbnail()) { ?>
                                <a href="<?php the_permalink(); ?>"
                                   class="adv-thumb-link"><?php the_post_thumbnail($custom_size_img); ?></a>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php $i= $i+1; } ?>
        </div>
        <?php if(!empty($data_button['title'])){?>
        <div class="text-center"><a href="<?php echo (!empty($data_button['url']))? esc_url($data_button['url']): '#'; ?>" <?php if(empty($data_button['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_button['target']))?'_blank':'_parent'; ?>" class="btn-arrow color"><?php echo esc_attr($data_button['title']); ?></a></div>
        <?php } ?>
</div>
<?php }