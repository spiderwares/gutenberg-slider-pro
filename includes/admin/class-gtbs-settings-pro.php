<?php
/**
 * Gutenberg Pro Slider Settings Class
*/

//Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'GTBS_Settings_Pro' ) ) :

    class GTBS_Settings_Pro {

        public function __construct() {
            $this->events_handler();
        }

        public function events_handler() {
            add_filter( 'gtbs_animation_fields', [ $this, 'animation_pro_fields' ] );
            add_filter( 'gtbs_navigation_fields', [ $this, 'navigation_pro_fields' ] );
            add_filter( 'gtbs_pagination_fields', [ $this, 'pagination_pro_fields' ] );
            add_filter( 'gtbs_responsive_fields', [ $this, 'responsive_pro_fields' ] );
            add_filter( 'gtbs_thumbnail_gallery_fields', [ $this, 'thumbnail_gallery_pro_fields' ] );
            add_filter( 'gtbs_scrollbar_fields', [ $this, 'scrollbar_pro_fields' ] );
            add_filter( 'gtbs_other_options_fields', [ $this, 'other_options_pro_fields' ] );
        }

        public function animation_pro_fields( $fields ) {

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
                'title'       => esc_html__('Rotate', 'gutenberg-pro-slider'),
                'field_type'  => 'gtbsnumber',
                'default'     => 50,
                'extra_class' => 'gtbs_coverflow_options',
                'desc'        => esc_html__('Rotation angle for coverflow.', 'gutenberg-pro-slider'),
            );

            $fields['coverflow_stretch'] = array(
                'title'       => esc_html__('Stretch', 'gutenberg-pro-slider'),
                'field_type'  => 'gtbsnumber',
                'default'     => 0,
                'extra_class' => 'gtbs_coverflow_options',
                'desc'        => esc_html__('Space between slides.', 'gutenberg-pro-slider'),
            );

            $fields['coverflow_depth'] = array(
                'title'       => esc_html__('Depth', 'gutenberg-pro-slider'),
                'field_type'  => 'gtbsnumber',
                'default'     => 100,
                'extra_class' => 'gtbs_coverflow_options',
                'desc'        => esc_html__('Depth offset.', 'gutenberg-pro-slider'),
            );

            $fields['coverflow_modifier'] = array(
                'title'       => esc_html__('Modifier', 'gutenberg-pro-slider'),
                'field_type'  => 'gtbsnumber',
                'default'     => 1,
                'extra_class' => 'gtbs_coverflow_options',
                'desc'        => esc_html__('Effect multiplier.', 'gutenberg-pro-slider'),
            );

            $fields['coverflow_shadows'] = array(
                'title'       => esc_html__('Slide Shadows', 'gutenberg-pro-slider'),
                'field_type'  => 'gtbsswitch',
                'default'     => true,
                'extra_class' => 'gtbs_coverflow_options',
                'desc'        => esc_html__('Enable slide shadows.', 'gutenberg-pro-slider'),
            );

            return $fields;
        }

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

            return $fields;
        }

        public function pagination_pro_fields( $fields ) {

            unset( 
                $fields['pagination_type']['disabled_options'],
                $fields['progress_bar_position']['disabled_options'],
                
             );

            return $fields;
        }

        public function responsive_pro_fields( $fields ) {
           
            $fields['slide_control_view_auto'] = array(
                'title'       =>  esc_html__( 'Slides Per View Auto', 'gutenberg-pro-slider' ),
                'field_type'  =>  'gtbsswitch',
                'default'     =>  'no',
                'desc'        =>  esc_html__( 'Enable slide show per view auto for the slider.', 'gutenberg-pro-slider' ),
            );

            $fields['slide_control_center'] = array(
                'title'       =>  esc_html__( 'Slides Centered', 'gutenberg-pro-slider' ),
                'field_type'  =>  'gtbsswitch',
                'default'     =>  'no',
                'desc'        =>  esc_html__( 'Enable slide centered for the slider.', 'gutenberg-pro-slider' ),
            );

            return $fields;
        }

        public function thumbnail_gallery_pro_fields( $fields ) {

            $fields['thumb_gallery'] = array(
                'title'       => esc_html__( 'Show Thumbnail Gallery', 'gutenberg-pro-slider' ),
                'field_type'  => 'gtbsswitch',
                'default'     => 'no',
                'desc'        => esc_html__( 'Enable to display a thumbnail gallery below the main slider.', 'gutenberg-pro-slider' ),
                'data_show'   => '.gtbs_thumb_gallery',
            );

            $fields['thumb_gallery_loop'] = array(   
                'title'       => esc_html__( 'Thumbnail Gallery Loop', 'gutenberg-pro-slider' ),
                'field_type'  => 'gtbsswitch',
                'default'     => 'yes',
                'desc'        => esc_html__( 'Enable continuous loop mode for the thumbs gallery.', 'gutenberg-pro-slider' ),
                'extra_class' => 'gtbs_thumb_gallery',
            );

            $fields['thumb_gallery_space'] = array(
                'title'       => esc_html__( 'Thumbnail Gallery Space', 'gutenberg-pro-slider' ),
                'field_type'  => 'gtbsnumber',
                'default'     => 10,
                'desc'        => esc_html__( 'Space between each thumbs gallery (in px).', 'gutenberg-pro-slider' ),
                'extra_class' => 'gtbs_thumb_gallery',
            );

            $fields['thumb_gallery_width'] = array(
                'title'       => esc_html__( 'Thumbnail Width', 'gutenberg-pro-slider' ),
                'field_type'  => 'gtbsnumber',
                'default'     => 80,
                'desc'        => esc_html__( 'Set width of thumbnail images in px.', 'gutenberg-pro-slider' ),
                'extra_class' => 'gtbs_thumb_gallery',
            );

            $fields['thumb_gallery_height'] = array(
                'title'       => esc_html__( 'Thumbnail Height', 'gutenberg-pro-slider' ),
                'field_type'  => 'gtbsnumber',
                'default'     => 80,
                'desc'        => esc_html__( 'Set height of thumbnail images in px.', 'gutenberg-pro-slider' ),
                'extra_class' => 'gtbs_thumb_gallery',
            );

            return $fields;
        }

        public function scrollbar_pro_fields( $fields ) {

            unset( $fields['scrollbar_position']['disabled_options'] );

            $fields['control_scrollbar'] = array(
                'title'       =>  esc_html__( 'Scrollbar Control', 'gutenberg-pro-slider' ),
                'field_type'  =>  'gtbsswitch',
                'default'     =>  'no',
                'desc'        =>  esc_html__( 'Enable scrollbar navigation for the slider.', 'gutenberg-pro-slider' ),
                'data_show'   => '.gtbs_scrollbar_wrapper',
            );

            $fields['scrollbar_position'] = array(
                'title'       => esc_html__('Scrollbar Position', 'gutenberg-pro-slider'),
                'field_type'  => 'gtbsselect',
                'default'     => 'bottom',
                'desc'        => esc_html__('Choose scrollbar position.', 'gutenberg-pro-slider'),
                'options'     => array(
                    'bottom' => esc_html__('Bottom (Use in Horizontal)', 'gutenberg-pro-slider'),
                    'top'    => esc_html__('Top (Use in Horizontal)', 'gutenberg-pro-slider'),
                    'left'   => esc_html__('Left ( Use in Vertical)', 'gutenberg-pro-slider'),
                    'right'  => esc_html__('Right ( Use in Vertical)', 'gutenberg-pro-slider'),
                ),      
                'extra_class' => 'gtbs_scrollbar_wrapper',
            );

            $fields['scrollbar_color'] = array(
                'title'       =>  esc_html__( 'Scrollbar Color', 'gutenberg-pro-slider' ),
                'field_type'  =>  'gtbscolor',
                'default'     =>  '#999999',
                'extra_class' =>  'gtbs_scrollbar_wrapper',
            );  

            return $fields;
        }

        public function other_options_pro_fields( $fields ) {
            
            $fields['control_slider_vertical'] = array(
                'title'       =>  esc_html__( 'Vertical Slider Control', 'gutenberg-pro-slider' ),
                'field_type'  =>  'gtbsswitch',
                'default'     =>  'no',
                'desc'        =>  esc_html__( 'Enable vertical direction for the slider.', 'gutenberg-pro-slider' ),
            );

            $fields['control_loop_slider'] = array(
                'title'       => esc_html__( 'Loop Slides', 'gutenberg-pro-slider' ),
                'field_type'  => 'gtbsswitch',
                'default'     => 'no',
                'desc'        => esc_html__( 'Enable continuous loop mode for the slider.', 'gutenberg-pro-slider' ),
            );

            $fields['control_slide_speed'] = array(
                'title'       => esc_html__( 'Slide Speed', 'gutenberg-pro-slider' ),
                'field_type'  => 'gtbsnumber',
                'default'     => 400,
                'desc'        => esc_html__( 'Set the speed of slide transition in milliseconds (e.g., 400 = 0.4 seconds).', 'gutenberg-pro-slider' ),
                'unit'        => array(
                    'seconds'      => esc_html__( 'Second\'s', 'gutenberg-pro-slider' ),
                ),
                'unit_selected' => 'seconds',
                'unit_disabled' => 'yes',
            );

            $fields['control_slide_space'] = array(
                'title'       => esc_html__( 'Slides Space', 'gutenberg-pro-slider' ),
                'field_type'  => 'gtbsnumber',
                'default'     => 10,
                'desc'        => esc_html__( 'Space between each slide.', 'gutenberg-pro-slider' ),
                'unit'        => array(
                    'px'      => esc_html__( 'PX', 'gutenberg-pro-slider' ),
                ),
                'unit_selected' => 'px',
                'unit_disabled' => 'yes',
            );

            $fields['zoom_images'] = array(
                'title'       => esc_html__( 'Zoom Images', 'gutenberg-pro-slider' ),
                'field_type'  => 'gtbsswitch',
                'default'     => 'no',
                'desc'        => esc_html__( 'Enable a zoom images for slider.', 'gutenberg-pro-slider' ),
            );

            $fields['control_keyboard'] = array(
                'title'       =>  esc_html__( 'Keyboard Control', 'gutenberg-pro-slider' ),
                'field_type'  =>  'gtbsswitch',
                'default'     =>  'no',
                'desc'        =>  esc_html__( 'Enable keyboard navigation for the slider using arrow keys.', 'gutenberg-pro-slider' ),
            );

            $fields['control_mousewheel'] = array(
                'title'       =>  esc_html__( 'Mousewheel Control', 'gutenberg-pro-slider' ),
                'field_type'  =>  'gtbsswitch',
                'default'     =>  'no',
                'desc'        =>  esc_html__( 'Enable mouse wheel navigation for the slider.', 'gutenberg-pro-slider' ),
            );

            $fields['control_rtl_slider'] = array(
                'title'       => esc_html__( 'Enable RTL', 'gutenberg-pro-slider' ),
                'field_type'  => 'gtbsswitch',
                'default'     => 'no',
                'desc'        => esc_html__( 'Enable Right-to-Left sliding for RTL languages.', 'gutenberg-pro-slider' ),
            );

            $fields['enable_grid_layout'] = array(
                'title'       => esc_html__('Enable Grid Layout', 'gutenberg-pro-slider'),
                'field_type'  => 'gtbsswitch',
                'default'     => 'no',
                'desc'        => esc_html__('Enable Swiper grid layout.', 'gutenberg-pro-slider'),
                'data_show'   => '.gtbs_grid_layout',
            );

            $fields['grid_layout_axis'] = array(
                'title'       => esc_html__('Grid Layout Type', 'gutenberg-pro-slider'),
                'field_type'  => 'gtbsselect',
                'default'     => 'row',
                'options'     => array(
                    'row'     => esc_html__('Row', 'gutenberg-pro-slider'),
                    'column'  => esc_html__('Column', 'gutenberg-pro-slider'),
                ),
                'desc'         => esc_html__('Choose grid layout: Row or Column.', 'gutenberg-pro-slider'),
                'extra_class'  => 'gtbs_grid_layout',
            );

            $fields['grid_count'] = array(
                'title'       => esc_html__('Grid Count', 'gutenberg-pro-slider'),
                'field_type'  => 'gtbsnumber',
                'default'     => 2,
                'desc'        => esc_html__('Set the number of rows or columns based on your layout.', 'gutenberg-pro-slider'),
                'extra_class' => 'gtbs_grid_layout',
            );

            $fields['enable_slides_group'] = array(
                'title'       => esc_html__( 'Enable Slides Group', 'gutenberg-pro-slider' ),
                'field_type'  => 'gtbsswitch',
                'default'     => 'no',
                'desc'        => esc_html__( 'Enable to control grouping of slides.', 'gutenberg-pro-slider' ),
                'data_show'   => '.gtbs_slides_group',
            );

            $fields['slides_per_group'] = array(
                'title'       => esc_html__( 'Slides Per Group', 'gutenberg-pro-slider' ),
                'field_type'  => 'gtbsnumber',
                'default'     => 1,
                'desc'        => esc_html__( 'Skip the number of slides from the beginning before grouping starts. Useful when first slide is featured.', 'gutenberg-pro-slider' ),
                'extra_class' => 'gtbs_slides_group',
            );

            return $fields;
        }
    }

    new GTBS_Settings_Pro();

endif;
