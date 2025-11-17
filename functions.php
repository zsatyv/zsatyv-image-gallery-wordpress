<?php
/**
 * Theme functions and definitions
 *
 * @package Vibiter_Theme
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function zsatyv-image-gallery_setup() {
    // Make theme available for translation
    load_theme_textdomain('zsatyv-image-gallery', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1200, 630, true);

    // Register navigation menus
    // No navigation detected in original design

    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Add support for custom background
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
    ));

    // Add support for responsive embeds
    add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', 'zsatyv-image-gallery_setup');

/**
 * Set the content width in pixels
 */
function zsatyv-image-gallery_content_width() {
    $GLOBALS['content_width'] = apply_filters('zsatyv-image-gallery_content_width', 1200);
}
add_action('after_setup_theme', 'zsatyv-image-gallery_content_width', 0);

/**
 * Enqueue scripts and styles
 */
function zsatyv-image-gallery_scripts() {
    // Main stylesheet
    wp_enqueue_style('zsatyv-image-gallery-style', get_stylesheet_uri(), array(), '1.0.0');

    // Comments script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'zsatyv-image-gallery_scripts');

/**
 * Register widget areas
 */
function zsatyv-image-gallery_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'zsatyv-image-gallery'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'zsatyv-image-gallery'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'zsatyv-image-gallery_widgets_init');
?>
