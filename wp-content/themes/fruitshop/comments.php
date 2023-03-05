<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package stframework
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

if ( post_password_required() ) {
    return;
}
?>
<div id="comment" class="mb-comment single-comment">
        <?php if ( have_comments() ) : ?>
            <h2 class="title30 font-bold">
                <?php
                printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'fruitshop' ),
                    number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
                ?>
            </h2>

            <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
                <nav id="comment-nav-above" class="comment-navigation" >
                    <h2 class="title30 font-bold"><?php esc_html_e( 'Comment navigation', 'fruitshop' ); ?></h2>
                    <div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'fruitshop' ) ); ?></div>
                    <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'fruitshop' ) ); ?></div>
                </nav><!-- #comment-nav-above -->
            <?php endif; // check for comment navigation ?>
            <?php
            wp_list_comments( array(
                'walker' => new s7upf_Comment_Walker,
                'callback' => null,
                'end-callback' => null,
                'type' => 'all',
                'page' => null,
                'avatar_size' => 71
            ) );
            ?>
            <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
                <nav id="comment-nav-below" class="comment-navigation" >
                    <h2 class="title30 font-bold"><?php esc_html_e( 'Comment navigation', 'fruitshop' ); ?></h2>
                    <div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'fruitshop' ) ); ?></div>
                    <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'fruitshop' ) ); ?></div>
                </nav><!-- #comment-nav-below -->
            <?php endif; // check for comment navigation ?>

        <?php endif; ?>

        <?php
        // If comments are closed and there are comments, let's leave a little note, shall we?
        if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
            ?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'fruitshop' ); ?></p>
        <?php endif; ?>

        <?php
        $commenter = wp_get_current_commenter();
        $comment_form = array(
            'title_reply'          => have_comments() ? esc_html__( 'LEAVE A COMMENT', 'fruitshop' ) : esc_html__( 'Be the first to comment', 'fruitshop' ) . ' &ldquo;' . get_the_title() . '&rdquo;',
            'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'fruitshop' ),

            'fields'               => array(
                'author' => '<div class="col-md-6 col-sm-6 col-xs-12"><label>'.esc_html__('Display Name *','fruitshop').'</label><input id="author"  name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true"  class="mb-text border" />',
                'email'  => '<label>'.esc_html__('Email Address * ','fruitshop').'</label><span class="silver">'.esc_html__('(will not be shared)','fruitshop').'</span><input  class="mb-text border" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" /></div>',

            ),
            'label_submit'  => esc_html__( 'Submit Comment', 'fruitshop' ),
            'logged_in_as'  => '',
            'comment_field' => '<div class="col-md-6 col-sm-6 col-xs-12"><label>'.esc_html__('Comment *','fruitshop').'</label><textarea id="comment-textarea" name="comment" class="mb-textarea border" cols="40" rows="5"></textarea></div>',
            'comment_notes_before' => '',
            'comment_notes_after' => '',
            'class_form' => 'mb-comment-form single-comment-form',
            'class_submit' => 'btn-arrow color text-uppercase'
        );
        ?>
        <div class="row">
        <?php comment_form( apply_filters( 'comment_form_default_fields', $comment_form ) ); ?>
        </div>
</div><!-- #comments -->