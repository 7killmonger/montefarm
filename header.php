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
$lang = file_get_contents(get_template_directory()."/assets/svg/language.svg");

$current_url = home_url(add_query_arg(null, null));

$hamburger = file_get_contents(get_template_directory()."/assets/svg/hamburger.svg");
$hamburger_close = file_get_contents(get_template_directory()."/assets/svg/hamburger-close.svg");

?>

<head>
    <?php wp_head(); ?>
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<header>    
    <nav class="mt-8 mb-20 z-100 " style="pointer-events: auto;">
        <div class="container m-auto w-auto flex justify-between items-center">
            <div class="w-1/2 lg:w-[15%]">
                <?php echo get_custom_logo(); ?>
            </div>
            <div class="flex items-center">
                <ul class="lista flex flex-col rounded-2xl shadow-[0px_10px_20px_0px_rgba(20,50,100,0.35);] lg:shadow-none bg-white lg:bg-[#00000000] p-10 lg:p-0 absolute lg:relative top-[6rem] lg:top-0 inset-x-5 md:inset-x-10 lg:w-full items-start lg:items-center opacity-0 pointer-events-none lg:pointer-events-auto lg:opacity-100 lg:flex-row lg:justify-between" id="nav">
                    <li class="nav-button mr-3 xl:mr-8 text-base font-semibold lg:font-normal lg:text-black text-[#929292] mb-6 lg:mb-0 <?php if ($home_link == $current_url) echo 'active'; ?>"><a href="/">Početna</a></li>
                    <li class="nav-button mr-3 xl:mr-8 text-base font-semibold lg:font-normal lg:text-black text-[#929292] mb-6 lg:mb-0 <?php if ($o_nama_link == $current_url) echo 'active'; ?>"><a href="<?php echo $o_nama_link; ?>">O nama</a></li>
                    <li class="nav-button mr-3 xl:mr-8 text-base font-semibold lg:font-normal lg:text-black text-[#929292] mb-6 lg:mb-0 <?php if ($apoteke_link == $current_url) echo 'active'; ?>"><a href="<?php echo $apoteke_link; ?>">Apoteke</a></li>
                    <li class="nav-button mr-3 xl:mr-8 text-base font-semibold lg:font-normal lg:text-black text-[#929292] mb-6 lg:mb-0 <?php if ($dokumenta_link == $current_url) echo 'active'; ?>"><a href="<?php echo $dokumenta_link; ?>">Dokumenta</a></li>
                    <li class="nav-button mr-3 xl:mr-8 text-base font-semibold lg:font-normal lg:text-black text-[#929292] mb-6 lg:mb-0 <?php if ($zastitnik_prava_pacijenata_link == $current_url) echo 'active'; ?>"><a href="<?php echo $zastitnik_prava_pacijenata_link; ?>">Zaštitnik prava pacijenata</a></li>
                    <li class="nav-button mr-3 xl:mr-8 text-base font-semibold lg:font-normal lg:text-black text-[#929292] mb-6 lg:mb-0 <?php if ($blog_link == $current_url) echo 'active'; ?>"><a href="<?php echo $blog_link; ?>">Aktuelno</a></li>
                    <li class="hidden nav-button mr-3 xl:mr-8 text-base font-semibold lg:font-normal lg:text-black text-[#929292] lg:mb-0 <?php if ($faq_link == $current_url) echo 'active'; ?>"><a href="<?php echo $home_link; ?>#apoteke-faq">FAQ</a></li>
                </ul>
                <button class="hidden items-center ml-4 px-8 py-3 bg-gradient-to-r from-[#1580EB] to-[#0C4885] rounded-3xl text-white shadow-[0px_10px_20px_0px_rgba(20,50,100,0.35);]">Poziv na broj<i class="ml-3"><?php echo file_get_contents(get_template_directory() . "/assets/svg/phone-nav.svg"); ?></i></button>
                <div class="flex lg:flex-row flex-row-reverse items-center">
                <button id="hamburger-meni" class="lg:hidden py-4 px-4 bg-gradient-to-r from-[#1580EB] to-[#0C4885] rounded-[6rem] shadow-[0px_10px_20px_0px_rgba(20,50,100,0.35);] ml-5"><i class="hamburger-active"><?php echo $hamburger ?></i> <i class="hamburger-close hidden w-[50%] h-[50%]"><?php echo $hamburger_close ?></i></button>
                <div class="language-switcher">
                    <?php
                    $array = trp_custom_language_switcher();


    $custom_names = [
        'bs_BA' => 'CG',       
        'en_US' => 'EN',       
        'sr_RS' => 'ЦГ'            
    ];
    ?>
    </div>
    
    <div class="ml-4 z-100 rounded-2xl">
    <ul class="language-dropdown px-4 rounded-xl" data-no-translation>
        <li class="language cursor-pointer flex items-center"><button><?php echo $lang ?></button></li>
        <?php if (apply_filters('trp_allow_tp_to_run', true)) { ?>
            <?php foreach ($array as $code => $item) { 
                $clean_url = str_replace('__', '', $item['current_page_url']);
                if (!empty($clean_url)) {
                    $clean_url = substr($clean_url, 0, -1);
                }
            ?>
                <li>
                    <a href="<?php echo $clean_url; ?>">
                        <span class="text-center"><?php echo $custom_names[$code]; ?></span>
                    </a>
                </li>
            <?php } ?>
        <?php } ?>
    </ul>
</div>
    </div>
            </div>
</div>
        </div>
    </nav>
    
</header>

<script>
    document.getElementById('hamburger-meni').addEventListener('click', function() {
        var nav = document.getElementById('nav');
        let hamburger = document.querySelector('.hamburger-active');
        let hamburgerClose = document.querySelector('.hamburger-close');
        if (window.getComputedStyle(nav).getPropertyValue("opacity") == '0') {
            nav.style.opacity = '1';
            nav.style.pointerEvents = 'auto';
            hamburger.style.display = 'none';
            hamburgerClose.style.display = 'block';
        } else {
            nav.style.opacity = '0';
            nav.style.pointerEvents = 'none';
            hamburger.style.display = 'block';
            hamburgerClose.style.display = 'none';
        }
    });

    document.addEventListener('click', function(event) {
        var nav = document.getElementById('nav');
        var meniButton = document.getElementById('hamburger-meni');
        let hamburger = document.querySelector('.hamburger-active');
        let hamburgerClose = document.querySelector('.hamburger-close');
        if (!nav.contains(event.target) && event.target !== meniButton) {
            if (window.getComputedStyle(nav).getPropertyValue("opacity") != '0') {
                if (window.innerWidth < 1020) {
                    nav.style.opacity = '0';
                    nav.style.pointerEvents = 'none';
                    hamburger.style.display = 'block';
                    hamburgerClose.style.display = 'none';
                }
            }
        }
    });


</script>


<script>
document.addEventListener('DOMContentLoaded', function() {
    const languageDropdown = document.querySelector('.language-dropdown');
    const firstChild = languageDropdown.querySelector('li:first-child');
    const otherChildren = languageDropdown.querySelectorAll('li:not(:first-child)');

    firstChild.addEventListener('click', function() {
        languageDropdown.classList.toggle('show-all');

        if (languageDropdown.classList.contains('show-all')) {
            const firstChildHeight = firstChild.offsetHeight;
            const additionalSpacing = 10; // Adjust this value for extra spacing
            otherChildren.forEach((child, index) => {
                child.style.top = `${(index + 1) * (firstChildHeight + additionalSpacing)}px`;
            });
        } else {
            otherChildren.forEach(child => {
                child.style.top = '';
            });
        }
    });
});
</script>