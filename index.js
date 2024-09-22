jQuery(document).ready(function($){
    let currentPage = 1;
    const postsPerPage = 5;
    let currentCategory = 'all'

    
    function loadPosts(category, page){
        $.ajax({
            url: siteConfig.ajaxUrl,
            type: 'POST',
            data: {
                action: 'getPosts',
                nonce: siteConfig.ajaxNonce,
                category: currentCategory,
                page: page,
                posts_per_page: postsPerPage
            },
            beforeSend: () => {
            },

            success: function(response){

                // console.log(response);
                
                // const jsonResponse = JSON.parse(response);



                $('#post-list').html(response);

                // $('#pagination').html(jsonResponse.pagination_html);

                bindPaginationClicks();
                
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', error);
            }
        });
    }
    function bindPaginationClicks() {
        $('#pagination a').on('click', function(e){
            e.preventDefault();
            const pageLink = $(this).attr('href');
            const pageNumber = new URL(pageLink).searchParams.get('paged');
            currentPage = pageNumber ? parseInt(pageNumber) : 1;

            loadPosts(currentCategory, currentPage);

        });
    }

    $('.category-btn').on('click', function() {
        currentCategory = $(this).data('category');
        currentPage = 1; 

        $('.category-btn').removeClass('active');
        $(this).addClass('active');
        loadPosts(currentCategory, currentPage);
    });

    
    loadPosts(currentCategory, currentPage);
})


