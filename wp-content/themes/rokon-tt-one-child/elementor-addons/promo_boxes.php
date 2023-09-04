<?php
class PPM_PromoBoxes_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'gff-promo-boxes';
	}

	public function get_title() {
		return esc_html__( 'Promo Boxes', 'ppm-quickstart' );
	}

	public function get_icon() {
		return 'fa fa-code';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function register_controls() {

		// Content Tab Start

		$this->start_controls_section(
			'content-section',
			[
				'label' => esc_html__( 'Settings', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Elementor complex addon development start

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Sildenafil' , 'textdomain' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'sub_title',
			[
				'label' => esc_html__( 'Sub title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Erectile Dysfunction' , 'textdomain' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'photo',
			[
				'label' => esc_html__( 'Photo', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'button_text_1',
			[
				'label' => esc_html__( 'Button Text 1', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Start Visit' , 'textdomain' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'button_link_1',
			[
				'label' => esc_html__( 'Button Link 1', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'label_block' => true,
			]
		);
		

		$repeater->add_control(
			'button_text_2',
			[
				'label' => esc_html__( 'Button Text 2', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Learn more' , 'textdomain' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'button_link_2',
			[
				'label' => esc_html__( 'Button Link 2', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'label_block' => true,
			]
		);

		// $repeater->add_control(
		// 	'btn_text_2',
		// 	[
		// 		'label' => esc_html__( 'Button Text 2', 'textdomain' ),
		// 		'type' => \Elementor\Controls_Manager::TEXT,
		// 		'default' => esc_html__( 'Learn more' , 'textdomain' ),
		// 		'label_block' => true,
		// 	]
		// );

		// $repeater->add_control(
		// 	'btn_link_2',
		// 	[
		// 		'label' => esc_html__( 'Button Link 2', 'textdomain' ),
		// 		'type' => \Elementor\Controls_Manager::URL,
		// 		'label_block' => true,
		// 	]
		// );

		$this->add_control(
			'boxes',
			[
				'label' => esc_html__( 'Promos', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ title }}}',
			]
		);

		$this->add_control(
			'carousel',
			[
				'label' => esc_html__( 'Carousel?', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'no',
			]
		);

		// Elementor complex addon development end

		$this->end_controls_section();

		// Content Tab End

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$html = '';

		if($settings['carousel'] == 'yes'){
			$html .= '<script>
					jQuery(document).ready(function($){
						$(".gff-promo-boxes").slick({
							slidesToShow: 5,
							arrows: false,
							dots: true,
							centerMode: true,
						});
					});
			</script>';
		}

		$html .= '<div class="gff-promo-boxes gff-promo-boxes-'.$settings['carousel'].'">';
			foreach($settings['boxes'] as $box){
				$html .= '<div class="gff-single-promo-box-wrapper"><div class="gff-single-promo-box">';
					if(!empty($box['sub_title'])) {
						$html .='<h4>'.$box['sub_title'].'</h4>';
					}
					$html .= '<h3>'.$box['title'].'</h3>

					<div class="promo-box-stars">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
					</div>

					<div class="promo-box-img">
						'.wp_get_attachment_image($box['photo']['id'], 'medium').'
					</div>';
					if(!empty($box['button_text_1'])) {
						$html .='<div><a href="'.$box['button_link_1']['url'].'" class="promo-box-btn">'.$box['button_text_1'].'</a></div>';
					}
					if(!empty($box['button_text_2'])) {
						$html .='<div><a href="'.$box['button_link_2']['url'].'" class="promo-box-btn promo-box-btn-2">'.$box['button_text_2'].'</a></div>';
					}

				$html .= '</div></div>';
			}
		$html .= '</div>';

		echo $html;
		?>

		<?php
	}
}