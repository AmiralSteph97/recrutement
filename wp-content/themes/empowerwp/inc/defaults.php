<?php

function empower_theme_defaults($old_defaults = array())
{
    $gradients = (function_exists('mesmerize_get_parsed_gradients')) ? mesmerize_get_parsed_gradients() : array('red_salvation' => array(
        'angle'  => '142',
        'colors' => array(
            0 => array(
                'color'    => 'rgba(244,59,71, 0.8)',
                'position' => '0%',
            ),
            1 => array(
                'color'    => 'rgba(69,58,148, 0.8)',
                'position' => '100%',
            ),
        ),
    ),);

    $defaults = array(

        'header_nav_sticked'       => true,
        'inner_header_nav_sticked' => true,
        'header_nav_boxed'         => true,

        'header_nav_transparent'       => false,
        'inner_header_nav_transparent' => false,
        'inner_header_nav_boxed'       => true,

        'header_nav_border'       => false,
        'inner_header_nav_border' => false,
        'header_nav_style'        => 'active-line-bottom',
        'inner_header_nav_style'  => 'active-line-bottom',


        'header_nav_border_thickness'       => 2,
        'inner_header_nav_border_thickness' => 2,

        'header_nav_border_color'       => "rgba(3, 169, 244, 1)",
        'inner_header_nav_border_color' => "rgba(3, 169, 244, 1)",

        'header_nav_menu_active_highlight_color' => "rgba(3, 169, 244, 1)",


        'header_text_box_text_width' => 85,
        "header_text_box_text_align" => "center",
        "header_content_partial"     => "content-on-center",
        "header_bg_position"         => "center top",

        "header_spacing"        => array(
            "top"    => "16%",
            "bottom" => "12%",
        ),
        "header_spacing_mobile" => array(
            "top"    => "16%",
            "bottom" => "12%",
        ),
        "inner_header_spacing"  => array(
            "top"    => "3%",
            "bottom" => "2%",
        ),

        "enable_top_bar"           => true,
        "top_bar_background_color" => 'rgb(3, 169, 244)',

        "header_top_bar_area-left_information_fields_icon_color" => '#ffffff',

        "header_background_type"       => 'image',
        "inner_header_background_type" => 'image',

        "header_nav_menu_color"        => "#333333",
        "header_nav_menu_active_color" => "#333333",

        "header_front_page_image"       => empower_get_stylesheet_directory_uri() . "/assets/images/hero-image.jpg",
        "inner_header_front_page_image" => empower_get_stylesheet_directory_uri() . "/assets/images/hero-image.jpg",

        "header_overlay_type"       => 'color',
        "inner_header_overlay_type" => 'color',

        'header_overlay_color'       => "#000000",
        'inner_header_overlay_color' => "#000000",

        'header_overlay_opacity'       => 0.6,
        'inner_header_overlay_opacity' => 0.6,

        'header_overlay_shape'       => "none",
        'inner_header_overlay_shape' => "none",

        'header_show_separator'       => false,
        'inner_header_show_separator' => false,

        'header_separator'       => 'mesmerize/1.wave-and-line',
        'inner_header_separator' => 'mesmerize/6.triple-waves-2',

        'header_separator_color'       => '#ffffff',
        'inner_header_separator_color' => '#ffffff',

        'header_separator_height'       => 154,
        'inner_header_separator_height' => 140,

        'header_show_bottom_arrow' => false,

        'full_height_header'       => false,
        'inner_full_height_header' => false,
        'header_overlap'           => true,

        'inner_header_parallax' => true,

        'blog_posts_per_row'            => 2,
        "side_navigation_design_preset" => "preset-2",

        "header_slideshow_duration"       => "3000",
        "inner_header_slideshow_duration" => "3000",

        'footer_nav_border'       => true,
        'footer_inner_nav_border' => false,

        'show_single_item_title'            => false,
        'blog_post_thumb_placeholder_color' => '#03a9f4',

        "header_slideshow"       => array(
            array(
                "url" => apply_filters(
                    'mesmerize_assets_url',
                    get_template_directory_uri(),
                    '/'
                ) . "/assets/images/slideshow_slide1.jpg"
            ),
            array(
                "url" => apply_filters(
                    'mesmerize_assets_url',
                    get_template_directory_uri(),
                    '/'
                ) . "/assets/images/slideshow_slide2.jpg"
            ),
        ),
        "inner_header_slideshow" => array(
            array(
                "url" => apply_filters(
                    'mesmerize_assets_url',
                    get_template_directory_uri(),
                    '/'
                ) . "/assets/images/slideshow_slide1.jpg"
            ),
            array(
                "url" => apply_filters(
                    'mesmerize_assets_url',
                    get_template_directory_uri(),
                    '/'
                ) . "/assets/images/slideshow_slide2.jpg"
            ),
        ),

        'header_overlay_gradient_colors'       => $gradients['red_salvation'],
        'inner_header_overlay_gradient_colors' => $gradients['red_salvation'],
    );


    return $defaults;
}


add_filter('mesmerize_theme_defaults', 'empower_theme_defaults');

// TODO: fix this when the parent theme is updated
$empower_theme_defaults     = empower_theme_defaults();
$empower_current_theme_mods = get_theme_mods();
foreach (array(
        'header_nav_boxed',
        'inner_header_nav_boxed',
        'show_single_item_title',
        'blog_post_thumb_placeholder_color'
    ) as $key) {
    add_filter(
        "theme_mod_{$key}",
        function ($value) use ($key, $empower_theme_defaults, $empower_current_theme_mods) {
            if (isset($empower_theme_defaults[$key]) && !isset($empower_current_theme_mods[$key])) {
                return $empower_theme_defaults[$key];
            }

            return $value;
        }
    );
}
