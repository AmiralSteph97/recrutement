<?php
if ( ! apply_filters( 'mesmerize_show_post_meta', true ) ) {
	return;
}

?>
<hr class="blog-separator">
<div class="post-header">
    <i class="font-icon-post fa fa-user"></i>
	<?php the_author_posts_link(); ?>
    <i class="font-icon-post fa fa-calendar"></i>
    <span class="span12"><?php the_time( get_option( 'date_format' ) ); ?></span>

    <i class="font-icon-post fa fa-comment-o"></i>
    <span><?php echo esc_html( get_comments_number() ); ?></span>
</div>
