jQuery(document).ready(function($) {
    $('.accordion-wrapper').each(function(index) {
        var $accordion = $(this).find('.accordion');
        var $content = $(this).find('.accordion-content');
        var $plus = $(this).find('#plus-' + index);
        var $minus = $(this).find('#minus-' + index);

        $minus.hide();

        $accordion.click(function() {
            var isOpen = $content.is(':visible');

            $('.accordion-content').slideUp();
            $('.accordion-wrapper').removeClass('open');
            $('.accordion-wrapper').each(function(idx) {
                $(this).find('#plus-' + idx).show();
                $(this).find('#minus-' + idx).hide();
            });

            if (!isOpen) {
                $content.slideDown();
                $plus.hide();
                $minus.show();
                $(this).parent().addClass('open');
            } else {
                $content.slideUp();
                $plus.show();
                $minus.hide();
                $(this).parent().removeClass('open');
            }
        });
    });
});