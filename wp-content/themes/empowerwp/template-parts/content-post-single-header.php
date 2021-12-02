<?php
if ( ! apply_filters( 'mesmerize_show_post_meta', true ) ) {
	return;
}
?>

<div class="row post-meta small">
    <div class="col-sm-10">

        <ul class="is-bar">
            <li><?php esc_html_e( 'by', 'empowerwp' ); ?> <?php the_author_posts_link(); ?></li>
            <li><?php esc_html_e( 'on', 'empowerwp' ); ?> <?php the_time( get_option( 'date_format' ) ); ?></li>
        </ul>

    </div>
    <div class="col-sm-2 text-right">

        <i class="font-icon-post fa fa-comment-o"></i><span><?php echo esc_html( get_comments_number() ); ?></span>


    </div>
</div>
