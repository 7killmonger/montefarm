<?php

$text = get_field('lijevi-text');

?>
<section class="bg-gradient-to-b from-[#1580EB] to-[#0C4885] py-16 mt-20">
    <div class="container mx-auto flex flex-col-reverse lg:flex-row justify-between items-center">
        <div class="w-full lg:w-[45%] pravila">
            <?php
            if( have_rows('lijevi-text') ):
                while( have_rows('lijevi-text') ): the_row();
                    $stavke = get_sub_field('stavke');
                    echo '<p class="font-bold text-white text-base mb-2">' . $stavke . '</p>';
                endwhile;
            endif;
            ?>
        </div>
        <div id="custom-form-wrapper" class="w-full lg:w-[50%] mb-10 lg:mb-0">
            <h4 class="mb-4 text-xl font-semibold text-[#176B87]">Obrazac prigovora</h4>
            <?php
            $current_language = get_locale();

            if ($current_language === 'bs_BA') {
                echo do_shortcode('[forminator_form id="330"]');
            } elseif ($current_language === 'sr_RS') {
                echo do_shortcode('[forminator_form id="591"]');
            } else {
                echo do_shortcode('[forminator_form id="default_form_id"]');
            }
            ?>
        </div>
    </div>
</section>

