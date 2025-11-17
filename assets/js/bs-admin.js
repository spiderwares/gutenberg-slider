'use strict';

jQuery(function ($) {

    class BS_Admin {

        constructor(){
            this.init();
        }

        init(){
            this.cacheSelectors();
            this.setInitialState();
            this.initSortable();
            this.initColorPickers();
            this.initLineNumbers();
            this.bindEvents();

            $('.bs_switch_field input[type="checkbox"]:checked, .bs_select_field, .bs_radio_field input[type="radio"]:checked').each((i, el) => {
                this.toggleVisibility({ currentTarget: el });
            });
        }

        cacheSelectors() {
            this.$slideContainer = $('.bs_slides');
        }

        bindEvents(){
            $(document.body).on( 'click', '.bs-tab-wrapper a', this.changeTab.bind(this));
            $(document.body).on( 'click', '.bs_upload_slide ', this.handleUploadSlide.bind(this));
            $(document.body).on( 'click', '.bs_slide_remove ', this.handleRemoveSlide.bind(this));
            $(document.body).on( 'change', '.bs_switch_field input[type="checkbox"], .bs_select_field, .bs_radio_field input[type="radio"] ', this.toggleVisibility.bind(this) );
        }

        setInitialState() {
            $('.bs-tab-content').hide();
            const active = $('.bs-tab.bs-tab-active'),
                target = active.attr('href') || $('.bs-tab-content').first().show().attr('id');
        
            if (!active.length) $('.bs-tab').first().addClass('bs-tab-active');
            $(target).show();
        }
        
        changeTab(e) {
            e.preventDefault();
            var __this = $(e.currentTarget);
        
            $('.bs-tab').removeClass('bs-tab-active');
            $('.bs-tab-content').hide();
        
            __this.addClass('bs-tab-active');
            $(__this.attr('href')).show();
        }

        toggleVisibility(e) {
            const __this = $(e.currentTarget);

            if (__this.is('select')) {
                const target        = __this.find(':selected').data('show'),
                      hideElement   = __this.data('hide');
                $(document.body).find(hideElement).hide();
                $(document.body).find(target).show();

                if (__this.is('[name="bs_slider_option[pagination_type]"]')) {
                    const progressbar         = __this.val() === 'progressbar',
                          autoplayProgress    = $('[name="bs_slider_option[control_progress_bar]"]').is(':checked');
                    $(document.body).find('.bs_progress_bar').toggle(progressbar && autoplayProgress);
                }
            } else if (__this.is('input[type="checkbox"]')) {
                const target        = __this.data('show'),
                      progressbar   = $('[name="bs_slider_option[pagination_type]"]').val() === 'progressbar';
                if (target === '.bs_progress_bar') {
                    $(document.body).find(target).toggle(__this.is(':checked') && progressbar);
                } else {
                    $(document.body).find(target).toggle(__this.is(':checked'));
                }
            } else if (__this.is('input[type="radio"]')) {
                const radio     = __this.closest('.bs_radio_field'),
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

            const addSlideUrl = (typeof bsAdmin !== 'undefined' && bsAdmin.add_slide_url) 
                ? bsAdmin.add_slide_url 
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
                handle: '.bs_slide_move',
                cursor: '-webkit-grabbing',
                stop: (event, ui) => {
                    ui.item.removeAttr('style');
                }
            });
        }

        initColorPickers() {
            if ($.fn.wpColorPicker) {
                $('.bs-color-picker').wpColorPicker();
            }
        }

        initLineNumbers() {
            $('.bs_custom_textarea').each(function () {
                const textarea = $(this), lineNumber = textarea.siblings('.bs-line-numbers');
                
                const updateNumber = () => {
                    const count = textarea.val().split('\n').length;
                    lineNumber.html(Array.from({ length: count }, (_, i) => `<span>${i + 1}</span>`).join(''));
                };
        
                updateNumber();
                textarea.on('input', updateNumber);
            });
        }
        
    }

    new BS_Admin();
});