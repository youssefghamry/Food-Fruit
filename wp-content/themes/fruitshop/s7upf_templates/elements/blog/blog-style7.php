<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12/04/2017
 * Time: 10:09
 */
$custom_size_img = s7upf_get_size_image('full',$image_size);
if(empty($number_item_desktop)) $number_item_desktop = '3';
$data_date=get_option('date_format');
if(!empty($date_format))
    $data_date= $date_format;
if($query->have_posts()) { ?>
    <div class="from-blog8">
        <div class="blog-slider8">
            <div class="wrap-item" data-pagination="false" data-navigation="true" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-itemscustom="[[0,1],[640,2],[990,<?php echo esc_attr($number_item_desktop);?>]]">
            <?php
            while ($query->have_posts()) {
                $query->the_post(); ?>
                <div class="item-blog2 bg-white drop-shadow">
                    <div class="row">

                        <?php
                        if (has_post_thumbnail()) { ?>
                            <div class="col-md-12">
                                <div class="banner-quangcao zoom-image overlay-image">
                                <a href="<?php the_permalink(); ?>" class="adv-thumb-link"><?php the_post_thumbnail($custom_size_img); ?></a>
                                </div>
                            </div>
                        <?php } ?>


                        <div class="col-md-12">
                            <div class="blog-info2 text-center info-center">
                                <h2 class="title18"><a href="<?php the_permalink(); ?>" class="black"><?php the_title(); ?></a></h2>
                                <ul class="list-inline-block post-comment-date">
                                    <li><span class="color"><i class="fa fa-calendar-o"></i><?php echo get_the_date($data_date); ?></span></li>
                                    <li><span class="color"><i class="fa fa-commenting-o"></i></span>
                                        <a href="<?php echo esc_url( get_comments_link() ); ?>" class="color"><?php echo get_comments_number(); ?></a>
                                    </li>
                                </ul>
                                <p class="desc">
                                    <?php if (!empty($word_excerpt)) { ?>
                                        <?php if (has_excerpt(get_the_ID())) {
                                            echo balanceTags(wp_trim_words(get_the_excerpt(), $word_excerpt, '...'), true);
                                        }  ?>
                                    <?php } ?>
                                </p>
                                <a href="<?php the_permalink(); ?>" class="shop-button"><?php echo esc_html__('Read more','fruitshop'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
<?php }