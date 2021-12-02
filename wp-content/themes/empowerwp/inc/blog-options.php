<?php

function empower_add_style_controls() {
	$priority = 2;
	$section  = 'blog_settings';

	mesmerize_add_kirki_field( array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show author bio in sidebar', 'empowerwp' ),
		'section'  => $section,
		'priority' => $priority,
		'settings' => "blog_sidebar_author_bio",
		'default'  => true,
	) );
}

empower_add_style_controls();

function empower_blog_sidebar_author_bio_filter( $value ) {

	$value = get_theme_mod( 'blog_sidebar_author_bio', $value );

	return $value;
}

add_filter( 'empower_blog_sidebar_author_bio', 'empower_blog_sidebar_author_bio_filter' );

