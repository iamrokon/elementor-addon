<?php
class Rokon_Team_Members extends \Elementor\Widget_Base {

	public function get_name() {
		return 'rokon_team_members';
	}

	public function get_title() {
		return esc_html__( 'Team Members', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	protected function register_controls() {

		// Content Tab Start

		$this->start_controls_section(
			'content',
			[
				'label' => esc_html__( 'Content', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Rokon', 'elementor-addon' ),
			]
		);

		$this->add_control(
			'designation',
			[
				'label' => esc_html__( 'Designation', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Web developer', 'elementor-addon' ),
			]
		);

		$this->add_control(
			'photo',
			[
				'label' => esc_html__( 'Photo', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'social_links',
			[
				'label' => esc_html__( 'Social Link', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'icon',
						'label' => esc_html__( 'Icon', 'elementor-addon' ),
						'type' => \Elementor\Controls_Manager::ICONS,
					],
					[
						'name' => 'link',
						'label' => esc_html__( 'Link', 'elementor-addon' ),
						'type' => \Elementor\Controls_Manager::URL,
						'placeholder' => 'https://example.com',
					],
				],
				'default' => [
					[
						'icon' => 'fa fa-facebook', // Default icon class
						'link' => [ 'url' => 'https://facebook.com' ], // Default link
					],
				],
			]
		);
		

		$this->add_control(
			'style',
			[
				'label' => esc_html__( 'Style', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1' => esc_html__( 'Style 1', 'elementor-addon' ),
					'style2' => esc_html__( 'Style 2', 'elementor-addon' ),
				],
			]
		);

		$this->end_controls_section();

		// Content Tab End

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="rasel-team-member">
			<?php if(array_key_exists('photo',$settings) && !empty($settings['photo'])){?>
			<div class="rasel-team-member-photo">
				<?php echo wp_get_attachment_image( $settings['photo']['id'], 'large'); ?>
			</div>
			<?php } ?>
			<div class="rasel-team-member-info">
				<h3><?php echo $settings['title']; ?></h3>
				<?php if(array_key_exists('designation',$settings) && !empty($settings['designation'])){?>
				<p> <?php echo $settings['designation']; ?> </p>
				<?php } ?>

				<div class="social-links">
					<?php 
					foreach($settings['social_links'] as $link): 
						$is_external = $link['link']['is_external'] == 'on' ? '_blank' : '';
					?>
					<a href="<?php echo $link['link']['url'];?>" target="<?php echo $is_external;?>">
					<i class="<?php echo $link['icon']['value'];?>"></i>
					</a>
					<?php endforeach;?>
				</div>

			</div>
		</div>

		<?php
	}
}