<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Princing_Table_widget extends \Elementor\Widget_Base {

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
		return 'pricing_table_id';
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
		return __( 'Pricing Table', 'plugin-name' );
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
		return 'fas fa-dollar-sign';
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
		//Start Header Section
		$this->start_controls_section(
			'header_section',
			[
				'label' => __( 'Header', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		//Header Title
		$this->add_control(
			'price_title',
			[
				'label' => __( 'Title', 'plugin-domain' ),
				'label_block'=> true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Default title', 'plugin-domain' ),
				'placeholder' => __( 'Type your title here', 'plugin-domain' ),
			]
		);
		//Header Description
		$this->add_control(
			'price_desc',
			[
				'label' => __( 'Description', 'plugin-domain' ),
				'label_block'=> true,
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Default Description', 'plugin-domain' ),
				'placeholder' => __( 'Type your Description here', 'plugin-domain' ),
			]
		);
		//Show Badge
		$this->add_control(
			'show_badge',
			[
				'label' => __( 'Show Badge', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		//Badge Text
		$this->add_control(
			'badge_text',
			[
				'label' => __( 'Badge Text', 'plugin-domain' ),
				'label_block'=> true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Default text', 'plugin-domain' ),
				'placeholder' => __( 'Type your badge here', 'plugin-domain' ),
			]
		);
		$this->end_controls_section();
		//Start Pricing Section
		$this->start_controls_section(
			'pricing_section',
			[
				'label' => __( 'Pricing', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		//Pricing Price
		$this->add_control(
			'pricing_price',
			[
				'label' => __( 'Price', 'plugin-domain' ),
				'label_block'=> true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '$99', 'plugin-domain' ),
				'placeholder' => __( 'Type your price here', 'plugin-domain' ),
			]
		);
		//Pricing Duration
		$this->add_control(
			'pricing_duration',
			[
				'label' => __( 'Duration', 'plugin-domain' ),
				'label_block'=> true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Year', 'plugin-domain' ),
				'placeholder' => __( 'Type your duration here', 'plugin-domain' ),
			]
		);
		$this->end_controls_section();
		//Start feature Section
		$this->start_controls_section(
			'feature_section',
			[
				'label' => __( 'Feature', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Start Repeater
		$repeater = new \Elementor\Repeater();
		//Feature Text
		$repeater->add_control(
			'feature_text', [
				'label' => __( 'Feature Text', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '' , 'plugin-domain' ),
				'label_block' => true,
			]
		);
		//Feature Icon
		$repeater->add_control(
			'feature_icon',
			[
				'label' => __( 'Feature Icons', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::ICON,
				'include' => [
					'fa fa-check',
					'fa fa-times',
				],
				'default' => 'fa fa-check',
			]
		);
		$this->add_control(
			'feature_list',
			[
				'label' => __( 'Feature List', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'feature_text' => __( 'up to 5 uesrs', 'plugin-domain' ),
						
					],
					[
						'feature_text' => __( 'max 100 items/month', 'plugin-domain' ),
					],
					[
						'feature_text' => __( '500 quries', 'plugin-domain' ),
						
					],
					[
						'feature_text' => __( 'basic statistic', 'plugin-domain' ),
					],
					[
						'feature_text' => __( 'email support', 'plugin-domain' ),
					],
				],
				'title_field' => '{{{ feature_text }}}',
			]
		);



		$this->end_controls_section();
		//Start Button Section
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
				'default' => __( 'Get This Plan', 'plugin-domain' ),
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
		?>
	<div class="pricing-table">
		<div class="pricing-table-header">

			<?php if('yes'==$settings['show_badge']): ?>
			<span class="popular"><?php  echo $settings['badge_text'] ?></span>
			<?php  endif;  ?>

			<h2 class="header-title"><?php  echo $settings['price_title'] ?></h2>
			<p class="header-subtitle"><?php  echo $settings['price_desc'] ?></p>
		</div>
		<div class="pricing-table-price">
			<div class="price"><?php echo $settings['pricing_price']; ?></div>
			<div class="price-divider">/</div>
			<div class="price-duration"><?php echo $settings['pricing_duration']; ?></div>
		</div>
		<div class="pricing-table-feature">
			<?php 
			if($settings['feature_list']):
				foreach($settings['feature_list'] as $item):
			?>
			<div><i class="<?php echo $item['feature_icon']; ?>"></i><?php echo  $item['feature_text']; ?></div>
			<?php
				endforeach; 
			endif; 
			?>
		</div>
		<div class="pricing-table-action">
			<a href="#" class="button button-pricing-action"><?php echo $settings['button_text']; ?></a>
		</div>
	</div>
     <?php
	}

	protected function _content_template() {
	

	}


}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Princing_Table_widget() );