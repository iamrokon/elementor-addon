<?php
if ( class_exists( 'Elementor\Plugin' ) ) {
    require_once('elementor-addons/addons.php');
}else{
    function elementor_check_admin_notice() {
        $message = 'Please note that Elementor is not installed or active.';
        echo '<div class="notice notice-warning is-dismissible"><p>' . esc_html( $message ) . '</p></div>';
    }
    add_action( 'admin_notices', 'elementor_check_admin_notice' );
}

function rokon_register_post_type() {
    register_post_type('team-member', array(
        'labels' =>  array(
            'name' => 'Team Members',
        ),
        'public' => false,
        'show_ui' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
    ));
}

add_action('init', 'rokon_register_post_type');

function my_test_shortcode(){
    $query = new WP_Query([
        'post_type' => 'team-member',
        'posts_per_page' => -1,
    ]);
    $html = '';
    while($query->have_posts()){
        $query->the_post();
        $html .= '<h2>'.get_the_title().'</h2>';
    }
    wp_reset_query();
    return $html;
}
add_shortcode('my_test','my_test_shortcode');

function enqueue_scripts_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_uri() );
    // wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css');
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), '5.15.3', 'all' );
    //slick-script and style include cdn CSS
    wp_enqueue_style( 'slick-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css', '1.8.1' );
    //slick-script and style include cdn JS
    wp_enqueue_script('slick-js', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array( 'jquery' ), '1.8.1', true);
}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts_styles' );