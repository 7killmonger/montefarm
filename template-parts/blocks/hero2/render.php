<?php
$subtitles = get_field('subtitle');
$heroImage = get_field('heroImage');
$email = get_field('email');
$phone = get_field('phoneNumber');
$address = get_field('adress');

?>

<section class="container mx-auto mb-20">
    <div class="flex flex-col lg:flex-row items-center justify-between">
        <div id="movig-div" data-aos="fade-up" class="hidden lg:block">
            <h3 class="text-xl font-semibold text-[#0e559d] mb-[1rem]"><?php echo $subtitles; ?></h3>
            <?php
            if (have_rows('snadbijevamo')) :
                while (have_rows('snadbijevamo')) : the_row();
                    $group_field = get_sub_field('snadbijevamo-group');
                    if ($group_field) :
                        $image = $group_field['image'];
                        $text = $group_field['text'];
                        echo '<div class="flex items-center mb-2.5">
                            <img src="' . $image['url'] . '" alt="' . $image['alt'] . '">
                            <p class="w-[45%] ml-[1rem] text-base font-medium">' . $text . '</p>
                          </div>';
                    endif;
                endwhile;
            else :
            endif;
            ?>
        </div>
        <div data-aos="fade-up" class="flex justify-end items-end flex-col relative" >
            <img src="<?php echo $heroImage['url']; ?>" alt="<?php echo $heroImage['alt']; ?>" class="rounded-2xl shadow-none lg:shadow-[22px_-20px_0px_0px_#BEDCF9] mb-10 md:mb-20">
            <div class="relative md:absolute w-[100%] md:w-1/2 bg-gradient-to-r from-[#1580EB] to-[#0C4885] rounded-2xl px-[1rem] py-[2rem]">
                <p class="phone flex"><i class="mr-2"><?php echo file_get_contents(get_template_directory() . "/assets/svg/phone.svg")?></i><?php echo $phone; ?></p>
                <p class="email flex"><i class="mr-3"><?php echo file_get_contents(get_template_directory() . "/assets/svg/mail.svg")?></i><?php echo $email; ?></p>
                <p class="address flex"><i class="mr-5"><?php echo file_get_contents(get_template_directory() . "/assets/svg/location.svg")?></i><?php echo $address; ?></p>
            </div>
        </div>
    </div>
    <h3 data-aos="fade-up" class="block lg:hidden text-2xl font-semibold text-[#0e559d] mb-4 text-center mt-10"><?php echo $subtitles; ?></h3>
    <div data-aos="fade-up" id="marqueeContainer" class="flex lg:hidden flex-row w-[100%] overflow-auto whitespace-nowrap justify-between py-4">
        <?php
        if (have_rows('snadbijevamo')) :
            while (have_rows('snadbijevamo')) : the_row();
                $group_field = get_sub_field('snadbijevamo-group');
                if ($group_field) :
                    $image = $group_field['image'];
                    $text = $group_field['text'];
                    echo '<div id="marqueeElement" class="w-[200%] flex items-center mr-16">
                        <img src="' . $image['url'] . '" alt="' . $image['alt'] . '">
                         <p class="text-base font-medium ml-4">' . $text . '</p>
                      </div>';
                endif;
            endwhile;
        else :
        endif;
        ?>
    </div>
</section>
<script>
    var dragObject = null;
    var dragOffset = 0;

    document.getElementById('marqueeElement').addEventListener('dragstart', function(event) {
        dragObject = this;
        dragOffset = event.clientX - this.getBoundingClientRect().left;
    });

    document.getElementById('marqueeContainer').addEventListener('dragover', function(event) {
        event.preventDefault();
        if (dragObject) {
            this.scrollLeft = dragOffset - event.clientX;
        }
    });

    document.getElementById('marqueeContainer').addEventListener('dragend', function() {
        dragObject = null;
    });

</script>
