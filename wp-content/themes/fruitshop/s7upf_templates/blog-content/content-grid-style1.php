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
    <div class="item-blog5 mb-blog-element-style3">
        <div class="banner-quangcao zoom-image">
            <?php
            if (has_post_thumbnail()) { ?>
                <a href="<?php the_permalink(); ?>"
                   class="adv-thumb-link"><?php the_post_thumbnail('full'); ?></a>
                <?php echo get_the_category_list();?>

            <?php } ?>

        </div>
        <div class="blog-info2">
            <h2 class="title18"><a href="<?php the_permalink(); ?>" class="black"><?php the_title(); ?></a></h2>
            <ul class="list-inline-block post-comment-date">
                <li><span class="color">
                 <i class="fa fa-calendar-o"></i><?php echo get_the_date($data_date); ?></span></li>
                <li><span class="color"><i class="fa fa-commenting-o"></i></span>
                    <a href="<?php echo esc_url( get_comments_link() ); ?>" class="color"><?php echo get_comments_number(); ?></a>
                </li>
            </ul>
            <p class="desc">
                <?php if (!empty($word_excerpt)) { ?>
                    <?php if (has_excerpt(get_the_ID())) {
                        echo balanceTags(wp_trim_words(get_the_excerpt(), $word_excerpt, '...'), true);
                    } else echo balanceTags(wp_trim_words(get_the_content(), $word_excerpt, '... '), true); ?>
                <?php } ?>
            </p>
            <a href="<?php the_permalink(); ?>" class="shop-button"><?php echo esc_html__('Read more','fruitshop')?></a>
        </div>
    </div>
</div>
