jQuery(document).ready(function($) {
    function loadPosts(page, category) {
        $.ajax({
            type: 'POST',
            url: ajaxpagination.ajax_url,
            data: {
                action: 'load_more_posts',
                page: page,
                category: category
            },
            success: function(response) {
                response = JSON.parse(response);
                if (response.html != 0) {
                    $('#info-posts-container').html(response.html);
                    $('#current-page').val(page);
                    updatePagination(page, response.total_pages);
                    applyTailwindStyles(); // Apply Tailwind styles after loading content
                } else {
                    $('#info-posts-container').html('<p>No posts found</p>');
                    updatePagination(page, 0);
                }
            }
        });
    }

    function updatePagination(currentPage, totalPages) {
        $('#page-numbers').empty();

        if (totalPages > 1) {
            // Add the first page
            $('#page-numbers').append('<button class="page-number bg-gray-300 text-gray-700 px-4 py-2 rounded" data-page="1">1</button>');

            if (currentPage > 3) {
                $('#page-numbers').append('<span class="ellipsis px-4 py-2">...</span>');
            }

            // Add the page before the current page, the current page, and the page after the current page
            for (var i = Math.max(2, currentPage - 1); i <= Math.min(totalPages - 1, currentPage + 1); i++) {
                $('#page-numbers').append('<button class="page-number bg-gray-300 text-gray-700 px-4 py-2 rounded" data-page="' + i + '">' + i + '</button>');
            }

            if (currentPage < totalPages - 2) {
                $('#page-numbers').append('<span class="ellipsis px-4 py-2">...</span>');
            }

            // Add the last page
            if (totalPages > 1) {
                $('#page-numbers').append('<button class="page-number bg-gray-300 text-gray-700 px-4 py-2 rounded" data-page="' + totalPages + '">' + totalPages + '</button>');
            }

            // Update active class for current page
            $('.page-number').removeClass('active-pagintion');
            $('.page-number[data-page="' + currentPage + '"]').addClass('active-pagintion');

            // Show/hide prev and next buttons
            if (currentPage == 1) {
                $('#prev-page').hide();
            } else {
                $('#prev-page').show();
            }

            if (currentPage == totalPages) {
                $('#next-page').hide();
            } else {
                $('#next-page').show();
            }

            $('#pagination').show();
        } else {
            $('#pagination').hide();
        }
    }

    function applyTailwindStyles() {
        $('.post-item').addClass('mb-4'); // Example Tailwind spacing classes
        $('.post-item h2').addClass('text-2xl font-normal w-full lg:w-[60%] text-[#1a1a18] mb-8 lg:mb-4'); // Example text styles
        $('.post-item p').addClass('text-gray-700'); // Example text color
    }

    $('#pagination').on('click', '.page-number', function() {
        var page = $(this).data('page');
        var category = $('.filter-button.active').data('category') || $('.filter-dropdown-item.active').data('category');
        loadPosts(page, category);
    });

    $('#prev-page').on('click', function() {
        var currentPage = parseInt($('#current-page').val());
        if (currentPage > 1) {
            var category = $('.filter-button.active').data('category') || $('.filter-dropdown-item.active').data('category');
            loadPosts(currentPage - 1, category);
        }
    });

    $('#next-page').on('click', function() {
        var currentPage = parseInt($('#current-page').val());
        var totalPages = $('#page-numbers .page-number').length;
        if (currentPage < totalPages) {
            var category = $('.filter-button.active').data('category') || $('.filter-dropdown-item.active').data('category');
            loadPosts(currentPage + 1, category);
        }
    });

    $('#filter-buttons').on('click', '.filter-button', function() {
        $('#filter-buttons .filter-button').removeClass('active');
        $(this).addClass('active');
        var category = $(this).data('category');
        loadPosts(1, category);
    });

    $('#filter-dropdown-toggle').on('click', function() {
        $('#filter-dropdown-menu').toggleClass('hidden');
    });

    $('#filter-dropdown-menu').on('click', '.filter-dropdown-item', function() {
        $('#filter-dropdown-menu .filter-dropdown-item').removeClass('active');
        $(this).addClass('active');
        $('#filter-dropdown-menu').addClass('hidden');
        var category = $(this).data('category');
        loadPosts(1, category);
    });

    // Close the dropdown if clicked outside
    $(document).on('click', function(event) {
        if (!$(event.target).closest('#filter-dropdown-toggle, #filter-dropdown-menu').length) {
            $('#filter-dropdown-menu').addClass('hidden');
        }
    });

    // Initial pagination setup
    updatePagination(1, $('#page-numbers .page-number').length);
});