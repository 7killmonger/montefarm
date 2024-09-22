<?php

$title = get_field('title');
$description = get_field('description');
$words = explode(" ", $title);
$lastWordIndex = count($words) - 1;
$lastWord = $words[$lastWordIndex];
$words[$lastWordIndex] = "<span class='text-[#0e559d]'>".$words[$lastWordIndex]."</span>";
$words[2] = $words[2] . "<br>";
$modifiedTitle = implode(" ", $words);


?>


<?php if ($modifiedTitle):  ?>
<section  class="container mx-auto mb-20 z-10">
    <div class="flex flex-col lg:flex-row justify-between items-center" >
            <h1 data-aos="fade-up" class=" aos-fade-left w-[100%] text-4xl sm:text-6xl text-center lg:text-left lg:w-1/2 lg:text-5xl xl:text-7xl font-semibold "><?php echo $modifiedTitle; ?></h1>

            <p data-aos="fade-up" class="w-[100%] mt-8 lg:mt-0 lg:w-[40%] text-center lg:text-left text-base text-[#929292]"><?php echo $description; ?></p>
    </div>
</section>
<?php endif; ?>