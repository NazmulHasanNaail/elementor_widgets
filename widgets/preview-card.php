<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class MYEW_Preview_Card_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve oEmbed widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Preview_Card_id';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve oEmbed widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Preview Card', 'plugin-name' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve oEmbed widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fas fa-sd-card';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'myew-for-elementor' ];
	}

	/**
	 * Register oEmbed widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
        //Start Image
		$this->start_controls_section(
			'img_section',
			[
				'label' => __( 'Image', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        //Image
        $this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_control(
			'show_image_link',
			[
				'label' => __( 'Show Image Link', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);       
		$this->add_control(
			'image_link',
			[
				'label' => __( 'Image Link', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
                'condition'=>[
                    'show_image_link'=>'yes',
                ],
			]
		);

		$this->end_controls_section();

        //Start Content
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        //title
        $this->add_control(
			'card_title',
			[
				'label' => __( 'Title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block'=> true,
				'default' => __( 'Default title', 'plugin-domain' ),
				'placeholder' => __( 'Type your title here', 'plugin-domain' ),
			]
		);
        //divider
        $this->add_control(
			'show_divider',
			[
				'label' => __( 'Show Divider', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
                'separator'=>'before'
			]
		);
        //description
        $this->add_control(
			'card_description',
			[
				'label' => __( 'Description', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Default description', 'plugin-domain' ),
				'placeholder' => __( 'Type your description here', 'plugin-domain' ),
                'separator'=>'before'
			]
		);
        $this->end_controls_section();

        //Start Badge
		$this->start_controls_section(
			'badge_section',
			[
				'label' => __( 'Badge', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        //Top Badge
        $this->add_control(
			'show_top_badge',
			[
				'label' => __( 'Show Top Badge', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        //Top Badge Text
        $this->add_control(
			'top_badge_text',
			[
				'label' => __( 'Top Badge Text', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '19.99', 'plugin-domain' ),
				'placeholder' => __( 'Type your text here', 'plugin-domain' ),
                'condition'=> [
                    'show_top_badge'=>'yes',
                ],
                'separator'=>'after'
            ]
		);
        //Middle Badge
        $this->add_control(
            'show_middle_badge',
            [
                'label' => __( 'Show Middle Badge', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'your-plugin' ),
                'label_off' => __( 'Hide', 'your-plugin' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        //Top Badge Text
        $this->add_control(
            'middle_badge_text',
            [
                'label' => __( 'Middle Badge Text', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( '19.99', 'plugin-domain' ),
                'placeholder' => __( 'Type your text here', 'plugin-domain' ),
                'condition'=>[
                    'show_middle_badge'=>'yes',
                ],
                'separator'=>'after'
            ],
        );
        //Bottom Badge
        $this->add_control(
            'show_bottom_badge',
            [
                'label' => __( 'Show Bottom Badge', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'your-plugin' ),
                'label_off' => __( 'Hide', 'your-plugin' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        //Top Badge Text
        $this->add_control(
            'bottom_badge_text',
            [
                'label' => __( 'Bottom Badge Text', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( '19.99', 'plugin-domain' ),
                'placeholder' => __( 'Type your text here', 'plugin-domain' ),
                'condition'=>[
                    'show_bottom_badge'=>'yes',
                ]
            ],
        );
        $this->end_controls_section();

        //Start Button
		$this->start_controls_section(
			'button_section',
			[
				'label' => __( 'Button', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        //Button Link
        $this->add_control(
			'button_link',
			[
				'label' => __( 'Link', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
                'separator'=>'after'
			]
		);
        //Button text
        $this->add_control(
			'button_text',
			[
				'label' => __( 'Button Label', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Buy Now', 'plugin-domain' ),
				'placeholder' => __( 'Type your title here', 'plugin-domain' ),
			]
		);

        $this->end_controls_section();

        /**
         * style
         */
        $this->style_tab();
	}

    /**
     * Style Tab
     */
    private function style_tab(){
        //Img Style Start
        $this->start_controls_section(
			'img_style_section',
			[
				'label' => __( 'Image', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
        //Image Width
        $this->add_responsive_control(
			'img_width',
			[
				'label' => __( 'Width', 'plugin-domain' ),
				'type' =>  \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
                'description'=>'Default 100%',
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .image-card .image' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
        //Image Width
        $this->add_responsive_control(
            'img_height',
            [
                'label' => __( 'Height', 'plugin-domain' ),
                'type' =>  \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px'],
                'description'=>'Default 230px',
                'separator'=>'before',
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 230,
                ],
                'selectors' => [
                    '{{WRAPPER}} .image-card .image' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        //Image Padding
        $this->add_responsive_control(
			'img_padding',
			[
				'label' => __( 'Padding', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
                'separator'=>'before',
                'default' =>[
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 0,
                    'left' => 0,
                ],
				'selectors' => [
					'{{WRAPPER}} .image-card .img-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        //Image Border
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'img_border',
				'label' => __( 'Border', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .image-card .img-wrapper',
                'separator'=>'before',
			]
		);
        //Image Border Radius
        $this->add_responsive_control(
            'img_border_radius',
            [
                'label' => __( 'Border Radius', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'separator'=>'before',
                'default' =>[
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 0,
                    'left' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .image-card .img-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .image-card .img-wrapper .image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        //Image Box Shadow
        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'img_box_shadow',
				'label' => __( 'Box Shadow', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .image-card .img-wrapper .image',
			]
		);

        $this->end_controls_section();

        //Content Style Start
        $this->start_controls_section(
            'Content_style_section',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        //Content Padding
        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __( 'Padding', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'separator'=>'before',
				'description'=>'Default 30px 30px 30px 30px',
                'default' =>[
                    'top' => 30,
                    'right' => 30,
                    'bottom' => 30,
                    'left' => 30,
                ],
                'selectors' => [
                    '{{WRAPPER}} .image-card .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		//Title Heading
		$this->add_control(
			'content_ttile_heading',
			[
				'label' => __( 'Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		//Title Bottom Spacing
		$this->add_control(
			'Content_title_bottom_spacing',
			[
				'label' => __( 'Bottom Spacing', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} .image-card .title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'description'=>'Default 15px',
			]
		);
		//Title Color
		$this->add_control(
			'content_title_color',
			[
				'label' => __( 'Title Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default'=>'#111',
				'selectors' => [
					'{{WRAPPER}} .image-card .title h2' => 'color: {{VALUE}}',
				],
			]
		);
		//Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_title_typography',
				'label' => __( 'Title Typography', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .image-card .title h2',
			]
		);
			//Description Heading
			$this->add_control(
				'content_description_heading',
				[
					'label' => __( 'Description', 'plugin-name' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			//Description Bottom Spacing
			$this->add_responsive_control(
				'description_bottom_spacing',
				[
					'label' => __( 'Bottom Spacing', 'plugin-domain' ),
					'type' =>  \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'description'=>'Default 30px',
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 30,
					],
					'selectors' => [
						'{{WRAPPER}} .image-card .excerpt ' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);
		//Description Color
		$this->add_control(
			'content_description_color',
			[
				'label' => __( 'Description Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default'=>'#707070',
				'selectors' => [
					'{{WRAPPER}} .image-card .excerpt p' => 'color: {{VALUE}}',
				],
			]
		);
		//Description Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_description_typography',
				'label' => __( 'Description Typography', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .image-card .excerpt p',
			]
		);
        $this->end_controls_section();

		//Start Divider 
		$this->start_controls_section(
            'divider_style_section',
            [
                'label' => __( 'Divider', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
		//Divider Width
		$this->add_responsive_control(
			'divider_width',
			[
				'label' => __( 'Width', 'plugin-domain' ),
				'type' =>  \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'description'=>'Default 100px',
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .image-card .divider' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
			//Divider Height
			$this->add_responsive_control(
				'divider_height',
				[
					'label' => __( 'Height', 'plugin-domain' ),
					'type' =>  \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'description'=>'Default 2px',
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 2,
					],
					'selectors' => [
						'{{WRAPPER}} .image-card .divider' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);
			//Divider Color
			$this->add_control(
				'divider_color',
				[
					'label' => __( 'Color', 'plugin-domain' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default'=>'rgba( 0,0,0,0.05 )',
					'description'=>'Default rgba( 0,0,0,0.05 )',
					'selectors' => [
						'{{WRAPPER}} .image-card .divider' => 'background-color: {{VALUE}}',
					],
				]
			);
			//Divider Bottom Spacing
			$this->add_control(
				'divider_bottom_spacing',
				[
					'label' => __( 'Bottom Spacing', 'plugin-domain' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 15,
					],
					'selectors' => [
						'{{WRAPPER}} .image-card .divider' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					],
					'description'=>'Default 15px',
				]
			);
		$this->end_controls_section();
		//Start Badge 
		$this->start_controls_section(
			'badge_style_section',
			[
				'label' => __( 'Badge', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		//Start Top Badge 
		$this->add_control(
			'top_badge_style_section',
			[
				'label' => __( 'Top Badge', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		//Top Badge Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'top_badge_typography',
				'label' => __( 'Typography', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .image-card .image .top-price-badge',
			]
		);
		//Top Badge Background Color
		$this->add_control(
			'top_badge_bg_color',
			[
				'label' => __( 'Background Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default'=>'#562dd4',
				'description'=>'Default #562dd4',
				'selectors' => [
					'{{WRAPPER}} .image-card .image .top-price-badge' => 'background-color: {{VALUE}}',
				],
			]
		);
		//Top Badge Text Color
		$this->add_control(
			'top_badge_text_color',
			[
				'label' => __( 'Text Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default'=>'#fff',
				'description'=>'Default #fff',
				'selectors' => [
					'{{WRAPPER}} .image-card .image .top-price-badge' => 'color: {{VALUE}}',
				],
			]
		);

		//Start Middle Badge 
		$this->add_control(
			'middle_badge_style_section',
			[
				'label' => __( 'Middle Badge', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		//Middle Badge Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'middle_badge_typography',
				'label' => __( 'Typography', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .image-card .image .middle-price-badge',
			]
		);
		//Middle Badge Background Color
		$this->add_control(
			'middle_badge_bg_color',
			[
				'label' => __( 'Background Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default'=>'#562dd4',
				'description'=>'Default #562dd4',
				'selectors' => [
					'{{WRAPPER}} .image-card .image .middle-price-badge' => 'background-color: {{VALUE}}',
				],
			]
		);
		//Middle Badge Text Color
		$this->add_control(
			'middle_badge_text_color',
			[
				'label' => __( 'Text Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default'=>'#fff',
				'description'=>'Default #fff',
				'selectors' => [
					'{{WRAPPER}} .image-card .image .middle-price-badge' => 'color: {{VALUE}}',
				],
			]
		);
		//Start Bottom Badge 
		$this->add_control(
			'bottom_badge_style_section',
			[
				'label' => __( 'Bottom Badge', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		//Bottom Badge Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'bottom_badge_typography',
				'label' => __( 'Typography', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .image-card .readmore .bottom-price-badge',
			]
		);
		//Bottom Badge Background Color
		$this->add_control(
			'bottom_badge_bg_color',
			[
				'label' => __( 'Background Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default'=>'#562dd4',
				'description'=>'Default #562dd4',
				'selectors' => [
					'{{WRAPPER}} .image-card .readmore .bottom-price-badge' => 'background-color: {{VALUE}}',
				],
			]
		);
		//Bottom Badge Text Color
		$this->add_control(
			'bottom_badge_text_color',
			[
				'label' => __( 'Text Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default'=>'#fff',
				'description'=>'Default #fff',
				'selectors' => [
					'{{WRAPPER}} .image-card .readmore .bottom-price-badge' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();
		//Start Button
		$this->start_controls_section(
			'button_style_section',
			[
				'label' => __( 'Button', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
			//Start Tabs
			$this->start_controls_tabs(
				'button_style_tabs'
			);
				//Start Normal State
				$this->start_controls_tab(
					'button_style_normal_tab',
					[
						'label' => __( 'Normal', 'plugin-name' ),
					]
				);
				//Button Normal Background Color
				$this->add_control(
					'button_normal_bg_color',
					[
						'label' => __( 'Background Color', 'plugin-domain' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'default'=>'#562dd4',
						'description'=>'Default #562dd4',
						'selectors' => [
							'{{WRAPPER}} .image-card .readmore a.button-readmore' => 'background-color: {{VALUE}}',
						],
					]
				);
				//Button Normal Text Color
				$this->add_control(
					'button_normal_text_color',
					[
						'label' => __( 'Text Color', 'plugin-domain' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'default'=>'#fff',
						'description'=>'Default #fff',
						'selectors' => [
							'{{WRAPPER}} .image-card .readmore a.button-readmore' => 'color: {{VALUE}}',
						],
					]
				);
				$this->end_controls_tab();
				//Start Hover State
				$this->start_controls_tab(
					'button_style_hover_tab',
					[
						'label' => __( 'Hover', 'plugin-name' ),
					]
				);
				//Button Hover Background Color
				$this->add_control(
					'button_hover_bg_color',
					[
						'label' => __( 'Background Color', 'plugin-domain' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'default'=>'#707070',
						'description'=>'Default #707070',
						'selectors' => [
							'{{WRAPPER}} .image-card .readmore a.button-readmore:hover' => 'background-color: {{VALUE}}',
						],
					]
				);
				//Button Hover Text Color
				$this->add_control(
					'button_hover_text_color',
					[
						'label' => __( 'Text Color', 'plugin-domain' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'default'=>'#fff',
						'description'=>'Default #fff',
						'selectors' => [
							'{{WRAPPER}} .image-card .readmore a.button-readmore:hover' => 'color: {{VALUE}}',
						],
					]
				);
				$this->end_controls_tab();
			$this->end_controls_tabs();

		$this->end_controls_section();

    }

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
        //Img
        $img_target = $settings['image_link']['is_external'] ? ' target="_blank"' : '';
		$imgno_follow = $settings['image_link']['nofollow'] ? ' rel="nofollow"' : '';


        //Button
        $button_target = $settings['button_link']['is_external'] ? ' target="_blank"' : '';
		$button_follow = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : '';

		//Inline Editing
		$this->add_inline_editing_attributes( 'card_title', 'none' );
		$this->add_inline_editing_attributes( 'card_description', 'basic' );


        ?>
<!-- Image Card Starts -->
<div class="image-card">
    <div class="img-wrapper">
        <div class="image" style="background-image: url(<?php  echo esc_url( $settings['image']['url'] ); ?>);">
            <?php if('yes'==$settings['show_image_link']): ?>
            <a href="<?php echo esc_url($settings['image_link']['url']); ?>" <?php echo  $img_target." ".$imgno_follow; ?>></a>
            <?php endif; ?>

            <?php if('yes'==$settings['show_top_badge']):?>
            <span class="top-price-badge badge-blue"><?php echo $settings['top_badge_text'] ; ?></span>
            <?php endif; ?>

            <?php if('yes'==$settings['show_middle_badge']):?>
            <span class="middle-price-badge badge-blue"><?php echo $settings['middle_badge_text'] ; ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="content">
        <div class="title">
            <h2 <?php echo $this->get_render_attribute_string( 'card_title' ); ?> ><?php echo $settings['card_title']; ?>
            </h2>
        </div>
        <?php if('yes'==$settings['show_divider']): ?>
        <div class="divider"></div>
        <?php  endif; ?>
        <div class="excerpt">
            <p <?php echo $this->get_render_attribute_string( 'card_description' ); ?> ><?php echo  $settings['card_description']; ?></p>
        </div>
        <div class="readmore">
            <a href="<?php echo esc_url($settings['button_link']['url']); ?>" class="button button-readmore"
                <?php echo $button_target.' '.$button_follow; ?>><?php echo $settings['button_text']; ?></a>

            <?php if('yes'==$settings['show_bottom_badge']):?>
            <span class="bottom-price-badge badge-blue"><?php echo $settings['bottom_badge_text'] ; ?></span>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- Image Card Ends -->
<?php
	}

	protected function _content_template() {
		?>
		<#
		var image_target = settings.image_link.is_external ? ' target="_blank"' : '';
		var image_nofollow = settings.image_link.nofollow ? ' rel="nofollow"' : '';

		var btn_target = settings.button_link.is_external ? ' target="_blank"' : '';
		var btn_nofollow = settings.button_link.nofollow ? ' rel="nofollow"' : '';

		view.addInlineEditingAttributes( 'card_title', 'none' );
		view.addInlineEditingAttributes( 'card_description', 'basic' );
		#>
		<!-- Image Card Starts -->
		<div class="image-card">
			<div class="image" style="background-image: url( {{ settings.image.url }} );">
				<# if('yes'==settings.show_image_link) { #>
				<a href="{{settings.image_link.url}}" {{image_target}} {{image_nofollow}}></a>
				<# }#>

				<# if('yes'==settings.show_top_badge) { #>
				<span class="top-price-badge badge-blue">{{settings.top_badge_text}}</span>
				<#}#>
				<# if('yes'==settings.show_middle_badge) { #>
				<span class="middle-price-badge badge-blue">{{settings.middle_badge_text}}</span>
				<# } #>
			</div>
			<div class="content">
				<div class="title">
					<h2 {{{ view.getRenderAttributeString( 'card_title' ) }}}>{{{ settings.card_title }}}</h2>
				</div>
				<# if('yes'==settings.show_divider) { #>
				<div class="divider"></div>
				<#}#>
				<div class="excerpt">
					<p {{{ view.getRenderAttributeString( 'card_description' ) }}} >{{{ settings.card_description }}}</p>
				</div>
				<div class="readmore">
					<a href="{{settings.button_link.url}}" {{btn_target}} {{btn_nofollow}} class="button button-readmore">{{settings.button_text}}</a>
					<# if('yes'==settings.show_bottom_badge) { #>
					<span class="bottom-price-badge badge-blue">{{settings.bottom_badge_text}}</span>
					<#}#>
				</div>
			</div>
		</div>
		<!-- Image Card Ends -->
<?php
	}


}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new MYEW_Preview_Card_Widget() );