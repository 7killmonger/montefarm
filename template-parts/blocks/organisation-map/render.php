<section class="container mx-auto hidden">
    <h2 class="text-2xl font-semibold text-[#0e559d] mb-8 mt-20">Unutrašnja organizacija</h2>
    <div class="bg-[#0d5bb3] py-6 px-4 rounded-xl">
        <h3 class="text-base font-medium text-white">Direktor</h3>
        <h2 class="text-2xl font-semibold text-white">Aleksandar Bogavac</h2>
    </div>
    <div class="px-10 mt-4 flex flex-wrap justify-between gap-4">
        <div class="w-full lg:w-[18%]">
            <div class="px-2 py-6 bg-[#A8CDF2] text-xs font-bold text-[#0D5BB3] rounded mb-2 min-h-[80px] flex items-center">Odbor Direktora</div>
            <?php
            if( have_rows('odbor-direktora') ):
                while( have_rows('odbor-direktora') ): the_row();
                    if( have_rows('odbor-direktora-group') ):
                        while( have_rows('odbor-direktora-group') ): the_row();
                            $ime = get_sub_field('ime');
                            $pozicija = get_sub_field('pozicija');
                            echo '<div class="px-2 py-6 bg-[#F1F8FF] rounded mb-2 min-h-[120px] flex flex-col justify-center">
                                    <h5 class="font-bold text-sm">' . $ime . '</h5>
                                    <h5 class="text-xs">' . $pozicija . '</h5>
                                </div>';
                        endwhile;
                    endif;
                endwhile;
            endif;
            ?>
        </div>
        <div class="w-full lg:w-[18%]">
            <div class="px-2 py-6 bg-[#A8CDF2] text-xs font-bold text-[#0D5BB3] rounded mb-2 min-h-[80px] flex items-center">Sektor farmaceutske zdravstvene zaštite</div>
            <?php
            if( have_rows('sektor-farmaceutske-zdravstvene-zastite') ):
                while( have_rows('sektor-farmaceutske-zdravstvene-zastite') ): the_row();
                    if( have_rows('farmaceutska-grupa') ):
                        while( have_rows('farmaceutska-grupa') ): the_row();
                            $ime = get_sub_field('farm-ime');
                            $pozicija = get_sub_field('farm-pozicija');
                            echo '<div class="px-2 py-6 bg-[#F1F8FF] rounded mb-2 min-h-[120px] flex flex-col justify-center">
                                    <h5 class="font-bold text-sm">' . $ime . '</h5>
                                    <h5 class="text-xs">' . $pozicija . '</h5>
                                </div>';
                        endwhile;
                    endif;

                endwhile;
            endif;
            ?>
        </div>
        <div class="w-full lg:w-[18%]">
            <div class="px-2 py-6 bg-[#A8CDF2] text-xs font-bold text-[#0D5BB3] rounded mb-2 min-h-[80px] flex items-center">Komercijalni sektor</div>
            <?php
            if( have_rows('komercijalni-sektor') ):
                while( have_rows('komercijalni-sektor') ): the_row();
                    if( have_rows('komercijalni-grupa') ):
                        while( have_rows('komercijalni-grupa') ): the_row();
                            $ime = get_sub_field('kom-ime');
                            $pozicija = get_sub_field('kom-pozicija');
                            echo '<div class="px-2 py-6 bg-[#F1F8FF] rounded mb-2 min-h-[120px] flex flex-col justify-center">
                                    <h5 class="font-bold text-sm">' . $ime . '</h5>
                                    <h5 class="text-xs">' . $pozicija . '</h5>
                                </div>';
                        endwhile;
                    endif;

                endwhile;
            endif;
            ?>
        </div>
        <div class="w-full lg:w-[18%]">
            <div class="px-2 py-6 bg-[#A8CDF2] text-xs font-bold text-[#0D5BB3] rounded mb-2 min-h-[80px] flex items-center">Sektor za ekonomsko-pravne i opšte poslove</div>
            <?php
            if( have_rows('poslove') ):
                while( have_rows('poslove') ): the_row();
                    if( have_rows('poslove-group') ):
                        while( have_rows('poslove-group') ): the_row();
                            $ime = get_sub_field('poslove-ime');
                            $pozicija = get_sub_field('poslove-pozicija');
                            echo '<div class="px-2 py-6 bg-[#F1F8FF] rounded mb-2 min-h-[120px] flex flex-col justify-center">
                                    <h5 class="font-bold text-sm">' . $ime . '</h5>
                                    <h5 class="text-xs">' . $pozicija . '</h5>
                                </div>';
                        endwhile;
                    endif;

                endwhile;
            endif;
            ?>
        </div>
        <div class="w-full lg:w-[18%]">
            <div class="px-2 py-6 bg-[#A8CDF2] text-xs font-bold text-[#0D5BB3] rounded mb-2 min-h-[80px] flex items-center">Sektor galenske laboratorij</div>
            <?php
            if( have_rows('labaratorij') ):
                while( have_rows('labaratorij') ): the_row();
                    if( have_rows('labaratorij-group') ):
                        while( have_rows('labaratorij-group') ): the_row();
                            $ime = get_sub_field('lab-ime');
                            $pozicija = get_sub_field('lab-pozicija');
                            echo '<div class="px-2 py-6 bg-[#F1F8FF] rounded mb-2 min-h-[120px] flex flex-col justify-center">
                                    <h5 class="font-bold text-sm">' . $ime . '</h5>
                                    <h5 class="text-xs">' . $pozicija . '</h5>
                                </div>';
                        endwhile;
                    endif;

                endwhile;
            endif;
            ?>
        </div>
    </div>
