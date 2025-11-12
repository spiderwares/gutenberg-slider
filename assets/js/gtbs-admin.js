jQuery(function ($) {

    class GTBS_Admin {

        constructor(){
            this.init();
        }

        init(){
            this.cacheSelectors();
            this.setInitialState();
            this.initSortable();
            this.initColorPickers();
            this.bindEvents();

            $('.gtbs_switch_field input[type="checkbox"]:checked, .gtbs_select_field, .gtbs_radio_field input[type="radio"]:checked').each((i, el) => {
                this.toggleVisibility({ currentTarget: el });
            });
        }

        cacheSelectors() {
            this.$slideContainer = $('.gtbs_slides');
        }
        

        bindEvents(){
            $(document.body).on('click', '.nav-tab-wrapper a', this.changeTab.bind(this));
            $(document.body).on('click', '.gtbs_upload_slide', this.handleUploadSlide.bind(this));
            $(document.body).on('click', '.gtbs_slide_remove', this.handleRemoveSlide.bind(this));
            $(document.body).on( 'change', '.gtbs_switch_field input[type="checkbox"], .gtbs_select_field, .gtbs_radio_field input[type="radio"]', this.toggleVisibility.bind(this) );
        }

        setInitialState() {
            $('.gtbs-tab-content').hide();
            const active = $('.nav-tab.nav-tab-active'),
                target   = active.attr('href') || $('.gtbs-tab-content').first().show().attr('id');
            if (!active.length) $('.nav-tab').first().addClass('nav-tab-active');
            $(target).show();
        }

        changeTab(e) {
            e.preventDefault();
            var __this = $(e.currentTarget);

            $('.nav-tab').removeClass('nav-tab-active');
            $('.gtbs-tab-content').hide();
            
            __this.addClass('nav-tab-active');
            $(__this.attr('href')).show();
        }

        toggleVisibility(e) {
            const __this = $(e.currentTarget);

            if (__this.is('select')) {
                const target        = __this.find(':selected').data('show'),
                      hideElement   = __this.data('hide');
                $(document.body).find(hideElement).hide();
                $(document.body).find(target).show();

                if (__this.is('[name="gtbs_slider_option[pagination_type]"]')) {
                    const progressbar         = __this.val() === 'progressbar',
                          autoplayProgress    = $('[name="gtbs_slider_option[control_autoplay_progress]"]').is(':checked');
                    $(document.body).find('.gtbs_progress_bar').toggle(progressbar && autoplayProgress);
                }
            } else if (__this.is('input[type="checkbox"]')) {
                const target        = __this.data('show'),
                      progressbar   = $('[name="gtbs_slider_option[pagination_type]"]').val() === 'progressbar';
                if (target === '.gtbs_progress_bar') {
                    $(document.body).find(target).toggle(__this.is(':checked') && progressbar);
                } else {
                    $(document.body).find(target).toggle(__this.is(':checked'));
                }
            } else if (__this.is('input[type="radio"]')) {
                const radio     = __this.closest('.gtbs_radio_field'),
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

            const addSlideUrl = (typeof gtbsAdmin !== 'undefined' && gtbsAdmin.add_slide_url) 
                ? gtbsAdmin.add_slide_url 
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
                handle: '.gtbs_slide_move',
                cursor: '-webkit-grabbing',
                stop: (event, ui) => {
                    ui.item.removeAttr('style');
                }
            });
        }

        initColorPickers() {
            if ($.fn.wpColorPicker) {
                $('.gtbs-color-picker').wpColorPicker();
            }
        }
    }

    new GTBS_Admin();
});