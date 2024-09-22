<?php
$aboutSectionTitle = get_field('title');
$aboutSectionContent = get_field('description');
$aboutSectionImage = get_field('image');
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<section class="container mx-auto mb-20">
    <div class="flex flex-col-reverse lg:flex-row items-center ">
        <img src="<?php echo $aboutSectionImage['url']; ?>" alt="<?php echo $aboutSectionImage['alt']; ?>" class="object-cover rounded-2xl w-full lg:w-[60%]">
        <div class="ml-0 lg:ml-10 mb-10 lg:mb-0 lg:w-1/2 w-full">
            <h2 class="text-4xl font-bold text-[#001047] mb-10"><?php echo $aboutSectionTitle; ?></h2>
            <p class="text-base text-[#929292]"><?php echo $aboutSectionContent; ?></p>
        </div>
    </div>
</section>
