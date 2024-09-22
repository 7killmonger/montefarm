<?php

$img = get_field('prava-img');
$title = get_field('title');
$content = get_field('content');
$zakon = get_field('zakon_o_pravima_pacijenata');

?>
<section class="container mx-auto flex flex-col lg:flex-row justify-between items-center mb-20">
    <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" class="object-cover rounded-2xl w-full lg:w-[45%] h-[20rem] mb-10 lg:mb-0" />
    <div class="w-full lg:w-[48%]">
        <h1 class="text-4xl font-bold text-[#001047] mb-4"><?php echo $title ?></h1>
        <p class="pb-8 text-[#929292] text-base"><?php echo $content ?></p>
        <a href="<?php echo $zakon ?>" download class="prava-dugme mb-6 lg:mb-0 py-3 px-8 text-sm lg:text-base border-solid border-[#0E559D] border-2 rounded-3xl text-[#0e559d]">Preuzmite zakon o pravima pacijenta</a>
    </div>
</section>

