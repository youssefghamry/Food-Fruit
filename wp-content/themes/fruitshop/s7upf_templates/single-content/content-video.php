<?php
$data = '';
$data_media = get_post_meta(get_the_ID(), 'format_media', true);
$video_format = array('.mp4','.ogg','.webm','.MP4','.Ogg','WebM');
$hide_media = get_post_meta(get_the_ID(),'hide_media_single',true);
$check_format = false;
foreach ($video_format as $key => $value) {
    $check_format = strpos($data_media, $value);
    if ($check_format !== false)
        break;
}
if($check_format !== false) {
    $data .= '<div class="media-video-blog single-thumbnail banner-quangcao ">';
    $data .= '<video class="video_host_media" controls> <source src="'.esc_url($data_media).'"></video>';
    $data .= '</div>';
}else{
    $data .= '<div class="media-video-blog single-thumbnail banner-quangcao ">';
    $data .= s7upf_remove_w3c(wp_oembed_get($data_media));
    $data .= '</div>';
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