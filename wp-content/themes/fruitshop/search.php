<?php
/**
 * The template for displaying search results pages.
 *
 * @package 7up-framework
 */

get_header(); ?>

<div class="content-shop mb-page-search">
	<?php do_action('s7upf_before_main_content')?>
	<div id="tp-blog-page" class="tp-blog-page"><!-- blog-page -->
		<div class="row">
			<?php s7upf_output_sidebar('left')?>
			<div class="left-side <?php echo esc_attr(s7upf_get_main_class()); ?>">
				<?php if(have_posts()):?>
					<div class="main-content-blog">
						<div class="content-blog-list">
							<?php while (have_posts()) :the_post();?>
								<?php get_template_part('s7upf_templates/blog-content/content');?>
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
