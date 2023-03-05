<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 10/06/2019
 * Time: 3:44 CH
 */
$col_layout = s7upf_get_option('col_layout_grid');
$word_excerpt = s7upf_get_option('number_word_excerpt_blog_list','30');
$data_date=get_option('date_format');
?>
<div class="col-md-<?php echo esc_attr($col_layout); ?> col-sm-6 col-xs-12">

    <div class="item-post1 mb-blog-element-style4">
            <div class="post-thumb banner-quangcao overlay-image zoom-image">
                <?php
                if (has_post_thumbnail()) { ?>
                    <a href="<?php the_permalink(); ?>"
                       class="adv-thumb-link"><?php the_post_thumbnail('full'); ?></a>
                <?php } ?>
            </div>
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

    </div>
</div>
