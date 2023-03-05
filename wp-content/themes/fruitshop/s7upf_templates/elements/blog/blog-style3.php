<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12/04/2017
 * Time: 10:09
 */
$custom_size_img = s7upf_get_size_image('full',$image_size);
$class_main = S7upf_Assets::build_css('color:' .$main_color.';',' .color');
$class_main .= ' '.S7upf_Assets::build_css('background:' .$main_color.';',' .shop-button');
$class_main .= ' '.S7upf_Assets::build_css('background:' .$main_color.'; border-color:'.$main_color.';',' .pagibar > .page-numbers.current');
$class_main .= ' '.S7upf_Assets::build_css('background:' .$main_color.'; border-color:'.$main_color.';',' .pagibar > a:hover');

$data_date=get_option('date_format');
if(!empty($date_format))
    $data_date= $date_format;

if($query->have_posts()) {
    ?>
    <div class="latest-news5 mb-blog-element-style3 <?php echo esc_attr($class_main); ?>">
        <div class="list-blog5">
            <div class="row">
               <?php
                while ($query->have_posts()) {
                    $query->the_post();?>
                    <div class="col-md-<?php echo esc_attr($col_layout); ?> col-sm-6 col-xs-12">
                        <div class="item-blog5">
                            <div class="banner-quangcao zoom-image">
                                <?php
                                if (has_post_thumbnail()) { ?>
                                        <a href="<?php the_permalink(); ?>"
                                           class="adv-thumb-link"><?php the_post_thumbnail($custom_size_img); ?></a>
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
                <?php } ?>
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
    </div>
<?php }