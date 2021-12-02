<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>">
<div class="post-content-single">
    <div class="meta"><?php the_category( ', ' ); ?></div>
    <h1><?php mesmerize_single_item_title(); ?></h1>

    <div class="post-content-inner">
		<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'post-thumbnail',
				array( "class" => "space-bottom-small space-bottom-xs" ) );
		}

		the_content();

		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'empowerwp' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'empowerwp' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );
		?>
    </div>

	<?php the_tags( '<p class="tags-list">', ' ', '</p>' ); ?>
	<?php get_template_part( 'template-parts/content-post-single-header' ) ?>
</div>


<?php
the_post_navigation( array(
	'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next:', 'empowerwp' ) . '</span> ' .
	               '<span class="screen-reader-text">' . esc_html__( 'Next post:', 'empowerwp' ) . '</span> ' .
	               '<span class="post-title">%title</span><i class="font-icon-post fa fa-angle-double-right"></i>',
	'prev_text' => '<i class="font-icon-post fa fa-angle-double-left"></i>' .
	               '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous:', 'empowerwp' ) . '</span> ' .
	               '<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'empowerwp' ) . '</span> ' .
	               '<span class="post-title">%title</span>',
) );
?>


<?php
if ( comments_open() || get_comments_number() ):
	comments_template();
endif;
?>
</div>
