<?php
function rokon_tt_one_child_widgets( $widgets_manager ) {

	require_once( __DIR__ . '/widgets.php' );
	$widgets_manager->register( new \Rokon_Team_Members() );

	require_once( __DIR__ . '/promo_boxes.php' );
	$widgets_manager->register( new \PPM_PromoBoxes_Widget() );

}
add_action( 'elementor/widgets/register', 'rokon_tt_one_child_widgets' );