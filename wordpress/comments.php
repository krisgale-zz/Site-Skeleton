<div id="comments">
<?php if ( post_password_required() ) : ?>
    <p>This post is password protected. Enter the password to view any comments</p>
</div><!--/#comments -->
<?php
        /* Stop the rest of comments.php from being processed,
         * but don't kill the script entirely -- we still have
         * to fully load the template.
         */
        return;
    endif;
?>

<?php if ( have_comments() ) : ?>
    <h2><?php comments_number('No Comments', '1 Comment', '% Comments' );?></h2>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
    <nav class="clearfix">
        <h3>Comment navigation</h3>
        <p class="right"><?php next_comments_link( 'Newer Comments &rarr;' ); ?></p>
        <p class="left"><?php previous_comments_link('&larr; Older Comments' ); ?></p>
    </nav>
    <?php endif; // check for comment navigation ?>

    <ol>
        <?php wp_list_comments( array( 'callback' => 'ps_comment' ) ); ?>
    </ol>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
    <nav class="clearfix">
        <h3>Comment navigation</h3>
        <p class="right"><?php next_comments_link( 'Newer Comments &rarr;' ); ?></p>
        <p class="left"><?php previous_comments_link('&larr; Older Comments' ); ?></p>
    </nav>
    <?php endif; // check for comment navigation ?>

<?php
    elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
?>
    <p>Comments are closed</p>
<?php endif; ?>

<?php
$fields = array(
    'author' => '<label for="author">Name' .
                ( $req ? '<span class="required">*</span>' : '' ) .
                '</label><input id="author" name="author" type="text" value="' .
                esc_attr( $commenter['comment_author'] ) . '" tabindex="1"' . $aria_req . ' />',
    'email'  => '<label for="email">Email' .
                ( $req ? '<span class="required">*</span>' : '' ) .
                '</label><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" tabindex="2"' . $aria_req . ' />',
    'url'    => '<label for="url">Website</label>' .
                '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" tabindex="3" />'
);
$defaults = array( 
	'fields' => apply_filters( 'comment_form_default_fields', $fields ),
    'comment_field' => '<label for="comment">Comment</label>' .
                '<textarea id="comment" name="comment" tabindex="4" aria-required="true"></textarea>',
    'comment_notes_after' => '',
    'id_form' => 'commentform',
    'id_submit' => 'submit',
    'title_reply' => __( 'Leave a Comment' ),
    'title_reply_to' => __( 'Leave a Comment to %s' ),
    'cancel_reply_link' => __( 'Cancel reply' ),
    'label_submit' => __( 'Post Comment' ),
); 
comment_form( $defaults );
?>

</div><!--/#comments -->