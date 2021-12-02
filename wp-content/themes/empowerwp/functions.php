<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
	exit;
}

add_filter('mesmerize_notifications_template_slug', function () {
	return "empowerwp";
});

add_filter('mesmerize_notifications_stylesheet_slug', function () {
	return "empowerwp";
});

function empower_is_embedded()
{
	return apply_filters('mesmerize_is_child_embedded', false);
}

function empower_has_post_thumbnail()
{
	return (has_post_thumbnail() || get_theme_mod('blog_show_post_thumb_placeholder', true));
}


function empower_text_domain()
{
	$theme      = wp_get_theme();
	$textDomain = $theme->get('TextDomain');

	return $textDomain;
}

function empower_get_stylesheet_directory()
{
	if (empower_is_embedded()) {
		return get_template_directory() . "/child";
	} else {
		return get_stylesheet_directory();
	}
}


function empower_get_stylesheet_directory_uri()
{
	if (empower_is_embedded()) {
		return get_template_directory_uri() . "/child";
	} else {
		return get_stylesheet_directory_uri();
	}
}

function empower_require($path)
{
	$path = trim($path, "\\/");

	if (file_exists(empower_get_stylesheet_directory() . "/{$path}")) {
		require_once empower_get_stylesheet_directory() . "/{$path}";
	}
}

empower_require("inc/defaults.php");

empower_require("customizer/customizer.php");

 


function empower_enqueue_styles()
{

	if (empower_is_embedded()) {
		$text_domain        = empower_text_domain();
		$parent_text_domain = mesmerize_get_text_domain();
		wp_enqueue_style("{$text_domain}-child", empower_get_stylesheet_directory_uri() . '/style.min.css', array("{$parent_text_domain}-style"), mesmerize_get_version());
	} else {
		$parent_style = 'mesmerize-parent';
		wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.min.css', array(), mesmerize_get_version());
	}
}

function empower_kirki_add_inline_style_handle($handle)
{

	if (empower_is_embedded()) {
		$text_domain = empower_text_domain();
		$handle      = "{$text_domain}-child";
	}

	return $handle;
}


function empower_print_sticky_class($class = array())
{

	$class = (array) $class;
	if (is_sticky()) {
		$class[] = 'sticky';
	}
	echo esc_attr(implode(" ", $class));
}


add_filter('mesmerize_archive_entry_class', function ($class) {
	if (is_sticky()) {
		$class[] = 'sticky';
	}

	return $class;
});

function empower_default_values_filter($args)
{

	$default_values = empower_theme_defaults();

	if (array_key_exists($args['settings'], $default_values) && array_key_exists('default', $args)) {
		if ($args['default'] != $default_values[$args['settings']]) {
			$args['default'] = $default_values[$args['settings']];
		}
	}

	return $args;
}

function empower_replace_theme_tag($content)
{

	return str_replace('[tag_child_theme_uri]', empower_get_stylesheet_directory_uri(), $content);
}

function empower_theme_page_name()
{
	return __('EmpowerWP Info', 'empowerwp');
}


function empower_demos_page_name()
{
	return __('EmpowerWP Demos', 'empowerwp');
}


function empower_demos_available_in_pro()
{
	return __('EmpowerWP PRO', 'empowerwp');
}

function empower_thankyou_message()
{
	return __('Thank you for choosing EmpowerWP!', 'empowerwp');
}

function empower_companion_description()
{
	return esc_html__('Mesmerize Companion plugin adds drag and drop functionality and many other features to the EmpowerWP theme.', 'empowerwp');
}


function empower_info_page_tabs($tabs)
{
	//Notice: This filter will be removed when the child imports will be created
	if (array_key_exists('demo-imports', $tabs)) {
		unset($tabs['demo-imports']);
	}

	return $tabs;
}

function empower_get_footer_copyright($copyright, $preview_atts)
{

	$preview_atts = "";
	if (mesmerize_is_customize_preview()) {
		$preview_atts = 'data-footer-copyright="true" data-focus-control="footer_content_copyright_text"';
	}

	$defaultText   = __('&copy; {year} {blogname}. Built using WordPress and <a rel="nofollow" href="#">EmpowerWP Theme</a>.', 'empowerwp');
	$defaultText   = apply_filters('mesmerize_footer_content_copyright_text_default', $defaultText);
	$copyrightText = get_theme_mod('footer_content_copyright_text', $defaultText);

	$copyrightText = str_replace("{year}", date_i18n(__('Y', 'empowerwp')), $copyrightText);
	$copyrightText = str_replace("{blogname}", esc_html(get_bloginfo('name')), $copyrightText);

	$allowed_html = array(
		'a'      => array(
			'href'  => array(),
			'title' => array(),
		),
		'em'     => array(),
		'strong' => array(),
	);

	return '<p class="copyright" data-type="group" ' . $preview_atts . '>' . wp_kses_post($copyrightText) . '</p>';
}

function empower_remove_mesmerize_demos_menu_item()
{
	//Notice: This filter will be removed when the child imports will be created
	remove_submenu_page('themes.php', 'mesmerize-demos');
}

function empower_remove_demo_import_popup($popups)
{
	//Notice: This filter will be removed when the child imports will be created
	foreach ($popups as $index => $popup) {
		if (array_key_exists('id', $popup) && $popup['id'] === "demo_import") {
			unset($popups[$index]);
		}
	}

	return $popups;
}

function empower_archive_post_highlight($value)
{
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	if ($paged == 1) {
		return $value;
	} else {
		return false;
	}
}

add_filter('mesmerize_kirki_field_filter', 'empower_default_values_filter', 10, 1);
add_filter('mesmerize_kirki_add_inline_style_handle', 'empower_kirki_add_inline_style_handle');
add_filter('mesmerize_archive_post_highlight', 'empower_archive_post_highlight', 20);

add_filter('mesmerize_already_colored_sections', function ($args) {
	return array_merge($args, array('overlappable-7-mc'));
}, 10, 1);


add_action('after_setup_theme', function () {

	add_action('wp_enqueue_scripts', 'empower_enqueue_styles', 100);

	add_filter('mesmerize_stylesheet_has_min', "__return_true");

	add_filter('mesmerize_stylesheet_deps', function ($args) {

		if (!empower_is_embedded()) {
			$args[] = 'mesmerize-parent';
		}

		return $args;
	});
	empower_require("inc/admin.php");
	empower_require("inc/blog-options.php");

	add_action('cloudpress\template\load_assets', function ($companion) {

		/**@var \Mesmerize\Companion $companion */
		if ($companion->isMaintainable()) {
			$ver = $companion->version;
			wp_enqueue_style('empower-companion-page-css', empower_get_stylesheet_directory_uri() . "/customizer/sections/content.css", array(), $ver);
		}
	});

	add_filter('mesmerize_theme_page_name', 'empower_theme_page_name');
	add_filter('mesmerize_demos_page_name', 'empower_demos_page_name');
	add_filter('mesmerize_thankyou_message', 'empower_thankyou_message');
	add_filter('mesmerize_companion_description', 'empower_companion_description');
	add_filter('mesmerize_demos_available_in_pro', 'empower_demos_available_in_pro');
	add_filter('mesmerize_theme_logo_url', '__return_false');


	add_filter('mesmerize_get_footer_copyright', 'empower_get_footer_copyright', 10, 2);

	add_filter('mesmerize_info_page_tabs', 'empower_info_page_tabs');
	add_action('admin_menu', 'empower_remove_mesmerize_demos_menu_item', 20);
	add_filter('cloudpress\customizer\feature_popups', 'empower_remove_demo_import_popup');
});
