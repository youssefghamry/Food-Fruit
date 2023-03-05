<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12/04/2017
 * Time: 10:09
 */
$custom_size_img = s7upf_get_size_image('full',$image_size);
$data_date=get_option('date_format');
$count_post = $query->post_count;
if(!empty($date_format))
    $data_date= $date_format;
if($query->have_posts()) {
?>
<div class="mb-blog-element-style5">
    <div class="row">
        <?php
        $i = 1;
        while ($query->have_posts()) {
           $query->the_post();
            if($i%6 == 1 || $i%6 ==0){
                $custom_size_img = s7upf_get_size_image('full',$image_size_vertical);
            }else{
                $custom_size_img = s7upf_get_size_image('full',$image_size);
            }

            if($i%6 == 1 || $i%6 ==0){ ?>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="item-blog2 wow fadeInUp">
                        <div class="row">
                            <div class="col-md-12 col-sm-6 col-xs-6">
                                <div class="banner-quangcao zoom-image overlay-image">
                                    <?php
                                    if (has_post_thumbnail()) { ?>
                                        <a href="<?php the_permalink(); ?>"
                                           class="adv-thumb-link"><?php the_post_thumbnail($custom_size_img); ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-6 col-xs-6">
                                <div class="blog-info2 text-center info-center">
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
                                    <a href="<?php the_permalink(); ?>" class="shop-button"><?php echo esc_html__('Read more','fruitshop'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }else{ $class = 'fadeInRight';
                if($i%6 == 2 || $i%6==4){
                    echo '<div class="col-md-8 col-sm-12 col-xs-12">'; $class='fadeInLeft';
                }
                echo '<div class="item-blog2 wow '.$class.'"> <div class="row">';
                if($i%6==4 || $i%6==3){
                    ?>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="banner-quangcao zoom-image overlay-image">
                            <?php
                            if (has_post_thumbnail()) { ?>
                                <a href="<?php the_permalink(); ?>"
                                   class="adv-thumb-link"><?php the_post_thumbnail($custom_size_img); ?></a>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                }?>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="blog-info2 text-left <?php if($i%6==5 || $i%6==2) echo 'info-left'; ?>">
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
                        <a href="<?php the_permalink(); ?>" class="shop-button"><?php echo esc_html__('Read more','fruitshop'); ?></a>
                    </div>
                </div>
                <?php
                if($i%6==5 || $i%6==2){
                    ?>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="banner-quangcao zoom-image overlay-image">
                            <?php
                            if (has_post_thumbnail()) { ?>
                                <a href="<?php the_permalink(); ?>"
                                   class="adv-thumb-link"><?php the_post_thumbnail($custom_size_img); ?></a>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                }
                echo'</div></div>';
                if($i%6 == 3 || $i%6==5 || $i==$count_post) echo '</div>';
            }
            $i = $i+1;
        } ?>
    </div>
</div>
<?php }