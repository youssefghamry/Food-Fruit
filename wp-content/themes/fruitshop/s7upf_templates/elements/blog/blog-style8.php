<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12/04/2017
 * Time: 10:09
 */
$custom_size_img = s7upf_get_size_image('400x300',$image_size);
if(empty($number_item_desktop)) $number_item_desktop = '3';
$data_date=get_option('date_format');
if(!empty($date_format))
    $data_date= $date_format;
if($query->have_posts()) { ?>
    <div class="blog-slider15">
        <div class="wrap-item" data-pagination="false" data-navigation="true" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-itemscustom="[[0,1],[640,2],[990,<?php echo esc_attr($number_item_desktop);?>]]">
            <?php
            while ($query->have_posts()) {
                $query->the_post(); ?>
                <div class="item-post15 drop-shadow text-left">
                    <div class="post-thumb zoom-rotate overlay-image">
                        <a href="<?php the_permalink(); ?>" class="adv-thumb-link">
                            <?php the_post_thumbnail($custom_size_img); ?>
                        </a>
                        <a href="<?php the_post_thumbnail_url('full')?>" class="quickview-link various bg-color1"><i class="fa fa-search" aria-hidden="true"></i></a>
                    </div>
                    <div class="post-info bg-white">
                        <div class="category-blog8 silver">
                            <?php echo get_the_category_list(', ');?>
                        </div>
                        <h3 class="title18 font-bold title-post"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="post-by table">
                            <div class="ava">
                                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                    <?php echo get_avatar(get_the_author_meta('ID'), 36); ?>
                                </a>
                            </div>
                            <div class="info">
                                <h3 class="title14"><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo get_the_author(); ?></a></h3>
                                <p class="desc silver"> <?php echo get_the_date(); ?></p>
                            </div>
                            <a href="<?php echo esc_url( get_comments_link() ); ?>" class="comment">
                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                                <span class="silver"><?php echo get_comments_number(); ?></span>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php }