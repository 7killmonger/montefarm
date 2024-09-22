<?php
$categories = get_categories();
$titleDoc = get_field('title-doc');
$subtitleDoc = get_field('subtitle-doc');
$textDoc = get_field('text-doc');
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<section data-aos="fade-up" class="hidden container mx-auto mb-20 xl:mb-20">
    <div class = 'flex  flex-col lg:flex-row justify-between'>
        <div class = "text-5xl font-bold text-">
            <h3 class="text-xl text-[#0e559d] font-medium"><?php echo esc_html($subtitleDoc) ?></h3>
            <h1 class=" text-4xl lg:text-5xl font-bold text-[#001047] w-full lg:w-[70%] mt-4"><?php echo esc_html($titleDoc) ?></h1>

        </div>
        <p class="text-xl font-normal text-[#929292] mt-5 w-full lg:w-[40%]"><?php echo esc_html($textDoc) ?></p>
    </div>
    <div class="swiper mySwiper mt-[5rem] w-[100%] h-[250px] lg:h-[300px] xl:h-[380px]">
        <div class="swiper-wrapper">
            <?php
                foreach($categories as $category){
                    $category_link = get_category_link($category->term_id);
                    $category_description = category_description($category->term_id);
                    $category_description = strip_tags($category_description);
                    $category_description = wp_trim_words($category_description, 15, '...');
                    $category_description = strip_tags($category_description);
                    $right_arrow = file_get_contents(get_template_directory()."/assets/svg/arrow-right.svg");
                    echo '
                        <div  class="swiper-slide min-h-[170px] xl:min-h-[170px] p-5 w-full rounded-xl shadow-[0_2px_6px_0_rgba(0,0,0,0.1)] cursor-pointer flex flex-col justify-items-stretch">
                         <h2 id="'.$category->name.'" class="text-2xl font-semibold text-[#0E559D] mb-6">'.$category->name.'</h2>
                         <p class="text-xl font-normal text-[#8e8e8e] w-full lg:w-3/4 mb-16">'.$category_description.'</p>
                         <a id="link-'.$category->name.'" href="'.get_permalink(57).'" class="flex items-center slide-link text-xl font-medium text-[#0E559D]" id="link">Pogledajte sve <i class="ml-2">'.$right_arrow.'</i></a>
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
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        grid: {
            rows: 2,
        },
        spaceBetween: 30,
        breakpoints:{
            340:{
                slidesPerView: 1,
                grid: {
                    rows: 0,
                },
                spaceBetween: 30,
            },
            640:{
                slidesPerView: 1,
                grid: {
                    rows: 0,
                },
                spaceBetween: 30,
            },
            768:{
                slidesPerView: 2,
                grid: {
                    rows: 1,
                },
                spaceBetween: 30,
            },
            1024:{
                slidesPerView: 3,
                grid: {
                    rows: 1,
                },
                spaceBetween: 30,
            },
            1280:{
                slidesPerView: 3,
                grid: {
                    rows: 2,
                },
                spaceBetween: 30,
            },


        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });

    document.querySelectorAll('.swiper-slide').forEach(slide => {
        slide.addEventListener('click', function() {
            this.querySelector('.slide-link').click();
        });
    });

</script>