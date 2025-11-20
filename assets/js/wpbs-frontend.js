'use strict';

jQuery(function ($) {

    class WPBS_Frontend {

        constructor() {
            this.init();
        }

        init() {
            this.initializeSliders();
        }

        initializeSliders() {
            $('.wpbs-swiper').each((index, element) => {
                const slider = $(element),
                    rawOptions = slider.attr('data-options');

                if (!rawOptions) return;

                let options = this.parseOptions(rawOptions);
                if (!options) return;

                if (options.slide_control_view_auto == '1' || options.slide_control_view_auto === true) {
                    slider.addClass('wpbs-auto-slides');
                }

                // Extend options with pro features
                options = this.extendSliderOptions(slider, options);

                // Thumbs gallery
                let thumbsSwiper = null;
                if (options.thumb_gallery == '1' || options.thumb_gallery === true) {
                    const thumbsGallery = slider.parent().find('.wpbs-swiper-thumbs-gallery');
                    if (thumbsGallery.length) {
                        thumbsSwiper = new Swiper(thumbsGallery[0], {
                            loop:            options.thumb_gallery_loop === '1',
                            spaceBetween:    parseInt(options.thumb_gallery_space, 10) || 10,
                            slidesPerView:   4,
                            watchSlidesProgress: true,
                        });
                    }
                }

                const finalOptions = this.swiperOptions(slider, options);
                if (thumbsSwiper) {
                    finalOptions.thumbs = { swiper: thumbsSwiper };
                }
                this.createSwiperInstance(slider, finalOptions);
            });
        }

        parseOptions(rawOptions) {
            try {
                return JSON.parse(rawOptions);
            } catch (error) {
                console.error("Invalid JSON in data-options:", error);
                return null;
            }
        }

        swiperOptions(slider, options) {
            const responsive            = options.control_enable_responsive == '1' || options.control_enable_responsive === 1,
                paginationType          = options.pagination_type || 'bullets',
                customStyle             = options.custom_navigation_style || 'style1',
                customTextColor         = options.custom_text_color || '#ff0000',
                customBackgroundColor   = options.custom_background_color || '#007aff',
                customActiveTextColor   = options.custom_active_text_color || '#0a0607',
                customActiveBgColor     = options.custom_active_background_color || '#0a0607',
                vertical = options.control_slider_vertical == '1' || options.control_slider_vertical === true,
                rtl      = options.control_rtl_slider === '1' || options.control_rtl_slider === true;

                
            const baseOptions = {
                effect:         options.animation || 'slide',
                mousewheel:     options.control_mousewheel == '1' || options.control_mousewheel === true ? {
                    invert: true,
                } : false,
                grabCursor:     options.control_grab_cursor == '1',
                slidesPerView: (options.animation === 'cube') ? 1 : (options.slide_control_view_auto == '1' || 
                    options.slide_control_view_auto === true) ? 'auto' : (responsive ? (parseInt(options.items_in_desktop) || 1) : 1),
                autoplay:       options.control_autoplay == '1' ? {
                    delay: parseInt(options.autoplay_timing, 10) || 3000,
                    disableOnInteraction: false,
                } : false,
                rewind:         options.control_rewind == '1' || options.control_rewind === true,
                spaceBetween:   parseInt(options.control_slide_space, 10) || 10,
                pagination:     paginationType !== 'none' ? {
                    el:         '.swiper-pagination',
                    clickable:  true,
                    renderBullet: function (index, className) {
                        if (paginationType === 'custom') {
                            return `<span class="${className} wpbs-swiper-custom-${customStyle}">${index + 1}</span>`;
                        }
                        return `<span class="${className}"></span>`;
                    },
                    type: paginationType === 'progressbar' ? 'progressbar' :
                        paginationType === 'fraction' ? 'fraction' :
                        'bullets',
                } : undefined,
                navigation: {
                    nextEl: slider.find('.swiper-button-next')[0],
                    prevEl: slider.find('.swiper-button-prev')[0],
                },
                lazy: options.control_lazyload_images == '1' || options.control_lazyload_images === true,
                direction:      vertical ? 'vertical' : 'horizontal',
                centeredSlides: options.slide_control_center == '1' || options.slide_control_center === true,
                keyboard: {
                    enabled:    options.control_keyboard == '1' || options.control_keyboard === true,
                },
                scrollbar: {
                    el:         '.swiper-scrollbar',
                    enabled:    options.control_scrollbar == '1' || options.control_scrollbar === true,
                    draggable:  true,
                },
                zoom:           options.zoom_images == '1' || options.zoom_images === true,
                loop:           options.control_loop_slider == '1' || options.control_loop_slider === true,
                speed:          parseInt(options.control_slide_speed, 10) || 400,
                slidesPerGroup: (options.enable_slides_group == '1' || options.enable_slides_group === true) ? (parseInt(options.slides_per_group, 10) || 1) : 1,

                on: {
                    init: function () {

                        if (options.control_progress_bar == '1' && options.pagination_type == 'progressbar' && options.progress_bar_color) {
                            const progressbar = slider.find('.swiper-pagination-progressbar-fill').addClass('wpbs-progressbar-fill');
                            progressbar.css({ background: options.progress_bar_color });
                        }

                        if (options.pagination_type === 'fraction') {
                            const fraction = slider.find('.swiper-pagination');
                            if (options.fraction_color) {
                                fraction.css('color', options.fraction_color);
                            }
                            if (options.fraction_font_size) {
                                fraction.css('font-size', `${parseInt(options.fraction_font_size)}px`);
                            }

                            if (options.fraction_position) {
                                fraction
                                    .removeClass('wpss-fraction-top-left wpss-fraction-top-right wpss-fraction-bottom-left wpss-fraction-bottom-right wpss-fraction-center')
                                    .addClass(`wpss-fraction-${options.fraction_position}`);
                            }
                        }
                        
                        if (paginationType === 'custom') {
                            slider.find('.swiper-pagination').css({
                                '--wpbs-custom-text-color': customTextColor,
                                '--wpbs-custom-bg-color': customBackgroundColor,
                                '--wpbs-custom-active-text-color': customActiveTextColor,
                                '--wpbs-custom-active-bg-color': customActiveBgColor
                            });
                        }
                        
                        if (options.control_autoplay_timeleft == '1' && options.control_autoplay_timeleft_color) {
                            const progress_time = slider.find('.autoplay-progress');
                            progress_time.find('svg').css('stroke', options.control_autoplay_timeleft_color);
                            progress_time.find('span').css('color', options.control_autoplay_timeleft_color);
                        }
                    },
                    
                    
                    autoplayTimeLeft(swiper, time, progress) {
                        if (options.control_autoplay_timeleft == '1') {
                            const progress_time = slider.find('.autoplay-progress');
                            if (progress_time.length) {
                                progress_time.find('svg').css('--progress', 1 - progress);
                                progress_time.find('span').text(`${Math.ceil(time / 1000)}s`);
                            }
                        }
                    }
                },
            };



            // Cards effect configuration
            if (options.animation === 'cards') {
                baseOptions.initialSlide = parseInt(options.cards_initial_slide, 10) || 2;
                baseOptions.loopAdditionalSlides = parseInt(options.cards_loop_additional_slides, 10) || 2;
                
                // Set border radius if specified
                if (options.cards_border) {
                    slider.find('.swiper-slide').css('border-radius', `${parseInt(options.cards_border, 10)}%`);
                }
            }

            if (options.animation === 'cube') {
                baseOptions.cubeEffect = {
                    shadow: options.cube_shadows === '1' || options.cube_shadows === true,
                    slideShadows: options.cube_slide_shadows === '1' || options.cube_slide_shadows === true,
                    shadowOffset: parseInt(options.cube_shadowoffset) || 20,
                    shadowScale: parseFloat(options.cube_shadowScale) || 1,
                };
            }

            // Coverflow effect configuration
            if (options.animation === 'coverflow') {
                baseOptions.coverflowEffect = {
                    rotate: parseInt(options.coverflow_rotate) || 50,
                    stretch: parseInt(options.coverflow_stretch) || 0,
                    depth: parseInt(options.coverflow_depth) || 100,
                    modifier: parseFloat(options.coverflow_modifier) || 1,
                    slideShadows: options.coverflow_shadows === '1' || options.coverflow_shadows === true
                };
                // For coverflow, set slidesPerView to auto and centeredSlides
                baseOptions.slidesPerView = 'auto';
                baseOptions.centeredSlides = true;
                // For proper loop functionality with coverflow
                if (options.control_rewind == '1' || options.control_rewind === true || options.control_loop_slider == '1' || options.control_loop_slider === true) {
                    baseOptions.loop = true;
                    baseOptions.rewind = false;
                    baseOptions.loopAdditionalSlides = 2;
                }
            }

            // Grid layout - override slidesPerView if grid is enabled
            if (options.grid) {
                baseOptions.grid = options.grid;
                baseOptions.slidesPerView = options.slidesPerView || 1;
            }

            // Creative effect - already set in extendSliderOptions, just ensure it's applied
            if (options.creativeEffect) {
                baseOptions.creativeEffect = options.creativeEffect;
            }

            if (responsive && options.animation !== 'cube' && options.animation !== 'coverflow' && !options.grid && !(options.slide_control_view_auto == '1' || options.slide_control_view_auto === true)) {
                baseOptions.breakpoints = this.getResponsiveBreakpoints(options);
            }

            return $.extend({}, baseOptions, options);
        }

        extendSliderOptions(slider, options) {
            const vertical = options.control_slider_vertical == '1' || options.control_slider_vertical === true,
                rtl = options.control_rtl_slider === '1' || options.control_rtl_slider === true;

            // RTL handling
            if (rtl && !vertical) {
                slider.attr('dir', 'rtl');
            }

            // Grid layout handling
            if (options.enable_grid_layout == '1' || options.enable_grid_layout === true) {
                const rowType = options.grid_layout_axis || 'row',
                    count = parseInt(options.grid_count, 10) || 2;
                
                options.grid = {
                    rows: rowType === 'row' ? count : 1,
                    fill: rowType === 'column' ? 'column' : 'row'
                };
                options.slidesPerView = rowType === 'column' ? count : 1;
            }

            // Scrollbar positioning and styling
            if (options.control_scrollbar == '1' || options.control_scrollbar === true) {
                const scrollbar = slider.find('.swiper-scrollbar');
                
                if (options.scrollbar_color) {
                    scrollbar.css('background-color', options.scrollbar_color);
                    scrollbar.find('.swiper-scrollbar-drag').css('background-color', options.scrollbar_color);
                }

                slider.removeClass('wpbs-scrollbar-top wpbs-scrollbar-left wpbs-scrollbar-right');
                
                if (options.scrollbar_position === 'top') {
                    scrollbar.prependTo(slider);
                    slider.addClass('wpbs-scrollbar-top');
                } else if (options.scrollbar_position === 'left' && vertical) {
                    scrollbar.appendTo(slider);
                    slider.addClass('wpbs-scrollbar-left');
                } else if (options.scrollbar_position === 'right' && vertical) {
                    scrollbar.appendTo(slider);
                    slider.addClass('wpbs-scrollbar-right');
                }
            }

            // Vertical slider height handling
            if (vertical) {
                const height = options.height_image;
                if (height) {
                    slider.css({
                        'height': `${height}px`,
                        'overflow': 'hidden'
                    });
                }
            }

            // Creative effects handling
            if (['shadow push', 'zoom split', 'slide flow', 'flip deck', 'twist flow', 'mirror'].includes(options.animation)) {
                options.effect = 'creative';
                
                switch (options.animation) {
                    case 'shadow push':
                        options.creativeEffect = {
                            prev: { shadow: true, translate: [0, 0, -400] },
                            next: { translate: ['100%', 0, 0] },
                        };
                        break;
                    case 'zoom split':
                        options.creativeEffect = {
                            prev: { shadow: true, translate: ['-120%', 0, -500] },
                            next: { shadow: true, translate: ['120%', 0, -500] },
                        };
                        break;
                    case 'slide flow':
                        options.creativeEffect = {
                            prev: { shadow: true, translate: ['-20%', 0, -1] },
                            next: { translate: ['100%', 0, 0] },
                        };
                        break;
                    case 'flip deck':
                        options.creativeEffect = {
                            prev: { shadow: true, translate: [0, 0, -800], rotate: [180, 0, 0] },
                            next: { shadow: true, translate: [0, 0, -800], rotate: [-180, 0, 0] },
                        };
                        break;
                    case 'twist flow':
                        options.creativeEffect = {
                            prev: { shadow: true, translate: ['-125%', 0, -800], rotate: [0, 0, -90] },
                            next: { shadow: true, translate: ['125%', 0, -800], rotate: [0, 0, 90] },
                        };
                        break;
                    case 'mirror':
                        options.creativeEffect = {
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
                        options.creativeEffect = {
                            prev: { translate: ['-20%', 0, -1] },
                            next: { translate: ['100%', 0, 0] },
                        };
                }
            }

            return options;
        }

        getResponsiveBreakpoints(options) {
            return {
                1024: {
                    slidesPerView: parseInt(options.items_in_desktop) || 4,
                },
                768: {
                    slidesPerView: parseInt(options.items_in_tablet) || 2,
                },
                300: {
                    slidesPerView: parseInt(options.items_in_mobile) || 1,
                }
            };
        }

        createSwiperInstance(slider, finalOptions) {
            new Swiper(slider[0], finalOptions);
        }

    }

    new WPBS_Frontend();

});
