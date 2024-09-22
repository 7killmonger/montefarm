<?php
$latest = [
        'post_type' => 'blogovi',
        'posts_per_page' => 1,
        'orderby' => 'date',
        'order' => 'DESC'
];
$latest_blog_post = get_posts($latest);
$latest_post_id = $latest_blog_post[0]->ID;


if($latest_blog_post) {
    $post = $latest_blog_post[0];
    $post_id = $post->ID;
    $post_id_link = get_the_ID();
    $link = get_the_permalink($post_id);
    $title = get_the_title($post_id);
    $date = get_the_date('', $post_id);
    $featured_image = get_field('featured_image', $post_id);
}
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = [
    'post_type' => 'blogovi',
    'posts_per_page' => 6,
    'orderby' => 'date',
    'order' => 'DESC',
    'post__not_in' => [$latest_post_id],
    'paged' => $paged
];
$custom_blog_posts = new WP_Query($args);


?>
<section class="container mx-auto">
    <div class="hidden cards lg:block rounded-2xl p-10 bg-white shadow-[0_2px_12px_0_rgba(0,0,0,0.1)]">
        <img src="<?php echo $featured_image['url'] ?>" alt="<?php echo $featured_image['alt'] ?>" class="object-cover w-full max-h-[35rem] rounded-2xl">
        <p class="text-base font-normal text-[#0E559D] mt-8"><?php echo $date ?></p>
        <h1 class="title text-4xl font-bold text-black mt-8"><?php echo $title ?></h1>
        <a href="<?php echo $link?>" class="link"><button id="apoteke-lokacija" class="text-[#001047] text-base px-6 py-3 border-solid border-2 border-[#001047] rounded-3xl mt-8">
            Pročitajte više
        </button></a>
    </div>
<!--    telefon-->
    <div class="cards block lg:hidden w-full lg:w-[31%] rounded-2xl shadow-[0_2px_12px_0_rgba(0,0,0,0.1)] cursor-pointer bg-white">
        <img src="<?php echo $featured_image['url'].'" alt="'.$featured_image['alt']?>" class="object-cover w-full h-[15rem] rounded-2xl">
        <div class="p-5">
            <p class="text-base font-normal text-[#0E559D] mt-4 mb-4"><?php echo $date?></p>
            <h3 class="title text-2xl font-bold text-[#929292] mb-4"><?php echo $title ?></h3>
            <button id="apoteke-lokacija" class="text-[#001047] text-base px-6 py-3 border-solid border-2 border-[#001047] rounded-3xl mt-8">
                <a href="<?php echo $link ?>" class="link">Pročitajte više</a>
            </button>
        </div>
    </div>

    <div class="container mx-auto flex flex-wrap gap-8 mt-32 justify-between">
        <?php
        if ($custom_blog_posts->have_posts()) :
        while ($custom_blog_posts->have_posts()) : $custom_blog_posts->the_post();
            $post_id_other = get_the_ID();
            $title_other = get_the_title();
            $date_other = get_the_date();
            $featured_image_other = get_field('featured_image', $post_id_other);
            $right_arrow = file_get_contents(get_template_directory()."/assets/svg/arrow-right.svg");

            echo'
        
<div class="cards w-full lg:w-[31%] rounded-2xl shadow-[0_2px_12px_0_rgba(0,0,0,0.1)] cursor-pointer parent-div flex flex-col justify-between">
    <div class="w-full overflow-hidden rounded-2xl">
        <img src="'.$featured_image_other['url'].'" alt="'.$featured_image_other['alt'].'" class="object-cover w-full h-[15rem] hover:scale-105 duration-200">
    </div>
    <div class="blog-text p-5 flex flex-col flex-grow">
        <p class="text-base font-normal text-[#0E559D] mt-4 mb-4">'.$date_other.'</p>
        <h3 class="text-2xl font-bold text-[#929292] mb-4">'.$title_other.'</h3>
        <a href="'.get_the_permalink($post_id_other).'" class="link flex text-[#0E559D] mt-auto pb-3">Pročitajte više<i class="ml-2">'.$right_arrow.'</i></a>
    </div>
</div>
                ';
        endwhile;
        ?>

    </div>
    <div class="container mx-auto flex justify-center mt-10">
        <div>
        <?php
        echo paginate_links( [
            'total' => $custom_blog_posts->max_num_pages,
            'current' => $paged,
            'format' => '/page/%#%',
            'show_all' => false,
            'end_size' => 2,
            'mid_size' => 1,
            'prev_next' => true,
            'prev_text' => __('«'),
            'next_text' => __('»'),
            'type' => 'plain',
        ] );

        wp_reset_postdata();
        ?>
        </div>
    </div>
    <?php endif; ?>
</section>

<script>
    document.querySelectorAll('.cards').forEach(card => {
        card.addEventListener('click', function() {
            this.querySelector('.link').click();
        });
    });
</script>

