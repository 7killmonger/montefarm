<?php
$title = get_field('title');
$subtitle = get_field('subtitle');
$image = get_field('image');
$imageIcon = get_field('image-icon');
$titleImage = get_field('title-image');
$text = get_field('text');
$pageID = 55;
$button = get_permalink($pageID);
?>

<section  class="container mx-auto mb-20">
    <div class="flex flex-col lg:flex-row items-center justify-between">
        <div data-aos="fade-up" class="flex items-center 2xl:w-[40%] mt-0 mr-0 lg:w-full lg:mt-10 xl:mt-0 xl:mr-16 xl:w-[55%] rounded-2xl">
                <img src="<?php echo esc_html($image['url']); ?>" alt="<?php echo $image['alt']; ?>" class="rounded-3xl lg:w-4/5 xl:w-full lg:shadow-[25px_-25px_0px_0px_rgba(21,127,233,1)]">
        </div>
        <div data-aos="fade-up" class="w-full xl:w-[35%] mt-10 lg:mt-0">
            <h5 class="text-lg font-normal text-[#0c4c8b] mb-2"><?php echo esc_html($subtitle)?></h5>
            <h1 class="mt-4 text-4xl lg:text-5xl font-bold text-[#143264] w-full "><?php echo esc_html($title)?></h1>
            <!-- <p class="text-xl font-normal text-[#8e8e8e] w-full lg:w-4/5 mb-12 mt-4"><?php echo esc_html($text)?></p> -->
            <div class="text-xl font-normal text-[#8e8e8e] w-full lg:w-4/5 mb-12 mt-4"><?php echo esc_html($text)?></div>
            <a href="<?php echo esc_url($button); ?>" class="location-button px-8 py-4 text-[#143264] border-2 border-solid border-[#143264] rounded-[2rem]">Lokacije naših apoteka</a>
        </div>
    </div>
</section>