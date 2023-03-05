<?php
$word_excerpt = s7upf_get_option('number_word_excerpt_blog_list','30');
$show_share = s7upf_get_option('show_share_blog_list','on');
?>
<article class="item-blog-list mb-item-blog-list <?php echo (is_sticky()) ? 'sticky':''?>">
    <?php
    /**
     * s7upf_before_blog_post hook.
     *
     * @hooked s7upf_blog_post_media - 10
     */
    do_action('s7upf_before_blog_post');
    ?>
    <div class="blog-info border bg-white">
        <h2 class="title30 font-bold">
            <a href="<?php echo esc_url(get_the_permalink()); ?>" class="black">
                <?php the_title()?>
                <?php echo (is_sticky()) ? '<i class="fa fa-thumb-tack"></i>':''?>
            </a>
        </h2>
        <?php s7upf_display_metabox('blog');   ?>
        <div class="desc">
            <?php if ( has_excerpt( get_the_ID()) ) {
                echo balanceTags(wp_trim_words( get_the_excerpt(), $word_excerpt , '...' ), true); }
            else echo  balanceTags(wp_trim_words( get_the_content(), $word_excerpt , '...   '), true); ?>
        </div>
        <div class="table social-readmore">
            <div class="text-left">
                <a href="<?php echo esc_url(get_the_permalink()); ?>" class="shop-button"><?php esc_html_e('Read More','fruitshop')?></a>
            </div>
            <?php if('on' === $show_share) s7upf_display_metabox('share_post');?>
        </div>

    </div>
</article>