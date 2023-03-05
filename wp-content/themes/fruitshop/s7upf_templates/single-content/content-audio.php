<?php
$data = '';
$media_url = get_post_meta(get_the_ID(), 'format_media', true);
$hide_media = get_post_meta(get_the_ID(),'hide_media_single',true);
if (!empty($media_url)) {
    if(strpos($media_url,'.mp3') !== false){
        $data .='<div class="media-audio-blog single-thumbnail banner-quangcao "><audio controls><source src="'.esc_url($media_url).'" type="audio/mpeg"></audio></div>';
    }else{
        $data .= '<div class="audio media-audio-blog single-thumbnail banner-quangcao ">' . s7upf_remove_w3c(wp_oembed_get($media_url, array('height' => '176'))) . '</div>';
    }
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