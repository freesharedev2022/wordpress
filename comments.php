<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password,
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

$twenty_twenty_one_comment_count = get_comments_number();
?>

<div>

	<?php
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php if ( '1' === $twenty_twenty_one_comment_count ) : ?>
				<?php esc_html_e( '1 bình luận', 'twentytwentyone' ); ?>
			<?php else : ?>
				<?php
				printf(
					/* translators: %s: Comment count number. */
					esc_html( _nx( '%s bình luận', '%s bình luận', $twenty_twenty_one_comment_count, 'Comments title', 'twentytwentyone' ) ),
					esc_html( number_format_i18n( $twenty_twenty_one_comment_count ) )
				);
				?>
			<?php endif; ?>
		</h2><!-- .comments-title -->

		<ul class="comment-list">
			<?php
			wp_list_comments(
				array(
					'avatar_size' => 60,
					'style'       => 'ul',
					'short_ping'  => true,
				)
			);
			?>
		</ul><!-- .comment-list -->

		<?php
		the_comments_pagination(
			array(
				'before_page_number' => esc_html__( 'Page', 'twentytwentyone' ) . ' ',
				'mid_size'           => 0,
				'prev_text'          => sprintf(
					'%s <span class="nav-prev-text">%s</span>',
					is_rtl() ? twenty_twenty_one_get_icon_svg( 'ui', 'arrow_right' ) : twenty_twenty_one_get_icon_svg( 'ui', 'arrow_left' ),
					esc_html__( 'Bình luận cũ', 'twentytwentyone' )
				),
				'next_text'          => sprintf(
					'<span class="nav-next-text">%s</span> %s',
					esc_html__( 'Bình luận mới', 'twentytwentyone' ),
					is_rtl() ? twenty_twenty_one_get_icon_svg( 'ui', 'arrow_left' ) : twenty_twenty_one_get_icon_svg( 'ui', 'arrow_right' )
				),
			)
		);
		?>

		<?php if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Bình luận đã đóng.', 'twentytwentyone' ); ?></p>
		<?php endif; ?>
	<?php endif; ?>

	<?php
    $comments_args = array(
        // change the title of send button
        'label_submit'=>'Gửi',
        // change the title of the reply section
        'title_reply'=>'Thêm bình luận',
        // remove "Text or HTML to be displayed after the set of comment fields"
        'comment_form_top' => 'ds',
        'comment_notes_before' => '',
        'comment_notes_after' => '',
        // redefine your own textarea (the comment body)
        'comment_field' => '<div class="form-group"><div class="col-sm-4"><label>Nội dung <span class="red">*</span></label></div><div class="col-sm-8"><textarea id="comment" name="comment" class="form-control" style="height: auto;" rows="4" placeholder="Nội dung" aria-required="true"></textarea></div></div>',
        'fields' => apply_filters( 'comment_form_default_fields', array(
                'author' =>
                    '<div class="form-group">'  .
                    '<div class="col-sm-4"><label>Họ tên <span class="red">*</span></label></div><div class="col-sm-8"><input id="author" class="form-control" placeholder="Họ tên" name="author" type="text" value="' . esc_attr($commenter['comment_author'] ) .
                    '" size="100" /></div></div>',

                'email' =>
                    '<div class="form-group">'.
                    '<div class="col-sm-4"><label>Địa chỉ email <span class="red">*</span></label></div><div class="col-sm-8"><input id="email" class="form-control" placeholder="Địa chỉ email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email'] ) .
                    '" size="100" /></div></div>'
            )
        ),
    );
    comment_form($comments_args);
	?>

</div><!-- #comments -->
