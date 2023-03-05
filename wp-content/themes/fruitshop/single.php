<?php
/**
 * The template for displaying all single posts.
 *
 * @package 7up-framework
 */
?>
<?php get_header();?>
    <div class="content-shop mb-page-single">
         <div class="row">
                <?php s7upf_output_sidebar('left')?>
                <div class="<?php echo esc_attr(s7upf_get_main_class()); ?>">
                    <div class="main-content-single">
                    <?php
                    while ( have_posts() ) : the_post();

                        /*
                        * Include the post format-specific template for the content. If you want to
                        * use this in a child theme, then include a file called called content-___.php
                        * (where ___ is the post format) and that will be used instead.
                        */
                        get_template_part( 's7upf_templates/single-content/content',get_post_format() );

                        if ( comments_open() || get_comments_number() ) { comments_template(); }

                    endwhile; ?>
                    </div>
                </div>
                <?php s7upf_output_sidebar('right')?>
            </div>
    </div>
<?php get_footer();?>