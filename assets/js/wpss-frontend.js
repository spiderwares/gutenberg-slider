'use strict';

jQuery(function ($) {

    class WPSS_Frontend {

        constructor() {
            this.init();
        }

        init() {
            this.initializeSliders();
        }

        initializeSliders() {
            $('.wpss-swiper').each((index, element) => {
                const slider = $(element),
                    rawOptions = slider.attr('data-options');

                if (!rawOptions) return;

                let options = this.parseOptions(rawOptions);
                if (!options) return;

                if (options.slide_control_view_auto == '1' || options.slide_control_view_auto === true) {
                    slider.addClass('wpss-auto-slides');
                }

                // Thumbs gallery
                let thumbsSwiper = null;
                if (options.thumb_gallery == '1' || options.thumb_gallery === true) {
                    const thumbsGallery = slider.siblings('.wpss-swiper-thumbs-gallery');
                    if (thumbsGallery.length) {
                        if (thumbsGallery[0].swiper) {
                            thumbsGallery[0].swiper.destroy(true, true);
                        }

                        thumbsSwiper = new Swiper(thumbsGallery[0], {
                            loop:           options.thumb_gallery_loop === '1',
                            spaceBetween:   parseInt(options.thumb_gallery_space, 10) || 10,
                            slidesPerView:  4,
                            watchSlidesProgress: true,
                            freeMode: true,
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
                vertical                = options.control_slider_vertical == '1' || options.control_slider_vertical === true,
                rtl                     = options.control_rtl_slider === '1' || options.control_rtl_slider === true;

            const baseOptions = {
                effect:     options.animation || 'slide',
                grabCursor: options.control_grab_cursor == '1',
                lazy:       options.control_lazyload_images == '1' || options.control_lazyload_images === true,
                rewind:     options.control_rewind == '1' || options.control_rewind === true,
                slidesPerView: (options.animation === 'cube') ? 1 : (options.slide_control_view_auto == '1' ||
                    options.slide_control_view_auto === true) ? 'auto' : (responsive ? (parseInt(options.items_in_desktop) || 1) : 1),
                autoplay:   options.control_autoplay == '1' ? {
                    delay: parseInt(options.autoplay_timing, 10) || 3000,
                    disableOnInteraction: false,
                } : false,
                fadeEffect: {
                    crossFade: true
                },
                pagination: paginationType !== 'none' ? {
                    el:             slider.find('.swiper-pagination')[0],
                    clickable:      options.bullets_click == '1' || options.bullets_click === true,
                    dynamicBullets: options.dynamic_bullets == '1' || options.dynamic_bullets === true,
                    renderBullet: function (index, className) {
                        if (paginationType === 'custom') {
                            return `<span class="${className} wpss-swiper-custom-${customStyle}">${index + 1}</span>`;
                        }
                        return `<span class="${className}"></span>`;
                    },
                    type: paginationType === 'progressbar' ? 'progressbar' :
                        paginationType === 'fraction' ? 'fraction' :
                        'bullets',
                } : undefined,
                navigation: {
                    nextEl:     slider.find('.swiper-button-next')[0],
                    prevEl:     slider.find('.swiper-button-prev')[0],
                },
                loop:           options.control_loop_slider == '1' || options.control_loop_slider === true,
                speed:          parseInt(options.control_slide_speed, 10) || 400,
                spaceBetween:   parseInt(options.control_slide_space, 10) || 0,
                slidesPerGroup: (options.enable_slides_group == '1' || options.enable_slides_group === true) ? parseInt(options.slides_per_group, 10) || 1 : 1,
                zoom: options.zoom_images == '1' || options.zoom_images === true,
                keyboard: {
                    enabled:    options.control_keyboard == '1' || options.control_keyboard === true,
                },
                mousewheel:     options.control_mousewheel == '1' || options.control_mousewheel === true,
                scrollbar: {
                    el: slider.find('.swiper-scrollbar')[0],
                    enabled:    options.control_scrollbar == '1' || options.control_scrollbar === true,
                    draggable:  options.scrollbar_draggable == '1' || options.scrollbar_draggable === true,
                },
                direction:      vertical ? 'vertical' : 'horizontal',
                centeredSlides: options.slide_control_center == '1' || options.slide_control_center === true,

                on: {
                    init: function () {
                        if (options.control_progress_bar == '1' && options.pagination_type == 'progressbar' && options.progress_bar_color) {
                            const progressbar = slider.find('.swiper-pagination-progressbar-fill').addClass('wpss-progressbar-fill');
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
                                fraction.removeClass('wpss-fraction-top-left wpss-fraction-top-right wpss-fraction-bottom-left wpss-fraction-bottom-right wpss-fraction-center')
                                    .addClass(`wpss-fraction-${options.fraction_position}`);
                            }
                        }

                        if (paginationType === 'custom') {
                            slider.find('.swiper-pagination').css({
                                '--wpss-custom-text-color': customTextColor,
                                '--wpss-custom-bg-color': customBackgroundColor,
                                '--wpss-custom-active-text-color': customActiveTextColor,
                                '--wpss-custom-active-bg-color': customActiveBgColor
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

            // RTL
            if (rtl && !vertical) {
                slider.attr('dir', 'rtl');
            }

            // Cards border radius
            if (options.animation === 'cards') {
                baseOptions.rotate = true,
                    baseOptions.initialSlide = parseInt(options.cards_initial_slide, 10) || 0;
                baseOptions.loopAdditionalSlides = parseInt(options.cards_loop_additional_slides, 10) || 0;

                if (options.cards_border) {
                    slider.find('.swiper-slide').css('border-radius', `${parseInt(options.cards_border, 10)}%`);
                }
            }

            // Cube effect
            if (options.animation === 'cube') {
                baseOptions.cubeEffect = {
                    shadow:         options.cube_shadows === '1' || options.cube_shadows === true,
                    slideShadows:   options.cube_slide_shadows === '1' || options.cube_slide_shadows === true,
                    shadowOffset:   parseInt(options.cube_shadowoffset) || 20,
                    shadowScale:    parseFloat(options.cube_shadowScale) || 1,
                };
            }

            // Coverflow effect
            if (options.animation === 'coverflow') {
                baseOptions.coverflowEffect = {
                    rotate:     parseInt(options.coverflow_rotate) || 50,
                    stretch:    parseInt(options.coverflow_stretch) || 0,
                    depth:      parseInt(options.coverflow_depth) || 100,
                    modifier:   parseFloat(options.coverflow_modifier) || 1,
                    slideShadows: options.coverflow_shadows === '1' || options.coverflow_shadows === true
                };
            }

            // Grid layout
            if (options.enable_grid_layout == '1' || options.enable_grid_layout === true) {
                const rowType = options.grid_layout_axis || 'row',
                    count     = parseInt(options.grid_count, 10) || 2;

                baseOptions.grid = {
                    rows: rowType === 'row' ? count : 1,
                    fill: rowType === 'column' ? 'column' : 'row'
                };

                baseOptions.slidesPerView = rowType === 'column' ? count : 1;
            }

            // Scrollbar color
            if (options.scrollbar_color) {
                slider.find('.swiper-scrollbar').css('background-color', options.scrollbar_color);
                slider.find('.swiper-scrollbar-drag').css('background-color', options.scrollbar_color);
            }

            // Scrollbar position
            const scrollbar = slider.find('.swiper-scrollbar');
            slider.removeClass('wpss-scrollbar-top wpss-scrollbar-left wpss-scrollbar-right');

            if (options.scrollbar_position === 'top') {
                scrollbar.prependTo(slider);
                slider.addClass('wpss-scrollbar-top');
            } else if (options.scrollbar_position === 'left' && baseOptions.direction === 'vertical') {
                scrollbar.appendTo(slider);
                slider.addClass('wpss-scrollbar-left');
            } else if (options.scrollbar_position === 'right' && baseOptions.direction === 'vertical') {
                scrollbar.appendTo(slider);
                slider.addClass('wpss-scrollbar-right');
            }

            // Vertical direction height and width
            if (baseOptions.direction === 'vertical') {
                const height = options.height_image || 800,
                    width    = options.width_image || 500,
                    unit     = options.image_unit || 'px';
                slider.css({
                    'height': `${height}${unit}`,
                    'max-width': `${width}${unit}`,
                });
            }

            // Creative effects
            if (['shadow push', 'zoom split', 'slide flow', 'flip deck', 'twist flow', 'mirror'].includes(options.animation)) {
                baseOptions.effect = 'creative';

                // Helper function to format translate values with units
                const formatTranslateValue = (value, fieldKey, defaultUnit = 'px') => {
                    const numValue = parseInt(value, 10) || 0,
                        unit       = options[fieldKey + '_unit'] || defaultUnit;
                    if (unit === 'percent') {
                        return `${numValue}%`;
                    }
                    return numValue;
                };

                switch (options.animation) {
                    case 'shadow push':
                        const shadowPushPrevShadow = options.creative_shadow_push_prev_shadow === '1' || options.creative_shadow_push_prev_shadow === true,
                            shadowPushPrevX = formatTranslateValue(options.creative_shadow_push_prev_x, 'creative_shadow_push_prev_x', 'px'),
                            shadowPushPrevY = formatTranslateValue(options.creative_shadow_push_prev_y, 'creative_shadow_push_prev_y', 'px'),
                            shadowPushPrevZ = formatTranslateValue(options.creative_shadow_push_prev_z, 'creative_shadow_push_prev_z', 'px'),
                            shadowPushNextX = formatTranslateValue(options.creative_shadow_push_next_x, 'creative_shadow_push_next_x', 'percent'),
                            shadowPushNextY = formatTranslateValue(options.creative_shadow_push_next_y, 'creative_shadow_push_next_y', 'px'),
                            shadowPushNextZ = formatTranslateValue(options.creative_shadow_push_next_z, 'creative_shadow_push_next_z', 'px');

                        baseOptions.creativeEffect = {
                            prev: {
                                shadow: shadowPushPrevShadow,
                                translate: [shadowPushPrevX, shadowPushPrevY, shadowPushPrevZ]
                            },
                            next: {
                                translate: [shadowPushNextX, shadowPushNextY, shadowPushNextZ]
                            },
                        };
                        break;


                    case 'zoom split':
                        const zoomSplitPrevShadow = options.creative_zoom_split_prev_shadow === '1' || options.creative_zoom_split_prev_shadow === true,
                            zoomSplitNextShadow   = options.creative_zoom_split_next_shadow === '1' || options.creative_zoom_split_next_shadow === true,
                            zoomSplitPrevX        = formatTranslateValue(options.creative_zoom_split_prev_x, 'creative_zoom_split_prev_x', 'percent'),
                            zoomSplitNextX        = formatTranslateValue(options.creative_zoom_split_next_x, 'creative_zoom_split_next_x', 'percent'),
                            zoomSplitPrevY        = formatTranslateValue(options.creative_zoom_split_prev_y, 'creative_zoom_split_prev_y', 'px'),
                            zoomSplitNextY        = formatTranslateValue(options.creative_zoom_split_next_y, 'creative_zoom_split_next_y', 'px'),
                            zoomSplitPrevZ        = formatTranslateValue(options.creative_zoom_split_prev_z, 'creative_zoom_split_prev_z', 'px'),
                            zoomSplitNextZ        = formatTranslateValue(options.creative_zoom_split_next_z, 'creative_zoom_split_next_z', 'px');

                        baseOptions.creativeEffect = {
                            prev: {
                                shadow: zoomSplitPrevShadow,
                                translate: [zoomSplitPrevX, zoomSplitPrevY, zoomSplitPrevZ]
                            },
                            next: {
                                shadow: zoomSplitNextShadow,
                                translate: [zoomSplitNextX, zoomSplitNextY, zoomSplitNextZ]
                            },
                        };
                        break;

                    case 'slide flow':
                        const slideFlowPrevShadow = options.creative_slide_flow_prev_shadow === '1' || options.creative_slide_flow_prev_shadow === true,
                            slideFlowPrevX        = formatTranslateValue(options.creative_slide_flow_prev_x, 'creative_slide_flow_prev_x', 'percent'),
                            slideFlowNextX        = formatTranslateValue(options.creative_slide_flow_next_x, 'creative_slide_flow_next_x', 'percent'),
                            slideFlowPrevY        = formatTranslateValue(options.creative_slide_flow_prev_y, 'creative_slide_flow_prev_y', 'px'),
                            slideFlowNextY        = formatTranslateValue(options.creative_slide_flow_next_y, 'creative_slide_flow_next_y', 'px'),
                            slideFlowPrevZ        = formatTranslateValue(options.creative_slide_flow_prev_z, 'creative_slide_flow_prev_z', 'px'),
                            slideFlowNextZ        = formatTranslateValue(options.creative_slide_flow_next_z, 'creative_slide_flow_next_z', 'px');

                        baseOptions.creativeEffect = {
                            prev: {
                                shadow: slideFlowPrevShadow,
                                translate: [slideFlowPrevX, slideFlowPrevY, slideFlowPrevZ]
                            },
                            next: {
                                translate: [slideFlowNextX, slideFlowNextY, slideFlowNextZ]
                            },
                        };
                        break;

                    case 'flip deck':
                        const flipDeckPrevShadow = options.creative_flip_deck_prev_shadow === '1' || options.creative_flip_deck_prev_shadow === true,
                            flipDeckNextShadow   = options.creative_flip_deck_next_shadow === '1' || options.creative_flip_deck_next_shadow === true,
                            flipDeckPrevX        = formatTranslateValue(options.creative_flip_deck_prev_x, 'creative_flip_deck_prev_x', 'px'),
                            flipDeckPrevY        = formatTranslateValue(options.creative_flip_deck_prev_y, 'creative_flip_deck_prev_y', 'px'),
                            flipDeckPrevZ        = formatTranslateValue(options.creative_flip_deck_prev_z, 'creative_flip_deck_prev_z', 'px'),
                            flipDeckNextX        = formatTranslateValue(options.creative_flip_deck_next_x, 'creative_flip_deck_next_x', 'px'),
                            flipDeckNextY        = formatTranslateValue(options.creative_flip_deck_next_y, 'creative_flip_deck_next_y', 'px'),
                            flipDeckNextZ        = formatTranslateValue(options.creative_flip_deck_next_z, 'creative_flip_deck_next_z', 'px'),
                            flipDeckPrevRotateX  = parseInt(options.creative_flip_deck_prev_rotate_x, 10) || 180,
                            flipDeckPrevRotateY  = parseInt(options.creative_flip_deck_prev_rotate_y, 10) || 0,
                            flipDeckPrevRotateZ  = parseInt(options.creative_flip_deck_prev_rotate_z, 10) || 0,
                            flipDeckNextRotateX  = parseInt(options.creative_flip_deck_next_rotate_x, 10) || -180,
                            flipDeckNextRotateY  = parseInt(options.creative_flip_deck_next_rotate_y, 10) || 0,
                            flipDeckNextRotateZ  = parseInt(options.creative_flip_deck_next_rotate_z, 10) || 0;

                        baseOptions.creativeEffect = {
                            prev: {
                                shadow: flipDeckPrevShadow,
                                translate: [flipDeckPrevX, flipDeckPrevY, flipDeckPrevZ],
                                rotate: [flipDeckPrevRotateX, flipDeckPrevRotateY, flipDeckPrevRotateZ]
                            },
                            next: {
                                shadow: flipDeckNextShadow,
                                translate: [flipDeckNextX, flipDeckNextY, flipDeckNextZ],
                                rotate: [flipDeckNextRotateX, flipDeckNextRotateY, flipDeckNextRotateZ]
                            },
                        };
                        break;

                    case 'twist flow':
                        const twistFlowPrevShadow = options.creative_twist_flow_prev_shadow === '1' || options.creative_twist_flow_prev_shadow === true,
                            twistFlowNextShadow   = options.creative_twist_flow_next_shadow === '1' || options.creative_twist_flow_next_shadow === true,
                            twistFlowPrevX        = formatTranslateValue(options.creative_twist_flow_prev_x, 'creative_twist_flow_prev_x', 'percent'),
                            twistFlowNextX        = formatTranslateValue(options.creative_twist_flow_next_x, 'creative_twist_flow_next_x', 'percent'),
                            twistFlowPrevY        = formatTranslateValue(options.creative_twist_flow_prev_y, 'creative_twist_flow_prev_y', 'px'),
                            twistFlowNextY        = formatTranslateValue(options.creative_twist_flow_next_y, 'creative_twist_flow_next_y', 'px'),
                            twistFlowPrevZ        = formatTranslateValue(options.creative_twist_flow_prev_z, 'creative_twist_flow_prev_z', 'px'),
                            twistFlowNextZ        = formatTranslateValue(options.creative_twist_flow_next_z, 'creative_twist_flow_next_z', 'px'),
                            twistFlowPrevRotateX  = parseInt(options.creative_twist_flow_prev_rotate_x, 10) || 0,
                            twistFlowPrevRotateY  = parseInt(options.creative_twist_flow_prev_rotate_y, 10) || 0,
                            twistFlowPrevRotateZ  = parseInt(options.creative_twist_flow_prev_rotate_z, 10) || -90,
                            twistFlowNextRotateX  = parseInt(options.creative_twist_flow_next_rotate_x, 10) || 0,
                            twistFlowNextRotateY  = parseInt(options.creative_twist_flow_next_rotate_y, 10) || 0,
                            twistFlowNextRotateZ  = parseInt(options.creative_twist_flow_next_rotate_z, 10) || 90;

                        baseOptions.creativeEffect = {
                            prev: {
                                shadow: twistFlowPrevShadow,
                                translate: [twistFlowPrevX, twistFlowPrevY, twistFlowPrevZ],
                                rotate: [twistFlowPrevRotateX, twistFlowPrevRotateY, twistFlowPrevRotateZ]
                            },
                            next: {
                                shadow: twistFlowNextShadow,
                                translate: [twistFlowNextX, twistFlowNextY, twistFlowNextZ],
                                rotate: [twistFlowNextRotateX, twistFlowNextRotateY, twistFlowNextRotateZ]
                            },
                        };
                        break;

                    case 'mirror':
                        const mirrorPrevShadow = options.creative_mirror_prev_shadow === '1' || options.creative_mirror_prev_shadow === true,
                            mirrorPrevOrigin   = options.creative_mirror_prev_origin || 'left center',
                            mirrorPrevX        = formatTranslateValue(options.creative_mirror_prev_x, 'creative_mirror_prev_x', 'percent'),
                            mirrorPrevY        = formatTranslateValue(options.creative_mirror_prev_y, 'creative_mirror_prev_y', 'px'),
                            mirrorPrevZ        = formatTranslateValue(options.creative_mirror_prev_z, 'creative_mirror_prev_z', 'px'),
                            mirrorPrevRotateX  = parseInt(options.creative_mirror_prev_rotate_x, 10) || 0,
                            mirrorPrevRotateY  = parseInt(options.creative_mirror_prev_rotate_y, 10) || 100,
                            mirrorPrevRotateZ  = parseInt(options.creative_mirror_prev_rotate_z, 10) || 0,
                            mirrorNextOrigin   = options.creative_mirror_next_origin || 'right center',
                            mirrorNextX        = formatTranslateValue(options.creative_mirror_next_x, 'creative_mirror_next_x', 'percent'),
                            mirrorNextY        = formatTranslateValue(options.creative_mirror_next_y, 'creative_mirror_next_y', 'px'),
                            mirrorNextZ        = formatTranslateValue(options.creative_mirror_next_z, 'creative_mirror_next_z', 'px'),
                            mirrorNextRotateX  = parseInt(options.creative_mirror_next_rotate_x, 10) || 0,
                            mirrorNextRotateY  = parseInt(options.creative_mirror_next_rotate_y, 10) || -100,
                            mirrorNextRotateZ  = parseInt(options.creative_mirror_next_rotate_z, 10) || 0;
                        baseOptions.creativeEffect = {
                            prev: {
                                shadow: mirrorPrevShadow,
                                origin: mirrorPrevOrigin,
                                translate: [mirrorPrevX, mirrorPrevY, mirrorPrevZ],
                                rotate: [mirrorPrevRotateX, mirrorPrevRotateY, mirrorPrevRotateZ],
                            },
                            next: {
                                origin: mirrorNextOrigin,
                                translate: [mirrorNextX, mirrorNextY, mirrorNextZ],
                                rotate: [mirrorNextRotateX, mirrorNextRotateY, mirrorNextRotateZ],
                            },
                        };
                        break;

                    default:
                        baseOptions.creativeEffect = {
                            prev: { translate: ['-20%', 0, -1] },
                            next: { translate: ['100%', 0, 0] },
                        };
                }
            }

            // Responsive breakpoints
            if (responsive && options.animation !== 'cube' && !(options.slide_control_view_auto == '1' || options.slide_control_view_auto === true)) {
                baseOptions.breakpoints = this.getResponsiveBreakpoints(options);
            }

            return $.extend({}, baseOptions, options);
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

    window.WPSS_Frontend = WPSS_Frontend;
    new WPSS_Frontend()

});
