<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package 7up-framework
 */

get_header();
$style=s7upf_get_option('s7upf_blog_list_style');
?>
<div class="content-shop mb-page-archive">
    <?php do_action('s7upf_before_main_content')?>
    <div id="tp-blog-page" class="tp-blog-page"><!-- blog-page -->
        <div class="row">
            <?php s7upf_output_sidebar('left')?>
            <div class="left-side <?php echo esc_attr(s7upf_get_main_class()); ?>">
                <?php if(have_posts()):?>
                    <div class="main-content-blog">
                        <div class="content-blog-list">
                            <?php while (have_posts()) :the_post();?>
                                <?php get_template_part('s7upf_templates/blog-content/content',$style);?>
                            <?php endwhile;?>
                            <?php wp_reset_postdata();?>
                        </div>
                        <?php s7upf_paging_nav();?>
                    </div>
                <?php else : ?>
                    <?php get_template_part( 's7upf_templates/content', 'none' ); ?>
                <?php endif;?>

            </div>
            <?php s7upf_output_sidebar('right')?>
        </div>
    </div>
    <?php do_action('s7upf_affter_main_content')?>
</div>
<?php get_footer(); ?>
