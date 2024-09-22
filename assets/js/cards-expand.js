jQuery(document).ready(function($) {
    $('.card-expand').each(function() {
        var cardContent = $(this).find('.card-content');
        var hiddenContent = $(this).find('.hidden-content');
        var initialHeight = $(this).height();
        
        // Temporarily show hidden content to calculate expanded height
        hiddenContent.show();
        var expandedHeight = initialHeight + hiddenContent.height();
        hiddenContent.hide();

        $(this).css('max-height', initialHeight);

        $(this).data('initialHeight', initialHeight);
        $(this).data('expandedHeight', expandedHeight);
    });

    $('.card-expand').on('click', function() {
        var initialHeight = $(this).data('initialHeight');
        var expandedHeight = $(this).data('expandedHeight');
        var link = $(this).find('.link');
        var hiddenContent = $(this).find('.hidden-content');

        if ($(this).hasClass('card-expand-expanded')) {
            $(this).removeClass('card-expand-expanded');
            $(this).css('max-height', initialHeight);
            link.css('opacity', 1);
            hiddenContent.hide();
        } else {
            $(this).addClass('card-expand-expanded');
            $(this).css('max-height', expandedHeight);
            link.css('opacity', 0);
            hiddenContent.show();
        }
    });
});