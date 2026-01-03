'use strict';

jQuery(function ($) {

    class SLST_Admin {

        constructor() {
            this.init();
        }

        init() {
            this.cacheSelectors();
            this.setInitialState();
            this.initSortable();
            this.initColorPickers();
            this.initLineNumbers();
            this.bindEvents();
            this.initLivePreview();

            $('.slst_switch_field input[type="checkbox"]:checked, .slst_select_field, .slst_radio_field input[type="radio"]:checked').each((i, el) => {
                this.toggleVisibility({ currentTarget: el });
            });
        }

        cacheSelectors() {
            this.$slideContainer = $('.slst_slides');
        }

        bindEvents() {
            $(document.body).on('click', '.slst-tab-wrapper a', this.changeTab.bind(this));
            $(document.body).on('click', '.slst_upload_slide ', this.handleUploadSlide.bind(this));
            $(document.body).on('click', '.slst_slide_remove ', this.handleRemoveSlide.bind(this));
            $(document.body).on('change', '.slst_switch_field input[type="checkbox"], .slst_select_field, .slst_radio_field input[type="radio"] ', this.toggleVisibility.bind(this));
        }

        setInitialState() {
            $('.slst-tab-content').hide();
            const active = $('.slst-tab.slst-tab-active'),
                target = active.attr('href') || $('.slst-tab-content').first().show().attr('id');

            if (!active.length) $('.slst-tab').first().addClass('slst-tab-active');
            $(target).show();
        }

        changeTab(e) {
            e.preventDefault();
            var __this = $(e.currentTarget);

            $('.slst-tab').removeClass('slst-tab-active');
            $('.slst-tab-content').hide();

            __this.addClass('slst-tab-active');
            $(__this.attr('href')).show();
        }

        toggleVisibility(e) {
            const __this = $(e.currentTarget);

            if (__this.is('select')) {
                const target    = __this.find(':selected').data('show'),
                    hideElement = __this.data('hide');
                $(document.body).find(hideElement).hide();
                $(document.body).find(target).show();

                if (__this.is('[name="slst_slider_option[pagination_type]"]')) {
                    const progressbar    = __this.val() === 'progressbar',
                        autoplayProgress = $('[name="slst_slider_option[control_progress_bar]"]').is(':checked');
                    $(document.body).find('.slst_progress_bar').toggle(progressbar && autoplayProgress);
                }
            } else if (__this.is('input[type="checkbox"]')) {
                const target    = __this.data('show'),
                    progressbar = $('[name="slst_slider_option[pagination_type]"]').val() === 'progressbar';
                if (target === '.slst_progress_bar') {
                    $(document.body).find(target).toggle(__this.is(':checked') && progressbar);
                } else {
                    $(document.body).find(target).toggle(__this.is(':checked'));
                }
            } else if (__this.is('input[type="radio"]')) {
                const radio     = __this.closest('.slst_radio_field'),
                    target      = __this.data('show'),
                    hideElement = radio.data('hide');

                if (hideElement) {
                    $(document.body).find(hideElement).hide();
                }
                if (__this.is(':checked') && target) {
                    $(document.body).find(target).show();
                }
            }
        }

        handleUploadSlide(e) {
            e.preventDefault();

            const addSlideUrl = (typeof spAdmin !== 'undefined' && spAdmin.add_slide_url)
                ? spAdmin.add_slide_url
                : $(e.currentTarget).attr('href');

            if (!addSlideUrl || addSlideUrl === '#' || !addSlideUrl.includes('parent_slider=')) {
                alert('Please save the slider first before adding slides.');
                return false;
            }

            window.location.href = addSlideUrl;
        }

        handleRemoveSlide(e) {
            e.preventDefault();
            $(e.currentTarget).closest('li').remove();
            this.updatePreview();
        }

        initSortable() {
            this.$slideContainer.sortable({
                items: 'li',
                handle: '.slst_slide_move',
                cursor: '-webkit-grabbing',
                stop: (event, ui) => {
                    ui.item.removeAttr('style');
                    this.updatePreview();
                }
            });
        }

        initColorPickers() {
            if ($.fn.wpColorPicker) {
                $('.slst-color-picker').wpColorPicker({
                    change: (event, ui) => {
                        setTimeout(() => {
                            $(event.target).trigger('change');
                        }, 50);
                    },
                    clear: (event) => {
                        $(event.target).trigger('change');
                    }
                });
            }
        }

        initLineNumbers() {
            $('.slst_custom_textarea').each(function () {
                const textarea = $(this), lineNumber = textarea.siblings('.slst-line-numbers');

                const updateNumber = () => {
                    const count = textarea.val().split('\n').length;
                    lineNumber.html(Array.from({ length: count }, (_, i) => `<span>${i + 1}</span>`).join(''));
                };

                updateNumber();
                textarea.on('input', updateNumber);
            });
        }

        initLivePreview() {
            this.previewContainer = $('#slst_live_preview_container');
            if (!this.previewContainer.length) return;

            let timeout;
            $('#slst_slider_options, #slst_slider_background_settings, #slst_background_settings, #postimagediv').on('change input', 'input, select, textarea', (e) => {
                clearTimeout(timeout);
                timeout = setTimeout(() => this.updatePreview(), 500);
            });

            const postImageDiv = document.getElementById('postimagediv');
            if (postImageDiv) {
                const observer = new MutationObserver(() => {
                    clearTimeout(timeout);
                    timeout = setTimeout(() => this.updatePreview(), 500);
                });
                observer.observe(postImageDiv, { childList: true, subtree: true });
            }

            this.updatePreview();
        }

        updatePreview() {
            const inputs = $('#slst_slider_options').find('[name^="slst_slider_option"]'),
                options  = {},
                postId   = $('#post_ID').val();

            const slideIds = this.$slideContainer.find('li[data-slide-id]').map((i, el) => $(el).data('slide-id')).get();

            if (!postId) return;

            inputs.each((i, el) => {
                const __this = $(el);
                const nameMatch = __this.attr('name').match(/slst_slider_option\[(.*?)\]/);
                if (!nameMatch) return;
                const key = nameMatch[1];

                if (__this.is(':checkbox')) {
                    options[key] = __this.is(':checked') ? '1' : '';
                } else if (__this.is(':radio')) {
                    if (__this.is(':checked')) {
                        options[key] = __this.val();
                    }
                } else {
                    options[key] = __this.val();
                }
            });

            // Add background settings
            const bgContainer = $('#slst_slider_background_settings, #slst_background_settings');
            if (bgContainer.length) {
                bgContainer.find('select, input').each((i, el) => {
                    const __this = $(el),
                        name     = __this.attr('name');
                    if (name && name.startsWith('slst_background_')) {
                        const key = name.replace('slst_', '');
                        options[key] = __this.val();
                    }
                });
            }

            // Featured image (Background ID)
            const thumbnailId = $('#_thumbnail_id').val();
            if (thumbnailId && thumbnailId !== '-1') {
                options['background_id'] = thumbnailId;
            }

            this.previewContainer.css('opacity', '0.5');

            $.ajax({
                type: 'POST',
                url: slst_admin.ajaxurl,
                data: {
                    action: 'slst_preview_refresh',
                    post_id: postId,
                    slst_slider_option: options,
                    slst_slide_ids: slideIds,
                    nonce: slst_admin.nonce
                },
                success: (response) => {
                    this.previewContainer.replaceWith(response);
                    this.previewContainer = $('#slst_live_preview_container');

                    if (window.SLST_Frontend) {
                        try {
                            new window.SLST_Frontend();
                        } catch (e) {
                            console.log(e);
                        }
                    }
                },
                complete: () => {
                    this.previewContainer.css('opacity', '1');
                }
            });
        }

    }

    new SLST_Admin();
});