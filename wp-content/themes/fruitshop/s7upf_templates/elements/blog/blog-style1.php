<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12/04/2017
 * Time: 10:08
 */
$custom_size_img = s7upf_get_size_image('full',$image_size);
$data_date=get_option('date_format');
if(!empty($date_format))
    $data_date= $date_format;
?>
<div class="main-content-blog">
    <div class="content-blog-list">
        <?php
        while ($query->have_posts()) {
            $query->the_post(); ?>

            <article class="item-blog-list mb-item-blog-list <?php echo (is_sticky()) ? 'sticky':''?>">
                <?php
                if(!empty($post_format)){
                    if(has_post_thumbnail()) { ?>
                        <div class="banner-quangcao fade-out-in zoom-image mb-media">
                            <a href="<?php the_permalink(); ?>" class="adv-thumb-link"><?php the_post_thumbnail($custom_size_img); ?></a>
                        </div>
                    <?php }
                }else {
                  echo S7upf_Template::load_view('blog-content/media-post',false,array(
                      'image_size' => $image_size,
                  ));
                }
                ?>
                <div class="blog-info border bg-white">
                    <h2 class="title30 font-bold">
                        <a href="<?php echo esc_url(get_the_permalink()); ?>" class="black">
                            <?php the_title()?>
                            <?php echo (is_sticky()) ? '<i class="fa fa-thumb-tack"></i>':''?>
                        </a>
                    </h2>
                    <ul class="list-inline-block blog-comment-date">
                        <li class="mb-category"><label><?php echo esc_html__('Category: ','fruitshop'); ?></label><?php echo get_the_category_list(', ');?></li>
                        <li><label><?php echo esc_html__('Date: ','fruitshop'); ?></label><span class="color"><?php echo get_the_date($data_date); ?></span></li>
                        <li>
                            <label> <?php
                                if(get_comments_number()>1) esc_html_e('Comments: ', 'fruitshop') ;
                                else esc_html_e('Comment: ', 'fruitshop') ;
                                ?>
                            </label>
                            <a href="<?php echo esc_url( get_comments_link() ); ?>" class="color"><?php echo get_comments_number(); ?></a>
                        </li>
                    </ul>

                    <div class="desc">
                        <?php if(!empty($word_excerpt)){ ?>
                        <?php if ( has_excerpt( get_the_ID()) ) {
                            echo balanceTags(wp_trim_words( get_the_excerpt(), $word_excerpt , '...' ), true); }
                        else echo  balanceTags(wp_trim_words( get_the_content(), $word_excerpt , '... '), true); ?>
                        <?php } ?>
                    </div>

                    <div class="table social-readmore">
                        <div class="text-left">
                            <a href="<?php echo esc_url(get_the_permalink()); ?>" class="shop-button"><?php esc_html_e('Read More','fruitshop')?></a>
                        </div>
                        <?php  s7upf_display_metabox('share_post');?>
                    </div>

                </div>
            </article>
            <?php
        }?>
    </div>
    <?php
    if('on' === $pagination){
       ?> <div class="pagibar text-center"> <?php

        $big = 999999999;
        echo paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '&page=%#%',
            'current' => max(1, $paged),
            'total' => $query->max_num_pages,
            'mid_size' => 1,
            'type' => 'plain',
            'prev_text' => '<i class="icon ion-ios-arrow-thin-left"></i>',
            'next_text' => '<i class="icon ion-ios-arrow-thin-right"></i>',
        ));
        ?> </div> <?php
    }
    ?>
</div>