</section>

<section class="container mx-auto mt-20">
<div class="flex flex-wrap justify-between gap-4">
    <div class="w-full lg:w-[45%]">
        <h2 class="mb-6 text-2xl font-bold text-[#001047]">Komercijalni sektor</h2>
        <p class="font-normal text-base text-[#929292]">Komercijalni sektor vrši nabavku i snabdijeva javne zdravstvene ustanove (55 apoteka, domove zdravlja, opšte i specijalne bolice, Klinički centar Crne Gore, Institut za javno zdravlje Crne Gore, Hitnu medicinsku pomoć, Zavod za hitnu medicinsku pomoć, itd. ) i to: </p>
        <ul class="font-normal text-base text-[#929292]">
            <li class="org-list">ljekovima, sanitetskim materijalom, medicinskim potrošnim materijalom za jednokratnu upotrebu,</li>
            <li class="org-list">stomatološkim materijalom,</li>
            <li class="org-list">medicinskim sredstvima za hemodijalizu i peritonalnu dijalizu,</li>
            <li class="org-list">farmaceutskim hemikalijama</li>
        </ul>
    </div>
    <div class="w-full lg:w-[45%]">
        <h2 class="mb-6 text-2xl font-bold text-[#001047]">Sektor farmaceutske zdravstvene zaštite</h2>
        <p class="font-normal text-base text-[#929292]">Sektor farmaceutske zdravstvene zaštite pruža građanima farmaceutsku zdravstvenu zaštitu u 55 apoteka u svim opštinama u Crnoj Gori. Fond za zdravstveno osiguranje Crne Gore (FZOCG) objavljuje Listu ljekova koju usvaja Vlada, na osnovu koje se vrši nabavka istih, a koji se u apotekama građanima izdaju na recept propisan od strane izabranog ljekara. Ljekove van Liste,  zatim pomoćna ljekovita sredstva, suplemente, medicinska kozmetička sredstva, specifične kozmetičke linije odnosno OTC preparate, građani plaćaju, i isti se ne fakturisu Fondu za zdravstveno osiguranje

        </p>
    </div>
    <div class="w-full lg:w-[45%]">
        <h2 class="mb-6 text-2xl font-bold text-[#001047]">Sektor za ekonomsko-pravne i opšte poslove</h2>
        <p class="font-normal text-base text-[#929292]">Sektor za ekonomsko-pravne i opšte poslove obavlja ekonomsko-finansijske poslove, poslove informacionih tehnologija, pravne i opšte poslove, kao i druge koje po svojoj prirodi spadaju u domen poslova od zajedničkog interesa.
        </p>
    </div>

</div>
</section>