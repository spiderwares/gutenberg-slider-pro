'use strict';

jQuery(function ($) {

    class BS_Frontend_Pro {

        constructor() {
            this.init();
        }

        init() {
            this.extendSliders();
        }

        extendSliders() {
            $('.bs-swiper').each((index, element) => {
                const slider = $(element),
                    rawOptions = slider.attr('data-options');

                if (!rawOptions) return;

                let options;
                try {
                    options = JSON.parse(rawOptions);
                } catch (error) {
                    console.error("Invalid JSON in data-options:", error);
                    return;
                }
                
                const vertical = options.control_slider_vertical == '1' || options.control_slider_vertical === true,
                        rtl    = options.control_rtl_slider === '1' || options.control_rtl_slider === true;

                const updatedOptions = $.extend({}, options, {
                    loop:           options.control_loop_slider == '1' || options.control_loop_slider === true,
                    speed:          parseInt(options.control_slide_speed, 10) || 400,
                    slidesPerGroup: options.enable_slides_group ? parseInt(options.slides_per_group, 10) || 1 : 1,
                    zoom:           options.zoom_images == '1' || options.zoom_images === true,
                    keyboard: {
                        enabled:    options.control_keyboard == '1' || options.control_keyboard === true,
                    },
                    mousewheel:     options.control_mousewheel  == '1' || options.control_mousewheel === true,
                    scrollbar: {
                        el:         '.swiper-scrollbar',
                        enabled:    options.control_scrollbar == '1' || options.control_scrollbar === true,
                        draggable:  true,
                    },
                    direction:      vertical ? 'vertical' : 'horizontal',
                    centeredSlides: options.slide_control_center == '1' || options.slide_control_center === true,
                });

                if (options.animation === 'coverflow') {
                    updatedOptions.coverflowEffect = {
                        rotate:         parseInt(options.coverflow_rotate) || 50,
                        stretch:        parseInt(options.coverflow_stretch) || 0,
                        depth:          parseInt(options.coverflow_depth) || 100,
                        modifier:       parseFloat(options.coverflow_modifier) || 1,
                        slideShadows:   options.coverflow_shadows === '1' || options.coverflow_shadows === true
                    };
                }

                if (rtl && !vertical) {
                    slider.attr('dir', 'rtl'); 
                }

                if (options.enable_grid_layout == '1' || options.enable_grid_layout === true) {
                    const rowType   = options.grid_layout_axis || 'row',
                        count       = parseInt(options.grid_count, 10) || 2;

                    updatedOptions.grid = {
                        rows: rowType === 'row' ? count : 1,
                        fill: rowType === 'column' ? 'column' : 'row'
                    };

                    updatedOptions.slidesPerView = rowType === 'column' ? count : 1;
                }

                if (options.scrollbar_color) {
                    slider.find('.swiper-scrollbar').css('background-color', options.scrollbar_color);
                    slider.find('.swiper-scrollbar-drag').css('background-color', options.scrollbar_color); 
                }

                const scrollbar = slider.find('.swiper-scrollbar');
                slider.removeClass('bs-scrollbar-top bs-scrollbar-left bs-scrollbar-right');

                if (options.scrollbar_position === 'top') {
                    scrollbar.prependTo(slider); 
                    slider.addClass('bs-scrollbar-top');
                } else if (options.scrollbar_position === 'left' && updatedOptions.direction === 'vertical') {
                    scrollbar.appendTo(slider);
                    slider.addClass('bs-scrollbar-left');
                } else if (options.scrollbar_position === 'right' && updatedOptions.direction === 'vertical') {
                    scrollbar.appendTo(slider);
                    slider.addClass('bs-scrollbar-right');
                }

                if (updatedOptions.direction === 'vertical') {
                    const height = options.height_image;
                    slider.css({
                        'height': `${height}px`,
                        'overflow': 'hidden'
                    });
                }
                
                if (['shadow push', 'zoom split', 'slide flow', 'flip deck', 'twist flow', 'mirror'].includes(options.animation)) {
                    updatedOptions.effect = 'creative';

                    switch (options.animation) {
                        case 'shadow push':
                            updatedOptions.creativeEffect = {
                                prev: { shadow: true, translate: [0, 0, -400] },
                                next: { translate: ['100%', 0, 0] },
                            };
                            break;

                        case 'zoom split':
                            updatedOptions.creativeEffect = {
                                prev: { shadow: true, translate: ['-120%', 0, -500] },
                                next: { shadow: true, translate: ['120%', 0, -500] },
                            };
                            break;

                        case 'slide flow':
                            updatedOptions.effect = 'creative';
                            updatedOptions.creativeEffect = {
                                prev: { shadow: true, translate: ['-20%', 0, -1] },
                                next: { translate: ['100%', 0, 0] },
                            };
                            break;

                        case 'flip deck':
                            updatedOptions.creativeEffect = {
                                prev: { shadow: true, translate: [0, 0, -800], rotate: [180, 0, 0] },
                                next: { shadow: true, translate: [0, 0, -800], rotate: [-180, 0, 0] },
                            };
                            break;

                        case 'twist flow':
                            updatedOptions.creativeEffect = {
                                prev: { shadow: true, translate: ['-125%', 0, -800], rotate: [0, 0, -90] },
                                next: { shadow: true, translate: ['125%', 0, -800], rotate: [0, 0, 90] },
                            };
                            break;

                        case 'mirror':
                            updatedOptions.creativeEffect = {
                                prev: {
                                    shadow: true,
                                    origin: "left center",
                                    translate: ['-5%', 0, -200],
                                    rotate: [0, 100, 0],
                                },
                                next: {
                                    origin: "right center",
                                    translate: ['5%', 0, -200],
                                    rotate: [0, -100, 0],
                                },
                            };
                            break;

                        default:
                            updatedOptions.creativeEffect = {
                                prev: { translate: ['-20%', 0, -1] },
                                next: { translate: ['100%', 0, 0] },
                            };
                    }
                }
                // Update the data-options attribute
                slider.attr('data-options', JSON.stringify(updatedOptions));
            });
        }

    }

    new BS_Frontend_Pro();

});
