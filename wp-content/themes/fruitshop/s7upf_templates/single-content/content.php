<?php
$data = '';
global $post;
$hide_media = get_post_meta(get_the_ID(),'hide_media_single',true);
if (has_post_thumbnail()) {
    $data .= '<div class="single-thumbnail banner-quangcao zoom-image">
                        '.get_the_post_thumbnail(get_the_ID(),'full').'</div>';
}
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="single-head">
        <h2 class="title30 font-bold"><?php the_title()?></h2>
        <?php s7upf_display_metabox('blog')?>
    </div>
    <?php if(!empty($data) and $hide_media != 'on') echo balanceTags($data);?>
    <div class="blog-single-content">
        <?php the_content();
        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fruitshop' ),
            'after'  => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
        ) );
        ?>
    </div>
    <?php s7upf_display_metabox('tag_share'); ?>
    <?php s7upf_display_metabox('author'); ?>
    <?php s7upf_display_metabox('next_prev'); ?>
</div>
