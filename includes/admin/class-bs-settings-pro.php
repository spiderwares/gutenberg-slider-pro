<?php
/**
 * Block Slider Pro Settings Class
*/

//Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'BS_Settings_Pro' ) ) :

    /**
     * Class BS_Settings_Pro
     */
    class BS_Settings_Pro {

        /**
         * Constructor for the class.
         */
        public function __construct() {
            $this->events_handler();
        }

        /**
         * Initialize hooks and filters.
         */
        public function events_handler() {
            add_filter( 'bs_transition_fields', [ $this, 'transition_pro_fields' ] );
            add_filter( 'bs_navigation_fields', [ $this, 'navigation_pro_fields' ] );
            add_filter( 'bs_pagination_fields', [ $this, 'pagination_pro_fields' ] );
            add_filter( 'bs_responsive_fields', [ $this, 'responsive_pro_fields' ] );
            add_filter( 'bs_thumbnail_gallery_fields', [ $this, 'thumbnail_gallery_pro_fields' ] );
            add_filter( 'bs_scrollbar_fields', [ $this, 'scrollbar_pro_fields' ] );
            add_filter( 'bs_other_options_fields', [ $this, 'other_options_pro_fields' ] );
        }

        /**
         * Transition pro fields.
         */
        public function transition_pro_fields( $fields ) {

            unset( $fields['animation']['disabled_options'] );

            $fields['animation']['options'] = array(
                'slide'       => 'animation-slide.gif',
                'fade'        => 'animation-fade.gif',
                'flip'        => 'animation-flip.gif',
                'cube'        => 'animation-cube.gif',
                'cards'       => 'animation-cards.gif',
                'coverflow'   => 'animation-coverflow.gif',
                'shadow push' => 'animation-creative1.gif',
                'zoom split'  => 'animation-creative2.gif',
                'slide flow'  => 'animation-creative3.gif',
                'flip deck'   => 'animation-creative4.gif',
                'twist flow'  => 'animation-creative5.gif',
                'mirror'      => 'animation-creative6.gif',
            );

            $fields['coverflow_rotate'] = array(
                'title'       => esc_html__('Rotate', 'block-slider-pro'),
                'field_type'  => 'bsnumber',
                'default'     => 50,
                'extra_class' => 'bs_coverflow_options',
                'desc'        => esc_html__('Rotation angle for coverflow.', 'block-slider-pro'),
            );

            $fields['coverflow_stretch'] = array(
                'title'       => esc_html__('Stretch', 'block-slider-pro'),
                'field_type'  => 'bsnumber',
                'default'     => 0,
                'extra_class' => 'bs_coverflow_options',
                'desc'        => esc_html__('Space between slides.', 'block-slider-pro'),
            );

            $fields['coverflow_depth'] = array(
                'title'       => esc_html__('Depth', 'block-slider-pro'),
                'field_type'  => 'bsnumber',
                'default'     => 100,
                'extra_class' => 'bs_coverflow_options',
                'desc'        => esc_html__('Depth offset.', 'block-slider-pro'),
            );

            $fields['coverflow_modifier'] = array(
                'title'       => esc_html__('Modifier', 'block-slider-pro'),
                'field_type'  => 'bsnumber',
                'default'     => 1,
                'extra_class' => 'bs_coverflow_options',
                'desc'        => esc_html__('Effect multiplier.', 'block-slider-pro'),
            );

            $fields['coverflow_shadows'] = array(
                'title'       => esc_html__('Slide Shadows', 'block-slider-pro'),
                'field_type'  => 'bsswitch',
                'default'     => true,
                'extra_class' => 'bs_coverflow_options',
                'desc'        => esc_html__('Enable slide shadows.', 'block-slider-pro'),
            );

            return $fields;
        }

        /**
         * Navigation pro fields.
         */
        public function navigation_pro_fields( $fields ) {

            unset( $fields['navigation_arrow_style']['disabled_options'] );

            $fields['navigation_arrow_style']['options'] = array(
                'none'    => 'arrow-style-none.jpg',
                'style1'  => 'arrow-style-1.jpg',
                'style2'  => 'arrow-style-2.jpg',
                'style3'  => 'arrow-style-3.jpg',
                'style4'  => 'arrow-style-4.png',
                'style5'  => 'arrow-style-5.jpg',
                'custom'  => 'arrow-custom.jpg',
            );

            $fields['arrow_position_unit'] = array(
                'title'        => esc_html__( 'Arrow Position Unit', 'block-slider-pro' ),
                'field_type'  => 'bsselect',
                'options'     => array(
                    'px'  => 'px',
                    '%'   => '%',
                    'em'  => 'em',
                    'rem' => 'rem',
                ),
                'default'     => 'px',
                'extra_class' => 'bs_arrow_position',
            );

            $fields['arrow_position_top'] = array(
                'title'       => esc_html__( 'Arrow Top Position', 'block-slider-pro' ),
                'field_type'  => 'bsnumber',
                'default'     => 220,
                'desc'        => esc_html__( 'Distance from the top. Leave bottom blank if this is set.', 'block-slider-pro' ),
                'extra_class' => 'bs_arrow_position',
            );

            $fields['arrow_position_bottom'] = array(
                'title'       => esc_html__( 'Arrow Bottom Position', 'block-slider-pro' ),
                'field_type'  => 'bsnumber',
                'default'     => '',
                'desc'        => esc_html__( 'Distance from the bottom. Leave top blank if this is set.', 'block-slider-pro' ),
                'extra_class' => 'bs_arrow_position',
            );
        
            $fields['arrow_position_left'] = array(
                'title'       => esc_html__( 'Arrow Left Position', 'block-slider-pro' ),
                'field_type'  => 'bsnumber',
                'default'     => 10,
                'desc'        => esc_html__( 'Distance from the left.', 'block-slider-pro' ),
                'extra_class' => 'bs_arrow_position',
            );

            $fields['arrow_position_right'] = array(
                'title'       => esc_html__( 'Arrow Right Position', 'block-slider-pro' ),
                'field_type'  => 'bsnumber',
                'default'     => 10,
                'desc'        => esc_html__( 'Distance from the right.', 'block-slider-pro' ),
                'extra_class' => 'bs_arrow_position',
            );

            return $fields;
        }

        /**
         * Pagination pro fields.
         */
        public function pagination_pro_fields( $fields ) {

            unset( 
                $fields['pagination_type']['disabled_options'],
                $fields['progress_bar_position']['disabled_options'],
                
             );

            return $fields;
        }

        /**
         * Responsive pro fields.
         */
        public function responsive_pro_fields( $fields ) {
           
            $fields['slide_control_view_auto'] = array(
                'title'       =>  esc_html__( 'Slides View Auto', 'block-slider-pro' ),
                'field_type'  =>  'bsswitch',
                'default'     =>  'no',
                'desc'        =>  esc_html__( 'Enable slide show per view auto for the slider.', 'block-slider-pro' ),
            );

            $fields['slide_control_center'] = array(
                'title'       =>  esc_html__( 'Center Slides', 'block-slider-pro' ),
                'field_type'  =>  'bsswitch',
                'default'     =>  'no',
                'desc'        =>  esc_html__( 'Enable slide centered for the slider.', 'block-slider-pro' ),
            );

            return $fields;
        }

        /**
         * Thumbnail gallery pro fields.
         */
        public function thumbnail_gallery_pro_fields( $fields ) {

            $fields['thumb_gallery'] = array(
                'title'       => esc_html__( 'Show Thumbnail Gallery', 'block-slider-pro' ),
                'field_type'  => 'bsswitch',
                'default'     => 'no',
                'desc'        => esc_html__( 'Enable to display a thumbnail gallery below the main slider.', 'block-slider-pro' ),
                'data_show'   => '.bs_thumb_gallery',
            );

            $fields['thumb_gallery_loop'] = array(   
                'title'       => esc_html__( 'Thumbnail Gallery Loop', 'block-slider-pro' ),
                'field_type'  => 'bsswitch',
                'default'     => 'yes',
                'desc'        => esc_html__( 'Enable continuous loop mode for the thumbs gallery.', 'block-slider-pro' ),
                'extra_class' => 'bs_thumb_gallery',
            );

            $fields['thumb_gallery_space'] = array(
                'title'       => esc_html__( 'Thumbnail Gallery Space', 'block-slider-pro' ),
                'field_type'  => 'bsnumber',
                'default'     => 10,
                'unit'          => array(
                    'px'   => esc_html__( 'PX', 'block-slider-pro' ),
                ),
                'unit_selected' => 'px',
                'unit_disabled' => 'yes',
                'desc'        => esc_html__( 'Space between each thumbs gallery.', 'block-slider-pro' ),
                'extra_class' => 'bs_thumb_gallery',
            );

            $fields['thumb_gallery_width'] = array(
                'title'       => esc_html__( 'Thumbnail Width', 'block-slider-pro' ),
                'field_type'  => 'bsnumber',
                'default'     => 80,
                'unit'          => array(
                    'px'   => esc_html__( 'PX', 'block-slider-pro' ),
                ),
                'unit_selected' => 'px',
                'unit_disabled' => 'yes',
                'desc'        => esc_html__( 'Set width of thumbnail images.', 'block-slider-pro' ),
                'extra_class' => 'bs_thumb_gallery',
            );

            $fields['thumb_gallery_height'] = array(
                'title'       => esc_html__( 'Thumbnail Height', 'block-slider-pro' ),
                'field_type'  => 'bsnumber',
                'default'     => 80,
                'unit'          => array(
                    'px'   => esc_html__( 'PX', 'block-slider-pro' ),
                ),
                'unit_selected' => 'px',
                'unit_disabled' => 'yes',
                'desc'        => esc_html__( 'Set height of thumbnail images.', 'block-slider-pro' ),
                'extra_class' => 'bs_thumb_gallery',
            );

            return $fields;
        }

        /**
         * Scrollbar pro fields.
         */
        public function scrollbar_pro_fields( $fields ) {

            $fields['control_scrollbar'] = array(
                'title'       =>  esc_html__( 'Scrollbar Control', 'block-slider-pro' ),
                'field_type'  =>  'bsswitch',
                'default'     =>  'no',
                'desc'        =>  esc_html__( 'Enable scrollbar navigation for the slider.', 'block-slider-pro' ),
                'data_show'   => '.bs_scrollbar_wrapper',
            );

            $fields['scrollbar_position'] = array(
                'title'       => esc_html__('Scrollbar Position', 'block-slider-pro'),
                'field_type'  => 'bsselect',
                'default'     => 'bottom',
                'desc'        => esc_html__('Choose scrollbar position.', 'block-slider-pro'),
                'options'     => array(
                    'bottom' => esc_html__('Bottom (Use in Horizontal)', 'block-slider-pro'),
                    'top'    => esc_html__('Top (Use in Horizontal)', 'block-slider-pro'),
                    'left'   => esc_html__('Left ( Use in Vertical)', 'block-slider-pro'),
                    'right'  => esc_html__('Right ( Use in Vertical)', 'block-slider-pro'),
                ),      
                'extra_class' => 'bs_scrollbar_wrapper',
            );

            $fields['scrollbar_color'] = array(
                'title'       =>  esc_html__( 'Scrollbar Color', 'block-slider-pro' ),
                'field_type'  =>  'bscolor',
                'default'     =>  '#999999',
                'extra_class' =>  'bs_scrollbar_wrapper',
            );  

            return $fields;
        }

        /**
         * Other options pro fields.
         */
        public function other_options_pro_fields( $fields ) {
            
            $fields['control_slider_vertical'] = array(
                'title'       =>  esc_html__( 'Vertical Slider Control', 'block-slider-pro' ),
                'field_type'  =>  'bsswitch',
                'default'     =>  'no',
                'desc'        =>  esc_html__( 'Enable vertical direction for the slider.', 'block-slider-pro' ),
            );

            $fields['control_loop_slider'] = array(
                'title'       => esc_html__( 'Loop Slides', 'block-slider-pro' ),
                'field_type'  => 'bsswitch',
                'default'     => 'no',
                'desc'        => esc_html__( 'Enable continuous loop mode for the slider.', 'block-slider-pro' ),
            );

            $fields['control_slide_speed'] = array(
                'title'       => esc_html__( 'Slide Speed', 'block-slider-pro' ),
                'field_type'  => 'bsnumber',
                'default'     => 400,
                'desc'        => esc_html__( 'Set the speed of slide transition in milliseconds (e.g., 400 = 0.4 second).', 'block-slider-pro' ),
                'unit'        => array(
                    'seconds'      => esc_html__( 'Second\'s', 'block-slider-pro' ),
                ),
                'unit_selected' => 'seconds',
                'unit_disabled' => 'yes',
            );

            $fields['zoom_images'] = array(
                'title'       => esc_html__( 'Zoom Images', 'block-slider-pro' ),
                'field_type'  => 'bsswitch',
                'default'     => 'no',
                'desc'        => esc_html__( 'Enable a zoom images for slider.', 'block-slider-pro' ),
            );

            $fields['control_keyboard'] = array(
                'title'       =>  esc_html__( 'Keyboard Control', 'block-slider-pro' ),
                'field_type'  =>  'bsswitch',
                'default'     =>  'no',
                'desc'        =>  esc_html__( 'Enable keyboard navigation for the slider using arrow keys.', 'block-slider-pro' ),
            );

            $fields['control_mousewheel'] = array(
                'title'       =>  esc_html__( 'Mousewheel Control', 'block-slider-pro' ),
                'field_type'  =>  'bsswitch',
                'default'     =>  'no',
                'desc'        =>  esc_html__( 'Enable mouse wheel navigation for the slider.', 'block-slider-pro' ),
            );

            $fields['control_rtl_slider'] = array(
                'title'       => esc_html__( 'Enable RTL', 'block-slider-pro' ),
                'field_type'  => 'bsswitch',
                'default'     => 'no',
                'desc'        => esc_html__( 'Enable Right-to-Left sliding for RTL languages.', 'block-slider-pro' ),
            );

            $fields['enable_grid_layout'] = array(
                'title'       => esc_html__('Enable Grid Layout', 'block-slider-pro'),
                'field_type'  => 'bsswitch',
                'default'     => 'no',
                'desc'        => esc_html__('Enable Swiper grid layout.', 'block-slider-pro'),
                'data_show'   => '.bs_grid_layout',
            );

            $fields['grid_layout_axis'] = array(
                'title'       => esc_html__('Grid Layout Type', 'block-slider-pro'),
                'field_type'  => 'bsselect',
                'default'     => 'row',
                'options'     => array(
                    'row'     => esc_html__('Row', 'block-slider-pro'),
                    'column'  => esc_html__('Column', 'block-slider-pro'),
                ),
                'desc'         => esc_html__('Choose grid layout: Row or Column.', 'block-slider-pro'),
                'extra_class'  => 'bs_grid_layout',
            );

            $fields['grid_count'] = array(
                'title'       => esc_html__('Grid Count', 'block-slider-pro'),
                'field_type'  => 'bsnumber',
                'default'     => 2,
                'desc'        => esc_html__('Set the number of rows or columns based on your layout.', 'block-slider-pro'),
                'extra_class' => 'bs_grid_layout',
            );

            $fields['enable_slides_group'] = array(
                'title'       => esc_html__( 'Enable Slides Group', 'block-slider-pro' ),
                'field_type'  => 'bsswitch',
                'default'     => 'no',
                'desc'        => esc_html__( 'Enable to control grouping of slides.', 'block-slider-pro' ),
                'data_show'   => '.bs_slides_group',
            );

            $fields['slides_per_group'] = array(
                'title'       => esc_html__( 'Slides Per Group', 'block-slider-pro' ),
                'field_type'  => 'bsnumber',
                'default'     => 1,
                'desc'        => esc_html__( 'Skip the number of slides from the beginning before grouping starts. Useful when first slide is featured.', 'block-slider-pro' ),
                'extra_class' => 'bs_slides_group',
            );

            return $fields;
        }
    }

    new BS_Settings_Pro();

endif;
