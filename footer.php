<?php

$pages = get_pages();

foreach ($pages as $page) {
    $var_name = strtolower(str_replace(' ', '_', $page->post_title));

    $$var_name = get_page_link($page->ID);

}
$apoteke_link = isset($apoteke) ? $apoteke : '';
$dokumenta_link = isset($dokumenta) ? $dokumenta : '';
$faq_link = isset($faq) ? $faq : '';
$home_link = isset($home) ? $home : '';
$o_nama_link = isset($o_nama) ? $o_nama : '';
$blog_link = isset($blog) ? $blog : '';
$zastitnik_prava_pacijenata_link= isset($zastitnik_prava_pacijenata) ? $zastitnik_prava_pacijenata : '';
$page_ID = "386";
$org_link= get_permalink($page_ID);


wp_footer();
?>
<footer data-aos="fade-up" class="bg-[#F1F8FF] lg:bg-[#F1F8FF] lg:flex lg:flex-col lg:items-center mt-40 lg:relative">
    <div class="container mx-auto">
    <div class="mt-0 lg:mt-[-4.5rem] mx-auto flex flex-col lg:relative lg:top-[-50%] lg:flex-row lg:items-stretch lg:justify-center bg-gradient-to-r from-[#1580EB] to-[#0C4885] p-12 rounded-2xl items-center w-full lg:w-[60%]">
        <h1 class="text-3xl font-semibold text-center text-[#fff] mb-4 lg:mb-0">Mi Brinemo O Vašem Zdravlju</h1>
    </div>
    <div class="flex flex-col items-center lg:hidden px-10 mt-8 w-auto lg:w-[40%]">
        <div class="w-[50%]">
            <?php echo get_custom_logo(); ?>
        </div>
        <!-- <p class="text-center lg:text-start mt-6 text-lg text-[#929292]">We will always give our customers the best in order to get the best experience.</p> -->
        <div class="w=full text-center lg:w-auto">
            <p class="text-lg font-semibold text-[#0E559D] mb-4">Važni linkovi</p>
            <ul>
                <li class="text-base text-[#929292] mb-2"><a href='https://www.gov.me/mzd' class="underline underline-offset-4">Ministarstvo zdravlja Crne Gore</a></li>
                <li class="text-base text-[#929292] mb-2"><a href='https://fzocg.me/' class="underline underline-offset-4">Fond za zdravstveno osiguranje Crne Gore</a></li>
                <li class="text-base text-[#929292] mb-2"><a href='https://cinmed.me/' class="underline underline-offset-4">Institut za ljekove i medicinska sredstva</a></li>
                <li class="text-base text-[#929292] mb-2"><a href='https://www.ucg.ac.me/med' class="underline underline-offset-4">Medicinski fakultet Univerziteta Crne Gore</a></li>
                <li class="text-base text-[#929292] mb-2"><a href='https://cinmed.me/' class="underline underline-offset-4">CInMED</a></li>
                <li class="text-base text-[#929292] mb-2"><a href='https://fkcg.me/' class="underline underline-offset-4">Farmaceutska komora Crne Gore</a></li>

            </ul>
        </div>
    </div>
    <div class="flex justify-between items-start lg:w-full px-10 my-10 lg:my-14  lg:pt-8">
        <div class="hidden lg:flex flex-col items-center lg:items-start lg:w-[40%]">
            <div class="w-[50%]">
                <?php echo get_custom_logo(); ?>
            </div>
            <!-- <p class="text-center lg:text-start mt-6 text-lg text-[#929292]">We will always give our customers the best in order to get the best experience.</p> -->
            <div class="hidden lg:block w=full lg:w-auto mt-5">
            <p class="text-lg font-semibold text-[#0E559D] mb-4">Važni linkovi</p>
            <ul>
                <li class="text-sm text-[#929292] mb-2"><a href='https://www.gov.me/mzd' class="underline underline-offset-4">Ministarstvo zdravlja Crne Gore</a></li>
                <li class="text-sm text-[#929292] mb-2"><a href='https://fzocg.me/' class="underline underline-offset-4">Fond za zdravstveno osiguranje Crne Gore</a></li>
                <li class="text-sm text-[#929292] mb-2"><a href='https://cinmed.me/' class="underline underline-offset-4">Institut za ljekove i medicinska sredstva</a></li>
                <li class="text-sm text-[#929292] mb-2"><a href='https://www.ucg.ac.me/med' class="underline underline-offset-4">Medicinski fakultet Univerziteta Crne Gore</a></li>
                <li class="text-sm text-[#929292] mb-2"><a href='https://cinmed.me/' class="underline underline-offset-4">CInMED</a></li>
                <li class="text-sm text-[#929292] mb-2"><a href='https://fkcg.me/' class="underline underline-offset-4">Farmaceutska komora Crne Gore</a></li>

            </ul>
        </div>
        </div>

        <div class="">
            <p class="text-lg font-semibold text-[#0E559D] mb-4">O nama</p>
            <ul class="">
                <li class="text-base text-[#929292] mb-2"><a href="<?php echo $o_nama_link ?> #cards">Naša misija</a></li>
                <li class="text-base text-[#929292] mb-2"><a href="<?php echo $o_nama_link ?> #cards">Naša vizija</a></li>
                <li class="text-base text-[#929292] mb-2"><a href="<?php echo $org_link ?>">Unutrašnja 
                organizacija</a></li>
                <li class="text-base text-[#929292] mb-2"><a href="<?php echo $o_nama_link ?> #history">Istorijat</a></li>
            </ul>
        </div>

        <div class="">
            <p class="text-right lg:text-left text-lg font-semibold text-[#0E559D] mb-4">Linkovi</p>
            <ul class="">
                <li class="text-right lg:text-left text-base text-[#929292] mb-2"><a href="<?php echo $apoteke_link ?>">Apoteke</a></li>
                <li class="text-right lg:text-left text-base text-[#929292] mb-2"><a href="<?php echo $dokumneta_link ?>">Dokumenta</a></li>
                <li class="text-right lg:text-left text-base text-[#929292] mb-2"><a href="<?php echo $zastitnik_prava_pacijenata_link?>">Zaštitnik prava pacijenata</a></li>
            </ul>

        </div>
    </div>
    <div class="px-10 flex flex-col items-center lg:items-start w-auto lg:w-full">
        <p class="text-center lg:text-start text-lg text-[#929292]">Follow us on social:</p>
        <div class="flex justify-center lg:justify-start items-center mt-2 mb-8">
            <a href="https://www.facebook.com/profile.php?id=2052555634788036&_rdr" class="mr-4"><?php echo file_get_contents(get_template_directory() . "/assets/svg/facebook.svg"); ?></a>
            <a href="https://www.instagram.com/_montefarm_/" class="mr-4"><?php echo file_get_contents(get_template_directory() . "/assets/svg/ig.svg"); ?></a>
    </div>
    </div>
    <div class="w-full lg:w-[95%] m-auto border-b-[1px] border-solid border-[#BDBDBD]"></div>
    <div class="flex justify-center">
    <div class="flex flex-col lg:flex-row lg:justify-between w-full lg:w-[93%] item-center text-center lg:text-left">
        <p class="text-base text-[#929292] lg:py-3">© 2024 Montefarm - All rights reserved</p>
        <a href="https://robotcode.me/" class="text-base text-[#929292] lg:py-3">Powered by Robot Code</a>
    </div>
    </div>
    </div>
</footer>