'use strict';

jQuery(function ($) {

    class WPSS_Admin {

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

            $('.wpss_switch_field input[type="checkbox"]:checked, .wpss_select_field, .wpss_radio_field input[type="radio"]:checked').each((i, el) => {
                this.toggleVisibility({ currentTarget: el });
            });
        }

        cacheSelectors() {
            this.$slideContainer = $('.wpss_slides');
        }

        bindEvents() {
            $(document.body).on('click', '.wpss-tab-wrapper a', this.changeTab.bind(this));
            $(document.body).on('click', '.wpss_upload_slide ', this.handleUploadSlide.bind(this));
            $(document.body).on('click', '.wpss_slide_remove ', this.handleRemoveSlide.bind(this));
            $(document.body).on('change', '.wpss_switch_field input[type="checkbox"], .wpss_select_field, .wpss_radio_field input[type="radio"] ', this.toggleVisibility.bind(this));
        }

        setInitialState() {
            $('.wpss-tab-content').hide();
            const active = $('.wpss-tab.wpss-tab-active'),
                target = active.attr('href') || $('.wpss-tab-content').first().show().attr('id');

            if (!active.length) $('.wpss-tab').first().addClass('wpss-tab-active');
            $(target).show();
        }

        changeTab(e) {
            e.preventDefault();
            var __this = $(e.currentTarget);

            $('.wpss-tab').removeClass('wpss-tab-active');
            $('.wpss-tab-content').hide();

            __this.addClass('wpss-tab-active');
            $(__this.attr('href')).show();
        }

        toggleVisibility(e) {
            const __this = $(e.currentTarget);

            if (__this.is('select')) {
                const target = __this.find(':selected').data('show'),
                    hideElement = __this.data('hide');
                $(document.body).find(hideElement).hide();
                $(document.body).find(target).show();

                if (__this.is('[name="wpss_slider_option[pagination_type]"]')) {
                    const progressbar = __this.val() === 'progressbar',
                        autoplayProgress = $('[name="wpss_slider_option[control_progress_bar]"]').is(':checked');
                    $(document.body).find('.wpss_progress_bar').toggle(progressbar && autoplayProgress);
                }
            } else if (__this.is('input[type="checkbox"]')) {
                const target = __this.data('show'),
                    progressbar = $('[name="wpss_slider_option[pagination_type]"]').val() === 'progressbar';
                if (target === '.wpss_progress_bar') {
                    $(document.body).find(target).toggle(__this.is(':checked') && progressbar);
                } else {
                    $(document.body).find(target).toggle(__this.is(':checked'));
                }
            } else if (__this.is('input[type="radio"]')) {
                const radio = __this.closest('.wpss_radio_field'),
                    target = __this.data('show'),
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
        }

        initSortable() {
            this.$slideContainer.sortable({
                items: 'li',
                handle: '.wpss_slide_move',
                cursor: '-webkit-grabbing',
                stop: (event, ui) => {
                    ui.item.removeAttr('style');
                    this.updatePreview();
                }
            });
        }

        initColorPickers() {
            if ($.fn.wpColorPicker) {
                $('.wpss-color-picker').wpColorPicker({
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
            $('.wpss_custom_textarea').each(function () {
                const textarea = $(this), lineNumber = textarea.siblings('.wpss-line-numbers');

                const updateNumber = () => {
                    const count = textarea.val().split('\n').length;
                    lineNumber.html(Array.from({ length: count }, (_, i) => `<span>${i + 1}</span>`).join(''));
                };

                updateNumber();
                textarea.on('input', updateNumber);
            });
        }

        initLivePreview() {
            this.previewContainer = $('#wpss_live_preview_container');
            if (!this.previewContainer.length) return;

            let timeout;
            $('#wpss_slider_options, #wpss_slider_background_settings, #wpss_background_settings, #postimagediv').on('change input', 'input, select, textarea', (e) => {
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
            const inputs = $('#wpss_slider_options').find('[name^="wpss_slider_option"]'),
                options = {},
                postId = $('#post_ID').val();

            const slideIds = this.$slideContainer.find('li[data-slide-id]').map((i, el) => $(el).data('slide-id')).get();

            if (!postId) return;

            inputs.each((i, el) => {
                const __this = $(el);
                const nameMatch = __this.attr('name').match(/wpss_slider_option\[(.*?)\]/);
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
            const bgContainer = $('#wpss_slider_background_settings, #wpss_background_settings');
            if (bgContainer.length) {
                bgContainer.find('select, input').each((i, el) => {
                    const __this = $(el);
                    const name = __this.attr('name');
                    if (name && name.startsWith('wpss_background_')) {
                        const key = name.replace('wpss_', '');
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
                url: wpss_admin.ajaxurl,
                data: {
                    action: 'wpss_preview_refresh',
                    post_id: postId,
                    wpss_slider_option: options,
                    wpss_slide_ids: slideIds,
                    nonce: wpss_admin.nonce
                },
                success: (response) => {
                    this.previewContainer.replaceWith(response);
                    this.previewContainer = $('#wpss_live_preview_container');

                    if (window.WPSS_Frontend) {
                        try {
                            new window.WPSS_Frontend();
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

    new WPSS_Admin();
});