<?php
$historyTitle = get_field('title');
$history = get_field('history');
$history2 = get_field('history2');
$history3 = get_field('history3');
$historyImage = get_field('image');


?>
<section id="history" class="container mx-auto">
    <div class="flex flex-col lg:flex-row-reverse justify-between mt-10 items-center">
        <div class="history-image w-full lg:w-1/2">
            <img src="<?php echo $historyImage['url']; ?>" alt="<?php echo $historyImage['alt']; ?>" class="w-auto h-auto rounded-2xl mt-8 lg:mt-0">
        </div>
        <div class="w-full lg:w-1/2 px-4 mr-0 lg:mr-8 mt-10 lg:mt-0">
            <h2 class="text-2xl lg:text-4xl font-bold text-[#001047] mb-4"><?php echo $historyTitle; ?></h2>
            <p class="text-base text-[#929292] mb-2"><?php echo $history; ?></p>
            <p class="text-base text-[#929292] mb-2"><?php echo $history2; ?></p>
            <p class="text-base text-[#929292] mb-2"><?php echo $history3; ?></p>
        </div>
    </div>
</section>
