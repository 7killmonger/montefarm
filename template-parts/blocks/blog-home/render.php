<?php

$title = get_field('title');
$subtitle = get_field('subtitle');

$args = [
    'post_type' => 'blogovi',
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC'
];
$latest_three_posts = get_posts($args);

?>

<section data-aos="fade-up" class="container mx-auto">
    <p class="text-xl text-[#0e559d] font-medium"><?php echo $subtitle; ?></p>
    <h1 class="text-4xl lg:text-4xl font-bold text-[#001047] w-full lg:w-[70%] mt-4 mb-10"><?php echo $title; ?></h1>

    <div class="swiper secondSwiper w-[100%] h-[530px] mb-20">
    <div class="swiper-wrapper">
    <?php
    foreach ($latest_three_posts as $post){
        $post_id = $post->ID;
        $link = get_the_permalink($post_id);
        $title = get_the_title($post_id);
        $date = get_the_date('', $post_id);
        $featured_image = get_field('featured_image', $post_id);
        $right_arrow = file_get_contents(get_template_directory()."/assets/svg/arrow-right.svg");

        echo '
<div class="swiper-slide card w-[31%] shadow-[0_2px_6px_0_rgba(0,0,0,0.1)] rounded-2xl min-h-[500px] xl:min-h-[450px] flex flex-col">
    <img src="'.$featured_image['url'].'" alt="'.$featured_image['alt'].'" class="object-cover w-full h-[15rem] rounded-2xl">
    <div class="p-5 flex flex-col flex-grow justify-between">
        <p class="text-2xl font-bold text-[#0E559D] mt-4 mb-4">'.$date.'</p>
        <h3 class="title text-2xl font-bold text-[#929292] mb-4">'.$title.'</h3>
        <div class="flex-grow"></div> <!-- Filler element to push link to the bottom -->
        <a href="'.get_the_permalink($post->ID).'" class="link flex text-[#0E559D] mt-auto mb-3">Pročitajte više<i class="ml-2">'.$right_arrow.'</i></a>
    </div>
</div>
    ';
    }
    ?>
    </div>
        <div class="swiper-pagination"></div>
    </div>

</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script type="module">
    var swiper = new Swiper(".secondSwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        breakpoints:{
            340:{
                slidesPerView: 1,
                spaceBetween: 30,
            },
            640:{
                slidesPerView: 1,
                spaceBetween: 30,
            },
            768:{
                slidesPerView: 2,
                spaceBetween: 30,
            },
            1024:{
                slidesPerView: 3,
                spaceBetween: 30,
            },
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });

    function setEqualHeight() {
        let maxHeight = 0;
        const slides = document.querySelectorAll('.swiper-slide.card');

        slides.forEach(slide => {
            slide.style.height = 'auto';
            let slideHeight = slide.offsetHeight;
            if (slideHeight > maxHeight) {
                maxHeight = slideHeight;
            }
        });

        slides.forEach(slide => {
            slide.style.height = maxHeight + 'px';
        });
    }

    window.addEventListener('load', setEqualHeight);
    window.addEventListener('resize', setEqualHeight);
    swiper.on('slideChange', setEqualHeight);

    document.querySelectorAll('.swiper-slide').forEach(slide => {
        slide.addEventListener('click', function() {
            this.querySelector('.link').click();
        });
    });
</script>