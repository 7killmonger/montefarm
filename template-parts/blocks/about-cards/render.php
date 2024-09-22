<section  class="container mx-auto mb-20">
    <div class="flex lg:justify-between flex-wrap">
        <?php
        if (have_rows('cards-repeater')):
            while (have_rows('cards-repeater')) : the_row();
                $group_field = get_sub_field('cards-group');

                if ($group_field):
                    $cardTitle = $group_field['title'];
                    $cardContent = $group_field['content'];
                    $right_arrow = file_get_contents(get_template_directory()."/assets/svg/arrow-right.svg");

                    $words = explode(' ', $cardContent);
                    $shortenedContent = implode(' ', array_slice($words, 0, 25));
                    $remainingContent = implode(' ', array_slice($words, 25));

                    if ($cardTitle === 'Unutrašnja organizacija') {
                        $page_url = get_permalink(386);

                        echo '
<a href="' . $page_url . '" #id="cards" class="about-kartica w-full lg:w-[31%] mt-8 lg:mt-0 p-4 rounded-2xl shadow-[0px_2px_6px_2px_rgba(0,0,0,0.04)] lg:min-h-[22rem] xl:min-h-[20rem] 2xl:min-h-[18rem] max-h-[22rem] flex flex-col justify-between">
    <div>
        <h3 class="text-2xl font-semibold text-[#0e559d] mb-6">' . $cardTitle . '</h3>
        <p class="text-base font-normal text-[#929292] w-[80%] mb-6">' . $shortenedContent . '</p>
    </div>
    <p class="link flex text-[#0E559D] mt-auto pb-3">Više o našem timu<i class="ml-2">' . $right_arrow . '</i></p>
</a>
';
} else {
echo '
<div class="about-kartica card-expand w-full lg:w-[31%] mt-8 lg:mt-0 p-4 rounded-2xl shadow-[0px_2px_6px_2px_rgba(0,0,0,0.04)] lg:min-h-[22rem] xl:min-h-[20rem] 2xl:min-h-[18rem] cursor-pointer flex flex-col justify-between">
    <div>
        <h3 class="text-2xl font-semibold text-[#0e559d] mb-6">' . $cardTitle . '</h3>
        <p class="text-base font-normal text-[#929292] w-[80%] card-content card-content-colapsed">' . $shortenedContent . '</p>
        <p class="hidden-content text-base font-normal text-[#929292] w-[80%] mb-6">' . $remainingContent . '</p>
    </div>
    <p class="link flex text-[#0E559D] mt-auto pb-3">Još <i class="ml-2">' . $right_arrow . '</i></p>
</div>
';
                    }
                endif;
            endwhile;
        else :
        endif;
        ?>
    </div>
</section>