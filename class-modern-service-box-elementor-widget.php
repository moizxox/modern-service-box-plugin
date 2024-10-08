<?php

class Modern_Service_Box_Elementor_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'modern_service_box';
    }

    public function get_title() {
        return __( 'Modern Service Box', 'modern-service-box' );
    }

    public function get_icon() {
        return 'eicon-box';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    protected function _register_controls() {

        // Content Tab
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'modern-service-box' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'heading_text',
            [
                'label' => __( 'Heading', 'modern-service-box' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Web Development', 'modern-service-box' ),
            ]
        );

        $this->add_control(
            'description_text',
            [
                'label' => __( 'Description', 'modern-service-box' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Achieve your business objectives with our professional web development services.', 'modern-service-box' ),
            ]
        );

        $this->add_control(
            'simple_image',
            [
                'label' => __( 'Simple Image', 'modern-service-box' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'animated_image',
            [
                'label' => __( 'Animated Image (GIF)', 'modern-service-box' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        // Style Tab for Heading
        $this->start_controls_section(
            'heading_style',
            [
                'label' => __( 'Heading', 'modern-service-box' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Color Type: Simple or Gradient
        $this->add_control(
            'heading_color_type',
            [
                'label' => __( 'Heading Color Type', 'modern-service-box' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'gradient',
                'options' => [
                    'simple' => __( 'Simple Color', 'modern-service-box' ),
                    'gradient' => __( 'Gradient', 'modern-service-box' ),
                ],
            ]
        );

        // Simple Color Option
        $this->add_control(
            'heading_simple_color',
            [
                'label' => __( 'Simple Color', 'modern-service-box' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'heading_color_type' => 'simple',
                ],
                'selectors' => [
                    '{{WRAPPER}} .serv-box-content .heading-simple' => 'color: {{VALUE}}',
                ],
            ]
        );

        // Custom Gradient CSS
        $this->add_control(
            'heading_gradient_css',
            [
                'label' => __( 'Custom Gradient CSS', 'modern-service-box' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'linear-gradient(180deg, #32f9e2 19.03%, #00cbbc 56.35%)',
                'condition' => [
                    'heading_color_type' => 'gradient',
                ],
                'placeholder' => 'Enter your gradient CSS here',
            ]
        );

        // Typography Option
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'heading_typography',
                'label' => __( 'Typography', 'modern-service-box' ),
                'selector' => '{{WRAPPER}} .serv-box-content h3',
            ]
        );

        $this->end_controls_section();

        // Style Tab for Text
        $this->start_controls_section(
            'text_style',
            [
                'label' => __( 'Text', 'modern-service-box' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => __( 'Color', 'modern-service-box' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .serv-box-content p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'text_typography',
                'label' => __( 'Typography', 'modern-service-box' ),
                'selector' => '{{WRAPPER}} .serv-box-content p',
            ]
        );

        $this->end_controls_section();

        // Style Tab for Service Box
        $this->start_controls_section(
            'box_style',
            [
                'label' => __( 'Service Box', 'modern-service-box' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'box_background_color',
            [
                'label' => __( 'Background Color', 'modern-service-box' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .serv-main-box' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'box_border_color',
            [
                'label' => __( 'Border Color', 'modern-service-box' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .serv-main-box' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'box_border_radius',
            [
                'label' => __( 'Border Radius', 'modern-service-box' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .serv-main-box' => 'border-radius: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'box_border_width',
            [
                'label' => __( 'Border Width', 'modern-service-box' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'selectors' => [
                    '{{WRAPPER}} .serv-main-box' => 'border-width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'box_before_color',
            [
                'label' => __( 'Before Background Color', 'modern-service-box' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .serv-main-box::before' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'box_after_color',
            [
                'label' => __( 'After Background Color', 'modern-service-box' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .serv-main-box::after' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>

        <div class="serv-main-box">
            <div class="serv-box-wrappeer">
                <div class="img-serv-wrapper">
                    <img src="<?php echo esc_url($settings['animated_image']['url']); ?>" alt="" class="anim-img">
                    <img src="<?php echo esc_url($settings['simple_image']['url']); ?>" alt="" class="simple-img">
                </div>
                <div class="serv-box-content">
                    <h3 class="<?php echo $settings['heading_color_type'] === 'gradient' ? 'heading-gradient' : 'heading-simple'; ?>" 
                        style="<?php echo $settings['heading_color_type'] === 'gradient' ? '-webkit-background-clip: text; background: '.$settings['heading_gradient_css'].'; -webkit-text-fill-color: transparent;' : ''; ?>">
                        <?php echo esc_html($settings['heading_text']); ?>
                    </h3>
                    <p><?php echo esc_html($settings['description_text']); ?></p>
                </div>
            </div>
        </div>

        <style>
            .heading-gradient {
                background-clip: text;
                color: transparent; /* Ensure color is transparent for gradient */
            }
            .heading-simple {
                /* Simple color will be applied via Elementor controls */
            }
        </style>

        <?php
    }
}

// Register the widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Modern_Service_Box_Elementor_Widget() );
