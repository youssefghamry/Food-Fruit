<?php
$data = '';
$hide_media = get_post_meta(get_the_ID(),'hide_media_single',true);
$gallery = get_post_meta(get_the_ID(), 'format_gallery', true);
if (!empty($gallery)){
    $array = explode(',', $gallery);
    if(is_array($array) && !empty($array)){

        $data .= '<div class="media-blog single-thumbnail banner-quangcao "><div class="post-gallery"><div class="gallery-slider sv-slider" data-item = "1" data-speed = "5000">';
        foreach ($array as $key => $item) {
            $thumbnail_url = wp_get_attachment_url($item);
            $data .='<div class="image-slider">';
            $data .= '<img src="' . esc_url($thumbnail_url) . '" alt="image-slider">';
            $data .= '</div>';
        }
        $data .='</div></div></div>';
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