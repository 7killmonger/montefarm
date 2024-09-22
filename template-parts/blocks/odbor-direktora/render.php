<section class="container mx-auto">
    <h1 class="text-4xl font-bold mb-10 text-[#001047]">Odbor direktora</h1>
    <div class="bg-white py-6 px-4 rounded-xl mb-10 border-solid border-[1px] border-[#9292923b]">
        <h2 class="text-2xl font-semibold text-[#233876]">Batrićević Goran</h2>
        <h3 class="text-base font-medium text-[#6B7280]">Predsjednik</h3>
    </div>
    <div class="flex flex-wrap gap-2 justify-between mb-20">
    <?php
            if( have_rows('odbor-repeater') ):
                while( have_rows('odbor-repeater') ): the_row();
                    if( have_rows('odbor-group') ):
                        while( have_rows('odbor-group') ): the_row();
                            $ime = get_sub_field('ime');
                            $zvanje = get_sub_field('zvanje');
                            echo '<div class="rounded-2xl px-4 py-6 w-full lg:w-[31%] bg-white border-solid border-[1px] border-[#9292923b] mb-2 flex flex-col justify-center">
                                    <h5 class="text-lg font-bold text-[#001047] mb-2">' . $ime . '</h5>
                                    <h5 class="text-xs">' . $zvanje . '</h5>
                                </div>';
                        endwhile;
                    endif;

                endwhile;
            endif;
            ?>
    </div>

</section>