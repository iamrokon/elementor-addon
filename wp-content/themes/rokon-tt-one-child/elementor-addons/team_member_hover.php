<?php
class Rokon_Hover_Team_Members extends \Elementor\Widget_Base {

	public function get_name() {
		return 'rokon_hover_team_members';
	}

	public function get_title() {
		return esc_html__( 'Hover Team Members', 'elementor-addon' );
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
			'icon_list',
			[
				'label' => esc_html__( 'Icon List', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'icon',
						'label' => esc_html__( 'Icon', 'elementor-addon' ),
						'type' => \Elementor\Controls_Manager::ICONS,
					],
					[
						'name' => 'text',
						'label' => esc_html__( 'Text', 'elementor-addon' ),
						'type' => \Elementor\Controls_Manager::TEXT,
					],
					[
						'name' => 'link',
						'label' => esc_html__( 'Link', 'elementor-addon' ),
						'type' => \Elementor\Controls_Manager::URL,
						'placeholder' => 'https://example.com',
					],
				],
				// 'default' => [
				// 	[
				// 		'icon' => 'fa fa-facebook', // Default icon class
				// 		'link' => [ 'url' => 'https://facebook.com' ], // Default link
				// 	],
				// ],
			]
		);
		

		$this->add_control(
			'desc',
			[
				'label' => esc_html__( 'Description', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		$this->end_controls_section();

		// Content Tab End

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<!-- <div class="team-members"> -->
                <div class="single-team-member">
                    <div class="single-team-member-inner">
                        <div class="team-member-front">
                            <div class="team-member-image">
                                <img src="<?php echo wp_get_attachment_image_url($settings['photo']['id'])?>" alt="">
                            </div>
                            <div class="team-member-info">
                                <h3><?php echo $settings['title']; ?></h3>
                                <p><?php echo $settings['designation']; ?></p>
                            </div>
                        </div>
                        <div class="team-member-hover">
                            <div class="team-member-info">
                                <h3><?php echo $settings['title']; ?></h3>
                                <p><?php echo $settings['designation']; ?></p>
                            </div>
                            <div class="team-member-meta">
								<?php foreach($settings['icon_list'] as $item): ?>
                                <p>
                                    <span>
										<?php \Elementor\ICONS_MANAGER::render_icon($item['icon']);?>
                                        <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                        </svg> -->
                                    </span>
                                    <?php echo $item['text'];?>
                                </p>
								<?php endforeach;?>
                                <!-- <p>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                        </svg>
                                    </span>
                                    4 Years In Service
                                </p> -->
                            </div>
                            <div class="team-member-details">
                                <p><?php echo wpautop($settings['desc']); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            <!-- </div> -->

		<?php
	}
}