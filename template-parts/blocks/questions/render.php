<?php

$questionsTitle = get_field('question-title');
$image = get_field('question-image');

?>

<section data-aos="fade-up" id="apoteke-faq" class="hidden">
    <div class="container m-auto">
        <h2 class="text-4xl font-semibold text-[#001047] w-full md:w-1/2 mb-16"><?php echo $questionsTitle; ?></h2>

        <div class='flex self-center'>
            <div class="left-div w-full xl:w-8/12">
                <?php
                if( have_rows('q&a') ):
                    $i = 0;
                    while( have_rows('q&a') ): the_row();
                        $group_field = get_sub_field('q&a_group');
                        if( $group_field ):
                            $question = $group_field['question'];
                            $answer = $group_field['answer'];
                            $plus = file_get_contents(get_template_directory() . "/assets/svg/plus.svg");
                            $minus = file_get_contents(get_template_directory() . "/assets/svg/minus.svg");
                            echo '
                <div class="accordion-wrapper my-6 border-b-[1px] border-solid border-[#12121233] w-full xl:w-3/4">
                    <div class="accordion mb-5 cursor-pointer">
                        <div class="accordion-header flex items-center justify-between">
                            <div class="label text-2xl font-medium text-[#0e559d]"><button class="text-left">' . $question . '</button></div>
                            <i id="plus-' . $i . '">' . $plus . '</i>
                            <i id="minus-' . $i . '">' . $minus . '</i>
                        </div>
                        <p class="accordion-content my-2 text-xl font-normal">' . $answer . '</p>
                    </div>
                 </div>
              ';
                            $i++;
                        endif;
                    endwhile;
                endif;
                ?>
            </div>
            <div class="image-div hidden xl:block">
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="questions-image shadow-[25px_-25px_0px_0px_rgba(59,148,238,0.66)] rounded-3xl">
            </div>
        </div>
    </div>
</section>
