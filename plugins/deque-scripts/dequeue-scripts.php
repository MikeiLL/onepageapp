<?php
/*
   Plugin Name: Remove Avada Scripts we aren't using
   Plugin URI: http://wordpress.org/extend/plugins/americare-simple-post-types/
   Version: 0.1
   Author: LexWebDev
   Description: Create and display the basic post types for total-child-americare. using parent theme Total.
   Text Domain: dequeue-scripts
   License: GPLv3
  */


$scripts_we_do_not_want_for_ny_dems = array(
    'revmin',
    'fusion-ie9',
    'comment-reply',
    'jquery-fitvids',
    'fusion-video-general',
    'jquery-lightbox',
    'jquery-mousewheel',
    'fusion-lightbox',
    'avada-portfolio',
    'isotope',
    // 'jquery-infinite-scroll',
    'avada-faqs',
    'cssua',
    'jquery-waypoints',
    'modernizr',
    'fusion-waypoints',
    'fusion-animations',
    'jquery-count-to',
    'jquery-appear',
    'fusion-counters-box',
    'bootstrap-collapse',
    //'fusion-equal-heights',
    'fusion-toggles',
    'fusion-events',
    'fusion-column-bg-image',
    'fusion-column',
    'bootstrap-transition',
    'bootstrap-tab',
    'fusion-tabs',
    'jquery-easy-pie-chart',
    'fusion-counters-circle',
    //'jquery-count-down',
    //'fusion-count-down',
    'jquery-cycle',
    'fusion-testimonials',
    'fusion-title',
    'fusion-content-boxes',
    //'jquery-fade',
    'jquery-request-animation-frame',
    'fusion-parallax',
    'fusion-video-bg',
    'fusion-container',
    'fusion-flip-boxes',
    'jquery-fusion-maps',
    'fusion-google-map',
    'bootstrap-modal',
    'fusion-modal',
    'fusion-progress',
    'froogaloop',
    //'fusion-video',
    //'bootstrap-tooltip',
    //'bootstrap-popover',
    'jquery-caroufredsel',
    //'jquery-easing',
    'jquery-flexslider',
    'jquery-hover-flow',
    'jquery-hover-intent',
    'jquery-placeholder',
    'jquery-touch-swipe',
    'fusion-alert',
    'fusion-carousel',
    //'fusion-flexslider',
    //'fusion-popover',
    //'fusion-tooltip',
    //'fusion-sharing-box',
    'fusion-blog',
    //'fusion-button',
    //'fusion-general-global',
    //'fusion-ie1011',
    //'fusion-scroll-to-anchor',
    'fusion-responsive-typography',
    'bootstrap-scrollspy',
    'avada-comments',
    'avada-general-footer',
    'avada-quantity',
    // 'avada-header',
    'avada-scrollspy',
    'avada-select',
    'avada-sidebars',
    'avada-tabs-widget',
    //'avada-menu',
    //'jquery-to-top',
    //'avada-to-top',
    'avada-drop-down',
    'avada-rev-styles',
    'avada-parallax-footer',
    //'avada-contact-form-7',
    'jquery-elastic-slider',
    'avada-elastic-slider',
    'avada-fusion-slider'
);
/**
 * Dequeue the Avada script.
 *
 * Hooked to the wp_print_scripts action, with a late priority (100),
 * so that it is after the script was enqueued.
 */
function wpdems_avada_dequeue_scripts() {
    foreach($scripts_we_do_not_want_for_ny_dems as $handle){
        wp_dequeue_script( $handle );
    }
}
add_action( 'wp_print_scripts', 'wpdems_avada_dequeue_scripts', 100 );

?>
